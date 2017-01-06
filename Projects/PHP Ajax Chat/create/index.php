<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/a/includes/magicquotes.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/a/includes/create.inc.php';

//Capture user create account and process it
if (isset($_POST['action']) and $_POST['action'] == 'create')
{
  userCreate();
}

include '/create-account.html.php';