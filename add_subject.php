<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $points = $_POST['points'];

    $stmt = $pdo->prepare("INSERT INTO subjects (name, points) VALUES (?, ?)");
    $stmt->execute([$name, $points]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Subject</title>
    <?php
      include 'includes/css.php'
    ?>
</head>
<body>
    <div class="container">
        <h2>Add Subject</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Subject Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="points">Points:</label>
                <input type="number" class="form-control" id="points" name="points">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</body>
</html>
