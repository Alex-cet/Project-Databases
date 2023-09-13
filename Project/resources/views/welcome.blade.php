<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">   
    </head>
<body>
    <h1> Welcome to eMarket! </h1>
    <form method="post">
        @csrf
        <div id="containerLogin">
        <table id="table1">
            @if(session('success'))
            <label id="registerMessage">
                {{ session('success') }}
            </label>
            @endif

            @if(session('error'))
            <label id="errorMessage">
                {{ session('error') }}
            </label>
            @endif

            <tr>
                <td><label for="usernameLogIn">Username: </label></td>
                <td><input type="text" id="usernameLogIn" name="usernameLogIn" size="30"></td>
            </tr>

            <tr>
                <td><label for="passwordLogIn">Password: </label></td>
                <td><input type="password" id="passwordLogIn" name="passwordLogIn" size="30"></td>
            </tr>

            <br>
        </table>
            <p><input type="submit" id="buttons" value="Log In" formaction={{ route('login') }}/> 
                <input type="submit" id="buttons" value="Sign Up" formaction={{ route('register') }}/></p>
        </div>
    </form>
</body>
</html>

