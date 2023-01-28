<?php
session_start();

?>

<section class="py-4 py-md-5 mt-5">
  <div class="container py-md-5">
    <div class="row d-flex align-items-center">
      <div class="col-md-6 text-center">
        <img class="img-fluid w-100" src="assets/img/illustrations/desk.svg" />
      </div>
      <div class="col-md-5 col-xl-4 text-center text-md-start">
        <h2 class="display-6 fw-bold mb-4">
          Forgot your <span class="underline">password</span>?
        </h2>
        <span><?php showError(); ?></span>
        <p class="text-muted">
          Enter the Phone number associated with your account and we'll send you a
          reset OTP.
        </p>
        <form method="post" action="assets/php/actions.php?forgotPassword">
          <div class="mb-3">
            <input class="shadow form-control" type="number" name="phone" placeholder="Phone number" min=1000000000 max=9999999999 required />
          </div>
          <div class="mb-5">
            <button class="btn btn-primary shadow" type="submit">
              Reset password
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