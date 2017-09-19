<?php
class Employee extends Controller{
	protected function Index(){
		$viewmodel = new EmployeeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}