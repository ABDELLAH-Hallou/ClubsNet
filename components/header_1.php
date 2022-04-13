<?php
include('config/db_connect.php');
include('models/student/getFromStudent.php');
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Ensam X Club</title>
    <!-- bootstrap 4.6.0 -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <!-- js requirements -->
    <script src="assets/js/scrolling.js"></script>
    <script src="assets/js/jquery.js"></script>
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="static/images/favicon.png">
    <style>
        .username {
            position: absolute;
            right: 0;
        }

        @media all and (max-width: 991px) {
            .username {
                position: static;
                right: auto;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">EnsamXclub</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/clubs">Clubs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li><?php
                            if (isset($_SESSION["id"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/new-club">Create New Club</a>
                        </li>

                        <?php
                                $whoAmI = getStudent($db, $_SESSION["id"]);
                                if ($whoAmI['email'] == 'admin@admin.com') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                            </li>
                    <?php }
                            } ?>


                    <?php
                    if (isset($_SESSION["id"])) { ?>
                        <li class="nav-item dropdown username">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#FBAA1B; ">
                                <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/logout-inc">Log Out</a>
                                <a class="dropdown-item" href="/profile">Profile</a>

                            </div>
                        </li>
                </ul>
            <?php } else { ?>
                </ul>
                <a class='btn btn1' href='/login'> Login</a>
                <a class='btn btn1' href='/register'> Register</a>

            <?php } ?>
            </div>
        </div>
    </nav>