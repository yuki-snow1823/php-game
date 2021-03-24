<?php
// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

require_once('./classes/Message.php');


// インスタンス化
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

  // 仲間全員か敵全員のHPが０になるまで繰り返す
  $deathCnt = 0; // HPが0以下の仲間の数
  foreach ($members as $member) {
    if ($member->getHitPoint() > 0) {
      $isFinishFlg = false;
      break;
    }
    $deathCnt++;
  }
  if ($deathCnt === count($members)) {
    $isFinishFlg = true;
    echo "GAME OVER ....\n\n";
    break;
  }

  $deathCnt = 0; // HPが0以下の敵の数
  foreach ($enemies as $enemy) {
    if ($enemy->getHitPoint() > 0) {
      $isFinishFlg = false;
      break;
    }
    $deathCnt++;
  }
  if ($deathCnt === count($enemies)) {
    $isFinishFlg = true;
    echo "♪♪♪ファンファーレ♪♪♪\n\n";
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
