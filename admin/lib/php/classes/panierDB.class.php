<?php

class panierDB extends panier{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function getPanier(){
        try {
            $query="select v.IMAGE, v.DESCRIPTION, v.PRIX, v.ID_VAISSEAU from VAISSEAU v, LISTE_VAISSEAUX l where l.ID_PANIER= :panier and v.ID_VAISSEAU=l.ID_VAISSEAU;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':panier',$_SESSION['panier'],PDO::PARAM_STR);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new panier($data);
            }
            if(empty($data))
            {
                $_infoArray[]=false;
            }
            return $_infoArray;
            
            
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
    public function addPanier(array $data) {
        
        $query = "insert into PANIER (LOGIN) values (:login)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login',$data[2], PDO::PARAM_STR); 
            $resultset->execute();
        }catch(PDOException $e){
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }        
    }
    
    public function getIDPanier($login){
        try {
            $query="select ID_PANIER from PANIER where LOGIN= :login;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login',$_SESSION['login'],PDO::PARAM_STR);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new panier($data);
            }
            if(empty($data))
            {
                $_infoArray[]=false;
            }
            return $_infoArray;
            
            
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
    public function VidePanier($id_commande) {
        
        $query = "";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':panier',$_SESSION['panier'], PDO::PARAM_INT); 
            $resultset->bindValue(':com',$id_commande, PDO::PARAM_INT);
            $resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }        
    }
}