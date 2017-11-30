<section class="col-sm-12 bloc1" style="color : black; text-align: center;">
    <h2 style="margin-top: 1%; font-size : 300%;">Mon panier :</h2>
</section>
<?php 
$info = new panierDB($cnx);
$texte = $info->getPanier("admin");
if($texte[0]!=false)
{
    $nbrvaiss = count($texte);
    for($i=0;$i<$nbrvaiss-1;$i++)
        {?>
            <section class="col-sm-12 bloc2" style="text-align : center; margin-top : 7%;">
            <img src="./lib/CSS/Images/<?php print $texte[$i]->IMAGE;?>" alt="<?php $texte[$i]->DESCRIPTION;?>" class="vaissshop"/>
            </section>
            <section class="col-sm-12 txtvaiss" >
                <div style="margin-top :3%;margin-bottom :3%; background-color: #CCCCCC;">
                    <?php 
                    print $texte[$i]->DESCRIPTION;?>
                    <br/><br/>
                    Prix : <?php print $texte[$i]->PRIX; ?> unité(s)<br/><br/>
                    <input class="btn btn-primary" type="submit" name="commanderv1" value="Retirer du panier"/>
                </div>
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