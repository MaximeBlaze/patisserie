<?php
include ('./admin/lib/php/admin_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<!doctype html>

<html>
    <head>
        <title>Mon site !</title>
        <link rel="stylesheet" type="text/css" href="../Site 2017/admin/lib/css/bootstrap-4.0.0-beta/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="lib/CSS/style1.css"/>
        <script src="jquery.js"></script>
        <meta charset="utf-8">
    </head>
    <header>
        <h1 id="t1"></h1>
        <div id="entete"></div>
        <div class="tir a1"></div>
        <div class="tir a2"></div>
        <nav>
            <?php
            if (file_exists("./lib/php/menu.php")) {
                include "./lib/php/menu.php";
            }
            ?>
        </nav>
    </header>
    <body>
        <?php
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = "./pages/accueil.php";
        } else {
            if (isset($_GET['page'])) {
                $_SESSION['page'] = "./pages/" . $_GET['page'];
            }
        }
        if (file_exists($_SESSION['page'])) {
            if($_SESSION['page']!='./pages/login.php')
            {
                include "./lib/php/catalogue.php";
                include "./lib/php/partenaire.php";
            }
            include $_SESSION['page'];
        } else
            print "Error";
        ?>
    </body>
    <footer>
        <div id="foot" class="cadre">
            Webmaster : Maxime Blaze
        </div>
    </footer>
                <script>
                    var t1 = "Magasin OVNI-TRO";
                    var Array1 = t1.split("");
                    var time;
                    $(document).ready(function () {
                        $('.a1').stop().animate({width: '1350px'}, {duration: 1500});
                        $('.a2').stop().animate({width: '1350px'}, {duration: 1500});
                        time = setTimeout('machine()', 500);
                    });
                    function machine() {
                        if (Array1.length > 0)
                        {
                            document.getElementById("t1").innerHTML += Array1.shift();
                        } else
                        {
                            clearTimeout(time);
                        }
                        time = setTimeout('machine()', 150);
                    }
                </script>
</html>