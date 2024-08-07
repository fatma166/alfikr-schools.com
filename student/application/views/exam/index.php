<div
	class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
>
	<div class="title_page">
		<h2><?php if($data_search['page_type']=="exam"){ echo "الامتحانات"; }elseif ($data_search['page_type']=="exercise"){echo "التمارين";}else{echo "الواجبات";}?></h2>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
				</li>
				<li class="breadcrumb-item" aria-current="page">
					القسم العلمي
				</li>
				<li class="breadcrumb-item active" aria-current="page">
					<?php if($data_search['page_type']=="exam"){ echo "الامتحانات"; }elseif ($data_search['page_type']=="exercise"){echo "التمارين";}else{echo "الواجبات";}?>
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

	</div>
</div>
<form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
	<div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
		<div class="d-flex justify-content-start align-items-start flex-column gap-1">
			<label for=""> الماده العلميه  </label>
			<select
				name="main_subject_id"
				id="subject_id"
				class="form-select form-control main_subject_id"
				aria-label="Default select example"
				aria-placeholder="Segmentation*"
			>

				<option selected disabled>الماده العلميه </option>
				<?php foreach($subjects as $subject) {?>
					<option value="<?php if(isset($subject['name'])) echo $subject['id'];?>"> <?php if(isset($subject['name']))  echo $subject['name'];?></option>
				<?php }?>
			</select>

		</div>

	</div>
	<div class="filter_btn">
		<button id="search_form"> فلتر </button>
	</div>
</form>
<div class="table_first" style="width:100%">
	<?php include ('partails/_table.php')?>
</div>
<?php include ('partails/_table_today.php')?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
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
                               // getgroup(value.id);
                              //  getsubject(value.id, 'subject_id')
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
           // var stages = $(".course_types_stages").val();
         //   var _class = $(".course_types_class").val();
         //   var group_id = $(".question_group_id").val();
            var main_subject_id = $(".main_subject_id").val();
           //  alert(main_subject_id);

            $.ajax({
                type:"get",
                url: "<?Php echo base_url(); ?>exam/index",
                data: {'main_subject_id': main_subject_id,"table_position":"table_first"},
                //  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            }).done(function(data) {
                history.pushState('', '',"<?php echo base_url()?>"+"exam/index?type="+"<?php if (isset($data_search['type_id'])) echo '?type='.$data_search['type_id'];?>"+"&main_subject_id="+main_subject_id);

                $(".table_first").empty();
                $(".table_first").append(data);
                $('.print_button').attr('href',"<?php echo base_url()?>"+"exam/index?type"+"<?php if (isset($data_search['type_id'])) echo '?type='.$data_search['type_id'];?>"+"&main_subject_id="+main_subject_id+"&print=true");
            });
        });


        $('#_class').on('change', function () {
            class_id_= $(this).val();
          //  var subject_id = $('select[name="subject_id"]').val();
          //  getsubject(class_id_, 'subject_id')
           // getgroup(class_id_);
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


    $(document).ready(function() {
        // alert("hjhj");
        $(document).on('click', '.table_first .pagination a', function (event) {
            event.preventDefault();
//alert("dsajkdjask");
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            $('.table_first table').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
            var myurl = $(this).attr('href');
//alert(myurl);
            var page = $(this).attr('href').split('page=')[1];
            if (typeof page === 'undefined') {
                page=0;
            }
            var table_position="table_first";
            getData(page,table_position);
        });

        $(document).on('click', '.table_third .pagination a', function (event) {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            $('.table_third table').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
            var myurl = $(this).attr('href');
            //alert(myurl);
            var page = $(this).attr('href').split('page=')[1];
            if (typeof page === 'undefined') {
                page=0;
            }
            // alert("third");
            var table_position="table_third";
            getData(page,table_position)
        });
    });
    $(document).on('click', '.table_second .pagination a', function (event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        $('.table_third table').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
        var myurl = $(this).attr('href');
        // alert(myurl);
        var page = $(this).attr('href').split('page=')[1];
        if (typeof page === 'undefined') {
            page=0;
        }
        // alert("third");
        var table_position="table_second";
        getData(page,table_position)
    });


    function getData(page,table_position){
        /*  $.ajax(
		  {
			  url: '?page=' + page,
			  type: "get",
			  datatype: "html"
		  }).done(function(data){
			  $("#tag_container").empty().html(data);
			  location.hash = page;
		  }).fail(function(jqXHR, ajaxOptions, thrownError){
			//	alert('No response from server');

		  });*/
        /*var user_id=$(".employee_name").val();
		var customer_id=$(".client_name_branch").val();
		var visit_type=$(".visit_types").val();
		var from=$(".from").val();
		var to=$(".to").val();
		  var department=$(".department").val();
		var branch=$(".branch").val();
		*/
        /*  var user_id=$(".employee_name").val();
		  var customer_id=$(".client_name_branch").val();
		  var visit_type=$(".visit_types").val();
		  var from=$(".from").val();
		  var to=$(".to").val();
		  var department=$(".department").val();
		  var branch=$(".branch").val();
		  var status= $("select[name='status']").val();
		  var is_registered=$("select[name='is_registered']").val();
		  var created_by= $("select[name='created_by']").val();
		  data={user_id:user_id,from:from,to:to,visit_type:visit_type,department:department,branch:branch,customer_id:customer_id,status:status,is_registered:is_registered},*/

        data={'table_position':table_position};
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:"get",
            url: '?page='+ page,
            data:data,
            beforeSend: function() { $("."+table_position+" #load").show(); },
        }).done(function(data) {
            url11=window.location.href;
            const params = new URLSearchParams(window.location.search);

            //  outdoor_ids = params.get("outdoor_ids");
            //  console.log(outdoor_ids);
            //  if (typeof outdoor_ids !== 'undefined'){
            history.pushState('', '','<?php echo base_url()?>'+"exam/index?page=" + page);
            // }else{
            //    history.pushState('', '',"{{url('admin/visitReport')}}"+"?user_id="+user_id+"&customer_id="+customer_id+"&visit_type="+visit_type+"&to="+to+"&from="+from+"&department="+department+"&branch="+branch+"&status="+status+"&created_by="+created_by+"&is_registered="+is_registered+"&page="+page);
            // }
            // history.pushState('', '',"{{url('admin/visitReport')}}"+"?user_id="+user_id+"&from="+from+"&to="+to+"&visit_type="+visit_type+"&department="+department+"&branch="+branch+"&customer_id="+customer_id+"&page="+page);
            $("."+table_position+" #load").show();
            $("."+table_position).empty();
            //  alert($("."+table_position));
            $("."+table_position).append(data);
            if(table_position=="table_second"||table_position=="table_third"){
                $("."+table_position).addClass('show active');
            }


            $("."+table_position).find('#table_search').DataTable({"scrollX": true});
            $("."+table_position).find('.dataTables_scrollBody').css({"overflow-x":" scroll","max-width": "110%","display": "block"});
        });
    }



</script>
