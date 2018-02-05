<?php

/*PHP Login and registration script */
require('inc/config.php');
require('inc/functions.php');

/*Check for authentication otherwise user will be redirects to index.php page.*/
if (!isset($_SESSION['UserData'])) {
    header("location:index.php");
    exit("Error, redirectering to login!");
}

require('include/header.php');
require('include/nav.php');
?>

<body>
<div class="container-fluid home" id="top">
  <div class="container search">
    <nav class="animated slideInUp wow">
      <div class="nav-wrapper">
        <div class="input-field">
			<input id="search" class="searching" type="search" name='searched' required>
            <label for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
        </div>
        <div class="center-align">
            <button type="submit" name="search" class="blue waves-light miaw waves-effect btn hide" id="search_btn">Search</button>
        </div> 
      </div>
    </nav>
  </div>
</div>
<div class="row">
	<div class="col s12 m2 center-align cat">
		<div class="collection card">
			<div id="loadCategories">
			</div>
		</div>
	</div>
</div>
<div class="row" id="searched">	
	<div id="loadProducts">
	</div> 
</div>
   

<a href="logout.php">Logout</a> <!-- logout -->

</body>
<?php
require('include/footer.php');
?>

