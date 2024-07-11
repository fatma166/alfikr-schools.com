<?php
class Fetch_items extends CI_Model {


    
	
	function fetch_top_menu(){
		$this->load->database();
		$this->db->where('isDeleted', 0);
		$this->db->where('parent_id', 0);
		$i = 0;
		$top_menu_categories = $this->db->get('categories')->result();
		foreach($top_menu_categories as $c){
		    $parent_id = $c->id;
		    $this->db->where('isDeleted', 0);
		    $this->db->where('parent_id', $parent_id);
		    $children = $this->db->get('categories')->result();
		    
		    
		    
		    /*************** fetch children lvl 2 *******************/
		    $j = 0;
		    foreach($children as $ch2){
		        $ch2_parent_id = $ch2->id;
		        $this->db->where('parent_id', $ch2_parent_id);
		        $this->db->where('isDeleted', 0);
		        $children_lvl2 = $this->db->get('categories')->result();
		        
		        
		        
		        /*************** fetch children lvl 3 *******************/
		        $n = 0;
		        foreach($children_lvl2 as $ch3){
		            $ch3_parent_id = $ch3->id;
    		        $this->db->where('parent_id', $ch3_parent_id);
    		        $this->db->where('isDeleted', 0);
    		        $children_lvl3 = $this->db->get('categories')->result();
    		        $children_lvl2[$n]->children_lvl3 = $children_lvl3;
    		        $n++;
		        }
		        
		        
		        $children[$j]->children_lvl_2 = $children_lvl2;
		        $j++;
		    }
		    
		    
		    
		    
		    
		    $top_menu_categories[$i]->children = $children;
		    $i++;
		}
		
		return $top_menu_categories;
			
	}
	
	
	public function fetch_user_info(){
		$this->load->database();
		if($this->session->userdata('cart') && count($this->session->userdata('cart')) > 0){
		$categories = $this->db->query("SELECT * FROM categories WHERE parent_id = 0 ORDER BY ordering");
		$categories = $categories->result();
		$i = 0;
		if($this->session->userdata('user_id')){
			$user_id = $this->session->userdata('user_id');
			$user_info = $this->db->query("SELECT * FROM site_users WHERE id = '$user_id'");
			$user_info = $user_info->result();
			return $user_info[0];
			
		}
			return null;
		}
		
		
	}
	
	
	
	
	
	public function fetch_site_info(){
		/*************** fetch site info ***********/
		$site_info = array();
		
		
		
		
		/*$url = "https://osus-team.com/platform/api/fetch_api_settings?key=jk4hkjaw32&secret=wkjhe4324kh4523ew423t333A";
	    $json = file_get_contents($url);
		$words = json_decode($json, true);
		//var_dump($words);
		for($i = 0; $i < count($words); $i++){
		    $site_info[$words[$i]['name']] = $words[$i]['content'];
		}*/
		
		
		
		$all_site_info = $this->db->query("SELECT * FROM settings");
		$all_site_info = $all_site_info->result();
		foreach($all_site_info as $s){
		    $site_info[$s->name] = $s->content;
		}
		
		
		
		
		
		
		
		
		return $site_info;
		
	}
	
	
	
	
	public function fetch_product_reviews($product_id){
		
		
		
		
		/**************** fetch product reviews *********************/
			$reviews = $this->db->query("SELECT * FROM products_reviews WHERE product_id = $product_id AND approved = 1");
			$reviews = $reviews->result();
			$stars_array = array();
			//Calculate rate
			$sum_of_stars = 0;
			$five_stars = 0;
			$four_stars = 0;
			$three_stars = 0;
			$two_stars = 0;
			$one_stars = 0;
			$i = 0;
			foreach($reviews as $r){
				$sum_of_stars += $r->stars;
				if($r->stars == 5){
					$five_stars++;
				}
				else if($r->stars == 4){
					$four_stars++;
				}
				else if($r->stars == 3){
					$three_stars++;
				}
				else if($r->stars == 2){
					$two_stars++;
				}
				else if($r->stars == 1){
					$one_stars++;
				}
				// fetch full name
				$user_id = $r->user_id;
				$full_name = $this->db->query("SELECT * FROM site_users WHERE id = '$user_id'");
				$full_name = $full_name->result();
				$reviews[$i]->name = $full_name[0]->firstname;
				$i++;
				
			}
			
			$stars_array['reviews'] = $reviews;
			$stars_array['five_stars'] = $five_stars;
			$stars_array['four_stars'] = $four_stars;
			$stars_array['three_stars'] = $three_stars;
			$stars_array['two_stars'] = $two_stars;
			$stars_array['one_stars'] = $one_stars;
			
			
			if(count($reviews) > 0){ 
				$stars_array['reviews_rate'] = floor($sum_of_stars / count($reviews));
				$stars_array['normal_reviews_rate'] = ($sum_of_stars / count($reviews));
			}
			else{
				$stars_array['reviews_rate'] = 0;
				$stars_array['normal_reviews_rate'] = 0;
			}
			//Check user review for this product
			if($this->session->userdata("user_id")){
				$user_id = $this->session->userdata("user_id");
				$user_review_flag = $this->db->query("SELECT * FROM products_reviews WHERE product_id = $product_id AND user_id = '$user_id'");
				$user_review_flage = $user_review_flag->result();
				if($user_review_flage){
					$stars_array['user_review_flage'] = 1;
				}
				else{
					$stars_array['user_review_flage'] = 0;
				}
			}
			else{
				$stars_array['user_review_flage'] = 0;
			}
			
			/*************** end of views code ***********/
			
			return $stars_array;
	}
	
	
	public function fetch_products_by($colname){
		$this->db->where($colname, 1);
		
		if($this->session->userdata('user_type') == 1){
		    $this->db->where('company_view_flag', 1);
		}
		$this->db->limit(8);
		$offer_products = $this->db->get('products')->result();
		$i = 0;
		foreach($offer_products as $p){
			$pid  = $p->id; 
			$cat = $this->db->query("SELECT * FROM categories WHERE id = (SELECT category_id FROM products_to_categories WHERE product_id = '$pid' LIMIT 1)")->result();
			if($cat){
			    $offer_products[$i]->category = $cat[0];
			}
			else{
			    $offer_products[$i]->category = null;
			}
			$i++;
		}
		return $offer_products;
	}
	
	
	
	
	
}