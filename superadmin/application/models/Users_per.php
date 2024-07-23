<?php
class Users_per extends CI_Model {
	function check_per($menu, $type){
		$this->load->database();
		$user_id = $this->session->userdata('admin_user_id');
		$menu_type = $menu.'_'.$type;
		$per = $this->db->query("SELECT * FROM user_per WHERE user_id = '$user_id' AND menu_type = '$menu_type'");
		$per = $per->result();
		if($per){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	
	
	public function fetch_right_menu(){
		$this->load->database();
		$user_id = $this->session->userdata('admin_user_id');
		$query = $this->db->query("SELECT * FROM menu WHERE is_father = 1  AND visible = 1 AND superadmin = 1  ORDER BY ordering");
		$menu  = $query->result();
		$new_menu = array();
		$i =  0;
		foreach($menu as $m){
			$menu_type = $m->id.'_0';
			$check = $this->db->query("SELECT * FROM user_per WHERE menu_type = '$menu_type' AND user_id = '$user_id'");
			
			/*********** fetch children ****************/
			
			
			
			
			if($check->result() || $user_id == 1){
				$children = $this->db->query("SELECT * FROM menu WHERE parent_id = '$m->id'")->result();
				$children_menu = array();
				foreach($children as $c){
				    $menu_type = $c->id.'_0';
			        $check = $this->db->query("SELECT * FROM user_per WHERE menu_type = '$menu_type' AND user_id = '$user_id'");
			        if($check->result() || $user_id == 1){
			            array_push($children_menu, $c);
			        }
				}
				
				$m->children = $children_menu;
				array_push($new_menu, $m);
			}
			$i++;
		}
		return $new_menu;
	}

    function fetch_cart()
    {
		
        $this->load->database();
		$total = 0;
		
		
		$cart = $this->session->userdata('cart');
		//var_dump($cart);
		if($cart){
		for($i = 0; $i < count($cart); $i++){
			$product_id = $cart[$i];
			$details = $this->db->query("SELECT * FROM products WHERE id = '$product_id'");
			$details = $details->result();
			$details = $details[0];
			$total += $details->price;
		}
		$cart_str = "<button id='button-cart' onclick='show_cart_content();' type='button' data-toggle='dropdown' data-loading-text='جاري ...' class='btn btn-inverse btn-block btn-lg dropdown-toggle'>
				<i class='fa fa-shopping-cart'></i> 
				<span id='cart-total'>".count($this->session->userdata('cart'))." منتجات - $total ر.س</span>
				</button>
			<ul class='dropdown-menu pull-right' style='display: hidden' id='cart_content'>
			<li>
					<table class='table table-striped'>";
		$cart = $this->session->userdata('cart');
		$total = 0;
		
		for($i = 0; $i < count($cart); $i++){
			$product_id = $cart[$i];
			$details = $this->db->query("SELECT * FROM products WHERE id = '$product_id'");
			$details = $details->result();
			$details = $details[0];
			$total += $details->price;
			$cart_str .= "<tr>
							<td class='text-center'>                        
								<a href='".base_url()."products/view_product/$details->id'>
									<img style='height: 100px;' src='".base_url()."image/$details->image' alt='$details->name' title='$details->name' class='img-thumbnail' />
								</a>
							</td>
							<td class='text-left'>
								<a href='".base_url()."products/view_product/$details->id'>$details->name</a>
							</td>
							<td class='text-right'>x 1</td>
							<td class='text-right'>$details->price ر.س</td>
							<td class='text-center'>
								<button type='button' onclick='delete_from_cart($details->id);' title='حذف' class='btn btn-link btn-xs'>
									<i class='fa fa-times'></i>
								</button>
							</td>
						</tr>";
		}
		
		
		$cart_str .= "</table>
				</li>
				<li>
					<div>
						<table class='table table-bordered'>
							<tr>
								<td class='text-right'><strong>الاجمالي</strong></td>
								<td class='text-right'>$total ر.س</td>
							</tr>
							<tr>
								<td class='text-right'><strong>الاجمالي النهائي</strong></td>
								<td class='text-right'>$total ر.س</td>
							</tr>
						</table>
						<p class='text-right'>
							<a href='".base_url()."/cart/checkout' class='btn btn-inverse'>
								معاينة السلة                    
							</a>
							&nbsp;&nbsp;&nbsp;
							
						</p>
					</div>
				</li>
            </ul>
			
			
			";
		
		
		}
		else{
			$cart_str = "<div type='button' data-toggle='dropdown' class='heading dropdown-toggle'>
				<div class='cart-inner pull-right'>
					<div class='icon-cart'></div>
					<h4>معاينة السلة</h4>
					<a><span id='cart-total'>0 منتجات - 0ر.س<i class='fa fa-angle-down'></i></span></a>
				</div>
			</div>
			<ul class='dropdown-menu pull-right content' id='view_cart_content'>
                <li>
					<p class='text-center empty'>سلة الشراء فارغة !</p>
				</li>
            </ul>";
		}
		return $cart_str;
    }


}

?>
