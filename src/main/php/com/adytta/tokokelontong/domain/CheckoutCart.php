<?php

namespace com\adytta\tokokelontong\domain;

/**
* @Entity 
* @Table (name = "cart") 
*/
class CheckoutCart {

  /** @Id @Column(type="integer") @GeneratedValue */
  protected $id;
  
  /** @OneToOne(targetEntity="Product") */
  protected $product;

  /** @Column(type="integer") */
  protected $qty;
  /** @Column(type="bigint") */
  protected $basePrice;
  /** @Column(type="bigint") */
  protected $totalPrice;  

  /** @ManyToOne(targetEntity="SalesOrder", inversedBy="cart", fetch="EXTRA_LAZY") */
  protected $salesOrder;

  public function getId(){
    return $this->id;
  }

  public function setProduct($product){
    $this->product = $product;
  }

  public function getProduct(){
    return $this->product;
  }

  public function getSalesOrder(){
    return $this->salesOrder;
  }

  public function getQty(){
    return $this->qty;
  }

  public function setQty($qty){
    $this->qty = $qty;
  }

  public function getBasePrice(){
    return $this->basePrice;
  }

  public function setBasePrice($basePrice){
    $this->basePrice = $basePrice;
  }

  public function getTotalPrice(){
    return $this->totalPrice;
  }

  public function setTotalPrice($totalPrice){
    $this->totalPrice = $totalPrice;
  }
}

?>