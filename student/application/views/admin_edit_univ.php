<?php $this->load->view('template/body'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">

		   





<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
     <h3>جامعة جديدة</h3>

<form method="post" action="<?php echo base_url(); ?>universities/edit_univ_done" enctype="multipart/form-data">

	<table width="100%" class='table'>

		<tr>

			<td>اسم الجامعة</td>

			<td><input type="text" name="name" value="<?php echo $u->name; ?>" style='background: #fff; width: 400px;' /></td>

		</tr>

		<tr>

			<td>تاريخ التأسيس</td>

			<td><input type="text" name="start_date" value="<?php echo $u->start_date; ?>" style='background: #fff;' /></td>

		</tr>

		<tr>

			<td>عدد الطلاب</td>

			<td><input type="text" name="nof_students" value="<?php echo $u->nof_students; ?>"  style='background: #fff;' /></td>

		</tr>

		<tr>

			<td>حول الجامعة</td>

			<td><textarea name="story" rows='10' style='background: #fff; width: 100%' /><?php echo $u->story; ?></textarea></td>

		</tr>

		

		<tr>

			<td colspan='2'><input type='submit'  class='btn btn-success' 	value='تعــديل' /></td>

		</tr>

	</table>     
	<input type='hidden' name='id' value='<?php echo $u->id; ?>' />
          
</form>
           

           

          
 
 
 <?php $this->load->view('template/footer'); ?>