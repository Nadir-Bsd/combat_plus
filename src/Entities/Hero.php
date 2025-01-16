<?php

final class Hero extends Character {

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->hp = $this->hp * 1.2;
        $this->strength = $this->strength * 1.2;
        $this->speed = $this->speed * 1.2;
        $this->defense = $this->defense * 1.2;
    }
}
?>