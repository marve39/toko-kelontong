<?php

namespace com\adytta\tokokelontong\domain;

/**
* @Entity 
* @Table (name = "payment") 
*/
class Payment{
    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;

    /** @OneToOne(targetEntity="SalesOrder", inversedBy="payment") */
    protected $salesOrder;
    protected $billAmount;
    protected $bank;

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
        $this->bank($bank);
    }
}

?>