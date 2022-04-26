<?php
include('components/header_1.php');
?>
<!-- 
    block style
-->
<script src="assets/js/scrolling.js"></script>
<link href="assets/css/landing.css" rel="stylesheet" type="text/css">
<link href="assets/css/login.css" rel="stylesheet" type="text/css">
<link href="assets/css/header.css" rel="stylesheet" type="text/css">
<!-- 
    end block style 
-->
<?php
include('components/navbar.php');
?>
<section class="main">
	<div class="custom-shape-divider-top-1613908015">
		<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
			<path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
			<path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
			<path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
		</svg>
	</div>
	<?php if (isset($_GET["error"])) {
		if ($error == "emptyinputs") {

			echo "<p class='text-center alert alert-danger'>Fill all the fields</p>";
		}

		if ($error == "wronginfo") {

			echo "<p class='text-center alert alert-danger'>Password or username is incorrect</p>";
		}
	}
	?>
	<section class="main-Container">
		<div class="Container">
			<div class="form-title">Login</div>
			<form action="<?php echo '/login-inc'; ?>" method="POST">
				<div class="user-infos">
					<div class="form-input">
						<span class="label">E-mail</span>
						<input class="hvr-grow" type="Email" name="email" placeholder="Enter your E-mail" required>
					</div>
					<div class="form-input">
						<span class="label">Password</span>
						<input class="hvr-grow" type="Password" name="passwd" placeholder="Enter your password" required>
						<div class="passwd-forgot">
							<a href="" style="float: right;">Forgot password ?</a>
						</div>

					</div>
				</div>
				<div class="test">
					<div class="submitbutton">
						<input type="submit" value="Login" name="submit">
					</div>
					<div class="acc">
						<p>Are you new ? <a href="/register" target="#blank">Sign in</a></p>
					</div>
				</div>

			</form>
		</div>
	</section>
	<div class="custom-shape-divider-bottom-1613919420">
		<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
			<path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
		</svg>
	</div>
</section>
<?php include('components/footer_2.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</html>