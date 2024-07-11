
<?php $this->load->view('template/body'); ?>
<style>
	.order_s_0{
		background: lightcoral;
		color: #000;
		
	}
	.order_s_1{
		background: navajowhite;
		color: #000;
		
	}
	.order_s_2{
		background: powderblue;
		color: #000;
		
	}
	.order_s_3{
		background: darkseagreen;
		color: #000;
		
	}
	.order_s_4{
		background: lightblue;
		color: #000;
		
	}
	.order_s_2{
		background: powderblue;
		color: #000;
		
	}
	.order_s_2{
		background: powderblue;
		color: #000;
		
	}
</style>

<form method="post" action="<?php echo base_url(); ?>users/edit_done">
<table class='table'>
			<tr>
				<td width="40">الاسم الأول</td>
				<td><input type="text" class="form-control" style="width: 300px" name="firstname" value="<?php echo $user->firstname ?>" /></td>
			</tr>
			<tr>
				<td>الكنية</td>
				<td><input type="text" class="form-control" style="width: 300px" name="lastname" value="<?php echo $user->lastname ?>" /></td>
			</tr>
			<tr>
				<td>البريد الالكتروني</td>
				<td><input type="text" class="form-control" style="width: 300px" name="email" value="<?php echo $user->email ?>" /></td>
			</tr>
			<tr>
				<td>كلمة السر</td>
				<td><input type="password" class="form-control" style="width: 300px" name="password" value="<?php echo $user->password ?>" /></td>
			</tr>
			<tr>
				<td><input type="submit" class="btn btn-success" value="تعديل" /></td>
			</tr>
	<input type="hidden" name="user_id" value="<?php echo $user->id; ?>" />
	
	
</table>
</form>
        

          
 
 
 <?php $this->load->view('template/footer'); ?>