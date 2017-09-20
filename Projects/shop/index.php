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
require('controllers/about.php');
require('controllers/contact.php');
require('controllers/shop.php');
require('controllers/login.php');
require('controllers/logout.php');
require('controllers/register.php');

//Include Models
require('models/home.php');
require('models/shop.php');
require('models/login.php');
require('models/register.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller)
{
  $controller->executeAction();
}