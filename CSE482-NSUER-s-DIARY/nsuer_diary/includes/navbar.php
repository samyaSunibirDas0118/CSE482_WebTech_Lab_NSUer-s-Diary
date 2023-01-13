<!-- navbar -->
<div class="navbar">
	<div class="logo_div">
		<a href="index.php"><h1>NSUER'S DIARY</h1></a>
	</div>
	<ul>
		<li><a class="active" href="index.php">Home</a></li>
		<li><a href="index.php#posts">Post</a></li>
		<?php if (isset($_SESSION['user']['username'])) { 
				if($_SESSION['user']['role'] == "Admin") {?>
					<li><a href="./admin/dashboard.php">Dashboard</a></li>
				<?php } else{ ?>
					<li><a href="./user/dashboard.php">Dashboard</a></li>
			<?php }
		}?>
		<li><a href="contact.php">Contact</a></li>
		<li><a href="search.php">Search</a></li>
	</div>
	</ul>
</div>
<!-- navbar end -->