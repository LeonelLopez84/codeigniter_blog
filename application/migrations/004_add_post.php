<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Post extends  MyMigration{


        protected $table;

        public function __construct()
        {
                $this->table='post';                
        }

        public function up()
        {

                $id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'auto_increment' => TRUE,
                        'null'=>false, 
                        'primary_key'=>TRUE
                );

                $title = array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                );

                $article = array(
                        'type'=>'TEXT',
                );

                $title_clean = array(
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                );

                $featured = array(
                        'type' => 'TINYINT',
                        'constraint' => 1,
                        'default'=>0
                );

                $enabled = array(
                        'type' => 'TINYINT',
                        'constraint' => 1,
                        'default'=>1
                );

                $date = array(
                        'type' => 'TIMESTAMP',
                        'null'=>false
                );

                $views = array(
                        'type' => 'INT',
                        'constraint' => 11,
                );

                $author_id = array(
                        'type' => 'INT',
                        'constraint' =>11,
                        'unsigned' => FALSE,
                        'primary_key'=>TRUE,
                        'foreign_key' => array( //relationship
                            'table' => 'author', // table to
                            'field' => 'id' // field to
                        )
                       
                );

                 $fields = array(
                        'id' => $id,
                        'title'=> $title,
                        'article'=> $article,
                        'banner'=> $banner,
                        'featured' => $featured,
                        'enabled' => $enabled,
                        'views'=> $views,
                        'author_id' => $author_id
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