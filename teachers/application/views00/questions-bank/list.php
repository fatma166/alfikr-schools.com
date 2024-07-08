<div
	class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
	xmlns="http://www.w3.org/1999/html">
	<div class="title_page">
		<h2>بنك الأسئلة</h2>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
				</li>
				<li class="breadcrumb-item" aria-current="page">
					القسم الإداري
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					بنك الأسئلة
				</li>
			</ol>
		</nav>
	</div>
	<div
		class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
	>
		<?php

		if (strpos($_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'], '&') !== false) {
			$url_print=$_SERVER['REQUEST_URI']."&print=true";
			$url_export=$_SERVER['REQUEST_URI']."&export_excel=true";
		}else{
			$url_print= $_SERVER['REQUEST_URI']."?print=true";
			$url_export= $_SERVER['REQUEST_URI']."?export_excel=true";
		}?>
		<a href="<?php echo $url_print?>" target="_blank" class="print_button">
			<img
				src="<?php echo base_url()?>../assets/images/printer.svg"
				alt="print"
				width="20"
				height="20"
				loading="lazy"
			/>
			<span>طباعة</span>
		</a>
		<button>
			<img
				src="<?php echo base_url()?>../assets/images/file.svg"
				alt="print"
				width="20"
				height="20"
				loading="lazy"
			/>
			<span> تصدير إلى PDF </span>
		</button>
		<a href="<?php echo $url_export?>" target="_blank" class="export_button">
			<img
				src="<?php echo base_url()?>../assets/images/download-cloud.svg"
				alt="print"
				width="20"
				height="20"
				loading="lazy"
			/>
			<span> إستيراد </span>
		</a>
	</div>
</div>
<div
	class="d-flex justify-content-between align-items-center flex-row w-100 mb-3"
>
	<h1>بنك الأسئلة</h1>
	<a href="<?php echo base_url()?>questionBank/add" class="add_ques">
		<svg
			width="20"
			height="20"
			viewBox="0 0 24 24"
			color="#fff"
			fill="#fff"
			xmlns="http://www.w3.org/2000/svg"
		>
			<path
				d="M12 5V19M5 12H19"
				color="#fff"
				stroke="white"
				stroke-width="2"
				stroke-linecap="round"
				stroke-linejoin="round"
			/>
		</svg>
		<span> إضافة سؤال </span>
	</a>
</div>

<form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2" >
	<div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
		<div class="d-flex justify-content-start align-items-start flex-column gap-1">
			<label for=""> المراحل الدراسية </label>

			<select
				name="course_types_stages"
				id="stages"
				class="form-select form-control course_types_stages"
				aria-label="Default select example"
				aria-placeholder="Segmentation*"
			>

				<option selected disabled>المراحل الدراسية</option>
				<?php foreach($course_types as $course_type_arr) {?>
					<option value="<?php if(isset($course_type_arr[0]->parent_id)&&$course_type_arr[0]->parent_id==0) echo $course_type_arr[0]->id;?>"> <?php if(isset($course_type_arr[0]->ar_name)&&$course_type_arr[0]->parent_id==0)  echo $course_type_arr[0]->ar_name;?></option>
				<?php }?>

			</select>
		</div>
		<div class="d-flex justify-content-start align-items-start flex-column gap-1">
			<label for=""> الصف الدراسي </label>
			<select
				name="course_types_class"
				id="_class"
				class="form-select form-control course_types_class"
			>
				<option selected disabled>الصف الدراسي</option>
				<!--	<option value="test">صف 1</option>
					<option value="">صف 2</option>
					<option value="">صف 3</option>
					<option value="">صف 4</option>
	-->			</select>
		</div>
		<div class="d-flex justify-content-start align-items-start flex-column gap-1">
			<label for=""> الشعب </label>
			<select
				name="question_group_id"
				id="question_group_id"
				class="form-select form-control question_group_id"
			>
				<option selected disabled>الشعب</option>


			</select>
		</div>
	</div>
	<div class="filter_btn">
		<button id="search_form"> فلتر </button>
	</div>
</form>
<?php


?>
<div class="table_data d-flex justify-content-start align-items-start flex-column  w-100   border-fifth-color mb-3">
	<?php include ('partails/_table.php')?>
</div>







<div>
	<!-- Modal delete question -->
	<div class="modal fade DeleteQuestion" id="DeleteQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered ">
			<div class="modal-content p-3">
				<div class="modal-body">
					<h6> هل تريد أن تحذف هذا السؤال ؟ </h6>
				</div>
				<div class="modal-footer d-flex justify-content-center align-items-center flex-row gap-3 ">
					<button type="button" class="btn close__" data-bs-dismiss="modal"> إغلاق </button>
					<button type="button" class="btn save__">حذف </button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal edit question -->
	<div class="modal fade EditQuestion" id="EditQuestion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered ">
			<div class="modal-content py-3">
				<div class="modal-body">
					<h6> تعديل السؤال</h6>
					<form action="">
						<div class="d-flex justify-content-start flex-column align-items-start gap-2 mb-3">
							<span> السؤال </span>
							<input type="text" class="form-control" placeholder="السؤال" value=" ماهي عاصمة مصر ؟ "  aria-label="text" required>
						</div>
						<div class="d-flex justify-content-start flex-column align-items-start gap-3">
							<span> الأجابات </span>
							<div class="w-100">
								<label class="d-flex justify-content-start align-items-center flex-row gap-3 w-100">
									<input type="radio" name="correct_answer" value="answer1">
									<input type="text" class="form-control w-100" placeholder="اجابة 1" aria-label="text" value="القاهرة" required>
								</label>
							</div>
							<div class="w-100">
								<label class="d-flex justify-content-start align-items-center flex-row gap-3 w-100">
									<input type="radio" name="correct_answer" value="answer2">
									<input type="text" class="form-control" placeholder="اجابة 2" aria-label="text" value="المحلة" required>
								</label>
							</div>
							<div class="w-100">
								<label class="d-flex justify-content-start align-items-center flex-row gap-3 w-100">
									<input type="radio" name="correct_answer" value="answer3">
									<input type="text" class="form-control" placeholder="اجابة 3" aria-label="text" value="الأسكندرية" required>
								</label>
							</div>
							<div class="w-100">
								<label class="d-flex justify-content-start align-items-center flex-row gap-3 w-100">
									<input type="radio" name="correct_answer" value="answer4">
									<input type="text" class="form-control" placeholder="اجابة 4" aria-label="text" value="سوهاج" required>
								</label>
							</div>
						</div>
						<div class="modal-footer d-flex justify-content-center align-items-center flex-row gap-3 ">
							<button type="button" class="btn close__" data-bs-dismiss="modal"> إغلاق </button>
							<button type="submit" class="btn save__"> حفظ </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    // jQuery document ready
    $(document).ready(function() {

        $('#stages').on('change', function() {
            var stage_id = $(this).val();

            // Clear the options in the second select menu
            $('#_class').empty();
            $.ajax({
                type:"get",
                url: "<?Php echo base_url(); ?>questionBank/getchild_stage",
                data: {'stage_id': stage_id},
                dataType: 'json',
                //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(data1) {


                    // Add the new options based on the selected value
                    if (stage_id) {

                        $.each(data1, function (index, value) {

                            $('#_class').append('<option value="' + value.id + '">' + value.ar_name + '</option>');
                            if(index==0){
                                getgroup(value.id);
                            }

                        });
                    } else {
                        $('#_class').append('<option value="">Select an option</option>');
                    }
                } ,
                error: function() {
                    console.log('Error occurred while fetching options');
                }


            });
        });

        $("#search_form").click(function (e) {
            e.preventDefault();
            var stages = $(".course_types_stages").val();
            var _class = $(".course_types_class").val();
            var group_id = $(".question_group_id").val();
            // alert(group_id);

            $.ajax({
                type:"get",
                url: "<?Php echo base_url(); ?>questionBank/index",
                data: {'stages': stages, '_class': _class, 'group_id': group_id},
                //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            }).done(function(data) {
                history.pushState('', '',"<?php echo base_url()?>"+"questionBank/index?stages="+stages+"&_class="+_class+"&group_id="+group_id);

                $(".table_data").empty();
                $(".table_data").append(data);
                $('.print_button').attr('href',"<?php echo base_url()?>"+"questionBank/index?stages="+stages+"&_class="+_class+"&group_id="+group_id+"&print=true");
            });
        });

        $('#_class').on('change', function () {
            class_id_= $(this).val();
            getgroup(class_id_);
        });
    });


    function getgroup(class_return) {
        //
        class_id=class_return;
        // Clear the options in the second select menu
        $('#question_group_id').empty();

        $.ajax({
            type: "get",
            url: "<?Php echo base_url(); ?>questionBank/getchild_groups",
            data: {'class_id': class_id},
            dataType: 'json',
            //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data1) {


                // Add the new options based on the selected value
                if (class_id) {
                    $('#question_group_id').append('<option value="">الكل</option>');
                    $.each(data1, function (index, value) {

                        $('#question_group_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                } else {
                    $('#question_group_id').append('<option value="">Select an option</option>');
                }
            },
            error: function () {
                console.log('Error occurred while fetching options');
            }


        });
        //
    }

	<?php if(isset($_GET["print"])&&$_GET["print"]){?>

    window.print();
    self.focus();
    window.onafterprint = function(){
        window.close();
    }
</script>
	<style>
		@media print {
			form, input, button, .btn, .hidden-print{
				display: none !important;
			}
		}
	</style>
<?php }?>
</script>
