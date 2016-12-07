<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/mymigration.php';

class Migration_Add_Interface extends  MyMigration{

        protected $table;

        public function __construct() 
        {
            $this->table = 'interface';
        }

        public function up()
        {

                $id = array(
                        'auto_increment' => TRUE,
                        'type' => 'int',
                        'constraint' => '11',
                        'null'=>FALSE,
                        'unsigned' => FALSE,
                        'primary_key'=>TRUE,
                );

                $interface=  array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                );

                 $enable =  array(
                        'type' => 'TINYINT',
                        'constraint' => '1',
                        'defaul' => 1
                );

                 $fields = array(
                        'id' => $id,
                        'interface' => $interface,
                        'enable'=>$enable
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