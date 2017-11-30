<?php

class panierDB extends panier{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function getPanier($login){
        try {
            $nbr=0;
            $query="select v.IMAGE, v.DESCRIPTION, v.PRIX from VAISSEAU v, PANIER p, LISTE_VAISSEAUX l where p.LOGIN= :login and p.ID_PANIER=l.ID_PANIER and v.ID_VAISSEAU=l.ID_VAISSEAU;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login',$login,PDO::PARAM_STR);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new utilisateur($data);
                $nbr+1;
            }
            if($nbr==0)
            {
                $_infoArray[]=false;
            }
            return $_infoArray;
            
            
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
}