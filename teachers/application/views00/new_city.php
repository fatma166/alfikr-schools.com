<?php $this->load->view('template/body'); ?>

<form method="post" action="<?php echo base_url(); ?>master/new_city_done">

	<table class="table">
		<tr>
			<td width="200">الاسم العربي</td>
			<td><input type="text" class="form-control" name="ar_name" /></td>
		</tr>
		<tr>
			<td>الاسم التركي</td>
			<td><input type="text" class="form-control" name="tr_name" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>


 
 <?php $this->load->view('template/footer'); ?>