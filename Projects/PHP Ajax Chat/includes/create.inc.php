<?php

function userCreate()
{
  include 'db.inc.php';
  
  if (!isset($_POST['firstName']) or $_POST['firstName'] == '')
  {
    $GLOBALS['createError'] = 'Please fill in empty fields';
    return FALSE;
  }
  
  if (!isset($_POST['lastName']) or $_POST['lastName'] == '')
  {
    $GLOBALS['createError'] = 'Please fill in empty fields';
    return FALSE;
  }
  
  if (!isset($_POST['email']) or $_POST['email'] == '')
  {
    $GLOBALS['createError'] = 'Please fill in empty fields';
    return FALSE;
  }
  
  if (!isset($_POST['login']) or $_POST['login'] == '')
  {
    $GLOBALS['createError'] = 'Please fill in empty fields';
    return FALSE;
  }
  
  if (!isset($_POST['password']) or $_POST['password'] == '')
  {
    $GLOBALS['createError'] = 'Please fill in empty fields';
    return FALSE;
  }
  
  
  try
  {
    $sql = 'INSERT INTO user SET
    firstName = :firstName,
    lastName = :lastName,
    gender = :gender,
    email = :email,
    login = :login,
    password = :password';
    $s = $pdo->prepare($sql);
    $s->bindValue(':firstName', $_POST['firstName']);
    $s->bindValue(':lastName', $_POST['lastName']);
    $s->bindValue(':gender', $_POST['gender']);
    $s->bindValue(':email', $_POST['email']);
    $s->bindValue(':login', $_POST['login']);
    $s->bindValue(':password', md5($_POST['password'] . 'ijdb'));
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error creating account.';
    echo $error;
    exit();
  }
  
  return TRUE;
}