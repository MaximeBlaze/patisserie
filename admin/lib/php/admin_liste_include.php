<?php

if(file_exists('admin/lib/php/dbconnect.php'))
{
    include ('admin/lib/php/dbconnect.php');
    include ('admin/lib/php/autoload.php');
}
else if('lib/php/dbconnect.php')
{
    include ('lib/php/dbconnect.php');
    include ('lib/php/autoload.php');
}