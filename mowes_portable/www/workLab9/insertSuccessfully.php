<?php

    include 'init.php';
    $table = $_GET['table'];
    
    $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '$table'";
    $result = mysql_query($sql);

    $attributes = array();
    $values = array();

    $dateOfBirth = sprintf('%04d-%02d-%02d', $_POST['year'], $_POST['month'], $_POST['day']);
    $dateOfBirth = date('Y-m-d', strtotime($dateOfBirth));

    while ($row = mysql_fetch_assoc($result)) {
        $attributes[] = $row['column_name'];
    }

    foreach ($attributes as $column) {
        if($column == 'Scholarship')
        {
            if (isset($_POST['Scholarship'])) {
                $values[] = 'y';
            } else {
                $values[] = 'n';
            }
        }
        else if($column == 'Date_of_Birth')
        {
            $values[] = $dateOfBirth;
        }
        else
            $values[] = $_POST[$column];
    }

    $values = implode("','", $values);

    
    $s = "INSERT INTO $table VALUES ('$values');";
    mysql_query($s);

    echo "Insertion successfully!";
?>
