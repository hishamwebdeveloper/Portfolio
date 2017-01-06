<?php
session_start();

//Login session check
function isLoggedIn() 
{
  
  if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == TRUE)
  {
    return TRUE;
  }
}

//Login function
function login() 
{  
  if (!isset($_POST['login']) or $_POST['login'] == '' or
    !isset($_POST['password']) or $_POST['password'] == '')
  {
    $GLOBALS['loginError'] = 'Please fill in both fields';
    return FALSE;
  }
  
  $password = md5($_POST['password'] . 'ijdb');
  
  if (databaseContainsUser($_POST['login'], $password))
  {
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $password;
    header('location: .');
  }
  else
  {
    unset($_SESSION['userId']);
    unset($_SESSION['loggedIn']);
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    $GLOBALS['loginError'] = 'The specified login address or password was incorrect.';
  }
}

//Logout function
function logout() 
{
  unset($_SESSION['userId']);
  unset($_SESSION['loggedIn']);
  unset($_SESSION['login']);
  unset($_SESSION['password']);
  header('location: .');
}

function databaseContainsUser($login, $password) 
{
  
  include 'db.inc.php';
  
  try
  {
    $sql = 'SELECT userId FROM user
        WHERE login = :login AND password = :password';
    $s = $pdo->prepare($sql);
    $s->bindValue(':login', $login);
    $s->bindValue(':password', $password);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error searching for author.';
    echo $error;
    exit();
  }

  
  $row = $s->fetch();
  $_SESSION['userId'] = $row[0];

  if ($row[0] > 0)
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
  
}