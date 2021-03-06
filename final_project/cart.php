<?php

require('inc/config.php');
require('inc/functions.php');

if (!isset($_SESSION['UserData'])) {
    header("location:index.php");
    exit("Error, redirectering to login!");
}

require ('include/header.php');
require('include/nav.php');
 ?>
 
 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="home.php" class="breadcrumb">Home</a>
            <a href="cart.php" class="breadcrumb">Cart</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container scroll info">
     <table class="highlight">
        <thead>
          <tr>
              <th data-field="name">Item Name</th>
              <th data-field="category">Category</th>
              <th data-field="price">Price</th>
              <th data-field="quantity">Quantity</th>
              <th data-field="total">Total</th>
          </tr>
        </thead>
        <tbody id="loadCart">
        </tbody>
      </table>
      <div class="right-align">
        <button id="spinner"
        class='btn-large button-rounded waves-effect waves-light'>
         Check out <i class="material-icons right">payment</i></button>
      </div>
   </div>

<?php require ('include/footer.php'); ?>