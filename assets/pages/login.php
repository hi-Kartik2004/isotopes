<?php
require_once('assets/php/functions.php');
// session_start();
if (isset($_SESSION['userdata']) && isset($_SESSION['auth'])) {
    header("location: ../?home");
}

?>

<section class="py-4 py-md-5 my-5">

    <div class="container py-md-5">
        <div class="row">
            <div class="col-md-6 text-center"><img class="img-fluid w-100" src="assets/img/illustrations/login.svg"></div>
            <div class="col-md-5 col-xl-4 text-center text-md-start">
                <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Login</strong><br></span></h2>
                <span><?php showError(); ?></span>
                <form action="assets/php/actions.php?user-login-try" method="post">
                    <div class="mb-3"><input class="shadow form-control" type="text" name="username" placeholder="Username" required></div>
                    <div class="mb-3"><input class="shadow form-control" type="password" name="password" placeholder="Password" required></div>
                    <div class="mb-5"><button class="btn btn-primary shadow" type="submit">Log in</button></div>
                    <p class="text-muted"><a href="?forgotten-password">Forgot your password?</a></p>
                </form>

            </div>
        </div>
    </div>
    </form>
</section>
<?php
unset($_SESSION['error_status']);
?>