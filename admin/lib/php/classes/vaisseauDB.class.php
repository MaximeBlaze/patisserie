<?php

class vaisseauDB {
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
    
}
