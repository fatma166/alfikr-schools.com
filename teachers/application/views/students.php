<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>


<a href='<?php echo base_url(); ?>master/new_student' class='btn btn-success' style="display: inline-block;">
			
				<?php echo $words["new"]; ?>
			</a>
			
			
			
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
    .student_row:hover{
        background: #26b99a;
        color: white;
        cursor: pointer;
    }
</style>

<script>
		function fetch_student(text){
		   //console.log(categories_array);
		   var course_id = document.getElementById("filter_course_id").value;
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/master/fetch_student_ajax",
                data: {'text': text, 'course_id': course_id}

            }).done(function (msg) {
                    document.getElementById("students_table").innerHTML = msg;
            });
		}


</script>

<select style="width: 300px; display: inline-block; padding: 3px; border-radius: 1px;" name="" class="form-control" onchange="location.href='<?php echo base_url(); ?>master/students/?course_id='+this.value" id="filter_course_id">
    <option value="0">جميع الدورات</option>
    <?php foreach($all_courses as $c){ ?>
    <option <?php if($this->input->get('course_id') == $c->id){ ?>selected<?php } ?> value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
    <?php } ?>
</select>
<input type="text" placeholder="اسم الطالب ..." style="width: 300px; display: inline-block; margin-top: -20px;border-radius: 1px;" name="" class="form-control" onkeyup="fetch_student(this.value);" />
<div id="students_table">
<table class='table '>
			<tr >
				
				<th style="text-align: right">الرقم</th>
				
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">الموبايل</th>
			
				<th style="text-align: right">تعديل</th>
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php
	    $i = 1;
		foreach($students as $s){
		
	?>
			<tr onclick="location.href='<?php echo base_url(); ?>master/student_profile/<?php echo $s->id; ?>'" class="student_row">
				
				<td><?php echo $i; ?></td>
				<td><?php echo $s->first_name .' ' .$s->last_name; ?></td>
				<td><?php echo $s->mobile; ?></td>
				
				
				<td><a href="<?php echo base_url(); ?>master/edit_student/<?php echo $s->id; ?>" >تعديل</a></td>
				<td><a href="<?php echo base_url(); ?>master/delete/students/<?php echo $s->id; ?>">حذف</a></td>
			</tr>
	
	<?php
	        $i++;
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

</div>
           
<div class="pagination" align="center"><?php //echo $links; ?></div>
          
 
 
 <?php $this->load->view('template/footer'); ?>