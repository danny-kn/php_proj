<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Project 2: PHP Web Application</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body class="min-h-screen p-6">
    <header class="glass-card p-6 mb-8">
        <div class="text-center">
            <h1 class="text-3xl font-bold mb-4 text-gray-900">Project Assignment Results</h1>
        </div>
    </header>
    <div class="max-w-4xl mx-auto">
        <div class="glass-card p-8">
    <?php
    /*
    Connect to the database...
    */
    $conn = mysqli_connect('localhost', 'root', '*Qwerty_123', 'individual_project_02');
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $employee_ssn = $_POST['employee_ssn'];
    $project_name = $_POST['project_name'];
    $hours_worked = $_POST['hours_worked'];
    function output_message_1() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='assign_project.php' class='nav-link inline-block mr-4'>← Back to Assign Project</a>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    function output_message_2() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    $sql_1 = "select Dno from EMPLOYEE where Ssn = '$employee_ssn'";
    $result_1 = mysqli_query($conn, $sql_1);
    $Dno = mysqli_fetch_array($result_1, MYSQLI_ASSOC)['Dno'];
    $sql_2 = "select * from DEPARTMENT where Dnumber = '$Dno'";
    $result_2 = mysqli_query($conn, $sql_2);
    $Dnumber = mysqli_fetch_array($result_2, MYSQLI_ASSOC)['Dnumber'];
    $sql_3 = "select * from PROJECT where Dnum = '$Dnumber' and Pname = '$project_name'";
    $result_3 = mysqli_query($conn, $sql_3);
    if(mysqli_num_rows($result_3) == 0) {
        echo "<div class='error-message'>The employee with SSN <strong>$employee_ssn</strong> is not part of the department that is working on the project with name <strong>$project_name</strong>.</div>";
        output_message_1();
        exit;
    }
    $sql_4 = "select Pnumber from PROJECT where Pname = '$project_name'";
    $result_4 = mysqli_query($conn, $sql_4);
    $Pnumber = mysqli_fetch_array($result_4, MYSQLI_ASSOC)['Pnumber'];
    $sql_5 = "insert into WORKS_ON (Essn, Pno, Hours)
        values ('$employee_ssn', '$Pnumber', '$hours_worked')";
    $result_5 = mysqli_query($conn, $sql_5);
    if($result_5) {
        echo "<div class='success-message'>The employee with SSN <strong>$employee_ssn</strong> was successfully assigned to the project with name <strong>$project_name</strong> in the <strong>WORKS_ON</strong> table.</div>";
    } else {
        echo "<div class='error-message'>There was an error assigning the employee with SSN <strong>$employee_ssn</strong> to the project with name <strong>$project_name</strong> in the <strong>WORKS_ON</strong> table.</div>";
    }
    output_message_2();
    ?>
</body>
</html>
