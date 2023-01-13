<?php  include('./config.php'); ?>
<?php  include('./includes/registration_login.php'); ?>
<?php  include('./includes/head_section.php'); ?>
	<title>NSUER'S DIARY | Sign in </title>
</head>
<body>
<div class="container">
	<!-- Navbar -->
	<?php include('./includes/navbar.php'); ?>
	<!-- // Navbar -->

	<div class="register" style="width: 40%; margin: 20px auto;">
		<form method="post" action="login.php" >
			<h2>Login</h2>
			<?php include('./includes/errors.php') ?>
			<?php include('./includes/messages.php') ?>
			<input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" class="btn" name="login_btn">Login</button>
			<p>
				Not yet a member? <a href="./register.php">Sign up</a>
			</p>
		</form>
	</div>
</div>
<!-- // container -->

<!-- Footer -->
	<?php include('./includes/footer.php'); ?>
<!-- // Footer -->