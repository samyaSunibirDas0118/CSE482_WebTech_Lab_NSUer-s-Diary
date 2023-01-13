<div class="header">
	<div class="logo">
		<a href="<?php echo '../admin/dashboard.php' ?>">
			<h1>NSUER'S DIARY | Admin</h1>
		</a>
	</div>
	<div class="user-info">
		<span><?php echo $_SESSION['user']['username']?></span>
		| <a href="<?php echo '../index.php'; ?>" class="logout-btn">Home</a>
		| <a href="<?php echo '../logout.php'; ?>" class="logout-btn">Logout</a>
	</div>
</div>