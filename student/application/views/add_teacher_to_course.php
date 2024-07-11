<?php $this->load->view('template/body'); ?>

<script>
function fetch_students(name){
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_teachers",
                data: {'name': name}

            }).done(function (msg) {
                    document.getElementById('teacher_id').innerHTML = msg;
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


<form method="post" action="<?php echo base_url(); ?>master/add_teacher_to_course_done">
	<h4>إضافة مدرس إلى <?php echo $course->name; ?></h4>
	<table class="table">
		<tr>
			<td width="200">اسم الاستاذ</td>
			<td><input type="text" class="form-control" name="student_name" onkeyup="fetch_students(this.value)" /><br />
				<select id="teacher_id" name="teacher_id" class="form-control">
				
				</select>
			</td>
		</tr>
		
		
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>
	<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />

	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	


 
 <?php $this->load->view('template/footer'); ?>