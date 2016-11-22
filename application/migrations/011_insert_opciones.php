<?php
defined("BASEPATH") OR exit("No puedes acceder aquí directamente");
 
class Migration_Insert_Opciones extends CI_Migration
{

	protected $table;

	public function __construct()
	{
		$this->table="opcion";
		//Do your magic here
	}
 
	public function up()
	{
		//creamos un array con los datos del usuario
		$rows[]=array(
							"id"=>1,
							"opcion"=>"Autores",
							'enabled'=>1,
							'opcion_id'=>0,
						);
		$rows[]=array(
							"id"=>2,
							"opcion"=>"Categorias",
							'enabled'=>1,
							'opcion_id'=>0,
						);

		$rows[]=array(
							"id"=>3,
							"opcion"=>"Post",
							'enabled'=>1,
							'opcion_id'=>0,
						);
		$rows[]=array(
							"opcion"=>"Todos los Autores",
							'enabled'=>1,
							'opcion_id'=>1,
						);
		$rows[]=array(
							"opcion"=>"Nuevo",
							'enabled'=>1,
							'opcion_id'=>1,
						);

		$rows[]=array(
							"opcion"=>"Todas las Categorias",
							'enabled'=>1,
							'opcion_id'=>2,
						);
		$rows[]=array(
							"opcion"=>"Nueva",
							'enabled'=>1,
							'opcion_id'=>2,
						);
		$rows[]=array(
							"opcion"=>"Todos los Post",
							'enabled'=>1,
							'opcion_id'=>3,
						);
		$rows[]=array(
							"opcion"=>"Nuevo",
							'enabled'=>1,
							'opcion_id'=>3,
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