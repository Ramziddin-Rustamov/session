<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $points = $_POST['points'];

    $stmt = $pdo->prepare("UPDATE subjects SET name=?, points=? WHERE id=?");
    $stmt->execute([$name, $points, $id]);

    header("Location: index.php");
    exit;
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM subjects WHERE id=?");
    $stmt->execute([$id]);
    $subject = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Subject</title>
    <?php
      include 'includes/css.php'
    ?>
</head>
<body>
    <div class="container">
        <h2>Edit Subject</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $subject['id']; ?>">
            <div class="form-group">
                <label for="name">Subject Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $subject['name']; ?>">
            </div>
            <div class="form-group">
                <label for="points">Points:</label>
                <input type="number" class="form-control" id="points" name="points" value="<?php echo $subject['points']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
