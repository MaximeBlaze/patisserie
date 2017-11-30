    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php?page=accueil.php" id="nom_site">OVNI-TRO</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php?page=accueil.php"><div class="glyphicon glyphicon-home"></div> Accueil</a></li>
            <li><a href="index.php?page=login.php"><div class="glyphicon glyphicon-lock"></div> Login</a></li>
            <li><a href="index.php?page=compte.php"><div class="glyphicon glyphicon-folder-open"></div>  Mon compte</a></li>
            <li><a href="index.php?page=shop.php"><div class="glyphicon glyphicon-euro"></div> Shop</a></li>
            <li><a href="index.php?page=panier.php"><div class="glyphicon glyphicon-shopping-cart"></div> Panier</a></li>
            <li><a href="index.php?page=infos.php"><div class="glyphicon glyphicon-info-sign"></div> Contact</a></li>
           <?php if(isset($login))
                {
                    $info = new utilisateurDB($cnx);
                    $texte = $info->getUtilisateur2($login);
                    ?>
                    <li><a><div class="glyphicon glyphicon-user"></div>Connecté en tant que : <?php print $texte[0]->LOGIN?></a></li><?php
                }
                else
                {?>
                    <li><a href="index.php?page=login.php"><div class="glyphicon glyphicon-warning-sign"></div> Non connecté</a></li><?php
                }?>
        </ul>
      </div>
    </nav>