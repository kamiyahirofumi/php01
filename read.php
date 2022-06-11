<?php
$file = fopen('data/data.txt', 'r');

while ($str = fgets($file)) {
    echo nl2br($str); // nl2br() ... 改行文字を追加
}

fclose($file); 
?>