<?php

final class Monster extends Character{

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->hp = $this->hp * 0.8;
        $this->strength = $this->strength * 0.8;
        $this->speed = $this->speed * 0.8;
        $this->defense = $this->defense * 0.8;
    }
}
?>