<?php
    include 'init.php';
    $table = $_GET["table"];
    $key = $_POST["key"];

    $q = "SELECT COLUMN_NAME 
    FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_NAME = '$table' 
    AND TABLE_SCHEMA = 'exams';";

    $result = mysql_query($q);

    $attributes = array();

    while ($row = mysql_fetch_assoc($result)) {
        $attributes[] = $row['COLUMN_NAME'];
    }

    if($key == "")
    {
        $q = "SELECT * FROM $table;";
    }
    else
    {
        $q = "SELECT * FROM $table WHERE $attributes[0]='$key';";
    }

    $result = mysql_query($q);

    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            foreach($attributes as $field)
                echo "<p>$field: " . $row[$field] . "</p>";
        }
        echo "<br>";
        echo "<br>";
    }
    else
        echo "No rows found!";
?>