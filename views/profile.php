<?php include('components/header_1.php');
// include('models/student/getFromStudent.php');
include('models/club/getFromClub.php');
include('models/join/getFromJoin.php');
include('controllers/club/string_control.php');
if (!isset($_SESSION["id"])) {
	header("location:/login");
}
if(isset($id)){
    $student = getStudent($db, $id);
}else{
    $student = getStudent($db, $_SESSION['id']);
}

$joinedClubs = getJoinedClubs($db, $student['id']);
$clubs = array();
foreach ($joinedClubs as $join) {
    array_push($clubs, getClub($db, $join['club_id']));
}
?>
<!-- 
    block style
-->
<link href="assets/css/profile.css" rel="stylesheet" type="text/css">
<link href="assets/css/footer.css" rel="stylesheet" type="text/css">
<!-- 
    end block style 
-->

<section class="profile">
    <div class="container-fluid">
        <div class="prof">
            <a href="#PF">
                <img class="img-fluid rounded-circle account-img" src="<?php echo htmlspecialchars($student['image']) ?>" alt="user-image">
            </a>
            <div class="media-body">
                <div style="display: flex;flex-direction: row;">
                    <h2 class="display-5 "><?php echo htmlspecialchars($student['firstname']) . ' ' . htmlspecialchars($student['lastname']) ?></h2>
                    <a style="margin-left: 20px;" href="#PF"><img onclick="inputs('input','update-input')" style=" height: 25px;width: 25px; margin-top: 25px;" alt="icon" src="assets/images/edit.png" /> </a>
                </div>
                <p class="text-secondary"><?php echo htmlspecialchars($student['email']) ?></p>
            </div>
        </div>
    </div>
</section>
<section class="container contain">
    <h3 style="text-align: center">About Me </h3>
    <p style=" text-align:justify;font-size: 1.5rem" class="description">&emsp;<?php echo htmlspecialchars($student['about']) ?></p>
    

</section>

<section class="tab container-fluid">
    <button class="tablinks" onclick="openCity(event, 'PF')" id="defaultOpen">Personal Info</button>
    <button class="tablinks" onclick="openCity(event, 'Club')">Joined Clubs</button>
</section>

<section id="PF" class="tabcontent personal_info">
    <form action="<?php echo '/edit-profile'; ?>" method="post" enctype="multipart/form-data">
        <div class="row pair">
            <div class=" label col-3"> First Name <span> : </span></div>
            <div class="input col-5"><?php echo htmlspecialchars($student['firstname']) ?></div>
            <input class="update-input col-5" name="firstname" value="<?php echo htmlspecialchars($student['firstname']) ?>">

        </div>
        <div class="row unpair">
            <div class=" label col-3"> Last Name <span> : </span></div>
            <div class="input col-6"> <?php echo htmlspecialchars($student['lastname']) ?></div>
            <input class="update-input col-5" name="lastname" value="<?php echo htmlspecialchars($student['lastname']) ?>">
        </div>
        <div class="row pair">
            <div class="label col-3"> Email <span> : </span></div>
            <div class="input col-6"> <?php echo htmlspecialchars($student['email']) ?> </div>
            <input class="update-input col-5" name="email" value="<?php echo htmlspecialchars($student['email']) ?>">
        </div>
        <div class="row unpair">

            <div class="label col-3"> joined<span> : </span></div>
            <div class="input col-6"> <?php echo htmlspecialchars($student['joining_date']) ?> </div>
            <input disabled class="update-input col-5" name="joining_date" value="<?php echo htmlspecialchars($student['joining_date']) ?>">

        </div>

        <div class="row pair">
            <div class=" label col-3"> Address <span> : </span></div>
            <div class=" input col-6"><?php echo htmlspecialchars($student['address']) ?></div>
            <input class="update-input col-5" name="address" value="<?php echo htmlspecialchars($student['address']) ?>">
        </div>
        <div class="row unpair">
            <div class=" label col-3"> Gender <span> : </span></div>
            <div class="input col-5"><?php echo htmlspecialchars($student['gender']) ?></div>
            <div class="update-input col-5">
                <input <?php if ($student['gender'] === 'male') {
                            echo 'checked';
                        } ?> type="radio" name="gender" value="male">Male
                <input <?php if ($student['gender'] === 'female') {
                            echo 'checked';
                        } ?> type="radio" name="gender" value="female">Female
            </div>

        </div>
        <div class="row pair">
            <div class=" label col-3"> Telephone <span> : </span></div>
            <div class=" input col-6"><?php echo htmlspecialchars($student['tele']) ?></div>
            <input class="update-input col-5" name="tele" value="<?php echo htmlspecialchars($student['tele']) ?>">
        </div>
        <div class="row unpair update-input">
            <div class=" label col-3"> Image <span> : </span></div>
            <input type="file" id="selectedFile" style="display: none;" name="file" />
            <input type="hidden" name="linkOfImage" value="<?php echo htmlspecialchars($student['image']); ?>"/>
			<input class="hvr-grow update-input" type="button" value="Browse..." onclick="document.getElementById('selectedFile').click();" />

        </div>
        <div class="row pair update">
            <div class=" label col-3"> Change Password <span> : </span></div>
            <input class="update-input col-5" type="password" name="password" >

        </div>
        <div class="row unpair update-input">
            <div class=" label col-3"> About me <span> : </span></div>
            <textarea class=" col-5" name="about" rows="4" required><?php echo htmlspecialchars($student['about']) ?></textarea>
        </div>
        <div style="margin-right: 15%;">
            <button class="btn btn2 update-input" style="float: right ; max-width:max-content;" name="submit" type="submit">Submit</button>
        </div>
    </form>
</section>

<section id="Club" class="tabcontent Clubs container">
    <?php foreach ($clubs as $club) { ?>
        <article class="Club row container-fluid">

            <div class="part-1 col-4">
                <a href="<?php echo "/club:".$club['id']; ?>"><img src="<?php echo htmlspecialchars($club['image']); ?>" alt="club"></a>
            </div>
            <div class="part-2 col-8">
                <div class="description">
                    <h4>
                        <a href="<?php echo "/club:".$club['id']; ?>"><?php echo htmlspecialchars($club['name']); ?></a>
                    </h4>
                    <p class="club-description"><?php echo htmlspecialchars(cut_description($club['description'])); ?>
                        ... <a href="<?php echo "/club:".$club['id'] ?>">Read More</a></p>
                    <!-- <p class="text-secondary">
                            {{ course.idCours.instructor.user.first_name }} {{ course.idCours.instructor.user.last_name
                            }}
                        </p>-->
                    <h6>
                        <?php echo htmlspecialchars($club['domain']); ?>
                    </h6>
                    <!-- <p class="text-secondary">
                            70 DH
                        </p>  -->

                </div>
                <div class="price">
                    <p> <?php echo htmlspecialchars($club['prix']); ?></p>
                </div>
            </div>

        </article>
    <?php } ?>
</section>
<?php include('components/footer_1.php'); ?>

<script>
    function inputs(nn, vis) {
        let i, elnn, elvis;

        elnn = document.getElementsByClassName(nn);
        elvis = document.getElementsByClassName(vis);
        di = document.getElementsByClassName("update");
        for (i = 0; i < elnn.length; i++) {
            elnn[i].style.display = "none";
        }
        for (i = 0; i < di.length; i++) {
            di[i].style.display = "flex";
        }
        for (i = 0; i < elvis.length; i++) {
            elvis[i].style.display = "block";
        }
        
        document.getElementById('PF').scrollIntoView();
    }

    function openCity(evt, cityName) {
        let i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</html>