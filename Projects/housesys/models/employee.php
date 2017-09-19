<?php
class EmployeeModel extends Model{
	public function Index()
	{
		$POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if(isset($POST['search']))
		{	
			$searchData = '%'.$POST['searchData'].'%';
			$this->query("SELECT * FROM employee WHERE employee.employeefirstname LIKE :search OR employee.employeelastname LIKE :search");
			$this->bind(':search', $searchData);
			$rows = $this->resultSet();
			return $rows;
		}
		
		if(isset($POST['update']))
		{	
			$this->query("UPDATE employee SET employeefirstname = :employeefirstname, employeelastname = :employeelastname WHERE employeeid = :employeeid");
			$this->bind(":employeefirstname", $POST['employeefirstname']);
			$this->bind(":employeelastname", $POST['employeelastname']);
			$this->bind(":employeeid", $POST['employeeid']);
			$this->execute();
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'employee');
			}
		}
		
		if(isset($POST['add']))
		{	
			$this->query('INSERT INTO employee (employeefirstname, employeelastname) VALUES (:employeefirstname, :employeelastname)');
			$this->bind(':employeefirstname', $POST['addEmployeeFirstName']);
			$this->bind(':employeelastname', $POST['addEmployeeLastName']);
			$this->execute();
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'employee');
			}
		}
		
		if(isset($POST['delete']))
		{
			if($POST['employeeid'] == '')
			{
				return;
			}
		
			$this->query('DELETE FROM employee WHERE (employeeid = :employeeid)');
			$this->bind(':employeeid', $POST['employeeid']);
			$this->execute();
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'employee');
			}
		}
		
		$this->query('SELECT * FROM employee');
		$rows = $this->resultSet();
		return $rows;
	}
}