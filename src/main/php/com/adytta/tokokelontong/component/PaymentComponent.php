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