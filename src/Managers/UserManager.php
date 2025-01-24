<?php 

final class UserManager {


    // property
    private UserRepository $userRepo;
    private Validator $validator;
    
    // method magic
    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->validator = new Validator();
    }

    // method custom
    public function findUserByName(string $name): ?User
    {
        return $this->userRepo->findUserByName($name);
    }

    public function addUser(array $postArray): ?User
    {
        $this->validator->checkMethods('POST');

        // select Strate
        $this->validateData($postArray);
        
        if (!$this->validator->validate($postArray)) {
            header('location: ../../public/home.php');
        }

        $sanitizedData = $this->validator->sanitize($postArray);

        return $this->userRepo->addUser($sanitizedData['name']);
    }

    public function deleteUser(int $id): void
    {
        try {
            $this->userRepo->deleteUser($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addIdHeroAtUser(User $userObject, int $idHero): ?User
    {
        try {
            return $this->userRepo->updateUser($userObject, $idHero);
        } catch (Exception $e) {
            echo $e->getMessage();
        }    
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
}


?>