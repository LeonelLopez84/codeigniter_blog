<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/mymigration.php';

class Migration_Add_Opcion extends  MyMigration{

        protected $table;

        public function __construct() 
        {
            $this->table = 'opcion';
        }

        public function up()
        {

                $id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE,
                         'primary_key' => TRUE
                );

                $opcion =  array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                );

                $enabled =  array(
                        'type' => 'TINYINT',
                        'constraint' => '1',
                        'defaul' => 1
                );

                $opcion_id = array(
                        'type' => 'INT',
                        'constraint' => '11',
                        'default'=>0,
                         'primary_key' => TRUE
                );

                 $fields = array(
                        'id' => $id,
                        'opcion' => $opcion,
                        'enabled' => $enabled,
                        'opcion_id' => $opcion_id
                );

                $config = array(
                        'table' => $this->table,
                        'fields' => $fields,
                        'innodb' => TRUE 
                );

            $this->create_table($config);
        }

        public function down()
        {
                $this->dbforge->drop_table($this->table);
        }
}