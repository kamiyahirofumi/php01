<?php
$arr = ["a","b","c"];
$arr[] = "d";
// echo $arr[0];
echo "<pre>";
var_dump($arr); // （）が必要
echo "</pre>";

//  文字列を配列へ/explode()
$str = "one,two,three";
$result = explode(",",$str);
echo "<pre>";
var_dump($result); // （）が必要
echo "</pre>";

?>