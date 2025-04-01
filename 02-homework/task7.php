<!DOCTYPE html>
<html>
<head>
    <title>Div by coordinates</title>
    <style>
        .custom-div {
            position: absolute;
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<?php
$x = 100;
$y = 200;
$color = "red";

$screen_width = 1920;
$screen_height = 1080;

if ($x >= 0 && $y >= 0 && $x <= $screen_width - 100 && $y <= $screen_height - 100) {
    echo "<div class='custom-div' style='left: {$x}px; top: {$y}px; background-color: $color;'></div>";
} else {
    echo "Coordinates are out of screen";
}
?>
</body>
</html>