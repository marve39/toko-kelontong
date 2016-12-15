<?php
namespace com\adytta\tokokelontong\domain;

/**
* @Entity 
* @Table (name = "procurement") 
*/
class Procurement{
    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;
    /** @Column(type="string") */
    protected $name;
    /** @Column(type="integer") */
    protected $qty;
     /** @Column(type="datetime") */
    protected $date;
    /** @ManyToOne(targetEntity="Product", inversedBy="procurement", fetch="EXTRA_LAZY") 
    *   @JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
    */
    protected $product;

    public function __construct($name,$product,$qty) {
        $this->date = new \DateTime("now");
        $this->name = $name;
        $this->product = $product;
        $this->qty = $qty;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getQty(){
        return $this->qty;
    }

    public function getProduct(){
        return $this->product;
    }

    public function getDateString(){
        return $this->date->format('d-m-Y H:i:s');;
    }
}
?>