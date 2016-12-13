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

    $customer = $entityManager->getRepository('com\adytta\tokokelontong\domain\Customer')
                              ->findOneBy(array('name' => "Adytta" , 'email' => 'adytta@email.me'));
    if(!empty($customer)){
 //       echo "CUSTOMER -> " . $customer->getId();
    }else{
        $customer = new Customer();
        $customer->setName("Adytta");
        $customer->setEmail("adytta@email.me");
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
    
 

    $salesOrder = new SalesOrder($customer);
    
    $cart1 = new CheckoutCart($product,5);
    $salesOrder->addCart($cart1);

    $payment = $salesOrder->getDue();
    $payment->setBank("Mandiri");

    $salesOrder->doPayment($payment);
    $entityManager->persist($salesOrder);
    $entityManager->flush();

    echo "CUSTOMER -> " . $customer->getId() ."<br />";
    echo "PRODUCT -> " . $customer->getId() ."<br />";
    echo "Payment = " . $salesOrder->getPayment()->getBank() ."<br />";

    

    echo "ID -> " . $salesOrder->getId();
?>
</body>