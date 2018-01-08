<?php

class commandeDB extends commande{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function SetCommande($total){
        try {
            $query="insert into COMMANDE (LOGIN, ID_PANIER, TOTAL, DATE, LIVRAISON) values (:login, :panier, $total,:date,:livr);";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login',$_SESSION['login'],PDO::PARAM_STR);
            $resultset->bindValue(':panier',$_SESSION['panier'],PDO::PARAM_INT);
            $resultset->bindValue(':date',date("d-m-Y"),PDO::PARAM_STR);
            $resultset->bindValue(':livr',"En cours",PDO::PARAM_STR);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new commande($data);
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
    
    public function getCommandes(){
        try {
            $query="select DATE, TOTAL, LIVRAISON from COMMANDE where ID_PANIER = :panier;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':panier',$_SESSION['panier'],PDO::PARAM_INT);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new commande($data);
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
    
    public function getAllCommandes(){
        try {
            $query="select ID_COMMANDE, TOTAL, DATE, LIVRAISON, LOGIN from COMMANDE";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new commande($data);
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
    
    public function updateCommande($champ,$nouveau,$id){                
        try {
            $query="UPDATE COMMANDE set ".$champ." = '".$nouveau."' where ID_COMMANDE ='".$id."'";            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();           
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    
    public function suppCommande($id)
    {
        try 
        {
            $query="DELETE from COMMANDE where ID_COMMANDE = :id";            
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$id,PDO::PARAM_INT);
            $resultset->execute();   
        } 
        catch (Exception $ex) 
        {
            print $ex->getMessage();
        }
    }
    
    public function getCom($id)
    {
        try 
        {
            $query="SELECT * from COMMANDE where ID_COMMANDE = :id;";            
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$id,PDO::PARAM_INT);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new commande($data);
            }
            if(empty($data))
            {
                $_infoArray[]=false;
            }
            return $_infoArray;
        } 
        catch (Exception $ex) 
        {
            print $ex->getMessage();
        }
    }
}
