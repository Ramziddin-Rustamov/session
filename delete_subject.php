<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM subjects WHERE id=?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
}
?>
