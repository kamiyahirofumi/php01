<?php

//アンケート結果が保存するたテキストファイルを指定
$textfile = 'data/log.txt';
//ファイルを開く
$fp = fopen($textfile, 'rb');   //rで読み込みモード、bで互換性維持 
 
if(!$fp){  //fopen()関数の戻り値を検証
  exit('ファイルがないか異常があります。');
}
 
//テキストを排他的にロックし、その戻り値を検証
if(!flock($fp, LOCK_EX)){
  exit('ファイルをロックできませんでした。');
}
 
//ファイルポインタが EOF（最後）に達するまで、テキストの各行を読み出し、trim()関数で文字列の先頭および末尾にあるホワイトスペースを取り除き配列に格納
while(!feof($fp)){
  $results[] = trim(fgets($fp));
}
 
if($results[11] != 0){  //アンケート結果が0でなければ集計
  echo '<p>アンケートの集計結果：総数 ' . $results[11] . ' 件</p>';
?>
 
<table>
  <thead>
  <tr>
  <th>質問</th>
  <th>人数</th>
  <th>比率</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>性別</td>
<?php
  // 男女の比率計算
  $male_rate   = round($results[0] / $results[11] * 100);
  $female_rate = round($results[1] / $results[11] * 100);
 
  echo '  <td>男性：' . $results[0] . '人<br>'. 
            '女性：' . $results[1] . '人</td>';
  echo '  <td>男性：' . $male_rate . '%<br>'.
            '女性：' . $female_rate . '%</td>';
?>
  </tr>
  <tr>
  <td>年齢</td>
<?php
  $age20_rate = round($results[2] / $results[11] * 100);
  $age30_rate = round($results[3] / $results[11] * 100);
  $age40_rate = round($results[4] / $results[11] * 100);
  $age50_rate = round($results[5] / $results[11] * 100);
 
  echo '  <td>20代：' . $results[2] . '人<br>' .
             '30代：' . $results[3] . '人<br>' .
             '40代：' . $results[4] . '人<br>' .
             '50代：' . $results[5] . '人</td>';
  echo '  <td>20代：' . $age20_rate . '%<br>' .
             '30代：' . $age30_rate . '%<br>' .
             '40代：' . $age40_rate . '%<br>' .
             '50代：' . $age50_rate . '%</td>';
?>
  </tr>
  <tr>
  <td>社内飲み会予算</td> 
  
<?php
  $budget3_rate = round($results[6] / $results[11] * 100);
  $budget5_rate = round($results[7] / $results[11] * 100);
  $budget7_rate = round($results[8] / $results[11] * 100);
  $budget10_rate = round($results[9] / $results[11] * 100);
  $budget11_rate = round($results[10] / $results[11] * 100); 

  echo '  <td>3千円以下：' . $results[6] . '人<br>' .
             '3千円超～5千円以下：' . $results[7] . '人<br>' .
             '5千円超～7千円以下：' . $results[8] . '人<br>' .
             '7千円超～1万円以下：' . $results[9] . '人<br>' .
             '1万円超：' . $results[10] . '人</td>';
  echo '  <td>3千円以下：' . $budget3_rate . '%<br>' .
             '3千円超～5千円以下：' . $budget5_rate . '%<br>' .
             '5千円超～7千円以下：' . $budget7_rate . '%<br>' .
             '7千円超～1万円以下：' . $budget10_rate . '%<br>' .
             '1万円超：' . $budget11_rate . '%</td>';
?>
  </tr>
  </tbody>
  </table>
<?php
} else {
  // アンケートデータがない場合
  echo '  <p class="msg">表示できるようなアンケートデータがありません。</p>';
}
fclose($fp);
echo '<p class="link"><a href="post1.php">アンケートページへ戻る</a></p>';
?>
