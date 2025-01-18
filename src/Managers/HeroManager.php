<?php 

final class HeroManager {


    // property
    private HeroRepository $heroRepo;
    // method magic 

    public function __construct()
    {
        $this->heroRepo = new HeroRepository();
    }

    // method custom
    public function findHeroById(int $id): ?Hero
    {
        return $this->heroRepo->findHeroById($id);
    }

    public function createHeroObject(int $id, string $name, float $hp, float $strength, float $speed, float $defense): Hero
    {
        return new Hero($id, $name, $hp, $strength, $speed, $defense);
    }

}


?>