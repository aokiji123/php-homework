<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
</head>
<body>
<form method="POST">
    <input type="email" name="email" placeholder="Enter your email" required><br>
    <input type="checkbox" name="subscribe" id="subscribe">
    <label for="subscribe">Subscribe</label><br>
    <button type="submit" name="send">Send</button>
</form>

<?php
if (isset($_POST['send'])) {
    if (isset($_POST['subscribe'])) {
        echo "Thank you for subscribing";
    } else {
        header("Refresh:0"); // Оновлення сторінки
        exit();
    }
}
?>
<br><a href="quiz1.php">Start Quiz</a>
</body>
</html>