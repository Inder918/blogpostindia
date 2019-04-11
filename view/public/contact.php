<?php
	require_once "../../includes/html/header.php";
?>
<style type="text/css">
.row-margin{margin: 0px 15px;}
.input-style{
	margin: 24px 10px;
	width: 98%;
}

.input-style2{
	margin: 20px 22px;
	width: 92%;
}

.input-control{
	background:transparent;
	border-right: 0px;
	border-left:0px;
	border-top: 0px; 
	outline:none;
	color:#000;
	padding: 5px 0px; 
}

.input-btn{
	float: right;
	margin: 5px 40px;
	margin-bottom: 25px;
}
</style>
<script type="text/javascript">
	$(".background-image").css({"background-image":"linear-gradient(to right, rgb(172,30,130), rgb(222,52,114))", "background-size":"100% 100%"});
	$(".header-title").html("Contact Us");
	function thanks(){alert("THANKYOU FOR YOUR FEEDBACK!!");}
</script>
<div class="container">
	<h1 class="text-center text-blue">Contact Us</h1><br>
	<h3 class="text-center ">Have any questions? We'd love to hear from you. Here's how to get in touch with us</h3>
	<div class="col-md-6"><br><br>
		<h3 style="opacity: .6">Your questions are important for us</h3><br>
		<h4 style="opacity: .6">Send us email: </h4><p>vipnextgenration@yahoo.com</p><br>
		<h4 style="opacity: .6">Find us on: </h4><p><a href="#" target="_blank"><img src="https://blogpostindia.com/Assets/images/fb-icon.svg" width="35px" height="35px"></a> <a href="#"><img src="https://blogpostindia.com/Assets/images/tw-icon.svg" width="35px" height="35px"></a> <a href="#"><img src="https://blogpostindia.com/Assets/images/insta-icon.svg" width="35px" height="35px"></a></p><br>
	</div>
	<div class="col-md-6"><br><br><br>
		<form action="https://blogpostindia.com/middelware/admin/userFeedback" method="post">
					<div class="row row-margin">
						<div class="col-md-6">
							<input type="text" name="name" placeholder="your name*" class="input-control input-style" required>
						</div>
						<div class="col-md-6">
							<input type="text" name="Email" placeholder="your Email*" class="input-control input-style" required>
						</div>
					</div>
					<div class="row row-margin">
						<input type="text" name="subject" placeholder="subject" class="input-control input-style2" required>
					</div>
					<div class="row row-margin">
						<textarea rows="10" cols="10" name="comment" placeholder="your Comment.."  class="input-control input-style2" style="resize: none;" required></textarea>
					</div>
					<div class="row">
						<input type="submit" name="submit" class="btn purple input-btn" value="submit" onclick="thanks()">
					</div>
				</form>
	</div>
</div>


<?php require_once "../../includes/html/footer.php";