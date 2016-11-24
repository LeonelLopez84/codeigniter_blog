<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';

class Post extends Home {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('post_model');

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
		$this->body['article']=[
                            'name'        => 'article',
											       'id'          => 'article',
											       'value'       => set_value('article'),
											       'rows'        => '50',
											       'cols'        => '10',
											       'style'       => 'width:50%',
											       'class'       => 'form-control'
                            ];

		$this->body['banner']=[
                            'type'          => 'file',
                            'name'          => 'banner',
                            'class'         => 'form-control',
                            'id'            => 'banner',
                            ];

    $this->body['article']=[
                            'name'        => 'article',
											       'id'          => 'article',
											       'value'       => set_value('article'),
											       'rows'        => '10',
											       'cols'        => '10',
											       'style'       => 'width:100%',
											       'class'       => 'form-control'
                            ];

    $this->body['featured']=[
                            'type'          => 'checkbox',
                            'name'          => 'featured',
                            'value'         => set_value('featured'),
                            'id'            => 'featured'
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

	public function index()
	{
		$this->body['post']=post_model::orderBy('date','DESC')->get();
		echo $this->templates->render('post/lista',$this->body);
	}

	public function nuevo()
	{
		echo $this->templates->render('post/crear',$this->body);	
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
				$Post->title=$this->input->post('article');
				$Post->featured=(empty($this->input->post('featured')))?0:1;
				$Post->enabled=(empty($this->input->post('enabled')))?0:1;
				$Post->author_id=$this->body['session']->id;

				$Post->save();

			$this->upload_config['file_name'] = $Post->id.'.jpg';
			$this->upload->initialize($this->upload_config);

				if ( ! $this->upload->do_upload('banner'))
				{
              $this->body['error_file'] = array('error' => $this->upload->display_errors());

              echo $this->templates->render('post/crear',$this->body);	
	                
	      }else{
							redirect('admin/post/todos-los-post','refresh');

	      }
			}
	}
}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */