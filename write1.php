<?php
$gender = $_POST["gender"];
$age = $_POST["age"];
$budget = $_POST["budget"];
$c = ",";

//文字作成
$str = $gender.$c.$age.$c.$budget;
//File書き込み
$file = fopen("data/data1.txt","a");	// ファイル読み込み
fwrite($file, $str."\n");
fclose($file);

$textfile = 'data/log.txt';
$fp = fopen($textfile, 'r+b');

while (!feof($fp)){
    $results[] = trim(fgets($fp));
}

if($gender == 1) $results[0] ++;
if($gender == 2) $results[1] ++;

if($age == 2) $results[2] ++;
if($age == 3) $results[3] ++;
if($age == 4) $results[4] ++;
if($age == 5) $results[5] ++;
 
if($budget == 1) $results[6] ++;
if($budget == 2) $results[7] ++;
if($budget == 3) $results[8] ++;
if($budget == 4) $results[9] ++;
if($budget == 5) $results[10] ++;
 
$results[11] ++;
 
rewind($fp);

foreach($results as $value) {
    fwrite($fp, $value . "\n");
  }

fclose($fp); 

?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
<li><a href="post1.php">アンケートページへ戻る</a></li>
<li><a href="read1.php">集計結果を確認する。</a></li>
</ul>
</body>
</html>