<?php
class Salary extends Controller{
	protected function Index(){
		$viewmodel = new SalaryModel();
		$this->returnView($viewmodel->Index(), true);
	}
	
	protected function ajaxsalary() 
	{	
		$viewmodel = new SalaryModel();
		$this->returnView($viewmodel->Ajax(), true);
	}
}