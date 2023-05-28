<?php
    $name = $_POST['studentName'];
    $surname = $_POST['studentSurname'];
    $fullName = $name . " " . $surname;
    $gender = $_POST['gender'];
    $day = $_POST['dob-day'];
    $month = $_POST['dob-month'];
    $year = $_POST['dob-year'];
    $dateOfBirth = date("d-m-Y", strtotime("$month/$day/$year"));
    $yearsOfStudy = $_POST['year'];
    $age = date_diff(date_create($dateOfBirth), date_create('today'))->y;
    $dateOfBirth = date('Y-m-d', strtotime($dateOfBirth));

    if (isset($_POST['scholarship'])) {
        $takesScholarship = 'y';
    } else {
        $takesScholarship = 'n';
    }

    echo "The student name is: " . $fullName . "<br>";
    echo "Gender: " . $gender . "<br>";
    echo "Date of Birth: " . $dateOfBirth . "<br>";
    echo "Years of study: " . $yearsOfStudy . "<br>";
    echo "Takes scholarship: " . $takesScholarship . "<br>";
    echo "Age: " . $age;

    $subjects = array('Databases', 'Computer Programming', 'Signals and Systems');


    echo "<ul>";
    foreach ($subjects as $subject) {
        echo "<li> $subject </li>";
    }
    echo "</ul>";


    $rules = array('Respect the professors', 'Attend to each lab', 'Do your assignments');
    echo "<ol>";
    foreach ($rules as $rule) {
        echo "<li> $rule </li>";
    }
    echo "</ol>";

    $ConnLink=mysql_connect("localhost","root","") or die ("Connection failed");
    $database=mysql_select_db("exams") or die ("Database selection failed");
    $q="Insert into Students(Name, Surname, Gender, Date_of_Birth, Year_of_Study, Scholarship) values ('$name', '$surname', '$gender', '$dateOfBirth', '$yearsOfStudy', '$takesScholarship')";
    mysql_query($q);
?>

