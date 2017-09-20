<?php
class about extends Controller {
  protected function Index() {
    $viewmodel = new HomeModel();
    $this->returnView($viewmodel->Index());
  }
}