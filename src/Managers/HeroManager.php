<?php 

final class HeroManager {


    // property
    private HeroRepository $heroRepo;
    private Validator $validator;
    private HeroMapper $heroMapper;
    
    // method magic
    public function __construct()
    {
        $this->heroRepo = new HeroRepository();
        $this->validator = new Validator();
        $this->heroMapper = new HeroMapper();
    }

    // method custom
    public function findHeroById(int $id): ?Hero
    {
        return $this->heroRepo->findHeroById($id);
    }

    public function validateData(array $postArray)
    {

        foreach ($postArray as $key => $value) {
            $this->validator->addStrategy($key, new RequiredValidatorStrategy());
            
            if ($key === 'name') {
                $this->validator->addStrategy($key, new StringValidatorStrategy(20));
                continue;
            } elseif (is_float($value)){
                $this->validator->addStrategy($key, new FloatValidatorStrategy());
                continue;
            }else {
                $this->validator->addStrategy($key, new IntegerValidatorStrategy());
                continue;
            }
        }
    }

    public function addHero(Hero $heroObject): ?int
    {
        $heroArray = $this->heroMapper->mapToArray($heroObject);

        $this->validateData($heroArray);
        
        if (!$this->validator->validate($heroArray)) {
            header('location: ../../public/heros.php');
        }
        
        // float * 100 ici
        $sanitizedData = $this->validator->sanitize($heroArray);
        
        // need somthing who's return sanityze data
        return $this->heroRepo->addHero($sanitizedData['name'], $sanitizedData['hp'], $sanitizedData['strength'], $sanitizedData['speed'], $sanitizedData['defense']);
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