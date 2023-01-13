<?php  include('../config.php'); ?>
<?php  include('../admin/admin_functions.php'); ?>
<?php include('../admin/includes/head_section.php'); ?>

<!-- Get all topics from DB -->
<?php $topics = getAllTopics();	?>
	<title>Admin | Manage Topics</title>

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

		<!-- Middle form - to create and edit -->
		<div class="action create-topic-div">
			<h1 class="page-title">Create/Edit Topics</h1>
			<form method="post" action="<?php echo '../admin/topics.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include('../includes/errors.php') ?>
				<!-- if editing topic, the id is required to identify that topic -->
				<?php if ($isEditingTopic === true): ?>
					<input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
				<?php endif ?>
				<input type="text" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Topic">
				<!-- if editing topic, display the update button instead of create button -->
				<?php if ($isEditingTopic === true): ?> 
					<button type="submit" class="btn" name="update_topic">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_topic">Save Topic</button>
				<?php endif ?>
			</form>
		</div>
		<!-- // Middle form - to create and edit -->

		<!-- Display records from DB -->
		<div class="table-div">
			<!-- Display notification message -->
			<?php include('../includes/messages.php') ?>
			<?php if (empty($topics)): ?>
				<h1>No topics in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>Topic Name</th>
						<th colspan="2">Action</th>
					</thead>
					<tbody>
					<?php foreach ($topics as $topic): ?>
						<tr>
							<td><?php echo $topic['name']; ?></td>
							<td>
								<a class="fa fa-pencil btn edit"
									href="topics.php?edit-topic=<?php echo $topic['id'] ?>">
								</a>
							</td>
							<td>
								<a class="fa fa-trash btn delete"								
									href="topics.php?delete-topic=<?php echo $topic['id'] ?>">
								</a>
							</td>
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