<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/AvisSignale.php';

    require_once __DIR__.'/UserModel.php';
    require_once __DIR__.'/AvisModel.php';

    class AvisSignaleModel extends AvisSignale{
        private $bdd;

        public function __construct($avis_user_id, $avis_num_rv, $user_signal_id, $date, $is_quarentaine, $is_ok, $admin_actor_id){
            parent::__construct($avis_user_id, $avis_num_rv, $user_signal_id, $date, $is_quarentaine, $is_ok, $admin_actor_id);
            $this->bdd = connexion();
        }


        public static function create($avis_user_id, $avis_num_rv, $user_signal_id,  $is_ok, $admin_actor_id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO avissignale (avis_user_id, avis_num_rv, user_signal_id, admin_actor_id) VALUES (:avis_user_id, :avis_num_rv, :user_signal_id, :admin_actor_id)");
                $query->bindParam(':avis_user_id', $avis_user_id);
                $query->bindParam(':avis_num_rv', $avis_num_rv);
                $query->bindParam(':user_signal_id', $user_signal_id);
                $query->bindParam(':admin_actor_id', $admin_actor_id);
                $query->execute();
                
                // Return the newly created AvisSignaleModel object
                return self::get($avis_user_id, $avis_num_rv);
            } catch (PDOException $e) {
                echo "Error creating AvisSignale: " . $e->getMessage();
                return null;
            }
        }


        public static function get($avis_user_id, $avis_num_rv) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM avissignale WHERE avis_user_id = :avis_user_id AND avis_num_rv = :avis_num_rv");
                $query->bindParam(':avis_user_id', $avis_user_id);
                $query->bindParam(':avis_num_rv', $avis_num_rv);
                $query->execute();
                
                $result = $query->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return new AvisSignaleModel($result['avis_user_id'], $result['avis_num_rv'], $result['user_signal_id'], $result['date'], $result['is_quarentaine'], $result['is_ok'], $result['admin_actor_id']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                echo "Error fetching AvisSignale: " . $e->getMessage();
                return null;
            }
        }

        public function update() {
            try {
                $query = $this->bdd->prepare("UPDATE avissignale SET is_quarentaine = :is_quarentaine, is_ok = :is_ok WHERE avis_user_id = :avis_user_id AND avis_num_rv = :avis_num_rv");
                $query->bindParam(':is_quarentaine', $this->is_quarentaine);
                $query->bindParam(':is_ok', $this->is_ok);
                $query->bindParam(':avis_user_id', $this->avis_user_id);
                $query->bindParam(':avis_num_rv', $this->avis_num_rv);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error updating AvisSignale: " . $e->getMessage();
                return false;
            }
        }

        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM avissignale WHERE avis_user_id = :avis_user_id AND avis_num_rv = :avis_num_rv");
                $query->bindParam(':avis_user_id', $this->avis_user_id);
                $query->bindParam(':avis_num_rv', $this->avis_num_rv);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error deleting AvisSignale: " . $e->getMessage();
                return false;
            }
        }


        public static function getWhere($conditions, $logicalOperator = 'AND') {
            try {
                $bdd = connexion();
                $sql = "SELECT * FROM avissignale WHERE ";
                $conditionsSql = [];
                foreach ($conditions as $key => $value) {
                    $conditionsSql[] = "$key = :$key";
                }
                $sql .= implode(" $logicalOperator ", $conditionsSql);
                $query = $bdd->prepare($sql);
                foreach ($conditions as $key => $value) {
                    $query->bindValue(":$key", $value);
                }
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $avisSignales = [];
                foreach ($result as $row) {
                    $avisSignales[] = new AvisSignaleModel($row['avis_user_id'], $row['avis_num_rv'], $row['user_signal_id'], $row['date'], $row['is_quarentaine'], $row['is_ok'], $row['admin_actor_id']);
                }
                return $avisSignales;
            } catch (PDOException $e) {
                echo "Error fetching AvisSignales: " . $e->getMessage();
                return [];
            }
        }


        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->query("SELECT * FROM avissignale");
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $avisSignales = [];
                foreach ($result as $row) {
                    $avisSignales[] = new AvisSignaleModel($row['avis_user_id'], $row['avis_num_rv'], $row['user_signal_id'], $row['date'], $row['is_quarentaine'], $row['is_ok'], $row['admin_actor_id']);
                }
                return $avisSignales;
            } catch (PDOException $e) {
                echo "Error fetching AvisSignales: " . $e->getMessage();
                return [];
            }
        }


        public function getUserSignal(){
            try {
                $query = $this->bdd->prepare("SELECT * FROM user WHERE id = :user_signal_id");
                $query->bindParam(':user_signal_id', $this->user_signal_id);
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


        public function getAvisUser(){
            try {
                $query = $this->bdd->prepare("SELECT * FROM user WHERE id = :avis_user_id");
                $query->bindParam(':avis_user_id', $this->avis_user_id);
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

        public function getAdminActor(){
            try {
                $query = $this->bdd->prepare("SELECT * FROM user WHERE id = :admin_actor_id");
                $query->bindParam(':admin_actor_id', $this->admin_actor_id);
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


        public function getRendezVous() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM rendezvous WHERE num_rv = :avis_num_rv");
                $query->bindParam(':avis_num_rv', $this->avis_num_rv);
                $query->execute();
    
                $result = $query->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return new RendezVousModel(
                        $result['num_rv'],
                        $result['date'],
                        $result['heure_debut'],
                        $result['heure_fin'],
                        $result['medecin_id'],
                        $result['created_at'],
                        $result['nb_limite'],
                        $result['closed']
                    );
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                echo "Error fetching RendezVous: " . $e->getMessage();
                return null;
            }
        }
    }