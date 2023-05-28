<?php

    include 'init.php';
    $table = $_GET['table'];
    
    $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '$table'";
    $result = mysql_query($sql);
    $key = $_POST['key'];


    while ($row = mysql_fetch_assoc($result)) {
        $attributes[] = $row['column_name'];
    }
    
    $s = "DELETE FROM $table WHERE $attributes[0] = '$key'";
    $result = mysql_query($s);

    if ($result) {
        echo "Delete successful!";
      } else {
        echo "Delete failed!";
      }
?>