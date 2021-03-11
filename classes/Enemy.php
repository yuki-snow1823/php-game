<?php

class Enemy
{
  const MAX_HITPOINT = 50; // 最大HPの定義 定数
  private $name; // public → privateに変更
  private $hitPoint = 50; // public → privateに変更
  private $attackPoint = 10; // public → privateに変更

  public function doAttack($human)
  {
    echo "『" . $this->name . "』の攻撃！\n";
    echo "【" . $human->name . "】に " . $this->attackPoint . " のダメージ！\n";
    $human->tookDamage($this->attackPoint);
  }

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    // HPが0未満にならないための処理
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }
}
