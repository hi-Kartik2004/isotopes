
<section class="py-4 py-md-5 my-5">
    <form action="assets/php/actions.php?try-signup" method="post">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 text-center"><img class="img-fluid w-100" src="assets/img/illustrations/register.svg"></div>
                <div class="col-md-5 col-xl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Sign up</strong></span></h2>
                    <span><?php showError(); ?></span>
                    <div class="right-content-wrapper">
                        <form method="post">
                            <div class="left-wrapper">
                                <div class="mb-3"><input class="shadow-sm form-control" type="text" name="username" placeholder="Username" required value=<?php if (isset($_SESSION['username'])) {
                                                                                                                                                                echo $_SESSION['username'];
                                                                                                                                                            } else echo ""; ?>></div>
                                <div class="mb-3"><input class="shadow-sm form-control" type="email" name="email" placeholder="Email" value=<?php if (isset($_SESSION['email'])) {
                                                                                                                                                echo $_SESSION['email'];
                                                                                                                                            } else echo ""; ?>></div>
                                <div class="mb-3"><input class="shadow-sm form-control" type="text" name="farm_name" required required placeholder="farm_name" value=<?php if (isset($_SESSION['farm_name'])) {
                                                                                                                                                                            echo $_SESSION['farm_name'];
                                                                                                                                                                        } else echo ""; ?>></div>

                                <div class="mb-3"><input class="shadow-sm form-control" required type="text" name="first_name" placeholder="First  name" value=<?php if (isset($_SESSION['firstname'])) {
                                                                                                                                                                    echo $_SESSION['firstname'];
                                                                                                                                                                } else echo ""; ?>></div>
                            </div>
                            <div>
                                <div class="mb-3"><input required class="shadow-sm form-control" type="text" name="last_name" placeholder="Last name" value=<?php if (isset($_SESSION['lastname'])) {
                                                                                                                                                                echo $_SESSION['lastname'];
                                                                                                                                                            } else echo ""; ?>></div>
                                <div class="mb-3"><input required class="shadow-sm form-control" type="number" name="phone" min="1000000000" max="9999999999" placeholder="Phone number" value=<?php if (isset($_SESSION['phone'])) {
                                                                                                                                                                                                    echo $_SESSION['phone'];
                                                                                                                                                                                                } else echo ""; ?>></div>
                                <div>
                                    <div class="mb-3"><input required class="shadow-sm form-control" type="password" name="password" placeholder="Password"></div>
                                    <div required class="mb-3"><input required class="shadow-sm form-control" type="password" name="cpassword" placeholder="Repeat Password"></div>
                                    <div class="mb-5"><button class="btn btn-primary shadow" type="submit">Create account</button></div>
                                    <p class="text-muted">Have an account? <a href="?login">Log in&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <line x1="15" y1="16" x2="19" y2="12"></line>
                                                <line x1="15" y1="8" x2="19" y2="12"></line>
                                            </svg></a>&nbsp;</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
</section>

<?php
unset($_SESSION['error_status']);
?>