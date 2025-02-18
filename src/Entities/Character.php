<?php
abstract class Character implements AttackableInterface {

    use AttackableTraits;
    protected int $id;
    protected string $name;
    protected int $hp;
    protected int $strength;
    protected int $speed;
    protected int $defense;
    protected string $etat;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->hp = 100;
        $this->strength = 100;
        $this->speed = 100;
        $this->defense = 100;
        $this->etat = 'neutre';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    // public function getEtat(): string
    // {
    //     return $this->etat;
    // }

    // public function setEtat($etat): string
    // {

    //     return $this;
    // }

    public function attack(AttackableInterface $attacked): AttackableInterface
    {
        return $attacked->setHp($attacked->getHp() - $this->strength);
    }
};

?>