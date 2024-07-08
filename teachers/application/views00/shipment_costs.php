<?php $this->load->view('template/body'); ?>

<script>
function fetch_cities(id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>settings/fetch_cities",
                data: {'id': id}

            }).done(function (msg) {
                    document.getElementById('city_id').innerHTML = msg;
            });
}
</script>


<h3><?php echo $name; ?></h3>
<hr />
<h5>إضافة تسعيرة جديدة</h5>
<form method="post" action="<?php echo base_url(); ?>settings/add_shipment_cost">
<table class="table">
	<tr>
		<td>البلد</tD>
		<td>
			<select name="country_id" class="form-control" style="width: 300px;" onchange="fetch_cities(this.value)">
				<option value="0">كل البلدان</option>
				<?php	
					foreach($countries as $c){
				?>
				<option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
				<?php
					}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>المدينة</td>
		<td>
			<select name="city_id" id="city_id"  class="form-control" style="width: 300px;">
			
			
			
			</select>
		</td>
	</tr>
	<tr>
		<td>مدة التوصيل</td>
		<td><input type="text" name="period"   class="form-control" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>التكلفة</td>
		<td><input type="text" name="cost"   class="form-control" style="width: 300px;" /></td>
	</tr>
	<tr>
		<td>الدفع عن الاستلام</td>
		<td><select name="paid_type">
				<option value="0">متوفر</option>
				<option value="1">غير متوفر</option>
			</select>
		</td>
	</tr>
	<tr>
		<Td colspan="2"><input type="submit" value="إضافة" class="btn btn-success" /></td>
	</tr>
</table>
<input type="hidden" name="shipment_id" value="<?php echo $shipment_id; ?>" />
</form>



<table class='table'>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">البلد</th>
				<th style="text-align: right">المدينة</th>
				<th style="text-align: right">التسعيرة</th>
				<th style="text-align: right">مدة التوصيل</th>
				<th style="text-align: right">الدفع عند الاستلام</th>
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php 
		foreach($costs as $c){
	?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->country; ?></td>
				<td><?php echo $c->city; ?></td>
				<td><?php echo $c->cost; ?></td>
				<td><?php echo $c->period; ?></td>
				<td><?php echo $c->paid_type; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/delete_shipment_cost/<?php echo $c->id; ?>/<?php echo $shipment_id; ?>'>حذف</a></td>
				
			</tr>
	
	<?php
		}
	?>
</table>
           			


























<?php $this->load->view('template/footer'); ?>