<?php 
	include "dbconfig.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>products </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>
<body id="viewbg">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary  ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Akashcart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContents" aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContents">
      <ul id="tab" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" id="viewhome" href="home.php">Home</a>
        </li>
		<form class="d-flex">
<a href="viewcart.php" id="cart" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg></a>

<a href="login.php" id="login" class="btn btn-warning">login</a>
      </form>
    </div>
  </div>
</nav>
  
<div class="container">
  <div class="row">

  


			<?php
			include_once 'dbconfig.php';
				if(isset($_POST["addCart"])){
						if(isset($_SESSION["cart"]))
					{
						$pid_array=array_column($_SESSION["cart"],"pid");
						if(!in_array($_GET["id"],$pid_array))
						{
							$index=count($_SESSION["cart"]);
							$item=array(
								'pid' => $_GET["id"],
								'pname' => $_POST["pname"],
								'price' => $_POST["price"],
								'qty' => $_POST["qty"]
							);
							$_SESSION["cart"][$index]=$item;
								?>
								<script>
									alert('successfully added');
									window.location="viewcart.php";
								</script>
								<?php
								
						}
						else
						{
							?>
								<script>
									alert('alredy added');
									window.location="viewcart.php";
								</script>
								<?php
							
						}
					}
					else
					{
							$item=array(
								'pid' => $_GET["id"],
								'pname' => $_POST["pname"],
								'price' => $_POST["price"],
								'qty' => $_POST["qty"]
							);
							$_SESSION["cart"][0]=$item;?>
							<script>
								alert('successfully added');
							window.location="viewcart.php";
							</script>
							<?php


					}
				}
				else{
					
					
				}
	
			
			
			$sql="SELECT * FROM product WHERE pid='{$_GET["id"]}'";
			$res=$conn->query($sql);
			if($res->num_rows>0)
			{
				if($row=$res->fetch_assoc())
				{
			echo  '<form action="'.$_SERVER["REQUEST_URI"].'" method="post">
   	 <div id="productdetail" class="col-sm-4 col-lg-4 col-md-4 text-center">    
     <img src="images/'. $row['images'] .'" alt="" class="img-responsive" >
     <p><strong><a href="#" id="pname">'. $row['sname'] .'</a></strong></p>
     <h4 class="text-danger"> Rs.'. $row['price'] .'</h4>    
     <p><b>Brand</b> : '. $row['sname'] .'</p>
     <p><b>RAM </b>: '. $row['ram'] .' GB</p>
     <p><b>Storage </b>: '. $row['storage'] .' GB </p>
	 <p><input type="text"  placeholder="Enter Qty" name="qty"  class="form-control" required></p>
	 <p><input type="hidden"  name="pname" value='. $row["sname"] .' class="form-control"></p>
	 <p><input type="hidden"  name="price" value='. $row["price"] .' class="form-control"></p>
	 <p><input type="submit" name="addCart" class="btn btn-warning" value="Add to Cart"></p>
   	 </div>
         
   </form>
   ';
   $nameed='pname';
				}
			
			}
		
			?>
  </div>
</div>

</body>
</html>