<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Related extends  MyMigration{


        protected $table;

        public function __construct()
        {
                $this->table='related';       
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

                $post_id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'foreign_key' => array( //relationship
                            'table' => 'post', // table to
                            'field' => 'id' // field to
                        )
                );

                 $fields = array(
                        'id' => $id,
                        'post_id'=>$post_id
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
                $this->dbforge->drop_table('related');
        }
}