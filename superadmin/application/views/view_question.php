<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>


<table class="table">
	<tr>
		<td>اسم السؤال</td>
		<td><?php echo $question->name; ?></td>
	</tr>
	<tr>
		<td>المرحلة الدراسية</td>
		<td><?php echo $question->course_type_name; ?></td>
	</tr>
	<tr>
		<td>المادة</td>
		<td><?php echo $question->subject_name; ?></td>
	</tr>
	<tr>
		<td>الصورة</td>
		<td><img src="<?php echo base_url(); ?>../uploads/questions/<?php echo $question->name; ?>" width="200" /></td>
	</tr>
	<tr>
		<td>نوع السؤال</td>
		<td><?php echo $question->question_type; ?></td>
	</tr>
	<tr>
		<td>الدرجة</td>
		<td><?php echo $question->grade; ?></td>
	</tr>
	<tr>
		<td>الترتيب</td>
		<td><?php echo $question->ordering; ?></td>
	</tr>
</table>










 
 <?php $this->load->view('template/footer'); ?>