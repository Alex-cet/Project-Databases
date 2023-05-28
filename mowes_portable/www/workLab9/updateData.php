<?php

    include 'init.php';
    $tableName = $_GET['table'];
    $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '$tableName'";
    $result = mysql_query($sql);

    echo " <h2 style=\"text-align: center\"> Update data for the table $tableName </h2>
    <form action=\"http://localhost/workLab9/updateSuccessfully.php?table=$tableName\" method=\"post\">
        <table>
            <colgroup>
                <col style=\"width: 30%\">
            </colgroup>";
    while ($row = mysql_fetch_assoc($result)) {
        $text = $row['column_name'];

        if ($text == "Gender") {
            echo "
            <tr>
                <td><label for=\"gender\">Gender: </label></td>
                <td>
                    <select name=\"Gender\" id=\"Gender\">
                        <option value=\"male\">Male</option>
                        <option value=\"female\">Female</option>
                    </select>
                </td>
            </tr>";
            echo "<br>";
        } else if ($text == "Date_of_Birth" || $text == "Date_of_Exam" || $text == "Date_of_birth") {
            echo "<tr>
            <td><label for=\"dateOfBirthUpdated\">Date of Birth: </label></td>
            <td>
                <select name=\"day\" id=\"dob-day-updated\">
                    <option value=\"\">Day</option>
                    <option value=\"\">---</option>
                    <option value=\"01\">01</option>
                    <option value=\"02\">02</option>
                    <option value=\"03\">03</option>
                    <option value=\"04\">04</option>
                    <option value=\"05\">05</option>
                    <option value=\"06\">06</option>
                    <option value=\"07\">07</option>
                    <option value=\"08\">08</option>
                    <option value=\"09\">09</option>
                    <option value=\"10\">10</option>
                    <option value=\"11\">11</option>
                    <option value=\"12\">12</option>
                    <option value=\"13\">13</option>
                    <option value=\"14\">14</option>
                    <option value=\"15\">15</option>
                    <option value=\"16\">16</option>
                    <option value=\"17\">17</option>
                    <option value=\"18\">18</option>
                    <option value=\"19\">19</option>
                    <option value=\"20\">20</option>
                    <option value=\"21\">21</option>
                    <option value=\"22\">22</option>
                    <option value=\"23\">23</option>
                    <option value=\"24\">24</option>
                    <option value=\"25\">25</option>
                    <option value=\"26\">26</option>
                    <option value=\"27\">27</option>
                    <option value=\"28\">28</option>
                    <option value=\"29\">29</option>
                    <option value=\"30\">30</option>
                    <option value=\"31\">31</option>
                </select>
                <select name=\"month\" id=\"dob-month-updated\">
                    <option value=\"\">Month</option>
                    <option value=\"\">-----</option>
                    <option value=\"01\">January</option>
                    <option value=\"02\">February</option>
                    <option value=\"03\">March</option>
                    <option value=\"04\">April</option>
                    <option value=\"05\">May</option>
                    <option value=\"06\">June</option>
                    <option value=\"07\">July</option>
                    <option value=\"08\">August</option>
                    <option value=\"09\">September</option>
                    <option value=\"10\">October</option>
                    <option value=\"11\">November</option>
                    <option value=\"12\">December</option>
                </select>
                <select name=\"year\" id=\"dob-year-updated\">
                    <option value=\"\">Year</option>
                    <option value=\"\">----</option>
                    <option value=\"2012\">2012</option>
                    <option value=\"2011\">2011</option>
                    <option value=\"2010\">2010</option>
                    <option value=\"2009\">2009</option>
                    <option value=\"2008\">2008</option>
                    <option value=\"2007\">2007</option>
                    <option value=\"2006\">2006</option>
                    <option value=\"2005\">2005</option>
                    <option value=\"2004\">2004</option>
                    <option value=\"2003\">2003</option>
                    <option value=\"2002\">2002</option>
                    <option value=\"2001\">2001</option>
                    <option value=\"2000\">2000</option>
                    <option value=\"1999\">1999</option>
                    <option value=\"1998\">1998</option>
                    <option value=\"1997\">1997</option>
                    <option value=\"1996\">1996</option>
                    <option value=\"1995\">1995</option>
                    <option value=\"1994\">1994</option>
                    <option value=\"1993\">1993</option>
                    <option value=\"1992\">1992</option>
                    <option value=\"1991\">1991</option>
                    <option value=\"1990\">1990</option>
                    <option value=\"1989\">1989</option>
                    <option value=\"1988\">1988</option>
                    <option value=\"1987\">1987</option>
                    <option value=\"1986\">1986</option>
                    <option value=\"1985\">1985</option>
                    <option value=\"1984\">1984</option>
                    <option value=\"1983\">1983</option>
                    <option value=\"1982\">1982</option>
                    <option value=\"1981\">1981</option>
                    <option value=\"1980\">1980</option>
                </select>
            </td>
        </tr>";
        } else if ($text == "Scholarship") {
            echo "<tr>
                <td><label for=\"Scholarship\">Scholarship: </label></td>
                <td><input type=\"checkbox\" id=\"Scholarship\" name=\"Scholarship\"></td>
            </tr>";
        } else if ($text == "Year_of_Study") {
            echo "<tr>
                <td><label for=\"Year_of_Study\">Year of Study: </label></td>
                <td>
                    <input type=\"radio\" name=\"Year_of_Study\" value=\"1-3\">
                    <label for=\"firstThreeYears\">1-3</label>
                    <input type=\"radio\" name=\"Year_of_Study\" value=\"4-5\">
                    <label for=\"lastYears\" id=\"lastYears\">4-5</label><br>
                </td>
            </tr>";
        } else {
            echo "    
                <tr>
                    <td><label for=\"$text\">$text: </label></td>
                    <td><input type=\"text\" id=\"$text\" name=\"$text\" size=\"30\"></td>
                </tr>";
        }
    }

    echo "</table>
    <p id=\"buttons\"><input type=\"submit\" value=\"Submit\"/></p>
</form>";

?>