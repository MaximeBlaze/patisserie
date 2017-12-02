<?php

class liste_panierDB {
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function ajoutpanier($id_vaisseau){
        try {
            $query="insert into LISTE_VAISSEAUX (ID_PANIER,ID_VAISSEAU) values (:panier,$id_vaisseau)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':panier',$_SESSION['panier'],PDO::PARAM_INT);
            $resultset->execute();
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
    public function retirerpanier($id_vaisseau){
        try {
            $query="delete from LISTE_VAISSEAUX where ID_VAISSEAU = :id_vaisseau and ID_PANIER = :id_panier";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_vaisseau',$id_vaisseau,PDO::PARAM_INT);
            $resultset->bindValue(':id_panier',$_SESSION['panier'],PDO::PARAM_INT);
            $resultset->execute();
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
}
