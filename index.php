<?php

session_start();

require_once('functions.php');
require_once('model/PdoScratch.php');

$Pdo = PdoScratch::getPdoScratch();

if ( !isset( $_GET['path']))
{
    $path = "main";
}
else
{
    $path = filter_var($_GET['path'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}


switch($path)
{
    case "main":
        require('controller/mainController.php');
        break;
}

