<?php
require_once __DIR__.'/../dbconfig/connect.php';
require_once __DIR__.'/../classes/Specialite.php';
class SpecialiteModel extends Specialite{
    private $bdd;
    public function __construct($id, $nom, $couleur, $icone, $description){
        parent::__construct($id, $nom, $couleur, $icone, $description);
        $this->bdd = connexion();
    }

    public static function create($nom, $couleur, $icone, $description) {
        try {
            $bdd = connexion();
            $query = $bdd->prepare("INSERT INTO specialite (nom, couleur, icone, description) VALUES (:nom, :couleur, :icone, :description)");
            $query->bindParam(':nom', $nom);
            $query->bindParam(':couleur', $couleur);
            $query->bindParam(':icone', $icone);
            $query->bindParam(':description', $description);
            $query->execute();

            $lastInsertId = $bdd->lastInsertId();
            return self::get($lastInsertId);
        } catch (PDOException $e) {
            echo "Error creating Specialite: " . $e->getMessage();
            return null;
        }
    }

    public static function get($id) {
        try {
            $bdd = connexion();
            $query = $bdd->prepare("SELECT * FROM specialite WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                return null;
            }

            return new SpecialiteModel($result['id'], $result['nom'], $result['couleur'], $result['icone'], $result['description']);
        } catch (PDOException $e) {
            echo "Error fetching Specialite: " . $e->getMessage();
            return null;
        }
    }

    public static function getAll() {
        try {
            $bdd = connexion();
            $query = $bdd->prepare("SELECT * FROM specialite");
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            $specialites = [];
            foreach ($results as $result) {
                $specialites[] = new SpecialiteModel($result['id'], $result['nom'], $result['couleur'], $result['icone'], $result['description']);
            }

            return $specialites;
        } catch (PDOException $e) {
            echo "Error fetching Specialites: " . $e->getMessage();
            return null;
        }
    }


    public static function getLike($pattern) {
        try {
            $bdd = connexion();
            $pattern = "%" . strtolower($pattern) . "%"; 
            $query = $bdd->prepare("SELECT * FROM specialite WHERE LOWER(nom) LIKE :pattern");
            $query->bindParam(':pattern', $pattern);
            $query->execute();
    
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
            $specialites = [];
            foreach ($results as $result) {
                $specialites[] = new SpecialiteModel($result['id'], $result['nom'], $result['couleur'], $result['icone'], $result['description']);
            }
    
            return $specialites;
        } catch (PDOException $e) {
            echo "Error fetching Specialites: " . $e->getMessage();
            return null;
        }
    }
    
    public function rgbaColor($opacity){
        $hex = str_replace('#', '', $this->couleur);
        if (strlen($hex) === 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }
        $rgb = sscanf($hex, "%02x%02x%02x");
        if ($rgb === false) {
            return false;
        }
        list($r, $g, $b) = $rgb;
        $rgba = 'rgba(' . implode(', ', [$r, $g, $b, $opacity]) . ')';
        return $rgba;
    } 

}