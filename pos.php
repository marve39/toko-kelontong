<?php
require_once ("bootstrap.php");
use com\adytta\tokokelontong\component\CheckoutCartComponent as CheckoutCartComponent;
use com\adytta\tokokelontong\component\CustomerComponent as CustomerComponent;
use com\adytta\tokokelontong\component\PaymentComponent as PaymentComponent;

$checkoutCartComponent = new CheckoutCartComponent();
$customerComponent = new CustomerComponent();
$paymentComponent = new PaymentComponent();

$THIS_PAGE = "pos.php";

session_start();

$salesOrder = getSessionValue('sales_order');
$error = getSessionValue('error');
$customer = getSessionValue('customer');
clearSession('error');

?>
<html>
<head>
</head>
<body>
    <?php

        if (!empty($customer)){
            echo $customerComponent->drawCustomerInfoComponent("customer_input",$customer);

            if (!empty($salesOrder)){    
                echo $checkoutCartComponent->drawInputCartForm("input_cart",$ROOT_WEB."controller/cart_controller.php",$ROOT_WEB.$THIS_PAGE,$error);
                if (empty($error)){
                    clearSession('error');
                }
                echo $checkoutCartComponent->drawSummary("cart",$salesOrder);
                echo $checkoutCartComponent->drawTotalPrice("cart_total_price",$salesOrder);

                echo $paymentComponent->drawPaymentForm("payment_input",$ROOT_WEB."controller/payment_controller.php",$ROOT_WEB.$THIS_PAGE,$error);
            }
        }else{
            echo $customerComponent->drawNewCustomerComponent("customer_input",$ROOT_WEB."controller/customer_controller.php",$ROOT_WEB.$THIS_PAGE,$error,true);
        }
    ?>
</body>
</html>