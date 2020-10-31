<?php
require_once '../../header.php';
require_once '../../Autoloader.php';

$bs = new ProductBusinessService();
$products = $bs->getAllProducts();
?>

<!-- <head> -->
<!-- 	<link rel="stylesheet" type="text/css" href="../css/forms.css"> -->
<!-- </head> -->

<div class="container">
    <h1>Create A New Product</h1>
    
    <form class="centerhalf" action="../handlers/processNewProduct.php">
    	<div class="form-group">
        	<label for="productname">Product Name:</label>
        	<input type="text" class="form-control" id="productname" name="productname">
      	</div>
    	<div class="form-group">
        	<label for="productdescription">Description:</label>
        	<textarea class="form-control" name="productdescription" rows="4" cols="45"></textarea>
      	</div>
      	<div class="form-group">
        	<label for="productprice">Price:</label>
        	<input type="text" class="form-control" id="productprice" name="productprice">
      	</div>
      	<div>
      		<label for="productphoto">Photo File Name:</label>
      		<input type="file" name="productphoto" id="fileToUpload">
  			<input type="submit" value="Upload Image" name="submit">
      	</div>
    	<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>