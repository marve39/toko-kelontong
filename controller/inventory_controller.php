<?php
require_once ("../bootstrap.php");
use com\adytta\tokokelontong\services\InventoryService as InventoryService;
use com\adytta\tokokelontong\services\TransactionService as TransactionService;

use com\adytta\tokokelontong\component\InventoryComponent as InventoryComponent;

$inventoryComponent = new InventoryComponent();

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    $product_id;
    if (isset($_GET["product_id"])){
        $product_id = $_GET["product_id"];
    }

    $return_url;
    if (isset($_GET["return_url"])){
        $return_url = $_GET["return_url"];
    }

    if (!empty($product_id) && !empty($return_url)){
        $transactionService = new TransactionService($entityManager,"");
        $carts = $transactionService->getCarts($product_id);

        $_SESSION['product_sales_report'] = $inventoryComponent->drawProductSalesTable("product_sales",$carts);
        
        $inventoryService = new InventoryService($entityManager);
        $procurements = $inventoryService->getProduct($product_id)->getProcurement();

        $_SESSION['product_procurement_report'] = $inventoryComponent->drawProductProcurementTable("product_procurement",$procurements);

      //$inventoryService = new InventoryService($entityManager);
      //$product =  $inventoryService->getProduct($product_id);
    //  var_dump($carts->getCart());
    //echo sizeof($carts);
  /*  foreach($product->getCart() as $cart){
        echo ($cart->getSalesOrder()->getId());
    }*/
     //   $_SESSION['product_list'] = $carts;
        header("Location: $return_url");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    session_start();

    $valid = false;

    $product_name;
    if (isset($_POST["product_name"])){
        $product_name = $_POST["product_name"];
    }
    $product_price;
    if (isset($_POST["product_price"])){
        $product_price = $_POST["product_price"];
    }

    $procurement_vendorname;
    if (isset($_POST["procurement_vendorname"])){
        $procurement_vendorname = $_POST["procurement_vendorname"];
    }
    $procurement_productcode;
    if (isset($_POST["procurement_productcode"])){
        $procurement_productcode = $_POST["procurement_productcode"];
    }
    $procurement_productqty;
    if (isset($_POST["procurement_productqty"])){
        $procurement_productqty = $_POST["procurement_productqty"];
    }

    $form_id = $_POST["form_id"];
    $return_url = $_POST["return_url"];

    if (!empty($product_name) && !empty($product_price) && !empty($form_id) && !empty($return_url)){
        $inventoryService = new InventoryService($entityManager);
        $inventoryService->addProduct($product_name,$product_price);
        header("Location: $return_url");
        $valid = true;
    }

    if (!empty($procurement_vendorname) && !empty($procurement_productcode) && !empty($procurement_productqty) && !empty($form_id) && !empty($return_url)){
        $inventoryService = new InventoryService($entityManager);
        $inventoryService->addNewProcurement($procurement_vendorname,$procurement_productcode,$procurement_productqty);
        header("Location: $return_url");
        $valid = true;
    }
    
    if ($valid == false){
        echo "SECURITY BREACH";
    }
}
?>