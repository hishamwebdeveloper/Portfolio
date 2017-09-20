<?php
class logout extends Controller {
  protected function Index() {
    unset($_SESSION['is_logged_in']);
    unset($_SESSION['UserData']);
    session_destroy();
    header('Location: ' . ROOT_URL);
  }
}