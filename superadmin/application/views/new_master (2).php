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


<form method="post" action="<?php echo base_url(); ?>master/new_student_done">


	<table class="table">
		<tr>
			<td width="200">اسم الطالب</td>
			<td><input type="text" class="form-control" name="student_name" onkeyup="fetch_students(this.value)" /><br />
				<select id="student_id" name="student_id" class="form-control">
				
				</select>
			</td>
		</tr>
		<tr>
			<td>الدورة</td>
			<td><input type="text" class="form-control" name="course_name" onkeyup="fetch_courses(this.value)" /><br />
			<select id="course_id" name="course_id" class="form-control">
				
			</select>
			
			</td>
		</tr>
		<tr>
			<td>الموبايل</td>
			<td><input type="text" class="form-control" name="mobile" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>


 
 <?php $this->load->view('template/footer'); ?>