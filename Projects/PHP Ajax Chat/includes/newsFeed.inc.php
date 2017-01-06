<?php

function newsFeedSubmit() {
  include 'db.inc.php';
  
  //Insert news feed
  try
  {
    $sql = 'INSERT INTO news_feed SET
    news_FeedContent = :news_FeedContent,
    userId = :userId';
    $s = $pdo->prepare($sql);
    $s->bindValue(':news_FeedContent', $_POST['content']);
    $s->bindValue(':userId', $_SESSION['userId']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error posting news feed.';
    echo $error;
    exit();
  }
}