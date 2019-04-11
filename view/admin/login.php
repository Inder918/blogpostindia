<!DOCTYPE html>
<html>
<head>
	<title>BLOG POST INDIA</title>
	<style type="text/css">
		#loginpage{position: relative; top: 150px;width: 400px; height: 500px;margin: auto;}
		.admindetails{padding: 15px; }
		.inputs{width:90%; outline: 0px; position: relative; border:0px;border-bottom: 1px solid purple;margin: 10px;}
		.btn{outline: 0px; border-radius: 4px; color: #fff; background-color: green;border:  0px;padding: 8px 16px;margin: 10px;}
	</style>
</head>
<body>
	<div id="loginpage">
		<div class="admindetails">
			<div><h2>admin login</h2></div>
			<form action="https://blogpostindia.com/middelware/admin/Login.php" method="post">
				<div class="">
					<input type="text" name="uname" placeholder="username" class="inputs"><br>
					<input type="password" name="pass" placeholder="password" class="inputs">
					<p style="color: blue;"><input type="checkbox" name="remember">remember me...</p><br></input>
					<input type="submit" name="submit" class="btn">
				</div>

			</form>
		</div>
	</div>
</body>
</html>

