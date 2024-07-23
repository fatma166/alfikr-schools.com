

  <script src="<?php echo base_url(); ?>bootstrap.js"></script> 
  <link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>summernote.js"></script>


<form method="post" action="<?php echo base_url(); ?>master/edit_course_done"   enctype="multipart/form-data">

	<table class="table">
		<tr>
			<td width="200">الشعبة</td>
			<td>
			    
			    <input type="text" class="form-control" name="name" value="<?php echo $course->name; ?>" />
			    
			 </td>
		</tr>
		<tr>
			<td>التكلفة</td>
			<td><input type="text" class="form-control" name="cost" value="<?php echo $course->cost; ?>" /> </td>
		</tr>
		<Tr>
		    <Td>المرحلة الدراسية</Td>
		    <td>
		        <select name="course_type">
		            <?php foreach($courses_types as $c){ ?>
		                <option value="<?php echo $c->id; ?>" <?php if($c->id == $course->course_type){ ?>selected<?php } ?>>
		                    <?php 
		                        echo $c->ar_name; 
		                     ?>
		                </option>
		            <?php } ?>
		        </select>
		    </td>
		</Tr>
		<tr>
		<?php /*<td>تاريخ البداية</td>
			<td><input type="text" name="start_date" value="<?php echo $course->start_date; ?>"  id="sandbox-container1" autocomplete="off" /></td>
		</tr>
		
		<tr>
			<td>تاريخ النهاية</td>
			<td><input type="text" value="<?php echo $course->end_date; ?>" name="end_date" id="sandbox-container2"  autocomplete="off" /></td>
		</tr>*/ ?>
		<tr>
			<td>تعريف</td>
			<td><textarea id="summernote" name='short_details'><?php echo $course->short_details; ?></textarea></td>
		</tr>
		<tr>
			<td>التفاصيل كاملة</td>
			<td><textarea id="summernote2" name='details'><?php 
			    echo $course->details;
			    ?></textarea></td>
		</tr>
		<tr>
			<td>الصورة</td>
			<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $course->image; ?>" width="200" /><br />
			<input type="file" name="img" /></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" class="btn btn-success" value="تعديل" /></td>
		</tr>
		<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
	
	</table>
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
  
 </form>





 