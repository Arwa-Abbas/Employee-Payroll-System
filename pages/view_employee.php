<?php include('../connection/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Employees</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container large">
    <h2>All Employees</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Salary</th>
        </tr>

        <?php
        $stmt = $pdo->query("SELECT * FROM employees");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['department']}</td>
                    <td>{$row['designation']}</td>
                    <td>{$row['salary']}</td>
                  </tr>";
        }
        ?>
    </table>

    <a href="../index.php" class="back-btn">⬅ Back to Home</a>
</div>

</body>
</html>
