<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/admin/Home.php';

class Post extends Home {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "todos los post";
	}

	public function create()
	{
		echo "nuevo post";
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/admin/Post.php */