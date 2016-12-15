<?php
namespace com\adytta\tokokelontong\component;

class InventoryComponent{
    public function drawProductTable($div_id,$products,$returnURL){
        echo "<div id='".$div_id."'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo " <th>Barcode</th>\n";
        echo " <th>Name</th>\n";
        echo " <th>Price</th>\n";
        echo " <th>Stock</th>\n";
        echo " <th></th>\n";
        echo "</tr>\n";
        foreach($products as $product){
            echo "<tr>\n";
            echo " <td>".$product->getId()."</td>\n";
            echo " <td>".$product->getName()."</td>\n";
            echo " <td>".$product->getPrice()."</td>\n";
            echo " <td>".$product->getStock()."</td>\n";
            echo " <td><a href=controller/inventory_controller.php?product_id=".$product->getId()."&return_url=$returnURL>Report</a></td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    }

     public function drawNewProductForm($div_id,$postURL,$returnURL,$error){
        echo "<div class='".$div_id."'>\n";
        echo "<form action='".$postURL."' method='post'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo "  <td>Product Name <input type='text' name='product_name'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo " <td>Product Price <input type='text' name='product_price'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "  <td><input type='hidden' name='return_url' value='". $returnURL ."' />\n";
        echo "  <input type='hidden' name='form_id' value='".$div_id."' />\n";
        echo "  <input type='submit' value='Add Product'/></td>\n";
        echo "</tr>\n";
        echo "</table>\n";
        echo "</form>\n";
        if (!empty($error)){
            if ($error->getId() == $div_id){
                echo $error->getHTML();
                $error = null;
            }
        }
        echo "</div>\n";
    }

    public function drawNewProcurementForm($div_id,$postURL,$returnURL,$error){
        echo "<div class='".$div_id."'>\n";
        echo "<form action='".$postURL."' method='post'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo "  <td>Vendor Name <input type='text' name='procurement_vendorname'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo " <td>Product Barcode <input type='text' name='procurement_productcode'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo " <td>Product Qty <input type='text' name='procurement_productqty'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "  <td><input type='hidden' name='return_url' value='". $returnURL ."' />\n";
        echo "  <input type='hidden' name='form_id' value='".$div_id."' />\n";
        echo "  <input type='submit' value='Add Product'/></td>\n";
        echo "</tr>\n";
        echo "</table>\n";
        echo "</form>\n";
        if (!empty($error)){
            if ($error->getId() == $div_id){
                echo $error->getHTML();
                $error = null;
            }
        }
        echo "</div>\n";
    }

    public function drawProductSalesTable($div_id,$carts){
        
        $strTable = "<div id='".$div_id."'>\n";
        $strTable = $strTable . "<table>\n";
        $strTable = $strTable . "<tr>\n";
        $strTable = $strTable . " <th>Sales Order</th>\n";
        $strTable = $strTable . " <th>Qty</th>\n";
        $strTable = $strTable . " <th>Sold Price</th>\n";
        $strTable = $strTable . " <th>Total Price</th>\n";
        $strTable = $strTable . "</tr>\n";
        foreach($carts as $cart){
            $salesOrder = $cart->getSalesOrder();
            $strTable = $strTable . "<tr>\n";
            $strTable = $strTable . " <td>".$salesOrder->getId()."</td>\n";
            $strTable = $strTable . " <td>".$cart->getQty()."</td>\n";
            $strTable = $strTable . " <td>".$cart->getBasePrice()."</td>\n";
            $strTable = $strTable . " <td>".$cart->getTotalPrice()."</td>\n";
            $strTable = $strTable . "</tr>\n";
        }
        $strTable = $strTable . "</table>\n";

        return $strTable;
    }

    public function drawProductProcurementTable($div_id,$procurements){
        $strTable = "<div id='".$div_id."'>\n";
        $strTable = $strTable . "<table>\n";
        $strTable = $strTable . "<tr>\n";
        $strTable = $strTable . " <th>Vendor Name</th>\n";
        $strTable = $strTable . " <th>Date Procure</th>\n";
        $strTable = $strTable . " <th>Quantity</th>\n";
        $strTable = $strTable . "</tr>\n";
        foreach($procurements as $procurement){
            $strTable = $strTable . "<tr>\n";
            $strTable = $strTable . " <td>".$procurement->getName()."</td>\n";
            $strTable = $strTable . " <td>".$procurement->getDateString()."</td>\n";
            $strTable = $strTable . " <td>".$procurement->getQty()."</td>\n";
            $strTable = $strTable . "</tr>\n";
        }
        $strTable = $strTable . "</table>\n";

        return $strTable ;
    }
}
?>