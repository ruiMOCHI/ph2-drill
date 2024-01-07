<?php

$number = "100";
//L3は消しても消さなくてもどちらでも大丈夫
$number = 100;  //readmeにはL5の前に処理を書くとあるが、今はL7にずれているので見返す時に注目(var_dumpがずれている)

var_dump($number);




//これでもいける
// <?php

// $number = "100";

// $numbers = (int)$number;  ➝ 新しく変数numbersを宣言 = (希望するデータ型)変数  と書く

// var_dump($numbers);