<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../models/PriseRVModel.php';
    require_once __DIR__.'/../classes/User.php';

    class UserModel extends User{
        private $bdd;

        public function __construct($id, $token, $nom_complet, $email, $mot_de_passe, $code_verification, $accountType_libelle, $sexe, $date_de_naissance, $numero_tel, $photo = null, $verified_at = null, $bloque = false){
            parent::__construct($id, $token, $nom_complet, $email, $mot_de_passe, $code_verification, $accountType_libelle, $sexe, $date_de_naissance, $numero_tel, $photo, $verified_at, $bloque);
            $this->bdd = connexion();
        }


        public static function create($token, $email, $mot_de_passe, $code_verification, $accountType_libelle) {
            
            try {
                
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO user (token, email, mot_de_passe, code_verification, accountType_libelle) VALUES (:token, :email, :mot_de_passe, :code_verification, :accountType_libelle)");
                
                $query->bindParam(':token', $token);
                $query->bindParam(':email', $email);
                $query->bindParam(':mot_de_passe', $mot_de_passe);
                $query->bindParam(':code_verification', $code_verification);
                $query->bindParam(':accountType_libelle', $accountType_libelle);

                $query->execute();
        
                $lastInsertId = $bdd->lastInsertId();
        
                return self::get($lastInsertId);
            } catch (PDOException $e) {
                echo "Error creating user: " . $e->getMessage();
                return null;
            }
        }


        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->query("SELECT * FROM user");

                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                $users = [];
                foreach ($result as $row) {
                    $users[] = new UserModel($row['id'], 
                                        $row['token'], 
                                        $row['nom_complet'], 
                                        $row['email'], 
                                        $row['mot_de_passe'], 
                                        $row['code_verification'], 
                                        $row['accountType_libelle'], 
                                        $row['sexe'], 
                                        $row['date_de_naissance'], 
                                        $row['numero_tel'], 
                                        $row['photo'], 
                                        $row['verified_at'], 
                                        $row['bloque']
                                    );
                }
                return $users;
            } catch (PDOException $e) {
                echo "Error fetching users: " . $e->getMessage();
                return null;
            }
        }


        public static function get($id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM user WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->execute();

                $result = $query->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    return new UserModel($result['id'], 
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
                } else {
                    return null;
                }
            } catch (PDOException $e) {
                echo "Error fetching user: " . $e->getMessage();
                return null;
            }
        }


        public function delete() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("DELETE FROM user WHERE id = :id");
                $query->bindParam(':id', $this->id);
                $query->execute();

                $rowCount = $query->rowCount();

                if ($rowCount > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Error deleting user: " . $e->getMessage();
                return false;
            }
        }


        public function update() {
            try {
                $query = $this->bdd->prepare("UPDATE user SET nom_complet = :nom_complet, email = :email, mot_de_passe = :mot_de_passe, code_verification = :code_verification, accountType_libelle = :accountType_libelle, sexe = :sexe, date_de_naissance = :date_de_naissance, numero_tel = :numero_tel, photo = :photo, verified_at = :verified_at, bloque = :bloque WHERE id = :id");
                $query->bindParam(':id', $this->id);
                $query->bindParam(':nom_complet', $this->nom_complet);
                $query->bindParam(':email', $this->email);
                $query->bindParam(':mot_de_passe', $this->mot_de_passe);
                $query->bindParam(':code_verification', $this->code_verification);
                $query->bindParam(':accountType_libelle', $this->accountType_libelle);
                $query->bindParam(':sexe', $this->sexe);
                $query->bindParam(':date_de_naissance', $this->date_de_naissance);
                $query->bindParam(':numero_tel', $this->numero_tel);
                $query->bindParam(':photo', $this->photo);
                $query->bindParam(':verified_at', $this->verified_at);
                $query->bindParam(':bloque', $this->bloque);
                $query->execute();
                return true;
            } catch (PDOException $e) {
                echo "Error updating User: " . $e->getMessage();
                return false;
            }
        }
        


        public static function getWhere($conditions, $logicalOperator = 'AND') {
            try {
                $bdd = connexion();
                
                $sql = "SELECT * FROM user WHERE ";
                $conditionsSql = [];
                foreach ($conditions as $key => $value) {
                    $conditionsSql[] = "$key = :$key";
                }
                $sql .= implode(" $logicalOperator ", $conditionsSql);
                
                $query = $bdd->prepare($sql);
                
                foreach ($conditions as $key => $value) {
                    $query->bindParam(":$key", $value);
                }
                
                $query->execute();
                
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                $users = [];
                foreach ($results as $result) {
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
                    $users[] = $user;
                }
                
                return $users;
                
            } catch (PDOException $e) {
                echo "Error fetching users: " . $e->getMessage();
                return null;
            }
        }


        public function setPassword($newpwd) {
            try {
                $hashedPassword = password_hash($newpwd, PASSWORD_DEFAULT);
        
                $query = $this->bdd->prepare("UPDATE user SET mot_de_passe = :hashedPassword WHERE id = :user_id");
                $query->bindParam(':hashedPassword', $hashedPassword);
                $query->bindParam(':user_id', $this->id);
                $query->execute();
        
                if ($query->rowCount() > 0) {
                    return true; 
                } else {
                    return false; 
                }
            } catch (PDOException $e) {
                echo "Error setting password: " . $e->getMessage();
                return false;
            }
        }
        
        
        public function getNbRvs() {
            return count(PriseRVModel::getWhere(['user_id' => $this->id]));
        }
    }

