<?php $this->load->view('template/body'); ?>

 <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>

<form method="post" action="<?php echo base_url(); ?>master/new_master_done">

	<table class="table">
		<tr>
			<td width="200">رابط التسجيل</td>
			<td><input type="text"  class="form-control" style="width: 300px;" name="website" /></td>
		</tr>
		<tr>
			<td>الجامعة</td>
			<td>
				<select name="university_id" class="form-control" style="width: 300px;">
					<?php foreach($universities as $u){ ?>
					<option value="<?php echo $u->id; ?>"><?php echo $u->ar_name; ?></option>
					<?php } ?>
				
				</select>
			</td>
		</tr>
		<tr>
			<td width="200">عدد المقاعد</td>
			<td><input type="text" class="form-control" style="width: 300px;" name="nof_seats" /></td>
		</tr>
		<tr>
		<td>تاريخ البداية</td>
			<td><input type="text" name="start_date" class="form-control" style="width: 300px;"  id="sandbox-container1" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>تاريخ النهاية</td>
			<td><input type="text" name="end_date" class="form-control" style="width: 300px;" id="sandbox-container2"  autocomplete="off" /></td>
		</tr>
		<tr>
			<td>تاريخ النتائج</td>
			<td><input type="text" name="results_date" class="form-control" style="width: 300px;" id="sandbox-container3"  autocomplete="off" /></td>
		</tr>
		
		<tr>
		<Td>التفاصيل</td>
		<td>
			<textarea id="summernote" name='ar_details'><p></p></textarea>
		
		</td>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	</tr>
	
	</table>
	<link rel="stylesheet" href="https://osus.academy/new_admin/css/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	
	$(document).ready(function() {
	$('#sandbox-container1').datepicker({
			dateFormat: 'yy-mm-dd'
	});
	$('#sandbox-container2').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$('#sandbox-container3').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	});
</script>	

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