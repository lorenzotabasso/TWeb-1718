/*Login or Registration Form Submit*/

$(document).ready(function() {
	
    $("#form-login").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "submit.php",
            data: {
                Email: document.getElementById('login-email').value, // Email in the form
                Password: document.getElementById('login-password').value // // Password in the form
            },
            cache: false,
            success: function(data) {
				var results = JSON.parse(data);
                if (results.error != '') {
					$("#display_error").show().html(results.error);
				} else {
					window.location.href = "home.php";
				}
			}
		})
	});

    $("#form-signin").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "submit.php",
            data: {
                Name: document.getElementById('signin-name').value, // Name in the form
                Surname: document.getElementById('signin-surname').value, // Surname in the form
                Email: document.getElementById('signin-email').value, // Email in the form
                Password: document.getElementById('signin-password').value // // Password in the form
            },
            cache: false,
            success: function() {
                window.location.href = "home.php"; // load the login page
            }
        })
    });
	
	category();
	product();

	function category(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#loadCategories").html(data);
				
			}
		});
	}
	
	function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				var results = JSON.parse(data);
				loadMatches(results);
			}
		});
	}
	
	
	
	$("body").delegate('.collection-item',"click",function(event){
		event.preventDefault();
		
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			/* dataType: "json", */
			
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				var results = JSON.parse(data);
				loadMatches(results);
			}
		})
	
	});
	
	$("#search_btn").click(function(){
		event.preventDefault();
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){ 
				var results = JSON.parse(data);	
				window.location.hash = "searched";
				loadMatches(results);
			}
		})
		}
	});

	cartCount();
	
	$("body").on("click",'#addToCart',function(event){
		if(($('#icon_prefix').val()) === undefined ){
			var qnt = 1;
		}else{
			var qnt = $('#icon_prefix').val();
		}
		var p_id = $(this).attr('pid');
		
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{addToProduct:1,proId:p_id,quantity:qnt},
			success	:	function(){
				cartCount();
			}
		})
	});
	
	function cartCount(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{cart_count:1},
			success	:	function(data){
				$("#itemNumber").html(data);
			}
		})
	}
	
	cart();
	
	function cart(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getCart:1},
			success	:	function(data){
				var results = JSON.parse(data);
					
				loadCart(results);
			}
		})
	}
	
	
	function loadCart(results){
		
		var count = Object.keys(results).length;
		
		var i;
		
		for (i = 0;i < count;i++){
			var newTr = document.createElement("tr");
			
			var td1 = document.createElement("td");
			td1.innerHTML = results[i].name;
			
			var td2 = document.createElement("td");
			td2.innerHTML = results[i].category;

			var td3 = document.createElement("td");
			td3.innerHTML = results[i].price;
			
			var td4 = document.createElement("td");
			td4.innerHTML = results[i].quantity;
			
			var td5 = document.createElement("td");
			td5.innerHTML = results[i].quantity * results[i].price;
			
			var td6 = document.createElement("td");
			
			var a = document.createElement("a");
			a.href = "deletecommand.php?id=".concat(results[i].id);
			
			var i1 = document.createElement("i");
			i1.className="material-icons red-text";
			i1.innerHTML = "close";
			
			a.appendChild(i1);
			td6.appendChild(a);
			
			newTr.appendChild(td1);
			newTr.appendChild(td2);
			newTr.appendChild(td3);
			newTr.appendChild(td4);
			newTr.appendChild(td5);
			newTr.appendChild(td6);
			
			document.getElementById('loadCart').appendChild(newTr);
		}
	}
	
	
	
	function loadMatches(results){
		
		if(document.getElementById('loadProducts').firstChild){
			while(document.getElementById('loadProducts').firstChild){
				document.getElementById('loadProducts').removeChild(document.getElementById('loadProducts').firstChild);
			}
		}
		
		var count = Object.keys(results).length;
		
		var i;
		
		for (i = 0;i < count;i++){
			var newDiv1 = document.createElement("div");
			newDiv1.className = "col s12 m3";
			var newDiv2 = document.createElement("div");
			newDiv2.className = "card hoverable animated slideInUp wow";
			var newDiv3 = document.createElement("div");
			newDiv3.className = "card-image";
			
			var a1 = document.createElement('a');
			a1.href = "product.php?id=".concat(results[i].id);
			a1.setAttribute("id", "loadClicked");
			a1.setAttribute("pid", results[i].id);
			
			var img1 = document.createElement('img');
			img1.src = "products/".concat(results[i].thumbnail);
			
			var newSpan = document.createElement("span");
			newSpan.className = "card-title red-text";
			newSpan.textContent = results[i].name;
			
			var newButton = document.createElement('button');
			newButton.className = "btn-floating red halfway-fab waves-effect waves-light right";
			newButton.setAttribute("pid",results[i].id);
			newButton.setAttribute("id","addToCart");
			
			var i1 = document.createElement('i');
			i1.className="material-icons";
			i1.innerHTML = "add";
			
			var newDiv4 = document.createElement("div");
			newDiv4.className = "card-content";
			
			var newDiv5 = document.createElement("div");
			newDiv5.className = "container";
			
			var newDiv6 = document.createElement("div");
			newDiv6.className = "row";
			
			var newDiv7 = document.createElement("div");
			newDiv7.className = "col s6";
			
			var p1 = document.createElement("p");
			p1.className = "white-text";
			p1.innerHTML = results[i].price;
			
			var i2 = document.createElement('i');
			i2.className="left fa fa-dollar";
			
			newDiv1.appendChild(newDiv2);
			newDiv2.appendChild(newDiv3);
			
			newDiv3.appendChild(a1);
			newDiv3.appendChild(newSpan);
			newDiv3.appendChild(newButton);
			a1.appendChild(img1);
			newButton.appendChild(i1);
			
			newDiv2.appendChild(newDiv4);
			newDiv4.appendChild(newDiv5);
			newDiv5.appendChild(newDiv6);
			newDiv6.appendChild(p1);
			p1.appendChild(i2);
			
			document.getElementById('loadProducts').appendChild(newDiv1);
		}
	
	}
});

