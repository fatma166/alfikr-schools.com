<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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


		/***************** site info *****************/
		$this->load->model("fetch_items");
		$this->data["site_info"] = $this->fetch_items->fetch_site_info();
		
		
    }
	
	
	public function index()
	{
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
	
		
		
		$categories = $this->db->query("SELECT * FROM categories");
		$categories = $categories->result();
		/*$i = 0;
		foreach($categories as $cat){
			$cat_id = $cat->parent_id;
			if($cat_id != 0){
				$parent_category = $this->db->query("SELECT ar_name FROM categories WHERE id = '$cat_id'");
				$parent_category = $parent_category->result();
				if($parent_category){
					$categories[$i]->parent_name = $parent_category[0]->ar_name;	
				}
				else{
					$categories[$i]->parent_name = 'تم حذف الأب';	
				}
				
			}
			else{
				$categories[$i]->parent_name = 'لا يوجد أب'; 
			}
			
			$i++;
			
		}*/
		$this->data['categories'] = $categories;
		
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		
		
		
		
		
		
		
		
		
		
		$this->load->view('categories', $this->data); 
		
		
		
	}
	
	
	
	public function change_ordering(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$ordering = $this->input->post('ordering');
		$category_id = $this->input->post('category_id');
		$this->db->query("UPDATE categories SET ordering = '$ordering' WHERE id = '$category_id'");
	}
	
	public function fetch_categories(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$text = $this->input->post('text');
		//echo $text;
		if($text != ''){

			$categories = $this->db->query("SELECT * FROM categories WHERE en_name LIKE '%$text%'");
			$categories = $categories->result();
			foreach($categories as $c){
				echo "<input type='checkbox' value='$c->id' onchange='add_category(this.value, \"$c->en_name\")' /> $c->en_name<br />";
				
			}
		}
		
		
		
	}
	
	
	
	public function new_category(){
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
		
		
		
		$query = $this->db->query("SELECT * FROM categories WHERE parent_id = 0");
		$this->data['categories']  = $query->result();
		
		
		
		
		$this->load->view('new_category', $this->data); 
		
		
	}
	
	
	
	
	
	public function new_category_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$parent_id = $this->input->post('parent_id');
		
		$name = $this->input->post('name');

		
		
		
		
		
		
	
			$this->db->query("INSERT INTO categories (name) 
			VALUES ('$name')");
	
		
			
		
		
		
		redirect(base_url().'categories', 'refresh');
	}
	
	
	public function resizeImage($filename)
   {
	  $source_path =  './uploads/' . $filename;
	  //echo $source_path;
      $target_path =   './uploads/thumbnail/';
	  //echo $source_path;
		$this->load->library('image_lib');
	  $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => FALSE,
          'create_thumb' => TRUE,
          'thumb_marker' => '',
          'width' => 350,
          'height' => 350
      );
		
     

      
	  $this->image_lib->initialize($config_manip);
	  
	  
	  
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }


      $this->image_lib->clear();
   }
	
	
	
	
	
	public function delete($id){
		$this->load->database();
		$this->db->query("DELETE FROM categories WHERE id = '$id'");
		redirect(base_url().'categories', 'refresh');
	}
	
	
	public function edit($cat_id){
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
		
		
		
		
		$query = $this->db->query("SELECT * FROM categories");
		$this->data['categories']  = $query->result();
		
		
		$query = $this->db->query("SELECT * FROM categories WHERE id = '$cat_id'");
		$category = $query->result();
		
		$this->data['category'] = $category[0];
		
		
		$this->load->view('edit_category', $this->data); 
		
	}
	
	
	public function edit_category_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$name = $this->input->post('name');

		$id = $this->input->post('id');
		
		
		
		$this->db->query("UPDATE  categories SET  name = '$name' WHERE id = '$id'");
		
		redirect(base_url().'categories/?msg=done', 'refresh');
		
	}
	
	
	
	public function hide($id, $status){
		$this->load->database();
		$this->db->query("UPDATE categories SET hide = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		redirect(base_url().'categories', 'refresh');
	}
	
	public function most_popular($id, $status){
		$this->load->database();
		$this->db->query("UPDATE categories SET most_popular = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		redirect(base_url().'categories', 'refresh');
	}
	
	public function our_products($id, $status){
		$this->load->database();
		$this->db->query("UPDATE categories SET our_products = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		redirect(base_url().'categories', 'refresh');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
