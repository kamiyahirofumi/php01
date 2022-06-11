<html>
<head>
<meta charset="utf-8">
<title>POST練習</title>
</head>
<body>
<form action="write1.php" method="post">
<!-- 引用 -->
<div>
<p>性別</p>
  <input type="radio" name="gender" id="male" value="1">
    <label for="male"> 男性 </label>  
  <input type="radio" name="gender" id="female"  value="2">
    <label for="female"> 女性 </label>  
</div>
<div>
<label for="age"> 年齢 </label>
<select name="age" id="age">
<option value="0" selected>選択してください。</option>
<?php
for($num = 2; $num <= 5; $num++) {
  echo '<option value="' . $num . '">' . $num . '0代</option>' . "\n";
}
?>
</select>
</div>
<div>
<p>社内の飲み会でいくら使えますか？</p>
  <input type="radio" name="budget" id="3" value="1">
    <label for="3"> 3千円以下 </label>  
  <input type="radio" name="budget" id="5" value="2">
    <label for="5"> 3千円超～5千円以下 </label>  
  <input type="radio" name="budget" id="7" value="3">
    <label for="7"> 5千円超～7千円以下 </label>
  <input type="radio" name="budget" id="10" value="4">
    <label for="10"> 7千円超～1万円以下 </label>
  <input type="radio" name="budget" id="11" value="4">
    <label for="10"> 1万円超 </label>
</div>
<!-- 引用終わり -->
	<input type="submit" value="送信">
</form>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>