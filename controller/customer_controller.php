<?php
require_once ("../bootstrap.php");
use com\adytta\tokokelontong\services\CustomerService as CustomerService;
use com\adytta\tokokelontong\services\TransactionService as TransactionService;


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
        
        $_SESSION['customer'] = $customer;

        $transactionService = new TransactionService($entityManager,"");
        $_SESSION['sales_order'] = $transactionService->createSalesOrder($customer);

        header("Location: $return_url");
    }else{
        echo "SECURITY BREACH";
    }
}

?>