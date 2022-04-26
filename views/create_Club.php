<?php
include('components/header_1.php');
?>
<!-- 
    block style
 -->
<script src="assets/js/scrolling.js"></script>
<link href="assets/css/header.css" rel="stylesheet" type="text/css">
<link href="assets/css/create_club.css" rel="stylesheet" type="text/css">
<style>
	/* @media (max-width: 991px) {
		.main {
			height: 68rem !important;
		}
	} */
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
if (isset($_GET['id'])) {
	// get the club
	$club_info = getClub($db, $_GET['id']);
	$clubs = getAllClubs($db);
	$student = getStudent($db, $_SESSION['id']);
}
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
			<div class="form-title">Add your club</div>
			<form action="/addClub" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="president" value="<?php echo $_SESSION['id'] ?>">

				<div class="section-title">General :</div>
				<div class="user-infos">
					<div class="form-input-3">
						<span class="label">Name</span>
						<input class="hvr-grow" type="text" name="nom" required>
					</div>
					<div class="form-input-3">
						<span class="label">Domaine</span>
						<input class="hvr-grow" type="text" name="domaine" required>
					</div>
					<div class="form-input-3">
						<span class="label">Price</span>
						<input class="hvr-grow" type="numbers" name="price" required>
					</div>
					<div class="form-input-all">
						<span class="label">Image</span>
						<input type="file" id="selectedFile" style="display: none;" name="file" />
						<input class="hvr-grow" type="button" value="Browse..." onclick="document.getElementById('selectedFile').click();"/>
					</div>
					
				</div>
				<div class="section-title">Contact :</div>
				<div class="user-infos">
					<div class="form-input">
						<span class="label">Facebook</span>
						<input class="hvr-grow" type="url" name="clubname">
					</div>
					<div class="form-input">
						<span class="label">Instagram</span>
						<input class="hvr-grow" type="url" name="insta">
					</div>
					<div class="form-input-3">
						<span class="label">LinkedIn</span>
						<input class="hvr-grow" type="url" name="link">
					</div>
					<div class="form-input-3">
						<span class="label">WhatsApp</span>
						<input class="hvr-grow" type="text" name="wtsp">
					</div>
					<div class="form-input-3">
						<span class="label">Twitter</span>
						<input class="hvr-grow" type="url" name="twttr">
					</div>

				</div>
				<div class="form-input-all">
					<span class="label">Tags</span>
					<input class="hvr-grow" type="text" name="tags" >
				</div>
				<div class="section-title">Description :</div>
				<div class="description">
					<!-- <label class="label">Description</label> -->
					<textarea name="message" rows="4" required></textarea>
				</div>


				<div class="test">
					<div class="submitbutton">
						<input type="submit" value="Submit" name="submit">
					</div>

				</div>
			</form>

	</section>
</section>
<?php include('components/footer_1.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>