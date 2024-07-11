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


<form method="post" action="<?php echo base_url(); ?>master/edit_payment_done">


	<table class="table">
		<tr>
			<td width="200">اسم الطالب</td>
			<td><input type="text" class="form-control" name="student_name" readonly="true" value="<?php echo $payment->first_name . ' ' .$payment->last_name; ?>" /><br />
			
			</td>
		</tr>
		<tr>
			<td>الدورة</td>
			<td><input type="text" class="form-control" name="course_name"  readonly="true" value="<?php echo $payment->course_name; ?>" /><br />
			
			
			</td>
		</tr>
		<tr>
			<td>المبلغ</td>
			<td><input type="text" class="form-control" value="<?php echo $payment->amount; ?>" name="amount" /></td>
		</tr>
		<tr>
			<td>التاريخ</td>
			<td><input type="text" name="date" value="<?php echo $payment->date; ?>" class="form-control" style="width: 300px;" id="sandbox-container"  autocomplete="off" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="تعديل" /></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $payment->id; ?>" />
	
	</table>
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