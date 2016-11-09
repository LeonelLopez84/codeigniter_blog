<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';

class Categorias extends Home {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "todas las categorias";
	}

	public function create()
	{
		echo "crear categoria";
	}

}

/* End of file Categorias.php */
/* Location: ./application/controllers/admin/Categorias.php */