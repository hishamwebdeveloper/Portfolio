<h1><i class="fa fa-user-o ifix" aria-hidden="true"></i>Employees</h1>
			
<div class="content-box">

	<h2>Employee Table</h2>

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

	<table class="datasheet">
		<thead>
			<th></th>
			<th>First Name &#178</th>
			<th>Last Name</th>
			<th>Actions</th>
		</thead>
		
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<tbody>
				<tr class="database-data">
					<th class="num"> </th>
					<td>
						<input value="" name="addEmployeeFirstName" type="text">
					</td>
					<td>
						<input value="" name="addEmployeeLastName" type="text">
					</td>
					<td>
						<button type="submit" name="add" class="done-edit" value="Submit"><i class="fa fa-floppy-o action-style"></i></button>
					</td>
				</tr>
			</tbody>
		</form>
		
		<?php $count = 1 ?>
		<?php foreach($viewmodel as $rows) : ?>
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<tbody>
				<tr class="database-data">
					<th class="num"><?php echo $count; ?></th>
					<td>
						<input value="<?php echo $rows["employeefirstname"]; ?>" name="employeefirstname" size="13" type="text" disabled>
					</td>
					<td>
						<input value="<?php echo $rows["employeelastname"]; ?>" name="employeelastname" size="13" type="text" disabled>
					</td>
					<input type="hidden" name="employeeid" value="<?php echo $rows["employeeid"]?>">
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