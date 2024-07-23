<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('admin_user_id')) { 
			redirect(base_url().'home', 'refresh');
		}
		$this->load->database();
		
		$logo = $this->db->query("SELECT * FROM settings WHERE name LIKE '%logo%'");
		$logo = $logo->result();
		$this->data["logo"] = $logo[0]->content;
		
		$this->load->view('login', $this->data);
		$this->load->database();
		
		
		
		
	}
	
	public function new_account(){
		if($this->session->userdata('admin_user_id')) { 
			redirect(base_url().'home', 'refresh');
		}
		$this->load->view('new_account');
		$this->load->database();
	}
	
	
	public function new_account_done(){
		
		$this->load->database();
		
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		
		
		/*********** check for registered email ****************/
		
		
		
		$query = $this->db->query("SELECT * FROM students WHERE email = '$email'");
		$query = $query->result();
		var_dump($query);
		if(empty($query)){
			/******** there is no email like that **********/
			//$query = $this->db->query("INSERT INTO students (email, password) VALUES ('$email', '$password')");
			
			$query = $this->db->query("SELECT * FROM admin_users WHERE username = '$email' AND password = '$password'");
			$query = $query->result();
			if(empty($query)){
				redirect(base_url(), 'refresh');
				//echo base_url();
				//echo 55;
			}
			else{
				$query = $query[0];
				$admin_user_id = $query->id;
				//echo $admin_user_id;
				$this->session->set_userdata('admin_user_id', $admin_user_id);
				redirect(base_url().'home', 'refresh');
			}
			
		}
		else{
			redirect(base_url(), 'refresh');
			//echo 66;
		}
		
		
		
		
	}
	
	
	public function check(){
		$this->load->database();
		
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$query = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
		$query = $query->result();
		if(empty($query)){
			redirect(base_url(), 'refresh');
			//echo base_url();
		}
		else{
			$query = $query[0];
			$admin_user_id = $query->id;
			//echo $admin_user_id;
			$this->session->set_userdata('admin_user_id', $admin_user_id);
			$this->session->set_userdata('lang', 'ar');
			setcookie('URCookie', $admin_user_id, time() + (7 * 24 * 60 * 60), "/");
			redirect(base_url().'home', 'refresh');
		}
		//var_dump($query);
			
	}
	
	
	public function logout()
	{
		$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
