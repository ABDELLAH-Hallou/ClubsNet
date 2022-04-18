<?php
require 'vendor/autoload.php';
// cloudinary configuration
use Cloudinary\Configuration\Configuration;
// PHP image upload
use Cloudinary\Api\Upload\UploadApi;
// configure globally via a JSON object
Configuration::instance([
    'cloud' => [
        'cloud_name' => getenv('cloud_name'),
        'api_key' => getenv('api_key'),
        'api_secret' => getenv('api_secret')
    ],
    'url' => [
        'secure' => true
    ]
]);
// routes handling
$request = $_SERVER['REQUEST_URI'];
$arr_url = explode(':', $request);
$id;
if (is_numeric(end($arr_url))) {
    $id = end($arr_url);
}


$root = '/' . basename(__DIR__);
if (is_numeric(end($arr_url))) {
    switch ($request) {
            // dynamic routes
            // Club details
        case '/club:' . $id:
            try {
                require __DIR__ . '/views/details.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // Join Club
        case '/join-club:' . $id:
            try {
                require __DIR__ . '/views/formulaire.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/join-club?error=emptyinputs:' . $id:
            $error = 'emptyinputs';
            try {
                require __DIR__ . '/views/update_club.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // Check Out
        case '/checkout:' . $id:
            try {
                require __DIR__ . '/views/checkout.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // Edit Club
        case '/edit-club:' . $id:
            try {
                require __DIR__ . '/views/update_club.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/edit-club?error=emptyinputs:' . $id:
            $error = 'emptyinputs';
            try {
                require __DIR__ . '/views/update_club.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // User Profile
        case '/profile:' . $id:
            try {
                require __DIR__ . '/views/profile.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // New Post
        case '/new-post:' . $id:
            try {
                require __DIR__ . '/views/post.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // default
        default:
            http_response_code(404);
            try {
                require __DIR__ . '/views/404.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
    }
} else {
    switch ($request) {
        case '/':
            try {
                require __DIR__ . '/public/index.php';
            } catch (Exception $e) {
                // require __DIR__ . '/views/logs.php';
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '':
            try {
                require __DIR__ . '/public/index.php';
            } catch (Exception $e) {
                // require __DIR__ . '/views/logs.php';
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // login
        case '/login':
            try {
                require __DIR__ . '/views/login.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // script routes login
        case '/login-inc':
            try {
                require __DIR__ . '/controllers/authentication/login-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // login errors
        case '/login?error=wronginfo':
            $error = 'wronginfo';
            try {
                require __DIR__ . '/views/login.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/login?error=emptyinputs':
            $error = 'emptyinputs';
            try {
                require __DIR__ . '/views/login.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/logout-inc':
            try {
                require __DIR__ . '/controllers/authentication/logout-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // register
        case '/register':
            try {
                require __DIR__ . '/views/register.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // script routes register
        case '/register-inc':
            try {
                require __DIR__ . '/controllers/authentication/register-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // register errors
        case '/register?error=usernameexist':
            $error = 'usernameexist';
            try {
                require __DIR__ . '/views/register.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/register?error=Passordunmatch':
            $error = 'Passordunmatch';
            try {
                require __DIR__ . '/views/register.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/register?error=Passordisshort':
            $error = 'Passordisshort';
            try {
                require __DIR__ . '/views/register.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/register?error=invalidemail':
            $error = 'invalidemail';
            try {
                require __DIR__ . '/views/register.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/register?error=emptyinputs':
            $error = 'emptyinputs';
            try {
                require __DIR__ . '/views/register.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // log Out
        case '/logout-inc':
            try {
                require __DIR__ . '/controllers/authentication/logout-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // Contact
        case '/contact':
            try {
                require __DIR__ . '/views/contact.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // dev team
        case '/devteam':
            try {
                require __DIR__ . '/views/team.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // profile
        case '/profile':
            try {
                require __DIR__ . '/views/profile.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // Update profile
        case '/edit-profile':
            try {
                require __DIR__ . '/controllers/students/update.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // profile errors
        case '/profile?error=emptyinputs':
            $error = 'emptyinputs';
            try {
                require __DIR__ . '/views/profile.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/profile?error=Passordisshort':
            $error = 'Passordisshort';
            try {
                require __DIR__ . '/views/profile.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // create club
        case '/new-club':
            try {
                require __DIR__ . '/views/create_Club.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // new club script
        case '/addClub':
            try {
                require __DIR__ . '/controllers/club/addclub-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // add club errors
        case '/new-club?error=noimage':
            $error = 'noimage';
            try {
                require __DIR__ . '/views/create_Club.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/new-club?error=emptyinputs':
            $error = 'emptyinputs';
            try {
                require __DIR__ . '/views/create_Club.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/clubs':
            try {
                require __DIR__ . '/views/clubs.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/dashboard':
            try {
                require __DIR__ . '/views/dashboard.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/join-club-inc':
            try {
                require __DIR__ . '/controllers/club/formulaire-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/edit-club-inc':
            try {
                require __DIR__ . '/controllers/club/updateclub-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // Delete Club
        case '/delete-club':
            try {
                require __DIR__ . '/controllers/club/deleteclub-inc.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
        case '/like':
            try {
                require __DIR__ . '/controllers/posts/likes.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
            // default
        default:
            http_response_code(404);
            try {
                require __DIR__ . '/views/404.php';
            } catch (Exception $e) {
                echo $e->getMessage() . '</br>';
                print_r($e);
            }
            break;
    }
}
