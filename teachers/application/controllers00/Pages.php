<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
				
		$this->load->database();
		$this->load->model("fetch_items");
		
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
		$this->data["site_info"] = $this->fetch_items->fetch_site_info();
		
		
    }
	
	
	
	
	
	
	
	
	public function index()
	{
		
		
		
		$pages = $this->db->query("SELECT * FROM pages");
		$pages = $pages->result();
		
		$this->data["pages"] = $pages; 
		
		
		$this->load->view('pages', $this->data); 
		
		
		
	}
	
	public function edit($page_id){
		
		$pages = $this->db->query("SELECT * FROM pages");
		$pages = $pages->result();
		
		$this->data["pages"] = $pages; 
		
		
		$page = $this->db->query("SELECT * FROM pages WHERE id = '$page_id'");
		$page = $page->result();
		$this->data["page"] = $page[0];
		
		$this->load->view('edit_page', $this->data);
		
	}
	
	
	public function new_page(){
		$pages = $this->db->query("SELECT * FROM pages");
		$this->data['pages'] = $pages->result();
		
		$this->load->view('new_page', $this->data);
		
	}
	
	public function edit_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
	
		
		$id = $this->input->post('id');
		
		 $ar_name =addslashes( $this->input->post('ar_name') );
		$ar_content =addslashes( $this->input->post('ar_content') );
		
		$en_name =addslashes( $this->input->post('en_name'));
		$en_content =addslashes( $this->input->post('en_content'));
		

		
		
		$parent_id = $this->input->post('parent_id');
		
		
		$this->db->query("UPDATE pages SET ar_content = '$ar_content', en_content = '$en_content', ar_name = '$ar_name',
		en_name = '$en_name'	, parent_id = '$parent_id'	WHERE id = '$id'");
		
		redirect(base_url().'pages', 'refresh');
		
		
		
		
		
	}
	public function useful_links(){
		$this->load->database();
		$id = $this->input->post('id');
		$status = $this->input->post('value');
		$this->db->query("UPDATE pages SET useful_links = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		
		redirect(base_url().'pages', 'refresh');
	}
	public function top_menu(){
		$id = $this->input->post('id');
		$status = $this->input->post('value');
		echo $status;
		$this->load->database();
		$this->db->query("UPDATE pages SET top_menu = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		
		redirect(base_url().'pages', 'refresh');
	}
	
	public function new_page_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$ar_name =addslashes( $this->input->post('ar_name') );
		$ar_content =addslashes( $this->input->post('ar_content') );
		
		$en_name =addslashes( $this->input->post('en_name'));
		$en_content =addslashes( $this->input->post('en_content'));
		
	
		
		
		$parent_id = $this->input->post('parent_id');
		
		
		
		$this->db->query("
		INSERT INTO pages (ar_name, en_name, ar_content, en_content, parent_id)
		VALUES
		('$ar_name', '$en_name', '$ar_content', '$en_content', '$parent_id')
		");
		
		redirect(base_url().'pages', 'refresh');
		
		
		
		
		
	}
	
	
	
	
	public function sitemap(){
		$this->load->database();
		$categories = $this->db->query("SELECT * FROM categories WHERE parent_id = 0 ORDER BY ordering");
		$categories = $categories->result();
		$i = 0;
		foreach($categories as $category){
			$parent_id = $category->id;
			$categories[$i]->href = '';
			$children = $this->db->query("SELECT * FROM categories WHERE parent_id = '$parent_id'");
			$children = $children->result();
			if($children){
				
				
				$j = 0;
				foreach($children as $child){
					$parent_id = $child->id;
					$children_lv2 = $this->db->query("SELECT * FROM categories WHERE parent_id = '$parent_id'");
					$children_lv2 = $children_lv2->result();
					$children[$j]->children_lv2 = $children_lv2;
					$j++;
				}
				
				$categories[$i]->children = $children;
			}
			else{
				$categories[$i]->children = null;
			}
			$i++;
		}
		
		
		
		$bread =  "<ul class='breadcrumb'>
						<li><a href='".base_url()."'>الرئيسية</a></li>
						<li>خريطة الموقع</li>
					</ul>";
					
			
		$this->data['categories'] = $categories;
		$this->data['bread'] = $bread;
		/****** fetch cart_str ******/
		$this->load->model('Cart_model');
		$cart_str = $this->Cart_model->fetch_cart();
		$this->data['cart_str'] = $cart_str;
		/****** End fetch cart_str ******/
		
		
		/************* Set title ***********/
		$this->data['title'] = "متجر هنا الوفا - "."خريطة الموقع";
		
		$sql = "SELECT * FROM manufacturers ";
		if($this->input->get('ordering') && $this->input->get('ordering') == 1){
			$sql .= " ORDER BY name DESC";
		}
		else{
			$sql .= " ORDER BY name";
		}
		$m = $this->db->query($sql);
		$m = $m->result();
		$this->data["manufacturer"] = $m;
		/************* fetch footer pages ***********/ 
		$about_us = $this->db->query("SELECT * FROM pages WHERE name = 'about_us' ");
		$about_us = $about_us->result();
		$this->data["about_us"] = $about_us[0];
		
		$contact_us = $this->db->query("SELECT * FROM pages WHERE name = 'contact_us' ");
		$contact_us = $contact_us->result();
		$this->data["contact_us"] = $contact_us[0];
		
		
		$privacy_policy = $this->db->query("SELECT * FROM pages WHERE name = 'privacy_policy' ");
		$privacy_policy = $privacy_policy->result();
		$this->data["privacy_policy"] = $privacy_policy[0];
		
		
		$delevering = $this->db->query("SELECT * FROM pages WHERE name = 'delevering' ");
		$delevering = $delevering->result();
		$this->data["delevering"] = $delevering[0];
		
		
		$return_order = $this->db->query("SELECT * FROM pages WHERE name = 'return_order' ");
		$return_order = $return_order->result();
		$this->data["return_order"] = $return_order[0];
		
		
		
		/********* fetch footer info ******/
		$phone = $this->db->query("SELECT * FROM settings WHERE name = 'phone' ");
		$phone = $phone->result();
		$this->data["phone"] = $phone[0];
		
		$mobile = $this->db->query("SELECT * FROM settings WHERE name = 'mobile' ");
		$mobile = $mobile->result();
		$this->data["mobile"] = $mobile[0];
		
		
		$address = $this->db->query("SELECT * FROM settings WHERE name = 'address' ");
		$address = $address->result();
		$this->data["address"] = $address[0];
		
		$email = $this->db->query("SELECT * FROM settings WHERE name = 'email' ");
		$email = $email->result();
		$this->data["email"] = $email[0];
		$this->load->view('sitemap', $this->data); 
		
		
	}
	
	
	public function change_ordering(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$ordering = $this->input->post('ordering');
		$id = $this->input->post('id');
		$this->db->query("UPDATE pages SET ordering = '$ordering' WHERE id = '$id'");
	}
	
	

}
