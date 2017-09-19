<?php
class HouseModel extends Model{
	public function Index()
	{
		$POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		if(isset($POST['search']))
		{
			$searchData = '%'.$POST['searchData'].'%';
			$this->query("SELECT * FROM house WHERE house.houseid LIKE :search OR house.houseno LIKE :search OR house.houselocation LIKE :search OR house.housesize LIKE :search");
			$this->bind(':search', $searchData);
			$rows = $this->resultSet();
			return $rows;
		}
		
		if(isset($POST['update']))
		{
			$this->query("UPDATE house SET houseno = :houseno, houselocation = :houselocation, housesize = :housesize WHERE houseid = :houseid");
			$this->bind(":houseno", $POST['houseno']);
			$this->bind(":houselocation", $POST['houselocation']);
			$this->bind(":housesize", $POST['housesize']);
			$this->bind(":houseid", $POST['houseid']);
			$this->execute();
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'house');
			}
		}
		
		if(isset($POST['add']))
		{
			$this->query('INSERT INTO house (houseno, houselocation, housesize) VALUES (:houseno, :houselocation, :housesize)');
			$this->bind(':houseno', $POST['addHouseNo']);
			$this->bind(':houselocation', $POST['addHouseLocation']);
			$this->bind(':housesize', $POST['addHouseSize']);
			$this->execute();
			if($this->lastInsertId()){
				//Redirect
				header('Location: '.ROOT_URL.'house');
			}
		}
		
		if(isset($POST['delete']))
		{
			if($POST['houseid'] == '')
			{
				return;
			}
		
			$this->query('DELETE FROM house WHERE (houseid = :houseid)');
			$this->bind(':houseid', $POST['houseid']);
			$this->execute();
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'house');
			}
		}
		
		$this->query('SELECT * FROM house');
		$rows = $this->resultSet();
		return $rows;
	}
}