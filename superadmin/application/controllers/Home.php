<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url().'login', 'refresh');
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
		
		
		/***************** site info *****************/
		$this->load->model("fetch_items");
		$this->data["site_info"] = $this->fetch_items->fetch_site_info();
		
		
		
		/*************** all schools ***********/
		$all_schools = $this->db->query("SELECT * FROM schools ")->result();
		$i = 0;
		foreach($all_schools as $s){
		    $nof_students = $this->db->query("SELECT count(student_id) as nof_students FROM students_courses WHERE course_id IN (SELECT id FROM courses WHERE school_id = '$s->id') ")->result();
		    $all_schools[$i]->nof_students = $nof_students[0]->nof_students;
		    $i++;
		}
		$this->data['all_schools'] = $all_schools;
		
		
		/************* all courses types *************/
		$all_courses_types = $this->db->query("SELECT * FROM courses_types WHERE parent_id != 0 ")->result();
		$i = 0;
		foreach($all_courses_types as $s){
		    $nof_students = $this->db->query("SELECT count(student_id) as nof_students FROM students_courses WHERE course_id IN (SELECT id FROM courses WHERE course_type = '$s->id') ")->result();
		    $all_courses_types[$i]->nof_students = $nof_students[0]->nof_students;
		    $i++;
		}
		$this->data['all_courses_types'] = $all_courses_types;
		
		
		/******************** nof all **************/
		$this->data['nof_all_students'] = $this->db->query("SELECT count(id) as nof_all_students FROM students ")->result();
		$this->data['nof_all_schools'] = $this->db->query("SELECT count(id) as nof_all_schools FROM schools ")->result();
		$this->data['nof_all_teachers'] = $this->db->query("SELECT count(id) as nof_all_teachers FROM teachers ")->result();
		$this->data['nof_all_coruses'] = $this->db->query("SELECT count(id) as nof_all_coruses FROM courses ")->result();
		
		$schools = $this->db->query("SELECT * FROM schools ")->result();
		$i = 0;
		foreach($schools as $s){
		    $sid = $s->id;
		    $nof_students= $this->db->query("SELECT count(*) as nof_students FROM students WHERE school_id = '$sid'")->result();
		    $schools[$i]->nof_students = $nof_students[0]->nof_students;
		    $i++;
		}
		$this->data['all_schools'] = $schools;
		
		$this->data['nof_live_classes'] = $this->db->query("SELECT count(*) as nof_live_classes FROM lessons_sessions WHERE end_time = '0000-00-00 00:00:00'")->result();
		$this->data['nof_all_live_classes'] = $this->db->query("SELECT count(*) as nof_all_live_classes FROM lessons_sessions ")->result();
		$this->data['sum_payments'] = $this->db->query("SELECT sum(amount) as amount FROM payments")->result();
		$this->data['nof_all_lessons'] = $this->db->query("SELECT count(id) as nof_lessons FROM lessons ")->result();
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
