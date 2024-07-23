<table  class="table table-striped" style="width: 100%">
	<thead>
	<tr class="Dark">
		<th>تحديد</th>
		<th>الرقم</th>
		<th>عنوان <?php if($data_search['page_type']=="exam"){ echo "الامتحان"; }elseif ($data_search['page_type']=="exercise"){echo "الترين";}else{echo "الواجب";}?></th>
		<th>المرحلة الدراسية</th>
		<th>الصف الدراسي</th>
		<th>المادة</th>
		<th>الشعبة</th>
		<th>المحتويات</th>
		<th>المدة</th>
		<th>النوع</th>
		<th>تاريخ البداية</th>
		<th>تاريخ النهاية</th>
		<th>تعطيل / تفعيل</th>
		<th>معاينة</th>

	</tr>
	</thead>
	<tbody>
	<span  id="load"></span>

	<?php if(!empty($query)&&(count($query)>0)){ foreach($query as $index=>$exam_arr){  ?>
		<tr>
			<td> <input type="checkbox" id="chexk<?php echo $index;?>"> </td>
			<td><?php echo $exam_arr['id']?></td>
			<td><?php echo $exam_arr['title']?> </td>
			<td><?php echo $exam_arr['parent_course_type_ar_name']?></td>
			<td> <?php echo $exam_arr['ar_name']?></td>
			<td> <?php if($exam_arr['main_subject_id']==0) echo ""; else echo $exam_arr['subject_name'];?></td>
			<td> <?php echo$exam_arr['name'] ?></td>
			<td> <a href="" style="color:#000"> <?php echo $exam_arr['details']?> </a> </td>
			<td> <?php echo $exam_arr['minutes']?> </td>
			<td><?php  echo $exam_type?></td>
			<td><?php echo $exam_arr['start_date']?></td>
			<td><?php  echo $exam_arr['end_date']?></td>

					<?php if($exam_arr['er_student_id']!='' && $exam_arr['er_exam_id']!= ''){?>
						<td> <span class="status_exam"> انتهى </span> </td>

						<?php }else{?>
						<td> <a href="<?php echo base_url(); ?>/exam/exam_start/<?php echo $exam_arr['id']?>" class="status_exam"> دخول إلى <?php if($data_search['page_type']=="exam"){ echo "الامتحان"; }elseif ($data_search['page_type']=="exercise"){echo "التمرين";}else{echo "الواجب";}?> </a> </td>
					<?php }?>

			<td> <a href="<?php echo base_url(); ?>exam/get_detail/<?php echo $exam_arr['id'] ?><?php if (isset($data_search['type_id'])) echo '?type='.$data_search['type_id'];?>"> <img src="../../assets/images/eye.svg" alt="eye"> </a> </td>

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

<div class="pagination ">
	<?php  echo $paging;  ?>
</div>

