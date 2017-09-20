<?php
abstract class Controller {
  protected $action;
  protected $request;
  
  public function __construct($action, $request) {
    $this->action = $action;
    $this->request = $request;
  }
  
  public function executeAction() {
    return $this->{($this->action)}();
  }
  
  protected function returnView($viewmodel) {
    $view = 'views/' . get_class($this) . '/' . $this->action . '.php';
    require($view);
  }
}