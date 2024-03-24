<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/PriseRV.php';

    require_once __DIR__.'/RendezVousModel.php';
    require_once __DIR__.'/UserModel.php';

    class PriseRVModel extends PriseRV{
        private $bdd;

        public function __construct($user_id, $num_rv, $categorie_age, $etat, $prix, $paied, $online_paied, $paiement_code, $nbPatients, $nom_complet_autre1 = null, $categorie_age_autre1 = null, $nom_complet_autre2 = null, $categorie_age_autre2 = null, $commentaire = null, $date = null){
            parent::__construct($user_id, $num_rv, $categorie_age, $etat, $prix, $paied, $online_paied, $paiement_code, $nbPatients, $nom_complet_autre1, $categorie_age_autre1, $nom_complet_autre2, $categorie_age_autre2, $commentaire, $date);
            $this->bdd = connexion();
        }

        public static function create($user_id, $num_rv, $categorie_age, $etat, $prix, $paied, $online_paied, $paiement_code, $nbPatients, $nom_complet_autre1 = null, $categorie_age_autre1 = null, $nom_complet_autre2 = null, $categorie_age_autre2 = null, $commentaire = null, $date = null) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO priserv (user_id, num_rv, categorie_age, etat, prix, paied, online_paied, paiement_code, nbPatients, nom_complet_autre1, categorie_age_autre1, nom_complet_autre2, categorie_age_autre2, commentaire, date) VALUES (:user_id, :num_rv, :categorie_age, :etat, :prix, :paied, :online_paied, :paiement_code, :nbPatients, :nom_complet_autre1, :categorie_age_autre1, :nom_complet_autre2, :categorie_age_autre2, :commentaire, :date)");
                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':num_rv', $num_rv);
                $query->bindParam(':categorie_age', $categorie_age);
                $query->bindParam(':etat', $etat);
                $query->bindParam(':prix', $prix);
                $query->bindParam(':paied', $paied);
                $query->bindParam(':online_paied', $online_paied);
                $query->bindParam(':paiement_code', $paiement_code);
                $query->bindParam(':nbPatients', $nbPatients);
                $query->bindParam(':nom_complet_autre1', $nom_complet_autre1);
                $query->bindParam(':categorie_age_autre1', $categorie_age_autre1);
                $query->bindParam(':nom_complet_autre2', $nom_complet_autre2);
                $query->bindParam(':categorie_age_autre2', $categorie_age_autre2);
                $query->bindParam(':commentaire', $commentaire);
                $query->bindParam(':date', $date);
                $query->execute();
                
                return self::get($user_id, $num_rv);
            } catch (PDOException $e) {
                echo "Error creating PriseRV: " . $e->getMessage();
                return null;
            }
        }
    

        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM priserv ORDER BY date DESC"); // Assurez-vous de changer le nom de la table si nécessaire
                $query->execute();
                
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $prisesRV = [];
                foreach ($result as $row) {
                    $prisesRV[] = new PriseRVModel(
                        $row['user_id'],
                        $row['num_rv'],
                        $row['categorie_age'],
                        $row['etat'],
                        $row['prix'],
                        $row['paied'],
                        $row['online_paied'],
                        $row['paiement_code'],
                        $row['nbPatients'],
                        $row['nom_complet_autre1'],
                        $row['categorie_age_autre1'],
                        $row['nom_complet_autre2'],
                        $row['categorie_age_autre2'],
                        $row['commentaire'],
                        $row['date']
                    );
                }
                
                return $prisesRV;
            } catch (PDOException $e) {
                echo "Error fetching PriseRV: " . $e->getMessage();
                return null;
            }
        }
        
    
        public static function get($user_id, $num_rv) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM priserv WHERE user_id = :user_id AND num_rv = :num_rv");
                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':num_rv', $num_rv);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                if (!$result) return null;
                return new PriseRVModel(
                    $result['user_id'],
                    $result['num_rv'],
                    $result['categorie_age'],
                    $result['etat'],
                    $result['prix'],
                    $result['paied'],
                    $result['online_paied'],
                    $result['paiement_code'],
                    $result['nbPatients'],
                    $result['nom_complet_autre1'],
                    $result['categorie_age_autre1'],
                    $result['nom_complet_autre2'],
                    $result['categorie_age_autre2'],
                    $result['commentaire'],
                    $result['date']
                );
            } catch (PDOException $e) {
                echo "Error fetching PriseRV: " . $e->getMessage();
                return null;
            }
        }
    
    
        public function update() {
            try {
                $query = $this->bdd->prepare("UPDATE priserv SET categorie_age = :categorie_age, etat = :etat, prix = :prix, paied = :paied, online_paied = :online_paied, paiement_code = :paiement_code, nbPatients = :nbPatients, nom_complet_autre1 = :nom_complet_autre1, categorie_age_autre1 = :categorie_age_autre1, nom_complet_autre2 = :nom_complet_autre2, categorie_age_autre2 = :categorie_age_autre2, commentaire = :commentaire, date = :date WHERE user_id = :user_id AND num_rv = :num_rv");
                $query->bindParam(':categorie_age', $this->categorie_age);
                $query->bindParam(':etat', $this->etat);
                $query->bindParam(':prix', $this->prix);
                $query->bindParam(':paied', $this->paied);
                $query->bindParam(':online_paied', $this->online_paied);
                $query->bindParam(':paiement_code', $this->paiement_code);
                $query->bindParam(':nbPatients', $this->nbPatients);
                $query->bindParam(':nom_complet_autre1', $this->nom_complet_autre1);
                $query->bindParam(':categorie_age_autre1', $this->categorie_age_autre1);
                $query->bindParam(':nom_complet_autre2', $this->nom_complet_autre2);
                $query->bindParam(':categorie_age_autre2', $this->categorie_age_autre2);
                $query->bindParam(':commentaire', $this->commentaire);
                $query->bindParam(':date', $this->date);
                $query->bindParam(':user_id', $this->user_id);
                $query->bindParam(':num_rv', $this->num_rv);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error updating PriseRV: " . $e->getMessage();
                return false;
            }
        }
    
    
        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM priserv WHERE user_id = :user_id AND num_rv = :num_rv");
                $query->bindParam(':user_id', $this->user_id);
                $query->bindParam(':num_rv', $this->num_rv);
                $query->execute();
                return true; 
            } catch (PDOException $e) {
                echo "Error deleting PriseRV: " . $e->getMessage();
                return false; 
            }
        }
    
    
        public static function getWhere($conditions, $logicalOperator = 'AND') {
            try {
                $bdd = connexion();
                $sql = "SELECT * FROM priserv WHERE ";
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
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                $priseRVs = [];
                foreach ($results as $result) {
                    $priseRVs[] = new PriseRVModel(
                        $result['user_id'],
                        $result['num_rv'],
                        $result['categorie_age'],
                        $result['etat'],
                        $result['prix'],
                        $result['paied'],
                        $result['online_paied'],
                        $result['paiement_code'],
                        $result['nbPatients'],
                        $result['nom_complet_autre1'],
                        $result['categorie_age_autre1'],
                        $result['nom_complet_autre2'],
                        $result['categorie_age_autre2'],
                        $result['commentaire'],
                        $result['date']
                    );
                }
                return $priseRVs;
            } catch (PDOException $e) {
                echo "Error fetching PriseRVs: " . $e->getMessage();
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
    
    
        public function getRendezVous() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM rendezvous WHERE num_rv = :num_rv");
                $query->bindParam(':num_rv', $this->num_rv);
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


    