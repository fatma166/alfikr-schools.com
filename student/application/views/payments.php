<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>



			
<?php /*
<table width="100%">
	<tr>
		<td>
			<a href='<?php echo base_url(); ?>products/new_product' class='btn btn-success' style="display: inline-block;">
			
				<?php echo $words["new"]; ?>
			</a>
		</td>
		
		<td>
			<select name="category_id" onchange="choose_category(this.value)" class="form-control" style="width: 220px; display: inline-block;">
				<option value="0">اختار التصنيف لعرض منتجاته</option>
				<?php
					foreach($all_categories as $cat){
				?>
					<option value="<?php echo $cat->id; ?>" <?php if($this->input->get('category_id') == $cat->id){ ?>selected<?php } ?>><?php echo $cat->en_name; ?></option>

				<?php
					}
				?>

			</select>
		</td>
		<td>
			<form method="get" action="<?php echo base_url(); ?>products">
				<input type="text" name="name" placeholder="أدحل اسم المنتج للبحث عنه"  required style="width: 300px; display: inline-block;" class="form-control" />
				<input type="submit" class="btn" value="بحث" style=" display: inline-block;" />
			</form>
		</td>
		<td>
			<div class="form-group" style="float: left; width: 300px;">
                        
                        <div class="col-md-12 col-sm-3 col-xs-12">
						
                          <select class="form-control" onchange="location.href='<?php echo base_url(); ?>products/?sort='+this.value">
                            
                              <option value="all" >جميع المنتجات</option>
                              <option value="no_price" <?php if($this->input->get('sort') && $this->input->get('sort') == 'no_price'){ ?>selected<?php } ?>>منتجات غير مسعرة</option>
                              <option value="offered_products" <?php if($this->input->get('sort') && $this->input->get('sort') == 'offered_products'){ ?>selected<?php } ?>>منتجات مخفضة</option>
                              <option value="finished_products" <?php if($this->input->get('sort') && $this->input->get('sort') == 'finished_products'){ ?>selected<?php } ?>>منتجات نفذت</option>
                              <option value="hidden_products" <?php if($this->input->get('sort') && $this->input->get('sort') == 'hidden_products'){ ?>selected<?php } ?>>منتجات مخفية</option>
                              <option value="most_good" <?php if($this->input->get('sort') && $this->input->get('sort') == 'most_good'){ ?>selected<?php } ?>>المتيزة</option>
                              <option value="most_sell" <?php if($this->input->get('sort') && $this->input->get('sort') == 'most_sell'){ ?>selected<?php } ?>>الأكثر مبيعاً</option>
                           
                          </select>
                        </div>
						
                      </div>
		</td>
		<td>
			<?php 
							if($this->input->get('sort') || $this->input->get('category_id') || $this->input->get('name')){
						?>
								<a href="<?php echo base_url(); ?>products" class="btn btn-danger" style="display: inline-block">إلغاء الفلاتر</a>
						<?php
							}
						?>
		</td>
	</tr>
</table>



*/ ?>


					









 <form method="get" action="<?php echo base_url(); ?>master/payments">
<table class="table">
   
    <td><div id="total_payments_view"></div></td>
    
<table class='table table-striped'>
			<tr>
				
				<th style="text-align: right">الرقم</th>
				
				<th style="text-align: right">الدورة</th>
				<th style="text-align: right">الكمية</th>
		
				<th style="text-align: right">التاريخ</th>
			
			
			
				<th style="text-align: right">المبلغ المتبقي </th>
				
						
			</tr>
	<?php 
	    $total_payments = 0;
		foreach($payments as $m){
			//var_dump($p);
	?>
			<tr>
				
				<td id="id_<?php echo $m->id; ?>"><?php echo $m->id; ?></td>
				
				<td id="course_name_<?php echo $m->id; ?>"><?php echo $m->name; ?></td>
				<td id="amount_<?php echo $m->id; ?>"><?php echo $m->amount; ?></td>
			
				<td id="date_<?php echo $m->id; ?>"><?php echo $m->date; ?></td>
				
			
				<td id="restamount_<?php echo $m->id; ?>">
				    <?php
				        $total_payments += $m->total;
				        $rest  = $m->course_cost - $m->total;
				        echo $rest;
				    ?>
				</td>
				
			</tr>
	
	<?php
		}
	?>
	
	<?php 
		$this->load->helper('url');


		$currentURL = current_url();

		$params   = $_SERVER['QUERY_STRING']; 

		$fullURL = $currentURL . '?' . $params; 

		$this->session->set_userdata('products_url', $fullURL); 
	?>
	
