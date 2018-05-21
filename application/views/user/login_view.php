<!DOCTYPE html>
<html>
<head>
	<title>belilaptop.com</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/css_login.css">
<body>
    <div class = "container">
	<div class="wrapper">
		<form action="<?php echo site_url('Login/ceklogin') ?>" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Selamat datang di Belilaptop.com</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
			  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     		  
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
		</form>			
	</div>
	</div>
</body>
</html>