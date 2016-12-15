<?php
namespace com\adytta\tokokelontong\component;

class CustomerComponent{
    public function drawCustomerInfoComponent($div_id,$customer){
        echo "<div id='".$div_id."'>\n";
        echo " <table>\n";
        echo " <tr><td>ID</td><td>".$customer->getId()."</td></tr>\n";
        echo " <tr><td>Name</td><td>".$customer->getName()."</td></tr>\n";
        echo " <tr><td>Email</td><td>".$customer->getEmail()."</td></tr>\n";
        echo "</table>\n";
        echo "</div>\n";
    }

    public function drawCustomerSalesTable($div_id,$salesOrders){
        
        $strTable = "<div id='".$div_id."'>\n";
        $strTable = $strTable . "<table>\n";
        $strTable = $strTable . "<tr>\n";
        $strTable = $strTable . " <th>Sales Order</th>\n";
        $strTable = $strTable . " <th>Order Date</th>\n";
        $strTable = $strTable . " <th>Total Price</th>\n";
        $strTable = $strTable . " <th>Pay Bank</th>\n";
        $strTable = $strTable . " <th>Pay Number</th>\n";
        $strTable = $strTable . "</tr>\n";
        foreach($salesOrders as $salesOrder){
            $strTable = $strTable . "<tr>\n";
            $strTable = $strTable . " <td>".$salesOrder->getId()."</td>\n";
            $strTable = $strTable . " <td>".$salesOrder->getDateString()."</td>\n";
            $strTable = $strTable . " <td>".$salesOrder->getPayment()->getBillAmount()."</td>\n";
            $strTable = $strTable . " <td>".$salesOrder->getPayment()->getBank()."</td>\n";
            $strTable = $strTable . " <td>".$salesOrder->getPayment()->getTransactionNumber()."</td>\n";
            $strTable = $strTable . "</tr>\n";
        }
        $strTable = $strTable . "</table>\n";

        return $strTable;
    }

    public function drawCustomerTable($div_id,$customers,$returnURL){
        echo "<div id='".$div_id."'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo " <th>ID</th>\n";
        echo " <th>Name</th>\n";
        echo " <th>Email</th>\n";
        echo " <th></th>\n";
        echo "</tr>\n";
        foreach($customers as $customer){
            echo "<tr>\n";
            echo " <td>".$customer->getId()."</td>\n";
            echo " <td>".$customer->getName()."</td>\n";
            echo " <td>".$customer->getEmail()."</td>\n";
            echo " <td><a href=controller/customer_controller.php?customer_id=".$customer->getId()."&return_url=$returnURL>Report</a></td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    }

    public function drawNewCustomerComponent($div_id,$postURL,$returnURL,$error){
        echo "<div class='".$div_id."'>\n";
        echo "<form action='".$postURL."' method='post'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo "  Customer Name <input type='text' name='customer_name'/>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo " Customer Email <input type='text' name='customer_email'/>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "  <input type='hidden' name='return_url' value='". $returnURL ."' />\n";
        echo "  <input type='hidden' name='form_id' value='".$div_id."' />\n";
        echo "  <input type='submit' value='submit'/>\n";
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
}
?>