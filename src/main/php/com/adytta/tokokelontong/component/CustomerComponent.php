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