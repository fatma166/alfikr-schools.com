<div
	class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
>
	<div class="title_page">
		<h2><?php if($exam_type=="exam"){ echo "الأختبارات"; }elseif ($exam_type=="exercise"){echo "التمارين";}else{echo "الواجبات";}?></h2>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
				</li>
				<li class="breadcrumb-item" aria-current="page">
					القسم الإداري
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<?php if($exam_type=="exam"){ echo "الأختبارات"; }elseif ($exam_type=="exercise"){echo "التمارين";}else{echo "الواجبات";}?>
				</li>
			</ol>
		</nav>
	</div>
</div>
<div class="__details w-100">
	<div class="row">
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p> عنوان<span class="ml-2"></span>  <?php if($exam_type=="exam"){ echo "الاختبار"; }elseif ($exam_type=="exercise"){echo "التمرين";}else{echo "الواجب";}?></p>
				<span><?php echo $data['title'];  ?> </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>المرحلة الدراسية</p>
				<span><?php echo $data['ar_name']?> </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>الصف الدراسي</p>
				<span>  <?php echo $data['parent_course_type_ar_name']?> </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>المادة</p>
				<span><?php echo $data['subject_name']?>  </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>الشعبة</p>
				<span><?php echo $data['name']?>    </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>المحتويات</p>
				<span><?php echo $data['details']?>   </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>علامات الطالب</p>
				<span> <?php  echo $marks['total_marks']?> </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>المدة</p>
				<span> <?php echo $data['minutes']?>   </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>النوع</p>
				<span>  <?php echo $exam_type?>   </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>تاريخ ابداية</p>
				<span> <?php echo $data['start_date']?> </span>
			</div>
		</div>
		<div class="col-md-3">
			<div
				class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5"
			>
				<p>تاريخ النهاية</p>
				<span> <?php echo $data['end_date']?> </span>
			</div>
		</div>
	</div>
</div>
<div class="tabs__form w-100">
	<ul class="nav nav-pills" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button
				class="nav-link active"
				id="pills-attends-tab"
				data-bs-toggle="pill"
				data-bs-target="#pills-attends"
				type="button"
				role="tab"
				aria-controls="pills-attends"
				aria-selected="true"
			>
				الطلاب الذين حضروا
			</button>
		</li>
		<li class="nav-item" role="presentation">
			<button
				class="nav-link"
				id="pills-notAttends-tab"
				data-bs-toggle="pill"
				data-bs-target="#pills-notAttends"
				type="button"
				role="tab"
				aria-controls="pills-notAttends"
				aria-selected="true"
			>
				الطلاب الذين لم يحضروا
			</button>
		</li>
		<li class="nav-item" role="presentation">
			<button
				class="nav-link"
				id="pills-questions-tab"
				data-bs-toggle="pill"
				data-bs-target="#pills-questions"
				type="button"
				role="tab"
				aria-controls="pills-questions"
				aria-selected="true"
			>
				عرض الأسئلة
			</button>
		</li>
	</ul>
	<div class="tab-content form__details" id="pills-tabContent">
		<div
			class="tab-pane fade show active"
			id="pills-attends"
			role="tabpanel"
			aria-labelledby="pills-attends-tab"
			tabindex="0"
		>
			<table id="attendsTable" class="display  table table-striped " style="width: 100%">
				<thead>
				<tr>
					<th>اسم الطالب</th>
					<th>تاريخ <span class="ml-2"></span>  <?php if($exam_type=="exam"){ echo "الاختبار"; }elseif ($exam_type=="exercise"){echo "التمرين";}else{echo "الواجب";}?></th>
					<th>المدة</th>
					<th>الدرجة</th>
					<th>الدرجة النهائية</th>
				</tr>
				</thead>
				<tbody>
				<?php  foreach($student_attends as $index=>$attend){?>
					<tr>
						<td class="sorting_1"> <?php  echo $attend['first_name']."  ".$attend['last_name']?></td>
						<td><?php  echo $attend['date']?></td>
						<td><?php  echo $attend['minutes']?> دقيقة</td>
						<td><?php  echo $attend['mark']?></td>
						<td><?php  echo $attend['degree']?></td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
		<div
			class="tab-pane fade"
			id="pills-notAttends"
			role="tabpanel"
			aria-labelledby="pills-notAttends-tab"
			tabindex="0"
		>
			<table id="notAttendsTable" class="display  table table-striped"  style="width: 100%">
				<thead>
				<tr>
					<th>اسم الطالب</th>
					<th>تاريخ الأختبار</th>
					<th>اسم ولي الأمر</th>
					<th>رسالة إلى ولي الأمر</th>
				</tr>
				</thead>
				<tbody>
				<?php  foreach($student_not_attends as $index=>$notattend){?>
					<tr>
						<td>ا <?php  echo $notattend['first_name']."  ".$notattend['last_name']?></td>
						<td><?php echo $data['start_date']?></td>
						<td><?php  echo $notattend['last_name']?></td>
						<td> <a href="whatsapp://send?phone=+<?php echo $notattend['mobile']?>"> <img src="../../../assets/images/whatsapp.svg"  height="24" width="24"> </a> </td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
		<div
			class="tab-pane fade"
			id="pills-questions"
			role="tabpanel"
			aria-labelledby="pills-questions-tab"
			tabindex="0"
		>

		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#pills-questions-tab").on('click',function () {


            $.ajax({
                type:"post",
                url: "<?Php echo base_url(); ?>exam/get_exam_question",
                data:{"id":"<?php  echo $data['id']; ?>","question_type":"details"},//$("#free_form").serialize(),
                //processData: false, // Prevent jQuery from automatically processing the data
                // contentType: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data1) {

                    $('#pills-questions').empty();
                    $('#pills-questions').append(data1);


                } ,
                error: function(xhr, status, error) {
                    // Handle the error response
                    var errorResponse = JSON.parse(xhr.responseText);
                    showErrors(errorResponse.errors);

                    //  console.log('Error occurred while fetching options');
                    Swal.fire({
                        title: "<?php echo $this->lang->line('Error')?>",
                        text:  "<?php echo $this->lang->line('An error occurred while') .$this->lang->line('free question saved') ?>",
                        icon: 'error',
                        confirmButtonText: "<?php echo $this->lang->line('OK')?>"
                    });
                }


            });
        });
    });
</script>
