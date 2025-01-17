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
}
?>