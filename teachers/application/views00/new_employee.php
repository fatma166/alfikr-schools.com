<?php $this->load->view('template/body'); ?>



<form method="post" action="<?php echo base_url(); ?>users/new_employee_done">
<table class='table table-striped'>
			<tr>
				<td>اسم المستخدم</td>
				<td><input type="text" name="username" class="form-control" /></td>				
			</tr>
			<tr>
				<td>كلمة المرور</td>
				<td><input type="text" name="password" class="form-control" /></td>
			</tr>
	
</table>
<hr />
<h3>الصلاحيات</h3>
<input type="checkbox" name="item[]" class="checkAll"><span style="color: red"> تحديد الكل </span><Br /><Br />
<table class='table table-striped'>
<?php 
	foreach($right_menu as $m){
?>
<tr>
	<td><?php echo $m->title; ?></td>
	<td><input type="checkbox" value="<?php echo $m->id.'_0'; ?>" class="checkbox" style="display: inline-block;" name="item[]" /> عرض</td>
	<td><input type="checkbox" value="<?php echo $m->id.'_1'; ?>" class="checkbox" style="display: inline-block;" name="item[]" /> إدخال</td>
	<td><input type="checkbox" value="<?php echo $m->id.'_2'; ?>" class="checkbox" style="display: inline-block;" name="item[]" /> تعديل</td>
	<td><input type="checkbox" value="<?php echo $m->id.'_3'; ?>" class="checkbox" style="display: inline-block;" name="item[]" /> حذف</td>
</tr>       
<?php 
	}
?>
</table>
<input type="submit" value="إدخال" class="btn btn-success" /> 
   
<script>
$(".checkAll").on('change',function(){
  $(".checkbox").prop('checked',$(this).is(":checked"));
});
</script>       

 
 <?php $this->load->view('template/footer'); ?>