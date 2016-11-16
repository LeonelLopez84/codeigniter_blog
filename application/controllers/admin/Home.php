<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public $session_data=array();
	public $body=array();
	public $templates;
	protected $upload_config=array();

	public function __construct()
	{
		parent::__construct();

		$session=$this->session->userdata('logged_in');

		if(is_null($session)){
			redirect('admin/login','refresh');
		}

		$this->body['session']=(object)$session;

		$this->templates = new League\Plates\Engine(APPPATH.'views/admin');

		$this->load->model('opcion_model');   	

		$this->body['opciones'] = opcion_model::with('subOpcion')->orderBy('opcion','ASC')->where('opcion_id', '=', '0')->get();
		
		$this->upload_config['max_size']     = '100';
		$this->upload_config['max_width'] = '1024';
		$this->upload_config['max_height'] = '768';

		

	}

	public function index()
	{

		echo $this->templates->render('home/home',$this->body);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */