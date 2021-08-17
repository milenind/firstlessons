<?php
require 'GuestBook.php';
class View
{
    protected array $data = [];
    public function assign($name,$value){
        $this->data[$name] = $value;
    }
    public function display(){
        include '../seventh/seventhview.php';
    }
}