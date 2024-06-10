<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
  


  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>

<form method='post' action='<?php echo base_url(); ?>pages/new_page_done' id='form'  enctype="multipart/form-data">
<table class='table'>
	<tr>
		<td>الصفحة الأب</td>
		<td>
			<select name="parent_id" class="form-control">
				<option value="0">لا يوجد أب</option>
				<?php foreach($pages as $p){ ?>
					<option value="<?php echo $p->id; ?>"><?php echo $p->ar_name; ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>الاسم بالعربي</td>
		<td><input type='text' name='ar_name' required autocomplete="off" class="form-control" /></td>
	</tr>
	<tr>
		<td>الاسم بالانكليزي</td>
		<td><input type='text' name='en_name' autocomplete="off" class="form-control" /></td>
	</tr>

	
	<tr>
		<td>المحتوى بالعربي</td>
		<td>
			<textarea id="summernote_1" name='ar_content'><p></p></textarea>
		</td>
	</tr>
	<tr>
		<td>المحتوى بالانكليزي</td>
		<td>
			<textarea id="summernote_2" name='en_content'><p></p></textarea>
		</td>
	</tr>

	
	
	<tr>
		<td colspan='2'>
			<input type='submit' value='<?php echo $words['add']; ?>' class='btn btn-success' />
		</td>
	</tr>
</table>

</form>


  <script>
    $(document).ready(function() {
        $('#summernote_1').summernote({
			placeholder: '',
			tabsize: 2,
			height: 200,
			toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            
            
             ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help']],
  ['style', ['style']],
  ['fontname', ['fontname']],

              
          ]
		  });
		$('#summernote_2').summernote({
			placeholder: '',
			tabsize: 2,
			height: 200,
			toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            
            
             ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help']],
  ['style', ['style']],
  ['fontname', ['fontname']],

              
          ]
		  });
		
	
    });
  </script>





 <?php $this->load->view('template/footer'); ?>