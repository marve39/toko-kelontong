<?php
require_once ("bootstrap.php");
use com\adytta\tokokelontong\component\InventoryComponent as InventoryComponent;
use com\adytta\tokokelontong\services\InventoryService as InventoryService;

$inventoryComponent = new InventoryComponent();

$THIS_PAGE = "inventory_page.php";

session_start();
$error = getSessionValue('error');
$product_sales_report = getSessionValue('product_sales_report');
$product_procurement_report = getSessionValue('product_procurement_report');
clearSession('product_sales_report');
clearSession('product_procurement_report');
?>
<html>
<head>
</head>
<body>
    <?php
      //  echo sizeof($product_report);
      //  echo $product_report->getCart()[0]->getSalesOrder()->getId;
        $inventoryService = new InventoryService($entityManager);
        $products = $inventoryService->listAllProduct();
        $inventoryComponent->drawNewProductForm("product_input",$ROOT_WEB."controller/inventory_controller.php",$ROOT_WEB.$THIS_PAGE,$error);
        $inventoryComponent->drawNewProcurementForm("procurement_input",$ROOT_WEB."controller/inventory_controller.php",$ROOT_WEB.$THIS_PAGE,$error);
        $inventoryComponent->drawProductTable("product_list",$products,$ROOT_WEB.$THIS_PAGE);

        if (!empty($product_sales_report)){
            echo $product_sales_report;
            echo $product_procurement_report;
           // $inventoryComponent->drawProductSalesTable("product_sales",$product_report);
        }
    ?>
</body>
</html>