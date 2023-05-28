
<?php
    include 'init.php';
    $tableName = $_GET['table'];
    $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '$tableName'";
    $result = mysql_query($sql);
    $attributes = array();
    $i = 0;

    echo " <h2 style=\"text-align: center\"> Delete data for the table $tableName </h2> <br> <br>
    <form action=\"http://localhost/workLab9/deleteSuccessfully.php?table=$tableName\" method=\"post\">
        <table>
            <colgroup>
                <col style=\"width: 30%\">
            </colgroup>";
            
    while($row = mysql_fetch_assoc($result)) {
        $text = $row['column_name'];
        if ($i == 0) {
            echo "    
            <tr>
                <td><label for=\"$text\">$text: </label></td>
                <td><input type=\"text\" id=\"key\" name=\"key\" size=\"30\"></td>
            </tr>";
        }
        $i++;
    }
    echo "</table>
            <p id=\"buttons\"><input type=\"submit\" value=\"Submit\"/></p>
            </form>";
?>