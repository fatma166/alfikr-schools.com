<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>


<form action="<?php echo base_url(); ?>master/statistics" method="get">
<select name="course_id" class="form-control" style="width: 300px; height: 40px; display: inline-block;">
    <option value="0">
        جميع الكورسات
    </option>
    <?php foreach($all_courses as $c){ ?>
    <option value="<?php echo $c->id; ?>" <?php if($this->input->get('course_id') == $c->id){ ?>selected<?php } ?>><?php echo $c->name; ?></option>
    <?php } ?>
</select>
<select name="filter_type"  class="form-control" style="width: 300px; height: 40px; display: inline-block;">
    <option value="0">الرجاء اختيار نوع الطلاب</option>
    <option value="1" <?php if($this->input->get('filter_type') == 1){ ?>selected<?php } ?>>
        الطلاب الذين لم يدفعوا
    </option>
    <option value="2" <?php if($this->input->get('filter_type') == 2){ ?>selected<?php } ?>>
        الطلاب الذين دفعوا
    </option>
</select>
<select name="month"  class="form-control" style="width: 300px; height: 40px; display: inline-block;">
    <option value="0">الرجاء اختيار الشهر</option>
    <option value="06" <?php if($this->input->get('month') == 6){ ?>selected<?php } ?>>6</option>

<option value="07" <?php if($this->input->get('month') == 7){ ?>selected<?php } ?>>7</option>

<option value="08" <?php if($this->input->get('month') == 8){ ?>selected<?php } ?>>8</option>

<option value="09" <?php if($this->input->get('month') == 9){ ?>selected<?php } ?>>9</option>

<option value="10" <?php if($this->input->get('month') == 10){ ?>selected<?php } ?>>10</option>


    <option value="11" <?php if($this->input->get('month') == 11){ ?>selected<?php } ?>>11</option>
    
    <option value="12" <?php if($this->input->get('month') == 12){ ?>selected<?php } ?>>12</option>
</select>
<input type="submit" class="btn btn-success" value="بحث" />
</form>		
			
			
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


					








<script>
function change_quantity(quantity, product_id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>products/change_quantity",
                data: {'quantity': quantity, 'product_id': product_id}

            }).done(function (msg) {
                   alert("تم تغيير الكمية");
            });
}
</script>
<style>
    .toto td{
        background: #ddd;
    }
    
    .toto:hover td{
         background: #006699;
         color: white;
    }
    
    .dodo:hover td{
        background: #006699;
        color: white;
       
    }
</style>
<table class='table table-striped'>
			<tr >
				
		
				<th style="text-align: right">الطالب</th>
			
				
			
			
				<th style="text-align: right">الدفعات</th>
			
				<th style="text-align: right">المبلغ المتبقي </th>
				
				
			</tr>
	<?php 
	    $i = 0;
	    $all_payments = 0;
		foreach($students as $s){
		    $i++;
		    $payments = $s->payments;
			//var_dump($p);
	?>
	    <tr <?php if($i%2 == 0){ ?>class="toto"<?php } else{ ?>class="dodo"<?php } ?>>
	           <Td><?php echo $s->first_name .' ' .$s->last_name; ?></Td>
	           <td>
	               <table width="300">
	                   <?php 
	                    if($payments){
    	                    foreach($payments as $p){
    	                        $all_payments += $p->amount;
    	                        echo '<tr><td>'  . $p->amount .' </Td><td> ' . $p->date .' </td></tr>'; 
    	                    }
	                    }
	                   ?>
	               </table>
	               
	           </td>
	           <Td></Td>
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
<table style="width:100%"><tr><td align="left">المبلغ الكلي :<?php echo $all_payments; ?></td></tr></table>

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
                                    		   
                                    			html = html + '<h2 align="center">أكاديمية إيميسا</h2><hr />';
                                    			html = html + '<h3 align="right">رقم الإيصال: ' + id + '</h3>';
                                    			//html = html + '<h3 align="right">اسم الطالب ' + student_name + '</h3>';
                                    			 html = html + '<table width="100%" align="center">';
                                    			/* html = html + '<table width="318" align="center"><tr><td width="200" style="font-size: 23px;">رقم الطلب</td><td style="font-size: 23px;">'+order_number+'</td>'; */
                                    			html = html + '<tr><td style="font-size: 14px;">التاريخ: </td><td style="font-size: 23px;">'+date+'</td><td><div align="center"><img src="https://emisa-akademi.com/admin/images/logo.png" width="150" /></td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">اسم الطالب: </td><td style="font-size: 23px;">'+student_name+'</td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">اسم الدورة: </td><td style="font-size: 23px;">'+course_name+'</td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">المبلغ: </td><td style="font-size: 23px;">'+amount+'</td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">الموظف</td><td style="font-size: 23px;">'+ username+'</td></tr>';
                                    			html = html + '<tr><td style="font-size: 14px;">المبلغ المتبقي</td><td style="font-size: 23px;">'+ restamount+'</td></tr>';
                                    			
                                    			html = html + '</table>';
												
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