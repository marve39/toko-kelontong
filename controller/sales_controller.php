<?php
require_once ("../bootstrap.php");
use com\adytta\tokokelontong\services\TransactionService as TransactionService;
use com\adytta\tokokelontong\component\SalesComponent as SalesComponent;

$salesComponent = new SalesComponent();

$valid = false;

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    $sales_id;
    if (isset($_GET["sales_id"])){
        $sales_id = $_GET["sales_id"];
    }
    
    $return_url;
    if (isset($_GET["return_url"])){
        $return_url = $_GET["return_url"];
    }
    
    if (!empty($sales_id) && !empty($return_url)){
        $transactionService = new TransactionService($entityManager,"");
        $salesOrder = $transactionService->getSalesById($sales_id);
        if (!empty($salesOrder)){
            $_SESSION['sales_order_report'] = $salesComponent->drawSalesOrderTable("sales_order_report",$salesOrder);
        }
        header("Location: $return_url");
        $valid = true;
    }
}

if ($valid == false){
    echo "SECURITY BREACH";
}

?>