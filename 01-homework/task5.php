<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
</head>
<body>
<?php
echo "<h3>1. What's the capital of Ukraine?</h3>";
echo "<input type='radio' name='q1' value='a'>Kyiv<br>";
echo "<input type='radio' name='q1' value='b'>Lviv<br>";
echo "<input type='radio' name='q1' value='c'>Odesa<br>";
echo "<input type='radio' name='q1' value='d'>Kharkiv<br>";

echo "<h3>2. What colors does Ukrainian flag contain?</h3>";
echo "<input type='checkbox' name='q2[]' value='a'>Blue<br>";
echo "<input type='checkbox' name='q2[]' value='b'>Yellow<br>";
echo "<input type='checkbox' name='q2[]' value='c'>Red<br>";
echo "<input type='checkbox' name='q2[]' value='d'>Green<br>";

echo "<h3>3. Describe what is PHP</h3>";
echo "<textarea name='q3' rows='4' cols='50'></textarea>";
?>
</body>
</html>