<?php

class utilisateurDB extends utilisateur{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function getUtilisateur($login){
        try {
            $query="select * from UTILISATEUR where login= :login";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login',$login,PDO::PARAM_STR);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new utilisateur($data);
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
            $resultset->bindValue(':login',$_SESSION['login'],PDO::PARAM_STR);
            $resultset->execute();
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
    public function getAllUSser()
    {
        try{
            $query="select * from UTILISATEUR;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new utilisateur($data);
            }
            return $_infoArray;
        } catch (Exception $ex) {

        }
    }
    
    public function AjaxUpdateUser($champ,$nouveau,$id){                
        try {
            $query="UPDATE UTILISATEUR set ".$champ." = '".$nouveau."' where ID_UTILISATEUR ='".$id."'";            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    
    public function suppUser($id)
    {
        try
        {
            $query="DELETE from UTILISATEUR where ID_UTILISATEUR = :id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$id,PDO::PARAM_INT);
            $resultset->execute();
        } 
        catch (Exception $ex) 
        {
            print $ex->getMessage();
        }
    }
    
    public function UpdateUser2($data){
        try {
            $query="update UTILISATEUR set NOM =:nom, PRENOM =:prenom, MDP =:mdp, NUMERO_COMPTE =:cpt, ADRESSE =:adr, LOGIN =:login where ID_UTILISATEUR = :id;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom',$data[0],PDO::PARAM_STR);
            $resultset->bindValue(':prenom',$data[1],PDO::PARAM_STR);
            $resultset->bindValue(':mdp',md5($data[2]),PDO::PARAM_STR);
            $resultset->bindValue(':cpt',$data[3],PDO::PARAM_STR);
            $resultset->bindValue(':adr',$data[4],PDO::PARAM_STR);
            $resultset->bindValue(':login',$data[5],PDO::PARAM_STR);
            $resultset->bindValue(':id',$data[6],PDO::PARAM_STR);
            $resultset->execute();
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
}
