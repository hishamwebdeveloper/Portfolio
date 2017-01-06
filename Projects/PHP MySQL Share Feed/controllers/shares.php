<?php
class Shares extends Controller {
  protected function Index() {
    $viewmodel = new SharesModel();
    $this->returnView($viewmodel->Index(), true);
  }
  
  protected function Add() {
    if(!isset($_SESSION['is_logged_in'])) {
      header('Location: ' . ROOT_URL . 'shares');
    }
    $viewmodel = new SharesModel();
    $this->returnView($viewmodel->Add(), false);
  }
}