<?php
        $info = new vaisseauDB($cnx);
        $texte = $info->getAllVaisseau();
        $nbrvaiss = count($texte);
?>
<section class="col-sm-12 bloc1">
    <h1>Depuis 2048</h1>
    <p style="text-align:center;font-size:120%;">
        Notre magasin vend des vaisseaux spatiaux dans le monde entier depuis 2048.
        <br>Nos meilleures ventes :
    </p>
</section>
<section class="col-sm-12 bloc2">
    <a href="index.php?page=shop.php"><img src="./lib/CSS/Images/croiseur.jpg" alt="croiseur" heigh="20%" width="30%"></a>
    <a href="index.php?page=shop.php"><img src="./lib/CSS/Images/vaiss3.jpg" alt="vaisseau3" style="margin-left:5%;" heigh="20%" width="30%"></a>
</section>
<section class="col-sm-12 bloc3">
    <div style="margin-left:15%;">
        <h2>Bienvenue</h2><br><br>
        <p style="font-size:110%;">
            Nous vous souhaitons à tous la bienvenue sur notre site OVNI_TRO, 
        <br>il vous sera demandé de vous inscrire pour pouvoir passer commande.
        <br>Notre magasin dispose en ce moment de <?php print $nbrvaiss;?> vaisseaux différents, allez y faire un tour !
        <br>Vous pouvez consulter ce que contient votre panier en cliquant sur l'onglet panier de notre menu.
        <br>Si vous n'êtes pas encore inscrit, nous vous conseillons de le faire rappidement depuis ce lien :
        <br><br><a href="index.php?page=inscription.php"><input class="btn btn-primary" type="button" name="inscrire" value="S'inscrire"/></a><br><br>
        </p>
    </div>
</section>
<section class="col-sm-12 bloc4">
        <h2>Nos partenaires et clients :</h2>
</section>
<section class="col-sm-12 bloc5">
    <div id="parts">
        <table>
            <tr>
                <td class="col-sm-3"><img src="./lib/CSS/Images/gas.jpg" alt="gas" width="50%" height="40%" legend="Gasoil For Ship"><br>Gasoil For Ship</td>
                <td class="col-sm-3"><img src="./lib/CSS/Images/large1.jpg" alt="ecole" width="80%" height="70%"><br>Ecole de pilotage</td>
                <td class="col-sm-3"><img src="./lib/CSS/Images/mecano.jpg" alt="mecano" width="85%" height="75%"><br>Bob le mécano</td>
                <td class="col-sm-3"><img src="./lib/CSS/Images/gps.jpg" alt="gps" width="60%" height="50%"><br>GPS For Ship</td>
            </tr>
        </table>
    </div>
</section>