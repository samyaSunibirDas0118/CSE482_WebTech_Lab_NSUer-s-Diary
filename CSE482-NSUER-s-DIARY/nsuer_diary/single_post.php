<?php  include('./config.php'); ?>
<?php  include('./includes/public_functions.php'); ?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
		$comments = getCommentsOfPost($post);
	}
	$topics = getAllTopics();
?>
<?php include('./includes/head_section.php'); ?>
<title> <?php echo $post['title'] ?> | NSUER'S DIARY</title>

</head>
<body>
<div class="container">
	<!-- Navbar -->
		<?php include('./includes/navbar.php'); ?>
	<!-- // Navbar -->
	
	<div class="content" >
		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
			<?php if ($post['published'] == false): ?>
				<h2 class="post-title" style="color: red;">This post is not published yet</h2>
			<?php endif ?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<img src="<?php echo './static/images/' . $post['image']; ?>" class="post-image" alt="Image Not Found">
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
				
				<!--Post author & creation date-->
				<?php 
					$post_userid = $post['user_id'];
					$date = $post['created_at'];
					$username = getUsernameById($post_userid);
				?>
				<h4 class="post-title">Author: <?php echo $username; ?></h4>
				<h4 class="post-title">Posted On: <?php echo $date; ?></h4>
			</div>
			<!-- // full post div -->

			<!-- Comment -->
			<?php if ($post['published'] == true): ?>
				<div class="col-md-6 col-md-offset-3 comments-section">
				<!-- if user is not signed in, asks to sign in -->
				<?php if (isset($_SESSION['user']['id'])){
						$user_id = $_SESSION['user']['id'];
					} ?>
				<?php if (isset($user_id)): ?>
					<h3 class="text-center">Post a comment</h3>
					<form class="clearfix" action="single_post.php?post-slug=<?php echo $post['slug']; ?>" method="post" id="comment_form">
						<textarea name="comment_text" id="comment_text" class="form-control" cols="50" rows="5" required></textarea>
						<button class="btn btn-primary btn-sm pull-right" name="submit_comment" id="submit_comment" type="submit">Submit Comment</button>
					</form>
				<?php else: ?>
					<div class="well" style="margin-top: 20px;">
						<h3 class="text-center"><a href="login.php">Sign in</a> to post a comment</h3>
					</div>
				<?php endif ?>

				<!-- Display total number of comments on this post  -->
				<h3><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h3>
					<!-- comments wrapper -->
					<div id="comments-wrapper">
					<?php if (isset($comments)): ?>
						<!-- Display comments -->
						<?php foreach ($comments as $comment): ?>
						<!-- comment -->
						<div class="comment">
							<img src="./static/images/profile_icon.png" alt="" class="profile_pic">
							<div class="comment-details">
								<span class="comment-name"><?php echo getUsernameById($comment['user_id']) ?></span>
								<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
								<p><?php echo $comment['body']; ?></p>
							</div>
						</div>
						<!-- // comment -->
						<?php endforeach ?>
					<?php else: ?>
						<h2>Be the first to comment on this post</h2>
					<?php endif ?>
					</div><!-- comments wrapper -->
				</div><!-- // all comments -->
			<?php endif ?>
		</div>
		<!-- // Page wrapper -->

		<!-- post sidebar -->
		<div class="post-sidebar">
			<div class="card">
				<div class="card-header">
					<h2>Topics</h2>
				</div>
				<div class="card-content">
					<?php foreach ($topics as $topic): ?>
						<a 
							href="<?php echo './filtered_posts.php?topic=' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!-- // post sidebar -->
	</div>
</div>
<!-- // content -->

<!-- Footer -->
<?php include('./includes/footer.php'); ?>
<!-- // Footer -->