</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">ClubsNet</a>
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