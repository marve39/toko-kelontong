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

    public function createSalesOrder($customer){
        return new SalesOrder($customer);
    }

    public function addCart($product,$qty){
        $this->salesOrder->addCart(new CheckoutCart($product,$qty));
        return $this->salesOrder;
    }

    public function getCarts($product_id){
        return $this->em->getRepository('com\adytta\tokokelontong\domain\CheckoutCart')
                                ->findBy(array('product' => $product_id));
    }

    public function doPayment($payment){
        if (!empty($this->salesOrder)){
           /* $customer = $this->em->getRepository('com\adytta\tokokelontong\domain\Customer')
                                    ->findOneBy(array('name' => $this->salesOrder->getCustomer()->getName() , 'email' => $this->salesOrder->getCustomer()->getEmail()));
           
            if (!empty($customer)){
                $this->salesOrder->setCustomer($customer);
            }*/
            $this->salesOrder->setCustomer($this->em->merge($this->salesOrder->getCustomer()));
            foreach($this->salesOrder->getCart() as $cart){
                $product = $cart->getProduct();
                $product->reduceStock($cart->getQty());
                $product = $this->em->merge($product);
                $cart->setProduct($product);
            }
            $this->salesOrder->doPayment($payment);
            $this->em->persist($this->salesOrder);
            

            foreach($this->salesOrder->getCart() as $cart){
                $cart->setSalesOrder($this->salesOrder);
                $this->em->merge($cart);
            }
            $this->em->flush();
           
            return $this->salesOrder;
        }
    }

    public function getSalesById($id){
         return $this->em->getRepository('com\adytta\tokokelontong\domain\SalesOrder')
                            ->findOneBy(array('id' => $id));
    }
}


?>