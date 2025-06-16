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
            <h1 class="text-3xl font-bold mb-4 text-gray-900">Department Insert Results</h1>
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
    $department_name = $_POST['department_name'];
    $department_number = $_POST['department_number'];
    $manager_ssn = $_POST['manager_ssn'];
    $manager_start_date = $_POST['manager_start_date'];
    function output_message_1() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='insert_department.php' class='nav-link inline-block mr-4'>← Back to Insert Department</a>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    function output_message_2() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    $sql_1 = "select * from DEPARTMENT where Dname = '$department_name' order by Dname";
    $result_1 = mysqli_query($conn, $sql_1);
    if(mysqli_num_rows($result_1) > 0) {
        echo "<div class='error-message'>The department with name <strong>$department_name</strong> already exists in the <strong>DEPARTMENT</strong> table.</div>";
        output_message_1();
        exit;
    }
    $sql_2 = "select * from DEPARTMENT where Dnumber = '$department_number' order by Dnumber";
    $result_2 = mysqli_query($conn, $sql_2);
    if(mysqli_num_rows($result_2) > 0) {
        echo "<div class='error-message'>The department with number <strong>$department_number</strong> already exists in the <strong>DEPARTMENT</strong> table.</div>";
        output_message_1();
        exit;
    }
    $sql_3 = "insert into DEPARTMENT (Dname, Dnumber, Mgr_ssn, Mgr_start_date)
        values ('$department_name', '$department_number', '$manager_ssn', '$manager_start_date')";
    $result_3 = mysqli_query($conn, $sql_3);
    if($result_3) {
        echo "<div class='success-message mb-4'>The department with name <strong>$department_name</strong> and number <strong>$department_number</strong> was successfully inserted into the <strong>DEPARTMENT</strong> table.</div>";
    } else {
        echo "<div class='error-message mb-4'>There was an error inserting the department with name <strong>$department_name</strong> and number <strong>$department_number</strong> into the <strong>DEPARTMENT</strong> table.</div>";
    }
    $sql_4 = "insert into DEPT_LOCATIONS (Dnumber, Dlocation)
        values ('$department_number', 'Columbus')";
    $result_4 = mysqli_query($conn, $sql_4);
    if($result_4) {
        echo "<div class='success-message'>The department with number <strong>$department_number</strong> was successfully inserted into the <strong>DEPT_LOCATIONS</strong> table.</div>";
    } else {
        echo "<div class='error-message'>There was an error inserting the department with number <strong>$department_number</strong> into the <strong>DEPT_LOCATIONS</strong> table.</div>";
    }
    output_message_2();
    ?>
</body>
</html>
