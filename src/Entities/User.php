<?php
final class User {

    private int $id;
    private string $name;
    private Hero $heroObject;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHero(): ?Hero
    {
        return $this->heroObject;
    }

    public function setHero(Hero $heroObject): self
    {
        $this->heroObject = $heroObject;
        return $this;
    }
};
?>