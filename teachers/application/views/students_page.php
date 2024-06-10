<?php $this->load->view('template/head'); ?>

<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>لائحة الطلاب</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    جميع الطلاب
                </li>
            </ol>
        </nav>
    </div>
    <div class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap">
        <button>
            <img src="<?php echo base_url(); ?>assets/images/printer.svg" alt="print" width="20" height="20"
                loading="lazy" />
            <span>طباعة</span>
        </button>
        <button>
            <img src="<?php echo base_url(); ?>assets/images/file.svg" alt="print" width="20" height="20"
                loading="lazy" />
            <span> تصدير إلى PDF </span>
        </button>
        <button>
            <img src="<?php echo base_url(); ?>assets/images/download-cloud.svg" alt="print" width="20" height="20"
                loading="lazy" />
            <span> إستيراد </span>
        </button>

    </div>
</div>
<form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
    <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">

        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
            <label for="">جميع الطلاب</label>
            <select name="courses" class="form-control" style="width: 300px;"
                onchange="location.href='<?php echo base_url(); ?>master/students_page/?course_id='+this.value">
                <option value="0">جميع الشعب</option>
                <?php foreach($teacher_courses as $c){ ?>
                <option <?php if($this->input->get('course_id') == $c->id){ ?>selected<?php } ?>
                    value="<?php echo $c->id; ?>"><?php echo $c->course_type_name; ?> / <?php echo $c->name; ?></option>

                <?php } ?>

            </select>
        </div>
    </div>
    <div class="filter_btn">
        <button type="submit"> فلتر </button>
    </div>
</form>

<table id="booksTable" class="display" style="width: 100%">
    <thead>
        <tr>
            <th>الرقم</th>
            <th>الصورة</th>
            <th>الاسم</th>
            <th>الصف والشعبة</th>
            <th>إضافة تعليق</th>
            <th>مراسلة</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;
            foreach($students as $s){ ?>
        <tr>
		<td><?php echo $i; ?></td>
                                <td style="text-align: center">
                                    <?php if($s->picture){ ?>
                                    <img width="50" src="<?php echo base_url().'../uploads/'.$s->picture; ?>" />
                                    <?php } else { ?>
                                    <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                    <?php  } ?>
                                </td>
                                <td><?php echo $s->first_name. " " .$s->last_name; ?></td>
                                <td>
                                    <?php echo $s->course_type_name; ?> / <?php echo $s->class_name; ?>

                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>master/add_comment_page/<?php echo $s->id; ?>"
                                        class="btn btn-success">تعليق</a>
                                </td>


                                <td>
                                    <a href="<?php echo base_url(); ?>master/send_message_for_student_page/<?php echo $s->id; ?>"
                                        class="btn btn-success">مراسلة الطالب</a>
                                </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
</div>

<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>

<?php $this->load->view('template/footer'); ?>

<script>
$(document).ready(function() {
    var table = $("#booksTable").DataTable({
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
    });
    $(".dataTables_filter input").addClass("form-control");
    $(".dataTables_length select").addClass("form-select");
});
</script>
