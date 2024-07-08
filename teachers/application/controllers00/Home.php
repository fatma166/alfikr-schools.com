<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('teacher_id')) { 
			redirect(base_url().'login', 'refresh');
		}
				
		$this->load->database();
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('teacher_id');
		$this->load->model('Users_per');
		
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		/********************** fetch nof of contact us not seen messages ****************/
		$nof_msg = $this->db->query("SELECT count(*) as nof_msg FROM contact_us WHERE seen = 0");
		$nof_msg = $nof_msg->result();
		$this->data['nof_msg'] = $nof_msg[0]->nof_msg;
		
		
		/***************** site info *****************/
		$this->load->model("fetch_items");
		$this->data["site_info"] = $this->fetch_items->fetch_site_info();
    }
	
	

	
	
	
	public function index()
	{
		$this->load->view('home', $this->data); 
	}
	
	public function search(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$search_key = $this->input->post('search_key');
		$search_in = $this->input->post('search_in');
		$search_key = urlencode($search_key);
		redirect(base_url().$search_in.'?key='.$search_key, 'refresh');
	}
	
	
	public function opinions(){
		
		
		
		$opinions = $this->db->query("SELECT * FROM opinions ORDER BY id DESC");
		$opinions = $opinions->result();
		$this->data["opinions"] = $opinions;
		
		$this->load->view('opinions', $this->data); 
	}
	
	
	public function contact_us(){
		
		
		
		$contact_us = $this->db->query("SELECT * FROM contact_us ORDER BY id DESC");
		$contact_us = $contact_us->result();
		$this->data["contact_us"] = $contact_us;
		
		$this->load->view('contact_us', $this->data); 
	}
	
	public function delete_contact_us($id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$this->db->query("DELETE FROM contact_us WHERE id = '$id'");
		redirect(base_url().'home/contact_us', 'refresh');
		
	}
	
	public function view_contact_us($id){
		
		
		
		$this->db->query("UPDATE contact_us SET seen = 1 WHERE id = '$id'");
		
		$msg = $this->db->query("SELECT * FROM contact_us WHERE id = '$id'");
		$msg = $msg->result();
		$this->data["msg"] = $msg[0];
		
		
		$this->load->view('view_contact_us', $this->data);
		
	}
}
