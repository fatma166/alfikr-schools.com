<?php $this->load->view('template/head'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>


<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>الملفات المساعدة</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    الملفات المساعدة
                </li>
            </ol>
        </nav>
    </div>
    <div class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap">
        <button>
            <img src="../../assets/images/printer.svg" alt="print" width="20" height="20" loading="lazy" />
            <span>طباعة</span>
        </button>
        <button>
            <img src="../../assets/images/file.svg" alt="print" width="20" height="20" loading="lazy" />
            <span> تصدير إلى PDF </span>
        </button>
        <button>
            <img src="../../assets/images/download-cloud.svg" alt="print" width="20" height="20" loading="lazy" />
            <span> إستيراد </span>
        </button>

        <a style="float: left;" type="button" data-toggle="modal" data-target="#modal-center"
            class="add_student">
            <svg width="20" height="20" viewBox="0 0 24 24" color="#fff" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" color="#fff" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span> ملف جديد </span>
		</a>
    </div>
</div>
<form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
    <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
            <label for=""> جميع الشعب </label>
            <select name="courses" class="form-control" style="width: 300px;  float:left;"
                onchange="location.href='<?php echo base_url(); ?>master/teachers_files/?course_id='+this.value">
                <option value="0">جميع الشعب</option>
                <?php foreach($teacher_courses as $c){ ?>
                <option <?php if($this->input->get('course_id') == $c->id){ ?>selected<?php } ?>
                    value="<?php echo $c->id; ?>"><?php echo $c->course_type_name; ?> /
                    <?php echo $c->name; ?></option>

                <?php } ?>

            </select>
        </div>
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
            <label for=""> جميع المواد </label>
            <select name="subject_id" class="form-control" style="width: 300px; float:left;"
                onchange="location.href='<?php echo base_url(); ?>master/teachers_files/?subject_id='+this.value">
                <option value="0">جميع المواد</option>
                <?php foreach($subjects as $s){ ?>
                <option <?php if($this->input->get('subject_id') == $s->id){ ?>selected<?php } ?>
                    value="<?php echo $s->id; ?>"><?php echo $s->name; ?> </option>

                <?php } ?>

            </select>
        </div>
    </div>
    <div class="filter_btn">
        <button type="submit"> فلتر </button>
    </div>
</form>
<table id="example" class="display" style="width: 100%">
    <thead>
        <tr>
            <td>اسم الملف</td>
            <td>الشعبة</td>
            <td>المادة</td>
            <td>عرض</td>
            <td>حذف</td>
        </tr>
    </thead>
    <tbody>
        <?php
foreach ($files as $f) {
    //var_dump($b);
    ?>
        <tr>
            <td><?php echo $f->name; ?></td>
            <td><?php echo $f->course_name; ?></td>
            <td><?php echo $f->subject; ?></td>
            <td><a href="<?php echo base_url(); ?>../uploads/<?php echo $f->file; ?>" target="_blank">عرض</a></td>
            <td><a href="<?php echo base_url(); ?>master/delete/teachers_files/<?php echo $f->id; ?>">حذف</a>
            </td>
        </tr>
        <?php
}?>
    </tbody>
</table>

</div>
</div>

<div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة ملف مساعد</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form method='post' action='<?php echo base_url(); ?>master/add_file_done' id='form'
                    enctype="multipart/form-data">
                    <table class='table'>
                        <tr>
                            <td colspan="2">
                                ملف جديد
                            </td>
                        </tr>
                        <tr>
                            <td>اسم الملف</td>
                            <td><input type='text' name='name' autocomplete="off" class="form-control" /></td>
                        </tr>

                        <tr>
                            <td>الملف</td>
                            <td><input type='file' name='img' class="form-control" /></td>
                        </tr>

                        <tr>
                            <td>الشعبة</td>
                            <td>
                                <select name="course_id" class="form-control"
                                    onchange="fetch_subjects_by_course_id(this.value)">
                                    <?php foreach($courses as $c){ ?>
                                    <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>

                                    <?php  } ?>

                                </select>

                            </td>
                        </tr>

                        <tr>
                            <td>المادة</td>
                            <td>
                                <select name="subject_id" class="form-control" id="all_subjects">


                                </select>

                            </td>
                        </tr>


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


<?php $this->load->view('template/footer');?>
<script src="<?php echo base_url(); ?>bootstrap.js"></script>
<link href="<?php echo base_url(); ?>summernote.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>summernote.js"></script>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200
    });
    $('#datatable').DataTable();
});
</script>
<script>
function fetch_subjects_by_course_id(id) {
    //console.log(categories_array);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>master/fetch_subjects_by_course_id",
        data: {
            'id': id
        }

    }).done(function(msg) {
        document.getElementById('all_subjects').innerHTML = msg;
    });
}
</script>
<script>
$(document).ready(function() {
    var table = $("#example").DataTable({
        dom: "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
            "<'row'<'col-sm-12 table_layout'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "بحث",
            lengthMenu: "_MENU_",
            paginate: {
                first: "الأول",
                last: "الأخير",
                next: "التالي",
                previous: "السابق",
            },
        },
		columnDefs: [
        { targets: '_all', className: 'dt-center' }
    	],
    });
    $(".dataTables_filter input").addClass("form-control");
    $(".dataTables_length select").addClass("form-select");
});
</script>
</body>

</html>
