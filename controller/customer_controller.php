<?php
require_once ("../bootstrap.php");
use com\adytta\tokokelontong\services\CustomerService as CustomerService;
use com\adytta\tokokelontong\component\CustomerComponent as CustomerComponent;

$customerComponent = new CustomerComponent();

$valid = false;

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    $customer_id;
    if (isset($_GET["customer_id"])){
        $customer_id = $_GET["customer_id"];
    }
    
    $return_url;
    if (isset($_GET["return_url"])){
        $return_url = $_GET["return_url"];
    }
    
    if (!empty($customer_id) && !empty($return_url)){
        $customerService = new CustomerService($entityManager);
        $customer = $customerService->getCustomerById($customer_id);
        if (!empty($customer)){
            $salesOrders = $customer->getSalesOrder();
            $_SESSION['customer_sales_order'] = $customerComponent->drawCustomerSalesTable("customer_sales",$salesOrders);
        }
        header("Location: $return_url");
        $valid = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    session_start();
    
    $customer_name = $_POST["customer_name"];
    $customer_email = $_POST["customer_email"];
    $form_id = $_POST["form_id"];
    $return_url = $_POST["return_url"];
    
    if (!empty($customer_name) && !empty($customer_email) && !empty($form_id) && !empty($return_url)){
        $customerService = new CustomerService($entityManager);
        $customer = $customerService->getCustomer($customer_name,$customer_email);
             
        header("Location: $return_url");
        $valid = true;
    }
}

if ($valid = false){
    echo "SECURITY BREACH";
}

?>