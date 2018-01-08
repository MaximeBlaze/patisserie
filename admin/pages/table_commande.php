<?php
$obj = new commandeDB($cnx);
$liste = $obj->getAllCommandes();
$nbrG = count($liste);
$_SESSION['ajax']='commande';
if(isset($_GET['modifier']))
{
    $_SESSION['com']=$_GET['choix'];
    $c = new commandeDB($cnx);
    $l = $c->getCom($_GET['choix']);
}
if(isset($_GET['effacer']))
{
    $obj2 = new commandeDB($cnx);
    $obj2->suppCommande($_GET['choix']); ?>
    <meta http-equiv = "refresh": content = "0;url=index.php?page=table_commande.php"> <?php
}
if(isset($_GET['modifier2']))
{
    $c2 = new commandeDB($cnx);
    $c2->updateCommande("LIVRAISON", $_GET['etat'], $_SESSION['com']); ?>
    <meta http-equiv = "refresh": content = "0;url=index.php?page=table_commande.php"> <?php
}
?>

<section class="col-sm-12 bloc2" style="color : white; text-align: center;">
    <h2 style="text-align: center;">Tableau dynamique des commandes</h2>
</section> 
<section class="col-sm-12 bloc1" style="text-align: center;"><br/><br/>
<table class="table-responsive" style="margin: 0 auto;">
    <tr>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >ID</th>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Login</th>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Total</th>
        <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >Date</th>
        <th style="width : 5%;border-bottom : 1px solid black;">Livraison</th>
        <th style="width : 5%;border-bottom : 1px solid black;"></th>
    </tr>
    <?php
    for ($i = 0; $i < $nbrG-1; $i++) {
    ?>
    <form>
        <tr>
            <td style="width : 5%;border-right : 1px solid black;"><br/><br/>
                <input type='hidden' name="choix" value="<?php echo $liste[$i]->ID_COMMANDE?>"></input>
                <?php echo $liste[$i]->ID_COMMANDE?>
            </td>
            <td style="width : 5%;border-right : 1px solid black;"><br/><br/><?php echo $liste[$i]->LOGIN; ?></td>
            <td style="width : 5%;border-right : 1px solid black;"><br/><br/><?php echo $liste[$i]->TOTAL; ?></td>
            <td style="width : 5%;border-right : 1px solid black;"><br/><br/><?php echo $liste[$i]->DATE; ?></td>
            <td style="width : 5%;border-right : 1px solid black;">
                   <span contenteditable="true" name="COMMANDE-LIVRAISON" id="<?php echo $liste[$i]->ID_COMMANDE; ?>">
                   <br/><br/> <?php echo $liste[$i]->LIVRAISON; ?>
                </span>
            </td>
            <td style="width : 5%;">
                <br/><br/>
                <input class="btn btn-danger" type="submit" name="effacer" value="Supprimer"> 
                <input class="btn btn-primary" type="submit" name="modifier" value="Choisir"/></form>
            </td>
        </tr>
        
        <?php
    }
    ?>
</table><br/><br/>
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Modifier commande
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
                <form>
                <table>
                    <tr>
                        <td><br/><label for="nom">Commande : </label></td>
                        <td><br/><?php print $l[0]->ID_COMMANDE ?></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Etat : </td>
                        <td><br/><br/><input type="text" class="form-control" name="etat" placeholder="Etat" id="etat"></td>
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