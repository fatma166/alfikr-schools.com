<?php $this->load->view('template/body'); ?>




    
      <form method="post" action="<?php echo base_url(); ?>master/edit_course_type_done"  enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">تعديل تصنيف </h4>
        </div>
        <div class="modal-body">
          <table class="table">
		  	<tr>
				<td>الاسم العربي</td>
				<td><input type="text" name="ar_name" class="form-control" value=" <?php echo $course_type->ar_name; ?>" /></td>
			</tr>
			<tr>
				<td>الاسم الانكليزي</td>
				<td><input type="text" name="en_name" class="form-control" value=" <?php echo $course_type->en_name; ?>" /></td>
			</tr>
			
			
			<tr>
				<td>التصنيف الأب</td>
				<td>
					<select name="parent_id" class="form-control">
						<option value="0">لا يوجد أب</option>
					<?php 
					foreach($courses_types as $c){
						if($c->id == $course_type->parent_id){
					?>
							<option value='<?php echo $c->id; ?>' selected><?php echo $c->ar_name; ?></option>
					<?php 
						}
						else{
				    ?>
							<option value='<?php echo $c->id; ?>'><?php echo $c->ar_name; ?></option>
					<?php
						}
						
					}	
				    ?>
	                </td>
	            </tr>
	            <tr>
            		<td>الصورة</td>
            		<td>
            			
            			<img src="<?php echo base_url(); ?>../<?php echo $course_type->image; ?>" width="200" />
            			<input type="file" name="img" />
            				
            			
            		
            		</td>
            		
            	</tr>
			</table>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success"  value="حفظ وإغلاق"></button>
        </div>
      </div>
	  <input type="hidden" name="id" value="<?php echo $course_type->id; ?>" />
	  </form>
      

		
		
		 <?php $this->load->view('template/footer'); ?>