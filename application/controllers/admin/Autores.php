<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';

class Autores extends Home {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo $this->templates->render('autores/autores',$this->body);
	}

	public function create()
	{
		echo $this->templates->render('autores/autores',$this->body);
	}

}

/* End of file Autores.php */
/* Location: ./application/controllers/admin/Autores.php */