    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php?page=accueil.php" id="nom_site">OVNI-TRO</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php?page=accueil.php"><div class="glyphicon glyphicon-home"></div> Accueil</a></li>
            <?php
                if(!isset($_SESSION['login']))
                { ?>
                    <li><a href="index.php?page=login.php"><div class="glyphicon glyphicon-lock"></div>Login</a></li>
                    <li><a href="index.php?page=login.php" onclick="Message()"><div class="glyphicon glyphicon-folder-open"></div>  Mon compte</a></li>
                    <li><a href="index.php?page=login.php" onclick="Message()"><div class="glyphicon glyphicon-shopping-cart"></div> Panier</a></li>
                <?php }
                else
                { ?>
                    <li><a href="index.php?page=disconnect.php"><div class="glyphicon glyphicon-lock"></div>Logout</a></li>
                    <li><a href="index.php?page=compte.php"><div class="glyphicon glyphicon-folder-open"></div>  Mon compte</a></li>
                    <li><a href="index.php?page=panier.php"><div class="glyphicon glyphicon-shopping-cart"></div> Panier</a></li>
                <?php } ?>
            
            <li><a href="index.php?page=shop.php"><div class="glyphicon glyphicon-euro"></div> Shop</a></li>
            
            <li><a href="index.php?page=infos.php"><div class="glyphicon glyphicon-info-sign"></div> Contact</a></li>
           <?php if(isset($_SESSION['login']))
                {?>
                    <li><a><div class="glyphicon glyphicon-user"></div> <?php print $_SESSION['login']?> connecté</a></li><?php
                }
                else
                {?>
                    <li><a href="index.php?page=login.php"><div class="glyphicon glyphicon-warning-sign"></div> Non connecté</a></li><?php
                }?>
        </ul>
      </div>
    </nav>
<script type="text/javascript">
   function Message() {
       var msg="Vous devez dabord vous connecter !";
       alert(msg);
   }
</script>