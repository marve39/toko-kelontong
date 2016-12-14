<?php
    require_once ("bootstrap.php");

    use com\adytta\tokokelontong\domain\Customer as Customer;
    use com\adytta\tokokelontong\domain\Product as Product;
    use com\adytta\tokokelontong\domain\SalesOrder as SalesOrder;
    use com\adytta\tokokelontong\domain\CheckoutCart as CheckoutCart;
    use com\adytta\tokokelontong\domain\Payment as Payment;

    
    $customer = new Customer("Adytta","adytta@email.me");
    $product = new Product("product1",10000,10);
    $cart = new CheckoutCart($product,5);

    session_start();
    $_SESSION['cart'] = $cart;
    $_SESSION['customer'] = $customer;

    echo "Already Submit";
?>