<?php
namespace com\adytta\tokokelontong\services;

use com\adytta\tokokelontong\domain\Customer as Customer;
use Doctrine\ORM\EntityManager;

class CustomerService{
    /**
     *
     * @var EntityManager 
     */
     protected $em;
     protected $salesOrder;


     public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getCustomer($name,$email){
        $customer = $this->em->getRepository('com\adytta\tokokelontong\domain\Customer')
                            ->findOneBy(array('name' => $name , 'email' => $email));
        if (empty($customer)){
            $customer = new Customer($name,$email);
            $this->em->persist($customer);
            $this->em->flush();
        }
        return $customer;
    }

    public function getCustomerById($id){
         return $this->em->getRepository('com\adytta\tokokelontong\domain\Customer')
                            ->findOneBy(array('id' => $id));
    }

    public function listAllCustomer(){
        return $this->em->getRepository('com\adytta\tokokelontong\domain\Customer')->findAll();
    }
}
?>