<?php $this->load->view('template/body'); ?>



<form method="post" action="<?php echo base_url(); ?>master/edit_course_done">

	<table class="table">
		<tr>
			<td width="200">اسم الدورة</td>
			<td><input type="text" class="form-control" name="name" value="<?php echo $course->name; ?>" /></td>
		</tr>
		<tr>
			<td>التكلفة</td>
			<td><input type="text" class="form-control" name="cost" value="<?php echo $course->cost; ?>" /> ليرة تركية</td>
		</tr>
		<Tr>
		    <Td>نوع الكورس</Td>
		    <td>
		        <select name="course_type">
		            <?php foreach($courses_types as $c){ ?>
		                <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
		            <?php } ?>
		        </select>
		    </td>
		</Tr>
		<tr>
		<td>تاريخ البداية</td>
			<td><input type="text" name="start_date" value="<?php echo $course->start_date; ?>"  id="sandbox-container1" autocomplete="off" /></td>
		</tr>
		
		<tr>
			<td>تاريخ النهاية</td>
			<td><input type="text" value="<?php echo $course->end_date; ?>" name="end_date" id="sandbox-container2"  autocomplete="off" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="تعديل" /></td>
		</tr>"
		<input type="hidden" name="id" value="<?php echo $course->id; ?>" />
	
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
	});
</script>	



 
 <?php $this->load->view('template/footer'); ?>