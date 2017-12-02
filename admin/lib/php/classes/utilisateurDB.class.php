<?php

class utilisateurDB extends utilisateur{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function getUtilisateur($login){
        try {
            $nbr=0;
            $query="select * from UTILISATEUR where login= :login";
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
    
    public function getUtilisateur2($id){
        try {
            $query="select * from UTILISATEUR where id_utilisateur= :id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$id,PDO::PARAM_INT);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new utilisateur($data);
            }
            return $_infoArray;
            
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
    public function addClient(array $data) {
        
        $query = "insert into UTILISATEUR (nom,prenom,login,mdp,numero_compte,groupe,adresse)"
                . " values (:nom,:prenom,:login,:mdp,:numero_compte,2,:adresse)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom',$data[0], PDO::PARAM_STR);
            $resultset->bindValue(':prenom',$data[1], PDO::PARAM_STR);
            $resultset->bindValue(':login',$data[2], PDO::PARAM_STR);
            $resultset->bindValue(':mdp',md5($data[3]), PDO::PARAM_STR);
            $resultset->bindValue(':numero_compte',$data[4], PDO::PARAM_INT);
            $resultset->bindValue(':adresse',$data[5], PDO::PARAM_STR);  
            $resultset->execute();
        }catch(PDOException $e){
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }        
    }
    
    public function UpdateUser($data){
        try {
            $query="update UTILISATEUR set NOM =:nom, PRENOM =:prenom, MDP =:mdp, NUMERO_COMPTE =:cpt, ADRESSE =:adr where LOGIN =:login;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom',$data[0],PDO::PARAM_STR);
            $resultset->bindValue(':prenom',$data[1],PDO::PARAM_STR);
            $resultset->bindValue(':mdp',md5($data[2]),PDO::PARAM_STR);
            $resultset->bindValue(':cpt',$data[3],PDO::PARAM_INT);
            $resultset->bindValue(':adr',$data[4],PDO::PARAM_STR);
            $resultset->bindValue(':login','admin',PDO::PARAM_STR);
            $resultset->execute();
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
}
