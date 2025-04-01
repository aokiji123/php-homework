<?php
session_start();

// Перевіряємо, чи існують ключі сесії, інакше присвоюємо 0
$score1 = isset($_SESSION['score1']) ? $_SESSION['score1'] : 0;
$score2 = isset($_SESSION['score2']) ? $_SESSION['score2'] : 0;
$score3 = isset($_SESSION['score3']) ? $_SESSION['score3'] : 0;

// Якщо жодного результату немає, перенаправляємо на початок
if ($score1 == 0 && $score2 == 0 && $score3 == 0 && !isset($_POST['finish'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz Results</title>
</head>
<body>
<?php
$total = $score1 + $score2 + $score3;
echo "<h2>Results:</h2>";
echo "Part 1 score: $score1/10<br>";
echo "Part 2 score: $score2/10<br>";
echo "Part 3 score: $score3/10<br>";
echo "Total score: $total/30";
session_destroy(); // Очищаємо сесію
?>
<br><a href="index.php">Restart Quiz</a>
</body>
</html>