<?php
// Error Report
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once '../../header.php';
require_once '../../Autoloader.php';

$id = $_GET['id'];

$bs = new UserBusinessService();

$user = $bs->findById($id);

// echo "<pre>";
// print_r($user);
// echo "</pre>";
?>

<div class="container">
    <h1>Update The Account</h1>
    
    <form action="../handlers/processNewUser.php">
    	<div class="form-group">
        	<input type="hidden" class="form-control" id="id" value="<?php echo $user->getId()?>" name="id">
      	</div>
      	
    	<div class="form-group">
        	<label for="firstname">First Name</label>
        	<input type="text" class="form-control" id="firstname" value="<?php echo $user->getFirst_name()?>" name="firstname">
      	</div>
      	
    	<div class="form-group">
        	<label for="lastname">Last Name</label>
        	<input type="text" class="form-control" id="lastname" value="<?php echo $user->getLast_name()?>" name="lastname">
      	</div>
      	
      	<div class="form-group">
        	<label for="username">Username</label>
        	<input type="text" class="form-control" id="username" value="<?php echo $user->getUsername()?>" name="username">
      	</div>
      	
      	<div class="form-group">
        	<label for="role">Role</label>
        	<select class="form-control" id="role" name="role">
      			<option <?php if ($user->getRole() == 1) {echo "selected='selected'";} ?>>1</option>
      			<option <?php if ($user->getRole() == 2) {echo "selected='selected'";} ?>>2</option>
      			<option <?php if ($user->getRole() == 3) {echo "selected='selected'";} ?>>3</option>
      			<option <?php if ($user->getRole() == 4) {echo "selected='selected'";} ?>>4</option>
    		</select>
      	</div>
      	
      	<div class="form-group">
        	<label for="password">Password</label>
        	<input type="text" class="form-control" id="password" value="<?php echo $user->getPassword()?>" name="password">
      	</div>
      	
    	<button type="submit" class="btn btn-primary">OK</button>
    </form>
</div>