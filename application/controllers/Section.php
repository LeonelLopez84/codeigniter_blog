<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/Home.php';

class Section extends Home {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function post($id=0)
	{
		echo $id;
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */