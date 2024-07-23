



<div class="modal center-modal fade" id="modal-subject" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة موضوع جديد</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 <form method="post" action="<?php echo base_url(); ?>master/add_subject" enctype="multipart/form-data">
				<table class="table">
			<tr>
				<td>اسم الموضوع</td>
				<td><input type="text" name="name" class="form-control" placeholder="اسم الموضوع" /></td>
			</tr>
			
			<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
				
			
			</table>
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>

<h3>جميع المواضيع

<button style="float: left;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-subject">
							إضافة موضوع جديد
						  </button>

</h3>
<table class="table table-bordered table-striped" id="datatable5" width="100%">
<thead>
	<tr>
		<td>الترتيب</td>
		<td>الموضوع</td>
		<td>حذف</td>
	</tr>
</thead>
<tbody>
	<?php foreach($subjects as $s){ ?>
	
	<tr>
		<td><input type="text" style="width: 100px;" value="<?php echo $s->ordering; ?>" onblur="change_ordering('subjects', <?php echo $s->id; ?>, this.value)" /></td>
		<td>
			<form method="post" action="<?php echo base_url(); ?>master/edit_subject">
				<input type="text" name="name" value="<?php echo $s->name; ?>" />
				<input type="hidden" name="id" value="<?php echo $s->id; ?>" />
				<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
				<input type="submit" value="تعديل" class="btn btn-success" />
			</form>
		</td>
		<td><a href='<?php echo base_url(); ?>master/delete/subjects/<?php echo $s->id; ?>' onclick="return confirm('هل تريد حذف هذا العنصر');">حذف</a></td>
	</tr>
	<?php } ?>
</tbody>
</table>


<script>
$( document ).ready(function() {
    $('#datatable5').DataTable();
});


</script>