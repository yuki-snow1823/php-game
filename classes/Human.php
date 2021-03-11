<?php

class Human
{
  const MAX_HITPOINT = 100; // 最大HPの定義 定数
  private $name; // public → privateに変更
  private $hitPoint = 100; // public → privateに変更
  private $attackPoint = 20; // public → privateに変更

  public function __construct($name, $hitPoint = 100, $attackPoint = 20) // デフォ
  {
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
  }
  
  public function recoveryDamage($heal, $target)
  {
    $this->hitPoint += $heal;
    if ($this->hitPoint > $target::MAX_HITPOINT) {
      $this->hitPoint = $target::MAX_HITPOINT;
    }
  }
  // メソッド
  public function doAttack($enemy)
  {
    echo "『" . $this->getName() . "』の攻撃！\n";
    echo "【" . $enemy->getName() . "】に " . $this->attackPoint . " のダメージ！\n";
    $enemy->tookDamage($this->attackPoint);
  } // thisにはクラスが入る

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    // HPが0未満にならないための処理
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }
  public function getName()
  {
    return $this->name;
  }

  // public function setName($name)
  // {
  //   $this->name = $name;
  // }
  // コンストラクタで定義するようにした

  public function getHitPoint()
  {
    return $this->hitPoint;
  }

  public function getAttackPoint()
  {
    return $this->attackPoint;
  }
}
