<!DOCTYPE html>
<html>
<head>
	<title>blog post india</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index,follow">
	<meta name="keywords" content=" blog post india, book summaries, technical blogs, web developement, web design, blogpostindia.com, blogpostindia, zero to one">
	<meta name="discription" content="BLOGPOSTINDIA is a website. where we focused on quality of contant and not on the quantity. this website is for educational purpose only. here we upload book summaries and truth of news">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'/>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://blogpostindia.com/includes/css/app.v.1.2.css">
	<link rel="stylesheet" type="text/css" href="https://blogpostindia.com/includes/css/mycolors.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117630326-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-117630326-1');
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-6656665374596506",
	    enable_page_level_ads: true
	  });
	</script>
</head>
<?php 
require_once "functions.php";require_once "config/config.php";require_once "app/http/Auth/fileHandler.php";require_once "app/http/Auth/setEnvironment.php";require_once "app/http/Auth/dbConnector.php";require_once "app/admin/dbParam.php";require_once "app/admin/dashboardController.php";require_once "app/admin/postsController.php";require_once "app/admin/hash.php";$post= post::find_all();$recent1=array_pop($post);$recent2=array_pop($post);$recent3=array_pop($post);
?>
<body>
<div id="header">
	<nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>                        
	            </button>
	            <div class="logo-container"><a href="https://blogpostindia.com/"><img src="https://blogpostindia.com/Assets/images/logo.png" class="logo"></a></div>
	        </div>
	        <div class="collapse navbar-collapse" id="myNavbar">
	            <ul class="nav navbar-nav mynav navbar-right">
	            	<li><a class="text-red hover-text-purple" href="https://blogpostindia.com/view/public/blog">BLOG</a></li>
	            	<li><a class="text-red hover-text-purple" href="https://blogpostindia.com/view/public/about">ABOUT</a></li>
	            	<li><a class="text-red hover-text-purple" href="https://blogpostindia.com/view/public/contact">CONTACT US</a></li><li><a class="text-red hover-text-purple" href="#">NEWS</a></li>
	            	<li><a class="text-red hover-text-purple" href="https://blogpostindia.com/view/public/privacy">PRIVACY POLICY</a></li>
	            </ul>
	        </div>
        </div>
    </nav>
    <div class="header-section background-image">
    <div style="height: 100%">
        <div class="caption">
	        <h1 class="mySlides animate-left text-decoration"> Ready To Change ??</h1>
	        <h1 class="mySlides animate-left text-decoration">Start From Today!! There Is No Tommorow...</h1>
	        <h1 class="mySlides animate-left text-decoration">TAKE ONE STEP EACH DAY!!</h1>
       </div>
    </div>
    </div>
     <script src="https://blogpostindia.com/includes/js/layout.js"></script>
