<?php

interface AttackableInterface
{
    public function getHp(): int;
    public function setHp(int $hp): self;
}

?>