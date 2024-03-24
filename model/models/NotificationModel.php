<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/Notification.php';

    require_once __DIR__.'/NotifTypeModel.php';
    require_once __DIR__.'/UserModel.php';
    require_once __DIR__.'/RendezVousModel.php';

    class NotificationModel extends Notification{
        private $bdd;

        public function __construct($id, $user_id, $notifType_libelle, $num_rv, $created_at){
            parent::__construct($id, $user_id, $notifType_libelle, $num_rv, $created_at);
            $this->bdd = connexion();
        }

        public static function create($user_id, $notifType_libelle, $num_rv){
            $bdd = connexion();
    
            $query = $bdd->prepare("INSERT INTO notification (user_id, notifType_libelle, num_rv) VALUES (:user_id, :notifType_libelle, :num_rv)");
            $query->bindParam(':user_id', $user_id);
            $query->bindParam(':notifType_libelle', $notifType_libelle);
            $query->bindParam(':num_rv', $num_rv);
            $query->execute();
    
            return new NotificationModel($bdd->lastInsertId(), $user_id, $notifType_libelle, $num_rv, date('Y-m-d H:i:s'));
        }
    
        public static function get($id){
            $bdd = connexion();
    
            $query = $bdd->prepare("SELECT * FROM notification WHERE id = :id");
            $query->bindParam(':id', $id);
            $query->execute();
    
            if($query->rowCount()==0)
                return null;
    
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return new NotificationModel($result['id'], $result['user_id'], $result['notifType_libelle'], $result['num_rv'], $result['created_at']);
        }
    
        public function update(){
            try {
                $query = $this->bdd->prepare("UPDATE notification SET user_id = :user_id, notifType_libelle = :notifType_libelle, num_rv = :num_rv WHERE id = :id");
                $query->bindParam(':user_id', $this->user_id);
                $query->bindParam(':notifType_libelle', $this->notifType_libelle);
                $query->bindParam(':num_rv', $this->num_rv);
                $query->bindParam(':id', $this->id);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error updating notification: " . $e->getMessage();
                return false;
            }
        }
    
        public function delete(){
            try {
                $query = $this->bdd->prepare("DELETE FROM notification WHERE id = :id");
                $query->bindParam(':id', $this->id);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error deleting notification: " . $e->getMessage();
                return false;
            }
        }
    
        public static function getWhere($conditions, $logicalOperator = 'AND'){
            try {
                $bdd = connexion();
                $sql = "SELECT * FROM notification WHERE ";
                $conditionsSql = [];
                foreach ($conditions as $key => $value) {
                    $conditionsSql[] = "$key = :$key";
                }
                $sql .= implode(" $logicalOperator ", $conditionsSql);
                $query = $bdd->prepare($sql);
                $query->execute($conditions);
                $notifications = [];
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $notifications[] = new NotificationModel($row['id'], $row['user_id'], $row['notifType_libelle'], $row['num_rv'], $row['created_at']);
                }
                return $notifications;
            } catch (PDOException $e) {
                echo "Error fetching notifications: " . $e->getMessage();
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
    
        public function getNotifType() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM notiftype WHERE libelle = :libelle");
                $query->bindParam(':libelle', $this->notifType_libelle);
                $query->execute();
    
                $result = $query->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return new NotifTypeModel($result['libelle'], $result['icone']);
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                echo "Error fetching NotifType: " . $e->getMessage();
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

    