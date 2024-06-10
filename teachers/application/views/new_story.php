
<?php $this->load->view('template/body'); ?>




<form method='post' action='<?php echo base_url(); ?>settings/new_story_done' id='form'  enctype="multipart/form-data">           
<table class='table'>
			<tr>
				<td colspan="2"><h3>رأي جديد</h3></td>
			</tr>
			<tr>
				<td>الاسم</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>الاختصاص</td>
				<td><input type="text" name="spec" /></td>
			</tr>
			<tr>
				<td>الصورة</td>
				<td><input type="file" name="image" /></td>
			</tr>
			<tr>
				<td>المحتوى</td>
				<td><textarea style="width: 600px; resize: none; " rows="5" name="content"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="إضافة" class="btn btn-success" /></td>
			</tr>
		
</table>
           

          
 
 
 <?php $this->load->view('template/footer'); ?>