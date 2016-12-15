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
    /** @Column(type="integer", nullable=true) */
    protected $transactionNumber;

    public function __construct($billAmount) {
        $this->cart = new ArrayCollection();
        $this->billAmount = $billAmount;
  }

    public function getId(){
        return $this->id;
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

    public function setTransactionNumber($transactionNumber){
         $this->transactionNumber = $transactionNumber;
    }

    public function getTransactionNumber(){
        return $this->transactionNumber;
    }
}

?>