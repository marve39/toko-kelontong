<?php
namespace com\adytta\tokokelontong\services;

use Doctrine\ORM\EntityManager;

class ProductService{
    /**
     *
     * @var EntityManager 
     */
     protected $em;


     public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getProduct($product_id){
        return $this->em->getRepository('com\adytta\tokokelontong\domain\Product')
                                ->findOneBy(array('id' => $product_id));
    }
}

?>