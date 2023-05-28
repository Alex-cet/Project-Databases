<?php   
    $studName = $_POST['studentNameUpdated'];
    $studSurname = $_POST['studentSurnameUpdated'];
    $gender = $_POST['genderUpdated'];
    $day = $_POST['dob-day-updated'];
    $month = $_POST['dob-month-updated'];
    $year = $_POST['dob-year-updated'];
    $dateOfBirth = $_POST['dob-year-updated'] . '-' . $_POST['dob-month-updated'] . '-' . $_POST['dob-day-updated'];
    $dateOfBirth = date('Y-m-d', strtotime($dateOfBirth));
    $yearsOfStudy = $_POST['yearUpdated'];

    if (isset($_POST['scholarshipUpdated'])) {
        $takesScholarship = 'y';
    } else {
        $takesScholarship = 'n';
    }

    $ConnLink=mysql_connect("localhost","root","") or die ("Connection failed");
    $database=mysql_select_db("exams") or die ("Database selection failed");

    $q="Update Students
    Set 
        Gender = '$gender',
        Date_of_Birth = '$dateOfBirth',
        Year_of_Study = '$yearsOfStudy',
        Scholarship = '$takesScholarship'
    Where 
        Name = '$studName' AND Surname = '$studSurname';";
    mysql_query($q);

    echo "Changes have been saved! Check your database.";

?>