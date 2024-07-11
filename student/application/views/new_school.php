<?php $this->load->view('template/body'); ?>


<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">

					  <div style="float: right"><h3>القسم الإداري / المدارس / إضافة مدرسة جديدة</h3></div>
					  <div style="float: left"><a href='<?php echo base_url(); ?>master/schools' class='btn btn-danger' style="display: inline-block;">
			
								إلغاء الإضافة
							</a></div>
					  </div>
  </div>
  
      </div>
  
</div>

<?php if($this->input->get('msg') == "email_or_username_exist"){ ?>
<script>
   alert('عذرا .. البريد الالكتروني أو اسم المستخدم موجود مسبقاً') ;
</script>
<?php } ?>
<script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>
<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
<form method="post" action="<?php echo base_url(); ?>master/new_school_done"   enctype="multipart/form-data">

	<table class="table table-striped table-bordered">
		<tr>
			<td width="200">اسم المدرسة</td>
			<td><input type="text" class="form-control" name="name" required /></td>
			<td>البريد الالكتروني</td>
			<td><input type="email" class="form-control" name="email" required /> </td>
		</tr>
		<Tr>
		   <td width="200">اسم المستخدم</td>
			<td><input type="text" class="form-control" name="username" required /></td>
			<td>كلمة السر</td>
			<td><input type="password" class="form-control" name="password" required /> </td>
		</Tr>
		<Tr>
		<td width="200">المدينة</td>
			<td>
			<select name="city_id" style="width: 300px;" onchange="fetch_regions(this.value);">
					<?php foreach($cities as $c){ ?>
					
					<option value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
					<?php } ?>
				
				</select>
			
			</td>
			<td>المنطقة</td>
			<td>
				<select name="region_id" id="regions_area" style="width: 300px;">
				
				
				</select>

			</td>
		
		</tr>
		<Tr>
		<td width="200">نوع المدرسة</td>
			<td>
			<select name="school_type" style="width: 300px;" >
					<option value="KG1">KG1</option>
					<option value="KG2">KG2</option>
					<option value="مرحلة أساس">مرحلة أساس</option>
					<option value="مرحلة ثانوية">مرحلة ثانوية</option>
				
				</select>
			
			</td>
			<td>اسم مدير المدرسة</td>
			<td>
				<input type="text" class="form-control" name="moderator_name" required />
				
			</td>
		
		</tr>
	
		
	
		
		
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" /></td>
		</tr>
	
	</table>

	</div>
  
  </div>

</div>

	<link rel="stylesheet" href="https://osus.academy/new_admin/css/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	
	
	function fetch_regions(city_id){
		   //console.log(categories_array);
           $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>master/fetch_regions",
                data: {'city_id': city_id}

            }).done(function (msg) {
                    document.getElementById("regions_area").innerHTML = msg;
            });
		}
	
	$(document).ready(function() {
	$('#sandbox-container1').datepicker({
			dateFormat: 'yy-mm-dd'
	});
	$('#sandbox-container2').datepicker({
		dateFormat: 'yy-mm-dd'
	});
	});
</script>	

<script>
    $(document).ready(function() {
       $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
	  
	  
	  $('#summernote2').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
      });
    });
  </script>



 
 <?php $this->load->view('template/footer'); ?>
