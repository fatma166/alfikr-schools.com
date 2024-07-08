<?php $this->load->view('template/body'); ?>


<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">

					  <h3>القسم العلمي / التصنيفات</h3>

					  </div>
  </div>
  
      </div>
  
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
  
				 <div class="dashboard-widget-content">
					<h3>إضافة قسم جديد</h3>

<form method="post" action="<?php echo base_url(); ?>master/new_course_type"  enctype="multipart/form-data">
<table class='table table-striped '>
	<tr>
		<td style="width: 200px;">الاسم العربي</td>
		<td><input type="text" name="ar_name" class="form-control" required  ></td>
	</tr>
	<tr>
		<td style="width: 200px;">الاسم الانكليزي</td>
		<td><input type="text" name="en_name" class="form-control" required  ></td>
	</tr>
	<tr>
		<td style="width: 200px;">الاسم التركي</td>
		<td><input type="text" name="tr_name" class="form-control" required  ></td>
	</tr>

	<tr>
		<td>القسم الأب</td>
		<td>
			<select name="parent_id" class="form-control">
				<option value="0">لا يوجد أب</option>
				<?php foreach($courses_types as $c){ ?>
					<option value="<?php echo $c->id; ?>">
					<?php 
                        
                        echo $c->ar_name;
                      ?>    
					    
					    
					</option>
				<?php } ?>
			</select>

		</td>
		<tr>
        <td>الصورة</td>
        <td><input type="file" name="img" required /></td>
    </tr>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة"/></td>
	</tr>
               
</table>
</form>


</div>
  </div>
  
      </div>
  
</div>

<script>
	function view_modal(id){
        //var $data = $('#review_product_id span').text();
        var url = '<?php echo base_url(); ?>master/edit_course_type/'+id;
        $.ajax({
            type: 'GET',
            url: url,
            success: function (output) {
				$('#login_for_review').html(output);//now its working
				$('#login_for_review').modal('show');//now its working
            },
            error: function(output){
				alert("fail");
            }
        });
	}
</script>

<div id="login_for_review" class="modal" style="" role="dialog">
 
</div>
          
<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
<h3>جميع التصنيفات</h3>
<hr />
<table class='table table-striped table-bordered'  id="datatable">
	<thead>
			<tr>
				
				<th style="text-align: right">الرقم</th>
			<th style="text-align: right">الصورة</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">إضافة طالب</th>
				<th style="text-align: right"></th>
		</thead>		
	<tbody>
    <?php foreach($courses_types as $c){ ?>
	<form method="post" action="<?php echo base_url(); ?>master/edit_course_type">
	<tr>
		<td><?php echo $c->id; ?></td>
	  <td><img src="<?php echo base_url(); ?>../<?php echo $c->image; ?>" width="150" /></td>
        <td>
            
              <?php 
                echo $c->ar_name;
              ?>
           
                
            
        </td>
		<td>
		    <a href="<?php echo base_url(); ?>master/add_student_to_course_type/<?php echo $c->id; ?>" class="btn btn-success">إضافة طالب</a>
		</td>
		<td>
			<a href="<?php echo base_url(); ?>master/delete/courses_types/<?php echo $c->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذا العنصر');" class="btn btn-danger"><span class="fa fa-trash"></span></a>
			<a  onclick="view_modal(<?php echo $c->id; ?>)" href="#"  class="btn btn-warning edit_modal" alt="تعديل"><span class="fa fa-edit"></span></a>
		</td>
		
				
    </tr>
	</form>
    <?php } ?>
	</tbody>
</table>


</div>
  </div>
  
      </div>
  
</div>

<?php $this->load->view('template/footer'); ?>
