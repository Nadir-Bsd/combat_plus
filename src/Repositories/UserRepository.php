<?php

final class UserRepository extends AbstractRepository
{

    private UserMapper $mapper;

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new UserMapper();
    }

    public function findUserByName(string $name): ?User
    {
        try {
            $query = "SELECT * FROM user WHERE name = :name";
            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':name' => $name
            ]);
            $res = $statement->fetch(PDO::FETCH_ASSOC);

            if ($res['id_hero'] != null) {
                $heroRepo = new HeroRepository();
                $res['heroObject'] = $heroRepo->findHeroById($res['id_hero']);
            } else {
                $res['heroObject'] = null;
            }
        } catch (PDOException $error) {
            echo "Erreur lors de la requete : " . $error->getMessage();
        }

        if($res){
            return $this->mapper->hydrate($res[0]);
        }
        return null;
    }

    public function addUser(string $name): ?User
    {
        try {
            $query = "INSERT INTO user (name) VALUES (:name)";
            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':name' => $name
            ]);

            // search and return User Object
            return $this->findUserByName($name);
        } catch (PDOException $error) {
            echo "Erreur lors de la requete : " . $error->getMessage();
        }
    }

    public function deleteUser(int $id): void
    {
        $query = "DELETE FROM user WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        if (!$statement->execute([':id' => $id])) {
            throw new Exception("Échec de la suppression du user avec l'ID $id.");
        }
    }

    public function updateUser(User $newUserObject, int $idHero): ?User
    {
        $query = "UPDATE user SET name = :name, id_hero = :id_hero WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        if (!$statement->execute([
            ':id' => $newUserObject->getId(),
            ':name' => $newUserObject->getName(),
            'id_hero' => $idHero,
        ])) {
            throw new Exception("Échec de la modification du user avec l'ID " . $newUserObject->getId() . ".");
        }
        return $newUserObject;
    }
}
