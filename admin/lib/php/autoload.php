<?php

function autoload($nom_classe)
{
    if(file_exists('./lib/php/classes/'.$nom_classe.'.class.php'))
    {
        include './lib/php/classes/'.$nom_classe.'.class.php';
    }
    else if(file_exists('./admin/lib/php/classes/'.$nom_classe.'.class.php'))
    {
        include './admin/lib/php/classes/'.$nom_classe.'.class.php';
    }
}

spl_autoload_register('autoload');

