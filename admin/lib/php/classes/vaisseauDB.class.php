<?php

class vaisseauDB extends vaisseau{
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function getAllVaisseau(){
        try {
            $query="select * from VAISSEAU";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new vaisseau($data);
            }
            return $_infoArray;
            
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
    public function updateVaisseau($champ,$nouveau,$id){                
        try {
            $query="UPDATE VAISSEAU set ".$champ." = '".$nouveau."' where ID_VAISSEAU ='".$id."'";            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }
    
    public function getVaisseau($id){
        try {
            $query="select * from VAISSEAU where ID_VAISSEAU = :id;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$id,PDO::PARAM_INT);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new vaisseau($data);
            }
            return $_infoArray;
            
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }        
    }
    
    public function modifvaiss(array $data)
    {
        try
        {
            $query="UPDATE VAISSEAU SET DESCRIPTION = :desc, PRIX = :prix where ID_VAISSEAU = :id;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':desc',$data[0],PDO::PARAM_STR);
            $resultset->bindValue(':prix',$data[1],PDO::PARAM_INT);
            $resultset->bindValue(':id',$data[2],PDO::PARAM_INT);
            $resultset->execute();
        } 
        catch (Exception $ex) 
        {
           print "Erreur ".$ex->getMessage();
        }
    }
}
