<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Category extends  MyMigration{


        protected $table;

        public function __construct()
        {
                $this->table='category';                
        }


        public function up()
        {

                $id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'auto_increment' => TRUE,
                        'primary_key'=>TRUE
                );

                $name = array(
                        'type' => 'VARCHAR',
                        'constraint' => '45',
                );

                $enabled = array(
                        'type'=>'TINYINT',
                        'constraint' => 1,
                        'default'=>1
                );

                $date_created = array(
                        'type' => 'TIMESTAMP', 
                );

                $fields = array(
                        'id' => $id,
                        'name'=>$name,
                        'enabled'=>$enabled,
                        'date_created'=>$date_created
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