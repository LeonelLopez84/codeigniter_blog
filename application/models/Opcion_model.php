<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Opcion_model extends Eloquent {

	protected $table = 'opcion';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

}

/* End of file Opcion_model.php */
/* Location: ./application/models/Opcion_model.php */