<?php

// ローダーのおかげで不要

// // ファイルのロード
// // 親クラスだからLives先にないとダメ
// require_once('./classes/Lives.php');

// require_once('./classes/Human.php');
// require_once('./classes/Enemy.php');
// require_once('./classes/Brave.php');
// require_once('./classes/BlackMage.php');
// require_once('./classes/WhiteMage.php');
// // 戦闘メッセージ管理
// require_once('./classes/Message.php');
require_once('./lib/Utility.php');

require_once('./lib/Loader.php');

// オートロード
$loader = new Loader();
// classesフォルダの中身をロード対象ディレクトリとして登録
$loader->regDirectory(__DIR__ . '/classes');
$loader->register();

// 敵味方グループインスタンス化
$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);

$messageObj = new Message;

$turn = 1;
$isFinishFlg = false;

while (!$isFinishFlg) {
  echo "*** $turn ターン目 ***\n\n";

  // 仲間の表示
  $messageObj->displayStatusMessage($members);
  // 敵の表示
  $messageObj->displayStatusMessage($enemies);

  // 仲間の攻撃
  $messageObj->displayAttackMessage($members, $enemies);
  // 敵の攻撃
  $messageObj->displayAttackMessage($enemies, $members);

  // 戦闘終了条件のチェック 仲間全員のHPが0 または、敵全員のHPが0
  // utilityから呼び出してる
  $isFinishFlg = isFinish($members);
  if ($isFinishFlg) {
    $message = "GAME OVER ....\n\n";
    break;
  }

  $isFinishFlg = isFinish($enemies);
  if ($isFinishFlg) {
    $message = "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }
  $turn++;
}
echo "★★★ 戦闘終了 ★★★\n\n";

// 仲間の表示
$messageObj->displayStatusMessage($members);

// 敵の表示
$messageObj->displayStatusMessage($enemies);

// 現在のHPの表示
foreach ($members as $member) {
  echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
}
echo "\n";
foreach ($enemies as $enemy) {
  echo $enemy->getName() . "　：　" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
}
