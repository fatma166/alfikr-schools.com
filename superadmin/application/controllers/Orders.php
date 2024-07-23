<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

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
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		
		$orders = $this->db->query("SELECT o.id, o.status, o.date, o.total, u.firstname, u.lastname, u.email, u.telephone, u.address_1 FROM orders as o LEFT JOIN site_users as u
				ON o.user_id = u.id ORDER BY o.id DESC");
		$orders = $orders->result();
		$this->data['orders'] = $orders;
		
		
		
		$this->load->view('orders', $this->data); 
		
		
		
	}
	
	
	public function view_order($id){
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
		
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		
		
		$order = $this->db->query("SELECT o.id, o.status, o.date, o.total, u.firstname, u.lastname, u.email, u.telephone as mobile, u.address_1 as address, u.postcode as post_code FROM orders as o LEFT JOIN site_users as u
				ON o.user_id = u.id WHERE o.id = '$id'");
		$order = $order->result();
		$this->data['order'] = $order[0];
		
		
		
		
		$order_details = $this->db->query("SELECT * FROM products WHERE id IN (SELECT product_id FROM orders_details WHERE order_id = '$id')");
		$order_details = $order_details->result();
		
		$this->data["order_details"] = $order_details;
		
		$this->load->view('view_order', $this->data); 
		
	}
	
	
	
	public function change_status(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->load->database();	
		$this->db->query("UPDATE orders SET status = '$status' WHERE id = '$id'");
		redirect(base_url().'orders', 'refresh');
		
	}
	
	

}
