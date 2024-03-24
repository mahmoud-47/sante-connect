<?php
require_once __DIR__.'/../dbconfig/connect.php';
require_once __DIR__.'/../classes/Hopital.php';
class HopitalModel extends Hopital{
    private $bdd;
    public function __construct($id, $nom, $lien, $lat, $lon){
        parent::__construct($id, $nom, $lien, $lat, $lon);
        $this->bdd = connexion();
    }
    public static function getAll(){
        try {
            $bdd = connexion();
            $query = $bdd->prepare("SELECT * FROM hopital ORDER BY nom");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $hopitaux = [];
            foreach ($result as $row) {
                $hopitaux[] = new HopitalModel($row['id'],$row['nom'],$row['lien'],$row['lat'],$row['lon']);
            }
            return $hopitaux;
        } catch (PDOException $e) {
            echo "Error fetching Hopital: " . $e->getMessage();
            return null;
        }
    }
    public static function get($id){
        try {
            $bdd = connexion();
            $query = $bdd->prepare("SELECT * FROM hopital WHERE id = :id");
            $query->bindParam(':id',$id);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if(!$result) return null;
            $hopital = new HopitalModel($result['id'],$result['nom'],$result['lien'],$result['lat'],$result['lon']);
            return $hopital;
        } catch (PDOException $e) {
            echo "Error fetching Hopital: " . $e->getMessage();
            return null;
        }
    }
    public static function create($nom, $lien, $lat, $lon){
        try {
            $bdd = connexion();
            $query = $bdd->prepare("INSERT INTO hopital(nom,lien,lat,long) VALUES (:nom,:lien,:lat,:lon)");
            $query->bindParam(':nom',$nom);
            $query->bindParam(':lien',$lien);
            $query->bindParam(':lat',$lat);
            $query->bindParam(':lon',$lon);
            $query->execute();
            return self::get($bdd->lastInsertId());
        } catch (PDOException $e) {
            echo "Error fetching Hopital: " . $e->getMessage();
            return null;
        }
    }
    public function delete() {
        try {
            $query = $this->bdd->prepare("DELETE FROM hopital WHERE id = :id");

            $query->bindParam(':id', $this->id);
            $query->execute();

            $rowCount = $query->rowCount();
            if ($rowCount > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error deleting hopital: " . $e->getMessage();
            return false;
        }
    }

    public static function getWhere($conditions) {
        try {
            $bdd = connexion();
            
            $sql = "SELECT * FROM hopital WHERE ";
            $conditionsSql = [];
            foreach ($conditions as $key => $value) {
                $conditionsSql[] = "$key = :$key";
            }
            $sql .= implode(" AND ", $conditionsSql);
            
            $query = $bdd->prepare($sql);
            
            foreach ($conditions as $key => $value) {
                $query->bindParam(":$key", $value);
            }
            
            $query->execute();
            
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            
            $hopitaux = [];
            foreach ($results as $result) {
                $hopital = new HopitalModel($result['id'],$result['nom'],$result['lien'],$result['lat'],$result['lon']);
                $hopitaux[] = $hopital;
            }
            
            return $hopitaux;
            
        } catch (PDOException $e) {
            echo "Error fetching hopitaux: " . $e->getMessage();
            return null;
        }
    }
}