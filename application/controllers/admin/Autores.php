<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';

class Autores extends Home {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('author_model');

		$this->body['form']=[
                            'accept-charset' =>  "UTF-8",
                            'role'          =>  "form",
                            'enctype'=>"multipart/form-data"
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
		$this->body['username']=[
                            'type'          => 'text',
                            'name'          => 'username',
                            'value'			=> set_value('username'),
                            'class'         => 'form-control',
                            'placeholder'   => 'Username',
                            'id'            => 'email',
                            'maxlength'     => '100',
                            'size'          => '50'
                            ];

		 $this->body['email']=[
                            'type'          => 'email',
                            'name'          => 'email',
                            'placeholder'   => 'name.lastname@example.com',
                            'value'         => set_value('email'),
                            'class'         => 'form-control',
                            'id'            => 'email',
                            'maxlength'     => '100',
                            'size'          => '50'
                            ];

		 $this->body['password']=[
                            'type'          => 'password',
                            'name'          => 'password',
                            'placeholder'   => 'Password',
                            'class'         => 'form-control',
                            'id'            => 'password',
                            'maxlength'     => '100',
                            'size'          => '50'
                            ];

          $this->body['passconf']=[
                            'type'          => 'password',
                            'name'          => 'passconf',
                            'placeholder'   => 'Confirm password',
                            'class'         => 'form-control',
                            'id'            => 'passconf',
                            'maxlength'     => '100',
                            'size'          => '50'
                            ];

 		$this->body['userfile']=[
                            'type'          => 'file',
                            'name'          => 'userfile',
                            'class'         => 'form-control',
                            'id'            => 'userfile',
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
		$this->body['autores']=author_model::orderBy('username','ASC')->get();
		echo $this->templates->render('autores/lista',$this->body);
	}

	public function nuevo()
	{
		echo $this->templates->render('autores/crear',$this->body);
	}

    public function editar($id=null)
    {
        if(!is_null($id)){

            $autor=author_model::find($id);
            $this->body['id']['value']=$autor->id;
            $this->body['id_hidden']['value']=$autor->id;
            $this->body['username']['value']=$autor->username;
            $this->body['email']['value']=$autor->email;
            $this->body['submit']['value']='Save';
            $this->body['submit']['value']='btn btn-info';

            echo $this->templates->render('autores/editar',$this->body);
        }
    }

    public function borrar($id=null)
    {
        if(!is_null($id)){
            $autor=author_model::find($id);

            $this->body['autor']=$autor; 

            echo $this->templates->render('autores/borrar',$this->body);
        }
    }

	public function create()
	{
		$id=0;

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean',['required' => 'You must provide a %s.']);
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|xss_clean|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE){

            echo $this->templates->render('autores/crear',$this->body);	

		}else{

			$Autor=new author_model;

			$Autor->username=$this->input->post('username');
			$Autor->email=$this->input->post('email');
			$Autor->password=md5($this->input->post('password'));

			$Autor->save();


			$this->upload_config['file_name'] = $Autor->id.'.jpg';
			$this->upload->initialize($this->upload_config);

			if ( ! $this->upload->do_upload('userfile')){
                $this->body['error_file'] = array('error' => $this->upload->display_errors());

                echo $this->templates->render('autores/crear',$this->body);	
                
            }else{
				redirect('admin/autores/todos-los-autores','refresh');

            }
		}
	}

	public function update()
	{

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE){

            echo $this->templates->render('autores/editar',$this->body); 

        }else{

            $id=$this->input->post('id_hidden');

            $Autor=author_model::find($id);
            $Autor->username=$this->input->post('username');
            $Autor->email=$this->input->post('email');
            $Autor->save();


            $this->upload_config['file_name'] = $id.'.jpg';
            $this->upload->initialize($this->upload_config);

            if ( ! $this->upload->do_upload('userfile')){
                $this->body['error_file'] = array('error' => $this->upload->display_errors());

                echo $this->templates->render('autores/editar',$this->body); 
                
            }else{
                redirect('admin/autores/todos-los-autores','refresh');

            }
        }
		
	}

    public function delete($id=null)
    {
        if(!is_null($id))
        {
            $Autor=author_model::find($id);
            $Autor->delete();

            redirect('admin/autores/todos-los-autores','refresh');            
        }
    }

}

/* End of file Autores.php */
/* Location: ./application/controllers/admin/Autores.php */