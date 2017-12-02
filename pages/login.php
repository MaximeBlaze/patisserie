<?php
if(isset($_GET['connecter'])){
    if($_GET['login']=="")
    {
	$erreur_login="Login manquant";
    }
    if($_GET['mdp']=="")
    {
	$erreur_mdp="Mot de passe manquant";
    }
    else if ($_GET['login']!="" && $_GET['mdp']!="")
    {
            $info = new utilisateurDB($cnx);
            $texte = $info->getUtilisateur($_GET['login']);
            if($texte[0]!=false)
            {
                if($texte[0]->LOGIN==$_GET['login'])
                {
                    if($texte[0]->MDP==md5($_GET['mdp']))
                    {
                        $_SESSION['login'] = $texte[0]->LOGIN;
                        $info2 = new panierDB($cnx);
                        $texte2 = $info2->getIDPanier($_GET['login']);
                        $_SESSION['panier']=$texte2[0]->ID_PANIER?>
                        <meta http-equiv = "refresh": content = "0;url=index.php?page=accueil.php"><?php
                    }
                }
            }
            else
            {
                $erreur_connex="Erreur ! Login ou mdp incorrect";
            }
    }
}
?>
<br>
<section class="col-sm-12">
    <h1 style="color:white;">Se connecter :</h1>
</section>
<section class="col-sm-12 bloc1">
    <form id="connec" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" >
        
            <?php if(isset($erreur_login)) print "<span class='erreur'>/!\ $erreur_login /!\</span>"?>
            <?php if(isset($erreur_connex)) print "<span class='erreur'>/!\ $erreur_connex /!\</span>"?>
            <?php if(isset($erreur_mdp)) print "<span class='erreur'>/!\ $erreur_mdp /!\</span>"?>
        <br><br><br>
        <table style="margin : 0 auto;">
            <tr>
                <td><?php if(isset($erreur_login)) print "<div class='erreur'>*</div>"?><label for="login" class="lablog">Login :</label><br><br></td>
                <td><input type="text" class="form-control" name="login"><br></td>
            </tr>
            <tr>
                <td><?php if(isset($erreur_mdp)) print "<span class='erreur'>*</span>"?><label for="mdp" class="lablog">Mot de passe :</label><br><br></td>
                <td class="inline"><input type="password" class="form-control" name="mdp"><br></td>
            </tr>
        </table>
        <br>
            <div id="bt_co">
                <input class="btn btn-primary" type="submit" name="connecter" value="Se connecter"/>
                <a href="index.php?page=inscription.php"><input class="btn btn-primary" type="button" name="enreg" value="S'enregistrer"/></a>
            </div>
    </form>
    <br>
</section>