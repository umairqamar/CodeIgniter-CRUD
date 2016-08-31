<?php include(VIEWPATH."_header.php") ?>

<div class="container-fluid">
  
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        	
        <div class="panel panel-default">
            <div class="panel-heading">All Users</div>
            <div class="panel-body">
            		
					<table class="table table-bordered">
					  <thead>
						<tr>
						  <th>Full Name</th>
						  <th>Image</th>
						  <th>Email</th>
						  <th>Website</th>
						  <th>Gender</th>
						  <th>Created On</th>
						  <th>Status</th>
						  <th>Actions</th>
						</tr>
					  </thead>
					  <tbody>
						
						<?php if($users->result_id->num_rows > 0){
						
								foreach($users->result() as $u){ ?>
									<tr>
									  <th><?php echo $u->full_name; ?></th>
									  <th><img src="<?php echo base_url("uploads/".$u->profile_image); ?>" width="200" /></th>
									  <th><?php echo $u->email; ?></th>
									  <th><?php echo $u->website; ?></th>
									  <th><?php echo ucfirst($u->gender); ?></th>
									  <th><?php echo $u->created_dtm; ?></th>
									  <th><?php echo ($u->is_active ==1)?'Active':'Suspended'; ?></th>
									  <th><a href="<?php echo site_url("/admin/users/edit/".$u->user_id) ?>">Edit</a> | 
                                      <a href="<?php echo site_url("/admin/users/delete/".$u->user_id); ?>">Delete</a></th>
									</tr>
								<?php	
								}
						?>
							
							
							
						<?php		
						}else{?>
							<tr>
								<td colspan="8">No record found.</td>
							</tr>
						<?php
						} ?>
						
						
					  </tbody>
					</table>
					
             
            </div>
        </div>
            
        	
             
        </div>
        <div class="col-md-2"></div>
    </div>  
</div>
<?php include(VIEWPATH."_footer.php") ?>