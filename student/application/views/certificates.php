<?php $this->load->view('template/body'); ?>


<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">

					  <h3>القسم العلمي / الشهادات</h3>

					  </div>
  </div>
  
      </div>
  
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
  
				 <div class="dashboard-widget-content">
					<h3>إضافة شهادة جديد</h3>

<form method="post" action="<?php echo base_url(); ?>master/new_certificate"  enctype="multipart/form-data">
<table class='table table-striped '>
	<tr>
		<td style="width: 200px;">الطالب</td>
		<td>
		    <select name="student_id" class="form-control">
		        <?php foreach($students as $s){ ?>
		        <option value="<?php echo $s->id; ?>"><?php echo $s->first_name .' ' .$s->last_name; ?></option>
		        
		        <?php } ?>
		        
		    </select>
		    
		    </td>
	</tr>
	<tr>
		<td style="width: 200px;">الدورة</td>
		<td>
		
		<select name="course_id" class="form-control">
		    <?php foreach($courses as $c){ ?>
		    
		    <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
		    
		    <?php } ?>
		</select>
		
		</td>
	</tr>
	<tr>
		<td style="width: 200px;">التاريخ</td>
		<td><input type="text" name="date" class="form-control" required id="sandbox-container"  autocomplete="off"  ></td>
	</tr>


	<tr>
		<td colspan="2"><input type="submit" class="btn btn-success" value="إضافة"/></td>
	</tr>
               
</table>
</form>
<link rel="stylesheet" href="https://osus.academy/admin/css/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script>
	
	$(document).ready(function() {
		$('#sandbox-container').datepicker({
				dateFormat: 'yy-mm-dd'
		});
	
	});
</script>
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
<h3>جميع الشهادات</h3>
<hr />
<table class='table table-striped table-bordered'  id="datatable">
	<thead>
			<tr>
				
				<th style="text-align: right">الرقم</th>
			<th style="text-align: right">اسم الطالب</th>
				<th style="text-align: right">اسم الدورة</th>
				
				<th style="text-align: right">التاريخ</th>
					<th style="text-align: right">رقم الشهادة</th>
				<th style="text-align: right"></th>
		</thead>		
	<tbody>
    <?php foreach($certificates as $c){ ?>
	
	<tr>
		<td><?php echo $c->id; ?></td>
	    <td>
	        <?php echo $c->student_name; ?>
	    </td>
	    <td>
	        <?php echo $c->course_name; ?>
	    </td>
	    <td>
	        <?php echo $c->date; ?>
	    </td>
	    <td>
	        <?php echo $c->cert_number; ?>
	    </td>
		<td>
			<a href="<?php echo base_url(); ?>master/delete/certificates/<?php echo $c->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذا العنصر');" class="btn btn-danger"><span class="fa fa-trash"></span></a>
	</td>
		
				
    </tr>
    <?php 
    }
    ?>
	</tbody>
</table>


</div>
  </div>
  
      </div>
  
</div>

<?php $this->load->view('template/footer'); ?>
