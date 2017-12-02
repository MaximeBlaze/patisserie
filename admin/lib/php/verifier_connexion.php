<?php

if(!isset($_SESSION['login']))
{?>
    <meta http-equiv = "refresh": content = "0;url=./index.php?page=login.php">
<?php
    exit();
} 