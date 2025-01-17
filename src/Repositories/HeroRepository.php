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
            $query = "SELECT * FROM heros WHERE id = :id";
            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':id' => $id
            ]);
            $res = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo "Erreur lors de la requete : " . $error->getMessage();
        }

        if($res){
            return $this->mapper->hydrate($res[0]);
        }
        return null;
    }
}

?>