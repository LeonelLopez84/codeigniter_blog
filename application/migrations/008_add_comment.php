<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Add_Comment extends  MyMigration{


        protected $table;

        public function __construct()
        {
                $this->table='comment';
        }

        public function up()
        {
                $id = array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'unsigned' => FALSE,
                        'null'=>FALSE,
                        'auto_increment' => TRUE,
                        'primary_key'=>TRUE
                );

                $comment = array(
                        'type' => 'TEXT',
                        'null'=>FALSE
                );

                $mark_read = array(
                        'type'=>'TINYINT',
                        'constraint'=>1,
                        'null'=>FALSE,
                        'default'=>0
                );

                $enabled = array(
                        'type'=>'TINYINT',
                        'constraint'=>1,
                        'null'=>FALSE,
                        'default'=>1
                );

                $date = array(
                        'type'=>'TIMESTAMP',
                        'null'=>FALSE,
                );

                $is_repply_to_id = array(
                        'type'=>'INT',
                        'constraint' => 11,
                        'null'=>FALSE,
                        'default'=>0
                );

                $post_id = array(
                        'type' => 'int',
                        'constraint' => '11',
                        'null'=>FALSE,
                        'unsigned' => FALSE,
                        'primary_key'=>TRUE,
                        'foreign_key' => array(
                            'table' => 'post', 
                            'field' => 'id'
                        )
                );
                $user_id = array(
                        'type'=>'INT',
                        'constraint'=>11,
                        'unsigned' => FALSE,
                        'null'=>FALSE,
                        'primary_key'=>false,
                        'foreign_key' => array( 
                            'table' => 'user', 
                            'field' => 'id'
                        )
                );

                $fields = array(
                        'id' => $id,
                        'comment'=>$comment,
                        'mark_read'=>$mark_read,
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'is_repply_to_id'=>$is_repply_to_id,
                        'enabled'=>$enabled,
                        'date'=>$date
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