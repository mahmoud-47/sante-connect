<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/Favoris.php';

    require_once __DIR__.'/UserModel.php';
    require_once __DIR__.'/MedecinInfosModel.php';

    class FavorisModel extends Favoris{
        private $bdd;

        public function __construct($user_id, $medecin_id, $created_at) {
            parent::__construct($user_id, $medecin_id, $created_at);
            $this->bdd = connexion();
        }

        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM favoris ORDER BY created_at DESC");
                $query->execute();
                
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $favoris = [];
                foreach ($result as $row) {
                    $favoris[] = new FavorisModel($row['user_id'], $row['medecin_id'], $row['created_at']);
                }
            } catch (PDOException $e) {
                echo "Error fetching favoris: " . $e->getMessage();
                return null;
            }
        
            return $favoris;
        }

        public static function get($user_id,$medecin_id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM favoris WHERE user_id = :user_id AND medecin_id = :medecin_id");
                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':medecin_id', $medecin_id);
                $query->execute();

                if($query->rowCount()==0)
                    return null;
        
                $result = $query->fetch(PDO::FETCH_ASSOC);
        
                $favoris = new FavorisModel($result['user_id'], $result['medecin_id'], $result['created_at']);
            } catch (PDOException $e) {
                echo "Error fetching favoris: " . $e->getMessage();
                return null;
            }
        
            return $favoris;
        }

        public static function getWhere($conditions) {
            try {
                $bdd = connexion();
                
                $sql = "SELECT * FROM favoris WHERE ";
                $conditionsSql = [];
                foreach ($conditions as $key => $value) {
                    $conditionsSql[] = "$key = :$key";
                }
                $sql .= implode(" AND ", $conditionsSql);
                
                $query = $bdd->prepare($sql);
                
                foreach ($conditions as $key => $value) {
                    $query->bindValue(":$key", $value);
                }
                
                $query->execute();
                
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $favs = [];
                foreach ($results as $result) {
                    $fav = new FavorisModel($result['user_id'], $result['medecin_id'], $result['created_at']);
                    $favs[] = $fav;
                }
                
                return $favs;
                
            } catch (PDOException $e) {
                echo "Error fetching users: " . $e->getMessage();
                return null;
            }
        }

        public static function create($user_id, $medecin_id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO favoris (user_id, medecin_id) VALUES (:user_id, :medecin_id)");

                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':medecin_id', $medecin_id);

                $query->execute();
                
                return self::get($user_id, $medecin_id);
            } catch (PDOException $e) {
                echo "Error creating favoris: " . $e->getMessage();
                return null;
            }
        }

        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM favoris WHERE user_id = :user_id AND medecin_id = :medecin_id");

                $query->bindParam(':user_id', $this->user_id);
                $query->bindParam(':medecin_id', $this->medecin_id);
                $query->execute();

    
                $rowCount = $query->rowCount();
                if ($rowCount > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error deleting favoris: " . $e->getMessage();
                return false;
            }
        }

        public function getUser(){
            try {
                $query = $this->bdd->prepare("SELECT * FROM user WHERE id = :user_id");
                $query->bindParam(':user_id', $this->user_id);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                $user = new UserModel($result['id'], 
                                $result['token'], 
                                $result['nom_complet'],
                                $result['email'],
                                $result['mot_de_passe'],
                                $result['code_verification'],
                                $result['accountType_libelle'],
                                $result['sexe'],
                                $result['date_de_naissance'],
                                $result['numero_tel'],
                                $result['photo'],
                                $result['verified_at'],
                                $result['bloque']
                            );
                
                return $user; 
            } catch (PDOException $e) {
                echo "Error fetching user: " . $e->getMessage();
                return null; 
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