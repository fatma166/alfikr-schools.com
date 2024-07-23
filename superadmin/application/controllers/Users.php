<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
				
		$this->load->database();
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		/********************** fetch nof of contact us not seen messages ****************/
		$nof_msg = $this->db->query("SELECT count(*) as nof_msg FROM contact_us WHERE seen = 0");
		$nof_msg = $nof_msg->result();
		$this->data['nof_msg'] = $nof_msg[0]->nof_msg;
		
		
		
    }
	
	
	
	
	
	
	public function index()
	{
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(10, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(10, 1);
		$this->data['edit'] = $this->Users_per->check_per(10, 2);
		$this->data['delete'] = $this->Users_per->check_per(10, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		
		$users = $this->db->query("SELECT * FROM site_users");
		$users = $users->result();
		$this->data["users"] = $users;
		$this->load->view('users', $this->data); 
	}
	
	
	public function employees(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(17, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(17, 1);
		$this->data['edit'] = $this->Users_per->check_per(17, 2);
		$this->data['delete'] = $this->Users_per->check_per(17, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		
		$users = $this->db->query("SELECT * FROM users");
		$users = $users->result();
		$this->data["users"] = $users;
		$this->load->view('employees', $this->data); 
	}
	
	
	public function edit($users_id){
		
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		
		$user = $this->db->query("SELECT * FROM site_users WHERE id = '$users_id'");
		$user = $user->result();
		$this->data["user"] = $user[0];
		
		
	
		
		
		
		
		
		
		$this->load->view('edit_user', $this->data); 
	}
	
	public function new_employee(){
		
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		$this->load->view('new_employee', $this->data); 
	}
	
	public function new_employee_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->db->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
		
		$user_id = $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
		$user_id = $user_id->result();
		$user_id = $user_id[0]->id;
		
		$item = $this->input->post('item');
		for($i = 0; $i < count($item); $i++){
			$menu_type = $item[$i];
			$this->db->query("INSERT INTO user_per (menu_type, user_id) VALUES ('$menu_type','$user_id')");
		}
		//var_dump($item);
		redirect(base_url().'users/employees', 'refresh');
		
	}
	
	public function edit_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$user_id = $this->input->post('user_id');
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		
		$this->db->query("UPDATE site_users SET firstname = '$firstname', lastname = '$lastname', email = '$email',
		password = '$password' WHERE id = '$user_id'");
		//var_dump($item);
		redirect(base_url().'users/', 'refresh');
		
	}
	
	
	public function delete($id){
		$this->load->database();
		$this->db->query("DELETE FROM site_users WHERE id = '$id'");
		redirect(base_url().'users', 'refresh');
	}
	
}
