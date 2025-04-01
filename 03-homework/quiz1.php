<?php
session_start();
require_once 'functions.php';

// Move form processing logic to the top before any HTML output
if (isset($_POST['next'])) {
    $score = 0;
    $questions = [
        "What is 2+2?" => ["1" => 0, "2" => 0, "3" => 0, "4" => 1],
        "Capital of France?" => ["Paris" => 1, "London" => 0, "Berlin" => 0, "Madrid" => 0],
        "Which planet is closest to the Sun?" => ["Venus" => 0, "Mercury" => 1, "Earth" => 0, "Mars" => 0],
        "What is the largest ocean?" => ["Atlantic" => 0, "Indian" => 0, "Arctic" => 0, "Pacific" => 1],
        "How many days in a week?" => ["5" => 0, "6" => 0, "7" => 1, "8" => 0],
        "What color is the sky on a clear day?" => ["Green" => 0, "Blue" => 1, "Red" => 0, "Yellow" => 0],
        "Which animal is known as man's best friend?" => ["Cat" => 0, "Dog" => 1, "Bird" => 0, "Fish" => 0],
        "What is 10 × 5?" => ["40" => 0, "45" => 0, "50" => 1, "55" => 0],
        "Which season comes after summer?" => ["Spring" => 0, "Summer" => 0, "Autumn" => 1, "Winter" => 0],
        "What is the chemical symbol for water?" => ["HO" => 0, "H2O" => 1, "O2" => 0, "CO2" => 0]
    ];
    
    if (isset($_SESSION['question_keys_quiz1'])) {
        for ($i = 1; $i <= 10; $i++) {
            if (isset($_POST["q$i"]) && $_POST["q$i"] == "1") { // Compare as string
                $score++;
            }
        }
        $_SESSION['score1'] = $score;
        header("Location: quiz2.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz - Part 1</title>
</head>
<body>
<form method="POST" action="quiz1.php" onsubmit="return checkAllAnswered()">
    <?php
    $questions = [
        "What is 2+2?" => ["1" => 0, "2" => 0, "3" => 0, "4" => 1],
        "Capital of France?" => ["Paris" => 1, "London" => 0, "Berlin" => 0, "Madrid" => 0],
        "Which planet is closest to the Sun?" => ["Venus" => 0, "Mercury" => 1, "Earth" => 0, "Mars" => 0],
        "What is the largest ocean?" => ["Atlantic" => 0, "Indian" => 0, "Arctic" => 0, "Pacific" => 1],
        "How many days in a week?" => ["5" => 0, "6" => 0, "7" => 1, "8" => 0],
        "What color is the sky on a clear day?" => ["Green" => 0, "Blue" => 1, "Red" => 0, "Yellow" => 0],
        "Which animal is known as man's best friend?" => ["Cat" => 0, "Dog" => 1, "Bird" => 0, "Fish" => 0],
        "What is 10 × 5?" => ["40" => 0, "45" => 0, "50" => 1, "55" => 0],
        "Which season comes after summer?" => ["Spring" => 0, "Summer" => 0, "Autumn" => 1, "Winter" => 0],
        "What is the chemical symbol for water?" => ["HO" => 0, "H2O" => 1, "O2" => 0, "CO2" => 0]
    ];

    shuffle_assoc($questions);
    
    // Store question keys in session for score calculation
    $_SESSION['question_keys_quiz1'] = array_keys($questions);

    $i = 1;
    foreach ($questions as $question => $answers) {
        echo "<h3>$i. $question</h3>";
        foreach ($answers as $answer => $is_correct) {
            echo "<input type='radio' name='q$i' value='$is_correct'>$answer<br>";
        }
        $i++;
    }
    ?>
    <button type="submit" name="next">Next</button>
</form>

<script>
    function checkAllAnswered() {
        for(let i = 1; i <= 10; i++) {
            if(!document.querySelector(`input[name='q${i}']:checked`)) {
                return confirm("Not all questions answered. Proceed?");
            }
        }
        return true;
    }
</script>
</body>
</html>