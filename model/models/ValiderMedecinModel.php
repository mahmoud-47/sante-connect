<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/ValiderMedecin.php';

    require_once __DIR__.'/UserModel.php';

    class ValiderMedecinModel extends ValiderMedecin{
        private $bdd;
        
        public function __construct($id, $admin_id, $user_id, $validate_at) {
            parent::__construct($id, $admin_id, $user_id, $validate_at);
            $this->bdd = connexion();
        }

        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM validermedecin ORDER BY validate_at DESC");
                $query->execute();
                
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $valider = [];
                foreach ($result as $row) {
                    $valider[] = new ValiderMedecinModel($row['id'], $row['admin_id'], $row['user_id'], $row['validate_at']);
                }
            } catch (PDOException $e) {
                echo "Error fetching validerMedecin: " . $e->getMessage();
                return null;
            }
        
            return $valider;
        }

        public static function get($id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM validermedecin WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->execute();

                if($query->rowCount()==0)
                    return null;
        
                $result = $query->fetch(PDO::FETCH_ASSOC);
        
                $valider = new ValiderMedecinModel($result['id'], $result['admin_id'], $result['user_id'], $result['validate_at']);
            } catch (PDOException $e) {
                echo "Error fetching valider: " . $e->getMessage();
                return null;
            }
        
            return $valider;
        }

        public static function getWhere($conditions) {
            try {
                $bdd = connexion();
                
                $sql = "SELECT * FROM validermedecin WHERE ";
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
                
                $validerMedecins = [];
                foreach ($results as $result) {
                    $validerMedecin = new ValiderMedecinModel($result['id'], $result['admin_id'], $result['user_id'], $result['validate_at']);
                    $validerMedecins[] = $validerMedecin;
                }
                
                return $validerMedecins;
                
            } catch (PDOException $e) {
                echo "Error fetching validermedecins: " . $e->getMessage();
                return null;
            }
        }
        

        public static function create($admin_id, $user_id, $validate_at) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO validermedecin (admin_id,user_id,validate_at) VALUES (:admin_id, :user_id, :validate_at)");

                $query->bindParam(':num_rv', $admin_id);
                $query->bindParam(':note', $user_id);
                $query->bindParam(':commentaire', $validate_at);

                $query->execute();
                
                return self::get($bdd->lastInsertId());
            } catch (PDOException $e) {
                echo "Error creating valider: " . $e->getMessage();
                return null;
            }
        }

        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM validermedecin WHERE id = :id");

                $query->bindParam(':id', $this->id);
                $query->execute();

    
                $rowCount = $query->rowCount();
                if ($rowCount > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error deleting valider: " . $e->getMessage();
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
        


        public function getAdminActor(){
            try {
                $query = $this->bdd->prepare("SELECT * FROM user WHERE id = :admin_id");
                $query->bindParam(':admin_id', $this->admin_id);
                $query->execute();

                if($query->rowCount()==0)
                    return null;

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
    }