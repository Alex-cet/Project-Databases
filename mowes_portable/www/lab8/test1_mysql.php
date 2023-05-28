<html>
<head><title>Teacher selection</title></head>
<body>
<p>
  <b>Students: </b>
<p>
<?php
   $ConnLink=mysql_connect("localhost","root","") or die ("Connection failed");
   $database=mysql_select_db("exams") or die ("Database selection failed");
   $q="Select Group_Id, Name, Surname from Students";
   $Result_set=mysql_query($q) or die ("Query error");
   echo "<table>";
   while($Row=mysql_fetch_array($Result_set)){
      echo "<tr>";
      echo "<td>$Row[0] </td>";
      echo "<td>$Row[1] </td>";
      echo "<td>$Row[2] </td>";
      echo "</tr>";
      echo "<br>";
   }
   echo "</table>";
?>
</p>
</body>
</html>