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

		$session=$this->session->userdata('logged_in');

		if(is_null($session)){
			redirect('admin/login','refresh');
		}

		$this->body['session']=(object)$session;

		$this->templates = new League\Plates\Engine(APPPATH.'views/admin/templates');

		$this->load->model('opcion_model');   	

		$opciones = (object)opcion_model::orderBy('opcion','ASC')->where('opcion_id', '=', '0')->get();
		foreach($opciones as $k=>$opcion){

			$this->body['opciones'][$k] = $opcion;
			$this->body['opciones'][$k]['subopcion']=(object)opcion_model::find($opcion->id)->subOpcion;
		}
	}

	public function index()
	{

		echo $this->templates->render('home',$this->body);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */