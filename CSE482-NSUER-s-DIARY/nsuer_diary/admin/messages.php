<?php  include('../config.php'); ?>
<?php  include('../admin/admin_functions.php'); ?>
<?php include('../admin/includes/head_section.php'); ?>

<!-- Get all topics from DB -->
<?php
    global $conn;
    $query = "SELECT * FROM messages";
    $result = mysqli_query($conn, $query);
	$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
	<title>Admin | Messages</title>

<?php if(isset($_SESSION['user'])){
	if($_SESSION['user']['role']==""){
		header('location: ../login.php');
	}
}else{
	$_SESSION['message'] = "You need to login as admin";
	header('location: ../login.php');
} ?>

</head>
<body>
	<!-- admin navbar -->
	<?php include('../admin/includes/navbar.php') ?>
	<div class="container content">
		<!-- Left side menu -->
		<?php include('../admin/includes/menu.php') ?>

		<!-- Display records from DB -->
		<div class="table-div" style="width: 70%;">
			<?php if (empty($messages)): ?>
				<h1>No message in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>Email</th>
						<th>Message</th>
					</thead>
					<tbody>
					<?php foreach ($messages as $message): ?>
						<tr>
							<td><?php echo $message['email']; ?></td>
							<td><?php echo $message['message']; ?></td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->
	</div>
</body>
</html>