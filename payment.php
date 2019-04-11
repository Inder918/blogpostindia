<?php 
require_once("includes/html/header.php"); 
?>
<style type="text/css">
		.items{margin-bottom: 20px;}
		@media(min-width: 992px){.img-responsive{height:200px;}}
		.razorpay-payment-button{background-color: red;color: white;padding: 8px 12px;border-radius: 4px;border:0; margin: auto}
		.razorpay-payment-button:hover{background-color: green;}
	}
	</style>

	<div class="container" style="background: #fff;height: inherit;">
		<?php if (isset($_POST['submit'])): ?>
				<div  style="margin-top: 30px"></div>
			<form action="/" method="POST" >
		
			<script  
			    src="https://checkout.razorpay.com/v1/checkout.js"
			    data-key="rzp_test_W3qbSBZLbqsi0l"
			    data-amount="<?php echo $_POST['value']; ?>"
			    data-buttontext="Pay with Razorpay"
			    data-name="Merchant Name"
			    data-description="Purchase Description"
			    data-image="https://your-awesome-site.com/your_logo.jpg"
			    data-prefill.name="Gaurav Kumar"
			    data-prefill.email="test@test.com"
			    data-theme.color="#F37254"
			></script>
		<input type="hidden" value="Hidden Element" name="hidden" >
		</form>
			<?php endif; ?>
			<div class="row" style="top: 50px;position: relative;">
				<div class="col-md-3 items">
					<div class="">
						<a href=""><img src="car.jpg" class="thumbnail img-responsive" style="width: 100%" height="200px"></a>	
					</div>
					<div><h4 style="text-align: center;">title</h4></div>
					<p>this is a discreption...this is a discreption...this is a discreption...this is a discreption...this is a discreption...</p>
						<form action="payment.php" method="post">
						<input id="value" type="hidden" name="value" value="100000">
						<button class="btn btn-primary payIt" type="submit" name="submit" style="margin: 10px 5px" >1000/day</button>
					</form>
						
						
				</div>
				<div class="col-md-3 items">
					<div class="">
						<a href=""><img src="car1.png" class="thumbnail img-responsive" style="width: 100%" height="200px"></a>	
					</div>
					<div><h4 style="text-align: center;">title</h4></div>
					<p>this is a discreption...this is a discreption...this is a discreption...this is a discreption...this is a discreption...</p>
					<form action="payment.php" method="post">
						<input id="value" type="hidden" name="value" value="200000">
						<button class="btn btn-primary payIt" type="submit" name="submit" style="margin: 10px 5px">2000/day</button>
					</form>
					
				</div>
				<div class="col-md-3 items">
					<div class="">
						<a href=""><img src="auto.png" class="thumbnail img-responsive" style="width: 100%" height="200px"></a>	
					</div>
					<div><h4 style="text-align: center;">title</h4></div>
					<p>this is a discreption...this is a discreption...this is a discreption...this is a discreption...this is a discreption...</p>
					<form action="payment.php" method="post">
						<input id="value" type="hidden" name="value" value="300000">
						<button class="btn btn-primary payIt" type="submit" name="submit" style="margin: 10px 5px" >3000/day</button>
					</form>
					
				</div>
				<div class="col-md-3 items">
					<div class="">
						<a href=""><img src="aston.jpg" class="thumbnail img-responsive" style="width: 100%" height="200px"></a>	
					</div>
					<div><h4 style="text-align: center;">title</h4></div>
					<p>this is a discreption...this is a discreption...this is a discreption...this is a discreption...this is a discreption...</p>
					<form action="payment.php" method="post">
						<input id="value" type="hidden" name="value" value="500000">
						<button class="btn btn-primary payIt" type="submit" name="submit" style="margin: 10px 5px" >5000/day</button>
					</form>
				</div>
			</div><br>

			
			
	</div>
<?php 
require_once("includes/html/footer.php");