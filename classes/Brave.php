<?php

class Brave extends Human // 同階層だと呼び出せる？＝＞同階層でなくとも呼べた
{
  public function doAttack($enemy)
  {
    // 乱数の発生
    if (rand(1, 3) === 1) {
      // スキルの発動
      echo "『" . $this->name . "』のスキルが発動した！\n";
      echo "『ぜんりょくぎり』！！\n";
      echo $enemy->name . " に " . $this->attackPoint * 1.5 . " のダメージ！\n";
      $enemy->tookDamage($this->attackPoint * 1.5);
    } else {
      // もしくは通常攻撃、親クラスの
      parent::doAttack($enemy);
    }
    return true;
  }
}
