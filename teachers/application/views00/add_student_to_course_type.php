<?php $this->load->view('template/body'); ?>

<script>
function fetch_students(name){
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_students",
                data: {'name': name}

            }).done(function (msg) {
                    document.getElementById('student_id').innerHTML = msg;
            });
}



function fetch_courses(name){
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_courses",
                data: {'name': name}

            }).done(function (msg) {
                    document.getElementById('course_id').innerHTML = msg;
            });
}

</script>


<form method="post" action="<?php echo base_url(); ?>master/add_student_to_course_type_done">
	<h4>إضافة طالب إلى <?php echo $course_type->ar_name; ?></h4>
	<table class="table">
		<tr>
			<td width="200">اسم الطالب</td>
			<td><input type="text" class="form-control" name="student_name" onkeyup="fetch_students(this.value)" /><br />
				<select id="student_id" name="student_id" class="form-control">
				
				</select>
			</td>
		</tr>
		
		<tr>
			<td>القسط الكامل</td>
			<td><input type="text" class="form-control" name="amount"  /></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>
	<input type="hidden" name="course_type_id" value="<?php echo $course_type_id; ?>" />
	<link rel="stylesheet" href="https://osus.academy/new_admin/css/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script>
	
	$(document).ready(function() {
		$('#sandbox-container').datepicker({
				dateFormat: 'yy-mm-dd'
		});
	
	});
</script>	


 
 <?php $this->load->view('template/footer'); ?>