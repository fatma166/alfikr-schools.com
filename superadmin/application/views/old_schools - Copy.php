<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>

<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">المدارس </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم الإداري</li>
								<li class="breadcrumb-item active" aria-current="page">المدارس</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>



<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">

			
			
			
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

function change_school_status(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_school_status",
                data: {'value': value, 'id': id}

            }).done(function (msg) {
                   alert("تم تغيير الحالة");
            });
}

function courses_featured(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/courses_featured",
                data: {'value': value, 'id': id}

            }).done(function (msg) {
                   
            });
}


</script>

<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">جميع المدارس</h4>
						  <a style="float: left;" type="button" class="btn btn-primary" href="<?php echo base_url(); ?>master/new_school">
							إضافة مدرسة جديدة
						  </a>
						</div>
						<div class="box-body">
<table class='table table-striped table-bordered'  id="datatable">
			<thead><tr>
				
				<th style="text-align: right">الرقم</th>			
				
				<th style="text-align: right">الاسم</th>
				
				
			
				<th style="text-align: right">الحالة</th>
			
				<th style="text-align: right"></th>
				
			</tr>
			<thead>
				<tbody>
	<?php 
	    $i = 1;
		foreach($schools as $s){
			//var_dump($p);
	?>
			<tr>
				
				<td><?php echo $i; ?></td>				
				<td><a href="<?php echo base_url(); ?>master/view_course/<?php echo $s->id; ?>">
				        
				        
				        
				        <?php echo $s->name; ?>
				        
				        
				</a></td>
				
				<td>
			
					
					<input type="checkbox" <?php if($s->status == 1){ ?>checked<?php } ?> value="<?php echo $s->id; ?>"  class="js-switch" onchange="change_school_status(<?php echo $s->id; ?>,<?php if($s->status == 1){ ?>0<?php }else{ ?>1<?php } ?>)"  /> 
				
				</td>
				
				
				
				<td>
					<a href="<?php echo base_url(); ?>master/view_school/<?php echo $s->id; ?>"  class="btn btn-warning edit_modal" alt="تعديل"><span class="fa fa-edit"></span></a>
				</td>
			</tr>
	
	<?php
	        $i++;
		}
	?>

	</tbody>
	
	<?php 
		$this->load->helper('url');


		$currentURL = current_url();

		$params   = $_SERVER['QUERY_STRING']; 

		$fullURL = $currentURL . '?' . $params; 

		$this->session->set_userdata('products_url', $fullURL); 
	?>
</table>


</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>
          

<script>

$( document ).ready(function() {
    $('#datatable').DataTable();
});

</script>
           
<div class="pagination" align="center"><?php //echo $links; ?></div>
          
 
 
 <?php $this->load->view('template/footer'); ?>
