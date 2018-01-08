<?php 
header('Content-type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/vaisseau.class.php';
require '../classes/vaisseauDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

try
{
    $update = new vaisseauDB($cnx);
    extract($_GET,EXTR_OVERWRITE);
    $param = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateVaisseau($champ, $nouveau, $id);
} 
catch (PDOException $ex) 
{
    print $e->getMessage();
}
?>