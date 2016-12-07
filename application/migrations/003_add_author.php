<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Author extends  MyMigration{

        protected $table;

        public function __construct()
        {
                $this->table='author';
                
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

                $username = array(
                        'type' => 'VARCHAR',
                        'constraint' => '45',
                );

                $email = array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                );

                $password = array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                );

                $first_name = array(
                        'type' => 'VARCHAR',
                        'constraint' => '45',
                );

                $last_name = array(
                        'type'=>'VARCHAR',
                        'constraint' => '45',
                        'default'=>1
                );

                $fields = array(
                        'id' => $id,
                        'username' => $username,
                        'password' => $password,
                        'email' => $email,
                        'first_name' => $first_name,
                        'last_name' => $last_name
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