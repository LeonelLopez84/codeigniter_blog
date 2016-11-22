<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User extends  MyMigration{

        protected $table;

        public function __construct()
        {
                $this->table='user';              
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
                        'constraint' => '255',
                ); 
                $email= array(
                        'type'=>'VARCHAR',
                        'constraint' =>255,
                );

                $website = array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                );

                 $fields = array(
                        'id' => $id,
                        'name'=>$name,
                        'email'=>$email,
                        'website'=>$website

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
                $this->dbforge->drop_table('user');
        }
}