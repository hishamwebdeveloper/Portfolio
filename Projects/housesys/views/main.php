<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/assets/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/assets/css/table.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/assets/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>/assets/css/datepicker.min.css"/>
		<script src="<?php echo ROOT_PATH;?>/assets/js/jquery-3.1.1.min.js"/></script>
		<script src="<?php echo ROOT_PATH;?>/assets/js/datepicker.min.js"/></script>
		<script src="<?php echo ROOT_PATH;?>/assets/js/table.js"></script>
	</head>
	<body>
		<header>
			<h2>Overview</h2>
			<nav id="side-navigation">
				<ul>
					<li>
						<a href="<?php echo ROOT_PATH; ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
					</li>
					<li>
						<a href="<?php echo ROOT_PATH; ?>employee"><i class="fa fa-user-o ifix" aria-hidden="true"></i>Employee</a>
					</li>
					<li>
						<a href="<?php echo ROOT_PATH; ?>house"><i class="fa fa-industry" aria-hidden="true"></i>House</a>
					</li>
					<li>
						<a href="<?php echo ROOT_PATH; ?>task"><i class="fa fa-tasks" aria-hidden="true"></i>Task</i></a>
					</li>
					<li>
						<a href="<?php echo ROOT_PATH; ?>salary"><i class="fa fa-money" aria-hidden="true"></i>Salary</a>
					</li>
				</ul>
			</nav>
		</header>
		<div id="content">
			<?php require($view); ?>
		</div>
	</body>
</html>