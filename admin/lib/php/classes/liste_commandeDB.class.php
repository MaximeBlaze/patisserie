<?php

class liste_commandeDB extends liste_commande{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function setListe($id_commande,$id_vaisseau){
        try {
            $query="insert into LISTE_COMMANDE values(:commande, :vaiss);";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':commande',$id_commande,PDO::PARAM_INT);
            $resultset->bindValue(':vaiss',$id_vaisseau,PDO::PARAM_INT);
            $resultset->execute();
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
}
