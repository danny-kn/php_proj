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
            <p class="text-xl text-secondary">Remove an existing employee from the <span class="font-semibold text-teal-600">EMPLOYEE</span> table</p>
        </div>
    </header>
    <?php
    /*
    Connect to the database...
    */
    $conn = mysqli_connect('localhost', 'root', '*Qwerty_123', 'individual_project_02');
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "<div class='success-message mb-6 max-w-2xl mx-auto'>Successfully connected to the database!</div>";
    }
    ?>
    <div class="max-w-2xl mx-auto">
        <div class="glass-card p-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Remove Employee</h2>
            <form action="remove_employee_process.php" method="post" class="space-y-6">
                <div>
                    <label class="block text-gray-900 font-medium mb-2">Employee SSN *</label>
                    <select name="ssn" required class="glass-input w-full px-4 py-3">
                        <option value="">Select Employee to Remove</option>
                        <?php
                        $sql = "select Ssn, Fname, Lname from EMPLOYEE order by Ssn";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $ssn = $row['Ssn'];
                            $fname = $row['Fname'];
                            $lname = $row['Lname'];
                            print <<< _HTML_
                            <option value="$ssn">$ssn - $fname $lname</option>
                            _HTML_;
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <div class="pt-6">
                    <button type="submit" class="glass-button w-full py-4 font-semibold text-gray-900 text-lg">
                        REMOVE EMPLOYEE
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-8">
        <a href="main.php" class="nav-link inline-block">
            ← Back to Main Page
        </a>
    </div>
</body>
</html>
