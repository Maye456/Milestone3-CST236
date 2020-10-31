<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../header.php';
require_once '../../Autoloader.php';

$id = $_GET['id'];

$bs = new ProductBusinessService();

$products = $bs->findById($id);

// echo "<pre>";
// print_r($products);
// echo "</pre>";
?>

<div class="container">
    <h1>Update The Product</h1>
    
    <form action="../handlers/processNewProduct.php">
    	<div class="form-group">
        	<input type="hidden" class="form-control" id="id" value="<?php echo $products->getId(); ?>" name="id">
      	</div>
    	<div class="form-group">
        	<label for="productname">Product Name:</label>
        	<input type="text" class="form-control" id="productname" value="<?php echo $products->getName(); ?>" name="productname">
      	</div>
    	<div class="form-group">
        	<label for="productdescription">Description:</label>
        	<input class="form-control" value="<?php echo $products->getDescription(); ?>" name="productdescription">
      	</div>
      	<div class="form-group">
        	<label for="productprice">Price:</label>
        	<input type="text" class="form-control" id="productprice" value="<?php echo $products->getPrice(); ?>" name="productprice">
      	</div>
      	<div>
      		<label for="productphoto">Photo File Name:</label>
      		<input type="file" name="productphoto" id="fileToUpload">
      	</div>
    	<button type="submit" class="btn btn-primary">OK</button>
    </form>
</div>