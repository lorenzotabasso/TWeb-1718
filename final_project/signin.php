<!-- Signin Form -->

<?php
require('include/header.php');
?>

<div class="limiter">
    <div class="form-container">
        <div class="form-wrap">
            <form action="submit.php" method="post" name="form-signin" id="form-signin" autocomplete="off">

                <span class="form-title">Registration form</span>

                <div class="form-field">
                    <label for="Name">Name</label>
                    <input type="text" name="Name" id="signin-name" class="form-control" required pattern=".{1,100}" autofocus>
                </div>
                <div class="form-field">
                    <label for="Surname">Surname</label>
                    <input type="text" name="Surname" id="signin-surname" class="form-control" required pattern=".{1,100}" autofocus>
                </div>
                <div class="form-field">
                    <label for="email">Email address</label>
                    <input type="email" name="Email" id="signin-email" class="form-control" required>
                </div>
                <div class="form-field">
                    <label for="Password">New password</label>
                    <input type="password" name="Password" id="signin-password" placeholder="Almeno 6 caratteri" class="form-control">
                </div>
                <div id="display-error" class="alert alert-danger fade in"></div><!-- Display Error Container -->



                <div class="form-submit-container">
                    <div class="form-submit-wrap">
                        <button class="form-submit-button" type="submit">Signin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('include/footer.php');?>
