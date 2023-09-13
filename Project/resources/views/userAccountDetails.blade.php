<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale = 1">
      <link rel="stylesheet" type="text/css" href="../CSS/style.css">
  </head>
  <body>
    <a href={{ route('mainPage') }}><img style="display: block; margin-left: auto; margin-right: auto;" width="100px" height="100px" src="../Logos/eMarket_logo.png" alt="eMarket Logo"></a><br>
    <div id="separator">
      <h2>My Account</h2>
    </div>
    @php
        $Name = $result->Name;
        $Email = $result->Email;
        $phoneNumber = $result->PhoneNumber;
        $password = $result->password;
    @endphp
        <div id="box">
        <div style="text-align: center;">
        <b><p style=font-family:sans-serif;>Name:</b> {{ $Name }}</p><br>
        <b><p style=font-family:sans-serif;>Email:</b> {{ $Email }}</p><br>
        <b><p style=font-family:sans-serif;>Phone Number:</b> {{ $phoneNumber }}</p><br>
        <b><p style=font-family:sans-serif;>Username:</b> {{ $username }}</p><br>
        <b><p style=font-family:sans-serif;>Password:</b> {{ $password }}</p><br>
        </div>
        </div>
  </body>
</html>