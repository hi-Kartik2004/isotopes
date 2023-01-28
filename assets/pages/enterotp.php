<section class="py-4 py-md-5 mt-5">
    <div class="container py-md-5">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 text-center">
                <img class="img-fluid w-100" src="assets/img/illustrations/desk.svg" />
            </div>
            <div class="col-md-5 col-xl-4 text-center text-md-start">
                <h2 class="display-6 fw-bold mb-4">
                    Enter <span class="underline">OTP</span>
                </h2>
                <p class="text-muted">
                    Enter the OTP sent to your phone number to verify user.
                </p>
                <span><?php showError(); ?></span>
                <form method="post" action="assets/php/actions.php?verifyotp">
                    <div class="mb-3">
                        <input class="shadow form-control" type="number" name="otp" placeholder="Enter OTP" min=1000 max=9999 required />
                    </div>
                    <div class="mb-5">
                        <button class="btn btn-primary shadow" type="submit">
                            Submit OTP
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
unset($_SESSION['error_status']);
?>