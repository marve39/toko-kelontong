<?php
namespace com\adytta\tokokelontong\services;
use com\adytta\tokokelontong\domain\Product as Product;
use com\adytta\tokokelontong\domain\Procurement as Procurement;

use Doctrine\ORM\EntityManager;

class InventoryService{
    /**
     *
     * @var EntityManager 
     */
     protected $em;


     public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function addProduct($name,$price){
        $product = new Product($name,$price,0);
        $this->em->persist($product);
        $this->em->flush();
    }

    public function addNewProcurement($vendorname,$productcode,$qty){
        $product = $this->em->getRepository('com\adytta\tokokelontong\domain\Product')
                                ->findOneBy(array('id' => $productcode));
        if (!empty($product)){
            $product->addStock($qty);
            $this->em->merge($product);
            $this->em->flush();

            $procurement = new Procurement($vendorname,$product,$qty);
            $this->em->persist($procurement);
            $this->em->flush();
        }
    }

    public function getProduct($product_id){
        $product = $this->em->getRepository('com\adytta\tokokelontong\domain\Product')
                                ->findOneBy(array('id' => $product_id));
        return $product;
    }

    public function listAllProduct(){
        return $this->em->getRepository('com\adytta\tokokelontong\domain\Product')->findAll();
    }
}

?>