</div>
<div id="wrapper" class="container-fluid ">
	<section id="blog-area">
		<div class="text-center">
			<b><h1 class="text-blue">BLOG</h1><br></b>
			<p>technical and non-technical knowladge for improvement of life..</p>
			<div  class="row blog-row">
				<div class="col-md-4 text-center">
					<a href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($recent1->id));?>" ><img class="img-responsive blog-image"  onmouseover="myMove(this)" onmouseout="_myMove(this)" src="https://blogpostindia.com/Assets/images/<?php echo(link_image($recent1->image_id)); ?>"></a><br>
					<b class="text-red "><?php echo $recent1->title;?></b>
					<p><a href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($recent1->id));?>" style="text-decoration: none;"><?php _e(get_num_of_string($recent1->body,25)); ?><b>...</b></a></p><br>
				</div>
				<div class="col-md-4 text-center">
					<a href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($recent2->id));?>"><img class="img-responsive blog-image"  onmouseover="myMove(this)" onmouseout="_myMove(this)" src="https://blogpostindia.com/Assets/images/<?php echo(link_image($recent2->image_id)); ?>"></a><br>
					<b class="text-green "><?php echo $recent2->title;?></b>
					<p><a href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($recent2->id));?>" style="text-decoration: none;"><?php _e(get_num_of_string($recent2->body,25)); ?><b>...</b></a></p><br>
				</div>
				<div class="col-md-4 text-center">
					<a href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($recent3->id));?>"><img class="img-responsive blog-image"  onmouseover="myMove(this)" onmouseout="_myMove(this)" src="https://blogpostindia.com/Assets/images/<?php echo(link_image($recent3->image_id)); ?>"></a><br>
					<b class="text-indigo "><?php echo $recent3->title;?></b>
					<p><a href="https://blogpostindia.com/view/public/blog?id=<?php _e($hash->hash_id($recent3->id));?>" style="text-decoration: none;"><?php _e(get_num_of_string($recent3->body,25)); ?><b>...</b></a></p><br>
				</div>
			</div>
		</div>
	</section><hr><br>
	<script>
        function myMove(x) {
          x.style.height = "255px";
          x.style.width = "305px";
        }
        function _myMove(x) {
          x.style.height = "250px";
          x.style.width = "300px";
        }
    </script>
	<section id="book-summery"><br>
		<b><h1 class="text-red" style="padding:0px 30px;">BOOK SUMMERIES:</h1></b><hr>
			<div  class="book-wrapper">
				<div class="row book-row">
					<div class="col-md-4" >
						<div class="rich-dad"></div>
					</div>
					<div class="col-md-7 break" >
						<blockquote>
							<h2 class="text-yellow">Rich dad<b class="text-indigo" style="font-size: 28px"> Poor dad:</b></h2>
							<h3 class="text-orange">&#10077; <i style="font-size: 20px">One said "I can't afford it", the other "how can I afford it?". One is statement, the other question which forces you to think!</i> &#10078;</h3><br><h3 class="text-green">If you say I can't afford it-your brain stops.If however you say/ask "how can I afford it" you force your brain to think.</h3>
						</blockquote> 
					</div>
					<div class="col-md-1"></div>
				</div><br><br>
				<div class="row">
					<div class="col-md-7 break">
						<blockquote class="">
							<h1 class="text-orange">Zero To One: Notes on startups</h1><br>
							<h2 class="text-purple">&#10077;  What important truth do very few people agree with you on &#10078;</h2></blockquote> 
					</div>
					
					<div class="col-md-4" >
						<div class="zero-to-one"></div>
					</div>
					<div class="col-md-1 " ></div>
				</div>
			</div>
	</section><hr><br>
	<section>
		<h1 class="text-center text-pink" style="padding: 5px 20px 50px 20px"><b style="font-size: 48px;">OUR SERVICES</b></h1>
		<div class="row" style="padding: 0px 40px 10px 40px; ">
			
			<div class="col-md-3 text-center">
				<i class="material-icons" style="font-size:48px;color:red;">library_books</i>
				<div>
					<h3 style="padding-bottom: 10px">Blog</h3>
					<p>technical (WordPress, PHP, JAVASCRIPT) or non-technical Self improvement Blog...</p><br>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 text-center">
				<i class="material-icons text-purple" style="font-size:48px;">perm_media</i>
				<div>
					<h3  style="padding-bottom: 10px">Top News</h3>
					<p>Most controversial top news:"Say no to fake news"</p><br>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-3 text-center">
				<i class="material-icons text-green" style="font-size:48px;">book</i>
				<div>
					<h3  style="padding-bottom: 10px">Free Book Summary</h3>
					<p>best Book summeries to improve life and Save netural resources & Environment...</p><br>
				</div>
			</div>
			
		</div>
	</section><hr>
	<section id="contact-us">
		<div class="text-white col-md-6 contact-info">
			<b><h2  style="">Get in Touch</h2></b><br><br>
			<p class="contact-opacity">your feedback and suggestions very important for us..</p><br><br>
			<b><p>send us email:</p></b><br>
			<p class="contact-opacity">vipnextgenration@yahoo.com</p><br>
			<b>folllow us on </b><br>
			<span><p class="contact-opacity"><a href="#" target="_blank"><img src="https://blogpostindia.com/Assets/images/fb-icon.svg" width="25px" height="25px"></a> <a href="#"><img src="https://blogpostindia.com/Assets/images/tw-icon.svg" width="25px" height="25px"></a> <a href="#"><img src="https://blogpostindia.com/Assets/images/insta-icon.svg" width="25px" height="25px"></a> </p></span>
		</div>
		<div class="col-md-6">
			<div class="col-md-3"></div>
			<div class="col-md-7 contact-block">
				<div class="purple contact-offset"><h3 class="text-center" style="line-height: 70px">Contact Us</h3></div>
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
						<textarea rows="5" cols="10" name="comment" placeholder="your Comment.."  class="input-control input-style2" style="resize: none;" required></textarea>
					</div>
					<div class="row">
						<input type="submit" name="submit" class="btn purple input-btn" value="submit" onclick="thanks()">
					</div>
				</form>
				<script>
				function thanks(){alert("THANKYOU FOR YOUR FEEDBACK!!");}
				</script>
			</div>
		</div>
	</section>
	<section>
		<div id="footer">
			    <div class="container">
			        <h1 style="margin: 50px 10px 0px 10px;">Join the Community!</h1><hr>
			        <br><br>
			        <span><h4 style="opacity: .5">follow us on: <a href="#" target="_blank"><img src="https://blogpostindia.com/Assets/images/fb-icon.svg" width="35px" height="35px"></a> <a href="#"><img src="https://blogpostindia.com/Assets/images/tw-icon.svg" width="35px" height="35px"></a> <a href="#"><img src="https://blogpostindia.com/Assets/images/insta-icon.svg" width="35px" height="35px"></a></h4></span>
			        <br>
			        <h6 class="text-center" style="opacity: .5;float: right;"></h6>
			    </div>
			</div>
	</section>
</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
