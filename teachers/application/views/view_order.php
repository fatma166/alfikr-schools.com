<script>
		function printDiv(divName){
			var order_number = document.getElementById('order_number').innerHTML;
			var tarih = document.getElementById('tarih').innerHTML;
			var first_name = document.getElementById('first_name').innerHTML;
			var last_name = document.getElementById('last_name').innerHTML;
			var address = document.getElementById('address').innerHTML;
			var phone = document.getElementById('phone').innerHTML;
			var total = document.getElementById('total').innerHTML;
			var order_details = document.getElementById('order_details').innerHTML;
			var originalContents = document.body.innerHTML;
			var html = '<div style="font-size: 16px;">';
			html = html + '<h1 align="center">Libancell.net</h1><hr />';
			html = html + '<table width="1000"><tr><td width="200">رقم الطلب</td><td>'+order_number+'</td>';
			html = html + '</tr><td style="font-size: 16px;">التاريخ والوقت</td><td style="font-size: 16px;">'+tarih+'</td>';
			html = html + '</tr><td style="font-size: 16px;">الاسم الأول</td><td style="font-size: 16px;">'+first_name+'</td>';
			html = html + '</tr><td style="font-size: 16px;">اسم العائلة</td><td>'+last_name+'</td>';
			html = html + '</tr><td style="font-size: 16px;">العنوان</td><td>'+address+'</td>';
			html = html + '</tr><td>الهاتف</td><td>'+phone+'</td>';
			html = html + '</tr></table>';
			html = html + '<h3>تفاصيل الفاتورة</h3>';
			html = html + order_details;
			html = html + '<table width="1000"><tr><Td width="500"></td><td align="left" width="300"><h4>المبلغ الإجمالي</h4></td><td align="left">' + total + '<?php echo $words["euro"]; ?> </td></tr></table>';
			document.body.innerHTML = html;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>

<?php $this->load->view('template/body'); ?>
<input class="btn btn-success" type="button" value="طباعة الفاتورة" onclick="printDiv('main_info'); " />
<h2>تفاصيل الفاتورة</h2>   
<table class='table' id="main_info">
		<tr>
			<td>رقم الطلب</td>
			<td id="order_number"><?php echo $order->id; ?></td>
		</tr>
		<tr>
			<td>التاريخ</td>
			<td id='tarih'><?php echo $order->date; ?></td>
		</tr>
		<tr>
			<td>الاسم الأول</td>
			<td  id='first_name'><?php echo $order->firstname; ?></td>
		</tr>
		<tr>
			<td>اسم العائلة</td>
			<td id="last_name"><?php echo $order->lastname; ?></td>
		</tr>
		<tr>
			<td>العنوان</td>
			<td id="address"><?php echo $order->address; ?></td>
		</tr>
		<tr>
			<td>رقم الهاتف</td>
			<td id="phone"><?php echo $order->mobile; ?></td>
		</tr>
		<tr>
			<td>البريد الالكتروني</td>
			<td><?php echo $order->id; ?></td>
		</tr>
		
		<tr>
			<td>الرمز البريدي</td>
			<td><?php echo $order->post_code; ?></td>
		</tr>
		<tr>
			<td>المبلغ الإجمالي</td>
			<td id="total"><?php echo $order->total; ?></td>
		</tr>
		
		
			
		
</table>
<h2>محتويات الفاتورة</h2>
<div id="order_details">
<Table class='table'>
<?php 
	foreach($order_details as $o){
?>
	<tr>
		<td><?php echo $o->id; ?></td>
		<td><?php echo $o->name; ?></td>
		<td><img src="<?php echo base_url(); ?>uploads/<?php echo $o->image; ?>" width="100" /></td>
		<td><?php echo $o->price; ?> <?php echo $words["euro"]; ?></td>
	</tr>
	

	<?php  } ?>

          
 </table>
 </div>
 <?php $this->load->view('template/footer'); ?>