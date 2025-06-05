<?php

trait A {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait B {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Rozmowa {
    use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

$rozmowca = new Rozmowa();
$rozmowca->smallTalk();
echo "<br>";
$rozmowca->bigTalk();
?>