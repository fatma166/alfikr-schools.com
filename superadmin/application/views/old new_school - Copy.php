<?php $this->load->view('template/body'); ?>



<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">إضافة مدرسة جديدة </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم الإداري</li>
								<li class="breadcrumb-item active" aria-current="page">المدارس / إضافة مدرسة جديدة</li>
							</ol>
						</nav>
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
<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						
						<div class="box-body">
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
			<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة" />
			
			<a href='<?php echo base_url(); ?>master/schools' class='btn btn-danger' style="display: inline-block;">
			
								إلغاء الإضافة
							</a></td>
		</tr>
	
	</table>

	</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>

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
