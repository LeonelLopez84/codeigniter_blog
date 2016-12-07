<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $template;
	public $body;

	public function __construct()
	{
		
		parent::__construct();
		$this->templates = new League\Plates\Engine(APPPATH.'views/user');
	}

	public function index()
	{
		echo $this->templates->render('home');
	}
}
