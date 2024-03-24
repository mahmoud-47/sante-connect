<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/DemandePaiement.php';

    require_once __DIR__.'/OperateurModel.php';
    require_once __DIR__.'/UserModel.php';

    class DemandePaiementModel extends DemandePaiement{
        private $bdd;

        public function __construct($id, $user_id, $montant, $numTel, $operateur_libelle, $etat, $admin_actor_id, $paiement_code, $date = null, $dossier_ouvert = false){
            parent::__construct($id, $user_id, $montant, $numTel, $operateur_libelle, $etat, $admin_actor_id, $paiement_code, $date, $dossier_ouvert);
            $bdd = connexion();
        }
    

        public static function create($user_id, $montant, $numTel, $operateur_libelle, $etat, $admin_actor_id, $paiement_code) {
            try {
                $bdd = connexion();

                $query = $bdd->prepare("INSERT INTO demandepaiement (user_id, montant, numTel, operateur_libelle, etat, admin_actor_id, paiement_code) VALUES (:user_id, :montant, :numTel, :operateur_libelle, :etat, :admin_actor_id, :paiement_code)");
                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':montant', $montant);
                $query->bindParam(':numTel', $numTel);
                $query->bindParam(':operateur_libelle', $operateur_libelle);
                $query->bindParam(':etat', $etat);
                $query->bindParam(':admin_actor_id', $admin_actor_id);
                $query->bindParam(':paiement_code', $paiement_code);
                $query->execute();

                return self::get($bdd->lastInsertId());
            } catch (PDOException $e) {
                echo "Error creating payment request: " . $e->getMessage();
                return null;
            }
        }


        public static function get($id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM demandepaiement WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->execute();
        
                if($query->rowCount() == 0)
                    return null;
        
                $result = $query->fetch(PDO::FETCH_ASSOC);
        
                $demandePaiement = new DemandePaiementModel(
                    $result['id'],
                    $result['user_id'],
                    $result['montant'],
                    $result['numTel'],
                    $result['operateur_libelle'],
                    $result['etat'],
                    $result['admin_actor_id'],
                    $result['paiement_code'],
                    $result['date'],
                    $result['dossier_ouvert']
                );
            } catch (PDOException $e) {
                echo "Error fetching demande de paiement: " . $e->getMessage();
                return null;
            }
        
            return $demandePaiement;
        }
        

        public function update() {
            try {
                $query = $this->bdd->prepare("UPDATE demandepaiement SET user_id = :user_id, montant = :montant, numTel = :numTel, operateur_libelle = :operateur_libelle, etat = :etat, admin_actor_id = :admin_actor_id, paiement_code = :paiement_code WHERE id = :id");
                $query->bindParam(':user_id', $this->user_id);
                $query->bindParam(':montant', $this->montant);
                $query->bindParam(':numTel', $this->numTel);
                $query->bindParam(':operateur_libelle', $this->operateur_libelle);
                $query->bindParam(':etat', $this->etat);
                $query->bindParam(':admin_actor_id', $this->admin_actor_id);
                $query->bindParam(':paiement_code', $this->paiement_code);
                $query->bindParam(':id', $this->id);
                $query->execute();

                return true;
            } catch (PDOException $e) {
                echo "Error updating payment request: " . $e->getMessage();
                return false;
            }
        }

        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM demandepaiement WHERE id = :id");
                $query->bindParam(':id', $this->id);
                $query->execute();

                return true;
            } catch (PDOException $e) {
                echo "Error deleting payment request: " . $e->getMessage();
                return false;
            }
        }

        public static function getWhere($conditions, $logicalOperator = 'AND') {
            try {
                $bdd = connexion();

                $conditionsSql = [];
                foreach ($conditions as $key => $value) {
                    $conditionsSql[] = "$key = :$key";
                }
                $sql = "SELECT * FROM demandepaiement WHERE " . implode(" $logicalOperator ", $conditionsSql);

                $query = $bdd->prepare($sql);
                $query->execute($conditions);

                $requests = [];
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $requests[] = new DemandePaiementModel(
                        $row['id'],
                        $row['user_id'],
                        $row['montant'],
                        $row['numTel'],
                        $row['operateur_libelle'],
                        $row['etat'],
                        $row['admin_actor_id'],
                        $row['paiement_code'],
                        $row['date'],
                        $row['dossier_ouvert']
                    );
                }

                return $requests;
            } catch (PDOException $e) {
                echo "Error fetching payment requests: " . $e->getMessage();
                return [];
            }
        }

        public static function getAll() {
            try {
                $bdd = connexion();

                $query = $bdd->query("SELECT * FROM demandepaiement");
                $requests = [];

                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $requests[] = new DemandePaiementModel(
                        $row['id'],
                        $row['user_id'],
                        $row['montant'],
                        $row['numTel'],
                        $row['operateur_libelle'],
                        $row['etat'],
                        $row['admin_actor_id'],
                        $row['paiement_code'],
                        $row['date'],
                        $row['dossier_ouvert']
                    );
                }

                return $requests;
            } catch (PDOException $e) {
                echo "Error fetching payment requests: " . $e->getMessage();
                return [];
            }
        }

        public function getUser(){
            try {
                $query = $this->bdd->prepare("SELECT * FROM user WHERE id = :user_id");
                $query->bindParam(':user_id', $this->user_id);
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

        public function getOperator() {
            try {

                $query = $this->bdd->prepare("SELECT * FROM operateur WHERE libelle = :libelle");
                $query->bindParam(':libelle', $this->operateur_libelle);
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
    }