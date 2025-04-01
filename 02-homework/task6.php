<!DOCTYPE html>
<html>
<head>
    <title>Authorization</title>
</head>
<body>
<?php
$session_id = 1;

if ($session_id == 0) {
    echo "<h2>Реєстрація</h2>";
    echo "<form>";
    echo "<label>Логін: <input type='text' name='login'></label><br>";
    echo "<label>Пароль: <input type='password' name='password'></label><br>";
    echo "<input type='submit' value='Register'>";
    echo "</form>";
} elseif ($session_id == 1) {
    echo "<h2>You're registered, log in</h2>";
}
?>
</body>
</html>