<?php
class SharesModel extends Model {
  public function Index() {
    $this->query('SELECT * FROM news');
		$rows = $this->resultSet();
		return $rows;
  }
  
  public function add(){
		// Sanitize POST

		if(isset($_POST['add'])){
			if($_POST['NewsTitle'] == '' || $_POST['NewsText'] == '' ){
				return;
			}
			// Insert into MySQL
			$this->query('INSERT INTO news (NewsTitle, NewsText, UserId) VALUES(:NewsTitle, :NewsText, :UserId)');
			$this->bind(':NewsTitle', $_POST['NewsTitle']);
      $this->bind(':NewsText', $_POST['NewsText']);
			$this->bind(':UserId', $_SESSION["UserData"]["UserId"]);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'shares');
			}
		}
		return;
	}
}