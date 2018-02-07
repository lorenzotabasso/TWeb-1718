<?php

if(!isset($_SESSION)){
    session_start();
} else {
    session_unset();
    session_destroy();
}

require('include/header.php');
?>

<!-- Login Form -->
<div class="limiter">
    <div class="form-container">
        <div class="form-wrap">
            <form action="submit.php" method="POST" name="form-login" id="form-login" autocomplete="off">

                <span class="form-title">Login</span>

                <div class="form-field">
                    <input type="email" name="Email" id="login-email" placeholder="Email address" required autofocus autocomplete="on">
                </div>

                <div class="form-field">
                    <input type="password" name="Password" id="login-password" placeholder="Password">
                </div>

				<div id="display_error"></div> <!-- for displaying login errors -->

                <div class="form-submit-container">
                    <div class="form-submit-wrap">
                        <button class="form-submit-button" type="submit">Login</button>
                    </div>
                </div>

                <div id="form-login-signup">
                    <span id="form-login-text-inside">Don't have an account? <a href="signin.php">Signup</a> </span>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('include/footer.php');?>
