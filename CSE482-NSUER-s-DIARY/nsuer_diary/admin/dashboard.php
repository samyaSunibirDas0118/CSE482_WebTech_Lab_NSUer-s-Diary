<?php  include('../config.php'); ?>
	<?php include('../admin/admin_functions.php'); ?>
	<?php include('../admin/includes/head_section.php'); ?>
	<title>Admin | Dashboard</title>

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
	<div class="container dashboard">
		<h1>Welcome <?php echo $_SESSION['user']['username']?></h1>
		<?php
			$user_count = $admin_count = $nuser_count = 0;
			$post_count = $published_count = $unpublished_count = 0;
			$message_count = $comment_count = 0;
			
			// User Count
			$sql = "SELECT * from users";
			if($result = mysqli_query($conn, $sql)) {
				$user_count = mysqli_num_rows( $result );
			}
			$sql = "SELECT * from users WHERE role LIKE 'Admin'";
			if($result = mysqli_query($conn, $sql)) {
				$admin_count = mysqli_num_rows( $result );
			}
			$sql = "SELECT * from users WHERE role <> 'Admin' OR role IS NULL";
			if($result = mysqli_query($conn, $sql)) {
				$nuser_count = mysqli_num_rows( $result );
			}

			// Post Count
			$sql = "SELECT * from posts";
			if($result = mysqli_query($conn, $sql)) {
				$post_count = mysqli_num_rows( $result );
			}
			$sql = "SELECT * from posts WHERE published = 0";
			if($result = mysqli_query($conn, $sql)) {
				$unpublished_count = mysqli_num_rows( $result );
			}
			$sql =  "SELECT * from posts WHERE published = 1";
			if($result = mysqli_query($conn, $sql)) {
				$published_count = mysqli_num_rows( $result );
			}

			// Comment Count
			$sql = "SELECT * from comments";
			if($result = mysqli_query($conn, $sql)) {
				$comment_count = mysqli_num_rows( $result );
			}

			// Message Count
			$sql = "SELECT * from messages";
			if($result = mysqli_query($conn, $sql)) {
				$message_count = mysqli_num_rows( $result );
			}
		?>
		<div class="stats">
			<a href="./users.php" class="first">
				<span>Total user : <?php echo $user_count; ?> </span> <br>
				<span>Admin : <?php echo $admin_count; ?></span> | 
				<span>User : <?php echo $nuser_count; ?></span>
			</a>
			<a href="./posts.php">
				<span>Total Posts : <?php echo $post_count; ?></span> <br>
				<span>Published : <?php echo $published_count; ?> </span> |
				<span>Unpublished : <?php echo $unpublished_count; ?></span>
			</a>
			<a href="./messages.php">
				<span>Total Comments & Messages:  <?php echo $comment_count + $message_count; ?></span> <br>
				<span>Comments: <?php echo $comment_count; ?></span> |
				<span>Messages: <?php echo $message_count; ?></span>
			</a>
		</div>
		<br><br><br>
		<div class="buttons">
			<a href="./users.php">Manage Users</a>
			<a href="./posts.php">Manage Posts</a>
			<a href="./messages.php">Messages</a>
		</div>
	</div>
</body>
</html>