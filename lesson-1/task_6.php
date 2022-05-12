<?php

class A {
  public function foo() {
    static $x = 0;
    echo ++$x;
  }
}
class B extends A { // * Здесь class B наследуется от class A и статический метод присваивается новому классу 
}
$a1 = new A();
$b1 = new B();

// Теперь и у B и у A есть static $x

$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2