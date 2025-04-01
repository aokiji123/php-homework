<!DOCTYPE html>
<html>
<head>
    <title>Styled tag</title>
</head>
<body>
<?php
$tag = "div";
$background_color = "blue";
$color = "red";
$width = "200px";
$height = "100px";

echo "<$tag style='background-color: $background_color; 
          color: $color; 
          width: $width; 
          height: $height;'>
          It's styled tag!
          </$tag>";
?>
</body>
</html>