



<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة درس جديد</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 <form method="post" action="<?php echo base_url(); ?>master/add_lesson" enctype="multipart/form-data">
				<table class="table">
			<tr>
				<td>عنوان الدرس</td>
				<td><input type="text" name="name" class="form-control" /></td>
			</tr>
			<tr>
				<td>الموضوع</td>
				<td><select name="subject_id">
					<option value="0">الرجاء اختيار الموضوع</option>
					<?php foreach($subjects as $s){ ?>
						<option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
			    <td>نوع الفيديو</td>
			    <td>
			        <select name="host">
			            <option value="Self">تحميل ملف</option>
			            <option value="Youtube">يوتيوب</option>
			        </select>
			    </td>
			</tr>
			<tr>
				<td>الفيديو</td>
				<td><input type="file" name="video" /></td>
			</tr>
			
		</table>
			<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
				
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>

<br /><br />
<h3 style="padding: 10px;">جميع الدروس

<button style="float: left;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">
							إضافة درس جديد
						  </button>
</h3>


<script>

function free_preview(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/free_preview",
                data: {'id': id, 'value': value}

            }).done(function (msg) {
                   
            });
}


</script>


<table class="table table-bordered table-striped" id="datatable3" width="100%">
<thead>
	<tr>
		<td>الترتيب</td>
		<td>عنوان الدرس</td>
		<td>الموضوع</td>
		<td>معاينة مجانية</td>
		<td>الملفات</td>
		<td>حذف</td>
	</tr>
</thead>
<tbody>
	<?php foreach($lessons as $l){ ?>
	
	<tr>
		<td><input type="text" style="width: 100px;" value="<?php echo $l->ordering; ?>" onblur="change_ordering('lessons', <?php echo $l->lesson_id; ?>, this.value)" /></td>
		<td>
			<?php echo $l->lesson_name; ?>
		</td>
		<td><?php echo $l->subject_name; ?></td>
			<td>
				    
				     <input type="checkbox" <?php if($l->free_preview == 1){ ?>checked<?php } ?> value="<?php echo $l->lesson_id; ?>"  class="js-switch" onchange="free_preview(<?php echo $l->lesson_id; ?>,<?php if($l->free_preview == 1){ ?>0<?php }else{ ?>1<?php } ?>)"  /> 
								
					<?php /*
					<a href='<?php echo base_url(); ?>pages/top_menu/<?php echo $c->id; ?>/1'><img src="<?php echo base_url(); ?>images/icons/featured_off.png" alt="مفضلة" /></a>
				
					<a href='<?php echo base_url(); ?>pages/top_menu/<?php echo $c->id; ?>/0'><img src="<?php echo base_url(); ?>images/icons/featured_on.png" alt="مفضلة" /></a>    */ ?>
				
				</td>
		<td>
		    <?php foreach($l->files as $f){ ?>
		    <p><a href="<?php echo base_url(); ?>uploads/<?php echo $f->src; ?>" target="_blank"><?php echo $f->name; ?></a> 
		    
		    <a href='<?php echo base_url(); ?>master/delete_files/<?php echo $f->id; ?>/<?php echo $course_id; ?>' onclick="return confirm('هل تريد حذف هذا العنصر');">×</a>
		    </p>
		    
		    <?php } ?>
		    <a href="<?php echo base_url(); ?>master/add_file/<?php echo $l->lesson_id; ?>/<?php echo $course_id; ?>" class="btn btn-primary">إضافة ملف جديد</a>
		</td>
		<td><a href='<?php echo base_url(); ?>master/delete/lessons/<?php echo $l->lesson_id; ?>' onclick="return confirm('هل تريد حذف هذا العنصر');">حذف</a></td>
	</tr>
	<?php } ?>
	
</tbody>
</table>


<script>
$( document ).ready(function() {
    $('#datatable3').DataTable();
});


</script>