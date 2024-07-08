<?php $this->load->view('template/body'); ?>
<script>
function change_ordering(ordering, id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/change_ordering",
                data: {'ordering': ordering, 'id': id}

            }).done(function (msg) {
                   alert("تمت التغييرات");
            });
}

function useful_links(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/useful_links",
                data: {'value': value, 'id': id}

            }).done(function (msg) {
                   
            });
}


function top_menu(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/top_menu",
                data: {'id': id, 'value': value}

            }).done(function (msg) {
                   
            });
}


</script>
       
     <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
					  
					  <h3>الصفحات</h3>
					  </div>
					 </div>
				  </div>
</div>
		  
       
  
       
       
      <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">  

           <a href='<?php echo base_url(); ?>pages/new_page' class='btn btn-success' style="display: inline-block; width: 200px;">
			
				صفحة جديدة
			</a>        
<table class='table table-striped table-bordered' id="datatable">
    <thead>
			<tr>
				<th style="text-align: right"><?php echo $words["id"]; ?></th>
				<th style="text-align: right"><?php echo $words["arabic_name"]; ?></th>
				<th style="text-align: right"><?php echo $words["english_name"]; ?></th>
		
				<th style="text-align: right">روابط مهمة</th>
				<th style="text-align: right">القائمة العلوية</th>
				
				<th style="text-align: right">الترتيب</th>
				
				<th style="text-align: right"></th>
				
				
				
			</tr>
		</thead>
			<tbody>
	<?php 
		foreach($pages as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->ar_name; ?></td>
				<td><?php echo $c->en_name; ?></td>
		
				<td>
				    
				    <input type="checkbox" <?php if($c->useful_links == 1){ ?>checked<?php } ?> value="<?php echo $c->id; ?>"  class="js-switch" onchange="useful_links(<?php echo $c->id; ?>,<?php if($c->useful_links == 1){ ?>0<?php }else{ ?>1<?php } ?>)"   /> 
				    
					
				</td>
				<td>
				    
				     <input type="checkbox" <?php if($c->top_menu == 1){ ?>checked<?php } ?> value="<?php echo $c->id; ?>"  class="js-switch" onchange="top_menu(<?php echo $c->id; ?>,<?php if($c->top_menu == 1){ ?>0<?php }else{ ?>1<?php } ?>)"  /> 
								
					<?php /*
					<a href='<?php echo base_url(); ?>pages/top_menu/<?php echo $c->id; ?>/1'><img src="<?php echo base_url(); ?>images/icons/featured_off.png" alt="مفضلة" /></a>
				
					<a href='<?php echo base_url(); ?>pages/top_menu/<?php echo $c->id; ?>/0'><img src="<?php echo base_url(); ?>images/icons/featured_on.png" alt="مفضلة" /></a>    */ ?>
				
				</td>
				
				<td><input type="text" name="ordering"  onchange="change_ordering(this.value, <?php echo $c->id; ?>)" value="0" style="width: 50px;" /></td>
				
				
				<?php /*
				<td><a href='<?php echo base_url(); ?>pages/edit/<?php echo $c->id; ?>'><?php echo $words["edit"]; ?></a></td>
				<Td><a href="<?php echo base_url(); ?>settings/delete/pages/<?php echo $c->id; ?>"><?php echo $words['delete']; ?></a></Td>
				*/ ?>
				
				<td>
				    	<a href="<?php echo base_url(); ?>settings/delete/pages/<?php echo $c->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذه الصفحة');" class="btn btn-danger"><span class="fa fa-trash"></span></a>
					    <a href="<?php echo base_url(); ?>pages/edit/<?php echo $c->id; ?>" class="btn btn-warning" alt="تعديل"><span class="fa fa-edit"></span></a>
				
				    
				</td>
			</tr>
	
	<?php
		}
	?>
	</tbody>
</table>
           
 </div>
					 </div>
				  </div>
</div>

          
 
 
 <?php $this->load->view('template/footer'); ?>