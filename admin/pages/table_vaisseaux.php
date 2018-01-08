<?php
if(isset($_GET['modifier']))
{
    $_SESSION['vaisseau']=$_GET['choix'];
    $obj2 = new vaisseauDB($cnx);
    $l = $obj2->getVaisseau($_GET['choix']);
}
if(isset($_GET['modifier2']))
{
    $data[0]=$_GET['desc'];
    $data[1]=$_GET['prix'];
    $data[2]=$_SESSION['vaisseau'];
    $obj3 = new vaisseauDB($cnx);
    $obj3->modifvaiss($data);
}
?>
<section class="col-sm-12 bloc2" style="color : white; text-align: center;">
    <h2 style="text-align: center;">Tableau dynamique des vaisseaux</h2>
</section>
<?php
$obj = new vaisseauDB($cnx);
$liste = $obj->getAllVaisseau();
$nbrG = count($liste);
$_SESSION['ajax']='vaisseau';
?>
<section class="col-sm-12 bloc1" style="text-align: center;"><br/><br/>
<table class="table-responsive" style="margin: 0 auto;">
    <thead>
        <tr>
            <th style="width : 5%;border-right : 1px solid black;border-bottom : 1px solid black;" >ID</th>
            <th style="width : 10%;border-right : 1px solid black;border-bottom : 1px solid black;" >Description</th>
            <th style="width : 10%;border-right : 1px solid black;border-bottom : 1px solid black;" >Prix</th>
            <th style="width : 10%;border-bottom : 1px solid black;border-bottom : 1px solid black;" >Image</th>
            <th style="width : 2%;border-bottom : 1px solid black;" ></th>
        </tr>
    </thead>
    <?php
    for ($i = 0; $i < $nbrG; $i++) {
        ?>
    <form>
        <tr>
            <td style="width : 5%;border-right : 1px solid black;"><br/><br/><?php echo $liste[$i]->ID_VAISSEAU; ?>
            <input type='hidden' name="choix" value="<?php echo $liste[$i]->ID_VAISSEAU?>"></input>
            </td>
            <td style="width : 10%;border-right : 1px solid black;">
                <span contenteditable="true" name="VAISSEAU-DESCRIPTION" id="<?php echo $liste[$i]->ID_VAISSEAU; ?>">
                   <br/><br/> <?php echo $liste[$i]->DESCRIPTION; ?>
                </span>
            </td>
            <td style="width : 10%;border-right : 1px solid black;">
                <span contenteditable="true" name="VAISSEAU-PRIX" id="<?php echo $liste[$i]->ID_VAISSEAU; ?>">
                   <br/><br/> <?php echo $liste[$i]->PRIX;?>
                </span>
            </td>
            <td style="width : 10%;" id="tabvaiss" ><br/><br/>
                <img class="vaisstab" src="./lib/CSS/Images/<?php echo $liste[$i]->IMAGE ?>" alt="<?php $liste[$i]->DESCRIPTION;?>"/>
            </td>
            <td style="width : 2%;" ><br/><br/>
                <input class="btn btn-primary" type="submit" name="modifier" value="Choisir"/>
            </td>
        </tr>
    </form>
        <?php
    }
    ?>
</table><br/><br/> 
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Modifier vaisseau
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
                        <td><br/><label for="nom">Vaisseau : </label></td>
                        <td><br/><?php print $l[0]->ID_VAISSEAU ?></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Description : </td>
                        <td><br/><br/><input type="text" class="form-control" name="desc" id="desc" value="<?php print $l[0]->DESCRIPTION;?>"></td>
                    </tr>
                    <tr>
                        <td><br/><br/>Prix : </td>
                        <td><br/><br/><input type="text" class="form-control" name="prix" id="prix" value="<?php print $l[0]->PRIX;?>"></td>
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
