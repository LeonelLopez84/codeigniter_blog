<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Post_model extends Eloquent {

	protected $table = 'post';
	public $timestamps = false;


	public function __construct()
	{
		parent::__construct();
	}
	

}

/* End of file Author_model.php */
/* Location: ./application/models/Author_model.php */