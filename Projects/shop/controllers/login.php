<?php
class login extends Controller {
  protected function Index() {
    $viewmodel = new LoginModel();
    $this->returnView($viewmodel->Index());
  }
}