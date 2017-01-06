<?php

include $_SERVER['DOCUMENT_ROOT'] . '/a/includes/db.inc.php';
  
  try
  {
    $result = $pdo->query('SELECT news_feedContent, news_feedDate FROM news_feed');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching news feed content from the database!';
    exit();
  }
?>

<?php foreach ($result as $row): ?>
<p id="message"><?php echo $row['news_feedContent'] . '<br>'; ?></p>
<p id="date"><?php echo $row['news_feedDate'] . '<br>'; ?></p>
<?php endforeach; ?>