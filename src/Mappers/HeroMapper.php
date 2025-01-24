<?php

class HeroMapper implements MapperInterface
{
    public static function hydrate(array $data): Hero
    {
        return new Hero(
            $data['id'],
            $data['name'],
            $data['hp'] / 100,
            $data['strength'] / 100,
            $data['speed'] / 100,
            $data['defense'] / 100,
        );
    }

    public static function mapToArray (Hero $heroObject): array
    {
        return [
            'name' => $heroObject->getName(),
            'hp' => $heroObject->getHp() / 100,
            'strength' => $heroObject->getStrength() / 100,
            'speed' => $heroObject->getSpeed() / 100,
            'defense' => $heroObject->getDefense() / 100,
        ];
    }
}
?>