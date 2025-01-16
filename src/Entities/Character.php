<?php
abstract class Character implements AttackableInterface {

    use AttackableTraits;
    protected string $name;
    protected int $hp;
    protected int $strength;
    protected int $speed;
    protected int $defense;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->hp = 100;
        $this->strength = 10;
        $this->speed = 1;
        $this->defense = 5;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getSpeed():int
    {
        return $this->speed;
    }

    public function getDefense():int
    {
        return $this->defense;
    }

    public function attack(AttackableInterface $attacked): AttackableInterface
    {
        return $attacked->setHp($attacked->getHp() - $this->strength);
    }
};

?>