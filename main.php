<?php

// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php'); // ここを追加

// インスタンス化
// $tiida = new Human();
// $tiida = new Brave(); // ここを変更

// 再読み込みしない

/************** 中略 **************/

// インスタンス化
// $tiida = new Human();
// $goblin = new Enemy();

//========== ここから追加する ==========
$tiida = new Brave("ティーダ"); // ここを変更
$goblin = new Enemy("ゴブリン"); // ここを変更
//========== ここまで追加する ==========

echo $tiida->getName() . "\n";
echo $goblin->getName() . "\n";

// echo $tiida->name . "　：　" . $tiida->getHitpoint() . "/" . $tiida->getHitpoint() . "\n";
// echo $goblin->name . "　：　" . $goblin->getHitpoint() . "/" . $goblin->getHitpoint() . "\n";
// echo "\n";

// 攻撃
$tiida->doAttack($goblin); // 敵クラスのインスタンスを入れて呼び出し
echo "\n";
$goblin->doAttack($tiida);
echo "\n";

//========== ここから追加する ==========
// どちらかのHPが０になるまで繰り返す
while ($tiida->getHitpoint() > 0 && $goblin->getHitpoint() > 0) {
  //========== ここまで追加する ==========

  // 現在のHPの表示
  echo $tiida->getName() . "　：　" . $tiida->getHitPoint() . "/" . $tiida->getHitpoint() . "\n"; // ここを追加
  echo $goblin->getName() . "　：　" . $goblin->getHitPoint() . "/" . $goblin->getHitpoint() . "\n"; // ここを追加
  echo "\n";

  // 攻撃
  $tiida->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($tiida);
  echo "\n";
}

//========== ここから追加する ==========
echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->getName() . "　：　" . $tiida->getHitpoint() . "/" . $tiida->getHitpoint() . "\n";
echo $goblin->getName() . "　：　" . $goblin->getHitpoint() . "/" . $goblin->getHitpoint() . "\n\n";
//========== ここまで追加する ==========
