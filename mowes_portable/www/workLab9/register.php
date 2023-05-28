<?php

    include 'init.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmedPassword = $_POST['passwordConfirm'];

    if (strcmp($password, $confirmedPassword) == 0) {
      //  $q = "INSERT INTO users(username, password) values ('$username', '$password');";
      //  mysql_query($q);
        
        echo "User " . $username . " successfully registered!";
    } else {
        echo "Passwords do not match! Try again!";
    }
    
?>