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
            <h1 class="text-3xl font-bold mb-4 text-gray-900">Employee Insert Results</h1>
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
    $first_name = $_POST['first_name'];
    $middle_initial = $_POST['middle_initial'];
    $last_name = $_POST['last_name'];
    $ssn = $_POST['ssn'];
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $salary = $_POST['salary'];
    $supervisor_ssn = $_POST['supervisor_ssn'];
    $department_number = $_POST['department_number'];
    function output_message_1() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='insert_employee.php' class='nav-link inline-block mr-4'>← Back to Insert Employee</a>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    function output_message_2() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    $sql_1 = "select * from EMPLOYEE where Ssn = '$ssn' order by Ssn";
    $result_1 = mysqli_query($conn, $sql_1);
    if(mysqli_num_rows($result_1) > 0) {
        echo "<div class='error-message'>The employee with SSN <strong>$ssn</strong> already exists in the <strong>EMPLOYEE</strong> table.</div>";
        output_message_1();
        exit;
    }
    $sql_2 = "select * from EMPLOYEE where Ssn = '$supervisor_ssn' order by Ssn";
    $result_2 = mysqli_query($conn, $sql_2);
    if(!empty($supervisor_ssn)) {
        if (mysqli_num_rows($result_2) == 0) {
            echo "<div class='error-message'>The supervisor with SSN <strong>$supervisor_ssn</strong> does not exist in the <strong>EMPLOYEE</strong> table.</div>";
            output_message_1();
            exit;
        }
    }
    $sql_3 = "insert into EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary, Super_ssn, Dno)
        values ('$first_name', '$middle_initial', '$last_name', '$ssn', '$birth_date', '$address', '$sex', '$salary', '$supervisor_ssn', '$department_number')";
    $result_3 = mysqli_query($conn, $sql_3);
    if($result_3) {
        echo "<div class='success-message'>The employee with SSN <strong>$ssn</strong> has been successfully inserted into the <strong>EMPLOYEE</strong> table.</div>";
    } else {
        echo "<div class='error-message'>There was an error inserting the employee with SSN <strong>$ssn</strong> into the <strong>EMPLOYEE</strong> table.</div>";
    }
    output_message_2();
    ?>
</body>
</html>
