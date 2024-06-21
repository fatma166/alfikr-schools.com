<table id="examsTable" class="table table-striped" style="width: 100%">
	<thead>
	<tr class="Dark">
		<th>تحديد</th>
		<th>الرقم</th>
		<th>عنوان الأختبار</th>
		<th>المرحلة الدراسية</th>
		<th>الصف الدراسي</th>
		<th>المادة</th>
		<th>الشعبة</th>
		<th>المحتويات</th>
		<th>علامات الطالب</th>
		<th>المدة</th>
		<th>النوع</th>
		<th>تاريخ البداية</th>
		<th>تاريخ النهاية</th>
		<th>تعطيل / تفعيل</th>
		<th>معاينة</th>
		<th>إجراء</th>
	</tr>
	</thead>
	<tbody>


	<?php if(!empty($query)&&(count($query)>0)){ foreach($query as $index=>$exam_arr){  ?>
	<tr>
		<td> <input type="checkbox" id="chexk<?php echo $index;?>"> </td>
		<td><?php echo $exam_arr['id']?></td>
		<td><?php echo $exam_arr['title']?> </td>
		<td><?php echo $exam_arr['parent_course_type_ar_name']?></td>
		<td> <?php echo $exam_arr['ar_name']?></td>
		<td>مادة 1</td>
		<td> <?php echo$exam_arr['name'] ?></td>
		<td> <a href="" style="color:#000"> <?php echo $exam_arr['details']?> </a> </td>
		<td> <a href="" style="color:#000"> علامات الطالب </a> </td>
		<td> <?php echo $exam_arr['minutes']?> </td>
		<td><?php  echo $exam_arr['type']?></td>
		<td><?php echo $exam_arr['start_date']?></td>
		<td><?php  echo $exam_arr['end_date']?></td>
		<td> <div class="form-check form-switch">
				<input class="form-check-input"  name="status" type="checkbox" role="switch"  id_attr="<?php echo $exam_arr['id'] ?>"  id="flexSwitchCheckDefault">
			</div> </td>
		<td> <a href="<?php echo base_url(); ?>exam/get_detail/<?php echo $exam_arr['id'] ?>"> <img src="../../assets/images/eye.svg" alt="eye"> </a> </td>
		<td> <a href="<?php echo base_url(); ?>exam/delete/<?php echo $exam_arr['id'] ?>"><img src="../../assets/images/trash.svg" alt="trash"></a> </td>
	</tr>
	<?php }} else{?>
	<tr>
		<td colspan="20" class="text-center">
			<?php echo $this->lang->line('no data available')?>
		</td>
	</tr>

	<?php }?>
	</tbody>
</table>
<div class="pagination">
	<?php  echo $paging;  ?>
</div>

