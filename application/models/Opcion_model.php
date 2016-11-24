<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Opcion_model extends Eloquent {

	protected $table = 'opcion';
	public $timestamps = false;


	public function __construct()
	{
		parent::__construct();
	}

	public function subOpcion()
    {
        return $this->hasMany('Opcion_model','opcion_id', 'id');
    }

}

/* End of file Opcion_model.php */
/* Location: ./application/models/Opcion_model.php */