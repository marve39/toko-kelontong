<?php
namespace com\adytta\tokokelontong\component;

//use com\adytta\tokokelontong\component\CheckoutCartComponent as CheckoutCartComponent;

class SalesComponent{
    public function drawSalesOrderTable($div_id,$salesOrder){
        $strTable = "<div class='".$div_id."'>\n";
        $strTable = $strTable . " <table>\n";
        $strTable = $strTable . "  <tr><td>SalesOrder Number : </td><td>" . $salesOrder->getId(). "</td></tr>\n";
        $strTable = $strTable . "  <tr><td>SalesOrder Date : </td><td>" . $salesOrder->getDateString(). "</td></tr>\n";
        $strTable = $strTable . "  <tr><td>Bill Amount : </td><td>" . $salesOrder->getPayment()->getBillAmount(). "</td></tr>\n";
        $strTable = $strTable . "  <tr><td>Customer Name : </td><td>" . $salesOrder->getCustomer()->getName(). "</td></tr>\n";
        $strTable = $strTable . "  <tr><td>Payment Info : </td><td>" . $salesOrder->getPayment()->getBank()."|".$salesOrder->getPayment()->getTransactionNumber(). "</td></tr>\n";
        $strTable = $strTable . " </table>\n";
        $strTable = $strTable . " <br /><h2>Cart Detail</h2><br />\n";
        
        $checkoutCartComponent = new CheckoutCartComponent();
        $strTable = $strTable . $checkoutCartComponent->drawSummary("cart_summary",$salesOrder);
        $strTable = $strTable . "</div>\n";
        return  $strTable;
    }
}
?>