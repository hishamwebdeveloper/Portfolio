<?php
class TaskModel extends Model{
	public function Index()
	{
		$POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if(isset($POST['search']))
		{	
			$searchData = '%'.$POST['searchData'].'%';
			$this->query("SELECT * 
			FROM task t 
			INNER JOIN employee e 
			ON t.employeeid = e.employeeid
			INNER JOIN house h
			ON t.houseid = h.houseid
			WHERE e.employeefirstname LIKE :search OR e.employeelastname LIKE :search
			OR CONCAT(e.employeefirstname, ' ', e.employeelastname) LIKE :search
			OR t.taskdetails LIKE :search
			OR t.taskdate LIKE :search
			OR t.taskcost LIKE :search
			OR t.orderno LIKE :search
			OR h.houseno LIKE :search
			OR h.houselocation LIKE :search
			OR CONCAT(h.houseno, ' ', h.houselocation) LIKE :search");
			$this->bind(':search', $searchData);
			$rows['Task'] = $this->resultSet();
			
			//Retrieve data about employee
			$this->query("Select * FROM employee");
			$rows['Employee'] = $this->resultSet();
			
			//Retrieve data about house
			$this->query("Select * FROM house");
			$rows['House'] = $this->resultSet();
			
			return $rows;
		}
		
		if(isset($POST['advanceSearch']))
		{	
			$queryData = array();
			
			if($POST['employeeName'] != '')
			{
				$queryData[] = 'e.employeefirstname LIKE "%' . $POST['employeeName'] . '%" OR e.employeelastname LIKE "%' . $POST['employeeName'] . '%" OR CONCAT(e.employeefirstname, " ", e.employeelastname) LIKE "%' . $POST['employeeName'] . '%"';
			}
			
			if($POST['taskDetails'] != '')
			{
				$queryData[] = 't.taskDetails LIKE "%' . $POST['taskDetails'] . '%"';
			}
			
			if($POST['taskDate'] != '')
			{
				$queryData[] = 't.taskDate LIKE "%' . $POST['taskDate'] . '%"';
			}
			
			if($POST['taskCost'] != '')
			{
				$queryData[] = 't.taskCost LIKE "%' . $POST['taskCost'] . '%"';
			}
			
			if($POST['orderNo'] != '')
			{
				$queryData[] = 't.orderNo LIKE "%' . $POST['orderNo'] . '%"';
			}
			
			if($POST['houseName'] != '')
			{
				$queryData[] = 'h.houseno LIKE "%' . $POST['houseName'] . '%" OR h.houselocation LIKE "%' . $POST['houseName'] . '%" OR CONCAT(h.houseno, " ", h.houselocation) LIKE "%' . $POST['houseName'] . '%"';
			}
			
			
			if(count($queryData)>0)
			{
				$this->query('SELECT * 
				FROM task t 
				INNER JOIN employee e 
				ON t.employeeid = e.employeeid 
				INNER JOIN house h 
				ON t.houseid = h.houseid 
				WHERE ' . implode(' AND ', $queryData));
				$rows['Task'] = $this->resultSet();
				
				//Retrieve data about employee
				$this->query("Select * FROM employee");
				$rows['Employee'] = $this->resultSet();
		
				//Retrieve data about house
				$this->query("Select * FROM house");
				$rows['House'] = $this->resultSet();				
				
				return $rows;
			}
		}
		
		if(isset($POST['update']))
		{
			$this->query("UPDATE task SET employeeid = :employeeid, taskdetails = :taskdetails, taskdate = :taskdate, taskcost = :taskcost, orderno = :orderno, houseid = :houseid WHERE taskid = :taskid");
			$this->bind(":employeeid", $POST['employee']);
			$this->bind(":taskdetails", $POST['taskdetails']);
			$this->bind(":taskdate", $POST['taskdate']);
			$this->bind(":taskcost", $POST['taskcost']);
			$this->bind(":orderno", $POST['orderno']);
			$this->bind(":houseid", $POST['house']);
			$this->bind(":taskid", $POST['taskid']);
			$this->execute();
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'task');
			}
		}
		
		if(isset($POST['add']))
		{
			$this->query('INSERT INTO task (taskdetails, taskdate, taskcost, orderno, houseid, employeeid) VALUES (:taskdetails, :taskdate, :taskcost, :orderno, :houseid,:employeeid)');
			$this->bind(':taskdetails', $POST['addTaskDetails']);
			$this->bind(':taskdate', $POST['addTaskDate']);
			$this->bind(':taskcost', $POST['addTaskCost']);
			$this->bind(':orderno', $POST['addOrderNo']);
			$this->bind(':houseid', $POST['addHouseID']);
			$this->bind(':employeeid', $POST['addEmployeeID']);
			$this->execute();
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'task');
			}
		}
		
		if(isset($POST['delete']))
		{	
			if($POST['taskid'] == '')
			{
				return;
			}
		
			$this->query('DELETE FROM task WHERE (taskid = :taskid)');
			$this->bind(':taskid', $POST['taskid']);
			$this->execute();
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'task');
			}
		}
		
		//Retrieve data about employee
		$this->query("Select * FROM employee");
		$rows['Employee'] = $this->resultSet();
		
		//Retrieve data about house
		$this->query("Select * FROM house");
		$rows['House'] = $this->resultSet();
		
		/*$this->query('SELECT * FROM task, employee, house WHERE employee.employeeid = task.employeeid AND house.houseid = task.houseid');*/
		/*$this->query('SELECT * FROM task, house WHERE house.houseid = task.houseid');*/
		$this->query('SELECT * FROM task INNER JOIN house ON task.houseid = house.houseid LEFT JOIN employee ON task.employeeid = employee.employeeid');
		$rows["Task"] = $this->resultSet();
		
		return $rows;
	}
}