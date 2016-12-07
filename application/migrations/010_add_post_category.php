<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Post_category extends  MyMigration{


        protected $table;

        public function __construct()
        {
                $this->table='post_category';
        }

        public function up()
        {

                $id= array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'auto_increment' => TRUE,
                        'primary_key'=>true
                );

                $category_id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'null'=>false,
                        'primary_key'=>true,
                        'foreign_key' => array( //relationship
                            'table' => 'category', // table to
                            'field' => 'id' // field to
                        )
                );

                $post_id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'null'=>false,
                        'primary_key'=>true,
                        'foreign_key' => array( //relationship
                            'table' => 'post', // table to
                            'field' => 'id' // field to
                        )
                );

               $fields = array(
                        'id' => $id,
                        'post_id'=>$post_id,
                        'category_id'=>$category_id,
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