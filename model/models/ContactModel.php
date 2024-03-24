<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/Contact.php';

    require_once __DIR__.'/UserModel.php';

    class ContactModel extends Contact{
        private $bdd;

        public function __construct($id, $user_id, $sujet, $message){
            parent::__construct($id, $user_id, $sujet, $message);
            $bdd = connexion();
        }
    

        public static function create($user_id, $sujet, $message) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO contact (user_id, sujet, message) VALUES (:user_id, :sujet, :message)");
                $query->bindParam(':user_id', $user_id);
                $query->bindParam(':sujet', $sujet);
                $query->bindParam(':message', $message);
                $query->execute();

                $id = $bdd->lastInsertId();
                return self::get($id);
            } catch (PDOException $e) {
                echo "Error creating contact: " . $e->getMessage();
                return null;
            }
        }

        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM contact WHERE id = :id");
                $query->bindParam(':id', $this->id);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error deleting contact: " . $e->getMessage();
                return false;
            }
        }

        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->query("SELECT * FROM contact");
                $results = $query->fetchAll(PDO::FETCH_ASSOC);

                $contacts = [];
                foreach ($results as $result) {
                    $contacts[] = new ContactModel($result['id'], $result['user_id'], $result['sujet'], $result['message']);
                }
                return $contacts;
            } catch (PDOException $e) {
                echo "Error fetching contacts: " . $e->getMessage();
                return [];
            }
        }

        public static function get($id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM contact WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->execute();
        
                $result = $query->fetch(PDO::FETCH_ASSOC);
                if (!$result) {
                    return null; 
                }
        
                return new ContactModel($result['id'], $result['user_id'], $result['sujet'], $result['message']);
            } catch (PDOException $e) {
                echo "Error fetching contact: " . $e->getMessage();
                return null;
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
    }
    