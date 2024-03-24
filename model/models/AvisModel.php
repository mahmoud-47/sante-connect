<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/Avis.php';

    require_once __DIR__.'/UserModel.php';
    require_once __DIR__.'/PriseRVModel.php';

    class AvisModel extends Avis{
        private $bdd;
        
        public function __construct($user_id, $num_rv, $note, $commentaire, $date) {
            parent::__construct($user_id, $num_rv, $note, $commentaire, $date);
            $this->bdd = connexion();
        }

        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM avis ORDER BY date DESC");
                $query->execute();
                
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $avis = [];
                foreach ($result as $row) {
                    $avis[] = new AvisModel($row['user_id'], $row['num_rv'], $row['note'], $row['commentaire'], $row['date']);
                }
            } catch (PDOException $e) {
                echo "Error fetching avis: " . $e->getMessage();
                return null;
            }
        
            return $avis;
        }


        public static function get($user_id, $num_rv) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM avis WHERE user_id = :user_id AND num_rv = :num_rv");
                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':num_rv', $num_rv);
                $query->execute();

                if($query->rowCount()==0)
                    return null;
        
                $result = $query->fetch(PDO::FETCH_ASSOC);
        
                $avis = new AvisModel($result['user_id'], $result['num_rv'], $result['note'], $result['commentaire'], $result['date']);
            } catch (PDOException $e) {
                echo "Error fetching avis: " . $e->getMessage();
                return null;
            }
        
            return $avis;
        }


        public static function create($user_id, $num_rv, $note, $commentaire, $date) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO avis (user_id, num_rv, note, commentaire, date) VALUES (:user_id, :num_rv, :note, :commentaire, :date)");

                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':num_rv', $num_rv);
                $query->bindParam(':note', $note);
                $query->bindParam(':commentaire', $commentaire);
                $query->bindParam(':date', $date);

                $query->execute();
                
                return self::get($user_id, $num_rv);
            } catch (PDOException $e) {
                echo "Error creating avis: " . $e->getMessage();
                return null;
            }
        }


        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM avis WHERE user_id = :user_id AND num_rv = :num_rv");

                $query->bindParam(':id', $this->user_id);
                $query->bindParam(':num_rv', $this->num_rv);
                $query->execute();
    
                $rowCount = $query->rowCount();
                if ($rowCount > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error deleting avis: " . $e->getMessage();
                return false;
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


        public function getRV() {
            try {
                $query = $this->bdd->prepare("SELECT * FROM priserv WHERE num_rv = :num_rv");
                $query->bindParam(':num_rv', $this->num_rv);
                $query->execute();

                if($query->rowCount()==0)
                    return null;

                    //$user_id, $num_rv, $categorie_age, $etat, $prix, $paied, $online_paied, $paiement_code, $nbPatients, $nom_complet_autre1, $categorie_age_autre1, $nom_complet_autre2, $categorie_age_autre2, $commentaire, $date
                $result = $query->fetch(PDO::FETCH_ASSOC);
                $rendezvous = new PriseRVModel(
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
                
                return $rendezvous; 
            } catch (PDOException $e) {
                echo "Error fetching rendezvous: " . $e->getMessage();
                return null; 
            }
        }

    }