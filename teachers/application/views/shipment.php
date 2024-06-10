<?php $this->load->view('template/body'); ?>


<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <form method="post" action="<?php echo base_url(); ?>settings/settings_final_add_shipmet"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ></h5>
        
      </div>
      <div class="modal-body" >
        <div >
			
				<input type="text" name="name" placeholder="اسم الشركة" class="form-control" /><br />
			
			
			
			
		</div>
		<br />
		
		<div id="new_cost_in_new_shipment">
			
		</div>
		<input type="button" class="btn btn-danger" value="تسعيرة جديد" onclick="spand_new_cost_in_new_shipment()" />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >حفظ</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">إلغاء</button>
        
      </div>
    </div>
	</form>
  </div>
</div>



<input type="button" value="شركة شحن جديدة" onclick="new_shipment();" class="btn btn-success" />


<script>
	function new_shipment(){
		$('#exampleModalCenter2').modal('toggle');
	}
	
	function spand_new_cost_in_new_shipment(){
			$.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>settings/add_temp_shipment",
					data: {}

				}).done(function (msg) {
						$('#new_cost_in_new_shipment').append(msg);
					
				});
			
		
			
			
	}
	function fetch_cities(id, city_id){
		   //console.log(categories_array);
		   city = "city_id_" + city_id;
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/fetch_cities",
                data: {'id': id}

            }).done(function (msg) {
                    document.getElementById(city).innerHTML = msg;
            });
	}
	function delete_cost(id){
		var div_id = "cost_"+id;
		document.getElementById(div_id).innerHTML = '';
		$.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/delete_temp_cost",
                data: {}

            }).done(function (msg) {
                   
            });
	}
</script>
<hr />
<script>


</script>






<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        
      </div>
      <div class="modal-body" >
        <div id="modal_body">
		
		</div>
		<br />
		<input type="button" class="btn btn-danger" value="تسعيرة جديد" onclick="spand_new_cost()" />
		<div id="new_cost">
		
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">حفظ وإغلاق</button>
        
      </div>
    </div>
  </div>
</div>
<script>
	function show_modal(id, name){
		$.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/fetch_costs",
                data: {'id': id}

            }).done(function (msg) {
                    document.getElementById('modal_body').innerHTML = msg;
            });
		document.getElementById("exampleModalLongTitle").innerHTML = name;
	
		$('#exampleModalCenter').modal('toggle');
	}
	function delete_item(id){
		var row_id = 'row_'+id;
		document.getElementById(row_id).style.display = 'none';
		
	}
</script>

                   
<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">شركة الشحن</th>
				
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php 
		foreach($shipment as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td style="cursor: pointer; color: green;" onclick="show_modal(<?php echo $c->id; ?>, '<?php echo $c->name; ?>')"><?php echo $c->name; ?></td>
				
				<td><a href='<?php echo base_url(); ?>settings/delete_shipment/<?php echo $c->id; ?>'>حذف</a></td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>