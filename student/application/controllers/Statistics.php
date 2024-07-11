<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {

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
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(4, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(4, 1);
		$this->data['edit'] = $this->Users_per->check_per(4, 2);
		$this->data['delete'] = $this->Users_per->check_per(4, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		$last_vistiors = $this->db->query("SELECT * FROM activities ORDER BY id DESC LIMIT 5");
		$last_vistiors = $last_vistiors->result();
		$this->data["last_vistiors"] = $last_vistiors;
		
		
		$most_products = $this->db->query("SELECT * FROM products ORDER BY views DESC LIMIT 5");
		$most_products = $most_products->result();
		$this->data["most_products"] = $most_products;
		
		
		$selled_products = $this->db->query("SELECT * FROM orders_details GROUP BY product_id");
		$selled_products = $selled_products->result();
		$selled_products_array = array();
		$i = 0;
		foreach($selled_products as $s){
			$pid = $s->product_id;
			/*** product info ****/
			$product_info = $this->db->query("SELECT * FROM products WHERE id = '$pid'");
			$product_info = $product_info->result();
			if($product_info){
				$selled_products_array[$i]['product_info'] = $product_info[0];
				$select_count_products = $this->db->query("SELECT count(*) as number FROM orders_details WHERE product_id = '$pid'");
				$count = $select_count_products->result();
				$count = $count[0]->number;
				$selled_products_array[$i]['nof_selling'] = $count;
				$i++;
			}
		}
		
		$this->data["selled_products_array"] = $selled_products_array;
		
		$cart_products = $this->db->query("SELECT * FROM activities WHERE page = 'Add to cart' ORDER BY id DESC LIMIT 20");
		$cart_products = $cart_products->result();
		$cart_products_array = array();
		$i = 0;
		foreach($cart_products as $s){
			$pid = $s->item_id;
			/*** product info ****/
			$product_info = $this->db->query("SELECT * FROM products WHERE id = '$pid'");
			$product_info = $product_info->result();
			$cart_products_array[$i]['product_info'] = $product_info[0];
			$cart_products_array[$i]['date'] = $s->date;
			
			
			$i++;
		}
		
		
		$this->data["cart_products"] = $cart_products_array;
		
		
		$this->load->view('statistics', $this->data); 
	}
}
