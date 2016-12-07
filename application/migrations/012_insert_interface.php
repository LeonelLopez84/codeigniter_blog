<?php
defined("BASEPATH") OR exit("No puedes acceder aquí directamente");
 
class Migration_Insert_Interface extends CI_Migration
{

	protected $table;

	public function __construct()
	{
		$this->table="interface";
		//Do your magic here
	}
 
	public function up()
	{
		//creamos un array con los datos del usuario
		$rows[]=array(
							"id"=>1,
							"interface"=>"Admin",
							'enable'=>1
						);
		$rows[]=array(
							"id"=>2,
							"interface"=>"User",
							'enable'=>1
						);

		//ingresamos el registro en la base de datos
		
		foreach ($rows as $row) {

			$this->db->insert($this->table, $row);	
		}
		
 
	}
 
	public function down()
	{
		//hacemos lo opuesto al método up, eliminamos el usuario admin
	
		//$this->db->delete($this->table);
 
	}
 
}