<?php include(VIEWPATH."_header.php") ?>

<div class="container-fluid">
  
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        	
        <div class="panel panel-default">
            <div class="panel-heading">PHP Form Validation Example</div>
            <div class="panel-body">
            		 <p><span class="error">* required field.</span></p>
              
            
			  
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
			  		swal("Good job!", "Record Added", "success")
			  	</script>	
			  
				 <?php /*?> <div class="alert alert-success" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Congratulations:</span>
					<?php  echo $message?>
					</div><?php */?>
			<?php
			}
			
			?>
			  
			  
              <?php echo form_open_multipart('users/add'); ?>
                <div class="form-group">
                    <label for="name">Name *:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>">
                    <span class="error"><?php echo form_error('name'); ?></span>
                </div>
                
                
                
                
                <div class="form-group">
                    <label for="email">Email *:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>">
                    <span class="error"><?php echo form_error('email'); ?></span>
                    
                </div>
                
                <div class="form-group">
                    <label for="password">Password *:</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <span class="error"><?php echo form_error('password'); ?></span>
                   
                </div>
                
                <div class="form-group">
                    <label for="conf_password">Confirm Password *:</label>
                    <input type="password" class="form-control" name="conf_password" id="conf_password">
                    <span class="error"><?php echo form_error('conf_password'); ?></span>
                   
                </div>
                
                <div class="form-group">
                    <label for="website">Website *:</label>
                    <input type="url" class="form-control" name="website" id="website" value="<?php echo set_value('website'); ?>">
                    <span class="error"><?php echo form_error('website'); ?></span>
                   
                </div>
                
                
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="5" cols="40"><?php echo set_value('comment'); ?></textarea>
                    <span class="error"><?php echo form_error('comment'); ?></span>
                    
                </div>
                
                
               
                <div class="radio">
              <label>
                <input type="radio" name="gender"  value="female" <?php echo  set_radio('gender', 'female'); ?>>
                Female
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="gender" value="male" <?php echo  set_radio('gender', 'male'); ?>>
                Male
              </label>
            </div>
            
            <div class="form-group">
                    <label for="fileToUpload">Image:</label>
                    <input type="file" name="fileToUpload" accept="image/*" id="fileToUpload">
                    
                </div>
            
                
                <button type="submit" name="submit"  class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Submit</button>
                
              <?php echo form_close(); ?>
             
            </div>
        </div>
            
        	
             
        </div>
        <div class="col-md-2"></div>
    </div>  
</div>
<?php include(VIEWPATH."_footer.php") ?>