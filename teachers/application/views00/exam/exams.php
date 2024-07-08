<div
	class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
>
	<div class="title_page">
		<h2>الأختبارات</h2>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
				</li>
				<li class="breadcrumb-item" aria-current="page">
					القسم الإداري
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					الأختبارات
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
				src="../../assets/images/file.svg"
				alt="print"
				width="20"
				height="20"
				loading="lazy"
			/>
			<span> تصدير إلى PDF </span>
		</button>
		<button>
			<img
				src="../../assets/images/download-cloud.svg"
				alt="print"
				width="20"
				height="20"
				loading="lazy"
			/>
			<span> إستيراد </span>
		</button>
		<a  href="<?php echo base_url()?>exam/add" class="add_student">
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
			<span> إضافة اختبار </span>
		</a>
	</div>
</div>
<form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
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

			</select>
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
<span class="table_data">
<?php include ('partails/_table.php')?>
</span>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    // Handle switch change event
    $('.form-check-input').on('change', function() {

        var switchValue = $(this).prop('checked');
        alert(switchValue);
        var id = $(this).attr('id_attr');

        updateSwitchValue(switchValue,id);
    });

    function updateSwitchValue( value ,id) {
        $.ajax({
            url: "<?php echo base_url(); ?>exam/publish",
            type: 'GET',
            data: {
                id: id,
                s: value
            },
            success: function(response) {
                // Handle the response from the server-side script
                console.log('Switch value updated:', response);
                $(".table_data").empty();
                $(".table_data").append(response);
                //	location.reload(true);
                $('.print_button').attr('href', "<?php echo base_url()?>" + "exam/index?stages=" + stages + "&_class=" + _class + "&group_id=" + group_id + "&print=true");
            },
            error: function(xhr, status, error) {
                console.error('Error updating switch value:', error);
            }
        });
    }
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
                url: "<?Php echo base_url(); ?>exam/index",
                data: {'stages': stages, '_class': _class, 'group_id': group_id},
                //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            }).done(function(data) {
                history.pushState('', '',"<?php echo base_url()?>"+"exam/index?stages="+stages+"&_class="+_class+"&group_id="+group_id);

                $(".table_data").empty();
                $(".table_data").append(data);
                $('.print_button').attr('href',"<?php echo base_url()?>"+"exam/index?stages="+stages+"&_class="+_class+"&group_id="+group_id+"&print=true");
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


    function getsubject(class_return,selector_name) {
        //
        class_id=class_return;
        // Clear the options in the second select menu

        $('#'+selector_name).empty();
        $.ajax({
            type: "get",
            url: "<?Php echo base_url(); ?>questionBank/getchild_subject",
            data: {'class_id': class_id},
            dataType: 'json',
            //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data1) {


                // Add the new options based on the selected value
                if (class_id) {

                    $.each(data1, function (index, value) {

                        $('#'+selector_name).append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                } else {
                    $('#'+selector_name).append('<option value="">Select an option</option>');
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
