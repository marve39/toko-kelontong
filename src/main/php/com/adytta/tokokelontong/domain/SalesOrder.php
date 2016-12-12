<?php

namespace com\adytta\tokokelontong\domain;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity 
* @Table (name = "sales_order") 
*/
class SalesOrder {
 
  /** @Id @Column(type="integer") @GeneratedValue */
  protected $id;
  
  /** @Column(type="bigint") */
  protected $price;
  /** @Column(type="datetime") */
  protected $date;

  /** @OneToMany(targetEntity="CheckoutCart", mappedBy="salesOrder", fetch="EXTRA_LAZY") */
  protected $cart;
  /** @ManyToOne(targetEntity="Customer", inversedBy="salesOrders", fetch="EXTRA_LAZY") */
  protected $customer;
  /** @OneToOne(targetEntity="Payment", mappedBy="salesOrder", fetch="EXTRA_LAZY") */
  protected $payment;

  public function __construct() {
        $this->cart = new ArrayCollection();
  }

  public function getId(){
    return $this->id;
  }

  public function getCart(){
    return $this->cart;
  }

  public function setCustomer($customer){
    $this->customer = $customer;
  }

  public function getCustomer(){
    return $this->customer;
  }

  public function getPayment(){
    return $this->payment;
  }

  public function setPayment($payment){
    $this->payment = $payment;
  }
}

?>