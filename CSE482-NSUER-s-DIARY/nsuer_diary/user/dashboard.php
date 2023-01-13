<?php  include('../config.php'); ?>
<?php  include( '../admin/admin_functions.php'); ?>
<?php  include('./includes/post_functions.php'); ?>
<?php include('./includes/head_section.php'); ?>

<title>DASHBOARD | USER</title>
<?php if(isset($_SESSION['user'])){
	if($_SESSION['user']['role']=="admin"){
		$_SESSION['message'] = "You need to login as user";
		header('location: ../login.php');
	}
}else{
	$_SESSION['message'] = "You need to login as user";
	header('location: ../login.php');
} ?>

<!-- Get user posts -->
<?php $posts = getAllPosts(); ?>
</head>
<body>
	<!-- user navbar -->
	<?php include('../user/includes/navbar.php') ?>
	<div class="logged_in_info">
		<span><?php echo $_SESSION['user']['username'] ?></span>
		| <span><a href="../logout.php" style="color: red;">Logout</a></span>
	</div>

	<div class="container content" style="width: 96%; text-align:center;">
		<!-- Left side menu for user -->
		<?php include('./includes/menu.php') ?>
		<h1>WELCOME <?php echo strtoupper($_SESSION['user']['username'])?></h1>

		<!-- Display records from DB-->
		<div class="table-div"  style="width: 60%; margin-left:10%">
			<!-- Display notification message -->
			<?php include('../includes/messages.php') ?>

			<?php if (empty($posts)): ?>
				<h2 style="text-align: center; margin-top: 20px; color:red">No Post Available. 
                        <br>Create post & share your thoughts</h2>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>Title</th>
						<th>Published?</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>
					<tbody>
					<?php foreach ($posts as $post): ?>
						<tr>
							<td>
								<a 	target="_blank"
								href="<?php echo '../single_post.php?post-slug=' . $post['slug'] ?>">
									<?php echo $post['title']; ?>	
								</a>
							</td>
							<td>
								<?php if ($post['published'] == true): ?>
									Published
								<?php else: ?>
									Unpublished
								<?php endif ?>
							</td>
							<td>
								<a class="fa fa-pencil btn edit"
									href="user_create_post.php?edit-post=<?php echo $post['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="user_create_post.php?delete-post=<?php echo $post['id'] ?>">
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
<!-- Footer -->
<?php include('../includes/footer.php'); ?>
<!-- // Footer -->