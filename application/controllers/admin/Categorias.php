<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';

class Categorias extends Home {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categoria_model');

	}

	public function index()
	{
		$this->body['categorias']=categoria_model::orderBy('name','ASC')->get();
		echo $this->templates->render('categorias/lista',$this->body);
	}

	public function create()
	{
		echo "crear categoria";
	}

}

/* End of file Categorias.php */
/* Location: ./application/controllers/admin/Categorias.php */