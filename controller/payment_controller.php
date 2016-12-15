<?php
require_once ("../bootstrap.php");
use com\adytta\tokokelontong\services\TransactionService as TransactionService;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    session_start();
    $salesOrder = getSessionValue('sales_order');
    
    $payment_bank = $_POST["payment_bank"];
    $payment_number = $_POST["payment_number"];
    $form_id = $_POST["form_id"];
    $return_url = $_POST["return_url"];

    $cancel = false;
    if (isset($_POST["cancel"])){
        $cancel = true;
    }

    if ($cancel){
        clearSession('customer');
        clearSession('sales_order');
        header("Location: $return_url");
    }

    if (!empty($payment_bank) && !empty($payment_number) && !empty($form_id) && !empty($return_url)){
        $transactionService = new TransactionService($entityManager,$salesOrder);
        $payment = $salesOrder->getDue();
        $payment->setBank($payment_bank);
        $payment->setTransactionNumber($payment_number);

        $salesOrder = $transactionService->doPayment($payment);
        clearSession('sales_order');
        clearSession('customer');
        header("Location: $return_url");
    }else{
        echo "SECURITY BREACH";
    }
}

?>