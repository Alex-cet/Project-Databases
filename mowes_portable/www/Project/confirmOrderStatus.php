<?php
    
    include 'init.php';
    $orderNumber = $_GET['orderNumber'];
    $username = $_GET['user'];

    $updateQuery = "UPDATE orders SET StatusID = 2 WHERE Number = $orderNumber;";
    mysql_query($updateQuery);
    echo "<script>";
    echo "alert('Status Updated!');";
    echo "window.location.href = 'trackOrder.php?user=$username';";
    echo "</script>";
    exit;
?>