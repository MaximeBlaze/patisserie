<?php
    if(isset($_GET['nouvuser']))
    {
        if($_SESSION['user']==false)
        {
            $_SESSION['user']=true;
        }
        else
        {
            $_SESSION['user']=false;
        }
    }
    else
    {
        $_SESSION['user']=false;
    }
    if(isset($_GET['valider']))
    {
        if($_GET['nom']!="" && $_GET['prenom']!="" && $_GET['login']!="" && $_GET['cpt']!="" && $_GET['adresse']!="" && $_GET['MDP']!="")
        {
            $obj2 = new utilisateurDB($cnx);
            $valeur[0]= $_GET['nom'];
            $valeur[1]= $_GET['prenom'];
            $valeur[2]= $_GET['login'];
            $valeur[3]= $_GET['MDP'];
            $valeur[4]= $_GET['cpt'];
            $valeur[5]= $_GET['adresse'];
            $obj2->addClient($valeur);
        }
    }
    if(isset($_GET['effacer']))
    {
        $obj3 = new utilisateurDB($cnx);
        $obj3->suppUser($_GET['id']);
    }
    if(isset($_GET['modifier']))
    {
        $_SESSION['utilisateur']=$_GET['choix'];
        $obj4 = new utilisateurDB($cnx);
        $l = $obj4->getUtilisateur2($_GET['choix']);
    }
    if(isset($_GET['modifier2']))
    {
        if($_GET['nom']!="" && $_GET['prenom']!="" && $_GET['mdp']!="" && $_GET['cpt']!="" && $_GET['adr']!="" && $_GET['login']!="")
        {
            $c2 = new utilisateurDB($cnx);
            $data[0]=$_GET['nom'];
            $data[1]=$_GET['prenom'];
            $data[2]=$_GET['mdp'];
            $data[3]=$_GET['cpt'];
            $data[4]=$_GET['adr'];
            $data[5]= $_GET['login'];
            $data[6]= $_SESSION['utilisateur'];
            $c2->UpdateUser2($data);
        }
        else
        {
            $erreur = "Veuillez remplir tous les champs";
        }
    }
?>
<section class="col-sm-12 bloc2" style="color : white; text-align: center;">
    <h2 style="text-align: center;">Tableau dynamique des utilisateurs</h2>
</section>
<?php
$obj = new utilisateurDB($cnx);
$liste = $obj->getAllUSser();
$nbrG = count($liste);
$_SESSION['ajax']='utilisateur';
?>
<section class="col-sm-12 bloc1" style="text-align: center;"><br/>
    <a href="./admin/pages/imprimer2.php"><img src="./lib/CSS/Images/pdf.jpg" alt="PDF"/></a><br/><br/>
<table class="table-responsive" style="margin: 0 auto;">
    <tr>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Nom</th>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Prénom</th>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Login</th>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Numéro de compte</th>
        <th style="width : 5%;border-bottom : 1px solid black;border-bottom : 1px solid black;" >Adresse</th>
        <th style="width : 5%;border-bottom : 1px solid black;"></th>
    </tr>
    <?php
    for ($i = 0; $i < $nbrG; $i++) {
    ?>
    <form>
        <tr>
            <td style="width : 5%;border-right : 1px solid black;">
                <input type='hidden' name="choix" value="<?php echo $liste[$i]->ID_UTILISATEUR?>"></input>
                <span contenteditable="true" name="UTILISATEUR-NOM" id="<?php print $liste[$i]->ID_UTILISATEUR; ?>">
                   <br/><br/> <?php print $liste[$i]->NOM; ?>
                </span>
                <input type="hidden" value="<?php print $liste[$i]->ID_UTILISATEUR; ?>" name="id">
            </td>
            <td style="width : 5%;border-right : 1px solid black;">
                <span contenteditable="true" name="UTILISATEUR-PRENOM" id="<?php print $liste[$i]->ID_UTILISATEUR; ?>">
                   <br/><br/> <?php print $liste[$i]->PRENOM; ?>
                </span>
            </td>
            <td style="width : 5%;border-right : 1px solid black;">
                <span contenteditable="true" name="UTILISATEUR-LOGIN" id="<?php print $liste[$i]->ID_UTILISATEUR; ?>">
                   <br/><br/> <?php print $liste[$i]->LOGIN; ?>
                </span>
            </td>
            <td style="width : 5%;border-right : 1px solid black;">
                <span contenteditable="true" name="UTILISATEUR-NUMERO_COMPTE" id="<?php print $liste[$i]->ID_UTILISATEUR; ?>">
                   <br/><br/> <?php print $liste[$i]->NUMERO_COMPTE; ?>
                </span>
            </td>
            <td style="width : 5%;border-right : 1px solid black;">
                <span contenteditable="true" name="UTILISATEUR-ADRESSE" id="<?php print $liste[$i]->ID_UTILISATEUR; ?>">
                   <br/><br/> <?php print $liste[$i]->ADRESSE; ?>
                </span>
            </td>
            <td style="width : 5%;"><br/><br/>
                <input class="btn btn-danger" type="submit" name="effacer" value="Supprimer">
                <input class="btn btn-primary" type="submit" name="modifier" value="Choisir"/>
            </td>
        </tr>
    </form>
        <?php
    }
    ?>
