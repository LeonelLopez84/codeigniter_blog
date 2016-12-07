<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Mexico_City');

class Home extends CI_Controller {

	public $template;
	public $body;

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('author_model');
		$this->templates = new League\Plates\Engine(APPPATH.'views/user');
	}

	public function index()
	{
		$this->body['posts']=post_model::with('author')->orderBy('date','desc')->paginate(3);
		echo $this->templates->render('home',$this->body);
	}
}
