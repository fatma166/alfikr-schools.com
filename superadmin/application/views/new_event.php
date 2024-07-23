
<?php $this->load->view('template/body'); ?>




<form method='post' action='<?php echo base_url(); ?>master/new_event_done' id='form'  enctype="multipart/form-data">           
<table class='table'>
			<tr>
				<td colspan="2"><h3>فعالية جديدة</h3></td>
			</tr>
			<tr>
				<td>الاسم</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>الوقت</td>
				<td><input type="text" name="time" /></td>
			</tr>
			<tr>
				<td>اليوم</td>
				<td><input type="text" name="day" /></td>
			</tr>
			<tr>
				<td>الشهر</td>
				<td><input type="text" name="month" /></td>
			</tr>
			
			<tr>
				<td>الصورة</td>
				<td><input type="file" name="image" /></td>
			</tr>
			<tr>
				<td>العنوان</td>
				<td><textarea style="width: 600px; resize: none; " rows="5" name="address"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="إضافة" class="btn btn-success" /></td>
			</tr>
		
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>