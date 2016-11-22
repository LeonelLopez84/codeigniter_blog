<?php
defined("BASEPATH") OR exit("No puedes acceder aquí directamente");
 
class Migration_Insert_Admin_User extends CI_Migration
{
	protected $table;

	public function __construct()
	{
		$this->table="author";
		parent::__construct();
		//Do your magic here
	}
 
	public function up()
	{
		//creamos un array con los datos del usuario
		$data_user = array(
			"username"=>"admin",
			"password"=>md5("123"),
			"email"=>"admin@domain.example",
			"first_name"=>"admin",
			"last_name"=>"domain"
		);
		//ingresamos el registro en la base de datos
		$this->db->insert($this->table, $data_user);
 
	}
 
	public function down()
	{
		//hacemos lo opuesto al método up, eliminamos el usuario admin
		$this->db->where("username","admin");
		$this->db->delete($this->table);
 
	}
 
}