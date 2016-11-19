<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Categoria_model extends Eloquent {

	protected $table = 'category';
	public $timestamps = false;


	public function __construct()
	{
		parent::__construct();
	}
	

}

/* End of file Author_model.php */
/* Location: ./application/models/Author_model.php */