<?php

class Brave extends Human // 同階層だと呼び出せる？＝＞同階層でなくとも呼べた
{
  const MAX_HITPOINT = 120;
  private $hitPoint = self::MAX_HITPOINT; // public → privateに変更
  private $attackPoint = 30; // public → privateに変更

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }
    
  public function doAttack($enemy)
  {
        //========== ここから追加する ==========
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
          return false;
      }
      //========== ここまで追加する ==========

    // 乱数の発生
    if (rand(1, 3) === 1) {
      // スキルの発動
      echo "『" . $this->getName($enemy) . "』のスキルが発動した！\n";
      echo "『ぜんりょくぎり』！！\n";
      echo $enemy->getName($enemy) . " に " . $this->attackPoint * 1.5 . " のダメージ！\n";
      $enemy->tookDamage($this->attackPoint * 1.5);
    } else {
      // もしくは通常攻撃、親クラスの
      parent::doAttack($enemy);
    }
    return true;
  }
}
