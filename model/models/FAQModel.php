<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/FAQ.php';

    require_once __DIR__.'/UserModel.php';

    class FAQModel extends FAQ{
        private $bdd;

        public function __construct($id, $concernes, $question, $reponse, $admin_id){
            parent::__construct($id, $concernes, $question, $reponse, $admin_id);
            $this->bdd = connexion();
        }

        public static function create($concernes, $question, $reponse, $admin_id) {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("INSERT INTO faq (concernes, question, reponse, admin_id) VALUES (:concernes, :question, :reponse, :admin_id)");
                $query->bindParam(':concernes', $concernes);
                $query->bindParam(':question', $question);
                $query->bindParam(':reponse', $reponse);
                $query->bindParam(':admin_id', $admin_id);
                $query->execute();
    
                $lastInsertId = $bdd->lastInsertId();
                return new FAQModel($lastInsertId, $concernes, $question, $reponse, $admin_id);
            } catch (PDOException $e) {
                echo "Error creating FAQ: " . $e->getMessage();
                return null;
            }
        }
    
    
        public function delete() {
            try {
                $query = $this->bdd->prepare("DELETE FROM faq WHERE id = :id");
                $query->bindParam(':id', $this->id);
                $query->execute();
    
                if ($query->rowCount() > 0) {
                    return true;
                }
                return false;
            } catch (PDOException $e) {
                echo "Error deleting FAQ: " . $e->getMessage();
                return false;
            }
        }
    
        public static function getAll() {
            try {
                $bdd = connexion();
                $query = $bdd->prepare("SELECT * FROM faq ORDER BY id DESC");
                $query->execute();
                $faqs = [];
    
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    $faq = new FAQModel(
                        $row['id'],
                        $row['concernes'],
                        $row['question'],
                        $row['reponse'],
                        $row['admin_id']
                    );
                    $faqs[] = $faq;
                }
    
                return $faqs;
            } catch (PDOException $e) {
                echo "Error fetching FAQs: " . $e->getMessage();
                return [];
            }
        }
    }
