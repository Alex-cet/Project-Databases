<?php
    include 'init.php';

    $username = $_POST['usernameLogIn'];
    $password = $_POST['passwordLogIn'];

    $q = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password';";
    $result = mysql_query($q);


    if (mysql_num_rows($result) > 0) {
        header("Location: main.php");
        exit;
    } else {
        echo "User " . $username . " not found!";
    }
?>