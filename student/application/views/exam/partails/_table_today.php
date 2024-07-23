<?php if (!$this->input->is_ajax_request()){?>
<div class="tabs__form w-100">

	<ul class="nav nav-pills" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button
				class="nav-link active"
				id="pills-todayExams-tab"
				data-bs-toggle="pill"
				data-bs-target="#pills-todayExams"
				type="button"
				role="tab"
				aria-controls="pills-todayExams"
				aria-selected="true"
			>
				<?php if($data_search['page_type']=="exam"){ echo "الامتحانات"; }elseif ($data_search['page_type']=="exercise"){echo "التمارين";}else{echo "الواجبات";}?> اليوم
			</button>
		</li>
		<li class="nav-item" role="presentation">
			<button
				class="nav-link"
				id="pills-allExams-tab"
				data-bs-toggle="pill"
				data-bs-target="#pills-allExams"
				type="button"
				role="tab"
				aria-controls="pills-allExams"
				aria-selected="true"
			>
				كل <?php if($data_search['page_type']=="exam"){ echo "الامتحانات"; }elseif ($data_search['page_type']=="exercise"){echo "التمارين";}else{echo "الواجبات";}?>
			</button>
		</li>
	</ul>

	<div class="tab-content form__details" id="pills-tabContent">
		<?php }?>

					<div
						class="tab-pane fade show active "
						id="pills-todayExams"
						role="tabpanel"
						aria-labelledby="pills-todayExams-tab"
						tabindex="0"
					>
						<?php if(isset($query_student_today)&&( count($query_student_today)>0)){
						//$today = date('Y-m-d');
						?>
						<div class="table_second"/>
					<table id="todayExamsTable" class="table table-striped display " style="width: 100%">
					<thead>
					<tr>
						<th>اسم الأختبار</th>
						<th>تاريخ الأختبار</th>
						<th>المدة</th>
						<th>الدرجة</th>
						<th>الدرجة النهائية</th>
					</tr>
					</thead>
					<tbody>
			<?php foreach ($query_student_today as $result_student) {

					?>


							<tr>
								<td><?php echo $result_student['title']?> </td>
								<td><?php echo $result_student['exam_date']?></td>
								<td><?php echo $result_student['minutes']?></td>
								<td><?php echo $result_student['degree']?></td>
								<td><?php echo $result_student['student_mark']?></td>
							</tr>

				<?php
			}?>
					</tbody>
					</table>
						<div class="pagination table_second">
						</div>
							<?php  echo $today_paging;  ?>
						</div>


<?php }?>
	</div>
		<?php if(isset($query_student)&&( count($query_student)>0)){?>
					<div
						class="tab-pane fade table_third"
						id="pills-allExams"
						role="tabpanel"
						aria-labelledby="pills-allExams-tab"
						tabindex="0"
					>
						<table id="allExamsTable" class="table table-striped display" style="width: 1569.88px; margin-left: 0px; width:100%">
							<thead>
							<tr>
								<th>اسم الأختبار</th>
								<th>تاريخ الأختبار</th>
								<th>المدة</th>
								<th>الدرجة</th>
								<th>الدرجة النهائية</th>
							</tr>
							</thead>
							<tbody>
			<?php foreach ($query_student as $result_student1) {

				//if (date('Y-m-d', strtotime($today)) != $result_student['exam_date']) {
					?>
							<tr>
								<td><?php echo $result_student1['title']?> </td>
								<td><?php echo $result_student1['exam_date']?></td>
								<td><?php echo $result_student1['minutes']?></td>
								<td><?php echo $result_student1['student_mark']?></td>
								<td><?php echo $result_student1['degree']?></td>

							</tr>

				<?php
			}?>
							</tbody>
						</table>
						<div class="pagination">
							<?php  echo $student_paging;  ?>
						</div>
					</div>






		<?php } ?>
		<?php if (!$this->input->is_ajax_request()){?>
</div>
</div>
	<?php }?>

