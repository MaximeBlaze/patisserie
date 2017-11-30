<?php

class liste_panierDB {
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function ajoutpanier($id_vaisseau){
        try {
            $nbr=0;
            $query="insert into LISTE_VAISSEAUX (ID_PANIER,ID_VAISSEAU) values (:panier,$id_vaisseau)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':panier','1',PDO::PARAM_INT);
            $resultset->execute();
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
}
