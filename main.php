<?php

// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php'); // ここを追加

// インスタンス化
// $tiida = new Human();
$tiida = new Brave(); // ここを変更

// 再読み込みしない

/************** 中略 **************/

// インスタンス化
// $tiida = new Human();
$goblin = new Enemy();

//========== ここから追加する ==========
$tiida->name = "ティーダ"; // nameがprivateだと落ちる
$goblin->name = "ゴブリン";
//========== ここまで追加する ==========

echo $tiida->name . "\n";
echo $goblin->name . "\n";

echo $tiida->name . "　：　" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . "　：　" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
echo "\n";

// 攻撃
$tiida->doAttack($goblin); // 敵クラスのインスタンスを入れて呼び出し
echo "\n";
$goblin->doAttack($tiida);
echo "\n";

//========== ここから追加する ==========
// どちらかのHPが０になるまで繰り返す
while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
  //========== ここまで追加する ==========

  // 現在のHPの表示
  echo $tiida->name . "　：　" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
  echo $goblin->name . "　：　" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
  echo "\n";

  // 攻撃
  $tiida->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($tiida);
  echo "\n";
}

//========== ここから追加する ==========
echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->name . "　：　" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . "　：　" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n\n";
//========== ここまで追加する ==========
