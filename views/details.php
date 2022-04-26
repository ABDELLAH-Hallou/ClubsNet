<?php
include_once('components/header_1.php');
?>
<!-- 
    block style
 -->
<link href="assets/css/details.css" rel="stylesheet" type="text/css">
<link href="assets/css/feedback.css" rel="stylesheet" type="text/css">
<link href="assets/css/post_stuff.css" rel="stylesheet" type="text/css">
<!-- 
    end block style 
-->
<?php
include('components/navbar.php');
include_once('controllers/club/getTags.php');
include_once('models/club/getFromClub.php');
include_once('models/post/getFromPost.php');
include_once('models/student/getFromStudent.php');
include_once('models/like/getFromLike.php');
include_once('models/comment/getFromComment.php');
// check GET request id param
// if (isset($_GET['id'])) {
// get the club
$club = getClub($db, $id);
// get posts
$posts = getAllClubPosts($db, $id);
// get president
$student = getStudent($db, $club['president']);
// }
include_once('controllers/club/feedback.php');


?>


<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <!-- profile -->
            <div class="col-xs-12 col-sm-4">
                <!-- profile card -->
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img loading="lazy" src="<?php echo htmlspecialchars($club['image']); ?>" alt="Profile Image" />
                        </div>
                        <div class="content-area">
                            <h3><?php echo htmlspecialchars($club['name']); ?></h3>
                            <p><?php echo htmlspecialchars($club['domain']); ?></p>
                            <p>Club</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Members</span>
                                <span><?php echo htmlspecialchars($club['members']); ?></span>
                            </li>
                            <li>
                                <span>network</span>
                                <span>
                                    <a id="facebook" href="<?php echo htmlspecialchars($club['facebook']); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="23px" height="23px" viewBox="0 0 291.319 291.319" style="enable-background:new 0 0 291.319 291.319;" xml:space="preserve">
                                            <path style="fill:#3B5998;" d="M145.659,0c80.45,0,145.66,65.219,145.66,145.66c0,80.45-65.21,145.659-145.66,145.659   S0,226.109,0,145.66C0,65.219,65.21,0,145.659,0z" />
                                            <path style="fill:#FFFFFF;" d="M163.394,100.277h18.772v-27.73h-22.067v0.1c-26.738,0.947-32.218,15.977-32.701,31.763h-0.055   v13.847h-18.207v27.156h18.207v72.793h27.439v-72.793h22.477l4.342-27.156h-26.81v-8.366   C154.791,104.556,158.341,100.277,163.394,100.277z" />
                                        </svg>
                                    </a>
                                    <a id="whatsapp" href="<?php echo htmlspecialchars($club['whatsapp']); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23px" height="23px" viewBox="-1.5 0 259 259" version="1.1" preserveAspectRatio="xMidYMid">
                                            <path d="M67.6631045,221.823373 L71.8484512,223.916047 C89.2873956,234.379413 108.819013,239.262318 128.350631,239.262318 L128.350631,239.262318 C189.735716,239.262318 239.959876,189.038158 239.959876,127.653073 C239.959876,98.3556467 228.101393,69.7557778 207.17466,48.8290445 C186.247927,27.9023111 158.345616,16.0438289 128.350631,16.0438289 C66.9655467,16.0438289 16.7413867,66.2679889 17.4389445,128.350631 C17.4389445,149.277365 23.7169645,169.50654 34.1803311,186.945485 L36.9705622,191.130831 L25.8096378,232.28674 L67.6631045,221.823373 Z" fill="#00E676" />
                                            <path d="M219.033142,37.66812 C195.316178,13.2535978 162.530962,0 129.048189,0 C57.8972956,0 0.697557778,57.8972956 1.39511556,128.350631 C1.39511556,150.67248 7.67313556,172.296771 18.1365022,191.828389 L0,258.096378 L67.6631045,240.657433 C86.4971645,251.1208 107.423898,256.003705 128.350631,256.003705 L128.350631,256.003705 C198.803967,256.003705 256.003705,198.106409 256.003705,127.653073 C256.003705,93.4727423 242.750107,61.3850845 219.033142,37.66812 Z M129.048189,234.379413 L129.048189,234.379413 C110.214129,234.379413 91.380069,229.496509 75.3362401,219.7307 L71.1508934,217.638027 L30.6925422,228.101393 L41.1559089,188.3406 L38.3656778,184.155253 C7.67313556,134.628651 22.3218489,69.05822 72.5460089,38.3656778 C122.770169,7.67313556 187.643042,22.3218489 218.335585,72.5460089 C249.028127,122.770169 234.379413,187.643042 184.155253,218.335585 C168.111425,228.798951 148.579807,234.379413 129.048189,234.379413 Z M190.433273,156.9505 L182.760138,153.462711 C182.760138,153.462711 171.599213,148.579807 164.623636,145.092018 C163.926078,145.092018 163.22852,144.39446 162.530962,144.39446 C160.438289,144.39446 159.043173,145.092018 157.648058,145.789576 L157.648058,145.789576 C157.648058,145.789576 156.9505,146.487133 147.184691,157.648058 C146.487133,159.043173 145.092018,159.740731 143.696902,159.740731 L142.999345,159.740731 C142.301787,159.740731 140.906671,159.043173 140.209113,158.345616 L136.721325,156.9505 L136.721325,156.9505 C129.048189,153.462711 122.072611,149.277365 116.492149,143.696902 C115.097033,142.301787 113.00436,140.906671 111.609245,139.511556 C106.72634,134.628651 101.843436,129.048189 98.3556467,122.770169 L97.658089,121.375053 C96.9605312,120.677496 96.9605312,119.979938 96.2629734,118.584822 C96.2629734,117.189707 96.2629734,115.794591 96.9605312,115.097033 C96.9605312,115.097033 99.7507623,111.609245 101.843436,109.516571 C103.238551,108.121456 103.936109,106.028782 105.331225,104.633667 C106.72634,102.540993 107.423898,99.7507623 106.72634,97.658089 C106.028782,94.1703001 97.658089,75.3362401 95.5654156,71.1508934 C94.1703001,69.05822 92.7751845,68.3606623 90.6825112,67.6631045 L88.5898378,67.6631045 C87.1947223,67.6631045 85.1020489,67.6631045 83.0093756,67.6631045 C81.6142601,67.6631045 80.2191445,68.3606623 78.8240289,68.3606623 L78.1264712,69.05822 C76.7313556,69.7557778 75.3362401,71.1508934 73.9411245,71.8484512 C72.5460089,73.2435667 71.8484512,74.6386823 70.4533356,76.0337978 C65.5704312,82.3118178 62.7802,89.9849534 62.7802,97.658089 L62.7802,97.658089 C62.7802,103.238551 64.1753156,108.819013 66.2679889,113.701918 L66.9655467,115.794591 C73.2435667,129.048189 81.6142601,140.906671 92.7751845,151.370038 L95.5654156,154.160269 C97.658089,156.252942 99.7507623,157.648058 101.145878,159.740731 C115.794591,172.296771 132.535978,181.365022 151.370038,186.247927 C153.462711,186.945485 156.252942,186.945485 158.345616,187.643042 L158.345616,187.643042 C160.438289,187.643042 163.22852,187.643042 165.321193,187.643042 C168.808982,187.643042 172.994329,186.247927 175.78456,184.852811 C177.877233,183.457696 179.272349,183.457696 180.667465,182.06258 L182.06258,180.667465 C183.457696,179.272349 184.852811,178.574791 186.247927,177.179676 C187.643042,175.78456 189.038158,174.389445 189.735716,172.994329 C191.130831,170.204098 191.828389,166.716309 192.525947,163.22852 C192.525947,161.833405 192.525947,159.740731 192.525947,158.345616 C192.525947,158.345616 191.828389,157.648058 190.433273,156.9505 Z" fill="#FFFFFF" />
                                        </svg>
                                    </a>
                                    <a id="instagram" href="<?php echo htmlspecialchars($club['instagram']); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="23px" height="23px" viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                                            <linearGradient id="XMLID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                                                <stop offset="0" style="stop-color:#E09B3D" />
                                                <stop offset="0.3" style="stop-color:#C74C4D" />
                                                <stop offset="0.6" style="stop-color:#C21975" />
                                                <stop offset="1" style="stop-color:#7024C4" />
                                            </linearGradient>
                                            <path id="XMLID_17_" style="fill:url(#XMLID_2_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722   c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156   C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156   c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722   c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z" />

                                            <linearGradient id="XMLID_3_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                                                <stop offset="0" style="stop-color:#E09B3D" />
                                                <stop offset="0.3" style="stop-color:#C74C4D" />
                                                <stop offset="0.6" style="stop-color:#C21975" />
                                                <stop offset="1" style="stop-color:#7024C4" />
                                            </linearGradient>
                                            <path id="XMLID_81_" style="fill:url(#XMLID_3_);" d="M275.517,133C196.933,133,133,196.933,133,275.516   s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6   c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083   C362.6,323.611,323.611,362.6,275.517,362.6z" />

                                            <linearGradient id="XMLID_4_" gradientUnits="userSpaceOnUse" x1="418.306" y1="4.5714" x2="418.306" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                                                <stop offset="0" style="stop-color:#E09B3D" />
                                                <stop offset="0.3" style="stop-color:#C74C4D" />
                                                <stop offset="0.6" style="stop-color:#C21975" />
                                                <stop offset="1" style="stop-color:#7024C4" />
                                            </linearGradient>
                                            <circle id="XMLID_83_" style="fill:url(#XMLID_4_);" cx="418.306" cy="134.072" r="34.149" />
                                        </svg>
                                    </a>
                                    <a id="linkedin" href="<?php echo htmlspecialchars($club['linkedin']); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="23px" height="23px" viewBox="0 0 291.319 291.319" style="enable-background:new 0 0 291.319 291.319;" xml:space="preserve">
                                            <path style="fill:#0E76A8;" d="M145.659,0c80.45,0,145.66,65.219,145.66,145.66s-65.21,145.659-145.66,145.659S0,226.1,0,145.66   S65.21,0,145.659,0z" />
                                            <path style="fill:#FFFFFF;" d="M82.079,200.136h27.275v-90.91H82.079V200.136z M188.338,106.077   c-13.237,0-25.081,4.834-33.483,15.504v-12.654H127.48v91.21h27.375v-49.324c0-10.424,9.55-20.593,21.512-20.593   s14.912,10.169,14.912,20.338v49.57h27.275v-51.6C218.553,112.686,201.584,106.077,188.338,106.077z M95.589,100.141   c7.538,0,13.656-6.118,13.656-13.656S103.127,72.83,95.589,72.83s-13.656,6.118-13.656,13.656S88.051,100.141,95.589,100.141z" />
                                        </svg>
                                    </a>
                                    <a id="twitter" href="<?php echo htmlspecialchars($club['twitter']); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="23px" height="23px" viewBox="0 0 112.197 112.197" style="enable-background:new 0 0 112.197 112.197;" xml:space="preserve">
                                            <circle style="fill:#55ACEE;" cx="56.099" cy="56.098" r="56.098" />
                                            <path style="fill:#F1F2F2;" d="M90.461,40.316c-2.404,1.066-4.99,1.787-7.702,2.109c2.769-1.659,4.894-4.284,5.897-7.417    c-2.591,1.537-5.462,2.652-8.515,3.253c-2.446-2.605-5.931-4.233-9.79-4.233c-7.404,0-13.409,6.005-13.409,13.409    c0,1.051,0.119,2.074,0.349,3.056c-11.144-0.559-21.025-5.897-27.639-14.012c-1.154,1.98-1.816,4.285-1.816,6.742    c0,4.651,2.369,8.757,5.965,11.161c-2.197-0.069-4.266-0.672-6.073-1.679c-0.001,0.057-0.001,0.114-0.001,0.17    c0,6.497,4.624,11.916,10.757,13.147c-1.124,0.308-2.311,0.471-3.532,0.471c-0.866,0-1.705-0.083-2.523-0.239    c1.706,5.326,6.657,9.203,12.526,9.312c-4.59,3.597-10.371,5.74-16.655,5.74c-1.08,0-2.15-0.063-3.197-0.188    c5.931,3.806,12.981,6.025,20.553,6.025c24.664,0,38.152-20.432,38.152-38.153c0-0.581-0.013-1.16-0.039-1.734    C86.391,45.366,88.664,43.005,90.461,40.316L90.461,40.316z" />
                                        </svg>
                                    </a>
                                </span>
                            </li>
                        </ul>
                        <div class="row justify-content-md-center ">
                            <a href="<?php echo "/join-club:" . htmlspecialchars($club['id']) ?>" class="btn btn2 col-lg-3">JOIN</a>
                            <a href="/contact" class="btn btn2 col-lg-3">Conatct</a>
                            <a href="<?php echo '/checkout:' . htmlspecialchars($club['id']) ?>" class="btn btn2 col-lg-3">Donate</a>
                        </div>


                    </div>
                </div>

                <div class="card card-about-me">
                    <div class="header">
                        <h2>ABOUT <?php echo htmlspecialchars($club['name']) ?></h2>
                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 512 512">
                                        <polygon fill="var(--ci-primary-color, currentColor)" points="368 350.643 256 413.643 144 350.643 144 284.081 112 266.303 112 369.357 256 450.357 400 369.357 400 266.303 368 284.081 368 350.643" class="ci-primary" />
                                        <path fill="var(--ci-primary-color, currentColor)" d="M256,45.977,32,162.125v27.734L256,314.3,448,207.637V296h32V162.125ZM416,188.808l-32,17.777L256,277.7,128,206.585,96,188.808,73.821,176.486,256,82.023l182.179,94.463Z" class="ci-primary" />
                                    </svg>
                                    Education
                                </div>
                                <div class="content">
                                    ENSAM CASABLANCA
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="23px" height="23px" viewBox="0 0 368.666 368.666" style="enable-background:new 0 0 368.666 368.666;" xml:space="preserve">
                                        <path d="M184.333,0C102.011,0,35.037,66.974,35.037,149.297c0,33.968,11.132,65.959,32.193,92.515     C94.5,276.195,173.8,357.833,177.164,361.291l7.169,7.375l7.17-7.374c3.363-3.459,82.688-85.116,109.963-119.51     c21.042-26.534,32.164-58.515,32.164-92.485C333.63,66.974,266.656,0,184.333,0z M285.797,229.355     c-21.957,27.687-80.921,89.278-101.463,110.581c-20.54-21.302-79.482-82.875-101.434-110.552     C64.67,206.4,55.037,178.707,55.037,149.297C55.037,78.002,113.039,20,184.333,20S313.63,78.002,313.63,149.297     C313.63,178.708,304.005,206.392,285.797,229.355z" />
                                        <path d="M184.333,59.265c-48.729,0-88.374,39.645-88.374,88.374s39.644,88.374,88.374,88.374s88.374-39.644,88.374-88.374     C272.708,98.909,233.063,59.265,184.333,59.265z M184.333,216.013c-37.701,0-68.374-30.672-68.374-68.374     c0-37.702,30.672-68.374,68.374-68.374c37.702,0,68.374,30.672,68.374,68.374C252.708,185.34,222.034,216.013,184.333,216.013z" />
                                        <polygon points="180.672,154.314 155.56,134.334 143.107,149.986 183.797,182.357 227.13,128.423 211.537,115.897    " />
                                    </svg>
                                    Location
                                </div>
                                <div class="content">
                                    150 Avenue Nile Sidi Othman، Casablanca 20670
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="23px" height="23px" viewBox="0 0 196.081 196.081" style="enable-background:new 0 0 196.081 196.081;" xml:space="preserve">
                                        <path d="M168.462,69.594l-14.768-10.891l0.546-0.741c2.457-3.334,1.748-8.028-1.585-10.486L137.89,36.586l1.191-1.617  c2.458-3.334,1.747-8.029-1.587-10.487L116.689,9.143c-1.601-1.181-3.602-1.679-5.572-1.379c-1.967,0.297-3.734,1.364-4.915,2.965  l-1.193,1.619L90.243,1.463c-3.332-2.457-8.028-1.748-10.487,1.586L61.901,27.263l-5.164-2.762c-1.857-0.993-4.047-1.16-6.032-0.459  c-1.986,0.701-3.586,2.204-4.409,4.142L25.166,77.966c-0.999,2.354-0.73,5.053,0.712,7.164l38.724,56.641l-6.147,45.709  c-0.552,4.105,2.329,7.88,6.434,8.433c0.339,0.045,0.676,0.068,1.009,0.068c3.698,0,6.917-2.735,7.424-6.501l6.53-48.564  c0.247-1.838-0.195-3.702-1.242-5.232L40.577,80.051l16.322-38.453l42.072,22.501l-5.313,7.207l-14.77-10.889  c-3.334-2.458-8.029-1.749-10.487,1.586c-2.458,3.334-1.748,8.029,1.586,10.487L90.794,87.83c0,0.001,0.001,0.001,0.002,0.001  l20.797,15.337c0.001,0.001,0.002,0.001,0.003,0.002l20.807,15.336c1.34,0.988,2.898,1.463,4.444,1.463  c1.24,0,2.468-0.317,3.57-0.913l-1.014,8.392l-14.39,15.611c-1.371,1.488-2.084,3.467-1.975,5.488l2.185,40.439  c0.216,3.999,3.525,7.096,7.482,7.095c0.137,0,0.273-0.003,0.411-0.011c4.137-0.224,7.309-3.758,7.085-7.894l-2.014-37.279  l13.885-15.063c1.066-1.157,1.742-2.621,1.932-4.183l4.31-35.655l11.733-15.916C172.505,76.747,171.796,72.052,168.462,69.594z   M87.378,17.987l8.729,6.435L84.933,39.581l-9.666-5.169L87.378,17.987z M98.299,46.729l15.527-21.062l8.731,6.438l-14.592,19.794  L98.299,46.729z M116.827,65.158C116.827,65.158,116.828,65.158,116.827,65.158l1.111-1.507L128.99,48.66l8.728,6.437l-0.513,0.696  c-0.012,0.015-0.025,0.029-0.036,0.044L114.46,86.644l-8.729-6.436L116.827,65.158z M135.266,101.982l-8.732-6.436l18.259-24.769  l8.731,6.438l-8.534,11.576l-0.001,0.002L135.266,101.982z" />
                                    </svg>
                                    center of interest
                                </div>
                                <div class="content">
                                    <?php
                                    foreach (tags($club['tags']) as $tag) {
                                    ?>
                                        <span class="label bg-blue"><?php echo $tag; ?></span>
                                    <?php } ?>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 24 24" fill="none">
                                        <path d="M8 14L16 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8 10L10 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8 18L12 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10 3H6C4.89543 3 4 3.89543 4 5V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V5C20 3.89543 19.1046 3 18 3H14.5M10 3V1M10 3V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Our Vision
                                </div>
                                <div class="content vision">
                                    &emsp;<?php echo htmlspecialchars($club['description']); ?>
                                </div>
                                <?php
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if (isset($_SESSION['id']) && $_SESSION['id'] === $club['president']) { ?>
                    <form action="/delete-club" method="POST">
                        <div class="card card-about-me">
                            <div class="row justify-content-center">

                                <input type="hidden" name="club" value="<?php echo $club['id'] ?>">
                                <button class="btn btn2 mt-2 mb-2 mr-1 update-input btn-danger" name="delete" type="submit">Delete</button>
                                <a href="<?php echo '/edit-club:' . htmlspecialchars($club['id']); ?>" class="btn btn2 mt-2 mb-2 update-input btn-success" name="update">Edit</a>

                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>

            <!-- body event -->
            <div class="col-xs-12 col-sm-8">
                <div class="card">
                    <div class="body">

                        <div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="actualities-tab" data-toggle="tab" href="#actualities" role="tab" aria-controls="actualities" aria-selected="false">Actualities</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="feedback-tab" data-toggle="tab" href="#feedback" role="tab" aria-controls="feedback" aria-selected="false">Feedback</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="panel panel-default panel-post">
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-heading">
                                                    <p>&emsp;<?php echo htmlspecialchars($club['description']); ?></p>
                                                </div>
                                                <div class="post-content">
                                                    <img loading="lazy" src="<?php echo htmlspecialchars($club['image']); ?>" class="img-responsive" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="actualities" role="tabpanel" aria-labelledby="actualities-tab">
                                    <!-- start post -->
                                    <?php
                                    $posts_arr = [];
                                    foreach ($posts as $post) {
                                        // get author
                                        $author = getStudent($db, $post['student_id']);
                                    ?>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="<?php echo '/profile:' . $author['id']; ?>">
                                                            <img loading="lazy" src="<?php echo htmlspecialchars($author['image']); ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="<?php echo '/profile:' . $author['id']; ?>">
                                                                <?php echo htmlspecialchars($author['firstname']) . ' ' . htmlspecialchars($author['lastname']); ?>
                                                            </a>
                                                        </h4>
                                                        <?php echo htmlspecialchars($post['creation_date']); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                                                        <p>&emsp;<?php echo htmlspecialchars($post['post']); ?></p>
                                                    </div>
                                                    <div class="post-content">
                                                        <?php
                                                        $arr_media = explode('|-@-|', $post['media']);
                                                        if (count($arr_media) > 1) { ?>
                                                            <iframe class="mb-2" width="100%" height="450px" src="<?php echo htmlspecialchars($arr_media[0]); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            <img loading="lazy" src="<?php echo htmlspecialchars($arr_media[1]); ?>" class="img-responsive" />
                                                        <?php } elseif (!file_exists($post['media'])) { ?>
                                                            <iframe width="100%" height="450px" src="<?php echo htmlspecialchars($post['media']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        <?php } else { ?>
                                                            <img loading="lazy" src="<?php echo htmlspecialchars($post['media']); ?>" class="img-responsive" />
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (isset($_SESSION['id'])) { ?>
                                                <div class="panel-footer">
                                                    <ul>
                                                        <li>
                                                            <?php
                                                            $resultLikes = getPostlikes($db, $post['id']);
                                                            $resultsLikes = count($resultLikes);
                                                            $likesFromMe = getPostlikesFromUser($db, $post['id'], $_SESSION['id']);
                                                            if (count($likesFromMe) === 1) { ?>
                                                                <!-- user already likes the post -->
                                                                <svg data-id="<?php echo $post['id']; ?>" class="like hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 460.958 460.958" style="enable-background:new 0 0 460.958 460.958;" xml:space="preserve">
                                                                    <path d="M337.843,23.957c-45.74,0-86.155,25.047-107.364,62.788c-21.209-37.741-61.623-62.788-107.364-62.788    C55.229,23.957,0,79.186,0,147.072c0,54.355,37.736,119.46,112.16,193.506c54.115,53.84,107.363,92.031,109.603,93.631    c2.607,1.861,5.662,2.792,8.716,2.792s6.109-0.93,8.715-2.792c2.241-1.6,55.489-39.791,109.604-93.631    c74.424-74.046,112.16-139.151,112.16-193.506C460.958,79.186,405.729,23.957,337.843,23.957z M327.919,319.032    c-39.843,39.681-80.171,71.279-97.44,84.307c-17.269-13.029-57.597-44.626-97.44-84.307C65.63,251.899,30,192.436,30,147.072    c0-51.344,41.771-93.115,93.115-93.115c47.279,0,87.03,35.369,92.464,82.271c0.876,7.565,7.284,13.273,14.9,13.273    c7.616,0,14.023-5.708,14.9-13.273c5.435-46.902,45.185-82.271,92.464-82.271c51.344,0,93.115,41.771,93.115,93.115    C430.958,192.436,395.328,251.899,327.919,319.032z" />
                                                                </svg>
                                                                <svg data-id="<?php echo $post['id']; ?>" class="fill-love unlike " xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 107.39">
                                                                    <defs>
                                                                        <style>
                                                                            .fill-love {
                                                                                fill: red;
                                                                                fill-rule: evenodd;
                                                                            }
                                                                        </style>
                                                                    </defs>
                                                                    <title>red-heart</title>
                                                                    <path class="cls-1" d="M60.83,17.18c8-8.35,13.62-15.57,26-17C110-2.46,131.27,21.26,119.57,44.61c-3.33,6.65-10.11,14.56-17.61,22.32-8.23,8.52-17.34,16.87-23.72,23.2l-17.4,17.26L46.46,93.55C29.16,76.89,1,55.92,0,29.94-.63,11.74,13.73.08,30.25.29c14.76.2,21,7.54,30.58,16.89Z" />
                                                                </svg>
                                                            <?php } else { ?>
                                                                <!-- user has not yet liked post -->
                                                                <svg data-id="<?php echo $post['id']; ?>" class="like " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 460.958 460.958" style="cursor:pointer; enable-background:new 0 0 460.958 460.958;" xml:space="preserve">
                                                                    <path d="M337.843,23.957c-45.74,0-86.155,25.047-107.364,62.788c-21.209-37.741-61.623-62.788-107.364-62.788    C55.229,23.957,0,79.186,0,147.072c0,54.355,37.736,119.46,112.16,193.506c54.115,53.84,107.363,92.031,109.603,93.631    c2.607,1.861,5.662,2.792,8.716,2.792s6.109-0.93,8.715-2.792c2.241-1.6,55.489-39.791,109.604-93.631    c74.424-74.046,112.16-139.151,112.16-193.506C460.958,79.186,405.729,23.957,337.843,23.957z M327.919,319.032    c-39.843,39.681-80.171,71.279-97.44,84.307c-17.269-13.029-57.597-44.626-97.44-84.307C65.63,251.899,30,192.436,30,147.072    c0-51.344,41.771-93.115,93.115-93.115c47.279,0,87.03,35.369,92.464,82.271c0.876,7.565,7.284,13.273,14.9,13.273    c7.616,0,14.023-5.708,14.9-13.273c5.435-46.902,45.185-82.271,92.464-82.271c51.344,0,93.115,41.771,93.115,93.115    C430.958,192.436,395.328,251.899,327.919,319.032z" />
                                                                </svg>
                                                                <svg data-id="<?php echo $post['id']; ?>" class="fill-love unlike hide" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 107.39">
                                                                    <defs>
                                                                        <style>
                                                                            .fill-love {
                                                                                fill: red;
                                                                                fill-rule: evenodd;
                                                                            }
                                                                        </style>
                                                                    </defs>
                                                                    <title>red-heart</title>
                                                                    <path class="cls-1" d="M60.83,17.18c8-8.35,13.62-15.57,26-17C110-2.46,131.27,21.26,119.57,44.61c-3.33,6.65-10.11,14.56-17.61,22.32-8.23,8.52-17.34,16.87-23.72,23.2l-17.4,17.26L46.46,93.55C29.16,76.89,1,55.92,0,29.94-.63,11.74,13.73.08,30.25.29c14.76.2,21,7.54,30.58,16.89Z" />
                                                                </svg>
                                                            <?php } ?>

                                                            <span class="likes_count"> <?php echo htmlspecialchars($resultsLikes); ?> </span>&nbsp; Likes

                                                        </li>
                                                        <li>
                                                            <?php
                                                            $resultCmmnt = getPostComments($db, $post['id']);
                                                            $resulstCmmnts = count($resultCmmnt);
                                                            ?>

                                                            <span class="cmmnt_reaction">
                                                            <svg  xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24">
                                                                <path d="M12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,0-1.41A8,8,0,1,1,12,20Z" />
                                                            </svg>
                                                            <span class="comments_count"><?php echo htmlspecialchars($resulstCmmnts); ?></span>Comments
                                                            </span>

                                                        </li>
                                                        <li>

                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                                                                <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30   S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z" />
                                                                <path d="M39,20c3.309,0,6-2.691,6-6s-2.691-6-6-6c-3.131,0-5.705,2.411-5.973,5.474L18.961,23.788C18.086,23.289,17.077,23,16,23   c-3.309,0-6,2.691-6,6s2.691,6,6,6c1.077,0,2.086-0.289,2.961-0.788l14.065,10.314C33.295,47.589,35.869,50,39,50   c3.309,0,6-2.691,6-6s-2.691-6-6-6c-2.69,0-4.972,1.78-5.731,4.223l-12.716-9.325C21.452,31.848,22,30.488,22,29   s-0.548-2.848-1.448-3.898l12.716-9.325C34.028,18.22,36.31,20,39,20z M39,10c2.206,0,4,1.794,4,4s-1.794,4-4,4s-4-1.794-4-4   S36.794,10,39,10z M12,29c0-2.206,1.794-4,4-4s4,1.794,4,4s-1.794,4-4,4S12,31.206,12,29z M39,40c2.206,0,4,1.794,4,4s-1.794,4-4,4   s-4-1.794-4-4S36.794,40,39,40z" />
                                                            </svg>
                                                            <span>Share</span>

                                                        </li>
                                                    </ul>
                                                    <div class="comments-section mt-3">
                                                        <?php foreach ($resultCmmnt as $comment) { ?>
                                                            <div class="form-line">
                                                                <span class="form-control"><?php echo $comment['comment']; ?></span>
                                                            </div>

                                                        <?php } ?>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control commentText" placeholder="Type a comment" />
                                                            <button data-id="<?php echo $post['id']; ?>" type="submit" class="btn commnt_bttn cmmntbtn">Send</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php }
                                    if (isset($_SESSION['id']) && $_SESSION['id'] === $club['president']) {
                                    ?>
                                        <a href="<?php echo '/new-post:' . $club['id'] ?>" class="mt-3 btn btn2 newPost">New Post</a><?php } ?>
                                </div>
                                <div class="tab-pane fade" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">
                                    <!--Modal Content-->
                                    <div class="modal-content">
                                        <!-- Modal Header-->
                                        <div class="modal-header">
                                            <h3>Feedback</h3>
                                        </div>
                                        <!-- Modal Body-->
                                        <div class="modal-body text-center">
                                            <h3>Your opinion matters</h3>
                                            <h5>Help us improve the level of our activities! <strong>Give us your
                                                    feedback.</strong></h5>
                                        </div>
                                        <!-- <hr> -->
                                        <form action="<?php echo '/club:' . $id ?>" method="POST" id="feedback_form" class="needs-validation" novalidate>
                                            <div class=" rating-section mt-4">
                                                <h6 class="text-center mb-4">Your Rating</h6>
                                                <div class="d-flex justify-content-center ml-4 mr-4">
                                                    <div class="p-2">
                                                        <input name="feedback" type="radio" class="btn-check" value="very-good" id="very-good" autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="very-good">Very
                                                            good</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <input name="feedback" type="radio" class="btn-check" value="good" id="good" autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="good">Good</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <input name="feedback" type="radio" class="btn-check" value="mediocre" id="mediocre" autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="mediocre">Mediocre</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <input name="feedback" type="radio" class="btn-check" value="bad" id="bad" autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="bad">Bad</label>
                                                    </div>
                                                    <div class="p-2">
                                                        <input name="feedback" type="radio" class="btn-check" value="very-bad" id="very-bad" autocomplete="off">
                                                        <label class="btn btn-outline-primary" for="very-bad">Very
                                                            Bad</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-4">
                                                <h4>What could we improve?</h4>
                                            </div>
                                            <textarea name="comment" class="text-feedback" type="textarea" placeholder="Tell Us Your Opinion" rows="1"></textarea>
                                            <!-- modal footer -->
                                            <div class="modal-footer">
                                                <a href="#" class="btn3 btn" data-dismiss="modal">Cancel</a>
                                                <a href="javascript:{}" onclick="document.getElementById('feedback_form').submit();" name="send" class="btn2 btn">Send</a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once('components/footer_1.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function() {
        // when the user clicks on like
        $('.like').on('click', function() {
            var postid = $(this).data('id');
            $post = $(this);
            $.ajax({
                url: '/like',
                type: 'POST',
                data: {
                    'liked': 1,
                    'postid': postid
                },
                success: function(response) {
                    $post.parent().find('span.likes_count').text(response);
                    $post.addClass('hide');
                    $post.siblings().removeClass('hide');
                }
            });
        });

        // when the user clicks on unlike
        $('.unlike').on('click', function() {
            var postid = $(this).data('id');
            $post = $(this);

            $.ajax({
                url: '/like',
                type: 'POST',
                data: {
                    'unliked': 1,
                    'postid': postid
                },
                success: function(response) {
                    $post.parent().find('span.likes_count').text(response);
                    $post.addClass('hide');
                    $post.siblings().removeClass('hide');
                }
            });
        });

        // comments
        $('.comments-section').hide();
        $('.cmmntbtn').on('click', function() {
            $('.cmmntbtn').hide();
            var postid = $(this).data('id');
            $post = $(this);
            $.ajax({
                url: '/comment',
                type: 'POST',
                data: {
                    'comment': $('.commentText').val(),
                    'postid': postid
                },
                success: function(response) {

                    $('.comments_count').text(response);
                    $('.commentText').val("");
                    $('.cmmntbtn').show();
                }
            });
        });
        $('.cmmnt_reaction').on('click', function(){
            if($('.comments-section').is(':hidden'))
            $('.comments-section').show();
            else $('.comments-section').hide();
        });
    });
</script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</html>