<?php
require_once('assets/php/functions.php');
include('assets/pages/header.php');
include('assets/pages/navbar.php');
if (isset($_GET['login'])) {
    if ($_SESSION['auth']) {
        header("location: ?home");
    }
    showPage('header', ['page_title' => 'Login']);
    showPage('login', ['page_title' => 'Login']);
} else if (isset($_GET['home'])) {
    showPage('header', ['page_title' => 'Home']);

    showPage('home', ['page_title' => 'Home']);
} else if (isset($_GET['features'])) {
    showPage('header', ['page_title' => 'Features']);

    showPage('features', ['page_title' => 'Features']);
} else if (isset($_GET['integrations'])) {
    showPage('header', ['page_title' => 'Integrations']);

    showPage('integrations', ['page_title' => 'Integrations']);
} else if (isset($_GET['pricing'])) {
    showPage('header', ['page_title' => 'pricing']);

    showPage('pricing', ['page_title' => 'pricing']);
} else if (isset($_GET['contacts'])) {
    showPage('header', ['page_title' => 'contacts']);

    showPage('contacts', ['page_title' => 'contact us']);
} else if (isset($_GET['forgotten-password'])) {
    showPage('header', ['page_title' => 'Forgot password']);
    showPage('forgotten-password', ['page_title' => 'Forgot password']);
} else if (isset($_GET['enterotp'])) {
    showPage('header', ['page_title' => 'Enter otp']);
    showPage('enterotp', ['page_title' => 'Enter otp']);
} else if (!isset($_GET['same_page_login'])) {
    if (isset($_SESSION['auth'])) {
        header("location: ?home");
    } else {
        showPage('header', ['page_title' => 'Sign up']);

        showPage('Signup', ['page_title' => 'Signup']);
    }
}
// echo $_SESSION['auth'];
// print_r($_SESSION);
include('assets/pages/footer.php');
