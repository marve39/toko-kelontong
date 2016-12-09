<html>
<head>
</head>
<body>
<?php
    require_once ("main/src/resources/application.php");

    use com\adytta\tokokelontong\domain\Customer as Customer;
 

    $object = new Customer();

    $object->test = "test";
    $object->test1 = "test";
    
    $test = $object->test;

    echo "Test Class = ". $test . "<br />"; 

    echo "Class Attribute = <br />";

    foreach(get_object_vars($object) as $key => $value) {
        echo "$key is at $value <br />";
    }
?>
</body>