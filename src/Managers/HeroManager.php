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

    public function createHero(string $name, float $hp, float $strength, float $speed, float $defense, int $id_user): int
    {
        return $this->heroRepo->createHero( $name, $hp * 100, $strength * 100, $speed * 100, $defense * 100, $id_user);
    }

    public function deleteHero(int $id): void
    {
        try {
            $this->heroRepo->deleteHero($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteHeroByUserId(int $id_user): void
    {
        try {
            $this->heroRepo->deleteHeroByUserId($id_user);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function createHeroObject(int $id, string $name, float $hp, float $strength, float $speed, float $defense): Hero
    {
        return new Hero($id, $name, $hp, $strength, $speed, $defense);
    }

}


?>