<?php 
header('Content-type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/commande.class.php';
require '../classes/commandeDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

try
{
    $update = new commandeDB($cnx);
    extract($_GET,EXTR_OVERWRITE);
    $param = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->updateCommande($champ, $nouveau, $id);
} 
catch (PDOException $ex) 
{
    print $e->getMessage();
}
?>
