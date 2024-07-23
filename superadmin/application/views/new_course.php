<?php $this->load->view('template/body'); ?>


<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">

					  <div style="float: right"><h3>القسم العلمي / الشعب الدراسية / إضافة شعبة جديدة</h3></div>
					  <div style="float: left"><a href='<?php echo base_url(); ?>master/courses' class='btn btn-danger' style="display: inline-block;">
			
								إلغاء الإضافة
							</a></div>
					  </div>
  </div>
  
      </div>
  
</div>

<script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>
<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
<form method="post" action="<?php echo base_url(); ?>master/new_course_done"   enctype="multipart/form-data">

	<table class="table table-striped table-bordered">
		<tr>
			<td width="200">اسم الشعبة</td>
			<td><input type="text" class="form-control" name="name" required /></td>
			<td>التكلفة</td>
			<td><input type="number" class="form-control" name="cost" required /> </td>
		</tr>
		<Tr>
		    <Td>المرحلة الدراسية</Td>
		    <td>
		        <select name="course_type" class="form-control" required>
		            <?php foreach($courses_types as $c){ ?>
		                <option value="<?php echo $c->id; ?>">
		                       <?php 
		                            echo $c->ar_name; 
		                        ?>
		                 </option>
		            <?php } ?>
		        </select>
		    </td>
			<td>الرابط</td>	
			<td><input type="text" name="slug" autocomplete="off" class="form-control" required /></td>
		</Tr>
	
		<tr>
			<td>تفاصيل قصيرة</td>
			<td colspan="3"><textarea id="summernote" name='short_details' ></textarea></td>
		</tr>
		<tr>
			<td>التفاصيل كاملة</td>
			<td colspan="3"><textarea id="summernote2" name='details'></textarea></td>
		</tr>
		<tr>
			<td>الصورة</td>
			<td>
			<input type="file" name="img" required /></td>
		</tr>
		<tr>
	   <td>الكلمات المفتاحية</td>
	   <td>
	       <div class="control-group">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="tags_1" name="keywords" type="text" class="tags form-control" value="" style="direction: rtl;" />
                          <div id="suggestions-container" style="position: relative; float: right; width: 250px; margin: 10px;"></div>
                        </div>
            </div>
	   </td>
	   <td>وصف الميتا </td>
	    <td><textarea style="width: 100%; height: 100px" name="meta_desc"></textarea></td>
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
