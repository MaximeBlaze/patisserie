<?php
include ('./admin/lib/php/admin_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<!doctype html>

<html>
    <head>
        <title>Mon site !</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="jquery-3.2.1.js"></script> 
        <script src="admin/lib/js/functions.js"></script>
        <script src="admin/lib/js/functionsAjax.js"></script>
        <script type="text/javascript" src="admin/lib/js/dist/jquery.validate.js"></script> 
        <link rel="stylesheet" type="text/css" href="lib/CSS/style1.css"/>
        <meta charset="utf-8">
    </head>
    <header class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 id="t1"></h1>
                <div id="hvaiss">
                    <div id="entete" class="img-responsive"></div>
                    <div class="tir a1"></div>
                    <div class="tir a2"></div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
                <div class="col-sm-12">
                        <?php
                        if (file_exists("./lib/php/menu.php")) {
                            include "./lib/php/menu.php";
                        }
                        else
                        {
                            print "erreur de chargement de page !";
                        }
                        ?>
                </div>
        </div>
    </div>    
    <body>
        <?php
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = "./pages/accueil.php";
        } 
        else {
            if (isset($_GET['page'])) {
                if(!isset($_SESSION['login']))
                { 
                    $_SESSION['page'] = "./pages/" . $_GET['page'];
                }
                else if ($_SESSION['login']!='admin')
                {
                    $_SESSION['page'] = "./pages/" . $_GET['page'];
                }
                else
                {
                    $_SESSION['page'] = "./admin/pages/" . $_GET['page'];
                }
                
            }
        }
        if (file_exists($_SESSION['page'])) {
            
            include $_SESSION['page'];
        } else
            print "Error";
        ?>
    </body>
    <footer class="col-sm-12">
        <p style="font-size :12px;">© 2117 OVNI_TRO, All rights reserved 2116-2117.<br/></p>
    </footer>
</html>
<script>
                    var t1 = "Magasin OVNI-TRO";
                    var Array1 = t1.split("");
                    var time;
                    $(document).ready(function () {
                        $('.a1').stop().animate({width: '800px'}, {duration: 1000});
                        $('.a2').stop().animate({width: '800px'}, {duration: 1000});
                        time = setTimeout('machine()', 500);
                        time = setTimeout('effactir()', 3500);
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
                    function effactir()
                    {
                        $(".tir").hide();
                    }
                </script>