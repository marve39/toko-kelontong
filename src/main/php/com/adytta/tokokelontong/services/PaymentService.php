<?php
namespace com\adytta\tokokelontong\services;

use Doctrine\ORM\EntityManager;

class PaymentService{
    /**
     *
     * @var EntityManager 
     */
     protected $em;


     public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function listAllPayment(){
        return $this->em->getRepository('com\adytta\tokokelontong\domain\Payment')->findAll();
    }
}
?>