<?php
include('components/header_1.php');
?>
<!-- 
    block style
 -->
 <script src="assets/js/scrolling.js"></script>
<link href="assets/css/joinClub.css" rel="stylesheet" type="text/css">
<link href="assets/css/header.css" rel="stylesheet" type="text/css">
<!-- <link href="assets/css/register.css" rel="stylesheet" type="text/css"> -->
<style>
	@media (max-width: 991px) {
		.main {
			height: 68rem !important;
		}
	}
</style>

<!-- 
    end block style 
-->
<?php
include('components/navbar.php');
include('models/club/getFromClub.php');
if (!isset($_SESSION["id"])) {
	header("location:/login");
}
// check GET request id param
// if (isset($_GET['id'])) {
	// get the club
	$sl_clb_id = $id;
	$selected_Club = getClub($db, $sl_clb_id);
	$prix = $selected_Club['prix'];
	$club_info = getClub($db, $id);
	$clubs = getAllClubs($db);
	$student = getStudent($db, $_SESSION['id']);
// }
?>


<section class="main">
	<div class="custom-shape-divider-top-1613908015">
		<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
			<path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
			<path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
			<path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
		</svg>
	</div>
	<section class="main-Container">
		<div class="Container">
			<div class="form-title">Be a member</div>
			<form action="/join-club-inc" method="POST">
				<div class="user-infos">
					<input type="hidden" name="id" value="
					<?php
					echo $_SESSION['id'];
					?>
					">
					<div class="form-input club">
						<span class="label">Choose a club</span>
						<select onclick="selectedClub()" name="club" id="selected" required>
							<option value="<?php echo htmlspecialchars($club_info['id']);?>" selected><?php echo htmlspecialchars($club_info['name']) ?></option>
							<?php foreach ($clubs as $club) { ?>
								<option value="<?php echo htmlspecialchars($club['id']);?>"><?php echo htmlspecialchars($club['name']) ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="card">
					<div class="body">

						<h3>Check Out :</h3>
						<div class="checkoutinfo">
							<p><strong>Club : </strong><?php echo $club_info['name'] ?></p>
							<label class="labels" for="price"><strong>Amount :<?php echo $club_info['prix'] ?> DH</strong></label>
							<!-- <input name="price" type="number" value="7" class="form-control" id="price" required> -->
							<!-- <span><strong></strong></span> -->
						</div>
						<div id="paypal-button-container"></div>

						<!-- Include the PayPal JavaScript SDK -->
						<script src="https://www.paypal.com/sdk/js?client-id=ASJ920rtwxVmDQOqqTSX-l8yxVnBWlOhGVWBP4uLBwjhr18_prdqsJ7vJNeLT7XhrpJs0QhZ_dXZFAjw&currency=USD"></script>
					</div>
				</div>
				<div class="test">
					<div class="submitbutton">
						<input id="sbtn" type="submit" value="Send" name="submit" disabled>
					</div>
				</div>
			</form>
		</div>
	</section>
	<!-- <div class="custom-shape-divider-bottom-1613919420">
		<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
			<path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
		</svg>
	</div> -->

</section>
<?php include('components/footer_1.php'); ?>
<script>
	// var clicked = false;
	// document.getElementById('sbtn').disabled = true;
	function isclk()
	{
		document.getElementById('sbtn').disabled = false;
	}
</script>
<script>
	// Render the PayPal button into #paypal-button-container
	paypal.Buttons({

		// Set up the transaction
		createOrder: function(data, actions) {
			return actions.order.create({
				purchase_units: [{
					amount: {
						value: <?php echo $club_info['prix']/10; ?>
					}
				}]
			});
		},

		// Finalize the transaction
		onApprove: function(data, actions) {
			document.getElementById('sbtn').disabled = false;
			return actions.order.capture().then(function(orderData) {
				// Successful capture! For demo purposes:
				

				// Replace the above to show a success message within this page, e.g.
				const element = document.getElementById('paypal-button-container');
				element.innerHTML = '';
				element.innerHTML = '<h3>Thank you for your payment!</h3>';
				// Or go to another URL:  actions.redirect('thank_you.html');
			});
		}

		
	}).render('#paypal-button-container');
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</html>