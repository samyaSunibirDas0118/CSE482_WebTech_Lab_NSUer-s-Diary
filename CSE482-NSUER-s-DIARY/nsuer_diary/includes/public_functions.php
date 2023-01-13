<?php 

//Returns all published posts

function getPublishedPosts() {
	// use global $conn object in function
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

// Receives a post id and returns topic of the post

function getPostTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

// Returns all posts under a topic

function getPublishedPostsByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE ps.id IN 
			(SELECT pt.post_id FROM post_topic pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']);
		if($post['published']==true){
			array_push($final_posts, $post);
		} 
	}
	return $final_posts;
}

// Returns topic name by topic id
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

//Returns a single post
function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug'";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}

// Returns all topics
function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}

/* COMMENTS*/

// Get all comments of that post
function getCommentsOfPost($post){
	global $conn;
	// Get comments of the post
	if($post){
		$comments_query_result = mysqli_query($conn, "SELECT * FROM comments WHERE post_id=" . $post['id'] . " ORDER BY created_at DESC");
		$comments = mysqli_fetch_all($comments_query_result, MYSQLI_ASSOC);
		return $comments;
	}
	else{
		return null;
	}
}
// Receives a user id and returns the username
function getUsernameById($id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT username FROM users WHERE id=" . $id . " LIMIT 1");
	// return the username
	return mysqli_fetch_assoc($result)['username'];
}
// Receives a post id and returns the total number of comments on that post
function getCommentsCountByPostId($post_id)
{
	global $conn;
	$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM comments");
	$data = mysqli_fetch_assoc($result);
	return $data['total'];
}

/* COMMENT Section */
// if user clicks the Submit Comment button
if (isset($_POST['submit_comment'])) { createComment($_POST); }

function createComment($request_values){
	global $conn;
	$post = getPost($_GET['post-slug']);
	$post_id = $post['id'];
	$body = htmlentities($request_values['comment_text']);
	$user_id = $_SESSION['user']['id'];

	$query = "INSERT INTO comments (user_id, post_id, body, created_at) VALUES($user_id, $post_id, '$body', now())";
	mysqli_query($conn, $query);			
}
/* MESSAGE Section */
// if user clicks the Submit Comment button
if (isset($_POST['submit_message'])) { createMessage($_POST); }

function createMessage($request_values){
	global $conn;
	$email = $_POST['email'];
	$body = htmlentities($request_values['message_text']);
	$query = "INSERT INTO messages (email, message) VALUES('$email', '$body')";
	
	if (mysqli_query($conn, $query)) {
		$_SESSION['message'] = "Message successfully sent";
		header("location: contact.php");
		exit(0);
	}
}
?>