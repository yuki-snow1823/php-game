<?php

class Enemy
{
  const MAX_HITPOINT = 50; // 最大HPの定義 定数
  private $name; // public → privateに変更
  private $hitPoint = 50; // public → privateに変更
  private $attackPoint = 10; // public → privateに変更

  public function __construct($name, $attackPoint) // ここを変更
  {
    $this->name = $name;
    $this->attackPoint = $attackPoint;

  }

  public function getName()
  {
    return $this->name;
  }

  public function getHitPoint()
  {
    return $this->hitPoint;
  }

  public function getAttackPoint()
  {
    return $this->attackPoint;
  }

  public function doAttack($humans)

  {
            //========== ここから追加する ==========
        // チェック１：自身のHPが0かどうか
        if ($this->hitPoint <= 0) {
          return false;
      }

      $humanIndex = rand(0, count($humans) - 1); // 添字は0から始まるので、-1する
      $human = $humans[$humanIndex];

      //========== ここまで追加する ==========
    echo "『" . $this->name . "』の攻撃！\n";
    echo "【" . $human->getName() . "】に " . $this->attackPoint . " のダメージ！\n";
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
