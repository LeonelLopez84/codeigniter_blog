<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $body=[];

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('author_model','',TRUE);


			$this->body['form']=[
			                            'accept-charset' =>  "UTF-8",
			                            'role'          =>  "form"
			                            ]; 

			$this->body['username']=[
			                                'type'          => 'text',
			                                'name'          => 'username',
			                                'class'         => 'form-control',
			                                'placeholder'   => 'Username',
			                                'id'            => 'email',
			                                'maxlength'     => '100',
			                                'size'          => '50'
			                                ];

			 $this->body['password']=[
			                            'type'          => 'password',
			                            'name'          => 'password',
			                            'placeholder'   => 'Password',
			                            'value'         => '',
			                            'class'         => 'form-control',
			                            'id'            => 'password',
			                            'maxlength'     => '100',
			                            'size'          => '50'
			                            ];

			$this->body['rememberme']=[
			                            'name'  => 'remember',
			                            'type'  => 'checkbox',
			                            'value' => 'Remember Me'
			        ];

			$this->body['submit']=[
			                            'class' =>  "btn btn-lg btn-success btn-block",
			                            'type'  =>  "submit",
			                            'value' =>  "Login"
			                            ];
		

	}


	public function index()
	{

		$this->load->view('admin/login',$this->body);		
	}


	public function process()
	{ 
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		 
		if($this->form_validation->run() == FALSE)
		{
		     //Field validation failed.  User redirected to login page
		      $this->load->view('admin/login',$this->body);

		} else{
		     //Go to private area
		     redirect('admin/home', 'refresh');
		}
	}


	public function check_database($password)
	{

	   $username = $this->input->post('username');
	   $result = $this->author_model->login($username, $password);
	 
	   if($result)
	   {
		   	foreach($result as $row){

		       $sess_array = array(
		         'id'			 => $row->id,
		         'username'  => $row->username,
		         'email' 		 => $row->email
		       );

		       $this->session->set_userdata('logged_in', $sess_array);
			}	

	     return TRUE;

	   }else{

	     $this->form_validation->set_message('check_database', 'Invalid username or password');
	     return false;

	   }
	}

	public function logout()
 	{
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		redirect('admin/login', 'refresh');
 	}

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */