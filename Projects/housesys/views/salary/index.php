<h1><i class="fa fa-money" aria-hidden="true"></i>Salary</h1>
<div class="content-box">

	<h2>Salary Table</h2>

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
			<span>Salary Date</span>
			<input type="text" name="salaryDate">
			<span>Salary Pay</span>
			<input type="text" name="salaryPay">
			<button type="submit" name="advanceSearch" class="done-edit" value="advanceSearch">Advance Search</button>
		</form>
	</div>
			
	<form class="connect" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<table class="datasheet">
			<thead>
				<th></th>
				<th>Employee Name</th>
				<th>Salary Date</th>
				<th>Salary Pay</th>
				<th>Actions</th>
			</thead>
			<tbody>
				<tr class="database-data">
					<th class="num"> </th>
					<td>
						<select name="addEmployeeID" id="emp">
							<option selected>Select Employee</option>
							<?php foreach($viewmodel['Employee'] as $rows) : ?>
								<option value="<?php echo $rows['employeeid']?>"><?php echo $rows['employeefirstname'] . " " . $rows["employeelastname"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
					<td>
						<input value="" class="date" name="addSalaryDate" type="text">
					</td>
					<td>
						<span>Rp </span>
						<input value="0" name="addSalaryPay" type="text">
					</td>
					<td>
						<button type="submit" name="add" id="add" class="done-edit" value="Submit"><i class="fa fa-floppy-o action-style"></i></button>
						<button class="addition"><i class="fa fa-plus action-style"></i></button>
					</td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th></th>
					<th>Task Details</th>
					<th>Task Date</th>
					<th>Task Cost</th>
					<th>House</th>
				</tr>
			</thead>
			<tbody>	
				<tr class="createTask">
					<th class="num">-</th>
					<td>
						<select name="taskDetails[]" class="task">
						</select>
					</td>
					<td>
						<input value="" name="taskDate[]" type="text" class="permaDisabled" disabled/>
					</td>
					<td>
						<input value="" name="taskCost[]" type="text"/>
					</td>
					<td>
						<select name="taskHouse[]">
						</select>
					</td>
					<input value="" name="taskid[]" type="hidden">
				</tr>
			</tbody>
		</table>
	</form>	
		<!-- Salary Data -->
		<?php $count = 1 ?>
		<?php foreach($viewmodel["Salary"] as $rows) : ?>
		<form class="connect" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<table class="datasheet">
				<thead>
					<th class="empty"></th>
					<th>Employee Name</th>
					<th>Salary Date</th>
					<th>Salary Pay</th>
					<th>Actions</th>
				</thead>
				<tbody>
					<tr>
						<th class="num"><?php echo $count ?></th>
						<td class="col-25">
							<input value="<?php echo $rows["employeefirstname"] . " " . $rows["employeelastname"] ?>" type="text" class="permaDisabled" disabled>
						</td>
						<td class="col-25">
							<input value="<?php echo $rows["salarydate"]?>" type="text" name="salarydate" disabled>
						</td>
						<td class="col-25">
							<input value="<?php echo "Rp " . $rows["salarypay"]?>" type="text" class="permaDisabled" disabled>
						</td>
						<input type="hidden" name="salaryID" value="<?php echo $rows["salaryid"]?>">
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
			</table>
		</form>
		

		<!-- Task in Salary -->
		<?php if($viewmodel['Task'] && $rows["salaryid"]==$viewmodel['Task'][0]['salaryid']) : ?>
			<?php $sum=0; ?>
				<?php while($viewmodel['Task'] && $rows["salaryid"]==$viewmodel["Task"][0]["salaryid"]) :?>
					<form class="connect" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
						<table class="datasheet">
							<thead>
								<th class="empty"></th>
								<th>Task Details</th>
								<th>Task Date</th>
								<th>Task Cost</th>
								<th>House</th>
								<th>Actions</th>
							</thead>
							<tbody>
								<tr>
									<th class="num">-</th>
									<td class="col-25">
										<input value="<?php echo $viewmodel["Task"][0]["taskdetails"]?>" type="text" readonly="readonly">
									</td>
									<td class="col-25">
										<input value="<?php echo $viewmodel["Task"][0]["taskdate"] ?>" type="text" readonly="readonly">
									</td>
									<td class="col-25">
										<span>Rp</span>
										<input value="<?php echo $viewmodel["Task"][0]["taskcost"] ?>" name="taskCost" type="text" readonly="readonly">
									</td>
									<td>
										<input value="<?php echo $viewmodel["Task"][0]["houseno"] . " " . $viewmodel["Task"][0]["houselocation"] ?>" size="13" type="text" readonly="readonly">
									</td>
										<input type="hidden" name="taskid" value="<?php echo $viewmodel["Task"][0]["taskid"]?>">
									<td>
										<button type="submit" name="removeTask" value="Submit"><i class="fa fa-trash-o action-style"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
					<?php $sum += $viewmodel["Task"][0]["taskcost"]; ?>
					<?php 
					if (sizeof($viewmodel["Task"]>1)) 
					{ 
						array_shift($viewmodel["Task"]);
					} 
					else
					{
						unset($viewmodel["Task"]);
					}
					?>
				<?php endwhile; ?>
			
			
			
		<table class="datasheet">
			<thead>
				<tr>
					<th class="empty"></th>
					<th></th>
					<th></th>
					<th>Total Cost</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th class="num"></th>
					<td class="col-25">
					</td>
					<td class="col-25">
					</td>
					<td class="col-25">
						<span>Rp <?php echo $sum ?></span>
					</td>
					<td>
					</td>
				</tr>
			</tbody>
		<?php endif; ?>
		<?php $count = $count+1; ?>
		<?php endforeach; ?>
		</table>
</div>