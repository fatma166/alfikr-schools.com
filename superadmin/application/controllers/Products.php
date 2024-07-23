<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
		$this->data['view'] = $this->Users_per->check_per(6, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(6, 1);
		$this->data['edit'] = $this->Users_per->check_per(6, 2);
		$this->data['delete'] = $this->Users_per->check_per(6, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		
		$url = base_url().'products/';
		   
		
		$products_sql = "SELECT * FROM products WHERE 1 ";
		if($this->input->get('category_id')){
			$cat_id = $this->input->get('category_id');
			$products_sql .= " AND id IN (SELECT product_id FROM products_to_categories WHERE category_id = '$cat_id') ";
			$url .= "?category_id=$cat_id";
		}
		else if($this->input->get('name')){
			$name= $this->input->get('name');
			$products_sql .= " AND name LIKE '%$name%' ORDER BY id DESC ";
			
		}
		else if($this->input->get('key')){
			$name= $this->input->get('key');
			$products_sql .= " AND name LIKE '%$name%' ORDER BY id DESC ";
			
		}
		else if($this->input->get('sort')){
			if($this->input->get('sort') == 'no_price'){
				$products_sql .= " AND (price = 0 OR price = '') ORDER BY id DESC ";
			}
			else if($this->input->get('sort') == 'offered_products'){
				$products_sql .= " AND active_offer = 1 ORDER BY id DESC ";
			}
			else if($this->input->get('sort') == 'finished_products'){
				$products_sql .= " AND quantity = 0 ORDER BY id DESC ";
			}
			else if($this->input->get('sort') == 'hidden_products'){
				$products_sql .= " AND hidden = 1 ORDER BY id DESC ";
			}
			else if($this->input->get('sort') == 'most_sell'){
				$products_sql .= " AND most_sell = 1 ORDER BY id DESC ";
			}
			else if($this->input->get('sort') == 'most_good'){
				$products_sql .= " AND most_good = 1 ORDER BY id DESC ";
			}
			
			else{
				$products_sql .= " ORDER BY id DESC ";
			}
			
		}
		else{
			$products_sql .= " ORDER BY id DESC";
			
		/********************* pagination ***************/
		   $config = array();
		   //echo $this->uri->segment(1);
		   $this->load->library('pagination');
		   
		   $config["base_url"] = $url;
		   $config['total_rows'] =   $this->db->count_all("products");//here we will count all the data from the table
		   $config['per_page'] = 20;//number of data to be shown on single page
		   $config["uri_segment"] = 2;
		   $config["reuse_query_string"] = FALSE;
		   $config['enable_query_strings'] = TRUE;
		   $config["first_link"] = "الأولى";
		   $config["last_link"] = "الأخيرة";
		    $config['full_tag_open'] = "<ul class='pagination rtl'>";
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';


			$config['page_query_string'] = TRUE;
			$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>السابق';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';


			$config['next_link'] = 'التالي<i class="fa fa-long-arrow-right"></i>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
		   $this->pagination->initialize($config);
		   $page = $this->input->get('per_page');
		   if(!$page){
				$page = 0;
		   }
		   $limit = $config["per_page"];
		   $start = (($page)*$config["per_page"]) / 20;
		   $this->data["links"] = $this->pagination->create_links();//create the link for pagination
		   
		  
		   
		
		
		
		
		
		
		
			$products_sql .= " LIMIT $start, $limit";
		}
		
		if(!isset($this->data["links"])){
			$this->data["links"] = '';
		}
		$products = $this->db->query($products_sql);
		$products = $products->result();
		$i = 0;
		foreach($products as $p){
			$product_id = $p->id;
			
			$product_categories = $this->db->query("SELECT en_name FROM categories WHERE id IN (SELECT category_id FROM products_to_categories WHERE product_id =  '$product_id')");
			$product_categories = $product_categories->result();
			
			$products[$i]->categories = $product_categories;	
				
		
			
			
			
			
			$i++;
			
		}
		$this->data['products'] = $products;
		
		$all_categories  = $this->db->query("SELECT * FROM categories");
		$all_categories = $all_categories->result(); 
		$this->data['all_categories'] = $all_categories;
		
		
		
		
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"]["id"] = $this->fetch_words->fetch_word("id");
		$this->data["words"]["arabic_name"] = $this->fetch_words->fetch_word("arabic_name");
		$this->data["words"]["english_name"] = $this->fetch_words->fetch_word("english_name");
		$this->data["words"]["german_name"] = $this->fetch_words->fetch_word("german_name");
		$this->data["words"]["image"] = $this->fetch_words->fetch_word("image");
		$this->data["words"]["parent"] = $this->fetch_words->fetch_word("parent");
		$this->data["words"]["ordering"] = $this->fetch_words->fetch_word("ordering");
		$this->data["words"]["hide"] = $this->fetch_words->fetch_word("hide");
		$this->data["words"]["edit"] = $this->fetch_words->fetch_word("edit");
		$this->data["words"]["delete"] = $this->fetch_words->fetch_word("delete");
		$this->data["words"]["logout"] = $this->fetch_words->fetch_word("logout");
		$this->data["words"]["new"] = $this->fetch_words->fetch_word("new");
		$this->data["words"]["sub_products"] = $this->fetch_words->fetch_word("sub_products");
		$this->data["words"]["views"] = $this->fetch_words->fetch_word("views");
		$this->data["words"]["featured"] = $this->fetch_words->fetch_word("featured");
		$this->data["words"]["more_sells"] = $this->fetch_words->fetch_word("more_sells");
		$this->data["words"]["quantity"] = $this->fetch_words->fetch_word("quantity");
		$this->data["words"]["category"] = $this->fetch_words->fetch_word("category");
		$this->data["words"]["name"] = $this->fetch_words->fetch_word("name");
		$this->data["words"]["show"] = $this->fetch_words->fetch_word("show");
		
		
		
		
		
		
		
		
		$this->load->view('products', $this->data); 
		
		
		
	}
	public function view_products(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(6, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(6, 1);
		$this->data['edit'] = $this->Users_per->check_per(6, 2);
		$this->data['delete'] = $this->Users_per->check_per(6, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		/********************* pagination ***************/
		   $config = array();
		   //echo $this->uri->segment(1);
		   $this->load->library('pagination');
		   $config["base_url"] = base_url().'products/view_products';
		   $config['total_rows'] =   $this->db->count_all("products");//here we will count all the data from the table
		   $config['per_page'] = 20;//number of data to be shown on single page
		   $config["uri_segment"] = 3;
		    $config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['page_query_string'] = TRUE;

			$config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';


			$config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
		   $this->pagination->initialize($config);
		   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		   echo $page;
		   $limit = $config["per_page"];
		   $start = (($page -1) + $config["per_page"]);
		   $this->data["links"] = $this->pagination->create_links();//create the link for pagination
		   
		  
		   
		   
		   
		
		$products_sql = "SELECT * FROM products WHERE 1 ";
		if($this->input->get('category_id')){
			$cat_id = $this->input->get('category_id');
			$products_sql .= " AND id IN (SELECT product_id FROM products_to_categories WHERE category_id = '$cat_id') ";
		}
		else if($this->input->get('name')){
			$name= $this->input->get('name');
			$products_sql .= " AND name LIKE '%$name%' ORDER BY id DESC LIMIT 100";
			
		}
		else if($this->input->get('key')){
			$name= $this->input->get('key');
			$products_sql .= " AND name LIKE '%$name%' ORDER BY id DESC LIMIT 100";
			
		}
		else if($this->input->get('sort')){
			if($this->input->get('sort') == 'no_price'){
				$products_sql .= " AND (price = 0 OR price = '') ORDER BY id DESC LIMIT 100";
			}
			else if($this->input->get('sort') == 'offered_products'){
				$products_sql .= " AND active_offer = 1 ORDER BY id DESC LIMIT 100";
			}
			else if($this->input->get('sort') == 'finished_products'){
				$products_sql .= " AND quantity = 0 ORDER BY id DESC LIMIT 100";
			}
			else if($this->input->get('sort') == 'hidden_products'){
				$products_sql .= " AND hidden = 1 ORDER BY id DESC LIMIT 100";
			}
			else if($this->input->get('sort') == 'most_sell'){
				$products_sql .= " AND most_sell = 1 ORDER BY id DESC LIMIT 100";
			}
			else if($this->input->get('sort') == 'most_good'){
				$products_sql .= " AND most_good = 1 ORDER BY id DESC LIMIT 100";
			}
			
			else{
				$products_sql .= " ORDER BY id DESC LIMIT 20";
			}
			
		}
		else{
			$products_sql .= " ORDER BY id DESC LIMIT $start, $limit";
		}
		echo $products_sql;
		$products = $this->db->query($products_sql);
		$products = $products->result();
		$i = 0;
		foreach($products as $p){
			$product_id = $p->id;
			
			$product_categories = $this->db->query("SELECT category_name FROM categories WHERE id IN (SELECT category_id FROM products_to_categories WHERE product_id =  '$product_id')");
			$product_categories = $product_categories->result();
			
			$products[$i]->categories = $product_categories;	
				
		
			
			
			
			
			$i++;
			
		}
		$this->data['products'] = $products;
		
		$all_categories  = $this->db->query("SELECT * FROM categories");
		$all_categories = $all_categories->result(); 
		$this->data['all_categories'] = $all_categories;
		
		
		$this->load->view('products', $this->data); 
		
	}
	
	
	public function comments(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(6, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(6, 1);
		$this->data['edit'] = $this->Users_per->check_per(6, 2);
		$this->data['delete'] = $this->Users_per->check_per(6, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		/************************ fetch comments ***********************/
		$comments = $this->db->query("SELECT * FROM comments");
		$comments = $comments->result();
		$i = 0;
		foreach($comments as $c){
			$user_id = $c->user_id;
			if($user_id != 0){
				$username = $this->db->query("SELECT  * FROM site_users WHERE id = '$user_id'");
				$username = $username->result();
				$username = $username[0]->firstname .' '.$username[0]->lastname;
				$comments[$i]->username = $username;
			}
			else{
				$comments[$i]->username = "مجهول";
			}
			
			
			$product_id = $c->product_id;
			
			$product_name = $this->db->query("SELECT  * FROM products WHERE id = '$product_id'");
			$product_name = $product_name->result();
			$product_name = $product_name[0]->name;
			$comments[$i]->product_name = $product_name;
			
			
			
			
			
			$i++;
		}
		
		$this->data["comments"] = $comments;
		
		
		
		
		$this->load->view('comments', $this->data);
		
	}
	
	public function comment_approve($pid, $app){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$this->db->query("UPDATE comments SET approved = '$app' WHERE id = '$pid'");
		redirect(base_url().'products/comments', 'refresh');
		
	}
	
	
	public function add_re_comment(){
		$this->load->database();
		$re_comment = $this->input->post('re_comment');
		$id = $this->input->post('id');
		
		$this->db->query("UPDATE comments SET re_comment = '$re_comment' WHERE id = '$id'");
		redirect(base_url().'products/comments' , 'refresh');
		
	}
	
	public function new_product(){
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
		$this->data['view'] = $this->Users_per->check_per(6, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(6, 1);
		$this->data['edit'] = $this->Users_per->check_per(6, 2);
		$this->data['delete'] = $this->Users_per->check_per(6, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		
		$query = $this->db->query("SELECT * FROM categories");
		$this->data['categories']  = $query->result();
		
		
		
		
		$this->load->view('new_product', $this->data); 
		
		
	}
	
	
	public function new_product_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}

		$this->load->database();
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$details = $this->input->post('details');
		$keywords = $this->input->post('keywords');
	
		$selected_categories = $this->input->post('selected_categories');
		$selected_categories = explode(",", $selected_categories[0]);
		/*$selected_connected_products = $this->input->post('selected_connected_products');
		if($selected_connected_products != ''){
			$selected_connected_products = explode(",", $selected_connected_products[0]);
		}*/
		
		
		
		
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = 'uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('img');
			
			
			$this->load->library('image_lib');
			
			$config['source_image'] = 'uploads/'.$new_name;
			$config['wm_text'] = '';
			$config['wm_type'] = 'text';
			$config['wm_font_size'] = '16';
			$config['wm_font_color'] = '000000';
			$config['wm_vrt_alignment'] = 'bottom';
			$config['wm_hor_alignment'] = 'center';
			$config['wm_padding'] = '3';
			$config['wm_font_path'] = './system/fonts/texb.ttf';

			$this->image_lib->initialize($config);

			
			if ( ! $this->image_lib->watermark())
			{
					echo $this->image_lib->display_errors();
			}
		
		$this->db->query("INSERT INTO products (name, price, image, details, keywords) VALUES ('$name', '$price', '$target_path', '$details', '$keywords')");
		$product_id = $this->db->query("SELECT id FROM products ORDER BY id DESC LIMIT 1");
		$product_id = $product_id->result();
		$product_id = $product_id[0]->id;
		
		for($i = 0; $i < count($selected_categories); $i++){
			$cat_id = $selected_categories[$i];
			$this->db->query("INSERT INTO products_to_categories (product_id, category_id) VALUES ($product_id, $cat_id)");
			
		}
		
		
		
		/*if(count($selected_connected_products) > 0){
			for($i = 0; $i < count($selected_connected_products); $i++){
				$cat_id = $selected_connected_products[$i];
				 
				
					$this->db->query("INSERT INTO connected_products (product_id_primary, product_id_forign) VALUES ($product_id, $cat_id)");
				
				
				
			}
		}
			*/
		
		/*$nof_images = $this->input->post('nof_images');
		for($i = 1; $i <= $nof_images; $i++){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$img = 'img_'.$i;
			var_dump($_FILES[$img]);
			$config['upload_path']          = '../image/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES[$img]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload($img);
			$this->db->query("INSERT INTO products_images (image, product_id) VALUES ('$target_path', $product_id)");
		}
		
		
		*/
		$url = $this->session->userdata('products_url');
		redirect($url, 'refresh');
		
		
		
		
		
	}
	
	public function change_quantity(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->db->query("UPDATE products SET quantity = '$quantity' WHERE id = '$product_id'");
	}
	
	
	
	public function edit($product_id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(6, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(6, 1);
		$this->data['edit'] = $this->Users_per->check_per(6, 2);
		$this->data['delete'] = $this->Users_per->check_per(6, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		
		$product_info = $this->db->query("SELECT * FROM products WHERE id = '$product_id'");
		$product_info = $product_info->result();
		$this->data['product_info'] = $product_info[0];
		$all_categories = $this->db->query("SELECT * FROM categories");
		$this->data['all_categories'] = $all_categories->result();
		
		$product_categories = $this->db->query("SELECT * FROM categories WHERE id IN (SELECT category_id FROM products_to_categories WHERE product_id = '$product_id')");
		$this->data['product_categories'] = $product_categories->result();
		
		$this->load->view('edit_product', $this->data); 
		
	}
	
	
	public function edit_product_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$name = $this->input->post('name');
		$product_id = $this->input->post('product_id');
		$price = $this->input->post('price');
		$details = $this->input->post('details');
		$active_offer = $this->input->post('active_offer');
		$offer_price = $this->input->post('offer_price');
		$keywords = $this->input->post('keywords');
		
	
		$selected_categories = $this->input->post('selected_categories');
		 
		$selected_categories = explode(",", $selected_categories[0]);
		//var_dump($selected_categories);
		$selected_connected_products = $this->input->post('selected_connected_products');
		$selected_connected_products = explode(",", $selected_connected_products[0]);
		
		
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = 'uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('img');
			$this->db->query("UPDATE products SET image='$target_path' WHERE id = '$product_id'");
		}
		else{
			//echo 66;
		}
		
		
		
		
		$this->db->query("UPDATE products SET name = '$name', price = '$price', details = '$details', active_offer = '$active_offer', offer_price = '$offer_price', keywords = '$keywords' WHERE id = '$product_id'");
		$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$product_id'");
		
		for($i = 0; $i < count($selected_categories); $i++){
			$cat_id = $selected_categories[$i];
			$this->db->query("INSERT INTO products_to_categories (product_id, category_id) VALUES ($product_id, $cat_id)");
			
		}
		
		
		for($i = 0; $i < count($selected_connected_products); $i++){
			$cat_id = $selected_connected_products[$i];
			//$this->db->query("INSERT INTO connected_products (product_id_primary, product_id_forign) VALUES ($product_id, $cat_id)");
			
		}
		
		
		/* $nof_images = $this->input->post('nof_images');
		for($i = 1; $i <= $nof_images; $i++){
			$img = 'img_'.$i;
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES[$img]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload($img);
		}
		*/
		
		$url = $this->session->userdata('products_url');
		redirect($url, 'refresh');
		
		
		
		
		
	}
	
	
	
	
	public function fetch_products(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$text = $this->input->post('text');
		//echo $text;
		if($text != ''){
			
			$products = $this->db->query("SELECT * FROM products WHERE name LIKE '%$text%'");
			$products = $products->result();
			foreach($products as $p){
				echo "<input type='checkbox' value='$p->id' onchange='add_connected_product(this.value, \"$p->name\")' /> $p->name<br />";
				
			}
		}
		
		
		
	}
	
	
	
	
	
	
	
	public function delete($id){
		$this->load->database();
		$this->db->query("DELETE FROM products WHERE id = '$id'");
		$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		$url = $this->session->userdata('products_url');
		redirect($url, 'refresh');
	}
	
	public function featured($id, $status){
		$this->load->database();
		$this->db->query("UPDATE products SET featured = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		$url = $this->session->userdata('products_url');
		redirect($url, 'refresh');
	}
	public function most_sell($id, $status){
		$this->load->database();
		$this->db->query("UPDATE products SET most_sell = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		$url = $this->session->userdata('products_url');
		redirect($url, 'refresh');
	}
	
	
	
	public function hidden($id, $status){
		$this->load->database();
		$this->db->query("UPDATE products SET hidden = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		$url = $this->session->userdata('products_url');
		redirect($url, 'refresh');
	}
	
	public function product_images($id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		/************* fetch user per (VERY IMPORTANT !!) **********/
		$user_id = $this->session->userdata('admin_user_id');
		$this->load->model('Users_per');
		$this->data['view'] = $this->Users_per->check_per(6, 0);
		if($this->data['view'] == 0){
			redirect(base_url().'home', 'refresh');
		}
		$this->data['add'] = $this->Users_per->check_per(6, 1);
		$this->data['edit'] = $this->Users_per->check_per(6, 2);
		$this->data['delete'] = $this->Users_per->check_per(6, 3);
		$this->data['right_menu'] = $this->Users_per->fetch_right_menu();
		/*********************** End user per ********************/
		
		
		/***** fetch product images ********/
		$images = $this->db->query("SELECT * FROM products_images WHERE product_id = '$id'");
		$images = $images->result();
		$this->data["images"] = $images;
		$this->data["product_id"] = $id;
		
		
		$this->load->view('product_images', $this->data);
		
	}
	
	
	public function reArrayFiles(&$file_post) {

		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}

		return $file_ary;
	}
		
	
	public function new_product_img(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}

		$this->load->database();
		$id = $this->input->post('product_id');
		
		
		
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = 'uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			
			
			
			//var_dump($_FILES);
			
			
			
				$filesCount = count($_FILES['images']['name']); 
				//echo $filesCount;
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['images']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    $new_name = time().$_FILES["file"]['name'];
					$config['file_name'] = $new_name;
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                    
                    // Upload file to server 
                    $this->upload->do_upload('file');
						
                    $this->db->query("INSERT INTO products_images (product_id, image) VALUES ('$id', '$new_name')");
                    
				}
		
		
		
	
		redirect(base_url().'products/product_images/'.$id, 'refresh');
		
		
	}
	
	
	public function delete_product_img($id, $product_id){
		$this->load->database();
		$this->db->query("DELETE FROM products_images WHERE id = '$id'");
		redirect(base_url().'products/product_images/'.$product_id, 'refresh');
	}
	
	
	
	
	
	
	public function products_kinds($product_id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		/************* This lines should copied to each controller **********************/
		/*************** Menu ****************/
		$query = $this->db->query("SELECT * FROM menu WHERE parent_id = 0 ORDER BY ordering");
		$this->data['right_menu']  = $query->result();
		
		
		/************** fetch cities **************/
		$cities = $this->db->query("SELECT * FROM cities");
		$cities = $cities->result();
		$this->data['cities'] = $cities;
		
		
		
		$query = $this->db->query("SELECT * FROM products_kinds WHERE product_id = '$product_id'");
		$kinds  = $query->result();
		
		$i = 0;
		foreach($kinds as $k){
			$city_id = $k->city_id;
			$query = $this->db->query("SELECT * FROM cities WHERE city_id = '$city_id'");
			$result = $query->result();
			$kinds[$i]->city_name = $result[0]->ar_name;
			$i++;
		}
		
		
		$this->data['kinds']  = $kinds;
		
		
		$product_name = $this->db->query("SELECT * FROM products WHERE id = '$product_id'");
		$product_name = $product_name->result();
		$this->data['product_price'] = $product_name[0]->price;
		$product_name = $product_name[0]->name;
		$this->data['product_name'] = $product_name;
		
		$this->data['product_id'] = $product_id;
		$this->load->view('products_kinds', $this->data); 
		
	}
	
	
	public function new_product_kind(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$name = $this->input->post('name');
		$pic = $this->input->post('pic');
		$price = $this->input->post('price');
		$product_id = $this->input->post('product_id');
		$city_id = $this->input->post('city_id');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		if($pic == 0){
			$target_path = $this->db->query("SELECT * FROM products WHERE id = '$product_id'");
			$target_path = $target_path->result();
			$target_path = $target_path[0]->image;
			
		}
		else{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = '../image/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('img');
			
		
		}
		
		$this->db->query("INSERT INTO products_kinds (name, image, price, product_id, city_id, start_date, end_date)
		VALUES ('$name', '$target_path', '$price', '$product_id', '$city_id', '$start_date', '$end_date')");
		
		redirect(base_url().'products/products_kinds/'.$product_id, 'refresh');
		
	}
	
	
	public function delete_products_kinds($id){
		$this->load->database();
		$product_id = $this->db->query("SELECT * FROM products_kinds WHERE id = '$id'");
		$product_id = $product_id->result();
		$product_id = $product_id[0]->product_id;
		$this->db->query("DELETE FROM products_kinds WHERE id = '$id'");
		redirect(base_url().'products/products_kinds/'.$product_id, 'refresh');
	}
	
	
	
	public function change_kinds_quantity(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->db->query("UPDATE products_kinds SET quantity = '$quantity' WHERE id = '$product_id'");
	}
	
	
	
	public function connected_products($product_id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		/************* This lines should copied to each controller **********************/
		/*************** Menu ****************/
		$query = $this->db->query("SELECT * FROM menu WHERE parent_id = 0 ORDER BY ordering");
		$this->data['right_menu']  = $query->result();
		
		
		/***** fetch product connected products ********/
		$products = $this->db->query("SELECT * FROM products WHERE id IN (SELECT product_id_forign FROM connected_products WHERE product_id_primary = '$product_id')");
		$products = $products->result();
		$this->data["products"] = $products;
		$this->data["product_id"] = $product_id;
		
		
		$this->load->view('connected_products', $this->data);
		
	}
	
	public function fetch_connected_products(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$key = $this->input->post('text');
		//echo $key;
		$products = $this->db->query("SELECT * FROM products WHERE name LIKE '%$key%'");
		$products = $products->result();
		foreach($products as $p){
			echo "<option value='$p->id'>$p->name</option>";
		}
		
	}
	
	public function new_connected_products(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$product_id_primary = $this->input->post('product_id_primary');
		$product_id_forign = $this->input->post('product_id_forign');
		$this->db->query("INSERT INTO connected_products (product_id_primary, product_id_forign) VALUES ('$product_id_primary', '$product_id_forign')");
		redirect(base_url().'products/connected_products/'.$product_id_primary, 'refresh');
	}
	
	
	public function delete_connected_products($f, $p){
		$this->load->database();
		$this->db->query("DELETE FROM connected_products WHERE product_id_primary = '$p' AND product_id_forign = '$f'");
		redirect(base_url().'products/connected_products/'.$p, 'refresh');
	}
	
	
	
	
}
