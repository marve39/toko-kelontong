<?php

namespace com\adytta\tokokelontong\domain;

use Doctrine\Common\Collections\ArrayCollection;
use com\adytta\tokokelontong\domain\Payment as Payment;

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

  /** @OneToMany(targetEntity="CheckoutCart", mappedBy="salesOrder", cascade={"persist"}, fetch="EXTRA_LAZY") 
  *   @JoinColumn(name="cart_id", referencedColumnName="id", nullable=false)
  */
  protected $cart;
  /** @ManyToOne(targetEntity="Customer", inversedBy="salesOrders", cascade={"persist"}, fetch="EXTRA_LAZY") 
  *   @JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
  */
  protected $customer;
  /** @OneToOne(targetEntity="Payment", inversedBy="salesOrder",cascade={"persist"}, fetch="EXTRA_LAZY") 
  *   @JoinColumn(name="payment_id", referencedColumnName="id", nullable=false)
  */
  protected $payment;

  public function __construct($customer) {
        $this->cart = new ArrayCollection();
        $this->customer = $customer;
        $this->date = new \DateTime("now");
  }

  public function getId(){
    return $this->id;
  }

  public function getCart(){
    return $this->cart;
  }

  public function addCart($cart){
    $this->cart->add($cart);
    $this->price = $this->price + $cart->getTotalPrice();
  }

  public function getCustomer(){
    return $this->customer;
  }

  public function getPayment(){
    return $this->payment;
  }

  public function doPayment($payment){
    $this->payment = $payment;
  }

  public function getDue(){
    return new Payment($this->price);
  }
}

?>