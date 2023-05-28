<?php
    include 'init.php';

    $username = $_POST['usernameLogIn'];
    $password = $_POST['passwordLogIn'];

    $q = "SELECT username, password FROM Customers WHERE username = '$username' AND password = '$password';";
    $result = mysql_query($q);

    $user = $username;
    $url = 'main.php?user= ' . urlencode($user);

    if (mysql_num_rows($result) > 0) {
        header("Location: " . $url);
        exit;
    } else {    
        echo "<script>";
        echo "alert('Incorrect username or password! Try again');";
        echo "window.location.href = 'index.html';";
        echo "</script>";
        exit;
    }
?>