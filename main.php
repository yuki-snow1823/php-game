<?php

// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

// 再読み込みしない

/************** 中略 **************/

// インスタンス化
$tiida = new Human();
$goblin = new Enemy();

//========== ここから追加する ==========
$tiida->name = "ティーダ";
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
