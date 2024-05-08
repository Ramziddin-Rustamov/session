<?php
include 'includes/db.php';
$stmt = $pdo->prepare("SELECT * FROM subjects");
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subject Points</title>
    <?php
      include 'includes/css.php'
    ?>
</head>
<body>
    <div class="container">
        <h2>Subject Points</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subjects as $subject): ?>
                    <tr>
                        <td><?php echo $subject['name']; ?></td>
                        <td><?php echo $subject['points']; ?></td>
                        <td>
                            <a href="edit_subject.php?id=<?php echo $subject['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete_subject.php?id=<?php echo $subject['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="add_subject.php" class="btn btn-success">Add Subject</a>
        <a href="calculate_gpa.php" class="btn btn-info">Calculate GPA</a>
    </div>
</body>
</html>
