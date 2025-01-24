<?php

final class Monster extends Character{

    public function __construct(string $name, float $hp, float $strength, float $speed, float $defense, int $id = 0)
    {
        parent::__construct($id, $name);
        $this->hp = $this->hp * $hp;
        $this->strength = $this->strength * $strength;
        $this->speed = $this->speed * $speed;
        $this->defense = $this->defense * $defense;
    }
}
?>