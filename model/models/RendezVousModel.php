<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/RendezVous.php';

    require_once __DIR__.'/MedecinInfosModel.php';

    class RendezVousModel extends RendezVous{
        private $bdd;

        public function __construct($num_rv, $date, $heure_debut, $heure_fin, $medecin_id, $created_at, $nb_limite = null, $closed = false){
            parent::__construct($num_rv, $date, $heure_debut, $heure_fin, $medecin_id, $created_at, $nb_limite, $closed);
            $this->bdd = connexion();
        }


        public static function create($date, $heure_debut, $heure_fin, $medecin_id, $nb_limite = null) {
            try {
                $bdd = connexion();
                
                $query = $bdd->prepare("INSERT INTO rendezvous (date, heure_debut, heure_fin, medecin_id, nb_limite) VALUES (:date, :heure_debut, :heure_fin, :medecin_id, :nb_limite)");
                $query->bindParam(':date', $date);
                $query->bindParam(':heure_debut', $heure_debut);
                $query->bindParam(':heure_fin', $heure_fin);
                $query->bindParam(':medecin_id', $medecin_id);
                $query->bindParam(':nb_limite', $nb_limite);
                $query->execute();
                
                // Retourne le dernier ID inséré
                return self::get($bdd->lastInsertId());
                
            } catch (PDOException $e) {
                echo "Error creating RendezVous: " . $e->getMessage();
                return false;
            }
        }


        public static function getAll() {
            try {
                $bdd = connexion();
                
                $query = $bdd->query("SELECT * FROM rendezvous");
                $rendezVous = [];
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $rendezVous[] = new RendezVousModel(
                        $row['num_rv'],
                        $row['date'],
                        $row['heure_debut'],
                        $row['heure_fin'],
                        $row['medecin_id'],
                        $row['created_at'],
                        $row['nb_limite'],
                        $row['closed']
                    );
                }
                return $rendezVous;
            } catch (PDOException $e) {
                echo "Error fetching all RendezVous: " . $e->getMessage();
                return [];
            }
        }


        public static function get($num_rv) {
            try {
                $bdd = connexion();
                
                $query = $bdd->prepare("SELECT * FROM rendezvous WHERE num_rv = :num_rv");
                $query->bindParam(':num_rv', $num_rv);
                $query->execute();
                
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    return new RendezVousModel(
                        $row['num_rv'],
                        $row['date'],
                        $row['heure_debut'],
                        $row['heure_fin'],
                        $row['medecin_id'],
                        $row['created_at'],
                        $row['nb_limite'],
                        $row['closed']
                    );
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                echo "Error fetching RendezVous: " . $e->getMessage();
                return null;
            }
        }


        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM rendezvous WHERE num_rv = :num_rv");
                $query->bindParam(':num_rv', $this->num_rv);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error deleting RendezVous: " . $e->getMessage();
                return false;
            }
        }


        public static function getWhere($conditions, $logicalOperator = 'AND') {
            try {
                $bdd = connexion();
                
                $sql = "SELECT * FROM rendezvous";
                
                $conditionsSql = [];
                foreach ($conditions as $key => $value) {
                    $conditionsSql[] = "$key = :$key";
                }
                $sql .= " WHERE " . implode(" $logicalOperator ", $conditionsSql);
                
                $query = $bdd->prepare($sql);
                
                // Liaison des valeurs des conditions
                foreach ($conditions as $key => $value) {
                    $query->bindValue(":$key", $value);
                }
                
                $query->execute();
                
                $rendezVous = [];
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $rendezVous[] = new RendezVousModel(
                        $row['num_rv'],
                        $row['date'],
                        $row['heure_debut'],
                        $row['heure_fin'],
                        $row['medecin_id'],
                        $row['created_at'],
                        $row['nb_limite'],
                        $row['closed']
                    );
                }
                
                return $rendezVous;
            } catch (PDOException $e) {
                echo "Error fetching RendezVous: " . $e->getMessage();
                return [];
            }
        }

        public function update() {
            try {
                $query = $this->bdd->prepare("UPDATE rendezvous SET date = :date, heure_debut = :heure_debut, heure_fin = :heure_fin, medecin_id = :medecin_id, nb_limite = :nb_limite, closed = :closed WHERE num_rv = :num_rv");
                $query->bindParam(':date', $this->date);
                $query->bindParam(':heure_debut', $this->heure_debut);
                $query->bindParam(':heure_fin', $this->heure_fin);
                $query->bindParam(':medecin_id', $this->medecin_id);
                $query->bindParam(':nb_limite', $this->nb_limite);
                $query->bindParam(':closed', $this->closed);
                $query->bindParam(':num_rv', $this->num_rv);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error updating RendezVous: " . $e->getMessage();
                return false;
            }
        }


        public function getMedecinInfos(){
            try {
                $query = $this->bdd->prepare("SELECT * FROM medecininfos WHERE user_id = :medecin_id");
                $query->bindParam(':medecin_id', $this->medecin_id);
                $query->execute();
                
                $result = $query->fetch(PDO::FETCH_ASSOC);
                $user = new MedecinInfosModel($result['user_id'], 
                                $result['specialite_id'], 
                                $result['autre_specialite'],
                                $result['hopital_id'],
                                $result['autre_hopital'],
                                $result['lat_lieurv'],
                                $result['lon_lieurv'],
                                $result['ville_lieurv'],
                                $result['attestation'],
                                $result['carte_professionnelle'],
                                $result['confirmed'],
                                $result['declined'],
                                $result['bio'],
                                $result['tarif_enfant'],
                                $result['tarif_adulte']
                            );
                
                return $user; 
            } catch (PDOException $e) {
                echo "Error fetching medecinInfos: " . $e->getMessage();
                return null; 
            }
        }

    }