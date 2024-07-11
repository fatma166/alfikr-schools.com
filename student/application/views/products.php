<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>

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
<table class='table table-striped'>
			<tr>
				
				<th style="text-align: right"><?php echo $words["id"]; ?></th>
				<th style="text-align: right"><?php echo $words["image"]; ?></th>
				<th style="text-align: right"><?php echo $words["name"]; ?></th>
				<th style="text-align: right"><?php echo $words["image"]; ?></th>
				<th style="text-align: right"><?php echo $words["category"]; ?></th>
				<th style="text-align: right"><?php echo $words["new"]; ?></th>
			
				<th style="text-align: right"><?php echo $words["sub_products"]; ?></th>
				<th style="text-align: right"><?php echo $words["views"]; ?></th>
				<th style="text-align: right"><?php echo $words["featured"]; ?></th>
				<th style="text-align: right"><?php echo $words["more_sells"]; ?></th>
				<?php if($edit == 1){ ?><th style="text-align: right"><?php echo $words["edit"]; ?></th><?php } ?>
				<?php if($delete == 1){ ?><th style="text-align: right"><?php echo $words["delete"]; ?></th><?php } ?>
				<th style="text-align: right"><?php echo $words["hide"]; ?></th>
				<th style="text-align: right"><?php echo $words["edit"]; ?></th>
				<th style="text-align: right"><?php echo $words["delete"]; ?></th>
	<?php 
		foreach($products as $p){
			//var_dump($p);
	?>
			<tr>
				
				<td><?php echo $p->id; ?></td>
				<td><img <?php if($p->hidden == 1){ ?>style="opacity: 0.5;" <?php } ?> src="<?php echo base_url(); ?>uploads/<?php echo $p->image; ?>" height="100" /></td>
				<td><?php echo $p->name; ?> <?php if($p->active_offer){ ?><i class="fa fa-fire" style='color: red;'></i><?php } ?></td>
				<td><a href="<?php echo base_url(); ?>products/product_images/<?php echo $p->id; ?>"><?php echo $words["image"]; ?></a></td>
				<td>
					<?php 
						$cats = $p->categories;
						foreach($cats as $c){
							echo $c->en_name.'<br />';
						}
					?>
				
				</td>
				<td>
					<a href="<?php echo base_url(); ?>products/connected_products/<?php echo $p->id; ?>"><i class="fa fa-plus"></i></a>
				</td>
				<td><a href="<?php echo base_url(); ?>products/products_kinds/<?php echo $p->id; ?>"><?php echo $words["edit"]; ?></a></td>
				<td><?php echo $p->views; ?></td>
				<td>
					<?php if($p->featured == 0){ ?>
					<a href='<?php echo base_url(); ?>products/featured/<?php echo $p->id; ?>/1'><img src="<?php echo base_url(); ?>images/icons/featured_on.png" alt="مفضلة" /></a>
					<?php } else { ?>
					<a href='<?php echo base_url(); ?>products/featured/<?php echo $p->id; ?>/0'><img src="<?php echo base_url(); ?>images/icons/featured_off.png" alt="مفضلة" /></a>
					<?php } ?>
				</td>
				<td>
					<?php if($p->most_sell == 0){ ?>
					<a href='<?php echo base_url(); ?>products/most_sell/<?php echo $p->id; ?>/1'><img src="<?php echo base_url(); ?>images/icons/featured_on.png" alt="مفضلة" /></a>
					<?php } else { ?>
					<a href='<?php echo base_url(); ?>products/most_sell/<?php echo $p->id; ?>/0'><img src="<?php echo base_url(); ?>images/icons/featured_off.png" alt="مفضلة" /></a>
					<?php } ?>
				</td>
				<td>
					<?php if($p->hidden == 0){ ?>
					<a href='<?php echo base_url(); ?>products/hidden/<?php echo $p->id; ?>/1'><?php echo $words["hide"]; ?></a>
					<?php } else { ?>
					<a href='<?php echo base_url(); ?>products/hidden/<?php echo $p->id; ?>/0'><?php echo $words["show"]; ?></a>
					<?php } ?>
				</td>
				<td><a href='<?php echo base_url(); ?>products/edit/<?php echo $p->id; ?>'><img src="<?php echo base_url(); ?>images/icons/edit.png" alt="تعديل" /></a></td>
				<td><a href='<?php echo base_url(); ?>products/delete/<?php echo $p->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png" alt="تعديل" /></a></td>
				
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
           
<div class="pagination" align="center"><?php echo $links; ?></div>
          
 
 
 <?php $this->load->view('template/footer'); ?>