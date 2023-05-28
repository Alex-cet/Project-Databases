<!DOCTYPE.html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <h1>Sign Up</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div id="container">
        <table id="table1">
            <tr>
                <td><label for="name">Full Name: </label></td>
                <td><input type="text" id="name" name="name" size="30" required></td>
            </tr>

            <br>

            <tr>
                <td><label for="email">Email: </label></td>
                <td><input type="text" id="email" name="email" size="30" required></td>
            </tr>

             <tr>
                <td><label for="phoneNumber">Phone Number: </label></td>
                <td><input type="text" id="phoneNumber" name="phoneNumber" size="30" required></td>
            </tr>

            <tr>
                <td><label for="username">Username: </label></td>
                <td><input type="text" id="username" name="username" size="30" required></td>
            </tr>

            <tr>
                <td><label for="password">Password: </label></td>
                <td><input type="password" id="password" name="password" size="30" required></td>
            </tr>

            <tr>
                <td><label for="passwordConfirm">Confirm Password: </label></td>
                <td><input type="password" id="passwordConfirm" name="passwordConfirm" size="30" required></td>
            </tr>
            
        </table>
            <p><input type="submit" id="buttons" value="Register"/></p>
    </div>  
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'init.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['passwordConfirm'];
        $getUsers = "SELECT username FROM Customers WHERE username = '$username'";
        $Users = mysql_query($getUsers);
        if (mysql_num_rows($Users) > 0) {
            $Users = mysql_fetch_array($Users);
            $foundUser = $Users[0];
        } else {
            $foundUser = null;
        }
        
        if (strcmp($password, $confirmedPassword) == 0 && $password != null && $foundUser == null) {
            $q = "INSERT INTO Customers(Name, Email, PhoneNumber, username, password) values ('$name', '$email', '$phoneNumber', '$username', '$password');";
            mysql_query($q);
            echo "<form method=\"post\">";
            echo "<div id=\"container\">";
            echo "<br> <br> <br>";
            echo "<label id=\"successRegister\" for=\"successRegister\">User " . $username . " successfully registered! </label>";            
            echo "<p><input type=\"submit\" id=\"buttons\" value=\"Log In\" formaction=\"http://localhost/Project/index.html\"/></p>";
            echo "</div>";
            echo "</form>";
        } else if ($password != null && $foundUser != null) {
            echo "<form method=\"post\">";
            echo "<div id=\"container\">";
            echo "<br> <br> <br>";
            echo "<label id=\"errorMessage\" for=\"successRegister\">User " . $username . " already exists! Use a different username </label>";            
            echo "<p><input type=\"submit\" id=\"tryAgain\" value=\"Try Again\" formaction=\"http://localhost/Project/signup.php\"/></p>";
            echo "</div>";
            echo "</form>";
        } else if ($password != null) {
            echo "<form method=\"post\">";
            echo "<div id=\"container\">";
            echo "<br> <br> <br>";
            echo "<label id=\"errorMessage\" for=\"successRegister\">Passwords do not match! Try again! </label>";            
            echo "<p><input type=\"submit\" id=\"tryAgain\" value=\"Try Again\" formaction=\"http://localhost/Project/signup.php\"/></p>";
            echo "</div>";
            echo "</form>";
        }
    }
?>