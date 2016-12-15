<?php
require_once ("bootstrap.php");
use com\adytta\tokokelontong\component\PaymentComponent as PaymentComponent;
use com\adytta\tokokelontong\services\PaymentService as PaymentService;

$paymentComponent = new PaymentComponent();

$THIS_PAGE = "payment_page.php";

session_start();
$error = getSessionValue('error');
$sales_order_report = getSessionValue('sales_order_report');
clearSession('sales_order_report');
clearSession('error');
?>
<html>
<head>
</head>
<body>
    <?php
        $paymentService = new PaymentService($entityManager);
        $payments = $paymentService->listAllPayment();
        $paymentComponent->drawPaymentTable("payment_list",$payments,$ROOT_WEB.$THIS_PAGE);

        if (!empty($sales_order_report)){
            echo $sales_order_report;
        }
    ?>
</body>
</html>