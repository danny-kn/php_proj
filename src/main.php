<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Project 2: PHP Web Application</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>
<body class="min-h-screen p-6">
    <header class="glass-card p-8 mb-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4 text-gray-900">
                Individual Project 2: 
                <span class="font-light">PHP Web Application</span>
            </h1>
            <p class="text-xl text-secondary">Welcome to the Company Database Management System</p>
        </div>
    </header>
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="section-card p-6">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 mr-3 icon-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <h2 class="text-2xl font-semibold">Insert Employee</h2>
                    </div>
                    <p class="text-secondary mb-6 leading-relaxed">
                        Add a new employee to the <span class="font-semibold text-teal-600">EMPLOYEE</span> table of the company database.
                    </p>
                    <a href="/src/insert_employee.php" class="glass-button text-white px-6 py-3 font-medium inline-block">
                        INSERT EMPLOYEE
                    </a>
                </div>
            </div>
            <div class="section-card p-6">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 mr-3 icon-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <h2 class="text-2xl font-semibold">Remove Employee</h2>
                    </div>
                    <p class="text-secondary mb-6 leading-relaxed">
                        Remove an existing employee from the <span class="font-semibold text-teal-600">EMPLOYEE</span> table of the company database.
                    </p>
                    <a href="/src/remove_employee.php" class="glass-button text-white px-6 py-3 font-medium inline-block">
                        REMOVE EMPLOYEE
                    </a>
                </div>
            </div>
            <div class="section-card p-6">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 mr-3 icon-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <h2 class="text-2xl font-semibold">Insert Department</h2>
                    </div>
                    <p class="text-secondary mb-6 leading-relaxed">
                        Create a new department in the <span class="font-semibold text-teal-600">DEPARTMENT</span> table of the company database.
                    </p>
                    <a href="/src/insert_department.php" class="glass-button text-white px-6 py-3 font-medium inline-block">
                        INSERT DEPARTMENT
                    </a>
                </div>
            </div>
            <div class="section-card p-6">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 mr-3 icon-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <h2 class="text-2xl font-semibold">Assign Project</h2>
                    </div>
                    <p class="text-secondary mb-6 leading-relaxed">
                        Assign working projects to employees in the <span class="font-semibold text-teal-600">WORKS_ON</span> table of the company database.
                    </p>
                    <a href="/src/assign_project.php" class="glass-button text-white px-6 py-3 font-medium inline-block">
                        ASSIGN PROJECT
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
