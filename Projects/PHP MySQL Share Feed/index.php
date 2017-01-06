<?php
//Start Session
session_start();

//Include Config
require('config.php');

//Include Classes
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

//Include Controllers
require('controllers/home.php');
require('controllers/shares.php');
require('controllers/user.php');

//Include Models
require('models/home.php');
require('models/shares.php');
require('models/user.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller)
{
  $controller->executeAction();
}