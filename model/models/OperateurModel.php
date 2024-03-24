<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/Operateur.php';

    class OperateurModel extends Operateur{
        private $bdd;

        public function __construct($libelle, $actif = true){
            parent::__construct($libelle, $actif);
            $this->bdd = connexion();
        }
    

        public static function create($libelle, $actif = true) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO operateur (libelle, actif) VALUES (:libelle, :actif)");
                $query->bindParam(':libelle', $libelle);
                $query->bindParam(':actif', $actif, PDO::PARAM_BOOL);
                $query->execute();

                return new OperateurModel($libelle, $actif);
            } catch (PDOException $e) {
                echo "Error creating operator: " . $e->getMessage();
                return null;
            }
        }

        public static function get($libelle) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM operateur WHERE libelle = :libelle");
                $query->bindParam(':libelle', $libelle);
                $query->execute();

                $result = $query->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return new OperateurModel($result['libelle'], $result['actif']);
                }
                return null;
            } catch (PDOException $e) {
                echo "Error fetching operator: " . $e->getMessage();
                return null;
            }
        }

        public function update($new_libelle, $new_actif) {
            try {
                $query = $this->bdd->prepare("UPDATE operateur SET libelle = :new_libelle, actif = :new_actif WHERE libelle = :libelle");
                $query->bindParam(':new_libelle', $new_libelle);
                $query->bindParam(':new_actif', $new_actif, PDO::PARAM_BOOL);
                $query->bindParam(':libelle', $this->libelle);
                $query->execute();
                $this->libelle = $new_libelle;
                $this->actif = $new_actif;
                return true;
            } catch (PDOException $e) {
                echo "Error updating operator: " . $e->getMessage();
                return false;
            }
        }

        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM operateur WHERE libelle = :libelle");
                $query->bindParam(':libelle', $this->libelle);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error deleting operator: " . $e->getMessage();
                return false;
            }
        }

        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->query("SELECT * FROM operateur");
                $operators = [];

                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $operators[] = new OperateurModel($row['libelle'], $row['actif']);
                }

                return $operators;
            } catch (PDOException $e) {
                echo "Error fetching operators: " . $e->getMessage();
                return [];
            }
        }

        public static function getWhere($conditions, $logicalOperator = 'AND') {
            try {
                $bdd = connexion();

                $sql = "SELECT * FROM operateur WHERE ";
                $conditionsSql = [];

                foreach ($conditions as $key => $value) {
                    $conditionsSql[] = "$key = :$key";
                }

                $sql .= implode(" $logicalOperator ", $conditionsSql);

                $query = $bdd->prepare($sql);

                foreach ($conditions as $key => $value) {
                    $query->bindParam(":$key", $value);
                }

                $query->execute();

                $operators = [];

                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $operators[] = new OperateurModel($row['libelle'], $row['actif']);
                }

                return $operators;
            } catch (PDOException $e) {
                echo "Error fetching operators: " . $e->getMessage();
                return [];
            }
        }
    }