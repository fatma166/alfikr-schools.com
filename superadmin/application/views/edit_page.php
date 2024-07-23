<?php $this->load->view('template/body'); ?>

 







  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>

  <form method="post" action="<?php echo base_url(); ?>pages/edit_done">
  <table class="table">
	<tr>
		<td><?php echo $words["arabic_name"]; ?></td>
		<td><input type="text" name="ar_name" value="<?php echo $page->ar_name; ?>" /></td>
	</tr>
	<tr>
		<td>الصفحة الأب</td>
		<td>
			<select name="parent_id" class="form-control">
				<option value="0">لا يوجد أب</option>
				<?php foreach($pages as $p){ ?>
					<option value="<?php echo $p->id; ?>" <?php if($p->id == $page->parent_id){ ?>selected<?php } ?>><?php echo $p->ar_name; ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td><?php echo $words["english_name"]; ?></td>
		<td><input type="text" name="en_name" value="<?php echo $page->en_name; ?>" /></td>
	</tr>

	<tr>
		<td><?php echo $words["ar_content"]; ?></td>
		<td>
			<textarea id="summernote" name='ar_content'><?php echo $page->ar_content; ?></textarea>
		</td>
	</tr>
	<tr>
		<td><?php echo $words["en_content"]; ?></td>
		<td>
			<textarea id="summernote2" name='en_content'><?php echo $page->en_content; ?></textarea>
		</td>
	</tr>

	<tr>
		<td colspan="2"><input type="submit" value="<?php echo $words["edit"]; ?>" class="btn btn-success" />
  </table>
  <input type="hidden" name="id" value="<?php echo $page->id; ?>" />
  </form>
  
  
  
  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
	  $('#summernote2').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
	  $('#summernote3').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
    });
  </script>

   
 <?php $this->load->view('template/footer'); ?>