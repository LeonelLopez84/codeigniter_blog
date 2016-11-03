<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public $session_data=array();
	public $body=array();
	public $templates;

	public function __construct()
	{
		parent::__construct();

		$this->body['session']=(object)$this->session->userdata('logged_in');

		$this->templates = new League\Plates\Engine(APPPATH.'views/admin/templates');

		$this->load->model('opcion_model');   	
		$this->body['opciones'] = opcion_model::all();

	}

	public function index()
	{

		echo $this->templates->render('home',$this->body);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */