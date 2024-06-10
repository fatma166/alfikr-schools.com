<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
    
    
    public function approve_review($id, $value){
	    $this->db->query("UPDATE courses_reviews SET approved = '$value' WHERE id = '$id'");
	    redirect(base_url().'settings/reviews/', 'refresh');
	}
	
	public function delete_review($id){
	    $this->db->query("DELETE FROM courses_reviews WHERE id = '$id'");
	    redirect(base_url().'settings/reviews/', 'refresh');
	}
	
	public function reviews(){
	    $reviews = $this->db->query("SELECT * FROM courses_reviews ORDER BY id DESC")->result();
	    $i = 0;
	    foreach($reviews as $r){
	        $course_id = $r->course_id;
	        $product_name = $this->db->query("SELECT * FROM courses WHERE id = '$course_id'")->result();
	        if($product_name){
	            $reviews[$i]->product_name = $product_name[0]->name;
	        }
	        else{
	           $reviews[$i]->product_name = ''; 
	        }
	        $i++;
	    }
	    
	    $this->data['reviews'] =  $reviews;
	    $this->load->view('reviews', $this->data);
	}
	
	
		
    /*********** أسئلة شائعة **************/
	public function faqs(){
			$stories = $this->db->query("SELECT * FROM faqs");
			$this->data["faqs"] = $stories->result();
			$this->load->view('faqs', $this->data);
			
	}
	public function new_faq_done(){
		if(!$this->session->userdata('admin_user_id')) { 
		  redirect(base_url(), 'refresh');
		}
		
		
		$ar_qs = $this->input->post('ar_qs');
		$en_qs = $this->input->post('en_qs');
		$fr_qs = $this->input->post('fr_qs');
		$ar_answer = $this->input->post('ar_answer');
		$en_answer = $this->input->post('en_answer');
		$fr_answer = $this->input->post('fr_answer');
		$ordering = $this->input->post('ordering');
		
		
		$this->db->query("INSERT INTO faqs (ar_qs, en_qs, fr_qs, ar_answer, en_answer, fr_answer, ordering)
		VALUES ('$ar_qs', '$en_qs', '$fr_qs', '$ar_answer','$en_answer','$fr_answer', '$ordering')");
		redirect(base_url().'settings/faqs', 'refresh');
		
	}
	public function edit_faq($id){
		$page = $this->db->query("SELECT * FROM faqs WHERE id = '$id'");
		$page = $page->result();
		$this->data["faq"] = $page[0];
		$this->load->view('edit_faq', $this->data);
		
	}
	public function edit_faq_done(){
		$id = $this->input->post('id');
		$ar_qs = $this->input->post('ar_qs');
		$en_qs = $this->input->post('en_qs');
		$fr_qs = $this->input->post('fr_qs');
		$ar_answer = $this->input->post('ar_answer');
		$en_answer = $this->input->post('en_answer');
		$fr_answer = $this->input->post('fr_answer');
		$ordering = $this->input->post('ordering');
		
		
		
		$this->db->query("UPDATE faqs SET  ar_qs = '$ar_qs', en_qs = '$en_qs', fr_qs = '$fr_qs', ar_answer = '$ar_answer',
		en_answer = '$en_answer', fr_answer = '$fr_answer', 
		ordering  = '$ordering' WHERE id = '$id'");
		redirect(base_url().'settings/faqs', 'refresh');
		
	}
  
  
  
	
 
	
	
	
	
	public function index()
	{
		
		
		
	}
	
	public function new_slider(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$en_title = $this->input->post('en_title');
		$en_content = $this->input->post('en_content');
		$link = $this->input->post('link');
		
		
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$config['upload_path']          = '../uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|jpeg';
        $config['max_size']             = 2048;
        $new_name = time().$_FILES["img"]['name'];
		
		
		
		$ext = explode(".", $_FILES["img"]['name']);
			
			
			
		$new_name = time() . "." . $ext[1]  ;

		
		
		$config['file_name'] = $new_name;
		
		
		$this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
		$target_path = $new_name; 
		$this->upload->do_upload('img');
		
		$this->db->query("INSERT INTO slider (en_title, en_content, link, image ) VALUES 
								('$en_title', '$en_content', '$target_path')");
		redirect(base_url().'settings/slider', 'refresh');
		
		
	}
	
	public function change_slider_ordering(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$ordering = $this->input->post('ordering');
		$slider_id = $this->input->post('slider_id');
		$this->db->query("UPDATE slider SET ordering = '$ordering' WHERE id = '$slider_id'");
	}
	
	
	public function change_nof_programs(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$ordering = $this->input->post('ordering');
		$slider_id = $this->input->post('slider_id');
		echo 55;
		$this->db->query("UPDATE slider SET nof_of_programs = '$ordering' WHERE id = '$slider_id'");
	}
	
	
	public function new_blog(){
		$categories  = $this->db->query("SELECT * FROM categories");
		$this->data["categories"] = $categories->result();
		
		$this->load->view('new_blog', $this->data);
	}
	
	public function edit_blog($id){
		$categories  = $this->db->query("SELECT * FROM categories");
		$this->data["categories"] = $categories->result();
		
		$article = $this->db->query("SELECT * FROM blog WHERE id  = '$id'");
		$article = $article->result();
		$this->data["article"] = $article[0];
		
		$this->load->view('edit_blog', $this->data);
	}
	
	
	public function edit_blog_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$title = $this->input->post('title');
		$content = addslashes($this->input->post('content'));
		$id = $this->input->post('id');
		$category_id = $this->input->post('category_id');
		$short_text = addslashes($this->input->post('short_text'));
		
		
	
		
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = '../uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('img');
			$this->db->query("UPDATE blog SET image='$target_path' WHERE id = '$id'");
		}
		else{
			//echo 66;
		}
		
		
		
		
		$this->db->query("UPDATE blog SET title = '$title', content = '$content', category_id = '$category_id', short_text = '$short_text' WHERE id = '$id'");
		redirect(base_url().'settings/blog', 'refresh');
		
		
		
		
		
	}
	
	
	public function blog_featured($id, $status){
		$this->load->database();
		$this->db->query("UPDATE blog SET featured = '$status' WHERE id = '$id'");
		//$this->db->query("DELETE FROM products_to_categories WHERE product_id = '$id'");
		
		redirect(base_url().'settings/blog', 'refresh');
	}
	
	public function delete_blog($id){
		$this->load->database();
		$this->db->query("DELETE FROM blog WHERE id = '$id'");
		redirect(base_url().'settings/blog', 'refresh');
	}
	public function delete($table, $id){
	    
	    $this->db->query("DELETE FROM $table WHERE id = '$id'");
	    if($table == 'pages'){
	        redirect(base_url().$table, 'refresh');
	    }
	    else{
	        redirect(base_url().'settings/'.$table, 'refresh');
	    }
	    
	}
	
	
	public function new_blog_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$title = $this->input->post('title');
		$content = addslashes($this->input->post('content'));
		$category_id = $this->input->post('category_id');
		$short_text = addslashes($this->input->post('short_text'));
		
		
		
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$config['upload_path']          = '../uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 2048;
        $new_name = time().$_FILES["img"]['name'];
		$config['file_name'] = $new_name;
		
		$this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
		$target_path = $new_name; 
		$this->upload->do_upload('img');
		
		$this->db->query("INSERT INTO blog (title, content, category_id, image, featured, date, short_text ) VALUES 
								('$title', '$content', '$category_id', '$target_path', '1', NOW(), '$short_text')");
		redirect(base_url().'settings/blog', 'refresh');
		
	}
	
	
	
	public function blog(){
		
		$articles = $this->db->query("SELECT b.id, b.featured, b.title, b.content, b.date, c.en_name FROM blog as b LEFT JOIN categories as c ON c.id = b.category_id
		ORDER BY b.id DESC");
		$this->data["articles"] = $articles->result();
		

		$this->load->view('blog', $this->data);
	}
	
	
	public function slider(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
	
		$categories = $this->db->query("SELECT * FROM categories WHERE parent_id != 0");
		$this->data["categories"] = $categories->result();
		
		
		$page = $this->db->query("SELECT * FROM slider");
		$page = $page->result();
		$this->data["slider"] = $page;
		
		$this->load->view('slider', $this->data);
		
	}
	
	
	
	
	
	public function language(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		/********************** fetch translations ****************************/
		$all_words = $this->db->query("SELECT * FROM translations");
		$all_words = $all_words->result();
		$this->data["all_words"] = $all_words;
	
		
		
		
		
		$this->load->view('language', $this->data);
		
	}
	
	public function banners(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		
		/********************** fetch banners ****************************/
		$this->load->model('Fetch_items');
		$this->data['banner_1'] = $this->Fetch_items->fetch_banner("1");
		$this->data['banner_2'] = $this->Fetch_items->fetch_banner("2");
		$this->data['banner_3'] = $this->Fetch_items->fetch_banner("3");
		$this->data['banner_4'] = $this->Fetch_items->fetch_banner("4");
		$this->data['banner_5'] = $this->Fetch_items->fetch_banner("5");
		$this->data['banner_6'] = $this->Fetch_items->fetch_banner("6");
		$this->data['banner_7'] = $this->Fetch_items->fetch_banner("7");
	
		
		
		
		
		$this->load->view('banners', $this->data);
		
	}
	public function edit_banner($banner_id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		
		/********************** fetch banners ****************************/
		$this->load->model('Fetch_items');
		$this->data['banner'] = $this->Fetch_items->fetch_banner($banner_id);
		
	
		
		
		
		
		$this->load->view('edit_banner', $this->data);
		
	}
	
	public function edit_language(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		$id = $this->input->post('id');
		$ar = $this->input->post('ar');
		$en = $this->input->post('en');
		$tr = $this->input->post('tr');
		
		$this->db->query("UPDATE translations SET ar = '$ar', en = '$en', tr = '$tr' WHERE id = '$id'");
		
		redirect(base_url().'settings/language', 'refresh');
	}
	
	
	public function edit_banner_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$id = $this->input->post('id');
		$url = $this->input->post('url');
		
		if($_FILES["image"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = 'images/banners/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["image"]['name'];
			$config['file_name'] = $new_name;
			
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			$this->upload->do_upload('image');
			$this->db->query("UPDATE banners SET image_ar='$target_path' WHERE id = '$id'");
		}
		else{
			//echo 66;
		}
		$this->db->query("UPDATE banners SET url='$url' WHERE id = '$id'");
		redirect(base_url().'settings/banners', 'refresh');
		
	}
	
	
	
	
	public function delete_slider($id){
		$this->load->database();
		$this->db->query("DELETE FROM slider WHERE id = '$id'");
		redirect(base_url().'settings/slider', 'refresh');
	}
	
	public function edit_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$content = $this->input->post('content');
		$id = $this->input->post('id');
		
		$this->db->query("UPDATE pages SET content = '$content' WHERE id = '$id'");
		
		redirect(base_url().'pages', 'refresh');
		
		
		
		
		
	}
	
	public function display(){
		$this->load->database();
		$word = $this->input->get('word');
		$lang = $this->input->get('lang');
		$word = $this->db->query("SELECT * FROM translations WHERE title = '$word'");
		$word = $word->result();
		echo $word[0]->$lang;
	}
	public function change_lang(){
		$lang = $this->input->get('lang');
		//echo $lang;
		$this->session->set_userdata('admin_lang', $lang);
		
		redirect(base_url(), 'refresh');
	}
	
	public function info(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		
		$this->load->database();
		
		
		
		
	
		
		
		/*$email = $this->db->query("SELECT * FROM settings WHERE name = 'email'");
		$email = $email->result();
		$this->data["email"] = $email[0]->content;
		
		
		$address = $this->db->query("SELECT * FROM settings WHERE name = 'address'");
		$address = $address->result();
		$this->data["address"] = $address[0]->content;
		
		
		
		$about_us = $this->db->query("SELECT * FROM settings WHERE name = 'ar_about_us'");
		$about_us = $about_us->result();
		$this->data["ar_about_us"] = $about_us[0]->content;
		
		
		$phone = $this->db->query("SELECT * FROM settings WHERE name = 'phone'");
		$phone = $phone->result();
		$this->data["phone"] = $phone[0]->content;
		
		$facebook = $this->db->query("SELECT * FROM settings WHERE name = 'facebook'");
		$facebook = $facebook->result();
		$this->data["facebook"] = $facebook[0]->content;
		
		
		$facebook = $this->db->query("SELECT * FROM settings WHERE name = 'linkedin'");
		$facebook = $facebook->result();
		$this->data["linkedin"] = $facebook[0]->content;
		
		
		
		$twitter = $this->db->query("SELECT * FROM settings WHERE name = 'twitter'");
		$twitter = $twitter->result();
		$this->data["twitter"] = $twitter[0]->content;
		
		
		$instegram = $this->db->query("SELECT * FROM settings WHERE name = 'instegram'");
		$instegram = $instegram->result();
		$this->data["instegram"] = $instegram[0]->content;
		
		$whatsapp = $this->db->query("SELECT * FROM settings WHERE name = 'whatsapp'");
		$whatsapp = $whatsapp->result();
		$this->data["whatsapp"] = $whatsapp[0]->content;
		
		$snapchat = $this->db->query("SELECT * FROM settings WHERE name = 'snapchat'");
		$snapchat = $snapchat->result();
		$this->data["snapchat"] = $snapchat[0]->content;
		
		$youtube = $this->db->query("SELECT * FROM settings WHERE name = 'youtube'");
		$youtube = $youtube->result();
		$this->data["youtube"] = $youtube[0]->content;
		
		$telegram = $this->db->query("SELECT * FROM settings WHERE name = 'telegram'");
		$telegram = $telegram->result();
		$this->data["telegram"] = $telegram[0]->content;
		
		
		$logo = $this->db->query("SELECT * FROM settings WHERE name = 'logo'");
		$logo = $logo->result();
		$this->data["logo"] = $logo[0]->content;
		
		
		
		$map = $this->db->query("SELECT * FROM settings WHERE name = 'map'");
		$map = $map->result();
		$this->data["map"] = $map[0]->content;
		*/
		
		$site_info = array();
		$all_settings = $this->db->query("SELECT * FROM settings ORDER BY ordering");
		$all_settings = $all_settings->result();
		foreach($all_settings as $s){
			$site_info[$s->name] = $s;
		}
		$this->data['all_site_info'] = $site_info;
		//var_dump($site_info);*/
		
		//$url = "https://osus-team.com/platform/api/fetch_api_settings?key=jk4hkjaw32&secret=wkjhe4324kh4523ew423t333A";
	    //$json = file_get_contents($url);
		//$data = json_decode($json, true);
		//var_dump($data);
		//$this->data['all_site_info'] = $data;

		
		
		$this->load->view('info', $this->data);
		
	}
	
	public function edit_info_image(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$name = $this->input->post('name');
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = '../uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 1000000;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			//print_r($config);
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			if(!$this->upload->do_upload('img')){
					$error =array('upload_data' => $this->upload->data());
					die("Error");
			}
			$this->db->query("UPDATE settings SET content = '$target_path' WHERE  name = '$name'");
		}
		redirect(base_url().'settings/info', 'refresh');
	}
	
	public function escape_str($str, $like = FALSE)
{
    if (is_array($str))
    {
        foreach ($str as $key => $val)
        {
            $str[$key] = $this->escape_str($val, $like);
        }

        return $str;
    }

    if (function_exists('mysqli_real_escape_string') AND is_object($this->conn_id))
    {
        $str = mysqli_real_escape_string($this->conn_id, $str);
    }
    else
    {
        $str = addslashes($str);
    }

    // escape LIKE condition wildcards
    if ($like === TRUE)
    {
        $str = str_replace(array('%', '_'), array('\\%', '\\_'), $str);
    }

    return $str;
}
	
	public function edit_info(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$content = addslashes($this->input->post('content'));
		
		//echo $content;
		
		$name = $this->input->post('name');
		$sql = "UPDATE settings SET content = '$content' WHERE name = '$name'";
		//echo $sql;
		$this->db->query($sql);
		redirect(base_url().'settings/info', 'refresh');
	}
	
	
	
	
	
	public function edit_logo(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = '../uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			print_r($config);
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			if(!$this->upload->do_upload('img')){
					$error =array('upload_data' => $this->upload->data());
					die("Error");
			}
			$this->db->query("UPDATE settings SET content = '$target_path' WHERE  name = 'logo'");
		}
		redirect(base_url().'settings/info', 'refresh');
	}
	
	public function edit_banner_image(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		if($_FILES["img"]['name'] != ''){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = '../uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			print_r($config);
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			if(!$this->upload->do_upload('img')){
					$error =array('upload_data' => $this->upload->data());
					die("Error");
			}
			$this->db->query("UPDATE settings SET content = '$target_path' WHERE  name = 'banner-image'");
		}
		redirect(base_url().'settings/info', 'refresh');
	}
	
	
	public function new_client(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		if($_FILES["img"]['name'] != ''){
			$link = $this->input->post('link');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$config['upload_path']          = '../uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc';
			$config['max_size']             = 2048;
			$new_name = time().$_FILES["img"]['name'];
			$config['file_name'] = $new_name;
			//print_r($config);
			$this->load->library('upload', $config);

			$data = array('upload_data' => $this->upload->data());
			$target_path = $new_name; 
			if(!$this->upload->do_upload('img')){
					$error =array('upload_data' => $this->upload->data());
					die("Error");
			}
			$this->db->query("INSERT INTO cleints (image, link) VALUES ('$target_path', '$link')");
		}
		redirect(base_url().'settings/info', 'refresh');
	}
	
	
	
	public function admins(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		
		$users = $this->db->query("SELECT * FROM users ");
		$users = $users->result();
		$this->data["users"] = $users;
		
		
		/**************** fetch words ******************/
		$this->load->model('fetch_words');
		$this->data["words"] = $this->fetch_words->fetch_all_words();
		
		$this->load->view('admins', $this->data);
		
	}
	
	
	public function edit_admin($id){
		
		
		$users = $this->db->query("SELECT * FROM users WHERE id = '$id' ");
		$users = $users->result();
		$this->data["users"] = $users[0];
		
		$menu = $this->db->query("SELECT * FROM menu ");
		$menu = $menu->result();
		
		$i = 0;
		foreach($menu as $m){
			$menu_type = $m->id.'_0';
			$per = $this->db->query("SELECT * FROM user_per WHERE user_id = '$id' AND menu_type = '$menu_type'");
			$per = $per->result();
			if($per){
				$menu[$i]->type = 1;
			}
			else{
				$menu[$i]->type = 0;
			}
			$i++;
		}
		$this->data["menu"] = $menu;
		
		
		$this->load->view('edit_admin', $this->data);
	}
	
	
	
	
	
	
	public function new_admin(){
		
		
		
		$menu = $this->db->query("SELECT * FROM menu ");
		$menu = $menu->result();
		
		
		
		$this->data["menu"] = $menu;
		
		
		$this->load->view('new_admin', $this->data);
	}
	
	
	
	public function new_admin_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		
		$username = $this->input->post("username");
		$password = md5($this->input->post("password"));
		$this->db->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
		$fetch_last_user = $this->db->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");
		$fetch_last_user = $fetch_last_user->result();
		$user_id = $fetch_last_user[0]->id;
		
		
		
		
		
		$this->db->query("DELETE FROM user_per WHERE user_id = '$user_id'");
		$menu = $this->input->post("menu");
		for($i = 0; $i < count($menu); $i++){
			$menu_per = $menu[$i].'_0';
			$this->db->query("INSERT INTO user_per (menu_type, user_id) VALUES ('$menu_per', '$user_id') ");
		}
		
		
		redirect(base_url().'settings/admins', 'refresh');
	}
	
	
	
	
	public function edit_admin_done(){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$user_id = $this->input->post("user_id");
		$username = $this->input->post("username");
		$password = md5($this->input->post("password"));
		
		$fetch_user = $this->db->query("SELECT * FROM users WHERE id = '$user_id'");
		$fetch_user  = $fetch_user->result();
		$user_password = $fetch_user[0]->password;
		if($user_password != $password){
			$this->db->query("UPDATE users SET username = '$username', password = '$password' WHERE id = '$user_id'");
		}
		else{
			$this->db->query("UPDATE users SET username = '$username' WHERE id = '$user_id'");
		
		}
		
		
		
		$this->db->query("DELETE FROM user_per WHERE user_id = '$user_id'");
		$menu = $this->input->post("menu");
		for($i = 0; $i < count($menu); $i++){
			$menu_per = $menu[$i].'_0';
			$this->db->query("INSERT INTO user_per (menu_type, user_id) VALUES ('$menu_per', '$user_id') ");
		}
		
		
		
		
		redirect(base_url().'settings/admins', 'refresh');
	}
	
	
	
	public function delete_admin($id){
		if(!$this->session->userdata('admin_user_id')) { 
			redirect(base_url(), 'refresh');
		}
		$this->load->database();
		$this->db->query("DELETE FROM users WHERE id = '$id'");
		$this->db->query("DELETE FROM user_per  WHERE user_id = '$id'");
		redirect(base_url().'settings/admins', 'refresh');
	}
	
	
	public function stories(){
   
	
	$stories = $this->db->query("SELECT * FROM stories");
	$this->data["stories"] = $stories->result();
    
    
  
    
    
    
    
    $this->load->view('stories', $this->data);
    
  }
  
  
  public function new_story(){
    
    
    
    
    $this->load->view('new_story', $this->data);
    
  }
  
  
  
  public function edit_story($id){
    if(!$this->session->userdata('admin_user_id')) { 
      redirect(base_url(), 'refresh');
    }
    
    $this->load->database();
    
    /************* This lines should copied to each controller **********************/
    /*************** Menu ****************/
    $query = $this->db->query("SELECT * FROM menu WHERE parent_id = 0 ORDER BY ordering");
    $this->data['right_menu']  = $query->result();
    
    
    $page = $this->db->query("SELECT * FROM stories WHERE id = '$id'");
    $page = $page->result();
    $this->data["story"] = $page[0];
    
    $this->load->view('edit_story', $this->data);
    
  }
  
  
  
	public function new_story_done(){
    if(!$this->session->userdata('admin_user_id')) { 
      redirect(base_url(), 'refresh');
    }
    
    $this->load->database();
    
    $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    $config['upload_path']          = '../uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 2048;
        $new_name = time().$_FILES["image"]['name'];
    $config['file_name'] = $new_name;
    
    $this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());
    $target_path = $new_name; 
    $this->upload->do_upload('image');
    $name = $this->input->post('name');
    $spec = $this->input->post('spec');
    $content = $this->input->post('content');
    $this->db->query("INSERT INTO stories (name, spec, content, image) VALUES ('$name', '$spec', '$content', '$target_path')");
    redirect(base_url().'settings/stories', 'refresh');
    
  }
  
  
  
  public function edit_story_done(){
    if(!$this->session->userdata('admin_user_id')) { 
      redirect(base_url(), 'refresh');
    }
    
    $this->load->database();
    
    $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    $config['upload_path']          = '../uploads/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc';
        $config['max_size']             = 2048;
    $id = $this->input->post('id');
    if($_FILES["image"]['name']){
      $new_name = time().$_FILES["image"]['name'];
      $config['file_name'] = $new_name;
      
      $this->load->library('upload', $config);

      $data = array('upload_data' => $this->upload->data());
      $target_path = $new_name; 
      $this->upload->do_upload('image');
      $this->db->query("UPDATE stories SET  image = '$target_path' WHERE id = '$id'");
    }
        
    $name = $this->input->post('name');
    $spec = $this->input->post('spec');
    $content = $this->input->post('content');
    $this->db->query("UPDATE stories SET  name = '$name', spec = '$spec', content  = '$content' WHERE id = '$id'");
    redirect(base_url().'settings/stories', 'refresh');
    
  }

}
