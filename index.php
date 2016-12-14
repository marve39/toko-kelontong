<html>

<head>
</head>

<body>
  <?php
require_once ("bootstrap.php");

use com\adytta\tokokelontong\domain\Customer as Customer;
use com\adytta\tokokelontong\domain\Product as Product;
use com\adytta\tokokelontong\domain\SalesOrder as SalesOrder;
use com\adytta\tokokelontong\domain\CheckoutCart as CheckoutCart;
use com\adytta\tokokelontong\domain\Payment as Payment;

use com\adytta\tokokelontong\repositories\CustomerRepository as CustomerRepository;
use com\adytta\tokokelontong\services\TransactionService as TransactionService;

/*   $customer = $entityManager->getRepository('com\adytta\tokokelontong\domain\Customer')
->findOneBy(array('name' => "Adytta" , 'email' => 'adytta@email.me'));
if(!empty($customer)){
//       echo "CUSTOMER -> " . $customer->getId();
}else{
$customer = new Customer("Adytta","adytta@email.me");
}

$product = $entityManager->getRepository('com\adytta\tokokelontong\domain\Product')
->findOneBy(array('name' => 'product1'));

if(!empty($product)){
//      echo "PRODUCT -> " . $customer->getId();
}else{
$product = new Product("product1",10000,10);
$entityManager->persist($product);
$entityManager->flush();
}
/*
$customer = new Customer();
$customer->setName("Adytta");
$customer->setEmail("adytta@email.me");
$entityManager->persist($customer);
$entityManager->flush();*/
/*
$product = new Product();
$product->setName("product1");
$product->setPrice(10000);
$product->setStock(10);
$entityManager->persist($product);
$entityManager->flush();
*/

session_start();

$s_customer = $_SESSION['customer'];
if (isset($_SESSION['sales_order'])){
    $salesOrder = $_SESSION['sales_order'];
}else{
    $salesOrder = null;
}

if (isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
   // $_SESSION['cart'] = null;

   echo "Customer : " . $s_customer->getName() . "|" . $s_customer->getEmail();
    
    $customer = $entityManager->getRepository('com\adytta\tokokelontong\domain\Customer')
                            ->findOneBy(array('name' => $s_customer->getName() , 'email' => $s_customer->getEmail()));
    
    $product = $entityManager->getRepository('com\adytta\tokokelontong\domain\Product')
                            ->findOneBy(array('name' => $cart->getProduct()->getName()));
    
    if (!empty($product)){
        $cart->setProduct($product);
        echo "<br /> Product not empty";
    }
    
    if (empty($customer)){
        echo "<br />Empty";
        $entityManager->persist($s_customer);
        $entityManager->flush();
        $customer = $s_customer;   
    }else{
        echo "<br />Customer : " . $customer->getName() . "|" . $customer->getEmail() ."|".  $customer->getId();
  
    }
    
    $transactionService = new TransactionService($entityManager,$salesOrder,$customer);
    $salesOrder = $transactionService->addCart($cart);
    
    
    $payment = $salesOrder->getDue();
    $payment->setBank("Mandiri");

    //$salesOrder = $transactionService->doPayment($payment);
    
    echo "CUSTOMER -> " . $customer->getId() ."<br />";
   // echo "Payment = " . $salesOrder->getPayment()->getBank() ."<br />";
    echo "Product = " . $salesOrder->getCart()[0]->getProduct()->getId();
    $_SESSION['sales_order'] = $salesOrder;
    
    echo "<br />ID -> " . $salesOrder->getId();
}else{
    echo "NO Cart..";
}
?>
</body>