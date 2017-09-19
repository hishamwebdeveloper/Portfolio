<?php
class SalaryModel extends Model{
	public function Index()
	{	
		$POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	
		//Normal Search
		if(isset($POST['search']))
		{	
			$searchData = '%'.$POST['searchData'].'%';
			$this->query("SELECT * 
			FROM salary s 
			INNER JOIN employee e 
			ON s.employeeid = e.employeeid
			WHERE e.employeefirstname LIKE :search OR e.employeelastname LIKE :search OR CONCAT(e.employeefirstname, ' ', e.employeelastname) LIKE :search OR s.salaryid LIKE :search OR s.salarydate LIKE :search OR s.salarypay LIKE :search");
			$this->bind(':search', $searchData);
			$rows['Salary'] = $this->resultSet();
			//Retrieve data about task
			$this->query('SELECT * FROM task, house, salary WHERE task.salaryid = salary.salaryid AND task.houseid = house.houseid ORDER BY task.salaryid');
			$rows['Task'] = $this->resultSet();
			
			$this->query("Select * FROM employee");
			$rows['Employee'] = $this->resultSet();
			
			return $rows;
		}
		
		//Advanced Search
		if(isset($POST['advanceSearch']))
		{
			$queryData = array();
			
			if($POST['salaryDate'] != '')
			{
				$queryData[] = 's.salarydate LIKE "%' . $POST['salaryDate'] . '%"';
			}
			
			if($POST['salaryPay'] != '')
			{
				$queryData[] = 's.salarypay LIKE "%' . $POST['salaryPay'] . '%"';
			}
			
			if($POST['employeeName'] != '')
			{
				$queryData[] = 'e.employeefirstname LIKE "%' . $POST['employeeName'] . '%" OR e.employeelastname LIKE "%' . $POST['employeeName'] . '%" OR CONCAT(e.employeefirstname, " ", e.employeelastname) LIKE "%' . $POST['employeeName'] . '%"';
			}
			
			if(count($queryData)>0)
			{
				$this->query('SELECT * FROM salary s INNER JOIN employee e ON s.employeeid = e.employeeid WHERE ' . implode(' AND ', $queryData));
				$rows['Salary'] = $this->resultSet();
				
				//Retrieve data about task
				$this->query('SELECT * FROM task, house, salary WHERE task.salaryid = salary.salaryid AND task.houseid = house.houseid ORDER BY task.salaryid');
				$rows['Task'] = $this->resultSet();
				
				return $rows;
			}
		}
		
		//Add
		if(isset($POST['add']))
		{	
			try
			{
				$this->begin();
				$totalCost = 0;
				
				
				//Calculate Salary Pay
				foreach($POST['taskCost'] as $cost)
				{
					$totalCost = $totalCost + $cost;
				}

				//Insert salary
				$this->query('INSERT INTO Salary (SalaryPay, SalaryDate, EmployeeID) VALUES (:SalaryPay, :SalaryDate, :EmployeeID)');
				$this->bind(':SalaryPay', $totalCost);
				$this->bind(':SalaryDate', $POST['addSalaryDate']);
				$this->bind(':EmployeeID', $POST['addEmployeeID']);
				$this->execute();
				
				$salary = $this->lastInsertId();

				foreach($POST['taskid'] as $task)
				{
					//Insert task into salary FOR EACH
					$this->query('UPDATE task t SET t.salaryid = :salaryid WHERE taskid = :taskid'); 
					$this->bind(':salaryid', $salary);
					$this->bind(':taskid', $task);
					$this->execute();
				}
				
				$this->commit();
				
			}
			catch(PDOException $e)
			{
				$this->rollback();
				echo $e->getMessage();
			}
		}
		
		//Update
		if(isset($POST['update']))
		{	
			//Update
			$this->query('UPDATE salary SET salarydate = :salarydate WHERE salaryid = :salaryid');
			$this->bind(':salarydate', $POST['salarydate']);
			$this->bind(':salaryid', $POST['salaryID']);
			$this->execute();
		}
		
		//Delete
		if(isset($POST['delete']))
		{
			$this->query('DELETE FROM Salary WHERE (SalaryID = :SalaryID)');
			$this->bind(':SalaryID', $POST['salaryID']);
			$this->execute();
			
			// Redirect
			header('Location: '.ROOT_URL.'salary');
		}
		
		//Remove Task
		if(isset($POST['removeTask']))
		{
			if($POST['taskid'] == '')
			{
				return;
			}
			
			///Select salaryid from task
			$this->query("SELECT salaryid FROM task WHERE (taskid=:taskid)");
			$this->bind(':taskid', $POST['taskid']);
			$salaryid = $this->single();
			
			//Change salarypay
			$this->query('UPDATE salary SET salarypay = (salarypay-:taskCost) WHERE (salaryid=:salaryid)');
			$this->bind(':taskCost', $POST['taskCost']);
			$this->bind(':salaryid', $salaryid["salaryid"]);
			$this->execute();
		
			//Remove salaryid from task
			$this->query('UPDATE task SET salaryid = NULL WHERE (taskid = :taskid)');
			$this->bind(':taskid', $POST['taskid']);
			$this->execute();
		}
		
		
		//Retrieve data about employee
		$this->query("Select * FROM employee");
		$rows['Employee'] = $this->resultSet();
		//Retrieve SQL data about salary and employee
		$this->query('SELECT * FROM employee, salary WHERE employee.EmployeeID = salary.EmployeeID');
		$rows['Salary'] = $this->resultSet();
		//Retrieve data about task
		$this->query('SELECT * FROM task, house, salary WHERE task.salaryid = salary.salaryid AND task.houseid = house.houseid ORDER BY task.salaryid');
		$rows['Task'] = $this->resultSet();
		//echo ($rows['Data'][2]['EmployeeFirstName']);
		return $rows;
	}
	
	
	public function Ajax()
	{	
		if(isset($POST['employee']))
		{
			//Require model class
			$this->query("SELECT * FROM task WHERE employeeid=:employeeid AND task.salaryid IS NULL");
			$this->bind(':employeeid', $POST['employee']);
			$pass = $this->resultSet();
					
			die(json_encode($pass));
		}
		
		if(isset($POST['task']))
		{
			//Require model class
			$this->query("SELECT taskid, taskdate, taskcost, t.houseid, h.houseno, h.houselocation FROM task t, house h WHERE taskid = :taskid AND t.houseid = h.houseid;");
			$this->bind(':taskid', $POST['task']);
			$pass = $this->resultSet();
					
			die(json_encode($pass));
		}
	}
	
}