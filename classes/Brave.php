<?php

class Brave extends Human // 同階層だと呼び出せる？＝＞同階層でなくとも呼べた
{
  const MAX_HITPOINT = 120;
  private $hitPoint = self::MAX_HITPOINT; // public → privateに変更
  private $attackPoint = 30; // public → privateに変更

  // $instanceには、自身のクラスのインスタンスが入ります。

  private static $instance;

  private function __construct($name) // コンストラクタはprivateにすることでシングルトンを実現
  {
    // 子クラスの情報使って親のコンストラクト使うこともできる
    parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->intelligence);
  }

  // シングルトンで常にインスタンスは一つしか生成しない
  public static function getInstance($name)
  {
    if (empty(self::$instance)) {
      self::$instance = new Brave($name);
    }

    return self::$instance;
  }

  public function doAttack($enemies)
  {

    // 自分のHPが0以上か、敵のHPが0以上かなどをチェックするメソッドを用意。
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }
    // ターゲットの決定
    $enemy = $this->selectTarget($enemies);

    // 乱数の発生
    if (rand(1, 3) === 1) {
      // スキルの発動
      echo "『" . $this->getName($enemy) . "』のスキルが発動した！\n";
      echo "『ぜんりょくぎり』！！\n";
      echo $enemy->getName($enemy) . " に " . $this->attackPoint * 1.5 . " のダメージ！\n";
      $enemy->tookDamage($this->attackPoint * 1.5);
    } else {
      // もしくは通常攻撃、親クラスの
      parent::doAttack($enemies);
    }
    return true;
  }
}
