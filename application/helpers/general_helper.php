<?php


	function is_admin_loggedin(){
		$CI =& get_instance();
		$admin_id = $CI->session->userdata('admin_id');
		if(empty($admin_id)){
			redirect("admin/users");
		}
	}


