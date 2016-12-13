<?php

namespace com\adytta\tokokelontong\domain;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity 
* @Table (name = "payment") 
*/
class Payment{
    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @OneToOne(targetEntity="SalesOrder", mappedBy="payment") */
    protected $salesOrder;
    /** @Column(type="bigint") */
    protected $billAmount;
    /** @Column(type="string") */
    protected $bank;

    public function __construct($billAmount) {
        $this->cart = new ArrayCollection();
        $this->billAmount = $billAmount;
  }

    public function getId(){
        return $this->Id;
    }

    public function getSalesOrder(){
        return $this->salesOrder;
    }

    public function getBillAmount(){
        return $this->billAmount;
    }

    public function setBillAmount($billAmount){
        $this->billAmount = $billAmount;
    }

    public function getBank(){
        return $this->bank;
    }

    public function setBank($bank){
        $this->bank = $bank;
    }
}

?>