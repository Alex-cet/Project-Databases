<?php
    include 'init.php';
    $username = $_GET['user'];
    $q = "DELETE FROM orderdetails;";
    mysql_query($q);
    echo "<script>";
    echo "alert('Products removed successfully!');";
    echo "window.location.href = 'checkout.php?user=$username';";
    echo "</script>";
?>