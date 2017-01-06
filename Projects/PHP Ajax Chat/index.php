<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/a/includes/magicquotes.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/a/includes/access.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/a/includes/newsFeed.inc.php';

//Capture login and process it
if (isset($_POST['action']) and $_POST['action'] == 'login')
{
  login();
}

//Capture logout and process it
if (isset($_POST['action']) and $_POST['action'] == 'logout')
{
  logout();
}

//Capture newsFeed enter and process it
if (isset($_POST['action']) and $_POST['action'] == 'enter')
{
  newsFeedSubmit();
}

//Check login session
if (isLoggedIn())
{
  include '/app.html.php';
  exit();
}
else
{
  include '/login.html.php';
  exit();
}
