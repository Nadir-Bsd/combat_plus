<?php 

final class HeroRepository extends AbstractRepository {

    private HeroMapper $mapper;

    public function __construct() 
    {
        parent::__construct();
        $this->mapper = new HeroMapper();
    }

    public function findHeroById(int $id): ?Hero
    {
        try {
            $query = "SELECT * FROM hero WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':id' => $id
            ]);
            $res = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo "Erreur lors de la requete : " . $error->getMessage();
        }

        if($res){
            return $this->mapper->hydrate($res);
        }
        return null;
    }

    public function addHero(string $name, int $hp, int $strength, int $speed, int $defense): ?int
    {
        try {

            $query = "INSERT INTO hero (name, hp, strength, speed, defense, etat) VALUES (:name, :hp, :strength, :speed, :defense, :etat)";
            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':name' => $name,
                ':hp' => $hp,
                ':strength' => $strength,
                ':speed' => $speed,
                ':defense' => $defense,
                ':etat' => 'neutre'
            ]);

            // Retourne l'ID de la réponse insérée
            return (int)$this->pdo->lastInsertId();
        } catch (PDOException $error) {
            echo "Erreur lors de la requete : " . $error->getMessage();
        }
    }

    public function deleteHero(int $id): void
    {
        $query = "DELETE FROM hero WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        if (!$statement->execute([':id' => $id])) {
            throw new Exception("Échec de la suppression du héros avec l'ID $id.");
        }
    }

    public function deleteHeroByUserId(int $id_user): void
    {
        $query = "DELETE FROM hero WHERE id_user = :id_user";
        $statement = $this->pdo->prepare($query);
        if (!$statement->execute([':id_user' => $id_user])) {
            throw new Exception("Échec de la suppression du héros avec l'ID $id_user.");
        }
    }
}

?>