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
            <p class="text-xl text-secondary">Assign working projects to employees in the <span class="font-semibold text-teal-600">WORKS_ON</span> table</p>
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
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Assign Project to Employee</h2>
            <form action="assign_project_process.php" method="post" class="space-y-6">
                <div>
                    <label class="block text-gray-900 font-medium mb-2">Employee SSN *</label>
                    <select name="employee_ssn" required class="glass-input w-full px-4 py-3">
                        <option value="">Select Employee</option>
                        <?php
                        $sql_1 = "select Ssn, Fname, Lname from EMPLOYEE order by Ssn";
                        $result_1 = mysqli_query($conn, $sql_1);
                        while ($row = mysqli_fetch_array($result_1, MYSQLI_ASSOC)) {
                            $employee_ssn = $row['Ssn'];
                            $fname = $row['Fname'];
                            $lname = $row['Lname'];
                            print <<< _HTML_
                            <option value = "$employee_ssn">$employee_ssn - $fname $lname</option>
                            _HTML_;
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-900 font-medium mb-2">Project Name *</label>
                    <select name="project_name" required class="glass-input w-full px-4 py-3">
                        <option value="">Select Project</option>
                        <?php
                        $sql_2 = "select Pname, Plocation from PROJECT order by Pname";
                        $result_2 = mysqli_query($conn, $sql_2);
                        while ($row = mysqli_fetch_array($result_2, MYSQLI_ASSOC)) {
                            $project_name = $row['Pname'];
                            $project_location = $row['Plocation'];
                            print <<< _HTML_
                            <option value = "$project_name">$project_name ($project_location)</option>
                            _HTML_;
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-900 font-medium mb-2">Hours Worked *</label>
                    <input type="number" step="0.01" name="hours_worked" required 
                           class="glass-input w-full px-4 py-3" 
                           placeholder="40.00" min="0">
                </div>
                <div class="pt-6">
                    <button type="submit" class="glass-button w-full py-4 font-semibold text-gray-900 text-lg">
                        ASSIGN PROJECT
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
