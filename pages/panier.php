<?php
    require "./admin/lib/PHP/verifier_connexion.php";
    if(isset($_GET['retirer']))
    {
        $info = new liste_panierDB($cnx);
        $texte = $info->retirerpanier($_GET['choix']);?>
        <!--<meta http-equiv = "refresh": content = "0;url=index.php?page=panier.php"> -->
    <?php }
?>
<section class="col-sm-12 bloc1" style="color : black; text-align: center;">
    <h2 style="margin-top: 1%; font-size : 300%;">Mon panier :</h2>
</section>
<?php 
$info = new panierDB($cnx);
$texte = $info->getPanier();
if($texte[0]!=false)
{
    $nbrvaiss = count($texte);
    for($i=0;$i<$nbrvaiss-1;$i++)
        {?>
            <section class="col-sm-12 bloc2" style="text-align : center; margin-top : 7%;">
            <img src="./lib/CSS/Images/<?php print $texte[$i]->IMAGE;?>" alt="<?php $texte[$i]->DESCRIPTION;?>" class="vaissshop"/>
            </section>
            <section class="col-sm-12 txtvaiss" >
                <form style="margin-top :3%;margin-bottom :3%; background-color: #CCCCCC;">
                    <input type='hidden' name="choix" value="<?php print $texte[$i]->ID_VAISSEAU?>"></input>
                    <label name="desc"><?php print $texte[$i]->DESCRIPTION;?></label>
                    <br/><br/>
                    <label name="prix">Prix : <?php print $texte[$i]->PRIX; ?> unité(s)</label><br/><br/>
                    <input class="btn btn-primary" type="submit" name="retirer" value="Retirer du panier"/>
                </form>
            </section>
<?php }}
else
{?>
    <section class="col-sm-12 bloc1" style='text-align: center;'>
        <p>
            <h2>Désolé,</h2>
            mais votre panier est vide pour l'instant, allez donc visiter notre shop pour le remplir !
        </p>
    </section>
    
<?php }?>