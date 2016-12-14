<?php
require_once ("bootstrap.php");
use com\adytta\tokokelontong\component\CheckoutCartComponent as CheckoutCartComponent;

$checkoutCartComponent = new CheckoutCartComponent();

session_start();

$salesOrder = getSessionValue('sales_order');
$error = getSessionValue('error');

?>
<html>
<head>
</head>
<body>
    <div class='box'>
    <form action='controller/inputCart.php' method='post'>
        <table>
        <tr>
            Product Number <input type='text' name='product_id'/>
            <input type="hidden" name="return_url" value="/toko-kelontong/pos.php" />
            <input type="hidden" name="form_id" value="inputcart" />
            <input type='submit' value='submit'/>
        </tr>
        </table>
    </form>
    <?php
        if (!empty($error)){
            if ($error->getId() == "inputcart"){
                echo $error->getHTML();
                clearSession('error');
            }
        }
    ?>
    </div>
    <?php
         echo $checkoutCartComponent->drawSummary("cart",$salesOrder);
         echo $checkoutCartComponent->drawTotalPrice("cart_total_price",$salesOrder);
    ?>
</body>
</html>