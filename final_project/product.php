<?php

require('inc/config.php');
require('inc/functions.php');

# Check for authentication otherwise user will be redirects to index.php page.
if (!isset($_SESSION['UserData'])) {
    header("location:index.php");
    exit("Error, redirectering to login!");
}

require('include/header.php');
require('include/nav.php');

$id_product =$_GET['id'];

?>

<div class="container-fluid product">
  <div class="container">
   <div class="row">
     <div class="col s12 m6">
        <div class="card">
          <div class="card-image">

              <?php

              //get product
              $query = $db->query("SELECT id, name, price, description, id_picture, thumbnail FROM product WHERE id = '{$id_product}'");

              if ($query->rowCount() > 0) { // output data of each row
                  while($result = $query->fetch(PDO::FETCH_ASSOC)) {
                      $id_productdb = $result['id'];
                      $name_product = $result['name'];
                      $price_product = $result['price'];
                      $id_pic = $result['id_picture'];
                      $description = $result['description'];
                      $thumbnail_product = $result['thumbnail'];
                  }
              }

              ?>

            <img class="materialboxed" width="650" src="products/<?= $thumbnail_product; ?>" alt="">
          </div>
        </div>
     </div>

		 <div class="col s12 m6">
		   <form method="POST">
			   <h2><?= $name_product; ?></h2>
			   <div class="divider"></div>
			   <div class="stuff">
				<h3>Price</h3>
				<h5>$ <?= $price_product; ?></h5>
				   <p><?= $description; ?></p>
				  <div class="input-field col s12">
					<i class="material-icons prefix">shopping_basket</i>
					<input id="icon_prefix" type="number" name="quantity" min="1" class="validate" required>
					<label for="icon_prefix">Quantity</label>
				  </div>
				  <div class="center-align">
				   <button pid="<?= $id_product?>" id="addToCart" type="submit" name="buy" class="btn-large meh button-rounded waves-effect waves-light ">Add to Cart</button>
					</div>
			   </div>
			</form>
		 </div>

   </div>
  </div>
</div>
<?php
require('include/footer.php');


?>