<?php
    require "./admin/lib/PHP/verifier_connexion.php";

$info = new utilisateurDB($cnx);
$texte = $info->getUtilisateur($_SESSION['login']);
if(isset($_GET['modifier']))
{
    if ($_GET['nom']!="" && $_GET['prenom']!="" && $_GET['mdp']!="" && $_GET['cpt']!="" && $_GET['adr']!="" )
    {
        $data[0]=$_GET['nom'];
        $data[1]=$_GET['prenom'];
        $data[2]=$_GET['mdp'];
        $data[3]=$_GET['cpt'];
        $data[4]=$_GET['adr'];
        $texte2 = $info->UpdateUser($data);
    }
    else
    {
        $erreur = "Veuillez remplir tous les champs";
    }
}
?>

<section class="col-sm-12 bloc2" style="color : white;">
    <h2 style="margin-top: 1%; font-size : 300%;">Mon compte :</h2>
</section>
<section class="col-sm-12 bloc1" id="compte">
        <form style="margin-top :3%; margin-bottom:2%; text-align:center;" >
            <?php
            if (isset($erreur)) {
              print "<span class='erreur'>/!\ $erreur /!\</span>";
            }
            ?>
            <table style="margin:0 auto;" cellspacing="20" >
                <tr>
                    <td style="border-left : 2px solid black; border-top: 2px solid black;"><label for="nom"><br>Nom :<br><br></label></td>
                    <td style="border-right : 2px solid black; border-top: 2px solid black;"><input type="text" class="form-control" name="nom" value="<?php print $texte[0]->NOM;?>"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="prenom"><br>Prénom :<br><br></label></td>
                    <td style="border-right : 2px solid black;"><input type="text" class="form-control" name="prenom" value="<?php print $texte[0]->PRENOM;?>"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="login"><br>Login :<br><br></label></td>
                    <td style="border-right : 2px solid black;"><input disabled type="text" class="form-control" name="login" value="<?php print $texte[0]->LOGIN;?>"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="mdp"><br>MDP :<br><br></label></td>
                    <td style="border-right : 2px solid black;"><input type="password" class="form-control" name="mdp" value=""></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="numcompt"><br>Numéro de compte :<br><br></label></td>
                    <td style="border-right : 2px solid black;"><input type="text" class="form-control" name="cpt" value="<?php print $texte[0]->NUMERO_COMPTE;?>"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="adr"><br>Adresse :<br><br></label></td>
                    <td style="border-right : 2px solid black;"><input type="text" class="form-control" name="adr" value="<?php print $texte[0]->ADRESSE;?>"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border-right : 2px solid black; border-left : 2px solid black; border-bottom: 2px solid black;"> 
                        <input class="btn btn-primary" type="submit" name="modifier" value="Modifier"/>
                    </td>
                </tr>
            </table>
            <br/>
        </form>
</section>

