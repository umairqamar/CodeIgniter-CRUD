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
            <div class="panel-heading">Change Password</div>
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
            
            <?php 
			  	$message = $this->session->flashdata('message');
			  	if(!empty($message)){
			  ?>
			  	<script>
			  		swal("Good job!", "Password Updated", "success")
			  	</script>	
			  
				 <?php /*?> <div class="alert alert-success" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Congratulations:</span>
					<?php  echo $message?>
					</div><?php */?>
			<?php
			}
			
			?>
					<?php echo form_open('users/changepassword',array('name' => 'loginform','id' => 'loginform')); ?>
					  <div class="form-group">
						<label for="exampleInputEmail1">Old Password</label>
						<input type="password" name="oldpass" class="form-control" id="oldpass" placeholder="Old Password">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">New Password</label>
						<input type="password" class="form-control" id="newpass" name="newpass" placeholder="New Password">
					  </div>
                      
                      <div class="form-group">
						<label for="exampleInputPassword1">Confirm New Password</label>
						<input type="password" class="form-control" id="conf_newpass" name="conf_newpass" placeholder="Confirm New Password">
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
			
			oldpass: {
				required: true,
				minlength: 5
			},
			newpass: {
				required: true,
				minlength: 5
			},
			conf_newpass: {
				required: true,
				minlength: 5,
				equalTo: "#newpass"
			}
			
		}
	});
});
</script>

</body>
</html>
