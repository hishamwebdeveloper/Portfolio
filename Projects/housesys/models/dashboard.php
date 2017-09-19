<?php
class DashboardModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM employee');
		$rows = $this->resultSet();
		return $rows;
	}
}