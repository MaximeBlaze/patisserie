<?php 
header('Content-type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/utilisateur.class.php';
require '../classes/utilisateurDB.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

try
{
    $update = new utilisateurDB($cnx);
    extract($_GET,EXTR_OVERWRITE);
    $param = 'id='.$id.'&champ='.$champ.'&nouveau='.$nouveau;
    $update->AjaxUpdateUser($champ, $nouveau, $id);
} 
catch (PDOException $ex) 
{
    print $e->getMessage();
}
?>
