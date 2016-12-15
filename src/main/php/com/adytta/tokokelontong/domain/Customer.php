<?php
namespace com\adytta\tokokelontong\domain;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity
* @Table (name = "customer", 
*         uniqueConstraints={@UniqueConstraint(name="search_idx_customer", columns={"name", "email"})}) 
*/
class Customer {
  
  /** @Id @Column(type="integer") @GeneratedValue */
  protected $id;
   /** @Column(name="name", type="string") */
  protected $name;

  
  /** @Column(name="email", type="string") */
  protected $email;

  /**
  * @OneToMany(targetEntity="SalesOrder", mappedBy="customer", fetch="EXTRA_LAZY")
  */
  protected $salesOrder;

  public function __construct($name,$email) {
        $this->salesOrder = new ArrayCollection();
        $this->name = $name;
        $this->email = $email;
  }

  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }

  public function getSalesOrder(){
    return $this->salesOrder;
  }

  public function getEmail(){
    return $this->email;
  }

}

?>