<?php require_once('config.php') ?>
<?php require_once('includes/head_section.php') ?>
<?php  include('./includes/public_functions.php'); ?>

<title>NSUER'S DIARY | CONTACT </title>

</head>
<body>
	<!-- navbar -->
    <?php include('includes/navbar.php') ?>
	
    <!-- Page content -->
    <div class="container content" style="width: 96%; text-align:center;">
        <?php if (isset($_SESSION['user']['username'])) { ?>
            <h2> Hello <?php echo ($_SESSION['user']['username']); ?> ! Facing any issue?
                <br> Let us know</h2><br> 
			<?php } else{ ?>
				<h2> Want to join us? <br>Send a message</h2><br>
		<?php }?>
        <?php include('./includes/messages.php') ?>

        <form action="contact.php" method="post" id="comment_form">
            <?php if (isset($_SESSION['user']['username'])) { ?>
                <input type="hidden" placeholder="Email" name="email" value="<?php echo ($_SESSION['user']['email']);?>" required style="width:40%;">
            <?php } else {?>
                <input type="email" placeholder="Email" name="email" required style="width:40%;">
            <?php }?>  
			<textarea style="display:block; margin-left:auto; margin-right:auto; width:40% " 
                name="message_text" id="comment_text" class="form-control" rows="10" required></textarea>
            <button style="display:block; margin-left:auto; margin-right:auto" class="btn btn-primary btn-sm pull-right" 
                name="submit_message" id="submit_comment" type="submit">Send Message</button>
		</form>
        
        <div style="width: 100%; margin-top:3%; font-family: 'Averia Serif Libre', cursive;">
                <span><h2>Contact Developers</h2></span> <br/>
                <span><h3><a href="https://nazmulhasan7.github.io/Portfolio/">NAZMUL HASAN</a></h3></span><br/>
                <span><h3><a href="https://github.com/samyaSunibirDas0118">SAMYA SUNIBIR DAS</a></h3></span>
        </div>
	</div>
	<!-- Page content ends -->

<!-- footer -->
<?php include('includes/footer.php') ?>