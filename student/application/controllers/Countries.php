<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends CI_Controller {

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
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(5, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(5, 1);
		$this->data['edit'] = $this->Users_per->check_per(5, 2);
		$this->data['delete'] = $this->Users_per->check_per(5, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		
		$countries = $this->db->query("SELECT * FROM countries");
		$countries = $countries->result();
		$i = 0;
		foreach($countries as $c){
			$parent_id = $c->parent_id;
			if($parent_id != 0){
				$c_countries = $this->db->query("SELECT * FROM countries WHERE id = '$parent_id'");
				$c_countries = $c_countries->result();
				$countries[$i]->parent_name = $c_countries[0]->name;
			}
			else{
				$countries[$i]->parent_name = 'لا يوجد دولة رئيسية';
			}
			$i++;
		}
		$this->data["countries"] = $countries; 
		
		
		$this->load->view('countries', $this->data); 
		
		
		
	}
	
	public function new_country(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$parent_id = $this->input->post('parent_id');
		
		$name = $this->input->post('name');
		$this->db->query("INSERT INTO countries (name, parent_id) VALUES ('$name', '$parent_id')");
		
		redirect(base_url().'countries', 'refresh');
		
		
	}
	
	public function delete($id){
		$this->load->database();
		$this->db->query("DELETE FROM countries WHERE id = '$id'");
		redirect(base_url().'countries', 'refresh');
	}
	
	

}
