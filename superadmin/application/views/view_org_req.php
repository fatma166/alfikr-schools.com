<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>


<table class="table">
	<tr>
		<td colspan="2">
			<a href="<?php echo base_url(); ?>master/org_requests" class="btn btn-warning">رجوع</a>
		</td>
		
	</tr>
	<tr>
		<td>الرقم</td>
		<td><?php echo $request->id; ?></td>
	</tr>
	<tr>
		<td>الاسم</td>
		<td><?php echo $request->name; ?></td>
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
		<td>العنوان</td>
		<td><?php echo $request->address; ?></td>
	</tr>
	<tr>
		<td>الموقع الالكتروني</td>
		<td><?php echo $request->website; ?></td>
	</tr>
	<tr>
		<td>فيسبوك</td>
		<td><?php echo $request->facebook; ?></td>
	</tr>
	
	
	
</table>










 
 <?php $this->load->view('template/footer'); ?>