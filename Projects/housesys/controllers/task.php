<?php
class Task extends Controller{
	protected function Index(){
		$viewmodel = new TaskModel();
		$this->returnView($viewmodel->Index(), true);
	}
}