<?php require_once('config.php') ?>
<?php require_once('includes/head_section.php') ?>

<title>NSUER'S DIARY | SEARCH </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
        <?php include('includes/navbar.php') ?>

		<!-- Page content -->
		<div class="content">
            <form method="GET" action="<?php echo 'search.php'; ?>" style="display:flex; justify-content:center">
                <input type="text" placeholder="Search by post title" required style="width: 50%; 
                    height:min-content; margin:0px;" name="search"
                    value="<?php if (isset($_GET['search'])){echo $_GET['search'];}?>">
                <button type="submit" class="btn" id="search_btn">Search</button>
            </form>   
            
            <?php 
            $found_posts = [];
            global $conn;

            if (isset($_GET['search'])){ 
                $search_text = $_GET['search'];
                $sql = "SELECT * FROM posts WHERE title LIKE '%$search_text%' AND published=true";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0)
                {
                    foreach($result as $item)
                    {
                        array_push($found_posts, $item);
                    }
                }
            }
            ?>
			<h2 class="content-title" id="posts">Matched Results For: 
                <?php if (isset($_GET['search'])){echo $_GET['search'];}?></h2>
			<hr>
            <?php if($found_posts): ?>
                    <?php foreach ($found_posts as $post): ?>
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
                <?php elseif (isset($_GET['search'])): ?>
                    <h2 class="content-title" id="posts" style="color:red">No match found</h2>
            <?php endif?>
		</div>
		<!-- Page content ends -->

    <!-- footer -->
<?php include('includes/footer.php') ?>