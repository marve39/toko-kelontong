<?php

namespace com\adytta\tokokelontong\domain;

/**
* @Entity 
* @Table (name = "products", uniqueConstraints={@UniqueConstraint(name="search_idx_product", columns={"name"})}) 
*/
class Product {

  /** @Id @Column(type="integer") @GeneratedValue */
  protected $id;
  /** @Column(type="string") */
  protected $name;
  /** @Column(type="bigint") */
  protected $price;
  /** @Column(type="integer") */
  protected $stock;

  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function getPrice(){
    return $this->price;
  }

  public function setPrice($price){
    $this->price = $price;
  }

  public function getStock(){
    return $this->stock;
  }

  public function setStock($stock){
    $this->stock = $stock;
  }
}

?>