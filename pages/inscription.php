<?php

if(isset($_GET['inscription']))
{
    if($_GET['nom']=="" || $_GET['prenom']=="" || $_GET['login']=="" || $_GET['mdp']=="" || $_GET['cpt']=="" || $_GET['adr']=="")
    {
	$erreur = "Veuillez remplir tous les champs";
    }
    else if ($_GET['nom']!="" && $_GET['prenom']!="" && $_GET['login']!="" && $_GET['mdp']!="" && $_GET['cpt']!="" && $_GET['adr']!="")
    {
        $info = new utilisateurDB($cnx);
        $info2 = new panierDB($cnx);
        $valeur[0]= $_GET['nom'];
        $valeur[1]= $_GET['prenom'];
        $valeur[2]= $_GET['login'];
        $valeur[3]= $_GET['mdp'];
        $valeur[4]= $_GET['cpt'];
        $valeur[5]= $_GET['adr'];
        $info->addClient($valeur);
        $info2->addPanier($valeur);?>
        <meta http-equiv = "refresh": content = "0;url=index.php?page=login.php">
    <?php }
}
?>
<br/>        
<section class="col-sm-12">
    <h1 style="color:white;">Inscription :</h1>
</section>
<section class="col-sm-12 bloc1">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" style="text-align: center;" id="inscri_form" >
            <br>
            <?php if(isset($erreur)) print "<span class='erreur'>/!\ $erreur /!\</span>"?>
            <br>
            <table cellpadding="30" id="tab_ins"  class="table-responsive">
                <tr>
                    <td style="border-left : 2px solid black; border-top: 2px solid black;"><label for="nom"><br/>Nom :<br/><br/></label></td>
                    <td style="border-right : 2px solid black; border-top: 2px solid black;"><input type="text" class="form-control" name="nom" placeholder="Nom" id="nom"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="prenom"><br/>Prénom :<br/><br/></label></td>
                    <td style="border-right : 2px solid black;"><input type="text" class="form-control" name="prenom" placeholder="Prenom" id="prenom"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="login"><br/>Login :<br/><br/></label></td>
                    <td style="border-right : 2px solid black;"><input type="text" class="form-control" name="login" placeholder="Login" id="login"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="mdp"><br/>MDP :<br/><br/></label></td>
                    <td style="border-right : 2px solid black;"><input type="password" class="form-control" name="mdp" placeholder="Mot de passe" id="mdp"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="mdp2"><br/>MDP :<br/><br/></label></td>
                    <td style="border-right : 2px solid black;"><input type="password" class="form-control" name="mdp2" placeholder="Confirmez" id="mdp2"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="numcompt"><br/>Numéro de compte :<br/><br/></label></td>
                    <td style="border-right : 2px solid black;"><input type="text" class="form-control" name="cpt" placeholder="BEXX-XXXX-XXXX-XXXX" id="cpt"></td>
                </tr>
                <tr>
                    <td style="border-left : 2px solid black;"><label for="adr"><br/>Adresse :<br/><br/></label></td>
                    <td style="border-right : 2px solid black;"><input type="text" class="form-control" name="adr" placeholder="Adresse" id="adr"></td>
                </tr>
                <tr>
                    <td colspan="2" style="border-left : 2px solid black; border-bottom : 2px solid black; border-right : 2px solid black;">
                        <br/><input class="btn btn-primary" type="submit" name="inscription" value="Valider"/><br/>
                    </td>
                </tr>
            </table>
        </form>
    <br/><br/>
</section>