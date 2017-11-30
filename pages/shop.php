<?php
    $info = new vaisseauDB($cnx);
    $texte = $info->getAllVaisseau();
    $nbrvaiss = count($texte);
    for($i=0;$i<$nbrvaiss;$i++)
    {
        if(isset($_GET['commander_'+$texte[$i]->ID_VAISSEAU]))
        {
            $info2 = new liste_panierDB($cnx);
            print $texte[$i]->ID_VAISSEAU;
            $texte2 = $info->ajoutpanier($texte[$i]->ID_VAISSEAU);
        }
    }
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
                    <?php 
                    print $texte[$i]->DESCRIPTION;?>
                    <br/><br/>
                    Prix : <?php print $texte[$i]->PRIX; ?> unité(s)<br/><br/>
                    <input class="btn btn-primary" type="button" name="commander_<?php print $texte[$i]->ID_VAISSEAU ?>" value="Ajouter au panier"/></a>
                </form>
            </section>
        <?php } ?>

            