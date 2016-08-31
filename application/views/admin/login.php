<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">


<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/additional-methods.min.js"></script>




<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script src="/plugins/sweetalert/dist/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="/plugins/sweetalert/dist/sweetalert.css">

<style>
@-moz-document url-prefix() {
  fieldset { display: table-cell; }
}
.error{color:#FF0000;}
</style>

</head>
<body>

<div class="container-fluid">
  
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        	
        <div class="panel panel-default">
            <div class="panel-heading">Admin Login</div>
            <div class="panel-body">
            		<?php 
			  	
			  	if( isset($error)){
			  ?>
			  
				  <div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					<?php  echo $error?>
					</div>
			<?php
			}
			?>
					<?php echo form_open('admin/users',array('name' => 'loginform','id' => 'loginform')); ?>
					  <div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="Email">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password">
					  </div>
					  
					  
					  <button type="submit" class="btn btn-default">Submit</button>
					 <?php echo form_close(); ?>
					
             
            </div>
        </div>
            
        	
             
        </div>
        <div class="col-md-2"></div>
    </div>  
</div>

<script>
$( document ).ready(function() {

	$("#loginform").validate({
		rules: {
			
			password: {
				required: true,
				minlength: 5
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			email: "Please enter a valid email address",
		}
	});
});
</script>

</body>
</html>
