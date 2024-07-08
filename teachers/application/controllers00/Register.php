<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		if(!$this->session->userdata('user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		/************* This lines should copied to each controller **********************/
		/*************** Menu ****************/
		$query = $this->db->query("SELECT * FROM menu WHERE parent_id = 0 ORDER BY ordering");
		$this->data['right_menu']  = $query->result();
		
		$univ = $this->db->query("SELECT * FROM universities");
		$univ = $univ->result();
		$this->data['universities'] = $univ;
		
		
		$this->load->view('admin_universities', $this->data); 
		
		
		
	}
	
	
	
	public function view_registerd(){
		if(!$this->session->userdata('user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		/************* This lines should copied to each controller **********************/
		/*************** Menu ****************/
		$query = $this->db->query("SELECT * FROM menu WHERE parent_id = 0 ORDER BY ordering");
		$this->data['right_menu']  = $query->result();
		
		$univ = $this->db->query("SELECT * FROM universities");
		$univ = $univ->result();
		$this->data['universities'] = $univ;
		
		
		
		$registerations = $this->db->query("SELECT * FROM registerations ORDER BY id DESC");
		$registerations = $registerations->result();
		$this->data['registerations'] = $registerations;
		
		
		
		
		
		
		$this->load->view('view_registerd', $this->data);
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
