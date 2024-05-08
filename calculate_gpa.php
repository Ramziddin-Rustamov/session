<?php
include 'includes/db.php';

$stmt = $pdo->prepare("SELECT * FROM subjects");
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_points = 0;
$total_subjects = 0;

foreach ($subjects as $subject) {
    $total_points += $subject['points'];
    $total_subjects++;
}

$gpa = $total_points / $total_subjects;

echo "GPA: " . $gpa;
?>
