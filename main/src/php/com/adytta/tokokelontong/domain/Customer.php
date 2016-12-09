<?php
namespace com\adytta\tokokelontong\domain;

use com\adytta\tokokelontong\domain\DomainClass as DomainClass;

class Customer extends DomainClass {
  public function __construct($attributes = Array()){
      parent::__construct($attributes);
  }
}

?>