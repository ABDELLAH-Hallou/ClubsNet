<?php
//  select from clubs
$clubs = $db->query('SELECT id, name FROM club');
$clubs->execute();
$clubs_array = $clubs->fetchAll();
?>
<footer id="footer" class="footer_area pt-5">
    <div class="container pt-5">
        <div class="row  text-lg-left text-center">
            <div class="col-lg-4 col-sm-6">
                <aside class="ab_widget">
                    <div class="f_title">
                        <h3>&#xFEFF;About</h3>
                    </div>
                    <p>In parallel to technical training and scientific research, the National School of Arts and
                        Crafts ENSAM CASABLANCA offers a range of cultural, sporting, entrepreneurial, and social
                        activities recognizing the invaluable contribution of the latter in guaranteeing
                        professional integration. favorable to Gadz'arts wanting to be versatile and open to the
                        socio-cultural and socio-economic world.</p>
            </div>

            <!-- second column -->
            <div class="col-lg-3 col-sm-6">
                <aside>
                    <div class="f_title">
                        <h3>Links</h3>
                    </div>
                    <ul class="list-unstyled p-0">
                        <li><a style="text-decoration:none;" class="link-footer mb-4" target="_blank" href="/devteam">development team</a></li>
                        <li><a style="text-decoration:none;" class="link-footer mb-4" target="_blank" href="/contact">Contact</a></li>
                    </ul>
                    <div class="f_title">
                        <h3>Clubs</h3>
                    </div>
                    <ul class="list-unstyled p-0">
                        <?php foreach ($clubs_array as $club) { ?>
                            <li><a style="text-decoration:none;" class="link-footer mb-4" target="_blank" href="<?php echo "/club:".htmlspecialchars(strtolower($club['id'])); ?>"><?php echo htmlspecialchars(strtolower($club['name'])); ?></a></li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>
            <!-- second row  -->

            <div class="col-lg-3 col-sm-6">
                <aside>
                    <div class="f_title">
                        <h3>Contact Us</h3>
                    </div>
                    <ul class="list-unstyled">
                        <li class="link-footer mb-2">
                            <svg class="icn size-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="building" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z">
                                </path>
                            </svg>
                            150 Avenue Nile Sidi Othman، Casablanca 20670
                        </li>
                        <li class="link-footer mb-2">
                            <svg class="icn size-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
                                </path>
                            </svg>
                            <span dir="ltr">+212 52 25 64 222</span>
                        </li>
                        <li class="link-footer mb-2 text-lowercase">
                            <svg class="icn size-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                                </path>
                            </svg>
                            <a style="text-decoration:none;" href="mailto:contact@ensam-casa.ma">contact@ensam-casa.ma</a>
                        </li>
                    </ul>
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="270" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=150%20Avenue%20Nile%20Sidi%20Othman%D8%8C%20Casablanca%2020670&t=k&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2piratebay.org"></a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 250px;
                                    width: 270px;
                                }
                            </style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 250px;
                                    width: 270px;
                                }
                            </style>
                        </div>
                    </div>
                </aside>

                </aside>
            </div>
            <!-- third row -->

            <div class="col-lg-2">
                <aside>
                    <div class="f_title">
                        <h3>Follow Us</h3>
                    </div>
                    <ul class="list">
                        <li>
                            <a target="_blank" href="https://www.facebook.com/Dolphiny-106934111545363">
                                <svg class="icn size-22" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="470.513px" height="470.513px" viewBox="0 0 470.513 470.513" xml:space="preserve">
                                    <g>
                                        <path d="M271.521,154.17v-40.541c0-6.086,0.28-10.8,0.849-14.13c0.567-3.335,1.857-6.615,3.859-9.853 c1.999-3.236,5.236-5.47,9.706-6.708c4.476-1.24,10.424-1.858,17.85-1.858h40.539V0h-64.809c-37.5,0-64.433,8.897-80.803,26.691 c-16.368,17.798-24.551,44.014-24.551,78.658v48.82h-48.542v81.086h48.539v235.256h97.362V235.256h64.805l8.566-81.086H271.521z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.instagram.com/dolphiny_learning/">
                                <svg class="icn size-22" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                    </path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- last row -->
            <div style="color: #999;" class="col-12 text-center pt-5">
                <p>Copyright © 2021 EnsamXclub. All rights reserved</p>
            </div>
        </div>
    </div>
</footer>

</body>