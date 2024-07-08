<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>


<table class="table">
	<tr>
		<td colspan="2">
			<a href="<?php echo base_url(); ?>home/contact_us" class="btn btn-warning">رجوع</a>
		</td>
		
	</tr>
	<tr>
		<td>الرقم</td>
		<td><?php echo $request->id; ?></td>
	</tr>
	<tr>
		<td>الاسم</td>
		<td><?php echo $request->first_name . ' ' .$request->last_name; ?></td>
	</tr>
	<tr>
		<td>البريد الالكتروني</td>
		<td><?php echo $request->email; ?></td>
	</tr>
	<tr>
		<td>رقم الهاتف</td>
		<td><?php echo $request->phone; ?></td>
	</tr>
	<tr>
		<td>الحنس</td>
		<td><?php echo $request->gender; ?></td>
	</tr>
	<tr>
		<td>الحنس</td>
		<td><?php echo $request->gender; ?></td>
	</tr>
	<tr>
		<td>فيسبوك</td>
		<td><?php echo $request->facebook; ?></td>
	</tr>
	<tr>
		<td colspan="2">
		    <a href="<?php echo base_url(); ?>master/approve_teacher_request/<?php echo $request->id; ?>" class="btn btn-success">
		        موافقة وحذف الطلب
		    </a>
		</td>
		
	</tr>
	
	
</table>










 
 <?php $this->load->view('template/footer'); ?>