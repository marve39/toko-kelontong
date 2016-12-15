<?php
require_once ("bootstrap.php");
use com\adytta\tokokelontong\component\CustomerComponent as CustomerComponent;
use com\adytta\tokokelontong\services\CustomerService as CustomerService;

$customerComponent = new CustomerComponent();

$THIS_PAGE = "customer_page.php";
session_start();
$error = getSessionValue('error');
clearSession('error');
$customer_sales_order = getSessionValue('customer_sales_order');
clearSession('customer_sales_order');

?>

<html>
<head>
</head>
<body>
    <?php
        $customerComponent->drawNewCustomerComponent("customer_input",$ROOT_WEB."controller/customer_controller.php",$ROOT_WEB.$THIS_PAGE,$error);
        
        $customerService = new CustomerService($entityManager);
        $customers = $customerService->listAllCustomer();
        $customerComponent->drawCustomerTable("customer_list",$customers,$ROOT_WEB.$THIS_PAGE);
        if (!empty($customer_sales_order)){
            echo $customer_sales_order;
        }
    ?>
</body>
</html>