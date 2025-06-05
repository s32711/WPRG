<?php

trait Speed {
    public $speed = 0;

    public function increaseSpeed($value) {
        $this->speed += $value;
    }

    public function decreaseSpeed($value) {
        $this->speed -= $value;
    }
}

class Car {
    use Speed;

    public function start() {
        $this->speed = 0;
        $this->increaseSpeed(10);
    }
}

$car = new Car();
$car->start();
echo $car->speed;
?>