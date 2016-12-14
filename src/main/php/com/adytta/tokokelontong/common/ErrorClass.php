<?php
namespace com\adytta\tokokelontong\common;

class ErrorClass{
    protected $id;
    protected $value;

    public function __construct($id,$value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function getId(){
        return $this->id;
    }

    public function getValue(){
        return $this->value;
    }

    public function getHTML(){
        return "<h1>$this->value</h1>";
    }
}
?>