<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';


class Post extends Home {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('post_model');
        $this->load->model('author_model'); 

		$this->body['form']=[
                            'accept-charset' =>  "UTF-8",
                            'role'          =>  "form",
                            ]; 

    $this->body['id']=[
                            'type'          => 'text',
                            'name'          => 'id',
                            'value'         => set_value('id'),
                            'class'         => 'form-control',
                            'placeholder'   => '0',
                            'id'            => 'id',
                            'disabled'       => 'disable'
                            ];
    $this->body['id_hidden']=[
                            'type'          => 'hidden',
                            'name'          => 'id_hidden',
                            'value'         => set_value('id_hidden'),
                            'class'         => 'form-control',
                            'placeholder'   => '0',
                            'id'            => 'id_hidden',
                            ];
		$this->body['title']=[
                            'type'          => 'text',
                            'name'          => 'title',
                            'value'					=> set_value('title'),
                            'class'         => 'form-control',
                            'placeholder'   => 'Title',
                            'id'            => 'title',
                            'maxlength'     => '100',
                            'size'          => '50'
                            ];
		$this->body['banner']=[
                            'type'          => 'file',
                            'name'          => 'banner',
                            'class'         => 'form-control',
                            'id'            => 'banner',
                            ];
    $this->body['article']=[
                            'name'       => 'article',
					       'id'          => 'article',
					       'value'       => set_value('article'),
					       'rows'        => '15',
					       'cols'        => '10',
					       'style'       => 'width:100%',
					       'class'       => 'form-control'
                            ];

    $this->body['featured']=[
                            'type'          => 'checkbox',
                            'name'          => 'featured',
                            'value'         => set_value('featured'),
                            'id'            => 'featured',
                            ];

    $this->body['enabled']=[
                            'type'          => 'checkbox',
                            'name'          => 'enabled',
                            'value'         => set_value('enabled'),
                            'id'            => 'enabled'
                            ];

    $this->body['submit']=[
                            'type'          => 'submit',
                            'name'          => 'submit',
                            'class'         => 'btn btn-success',
                            'id'            => 'submit',
                            'value'         => 'Create'
                            ];

    $this->upload_config['upload_path'] = './assets/img/'.strtolower(__CLASS__).'/';
    $this->upload_config['allowed_types'] = 'gif|jpg|png';
	}

	public function index($page=null)
	{
		$this->body['post']=post_model::with('author')->orderBy('date','desc')->paginate(2);
        $this->body['post']->setPath("admin/post/todos-los-post/");

		echo $this->templates->render('post/lista',$this->body);
	}

	public function nuevo()
	{
		echo $this->templates->render('post/crear',$this->body);	
	}

    public function editar($id=null)
    {
        if(!is_null($id)){

            $post=post_model::find($id);
            $this->body['id']['value']=$post->id;
            $this->body['id_hidden']['value']=$post->id;
            $this->body['title']['value']=$post->title;
            $this->body['banner']['value']=$post->id.'jpg';
            $this->body['article']['value']=$post->article;
             if((bool)$post->featured){
                $this->body['featured']['checked']='checked';
            }
            if((bool)$post->enabled){
                $this->body['enabled']['checked']='checked';
            }
            $this->body['featured']['value']=$post->featured;
            $this->body['enabled']['value']=$post->enabled;
            $this->body['submit']['value']='Save';
            $this->body['submit']['class']='btn btn-info';

            echo $this->templates->render('post/editar',$this->body);
        }
    }

	public function create()
	{

		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('article', 'Article', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE){

            echo $this->templates->render('post/crear',$this->body);	

		}else{

			$Post=new post_model;

			$Post->title=$this->input->post('title');
			$Post->article=$this->input->post('article');
			$Post->featured=(is_null($this->input->post('featured')))?0:1;
			$Post->enabled=(is_null($this->input->post('enabled')))?0:1;
			$Post->author_id=$this->body['session']->id;

			$Post->save();

			$this->upload_config['file_name'] = $Post->id.'.jpg';
			$this->upload->initialize($this->upload_config);

   			if(!$this->upload->do_upload('banner'))
   			{
                $this->body['error_file'] = array('error' => $this->upload->display_errors());

                echo $this->templates->render('post/crear',$this->body);	
    	                
   	        }else{
   				redirect('admin/post/todos-los-post','refresh');

            }
		}
	}

    public function update()
    {
        $id=$this->input->post('id_hidden');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('article', 'Article', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE){

            echo $this->templates->render("post/editar",$this->body);    

        }else{

            $Post=post_model::find($id);
            $Post->title=$this->input->post('title');
            $Post->article=$this->input->post('article');
            $Post->featured=(is_null($this->input->post('featured')))?0:1;
            $Post->enabled=(is_null($this->input->post('enabled')))?0:1;
            

            $this->upload_config['file_name'] = $Post->id.'.jpg';
            $this->upload->initialize($this->upload_config);

            if ( ! $this->upload->do_upload('banner'))
            {
                $this->body['error_file'] = array('error' => $this->upload->display_errors());

                echo $this->templates->render('post/crear',$this->body);    
                        
            }else{

                $Post->save();

                redirect('admin/post/todos-los-post','refresh');

            }
        }
    }
}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */