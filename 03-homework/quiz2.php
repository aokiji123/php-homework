<?php
session_start();
require_once 'functions.php';

// Move form processing logic to the top before any HTML output
if (isset($_POST['next'])) {
    $score = 0;
    $questions = [
        "Colors in rainbow?" => ["Red" => 1, "Pink" => 0, "Blue" => 1, "Black" => 0],
        "Planets?" => ["Earth" => 1, "Mars" => 1, "Sun" => 0, "Moon" => 0],
        "Continents?" => ["Africa" => 1, "Florida" => 0, "Asia" => 1, "Arctic" => 0],
        "Days of weekend?" => ["Saturday" => 1, "Monday" => 0, "Sunday" => 1, "Friday" => 0],
        "Primary colors?" => ["Red" => 1, "Green" => 0, "Blue" => 1, "Yellow" => 1],
        "Seasons?" => ["Summer" => 1, "Autumn" => 1, "Winter" => 1, "Day" => 0],
        "Vowels in English?" => ["A" => 1, "B" => 0, "E" => 1, "F" => 0],
        "Even numbers?" => ["2" => 1, "3" => 0, "4" => 1, "5" => 0],
        "Fruits?" => ["Apple" => 1, "Carrot" => 0, "Banana" => 1, "Potato" => 0],
        "Metals?" => ["Gold" => 1, "Wood" => 0, "Silver" => 1, "Plastic" => 0]
    ];
    
    if (isset($_SESSION['question_keys_quiz2'])) {
        $question_keys = $_SESSION['question_keys_quiz2'];
        
        for ($i = 1; $i <= 10; $i++) {
            $question_key = $question_keys[$i-1];
            $correct_answers = array_filter($questions[$question_key], fn($val) => $val == 1); // Correct answers
            $correct_count = count($correct_answers); // Number of correct answers

            if (isset($_POST["q$i"]) && is_array($_POST["q$i"])) {
                $user_answers = $_POST["q$i"];
                $all_correct = true;

                foreach ($user_answers as $answer) {
                    if ($answer == "0") { // If any incorrect answer is checked, fail this question
                        $all_correct = false;
                        break;
                    }
                }

                if ($all_correct && count($user_answers) == count($correct_answers)) {
                    $score++;
                }
            }
        }
        
        $_SESSION['score2'] = $score;
        header("Location: quiz3.php"); // Redirect after saving
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quiz - Part 2</title>
</head>
<body>
<form method="POST" action="quiz2.php" onsubmit="return checkAllAnswered()">
    <?php
    $questions = [
        "Colors in rainbow?" => ["Red" => 1, "Pink" => 0, "Blue" => 1, "Black" => 0],
        "Planets?" => ["Earth" => 1, "Mars" => 1, "Sun" => 0, "Moon" => 0],
        "Continents?" => ["Africa" => 1, "Florida" => 0, "Asia" => 1, "Arctic" => 0],
        "Days of weekend?" => ["Saturday" => 1, "Monday" => 0, "Sunday" => 1, "Friday" => 0],
        "Primary colors?" => ["Red" => 1, "Green" => 0, "Blue" => 1, "Yellow" => 1],
        "Seasons?" => ["Summer" => 1, "Autumn" => 1, "Winter" => 1, "Day" => 0],
        "Vowels in English?" => ["A" => 1, "B" => 0, "E" => 1, "F" => 0],
        "Even numbers?" => ["2" => 1, "3" => 0, "4" => 1, "5" => 0],
        "Fruits?" => ["Apple" => 1, "Carrot" => 0, "Banana" => 1, "Potato" => 0],
        "Metals?" => ["Gold" => 1, "Wood" => 0, "Silver" => 1, "Plastic" => 0]
    ];

    shuffle_assoc($questions);
    
    // Store question keys in session for score calculation
    $_SESSION['question_keys_quiz2'] = array_keys($questions);

    $i = 1;
    foreach ($questions as $question => $answers) {
        echo "<h3>$i. $question</h3>";
        foreach ($answers as $answer => $is_correct) {
            echo "<input type='checkbox' name='q{$i}[]' value='$is_correct'>$answer<br>";
        }
        $i++;
    }
    ?>
    <button type="submit" name="next">Next</button>
</form>

<script>
    function checkAllAnswered() {
        for(let i = 1; i <= 10; i++) {
            if(!document.querySelector(`input[name='q${i}[]']:checked`)) {
                return confirm("Not all questions answered. Proceed?");
            }
        }
        return true;
    }
</script>
</body>
</html>