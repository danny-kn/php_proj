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
            <h1 class="text-3xl font-bold mb-4 text-gray-900">Employee Removal Results</h1>
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
    $ssn = $_POST['ssn'];
    function output_message_1() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='remove_employee.php' class='nav-link inline-block mr-4'>← Back to Remove Employee</a>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    function output_message_2() {
        echo "</div></div>";
        echo "<div class='text-center mt-8'>";
        echo "<a href='main.php' class='nav-link inline-block'>← Back to Main Page</a>";
        echo "</div>";
    }
    $sql_1 = "select * from DEPARTMENT where Mgr_ssn = '$ssn'";
    $result_1 = mysqli_query($conn, $sql_1);
    if(mysqli_num_rows($result_1) > 0) {
        $d_no = mysqli_fetch_array($result_1, MYSQLI_ASSOC)['Dnumber'];
        $sql_2 = "select * from EMPLOYEE where Dno = '$d_no'";
        $result_2 = mysqli_query($conn, $sql_2);
        if((mysqli_num_rows($result_2) - 1) > 0) {
            echo "<div class='error-message'>The department with manager SSN <strong>$ssn</strong> has employee(s) and cannot be removed from the <strong>EMPLOYEE</strong> table.</div>";
            output_message_1();
            exit;
        } else {
            $sql_3 = "delete from DEPARTMENT where Mgr_ssn = '$ssn'";
            $result_3 = mysqli_query($conn, $sql_3);
            if($result_3) {
                echo "<div class='success-message mb-4'>The department with manager SSN <strong>$ssn</strong> was successfully removed from the <strong>DEPARTMENT</strong> table.</div>";
            } else {
                echo "<div class='error-message mb-4'>There was an error removing the department with manager SSN <strong>$ssn</strong> from the <strong>DEPARTMENT</strong> table.</div>";
            }
        }
    }
    $sql_4 = "delete from EMPLOYEE where Ssn = '$ssn'";
    $result_4 = mysqli_query($conn, $sql_4);
    if($result_4) {
        echo "<div class='success-message mb-4'>The employee with SSN <strong>$ssn</strong> was successfully removed from the <strong>EMPLOYEE</strong> table.</div>";
    } else {
        echo "<div class='error-message mb-4'>There was an error removing the employee with SSN <strong>$ssn</strong> from the <strong>EMPLOYEE</strong> table.</div>";
    }
    $sql_5 = "delete from WORKS_ON where Essn = '$ssn'";
    $result_5 = mysqli_query($conn, $sql_5);
    if($result_5) {
        echo "<div class='success-message'>The employee with SSN <strong>$ssn</strong> was successfully removed from the <strong>WORKS_ON</strong> table.</div>";
    } else {
        echo "<div class='error-message'>There was an error removing the employee with SSN <strong>$ssn</strong> from the <strong>WORKS_ON</strong> table.</div>";
    }
    output_message_2();
    ?>
</body>
</html>
