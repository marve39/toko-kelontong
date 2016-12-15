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

  /** @OneToMany(targetEntity="CheckoutCart", mappedBy="product")
  */
  protected $cart;
  /** @OneToMany(targetEntity="Procurement", mappedBy="product") 
  */
  protected $procurement;

  public function __construct($name,$price,$stock) {
        $this->cart = new ArrayCollection();
        $this->procurement = new ArrayCollection();
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

  public function addStock($qty){
    $this->stock = $this->stock + $qty;
  }

  public function reduceStock($qty){
    $this->stock = $this->stock - $qty;
  }

  public function getProcurement(){
    return $this->procurement;
  }

  public function getCart(){
    return $this->cart;
  }

}

?>