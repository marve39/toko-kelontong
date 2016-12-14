<?php
namespace com\adytta\tokokelontong\component;
use com\adytta\tokokelontong\domain\SalesOrder as SalesOrder;

class CheckoutCartComponent{
    public function drawSummary($div_id, SalesOrder $salesOrder){
        echo "<div id='$div_id'>\n";
        echo "<table>\n";
        echo " <tr>\n";
        echo "   <th>Product</th>\n";
        echo "   <th>Quantity</th>\n";
        echo "   <th>BasePrice</th>\n";
        echo "   <th>TotalPrice</th>\n";
        echo " </tr>\n";
        
        if (!empty($salesOrder)){
           foreach($salesOrder->getCart() as $cart){
                    echo "<tr>\n";
                    echo "<td>" .$cart->getProduct()->getName(). "</td>\n";
                    echo "<td>" .$cart->getQty(). "</td>\n";
                    echo "<td>" .$cart->getBasePrice(). "</td>\n";
                    echo "<td>" .$cart->getTotalPrice(). "</td>\n";
                    echo "</tr>\n";
                }
            }else{
                echo "<tr></tr>\n";
            }
        echo "</table>\n";
        echo "</div>\n";
    }

    public function drawInputCartForm($div_id,$postURL,$returnURL){
        
    }

    public function drawTotalPrice($div_id,$salesOrder){
        echo "<div id='" .$div_id. "'>\n";
        echo "<h2>TOTAL PRICE</h2><br />\n";
        echo "<h1>".$salesOrder->getDue()->getBillAmount()."</h1>\n";
        echo "</div>\n";
    }
}
?>