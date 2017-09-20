<?php
class RegisterModel extends Model {
  public function Index() {
    if(isset($_POST['register']))
    {
      $password = md5($_POST['password'] . 'salt');
      
      if(!isset($_POST['firstname']) || $_POST['firstname'] == '')
      {
        return;
      }
      if(!isset($_POST['lastname']) || $_POST['lastname'] == '')
      {
        return;
      }
      if(!isset($_POST['email']) || $_POST['email'] == '')
      {
        return;
      }
      if(!isset($_POST['password']) || $_POST['password'] == '')
      {
        return;
      }
      
      $this->query('INSERT INTO user (FirstName, LastName, Email, Password) VALUES (:firstname, :lastname, :email, :password)');
      $this->bind(':firstname', $_POST['firstname']);
      $this->bind(':lastname', $_POST['lastname']);
      $this->bind(':email', $_POST['email']);
      $this->bind(':password', $password);
      $this->execute();
      
      if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'login');
			}
    }
    return;
  }
}