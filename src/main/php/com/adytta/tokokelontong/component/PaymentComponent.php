<?php
namespace com\adytta\tokokelontong\component;

class PaymentComponent{
    public function drawPaymentForm($div_id,$postURL,$returnURL,$error){
        echo "<div class='".$div_id."'>\n";
        echo "<form action='".$postURL."' method='post'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo "  <td>Payment Bank <input type='text' name='payment_bank'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo " <td>Payment Number <input type='text' name='payment_number'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "  <td><input type='hidden' name='return_url' value='". $returnURL ."' />\n";
        echo "  <input type='hidden' name='form_id' value='".$div_id."' />\n";
        echo "  <input type='submit' value='Do Payment'/><input type='submit' name ='cancel' value='Cancel'/></td>\n";
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

    public function drawPaymentTable($div_id,$payments,$returnURL){
        echo "<div id='".$div_id."'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo " <th>SalesOrder</th>\n";
        echo " <th>Customer</th>\n";
        echo " <th>Date</th>\n";
        echo " <th>Bill Amount</th>\n";
        echo " <th>Bank</th>\n";
        echo " <th>Transaction Number</th>\n";
        echo " <th></th>\n";
        echo "</tr>\n";
        foreach($payments as $payment){
            echo "<tr>\n";
            echo " <td>".$payment->getSalesOrder()->getId()."</td>\n";
            echo " <td>".$payment->getSalesOrder()->getCustomer()->getName()."</td>\n";
            echo " <td>".$payment->getSalesOrder()->getDateString()."</td>\n";
            echo " <td>".$payment->getBillAmount()."</td>\n";
            echo " <td>".$payment->getBank()."</td>\n";
            echo " <td>".$payment->getTransactionNumber()."</td>\n";
            echo " <td><a href=controller/sales_controller.php?sales_id=".$payment->getSalesOrder()->getId()."&return_url=$returnURL>Open Sales Order</a></td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    }

     public function drawInputProduct($div_id,$postURL,$returnURL,$error){
        echo "<div class='".$div_id."'>\n";
        echo "<form action='".$postURL."' method='post'>\n";
        echo "<table>\n";
        echo "<tr>\n";
        echo "  <td>Payment Bank <input type='text' name='payment_bank'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo " <td>Payment Number <input type='text' name='payment_number'/></td>\n";
        echo "</tr>\n";
        echo "<tr>\n";
        echo "  <td><input type='hidden' name='return_url' value='". $returnURL ."' />\n";
        echo "  <input type='hidden' name='form_id' value='".$div_id."' />\n";
        echo "  <input type='submit' value='Do Payment'/></td>\n";
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