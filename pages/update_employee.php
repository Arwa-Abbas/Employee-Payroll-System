<?php include('../connection/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Employee</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>Update Employee</h2>

    <form method="POST">
        <input type="number" name="id" placeholder="Enter Employee ID" required>
        <input type="text" name="department" placeholder="New Department">
        <input type="number" name="salary" placeholder="New Salary">
        <input type="submit" name="update" value="Update">
    </form>

    <a href="../index.php" class="back-btn">⬅ Back to Home</a>
</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    if (!empty($department)) {
        $sql = "UPDATE employees SET department = :department WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':department' => $department, ':id' => $id]);
    }

    if (!empty($salary)) {
        $sql = "UPDATE employees SET salary = :salary WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':salary' => $salary, ':id' => $id]);
    }

    echo "<script>alert('Employee details updated successfully!');</script>";
}
?>

