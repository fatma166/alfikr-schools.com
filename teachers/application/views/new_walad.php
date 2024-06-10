<?php $this->load->view('template/body'); ?>

<form method="post" action="<?php echo base_url(); ?>master/new_walad_done">

	<table class="table">
		<tr>
			<td width="200">اسم الولد</td>
			<td><input type="text" class="form-control" name="walad_name" /></td>
		</tr>
		<tr>
			<td>ترتيب الولد</td>
			<td><input type="text" class="form-control" name="walad_trteeb" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value=" إضافة ولد" /></td>
		</tr>
	
	</table>


 
 <?php $this->load->view('template/footer'); ?>