<?php $this->load->view('template/body'); ?>
/


<fieldset><legend>
    إضافة استاذ جديد
</legend>
<form method="post" action="<?php echo base_url(); ?>master/add_teacher" enctype="multipart/form-data">
<table class="table">
    <tr>
        <td>الاسم الكامل</td>
        <td><input type="text" name="full_name" /></td>
    </tr>
    <tr>
        <td>الاختصاص</td>
        <td><input type="text" name="details" /></td>
    </tr>
    <tr>
        <td>الصورة</td>
        <td><input type="file" name="img" /></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
    </tr>
</table>
</form>

</fieldset>

<div id="students_table">
<table class='table '>
			<tr >
				
				<th style="text-align: right">الرقم</th>
				
				<th style="text-align: right">الصورة</th>
				<th style="text-align: right">الاسم</th>
			
				<th style="text-align: right">تعديل</th>
				<th style="text-align: right">حذف</th>
				
			</tr>
	<?php
	    $i = 1;
		foreach($teachers as $s){
		
	?>
			<tr  class="student_row">
				
				<td><?php echo $s->id; ?></td>
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $s->image; ?>" width="150" /></td>
				<td><?php echo $s->full_name; ?></td>
			
				
				
				<td><a href="<?php echo base_url(); ?>master/edit_teacher/<?php echo $s->id; ?>" >تعديل</a></td>
				<td><a href="<?php echo base_url(); ?>master/delete/teachers/<?php echo $s->id; ?>">حذف</a></td>
			</tr>
	
	<?php
	        $i++;
		}
	?>
	
	<?php 
		$this->load->helper('url');


		$currentURL = current_url();

		$params   = $_SERVER['QUERY_STRING']; 

		$fullURL = $currentURL . '?' . $params; 

		$this->session->set_userdata('products_url', $fullURL); 
	?>
</table>

</div>
           
<div class="pagination" align="center"><?php //echo $links; ?></div>
          
 
 
 <?php $this->load->view('template/footer'); ?>