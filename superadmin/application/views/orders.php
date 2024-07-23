
<?php $this->load->view('template/body'); ?>
<style>
	.order_s_0{
		background: lightcoral;
		color: #000;
		
	}
	.order_s_1{
		background: navajowhite;
		color: #000;
		
	}
	.order_s_2{
		background: powderblue;
		color: #000;
		
	}
	.order_s_3{
		background: darkseagreen;
		color: #000;
		
	}
	.order_s_4{
		background: lightblue;
		color: #000;
		
	}
	.order_s_2{
		background: powderblue;
		color: #000;
		
	}
	.order_s_2{
		background: powderblue;
		color: #000;
		
	}
</style>


<table class='table'>
			<tr>
				<td colspan="6" align="center">
					<span class="fa fa-circle" style="font-size: 15px; color: lightcoral; display: inline-block "></span> بانتظار الدفع
					<span class="fa fa-circle" style="font-size: 15px; color: navajowhite; display: inline-block "></span> بانتظار المراجعة
					<span class="fa fa-circle" style="font-size: 15px; color: powderblue; display: inline-block "></span> قيد التنفيذ
					<span class="fa fa-circle" style="font-size: 15px; color: darkseagreen; display: inline-block "></span> مكتمل
					<span class="fa fa-circle" style="font-size: 15px; color: lightblue; display: inline-block "></span> جاري التوصيل
				</td>
			</tr>
			<tr>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: right">الاسم الأول</th>
				<th style="text-align: right">الاسم الثاني</th>
				<th style="text-align: right">التاريخ</th>
				<th style="text-align: right">حالة الطلب</th>
				
				<th style="text-align: right">عرض مزيد من التفاصيل</th>
			</tr>
	<?php 
		foreach($orders as $o){
	?>
			<tr class="order_s_<?php echo $o->status; ?>">
				<td><?php echo $o->id; ?></td>
				<td><?php echo $o->firstname; ?></td>
				<td><?php echo $o->lastname; ?></td>
				<td><?php echo $o->date; ?></td>
				<td>
				<form method="post" action="<?php echo base_url(); ?>orders/change_status">
					<select name="status">
						<option value="0" <?php if($o->status == 0){ ?>selected<?php } ?>>بانتظار الدفع</option>
						<option value="1" <?php if($o->status == 1){ ?>selected<?php } ?>>بانتظار المراجعة</option>
						<option value="2" <?php if($o->status == 2){ ?>selected<?php } ?>>قيد التنفيذ</option>
						<option value="3" <?php if($o->status == 3){ ?>selected<?php } ?>>مكتمل</option>
						<option value="4" <?php if($o->status == 4){ ?>selected<?php } ?>>جاري التوصيل</option>
						<option value="5" <?php if($o->status == 5){ ?>selected<?php } ?>>تم الشحن</option>
						<option value="6" <?php if($o->status == 6){ ?>selected<?php } ?>>تم التوصيل</option>
						<option value="7" <?php if($o->status == 7){ ?>selected<?php } ?>>ملغى</option>
						<option value="8" <?php if($o->status == 8){ ?>selected<?php } ?>>مسترجع</option>
						
					
					</select>
					<input type="hidden" name="id" value="<?php echo $o->id; ?>" />
					<input type="submit" value="تعديل" class="btn btn-success" />
				</form>
				</td>
				<td><a href="<?php echo base_url(); ?>orders/view_order/<?php echo $o->id; ?>">عرض التفاصيل</a></td>
			</tr>
	
	<?php
		}
	?>
</table>
        

          
 
 
 <?php $this->load->view('template/footer'); ?>