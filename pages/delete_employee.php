<?php include('../connection/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Delete Employee</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>Delete Employee</h2>

    <form method="POST">
        <input type="number" name="id" placeholder="Enter Employee ID to Delete" required>
        <input type="submit" name="delete" value="Delete">
    </form>

    <a href="../index.php" class="back-btn">⬅ Back to Home</a>
</div>

</body>
</html>

<?php
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM employees WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        echo "<script>alert('Employee deleted successfully!');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>
