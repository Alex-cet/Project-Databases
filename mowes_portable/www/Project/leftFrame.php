<?php
    include 'init.php';
    $sql = "SELECT Name FROM Categories";
    $result = mysql_query($sql);
    echo "<h2 style=\"text-align:center; font-family:sans-serif;\"> Categories </h2>";
    echo "<br>";
    while($row=mysql_fetch_assoc($result)) {
        $name = $row['Name'];
        $category = urlencode($name);
        echo "<a href=\"http://localhost/Project/showItemsCategory.php?category=$category\" target=\"middleFrame\"><button style=\"font-family:sans-serif;
        background-color: white; padding: 20px; width: 100%; border-left: none; border-right: none; border-top:2px solid whitesmoke; border-bottom:2px solid whitesmoke;
        font-size: 15px; cursor:pointer; text-align: left\"> $name </button></a>";
        
    }
?>