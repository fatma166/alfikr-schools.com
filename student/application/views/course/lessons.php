<fieldset><legend>درس جديد</legend>
	<form method="post" action="<?php echo base_url(); ?>master/add_lesson"  enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td>عنوان الدرس</td>
				<td><input type="text" name="name" /></td>
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
			<tr>
				<td colspan="2"><input type="submit" value="إضافة" class="btn btn-success" /></td>
			</tr>
		</table>
			<input type="hidden" name="course_id" value="<?php echo $course_id; ?>" />
	
	</form>
</fieldset>


<br /><br />
<h3>جميع الدروس</h3>


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


<table class="table">
	<tr>
		<td>الترتيب</td>
		<td>عنوان الدرس</td>
		<td>الموضوع</td>
		<td>معاينة مجانية</td>
		<td>الملفات</td>
		<td>حذف</td>
	</tr>
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
</table>
