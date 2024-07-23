<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
  


  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>

<form method='post' action='<?php echo base_url(); ?>master/add_file_done' id='form'  enctype="multipart/form-data">
<table class='table'>
	<tr>
		<td>اسم الملف</td>
		<td><input type='text' name='name' autocomplete="off" class="form-control" /></td>
	</tr>
	
	<tr>
		<td>الملف</td>
		<td><input type='file' name='img' /></td>
	</tr>

	<tr>
		<td colspan='2'>
			<input type='submit' value='<?php echo $words['add']; ?>' class='btn btn-success' />
		</td>
	</tr>
</table>
<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
<input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>" />
</form>




  <script>
    $(document).ready(function() {
        $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
    });
  </script>





 <?php $this->load->view('template/footer'); ?>