<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/MedecinInfos.php';

    require_once __DIR__.'/UserModel.php';
    require_once __DIR__.'/SpecialiteModel.php';
    require_once __DIR__.'/HopitalModel.php';
    require_once __DIR__.'/AvisModel.php';
    require_once __DIR__.'/FavorisModel.php';

    class MedecinInfosModel extends MedecinInfos{
        private $bdd;

        public function __construct($user_id, $specialite_id, $autre_specialite, $hopital_id, $autre_hopital, $lat_lieurv, $lon_lieurv, $ville_lieurv, $attestation, $carte_professionnelle, $confirmed = false, $declined = false, $bio = null, $tarif_enfant = null, $tarif_adulte = null){
            parent::__construct($user_id, $specialite_id, $autre_specialite, $hopital_id, $autre_hopital, $lat_lieurv, $lon_lieurv, $ville_lieurv, $attestation, $carte_professionnelle, $confirmed, $declined, $bio, $tarif_enfant, $tarif_adulte);
            $this->bdd = connexion();
        }


        public static function create($user_id, $specialite_id, $autre_specialite, $hopital_id, $autre_hopital, $lat_lieurv, $lon_lieurv, $ville_lieurv, $attestation, $carte_professionnelle, $confirmed = false, $declined = false, $bio = null, $tarif_enfant = null, $tarif_adulte = null) {
            try {

                // $bdd = connexion();
                // $sql1 = "INSERT INTO MedecinInfos (user_id, autre_specialite, autre_hopital, lat_lieurv, lon_lieurv, ville_lieurv, attestation, carte_professionnelle, confirmed, declined, bio, tarif_enfant, tarif_adulte";
                // $sql2 = ") VALUES (:user_id, :autre_specialite, :autre_hopital, :lat_lieurv, :lon_lieurv, :ville_lieurv, :attestation, :carte_professionnelle, :confirmed, :declined, :bio, :tarif_enfant, :tarif_adulte";
                // if($hopital_id){
                //     $sql1 .= ",hopital_id";
                //     $sql2 .= ",:hopital_id";
                // }
                // if($specialite_id){
                //     $sql1 .= ",specialite_id";
                //     $sql2 .= ",:specialite_id";
                // }
                // $sql2 .= ')';
                // $sql = $sql1.$sql2;

                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO medecininfos (user_id, specialite_id, autre_specialite, hopital_id, autre_hopital, lat_lieurv, lon_lieurv, ville_lieurv, attestation, carte_professionnelle, confirmed, declined, bio, tarif_enfant, tarif_adulte) VALUES (:user_id, :specialite_id, :autre_specialite, :hopital_id, :autre_hopital, :lat_lieurv, :lon_lieurv, :ville_lieurv, :attestation, :carte_professionnelle, :confirmed, :declined, :bio, :tarif_enfant, :tarif_adulte)");
                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':specialite_id', $specialite_id);
                $query->bindParam(':autre_specialite', $autre_specialite);
                $query->bindParam(':hopital_id', $hopital_id);
                $query->bindParam(':autre_hopital', $autre_hopital);
                $query->bindParam(':lat_lieurv', $lat_lieurv);
                $query->bindParam(':lon_lieurv', $lon_lieurv);
                $query->bindParam(':ville_lieurv', $ville_lieurv);
                $query->bindParam(':attestation', $attestation);
                $query->bindParam(':carte_professionnelle', $carte_professionnelle);
                $query->bindParam(':confirmed', $confirmed);
                $query->bindParam(':declined', $declined);
                $query->bindParam(':bio', $bio);
                $query->bindParam(':tarif_enfant', $tarif_enfant);
                $query->bindParam(':tarif_adulte', $tarif_adulte);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error creating MedecinInfos: " . $e->getMessage();
                return false;
            }
        }


        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM medecininfos");
                $query->execute();
                $medecinInfosArray = [];
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $medecinInfos = new MedecinInfosModel(
                        $row['user_id'],
                        $row['specialite_id'],
                        $row['autre_specialite'],
                        $row['hopital_id'],
                        $row['autre_hopital'],
                        $row['lat_lieurv'],
                        $row['lon_lieurv'],
                        $row['ville_lieurv'],
                        $row['attestation'],
                        $row['carte_professionnelle'],
                        $row['confirmed'],
                        $row['declined'],
                        $row['bio'],
                        $row['tarif_enfant'],
                        $row['tarif_adulte']
                    );
                    $medecinInfosArray[] = $medecinInfos;
                }
                return $medecinInfosArray;
            } catch (PDOException $e) {
                echo "Error getting all MedecinInfos: " . $e->getMessage();
                return null;
            }
        }


        public static function get($user_id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM medecininfos WHERE user_id = :user_id");
                $query->bindParam(':user_id', $user_id);
                $query->execute();
                $row = $query->fetch(PDO::FETCH_ASSOC);
                if (!$row) {
                    return null;
                }
                $medecinInfos = new MedecinInfosModel(
                    $row['user_id'],
                    $row['specialite_id'],
                    $row['autre_specialite'],
                    $row['hopital_id'],
                    $row['autre_hopital'],
                    $row['lat_lieurv'],
                    $row['lon_lieurv'],
                    $row['ville_lieurv'],
                    $row['attestation'],
                    $row['carte_professionnelle'],
                    $row['confirmed'],
                    $row['declined'],
                    $row['bio'],
                    $row['tarif_enfant'],
                    $row['tarif_adulte']
                );
                return $medecinInfos;
            } catch (PDOException $e) {
                echo "Error getting medecininfos: " . $e->getMessage();
                return null;
            }
        }


        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM medecininfos WHERE user_id = :user_id");
                $query->bindParam(':user_id', $this->user_id);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error deleting medecininfos: " . $e->getMessage();
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


        public function getSpecialite() {
            try {
                $query = $this->bdd->prepare("SELECT * FROM specialite WHERE id = :specialite_id");
                $query->bindParam(':specialite_id', $this->specialite_id);
                $query->execute();
                
                $result = $query->fetch(PDO::FETCH_ASSOC);
                
                $specialite = new Specialite($result['id'], $result['nom'], $result['couleur'], $result['icone'], $result['description']);
                return $specialite;
            } catch (PDOException $e) {
                echo "Error fetching specialite: " . $e->getMessage();
                return null;
            }
        }


        public function getHopital() {
            try {
                $query = $this->bdd->prepare("SELECT * FROM hopital WHERE id = :hopital_id");
                $query->bindParam(':hopital_id', $this->hopital_id);
                $query->execute();
                
                $result = $query->fetch(PDO::FETCH_ASSOC);
                
                $hopital = new Hopital($result['id'], $result['nom'], $result['lien'], $result['lat'], $result['lon']);
                return $hopital;
            } catch (PDOException $e) {
                echo "Error fetching hopital: " . $e->getMessage();
                return null;
            }
        }
        
        
        public function update() {
            try {
                $query = $this->bdd->prepare("UPDATE medecininfos SET specialite_id = :specialite_id, autre_specialite = :autre_specialite, hopital_id = :hopital_id, autre_hopital = :autre_hopital, lat_lieurv = :lat_lieurv, lon_lieurv = :lon_lieurv, ville_lieurv = :ville_lieurv, attestation = :attestation, carte_professionnelle = :carte_professionnelle, confirmed = :confirmed, declined = :declined, bio = :bio, tarif_enfant = :tarif_enfant, tarif_adulte = :tarif_adulte WHERE user_id = :user_id");
                $query->bindParam(':user_id', $this->user_id);
                $query->bindParam(':specialite_id', $this->specialite_id);
                $query->bindParam(':autre_specialite', $this->autre_specialite);
                $query->bindParam(':hopital_id', $this->hopital_id);
                $query->bindParam(':autre_hopital', $this->autre_hopital);
                $query->bindParam(':lat_lieurv', $this->lat_lieurv);
                $query->bindParam(':lon_lieurv', $this->lon_lieurv);
                $query->bindParam(':ville_lieurv', $this->ville_lieurv);
                $query->bindParam(':attestation', $this->attestation);
                $query->bindParam(':carte_professionnelle', $this->carte_professionnelle);
                $query->bindParam(':confirmed', $this->confirmed);
                $query->bindParam(':declined', $this->declined);
                $query->bindParam(':bio', $this->bio);
                $query->bindParam(':tarif_enfant', $this->tarif_enfant);
                $query->bindParam(':tarif_adulte', $this->tarif_adulte);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error updating medecininfos: " . $e->getMessage();
                return false;
            }
        }

        public static function getWhere($conditions, $logicalOperator = 'AND') {
            try {
                $bdd = connexion();
                
                $sql = "SELECT * FROM medecininfos";
                
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
                
                $medecins = [];
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $medecin = new MedecinInfosModel(
                        $row['user_id'],
                        $row['specialite_id'],
                        $row['autre_specialite'],
                        $row['hopital_id'],
                        $row['autre_hopital'],
                        $row['lat_lieurv'],
                        $row['lon_lieurv'],
                        $row['ville_lieurv'],
                        $row['attestation'],
                        $row['carte_professionnelle'],
                        $row['confirmed'],
                        $row['declined'],
                        $row['bio'],
                        $row['tarif_enfant'],
                        $row['tarif_adulte']
                    );
                    $medecins[] = $medecin;
                }
                
                return $medecins;
            } catch (PDOException $e) {
                echo "Error fetching MedecinInfos: " . $e->getMessage();
                return [];
            }
        }
        
        public function getNote(){
            $notes = 0; $nb = 0;
            $avis = AvisModel::getAll();
            foreach ($avis as $row) {
                if($row->getRV()->getRendezVous()->getMedecinInfos()->user_id == $this->user_id){
                    $notes += $row->note;
                    $nb++;
                }
            }
            if($nb)
                return number_format($notes/$nb, 2);
            return 0;
        }
        
        public function isLikedBy($iduser){
            if(count(FavorisModel::getWhere(['user_id'=>$iduser, 'medecin_id'=>$this->user_id]))){
                return true;
            }
            return false;
        }

        public function nbLikes(){
            return count(FavorisModel::getWhere(['medecin_id'=>$this->user_id]));
        }

        public function nbPatients(){
            $priseRvs = PriseRVModel::getAll();
            $count = 0;
            foreach ($priseRvs as $row) {
                if($row->getRendezVous()->medecin_id == $this->user_id)
                    $count++;
            }
            return $count;
        }


        public function getAllAvis(){
            $avis = AvisModel::getAll();
            $tab = [];
            foreach ($avis as $row) {
                if($row->getRV()->getRendezVous()->medecin_id == $this->user_id)
                    $tab[] = $row;
            }
            return $tab;
        }
    }