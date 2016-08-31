<?php include(VIEWPATH."_header.php") ?>

<div class="container-fluid">
  
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        	
        <div class="panel panel-default">
            <div class="panel-heading">Edit User</div>
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
			  
			  
              <?php echo form_open_multipart('admin/users/edit/'.$user->user_id); ?>
                <div class="form-group">
                    <label for="name">Name *:</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $user->full_name; ?>">
                    <span class="error"><?php echo form_error('name'); ?></span>
                </div>
                
                
                
                
                <div class="form-group">
                    <label for="email">Email *:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>">
                    <span class="error"><?php echo form_error('email'); ?></span>
                    
                </div>
                
               
                
                <div class="form-group">
                    <label for="website">Website *:</label>
                    <input type="url" class="form-control" name="website" id="website" value="<?php echo $user->website; ?>">
                    <span class="error"><?php echo form_error('website'); ?></span>
                   
                </div>
                
                
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="5" cols="40"><?php echo $user->comment; ?></textarea>
                    <span class="error"><?php echo form_error('comment'); ?></span>
                    
                </div>
                
                
               
                <div class="radio">
              <label>
                <input type="radio" name="gender"  value="female" <?php echo  set_radio('gender', 'female'); ?> <?php echo ($user->gender =="female")?'checked':''; ?>>
                Female
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="gender" value="male" <?php echo  set_radio('gender', 'male'); ?> <?php echo ($user->gender =="male")?'checked':''; ?>>
                Male
              </label>
            </div>
            
            <div class="form-group">
                    <label for="fileToUpload">Image:</label>
                    <input type="file" name="fileToUpload" accept="image/*" id="fileToUpload">
                    <img src="<?php echo base_url("uploads/".$user->profile_image); ?>" width="200" />
                </div>
                
                <div class="form-group">
                    <label for="is_active">Active:</label>
					<select name="is_active" id="is_active">
                    	<option value="1" <?php echo ($user->is_active == 1)?'selected':''; ?>>Active</option>
                        <option value="0"<?php echo ($user->is_active == 0)?'selected':''; ?>>Suspended</option>
                    </select>
                   
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