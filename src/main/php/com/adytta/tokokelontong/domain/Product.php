<?php

namespace com\adytta\tokokelontong\domain;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity 
* @Table (name = "products") 
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
  /** @OneToMany(targetEntity="CheckoutCart", mappedBy="product") */
  protected $cart;

  public function __construct($name,$price,$stock) {
        $this->cart = new ArrayCollection();
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
  }

  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
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

}

?>