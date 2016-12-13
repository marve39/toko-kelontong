<?php
    namespace com\adytta\tokokelontong\repositories;

    use Doctrine\ORM\EntityRepository;

    class CustomerRepository extends EntityRepository {

        public function getCustomerByEmail($email){
            return $this->_em->createQuery("SELECT a FROM com\adytta\tokokelontong\domain\Customer a WHERE a.name = ?1")
                        ->setParameter(1,"Adytta")
                        ->getResult();
        }
    }
?> 