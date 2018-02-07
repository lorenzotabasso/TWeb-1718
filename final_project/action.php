<?php
require('inc/config.php');

# populate the DOM of the home with all the categories
if(isset($_POST["category"])){
	$query = $db->query("SELECT id, name FROM category");
	
	if($query->rowCount() > 0){
		while($result = $query->fetch(PDO::FETCH_ASSOC)){
			$id_categorydb = $result['id'];
            $name_category = $result['name'];
			echo "<a href='#' class='collection-item ' cid='$id_categorydb'>$name_category</a>";
		}
	}
}

# populate the DOM of the home with all the product
if(isset($_POST["getProduct"])){
	
	$query = $db->query("SELECT id,name,price,thumbnail FROM product ORDER BY product.id_category");
	
    if ($query->rowCount() > 0) {
		
		$result = $query->fetchAll();
		$array = array();
		
		foreach($result as $key => $row) {
			$array[$key]['id'] = $row['id']; 
			$array[$key]['name'] = $row['name'];
			$array[$key]['price'] = $row['price'];
			$array[$key]['thumbnail'] = $row['thumbnail'];
		}
	
		echo json_encode($array);
	}
}


if(isset($_POST["getCart"])){
	$queryproduct = $db->query("SELECT product.name as 'name',
          product.id as 'id', product.price as 'price',
          category.name as 'category', command.id_user, command.statut,
          command.quantity as 'quantity'
			FROM category, product, command
			WHERE command.id_produit = product.id AND product.id_category = category.id AND command.statut = 'ordered'");
          
    if ($queryproduct->rowCount() > 0) {
          
		$result = $queryproduct->fetchAll();
		$array = array();
		
		foreach($result as $key => $row) {
			$array[$key]['id'] = $row['id']; 
			$array[$key]['name'] = $row['name'];
			$array[$key]['category'] = $row['category'];
			$array[$key]['quantity'] = $row['quantity'];
			$array[$key]['price'] = $row['price'];
		}
		
		echo json_encode($array);
	}
}


if(isset($_POST["get_seleted_Category"])|| isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$query = $db->query( "SELECT * FROM product WHERE product.id_category = '$id'");
	}
	else {
		$keyword = $_POST["keyword"];
		$query = $db->query( "SELECT product.id,product.name,product.price,product.thumbnail
							FROM product JOIN category
							ON product.id_category=category.id
							WHERE product.name LIKE '%$keyword%' 
							OR category.name LIKE '%$keyword%'
							ORDER BY id DESC"); 
	}

	$result = $query->fetchAll();
	$array = array();
		
	foreach($result as $key => $row) {
	    $array[$key]['id'] = $row['id'];
	    $array[$key]['name'] = $row['name'];
	    $array[$key]['price'] = $row['price'];
	    $array[$key]['thumbnail'] = $row['thumbnail'];
	}
	
	echo json_encode($array);
}

if (isset($_POST['addToProduct'])) {

    $quantity = $_POST["quantity"];
		
    $p_id = $_POST["proId"];
    if(isset($_SESSION['UserData'])){
        $user_id = $_SESSION['UserData'];
        //inserting into command

        $querybuy = $db->query("INSERT INTO command(id_produit, quantity, statut, id_user) VALUES ('$p_id','$quantity ','ordered', '$user_id')");
        $_SESSION['item'] += 1;
    }
}

if(isset($_POST["cart_count"]) AND isset($_SESSION["UserData"])){
    $uid = $_SESSION["UserData"];
    $sql = $db->query("SELECT * FROM command WHERE id_user = '$uid' AND statut != 'paid'");
    $rowN = $sql->rowCount();

    echo json_encode($rowN);
}

?>