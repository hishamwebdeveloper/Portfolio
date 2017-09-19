<h1><i class="fa fa-tasks" aria-hidden="true"></i>Task</h1>
<div class="content-box">

	<h2>Task Table</h2>

	<div class="search">
		<div class="left-search">
			<span>Show</span>
			<select>
				<option value="10">10</option>
				<option value="10">20</option>
				<option value="10">30</option>
				<option value="10">40</option>
				<option value="10">50</option>
			</select>
			<span>entries</span>
		</div>

		<div class="right-search">
			<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
				<input type="text" name="searchData" placeholder="Search..">
				<button type="submit" name="search" class="done-edit" value="Search">Search</button>
			</form>
		</div>
	</div>
	
	<div class="filter">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<span>Employee Name</span>
			<input type="text" name="employeeName">
			<span>Task Details</span>
			<input type="text" name="taskDetails">
			<span>Task Date</span>
			<input type="text" name="taskDate">
			<span>Task Cost</span>
			<input type="text" name="taskCost">
			<span>Order No</span>
			<input type="text" name="orderNo">
			<span>House</span>
			<input type="text" name="houseName">
			<button type="submit" name="advanceSearch" class="done-edit" value="advanceSearch">Advance Search</button>
		</form>
	</div>
	

	<table class="datasheet">
		<thead>
			<th></th>
			<th>Employee Name</th>
			<th>Task Details</th>
			<th>Task Date</th>
			<th>Task Cost</th>
			<th>Order No</th>
			<th>House</th>
			<th>Actions</th>
		</thead>
		
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<tbody>
				<tr class="database-data">
					<th class="num"> </th>
					<td>
						<select name="addEmployeeID">
							<?php foreach($viewmodel['Employee'] as $rows) : ?>
								<option value="<?php echo $rows['employeeid']?>"><?php echo $rows['employeefirstname'] . " " . $rows["employeelastname"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
					
					<td>
						<input value="" name="addTaskDetails" type="text">
					</td>
					<td>
						<input value="" class="date" name="addTaskDate" type="text">
					</td>
					<td>
						<input value="" name="addTaskCost" type="text">
					</td>
					<td>
						<input value="" name="addOrderNo" type="text">
					</td>
					<td>
						<select name="addHouseID">
							<?php foreach($viewmodel['House'] as $rows) : ?>
								<option value="<?php echo $rows['houseid']?>"><?php echo $rows['houselocation'] . " " . $rows["houseno"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
					
					<td>
						<button type="submit" name="add" class="done-edit" value="Submit"><i class="fa fa-floppy-o action-style"></i></button>
					</td>
				</tr>
			</tbody>
		</form>
		
		<?php $count = 1 ?>
		<?php foreach($viewmodel["Task"] as $rows) : ?>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<tbody>
				<tr class="database-data">
					<th class="num"><?php echo $count; ?></th>
					<td>
						<select name="employee" disabled>
							<?php foreach($viewmodel['Employee'] as $employees) : ?>
								<option value="<?php echo $employees['employeeid']?>"<?php if($employees['employeeid']==$rows['employeeid'])echo " selected"?>><?php echo $employees['employeefirstname'] . " " . $employees["employeelastname"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
					<td>
						<input value="<?php echo $rows["taskdetails"] ?>" name="taskdetails" type="text" disabled>
					</td>
					<td>
						<input value="<?php echo $rows["taskdate"] ?>" name="taskdate" type="text" disabled>
					</td>
					<td>
						<input value="<?php echo $rows["taskcost"] ?>" name="taskcost" type="text" disabled>
					</td>
					<td>
						<input value="<?php echo $rows["orderno"] ?>" name="orderno" type="text" disabled>
					</td>
					<td>
						<select name="house" disabled>
							<?php foreach($viewmodel['House'] as $houses) : ?>
								<option value="<?php echo $houses['houseid']?>"<?php if($houses['houseid']==$rows['houseid'])echo " selected"?>><?php echo $houses['houselocation'] . " " . $houses["houseno"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
						<input type="hidden" name="taskid" value="<?php echo $rows["taskid"]?>">
					<td>
						<div class="options">
							<button class="change"><i class="fa fa-pencil-square-o action-style"></i></button>
							<button type="submit" name="delete" class="cancel-edit" value="Submit"><i class="fa fa-trash-o action-style"></i></button>
						</div>
						<div class="confirmation">
							<button type="submit" name="update" class="edit" value="Submit"><i class="fa fa-check action-style"></i></button>
							<button class="change"><i class="fa fa-times action-style"></i></button>
						</div>
					</td>
				</tr>
			</tbody>
		</form>
		<?php $count = $count+1; ?>
		<?php endforeach; ?>
	</table>
	
</div>