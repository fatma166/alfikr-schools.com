<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>


<table class="table">
	<tr>
		<td colspan="2">
			<a href="<?php echo base_url(); ?>home/contact_us" class="btn btn-success">رجوع</a>
		</td>
		
	</tr>
	<tr>
		<td>الرقم</td>
		<td><?php echo $msg->id; ?></td>
	</tr>
	<tr>
		<td>الاسم</td>
		<td><?php echo $msg->name; ?></td>
	</tr>
	<tr>
		<td>عنوان الرسالة</td>
		<td><?php echo $msg->subject; ?></td>
	</tr>
	<tr>
		<td>البريد الالكتروني</td>
		<td><?php echo $msg->email; ?></td>
	</tr>
	<tr>
		<td>الرسالة</td>
		<td><?php echo $msg->message; ?></td>
	</tr>
	<tr>
		<td>التاريخ</td>
		<td><?php echo $msg->date; ?></td>
	</tr>
	
	
</table>










 
 <?php $this->load->view('template/footer'); ?>