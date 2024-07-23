
<?php $this->load->view('template/body'); ?>




<form method='post' action='<?php echo base_url(); ?>settings/edit_story_done' id='form'  enctype="multipart/form-data">           
<table class='table'>
			<tr>
				<td colspan="2"><h3>تعديل <?php echo $story->name; ?></h3></td>
			</tr>
			<tr>
				<td>الاسم</td>
				<td><input type="text" name="name" value="<?php echo $story->name; ?>" /></td>
			</tr>
			<tr>
				<td>الاختصاص</td>
				<td><input type="text" name="spec"  value="<?php echo $story->spec; ?>" /></td>
			</tr>
			<tr>
				<td>الصورة</td>
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $story->image; ?>" width="150" />
						<input type="file" name="image" /></td>
			</tr>
			<tr>
				<td>المحتوى</td>
				<td><textarea style="width: 600px; resize: none; " rows="5" name="content"><?php echo $story->content; ?></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="تعديل" class="btn btn-success" /></td>
			</tr>
		
</table>
           
<input type="hidden" name="id" value="<?php echo $story->id; ?>" />
</form>
          
 
 
 <?php $this->load->view('template/footer'); ?>