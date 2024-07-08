<?php $this->load->view('template/body'); ?>



<form method="post" action="<?php echo base_url(); ?>users/edit_employee_done">
<table class='table table-striped'>
			<tr>
				<td>اسم المستخدم</td>
				<td><input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" /></td>				
			</tr>
			<tr>
				<td>كلمة المرور</td>
				<td><input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>" /></td>
			</tr>
	
</table>
<hr />
<h3>الصلاحيات</h3>
<input type="checkbox" name="item[]" class="checkAll"><span style="color: red"> تحديد الكل </span><Br /><Br />
<table class='table table-striped'>
<?php //var_dump($user_per); ?>
<?php 
	$per_array[] = array();
	foreach($user_per as  $p){
			array_push($per_array, $p->menu_type);
	}
?>
<?php 
	foreach($right_menu as $m){
?>
<tr>
	<td><?php echo $m->title; ?></td>
	<td><input type="checkbox" value="<?php echo $m->id.'_0'; ?>" <?php if(array_search($m->id.'_0', $per_array)){ ?>checked<?php } ?> class="checkbox" style="display: inline-block;" name="item[]" /> عرض</td>
	<td><input type="checkbox" value="<?php echo $m->id.'_1'; ?>"  <?php if(array_search($m->id.'_1', $per_array)){ ?>checked<?php } ?> class="checkbox" style="display: inline-block;" name="item[]" /> إدخال</td>
	<td><input type="checkbox" value="<?php echo $m->id.'_2'; ?>"  <?php if(array_search($m->id.'_2', $per_array)){ ?>checked<?php } ?> class="checkbox" style="display: inline-block;" name="item[]" /> تعديل</td>
	<td><input type="checkbox" value="<?php echo $m->id.'_3'; ?>"  <?php if(array_search($m->id.'_3', $per_array)){ ?>checked<?php } ?>  class="checkbox" style="display: inline-block;" name="item[]" /> حذف</td>
</tr>       
<?php 
	}
?>
</table>
<input type="submit" value="تعديل" class="btn btn-success" /> 
   
<script>
$(".checkAll").on('change',function(){
  $(".checkbox").prop('checked',$(this).is(":checked"));
});
</script>       

 
 <input type="hidden" name="user_id" value="<?php echo $user->id; ?>" />
<form>
 <?php $this->load->view('template/footer'); ?>