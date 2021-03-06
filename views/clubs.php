<?php
include('components/header_1.php');
?>
<!-- 
    block style
-->
<script src="assets/js/scrolling.js"></script>
<link href="assets/css/landing.css" rel="stylesheet" type="text/css">
<link href="assets/css/header.css" rel="stylesheet" type="text/css">
<link href="assets/css/clubs.css" rel="stylesheet" type="text/css">
<!-- 
    end block style 
-->
<?php
include('components/navbar.php');
include('models/club/getFromClub.php');
include('controllers/club/search.php');
include('controllers/club/string_control.php');
$clubs_array = getAllClubs($db);
?>

<section class="main">
    <div class="custom-shape-divider-top-1613908015">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-lg-2">
            <div class="col col1 justify-content-center align-items-center  my-auto">
                <h2 class="display-3 "> Choose your CLUB with just one click</h2>

                <p>Discover the fastest, most effective way to join clubs at Ensam Casablanca.
                    Develop your Hard skills with Extracurricular Activities, participate in competitions and Events
                    organized by the the Clubs of Ensam Casablanca.
                </p>

            </div>
            <img class="col " loading="lazy" src="assets/images/Daco_2324534.png" alt="...">
        </div>

    </div>
    <div class="custom-shape-divider-bottom-1613919420">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
</section>
<section class="header">
    <form method=POST role="search">
        <input id="search" name="searched" type="search" placeholder="Search..." autofocus required />
        <button type="submit" name="GO">Go</button>
    </form>
</section>
<?php if (count($searched_array) == 0 && $mssg!='') { ?>
    <h2 style="text-align: center;" >SORRY ... WE DID NOT FIND ANY CLUBS THAT MATCH "<?php echo $_GET['searched']; ?>" !</h2>
<?php }?>
<section id="seg" class="segments">
    <div class="container">
        <div class="row row-cols-lg-3 row-cols-1">
            <?php if ($valid == false || count($searched_array) == 0) {
                foreach ($clubs_array as $club) { ?>
                    <div class="col col1">
                        <a href="<?php echo "/club:".$club['id']; ?>" style="text-decoration: none; color:black !important;">
                            <img class="img-fluid" loading="lazy" src="<?php echo htmlspecialchars($club['image']); ?>" alt="...">
                            <h4><?php echo htmlspecialchars($club['name']); ?></h4>

                            <p>
                                <?php echo htmlspecialchars(cut_description($club['description']));?>
                                ... <a href="<?php echo "/club:".$club['id']; ?>">Read More</a>
                            </p>
                        </a>
                    </div>
                <?php }
            } else {
                if (count($searched_array) > 0) { 
                    foreach ($searched_array as $club) { ?>
                        <div class="col col1">
                            <a href="<?php echo "/club:".$club['id']; ?>" style="text-decoration: none; color:black !important;">
                                <img class="img-fluid" loading="lazy" src="<?php echo htmlspecialchars($club['image']); ?>" alt="...">
                                <h4><?php echo htmlspecialchars($club['name']); ?></h4>

                                <p><?php echo htmlspecialchars(cut_description($club['description']));?>
                                    ... <a href="<?php echo "/club:".$club['id']; ?>">Read More</a>
                                </p>
                            </a>
                        </div>
            <?php }
                }
            } ?>
        </div>
    </div>
</section>
<?php include('components/footer_1.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- <script>
    function searchClub() {
        document.getElementById("seg").style.display = "none";
    }

    function outSearch() {
        document.getElementById("seg").style.display = "block";
    }
</script> -->

</html>