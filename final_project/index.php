<!-- The file is needed,error if not found -->
<?php
require('include/header.php');
?>

<!-- Login Form -->
<form method="POST" name="login_form" id="login_form" autocomplete="off">
    <h2 class="form-signin-heading">Login</h2>

    <label for="Email">Email address</label>
    <input type="email" name="Email" id="login_email" placeholder="Email address" required autofocus autocomplete="on">

    <label for="Password" >Password</label>
    <input type="password" name="Password" id="login_password" placeholder="Password">

    <button type="submit">Login</button>
</form>

<!-- Registration Form -->
<!--  <div class="modal fade" role="dialog" id="registration_modal">-->
<!--    <div class="modal-dialog">-->
<!--      <div class="modal-content">-->
<!--
<!--        <!-- HTML Form -->
<!--        <form action="submit.php" method="post" name="registration_form" id="registration_form" autocomplete="off">-->
<!--        <div class="modal-header">-->
<!--          <h4 class="modal-title">Registration form</h4>-->
<!--        </div>-->
<!--        <!-- Modal Body -->
<!--        <div class="modal-body">-->
<!--            <div class="form-group">-->
<!--                <label for="Name">Name</label>-->
<!--                <input type="text" name="Name" id="Name" class="form-control" required pattern=".{4,100}" autofocus>-->
<!--            </div>-->
<!--			<div class="form-group">-->
<!--                <label for="Surname">Surname</label>-->
<!--                <input type="text" name="Surname" id="Surname" class="form-control" required pattern=".{2,100}" autofocus>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label for="email">Email address</label>-->
<!--                <input type="email" name="Email" id="registration_email" class="form-control" required>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label for="Password">New password</label>-->
<!--                <input type="password" name="Password" id="registration_password" class="form-control">-->
<!--            </div>-->
<!--                <div id="display_error" class="alert alert-danger fade in"></div><!-- Display Error Container -->
<!--        </div>-->
<!--
<!--        <!-- Modal Footer -->
<!--        <div class="modal-footer">-->
<!--        <input type="submit" class="btn btn-lg btn-success" value="Submit" id="submit">-->
<!--          <button type="button" class="btn  btn-lg  btn-default" data-dismiss="modal">Cancel</button>-->
<!--        </div>-->
<!--        </form>-->
<!--
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!-- /container -->

<?php require('include/footer.php');?>