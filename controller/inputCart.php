<?php
require_once ("../bootstrap.php");
use com\adytta\tokokelontong\services\TransactionService as TransactionService;
use com\adytta\tokokelontong\services\ProductService as ProductService;
use com\adytta\tokokelontong\common\ErrorClass as ErrorClass;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    session_start();
    $salesOrder = getSessionValue('sales_order');
    
    $product_id = $_POST["product_id"];
    $form_id = $_POST["form_id"];
    $return_url = $_POST["return_url"];
    
    if (!empty($product_id) && !empty($return_url) && !empty($salesOrder) && !empty($form_id)){
        $transactionService = new TransactionService($entityManager,$salesOrder);
        $productService = new ProductService($entityManager);

        $product = $productService->getProduct($product_id);
        if (!empty($product)){
            $_SESSION['sales_order'] = $transactionService->addCart($product,1);
        }else{
            $_SESSION['error'] = new ErrorClass($form_id,"Product Not Found");
        }
        header("Location: $return_url");
    }else{
        echo "SECURITY BREACH";
    }
}


?>