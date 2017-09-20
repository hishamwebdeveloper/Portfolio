<?php
class contact extends Controller {
  protected function Index() {
    $viewmodel = new HomeModel();
    $this->returnView($viewmodel->Index());
  }
}