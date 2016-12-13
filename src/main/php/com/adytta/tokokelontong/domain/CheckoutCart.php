<?php

namespace com\adytta\tokokelontong\domain;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity 
* @Table (name = "cart") 
*/
class CheckoutCart {

  /** @Id @Column(type="integer") @GeneratedValue */
  protected $id;
  
  /** @ManyToOne(targetEntity="Product") 
  *   @JoinColumn(name="product_id", referencedColumnName="id", unique=false)
  */
  protected $product;

  /** @Column(type="integer") */
  protected $qty;
  /** @Column(type="bigint") */
  protected $basePrice;
  /** @Column(type="bigint") */
  protected $totalPrice;  

  /** @ManyToOne(targetEntity="SalesOrder", inversedBy="cart", fetch="EXTRA_LAZY") */
  protected $salesOrder;

  public function __construct($product,$qty) {
        $this->cart = new ArrayCollection();
        $this->product = $product;
        $this->qty = $qty;
        $this->basePrice = $product->getPrice();
        $this->totalPrice = $this->basePrice * $this->qty;
  }

  public function getId(){
    return $this->id;
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

  public function getTotalPrice(){
    return $this->totalPrice;
  }

}

?>