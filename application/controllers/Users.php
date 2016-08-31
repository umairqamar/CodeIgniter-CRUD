<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
	{
			// Call the CI_Model constructor
			parent::__construct();
			$this->load->model('Users_model');
			
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){		
		$user_id = $this->session->userdata('user_id');
		if(!empty($user_id)){
			redirect("users/changepassword");
		}
		
		$data = array();
		$data['message'] = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$this->form_validation->set_rules('admin_password', 'Password', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			
			
			if ($this->form_validation->run() != FALSE){
				$db_data = array();
				$db_data['email'] = $this->input->post('email', TRUE);
				$db_data['password'] = $this->input->post('admin_password', TRUE);
				$db_data['is_admin'] = 0;

				$res = $this->Users_model->auth_user($db_data);

				if($res->result_id->num_rows == 1){
					$res = $res->result();
					$this->session->set_userdata('user_id',$res[0]->user_id);
					redirect("users/changepassword");
				}else{
					$data['error'] = "Invalid Email or Password";
				}

				
			}else{
				$data['error'] = validation_errors();
			}
		}
	
		$this->load->view('users/login',$data);
		//echo $users->result_id->num_rows ;exit;
		//print_r($users);exit;
	}
	
	public function add (){
		
		$user_id = $this->session->userdata('user_id');
		if(!empty($user_id)){
			redirect("users/changepassword");
		}
		
		$data = array();
		$data['message'] = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$this->form_validation->set_rules('name', 'Name', 'required|max_length[250]|trim|alpha_numeric_spaces');
			
			
			$this->form_validation->set_rules('password', 'Password', 'required');
$this->form_validation->set_rules('conf_password', 'Password Confirmation', 'required|matches[password]|max_length[12]|min_length[6]|trim');
			
			
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
			
			$this->form_validation->set_rules('website', 'Website', 'required|trim|valid_url');
			
			if ($this->form_validation->run() != FALSE){
				$db_data = array();
				$db_data['full_name'] = $this->input->post('name', TRUE);
				$db_data['password'] = $this->input->post('password', TRUE);
				$db_data['email'] = $this->input->post('email', TRUE);
				$db_data['website'] = $this->input->post('website', TRUE);
				$db_data['comment'] = $this->input->post('comment', TRUE);
				$db_data['gender'] = $this->input->post('gender', TRUE);
				
				$db_data['is_active'] = 1;
				$db_data['created_dtm'] = date("Y-m-d H:i:s");
				
				$config = array();
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
               /* $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;*/
				$config['encrypt_name']         = TRUE;
				
				

                $this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('fileToUpload')){
					$data['error'] =$this->upload->display_errors();
				}else{
					$upload_data = $this->upload->data();
					$db_data['profile_image'] = $upload_data['file_name'];
					unset($upload_data);
					$this->Users_model->insert($db_data);
					
					
					$session_data = array(
							'is_added' => TRUE
					);
					
					$this->session->set_userdata($session_data);
					
					$this->session->set_flashdata('message', 'Thank you!');
					
					$data['message'] = "Record Added";
					redirect("users");
				}
			}else{
				$data['error'] = validation_errors();
			}
		}
		$this->load->view('users/signup',$data);
	}
	
	public function changepassword(){
		$data = array();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$this->form_validation->set_rules('oldpass', 'Old Password', 'required');
			$this->form_validation->set_rules('newpass', 'New Password', 'required');
			$this->form_validation->set_rules('conf_newpass', 'Confirm New Password Confirmation', 'required|matches[newpass]|max_length[12]|min_length[6]|trim');
			
			if ($this->form_validation->run() != FALSE){
				$db_data = array();
				
				$db_data['user_id'] = $this->session->userdata('user_id');
				$db_data['password'] = $this->input->post('oldpass', TRUE);
				
				$res = $this->Users_model->auth_user($db_data);
				if($res->result_id->num_rows == 1){
					$db_data = array();
					$db_data['password'] = $this->input->post('conf_newpass', TRUE);
					$this->Users_model->update($this->session->userdata('user_id'),$db_data);
					$this->session->set_flashdata('message', 'Password Changed');
					redirect("users/changepassword");
				}else{
					$data['error'] = "Wrong old password";
				}

				
			}else{
				$data['error'] = validation_errors();
			}
		}
		
		$this->load->view('users/change_password',$data);
	}
	
	public function thankyou(){
		$data['message'] = "Added!";
		
		$is_added = $this->session->userdata('is_added');
		if($is_added){
				$session_data = array(
							'is_added' => FALSE
					);
					
					$this->session->set_userdata($session_data);
			$this->load->view('users/thankyou',$data);
		}else{
			redirect("users");
		}
	}
	
	public function testing($p1,$p2,$p3){
		echo $p1."<br>";
		echo $p2."<br>";
		echo $p3."<br>";
		echo "TEsting called!";exit;
	}
}
