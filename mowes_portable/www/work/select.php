<?php
    $ConnLink=mysql_connect("localhost","root","") or die ("Connection failed");
    $database=mysql_select_db("exams") or die ("Database selection failed");
    $q="Select Name from Students";
    $Result_set=mysql_query($q) or die ("Query error");
    echo "<form action=\"http://localhost/work/update_student.php\" method=\"post\">";
    echo "<tr>
          <td><label for=\"studName\">Student's Name: </label></td>
          <td><select name=\"studName\" id=\"studName\">";
    while($Row=mysql_fetch_array($Result_set)) {
        echo "<option value=\"$Row[0]\">$Row[0]</option>";
    }
    echo "</select>
            </td>
            </tr>";

    echo "<br>";

    echo "<tr>
    <td><label for=\"studSurname\">Student's Surname: </label></td>
    <td><select name=\"studSurname\" id=\"studSurname\">";
    $q = "Select Surname from Students";
    $Result_set=mysql_query($q) or die ("Query error");
    while($Row=mysql_fetch_array($Result_set)) {
        echo "<option value=\"$Row[0]\">$Row[0]</option>";
    }
    echo "</select>
            </td>
            </tr>";

    echo "<p id=\"buttons\"><input type=\"submit\" value=\"Submit this Form\"/> <input type=\"reset\" value=\"Clear Form\"/></p>
    </form>";
?>