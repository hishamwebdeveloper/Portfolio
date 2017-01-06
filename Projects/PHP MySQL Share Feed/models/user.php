<?php
class UserModel extends Model {
  public function register() {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //Encrypt password with salt
		$password = md5($post['password'] . 'salt');

		if($post['register']){
			if($post['firstname'] == '' || $post['lastname'] == '' || $post['email'] == '' || $post['password'] == ''){
				echo 'Please Fill In All Fields';
				return;
			}

			// Insert into MySQL
			$this->query('INSERT INTO user (FirstName, LastName, Email, Password) VALUES (:firstname, :lastname, :email, :password)');
			$this->bind(':firstname', $post['firstname']);
      $this->bind(':lastname', $post['lastname']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'user/login');
			}
		}
		return;
  }
  
  public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password'] . 'salt');

		if($post['login']){
			// Compare Login
			$this->query('SELECT * FROM user WHERE email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['UserData'] = array( 
          "UserId" => $row['UserId'],
					"FirstName"	=> $row['FirstName'],
					"LastName"	=> $row['LastName'],
					"Email"	=> $row['Email']
				);
				header('Location: '. ROOT_URL . 'shares');
			} else {
				echo 'Incorrect Login';
			}
		}
		return;
	}
}

