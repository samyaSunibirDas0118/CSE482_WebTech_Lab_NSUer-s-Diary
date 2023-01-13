<?php require_once('config.php') ?>
<?php require_once('./includes/public_functions.php') ?>
<?php require_once('./includes/registration_login.php') ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<?php require_once('includes/head_section.php') ?>

<title>NSUER'S DIARY | Home </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
        <?php include('includes/navbar.php') ?>
        <!-- banner -->
        <?php include('includes/banner.php') ?>

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title" id="posts">Recent Posts</h2>
			<hr>
            <?php foreach ($posts as $post): ?>
	            <div class="post" style="margin-left: 0px;">
		            <img src="<?php echo './static/images/' . $post['image']; ?>" class="post_image" alt="">
		            <a href="./single_post.php?post-slug=<?php echo $post['slug']; ?>">
			        
                    <!-- Fetch topic name -->
                    <?php if (isset($post['topic']['name'])): ?>
			            <a href="<?php echo './filtered_posts.php?topic=' . $post['topic']['id'] ?>"class="btn category">
				        <?php echo $post['topic']['name'] ?>
			            </a>
		            <?php endif ?>

                    <div class="post_info">
				        <h3><?php echo $post['title'] ?></h3>
                        <div class="info">
					        <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					        <a href="./single_post.php?post-slug=<?php echo $post['slug']; ?>">
							<span class="read_more">Read more...</span>
				        </div>
			        </div>
		            </a>
	            </div>
            <?php endforeach ?>
		</div>
		<!-- Page content ends -->

    <!-- footer -->
<?php include('includes/footer.php') ?>