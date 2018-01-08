<?php
    require "./admin/lib/PHP/verifier_connexion.php";
    if(isset($_GET['retirer']))
    {
        $info = new liste_panierDB($cnx);
        $texte = $info->retirerpanier($_GET['choix']);?>
        <meta http-equiv = "refresh": content = "0;url=index.php?page=panier.php">
    <?php }
    
?>
<section class="col-sm-12 bloc2" style="color : white; text-align: center;">
    <h2 style="margin-top: 1%; font-size : 300%;">Mon panier :</h2>
</section>  

<?php 
$info = new panierDB($cnx);
$texte = $info->getPanier();
if($texte[0]!=false)
{
    $total=0;
    $nbrvaiss = count($texte)-1;
    ?>
        <form class="col-sm-12 bloc1" style="text-align: center;">
            <h2>Total :</h2></br></br> <?php
            
            for($j=0;$j<$nbrvaiss;$j++)
            {?>
                <?php print $texte[$j]->PRIX; ?> unités
                </br>
                
                <?php
                $total = $texte[$j]->PRIX + $total;
            }?>
            ------------------------------------
            </br> 
            Total : <?php print $total; ?> unités</br></br>
            <input type="submit" value="Commander" onclick="Message()" class="btn btn-primary" name="commander" id="btn-com"></br></br>
            <?php 
                if(isset($_GET['commander']))
                {
                    $inf = new commandeDB($cnx);
                    $com=$inf->SetCommande($total);
                    for($j=0;$j<$nbrvaiss;$j++)
                    {
                        $infl = new liste_commandeDB($cnx);
                        $infl->setListe($com[0]['ID_COMMANDE'], $texte[$j]->ID_VAISSEAU);
                    }
                    $infpan = new panierDB($cnx);
                    $pan = $infpan->VidePanier();
                    ?>
                   <meta http-equiv = "refresh": content = "0;url=index.php?page=panier.php">
                <?php }
            ?>
        </form>    
    <?php    
    for($i=0;$i<$nbrvaiss;$i++)
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
<script type="text/javascript">
   function Message() {
       var msg="Commande effectuée et panier vidé !";
       alert(msg);
   }
</script>