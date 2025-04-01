<?php
function shuffle_assoc(&$array) {
    $keys = array_keys($array);
    shuffle($keys);
    $new = [];
    foreach ($keys as $key) {
        $new[$key] = $array[$key];
    }
    $array = $new;
}
?>