</table><br/><br/> 
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="tabnouvuser">
    <input class="btn btn-default" type="submit" name="nouvuser" value="Nouveau"><br/> <br/>
<?php
if(isset($_SESSION['user']))
{
    if($_SESSION['user']==true)
    { ?>
        <table class="table-responsive" style="margin: 0 auto;">
            <tr>
                <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Nom</th>
                <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Prénom</th>
                <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Login</th>
                <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >MDP</th>
                <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Numéro de compte</th>
                <th style="width : 5%;border-bottom : 1px solid black;" >Adresse</th>
            </tr>
            <tr>
                <td style="width : 5%;border-right : 1px solid black;"><br/>
                    <input name="nom"></input>
                </td>
                <td style="width : 5%;border-right : 1px solid black;"><br/>
                    <input name="prenom"></input>
                </td>
                <td style="width : 5%;border-right : 1px solid black;"><br/>
                    <input name="login"></input>
                </td>
                <td style="width : 5%;border-right : 1px solid black;"><br/>
                    <input type="password" name="MDP"></input>
                </td>
                <td style="width : 5%;border-right : 1px solid black;"><br/>
                    <input name="cpt"></input>
                </td>
                <td style="width : 5%;"><br/>
                    <input name="adresse"></input>
                </td>
            </tr>
        </table><br/><br/>
        <input class="btn btn-primary" type="submit" name="valider" value="Valider" width="5%" height="5%"><br/><br/>
<?php    }
}
?>
</form>
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Modifier utilisateur
	</button><br/><br/>
</section>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modifier utilisateur :</h4>
            </div>
            <div class="modal-body">
                <?php if(isset($erreur)) print "<span class='erreur'>/!\ $erreur /!\</span>"?>
                <form>
                <table>
                    <tr>
                        <td><br/><br/>Nom :</td>
                        <td><br/><br/><input type="text" class="form-control" name="nom" id="nom" value="<?php print $l[0]->NOM?>"></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Prenom : </td>
                        <td><br/><br/><input type="text" class="form-control" name="prenom" id="prenom" value="<?php print $l[0]->PRENOM?>"></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Login : </td>
                        <td><br/><br/><input type="text" class="form-control" name="login" id="login" value="<?php print $l[0]->LOGIN?>"></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Mdp : </td>
                        <td><br/><br/><input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe"></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Compte : </td>
                        <td><br/><br/><input type="text" class="form-control" name="cpt" id="cpt" value="<?php print $l[0]->NUMERO_COMPTE?>"></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Adresse : </td>
                        <td><br/><br/><input type="text" class="form-control" name="adr" id="adresse" value="<?php print $l[0]->ADRESSE?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><br/><br/><input class="btn btn-primary" type="submit" name="modifier2" value="Modifier"/><br/></td>
                    </tr>
                </table>
                </form>
            </div>
	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
