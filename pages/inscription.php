<?php

if(isset($_GET['inscription']))
{
    if($_GET['nom']=="")
    {
	$erreur_nom="Nom manquant";
    }
    if($_GET['prenom']=="")
    {
	$erreur_prenom="Prenom manquant";
    }
    if($_GET['login']=="")
    {
	$erreur_login="Login manquant";
    }
    if($_GET['mdp']=="")
    {
	$erreur_mdp="Mot de passe manquant";
    }
    if($_GET['cpt']=="")
    {
	$erreur_cpt="Compte manquant";
    }
    if($_GET['adr']=="")
    {
	$erreur_adr="Adresse manquante";
    }
    else if ($_GET['nom']!="" && $_GET['prenom']!="" && $_GET['login']!="" && $_GET['mdp']!="" && $_GET['cpt']!="" && $_GET['adr']!="")
    {
        $info = new utilisateurDB($cnx);
        $valeur[0]= $_GET['nom'];
        $valeur[1]= $_GET['prenom'];
        $valeur[2]= $_GET['login'];
        $valeur[3]= $_GET['mdp'];
        $valeur[4]= $_GET['cpt'];
        $valeur[5]= $_GET['adr'];
        $info->addClient($valeur); 
    }
}
?>

<section class="cadre" id="inscri">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscription">
        <h2>Inscription :</h2>
        <br>
        <?php if(isset($erreur_nom)) print "<span class='erreur'>/!\ $erreur_nom /!\</span>"?>
        <?php if(isset($erreur_prenom)) print "<span class='erreur'>/!\ $erreur_prenom /!\</span>"?>
        <?php if(isset($erreur_login)) print "<span class='erreur'>/!\ $erreur_login /!\</span>"?>
        <?php if(isset($erreur_mdp)) print "<span class='erreur'>/!\ $erreur_mdp /!\</span>"?>
        <?php if(isset($erreur_cpt)) print "<span class='erreur'>/!\ $erreur_cpt /!\</span>"?>
        <?php if(isset($erreur_adr)) print "<span class='erreur'>/!\ $erreur_adr /!\</span>"?>
        <br>
        <table cellpadding="30" id="tab_ins">
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td><input type="text" class="form-control" name="nom">
                <?php if(isset($erreur_nom)) print "<span class='erreur'>*</span>"?></td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom :</label></td>
                <td><input type="text" class="form-control" name="prenom">
                <?php if(isset($erreur_prenom)) print "<span class='erreur'>*</span>"?></td>
            </tr>
            <tr>
                <td><label for="login">Login :</label></td>
                <td><input type="text" class="form-control" name="login">
                <?php if(isset($erreur_login)) print "<span class='erreur'>*</span>"?></td>
            </tr>
            <tr>
                <td><label for="mdp">MDP :</label></td>
                <td><input type="password" class="form-control" name="mdp">
                <?php if(isset($erreur_mdp)) print "<span class='erreur'>*</span>"?></td>
            </tr>
            <tr>
                <td><label for="numcompt">Numéro de compte :</label></td>
                <td><input type="text" class="form-control" name="cpt">
                <?php if(isset($erreur_cpt)) print "<span class='erreur'>*</span>"?></td>
            </tr>
            <tr>
                <td><label for="adr">Adresse :</label></td>
                <td><input type="text" class="form-control" name="adr">
                <?php if(isset($erreur_adr)) print "<span class='erreur'>*</span>"?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="btn btn-primary" type="submit" name="inscription" value="Valider"/>
                </td>
            </tr>
        </table>
    </form>
</section>