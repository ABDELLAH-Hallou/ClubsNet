<?php
include('components/header_1.php');
include('models/club/getFromClub.php');
// include('models/student/getFromStudent.php');
if (!isset($_SESSION["id"])) {
	header("location:/login");
}
// if (isset($_GET['id'])) {
    // get the club
    $club = getClub($db, $id);
    // get president
    $student = getStudent($db, $club['president']);
// }
include('controllers/posts/create_post.php');
?>
<!-- 
    block style
-->
<link href="assets/css/footer.css" rel="stylesheet" type="text/css">
<link href="assets/css/details.css" rel="stylesheet" type="text/css">
<link href="assets/css/post.css" rel="stylesheet" type="text/css">
<!-- 
    end block style 
-->
<section class="content post-body mb-5">
    <H1 align="center"><?php echo htmlspecialchars($club['name']); ?></H1>
    <form method="post" enctype="multipart/form-data">
        <h2>Create New Post</h2>
        <!-- <textarea name="post" id="mytextarea"></textarea> -->
        <fieldset>
            <label class="labels" for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title">
        </fieldset>
        <textarea placeholder="create post" name="text" id="mytextarea"></textarea>
        <fieldset>
            <label class="labels" for="link">Add a file link</label>
            <input name="link" type="text" class="form-control" id="link">
        </fieldset>
        <div class="mt-3 flex-row ">
            <input type="file" name="file" value="" />
            <button class="btn btn2 " name="post" type="submit">Post</button>
        </div>
    </form>
</section>
<?php include('components/footer_1.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</html>