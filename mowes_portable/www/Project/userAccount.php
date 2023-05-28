<!DOCTYPE html>
<html>
<head>
  <style>
    body {
        background-image: url("eMarket.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }
  </style>
</head>
<body>

<?php
    include 'init.php';
    $username = trim($_GET['user']);
    
    $q = "SELECT * FROM customers WHERE username = '$username';";
    $result = mysql_query($q);

    echo "<a href=\"http://localhost/Project/main.php?user=$username\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" width=\"100px\" height=\"100px\" src=\"eMarket_logo.png\" alt=\"eMarket Logo\"></a><br>";
    echo "<div id=\"separator\" style=\"width: auto;
        height: 50px;
        background-color: #36096d;
        background-image: linear-gradient(315deg, #36096d 0%, #2bc4f3 74%);
        display: flex;
        justify-content: center;
        align-items: center;\"><h1 style=\"color: white;
        -webkit-text-stroke: 1px black;
        font-size: 30px;
        text-align: center;
        font-weight: 700;
        font-family: sans-serif;\">My Account</h1></div>";

    while($row = mysql_fetch_assoc($result)) {
        $Name = $row['Name'];
        $Email = $row['Email'];
        $phoneNumber = $row['PhoneNumber'];
        $password = $row['password'];
        echo "<div style=\"width: 400px;
        height: 350px;
        text-align: center;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        backdrop-filter: blur(5px);
        border: 2px solid black;\" >";
        echo "<div style=\"text-align: center;\">";
        echo "<b><p style=font-family:sans-serif;>Name:</b> $Name</p><br>";
        echo "<b><p style=font-family:sans-serif;>Email:</b> $Email</p><br>";
        echo "<b><p style=font-family:sans-serif;>Phone Number:</b> $phoneNumber</p><br>";
        echo "<b><p style=font-family:sans-serif;>Username:</b> $username</p><br>";
        echo "<b><p style=font-family:sans-serif;>Password:</b> $password</p><br>";
        echo "</div>";
        echo "</div>";
    }
?>