<?php
    $info = new vaisseauDB($cnx);
    $texte = $info->getAllVaisseau();
    $nbrvaiss = count($texte);
    if(isset($_GET['commander']))
    {
            $info2 = new liste_panierDB($cnx);
            $texte2 = $info2->ajoutpanier($_GET['choix']);?>
            <meta http-equiv = "refresh": content = "0;url=index.php?page=panier.php">
    <?php } 
    
?>
<section class="col-sm-12 bloc1">
    <h1 style="margin-bottom : 3%; margin-top:1%;">Nos vaisseaux :</h1>
</section>

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
                    <?php
                    if(isset($_SESSION['login']))
                    { ?>
                    <input class="btn btn-primary" type="submit" name="commander" value="Ajouter au panier"/>
                    <?php } ?>     
                </form>
            </section>
        <?php } ?>

        