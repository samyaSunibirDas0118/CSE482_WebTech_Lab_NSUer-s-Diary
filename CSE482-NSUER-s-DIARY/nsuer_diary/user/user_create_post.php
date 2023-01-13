<?php  include('../config.php'); ?>
<?php  include( '../admin/admin_functions.php'); ?>
<?php  include('./includes/post_functions.php'); ?>
<?php  include('./includes/head_section.php'); ?>
<!-- Get all topics -->
<?php $topics = getAllTopics();	?>
	<title>USER | CREATE POST</title>

<?php if(isset($_SESSION['user'])){
	if($_SESSION['user']['role']=="admin"){
		$_SESSION['message'] = "You need to login as user";
		header('location: ../login.php');
	}
}else{
	$_SESSION['message'] = "You need to login as user";
	header('location: ../login.php');
} ?>

</head>
<body>
	<!-- user navbar -->
	<?php include('./includes/navbar.php') ?>

	<div class="container content" style="width: 96%;">
		<!-- Left side menu for user -->
		<?php include('./includes/menu.php') ?>

		<!-- Middle form - to create and edit  -->
		<div class="action create-post-div">
			<h1 class="page-title">Create/Edit Post</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo 'user_create_post.php'; ?>" >
				<!-- validation errors for the form -->
				<?php include('../includes/errors.php') ?>

				<!-- if editing post, the id is required to identify that post -->
				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>

				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
				<label style="float: left; margin: 5px auto 5px;">Featured image</label>
				<input type="file" name="featured_image" >
				<textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
				<select name="topic_id">
					<option value="" selected disabled>Choose topic</option>
					<?php foreach ($topics as $topic): ?>
						<option value="<?php echo $topic['id']; ?>">
							<?php echo $topic['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				
				<!-- if editing post, display the update button instead of create button -->
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn" name="update_post">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_post">Save Post</button>
				<?php endif ?>

			</form>
		</div>
		<!-- // Middle form - to create and edit -->
	</div>
<!-- Footer -->
<?php include('../includes/footer.php'); ?>
<!-- // Footer -->

<script>
	CKEDITOR.replace('body');
</script>