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
            <p class="text-xl text-secondary">Insert a new employee into the <span class="font-semibold text-teal-600">EMPLOYEE</span> table</p>
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
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Insert New Employee</h2>
            <form action="insert_employee_process.php" method="post" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">First Name *</label>
                        <input type="text" name="first_name" required 
                               class="glass-input w-full px-4 py-3">
                    </div>
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">Middle Initial</label>
                        <input type="text" name="middle_initial" 
                               class="glass-input w-full px-4 py-3" maxlength="1">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">Last Name *</label>
                        <input type="text" name="last_name" required 
                               class="glass-input w-full px-4 py-3">
                    </div>
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">Employee SSN *</label>
                        <input type="text" name="ssn" required 
                               class="glass-input w-full px-4 py-3" 
                               placeholder="123456789">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">Birth Date</label>
                        <input type="date" name="birth_date" 
                               class="glass-input w-full px-4 py-3">
                    </div>
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">Sex</label>
                        <select name="sex" class="glass-input w-full px-4 py-3">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-900 font-medium mb-2">Address</label>
                    <input type="text" name="address" 
                           class="glass-input w-full px-4 py-3" 
                           placeholder="123 Main St, City, State">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">Salary</label>
                        <input type="number" step="0.01" name="salary" 
                               class="glass-input w-full px-4 py-3" 
                               placeholder="50000.00">
                    </div>
                    <div>
                        <label class="block text-gray-900 font-medium mb-2">Supervisor SSN</label>
                        <input type="text" name="supervisor_ssn" 
                               class="glass-input w-full px-4 py-3" 
                               placeholder="123456789">
                    </div>
                </div>
                <div>
                    <label class="block text-gray-900 font-medium mb-2">Department Number *</label>
                    <select name="department_number" required class="glass-input w-full px-4 py-3">
                        <option value="">Select Department</option>
                        <?php
                        $sql = "select Dnumber, Dname from DEPARTMENT order by Dnumber";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $department_number = $row['Dnumber'];
                            $department_name = $row['Dname'];
                            print <<< _HTML_
                            <option value = "$department_number">$department_number - $department_name</option>
                            _HTML_;
                        }
                        mysqli_close($conn);
                        ?>
                    </select>
                </div>
                <div class="pt-6">
                    <button type="submit" class="glass-button w-full py-4 font-semibold text-gray-900 text-lg">
                        INSERT EMPLOYEE
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
