<?php

final class Hero extends Character {

    public function __construct(int $id, string $name, float $hp, float $strength, float $speed, float $defense)
    {
        parent::__construct($id, $name);
        $this->hp = $this->hp * $hp;
        $this->strength = $this->strength * $strength;
        $this->speed = $this->speed * $speed;
        $this->defense = $this->defense * $defense;
    }
}
?>