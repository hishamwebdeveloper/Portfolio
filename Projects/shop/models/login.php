<?php
class LoginModel extends Model {
  public function Index() {
    
    if (isset($_POST['login']))
    {
      $password = md5($_POST['password'] . 'salt');
      
      $this->query('SELECT * FROM user WHERE Email = :email and Password = :password');
      $this->bind(':email', $_POST['email']);
      $this->bind(':password', $password);
      
      $row = $this->resultSingle();
      
      if($row) {
        $_SESSION['is_logged_in'] = true;
				$_SESSION['UserData'] = array( 
          "UserId" => $row['UserId'],
					"FirstName"	=> $row['FirstName'],
					"LastName"	=> $row['LastName'],
					"Email"	=> $row['Email']
        );
        header('Location: ' . ROOT_URL); 
      }
      else
      {
        echo "Incorrect Login.";
      }
    }
  }
}