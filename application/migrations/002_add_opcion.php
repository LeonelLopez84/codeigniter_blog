<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

                $interface_id = array(
                        'type' => 'int',
                        'constraint' => '11',
                        'null'=>FALSE,
                        'unsigned' => FALSE,
                        'primary_key'=>TRUE,
                        'foreign_key' => array(
                            'table' => 'interface', 
                            'field' => 'id'
                        )
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
                        'interface_id' => $interface_id,
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