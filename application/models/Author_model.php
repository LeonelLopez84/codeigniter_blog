<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Author_model extends Eloquent {

	protected $table = 'author';
	public $timestamps = false;


	public function __construct()
	{
		parent::__construct();
	}


	/*public function login($username,$password)
	{
		$this->db->select("id, username, email");
		$this->db->from($this->tablename);
		$this->db->where('username',$username);
		$this->db->where('password',MD5($password));
		$this->db->limit(1);

		$query=$this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return false;
		}

	}*/

	

}

/* End of file Author_model.php */
/* Location: ./application/models/Author_model.php */