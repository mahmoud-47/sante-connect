<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/NotifType.php';

    class NotifTypeModel extends NotifType{
        private $bdd;

        public function __construct($libelle, $icone){
            parent::__construct($libelle, $icone);
            $this->bdd = connexion();
        }

        public static function create($libelle, $icone){
            $bdd = connexion();

            $query = $bdd->prepare("INSERT INTO notiftype (libelle, icone) VALUES (:libelle, :icone)");
            $query->bindParam(':libelle', $libelle);
            $query->bindParam(':icone', $icone);
            $query->execute();

            return self::get($libelle);
        }

        public static function get($libelle){
            $bdd = connexion();

            $query = $bdd->prepare("SELECT * FROM notiftype WHERE libelle = :libelle");
            $query->bindParam(':libelle', $libelle);
            $query->execute();

            if($query->rowCount()==0)
                return null;

            $result = $query->fetch(PDO::FETCH_ASSOC);
            return new NotifTypeModel($result['libelle'], $result['icone']);
        }

        public function delete(){
            try{
                $query = $this->bdd->prepare("DELETE FROM notiftype WHERE libelle = :libelle");
                $query->bindParam(':libelle', $this->libelle);
                $query->execute();

                if($query->rowCount()>0)
                    return true;
                return false;
            }catch (PDOException $e){
                echo "Error deleting NotifType: " . $e->getMessage();
                return false;
            }
            
        }
    }