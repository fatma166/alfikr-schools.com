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

function status(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_req_status",
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
					  
					  <h3>طلبات التسجيل في الدورات</h3>
					  </div>
					 </div>
				  </div>
</div>
		  
       
  
       
       
      <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">  

              
<table class='table table-striped table-bordered' id="datatable">
    <thead>
			<tr>
				<th style="text-align: right"><?php echo $words["id"]; ?></th>
				<th style="text-align: right">اسم الطالب</th>
				<th style="text-align: right">اسم الدورة</th>
		
				<th style="text-align: right">الحالة</th>
				
				<th style="text-align: right"></th>
				
				
				
			</tr>
		</thead>
			<tbody>
	<?php 
		foreach($req as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->student; ?></td>
				<td><?php echo $c->course; ?></td>
		
				<td>
				    
				    <input type="checkbox" <?php if($c->status == 1){ ?>checked<?php } ?> value="<?php echo $c->id; ?>"  class="js-switch" onchange="status(<?php echo $c->id; ?>,<?php if($c->status == 1){ ?>0<?php }else{ ?>1<?php } ?>)"   /> 
				    
					
				</td>
				
				
				
				<td>
				    	<a href="<?php echo base_url(); ?>master/delete/courses_enrolls_requests/<?php echo $c->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذه الصفحة');" class="btn btn-danger"><span class="fa fa-trash"></span></a>
					   
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