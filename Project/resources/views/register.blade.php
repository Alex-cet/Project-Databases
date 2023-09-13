<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>
    <body>
        <h1>Sign Up</h1>
        <form action={{ route('processRegistration') }} method="post">
            @csrf
            <div id="containerRegister">
                <table id="table1">
                    <tr>
                        <td><label for="name">Full Name: </label></td>
                        <td><input type="text" id="name" name="name" size="30" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><label for="email">Email: </label></td>
                        <td><input type="text" id="email" name="email" size="30" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><label for="phoneNumber">Phone Number: </label></td>
                        <td><input type="text" id="phoneNumber" name="phoneNumber" size="30" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @error('phoneNumber')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><label for="username">Username: </label></td>
                        <td><input type="text" id="username" name="username" size="30" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><label for="password">Password: </label></td>
                        <td><input type="password" id="password" name="password" size="30" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <td><label for="password_confirmation">Confirm Password: </label></td>
                        <td><input type="password" id="password_confirmation" name="password_confirmation" size="30" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                </table>
                <p><input type="submit" id="buttons" value="Register"/></p>
            </div>
        </form>
    </body>
</html>
