<?php
class register extends Controller {
  protected function Index() {
    $viewmodel = new RegisterModel();
    $this->returnView($viewmodel->Index());
  }
}