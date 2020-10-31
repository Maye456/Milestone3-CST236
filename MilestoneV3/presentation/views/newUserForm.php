<?php
include '../../header.php';
?>

<div class="container">
    <h1>Create A New User Account</h1>
    
    <form action="../handlers/processNewUser.php">
    	<div class="form-group">
        	<label for="firstname">First Name</label>
        	<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
      	</div>
    	<div class="form-group">
        	<label for="lastname">Last Name</label>
        	<input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
      	</div>
      	<div class="form-group">
        	<label for="username">Username</label>
        	<input type="text" class="form-control" id="username" placeholder="Username" name="username">
      	</div>
      	<div class="form-group">
        	<label for="role">Role</label>
        	<select class="form-control" id="role" name="role">
      			<option>1</option>
      			<option>2</option>
      			<option>3</option>
      			<option>4</option>
    		</select>
      	</div>
      	<div class="form-group">
        	<label for="password">Password</label>
        	<input type="text" class="form-control" id="password" placeholder="Password" name="password">
      	</div>
    	<button type="submit" class="btn btn-primary">OK</button>
    </form>
</div>