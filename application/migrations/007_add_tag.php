<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Tag extends  MyMigration{

        protected $table;

        public function __construct()
        {
                $this->table='tag';                
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

                $tag = array(
                        'type'=>'VARCHAR',
                        'constraint' => 255,
                );

                $tag_clean = array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                ); 

                $post_id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'primary_key'=>TRUE,
                        'foreign_key' => array( 
                            'table' => 'post', 
                            'field' => 'id' 
                        )
                );

                 $fields = array(
                        'id' => $id,
                        'tag'=>$tag,
                        'tag_clean'=>$tag_clean,
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
                $this->dbforge->drop_table($this->table);
        }
}