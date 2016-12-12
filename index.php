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

    $customer = new Customer();
    $customer->setName("Adytta");
    $customer->setEmail("adytta@email.me");
    $entityManager->persist($customer);
    $entityManager->flush();

    $product = new Product();
    $product->setName("product1");
    $product->setPrice(10000);
    $product->setStock(10);
    $entityManager->persist($product);
    $entityManager->flush();

    $cart1 = new CheckoutCart();
    $cart1->setProduct($product);
    $cart1->setQty(5);
    $cart1->setBasePrice(10000);

    $salesOrder = new SalesOrder();
    $salesOrder->setCustomer($customer);
    $salesOrder->getCart()->add($cart1);

    $entityManager->persist($salesOrder);
    $entityManager->flush();

    echo "ID -> " . $salesOrder->getId();

?>
</body>