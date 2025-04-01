<?php
session_start();
require_once 'functions.php';

// Move form processing logic to the top before any HTML output
if (isset($_POST['finish'])) {
    $questions = [
        "What is H2O?" => "water",
        "Earth's satellite?" => "moon",
        "Color of snow?" => "white",
        "Largest planet?" => "jupiter",
        "Opposite of night?" => "day",
        "Capital of Japan?" => "tokyo",
        "What gas do we breathe?" => "oxygen",
        "Baby of a kangaroo?" => "joey",
        "Shape with 3 sides?" => "triangle",
        "First month of the year?" => "january"
    ];

    $score = 0;
    
    if (isset($_SESSION['question_keys_quiz3'])) {
        $question_keys = $_SESSION['question_keys_quiz3'];
        
        for ($i = 1; $i <= 10; $i++) {
            $question_key = $question_keys[$i-1];
            $correct_answer = $questions[$question_key];
            
            if (isset($_POST["q$i"]) && strtolower(trim($_POST["q$i"])) == strtolower($correct_answer)) {
                $score++;
            }
        }
        
        $_SESSION['score3'] = $score;
        header("Location: results.php"); // Redirect after saving
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz - Part 3</title>
</head>
<body>
<form method="POST" action="quiz3.php" onsubmit="return checkAllAnswered()">
    <?php
    $questions = [
        "What is H2O?" => "water",
        "Earth's satellite?" => "moon",
        "Color of snow?" => "white",
        "Largest planet?" => "jupiter",
        "Opposite of night?" => "day",
        "Capital of Japan?" => "tokyo",
        "What gas do we breathe?" => "oxygen",
        "Baby of a kangaroo?" => "joey",
        "Shape with 3 sides?" => "triangle",
        "First month of the year?" => "january"
    ];

    shuffle_assoc($questions);
    
    // Store question keys in session for score calculation
    $_SESSION['question_keys_quiz3'] = array_keys($questions);

    $i = 1;
    foreach ($questions as $question => $correct) {
        echo "<h3>$i. $question</h3>";
        echo "<input type='text' name='q$i'><br>";
        $i++;
    }
    ?>
    <button type="submit" name="finish">Finish</button>
</form>

<script>
    function checkAllAnswered() {
        for(let i = 1; i <= 10; i++) {
            if(!document.querySelector(`input[name='q${i}']`).value) {
                return confirm("Not all questions answered. Proceed?");
            }
        }
        return true;
    }
</script>
</body>
</html>