<?php
    $ConnLink=mysql_connect("localhost","root","") or die ("Connection failed");
    $database=mysql_select_db("musiclibrary") or die ("Database selection failed");
    $imagePath = "http://localhost/Project/Photos/Jante.png";
    $imageData = file_get_contents($imagePath);
    $query = "UPDATE Products SET image = '" . mysql_real_escape_string($imageData) . "' WHERE ProductID = 23";
    mysql_query($query);
?>