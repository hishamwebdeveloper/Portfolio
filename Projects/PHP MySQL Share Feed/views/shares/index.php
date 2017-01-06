<?php if(isset($_SESSION['is_logged_in'])) : ?>
<a id="share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
<?php endif; ?>
<?php foreach($viewmodel as $item) : ?>
  <div class="blocks">
    <h4><?php echo htmlspecialchars($item['NewsTitle']); ?></h4>
    <p><?php echo htmlspecialchars($item['NewsText']); ?></p>
    <p><?php echo $item['NewsDate']; ?></p>
  </div>
<?php endforeach; ?>