</table>
<link rel="stylesheet" href="https://osus.academy/admin/css/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script>
	
	$(document).ready(function() {
		$('#sandbox-container1').datepicker({
				dateFormat: 'yy-mm-dd'
		});
		
		$('#sandbox-container2').datepicker({
				dateFormat: 'yy-mm-dd'
		});
	
	});
</script>	

<script>
    document.getElementById('total_payments_view').innerHTML = "المبلغ الإجمالي " + <?php echo $total_payments; ?> + "$ ";
</script>


<script>
                                    		function printDiv(vid){
                                    		    
                                    		 
                                    		    var id = "id_"+vid;
                                    		    var student_name = "student_name_"+vid;
                                    		    //alert(student_name);
                                    		    var course_name = "course_name_"+vid;
                                    		    var date = "date_"+vid;
                                    		    var amount = "amount_"+vid;
                                    		    var username = "username_"+vid;
                                    		    var restamount = "restamount_"+vid;
                                    		    
                                    		    
                                    		    
												var id = document.getElementById(id).innerHTML;
												var student_name = document.getElementById(student_name).innerHTML;
												var course_name = document.getElementById(course_name).innerHTML;
												var date = document.getElementById(date).innerHTML;
												var amount = document.getElementById(amount).innerHTML;
												var username = document.getElementById(username).innerHTML;
												
                                    			
												
                                    			
                                    			
                                    			
                                    			var restamount  = document.getElementById(restamount).innerHTML;
                                    			
                                    			var html = '<div style="font-size: 16px;">';
												//html = html + '</div>';
                                    		   
                                    			html = html + '<h2 align="center">منصة ماس للتعليم</h2><hr />';
                                    			html = html + '<h3 align="right">رقم الإيصال: ' + id + '</h3>';
                                    			//html = html + '<h3 align="right">اسم الطالب ' + student_name + '</h3>';
                                    			 html = html + '<table width="100%" align="center">';
                                    			/* html = html + '<table width="318" align="center"><tr><td width="200" style="font-size: 23px;">رقم الطلب</td><td style="font-size: 23px;">'+order_number+'</td>'; */
                                    			html = html + '<tr><td style="font-size: 14px;">التاريخ: </td><td style="font-size: 23px;">'+date+'</td><td><div align="center"><img src="https://emisa-akademi.com/admin/images/logo.png" width="150" /></td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">اسم الطالب: </td><td style="font-size: 23px;">'+student_name+'</td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">اسم الدورة: </td><td style="font-size: 23px;">'+course_name+'</td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">المبلغ: </td><td style="font-size: 23px;">'+amount+'</td></tr>';
                                    		
                                    			html = html + '<tr><td style="font-size: 14px;">المبلغ المتبقي</td><td style="font-size: 23px;">'+ restamount+'</td></tr>';
                                    			
                                    			
                                    			
                                    			html = html + '</table>';
                                    			
                                    			html = html + '<table width="80%" align="center"><tr><td align="left">الختم والتوقيع</td></tr></table>';
												html += "<br /><br /><br />";
												html += html;
                                    		    
                                    		    
                                    		    //html = html + '<div style="position: absolute; bottom: 0px; text-align: center; width: 100%">' + center_address +  ' <br /><div style="direction: ltr"> ' + center_phone +  '</div></div>';
                                    			document.body.innerHTML = html;
                                    			window.print();
                                    			//document.body.innerHTML = originalContents;
                                    			
                                    			window.close()
                                    		}
                                    	</script>
										
           
<div class="pagination" align="center"><?php //echo $links; ?></div>
          
 
 
 <?php $this->load->view('template/footer'); ?>