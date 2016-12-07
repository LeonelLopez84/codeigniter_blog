<?php 
    $this->layout('master');

    $this->insert('nav');
    $this->insert('default',['posts'=>$posts]);