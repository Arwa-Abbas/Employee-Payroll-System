<?php include('../connection/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>Add Employee</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="department" placeholder="Department" required>
        <input type="text" name="designation" placeholder="Designation" required>
        <input type="number" name="salary" placeholder="Salary" required>
        <input type="submit" name="submit" value="Add Employee">
    </form>

    <a href="../index.php" class="back-btn">⬅ Back to Home</a>
</div>

</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];

    try {
        $sql = "INSERT INTO employees (name, email, department, designation, salary)
                VALUES (:name, :email, :department, :designation, :salary)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':department' => $department,
            ':designation' => $designation,
            ':salary' => $salary
        ]);
        echo "<script>alert('Employee added successfully!');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>
