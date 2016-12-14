<?php
namespace com\adytta\tokokelontong\services;

use com\adytta\tokokelontong\domain\Customer as Customer;
use com\adytta\tokokelontong\domain\Product as Product;
use com\adytta\tokokelontong\domain\SalesOrder as SalesOrder;
use com\adytta\tokokelontong\domain\CheckoutCart as CheckoutCart;
use com\adytta\tokokelontong\domain\Payment as Payment;

use com\adytta\tokokelontong\repositories\CustomerRepository as CustomerRepository;
use Doctrine\ORM\EntityManager;

class TransactionService{
    /**
     *
     * @var EntityManager 
     */
     protected $em;
     protected $salesOrder;


     public function __construct(EntityManager $entityManager,$salesOrder)
    {
        $this->em = $entityManager;
        $this->salesOrder = $salesOrder;
    /*    $this->customer = $customer;
        if (empty($this->salesOrder)){
            $this->salesOrder = new SalesOrder($this->customer);
        }else{
            $salesOrder->setCustomer($this->customer);
        }*/
    }

    public function addCart($product,$qty){
        $this->salesOrder->addCart(new CheckoutCart($product,$qty));
        return $this->salesOrder;
    }

    public function doPayment($payment){
        if (!empty($this->salesOrder)){
            $this->salesOrder->doPayment($payment);
            $this->em->persist($this->salesOrder);
            $this->em->flush();
            return $this->salesOrder;
        }
    }
}


?>