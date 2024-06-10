<?php $this->load->view('template/body'); ?>

<script>
function change_exam_status(id, value) {
    //console.log(categories_array);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>master/change_exam_status",
        data: {
            'id': id,
            'value': value
        }

    }).done(function(msg) {

    });
}
</script>


<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>الامتحانات</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    الامتحانات
                </li>
            </ol>
        </nav>
    </div>
    <div class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap">
        <a style="float: left;" type="button" data-toggle="modal" data-target="#modal-center" class="add_student">
            <svg width="20" height="20" viewBox="0 0 24 24" color="#fff" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" color="#fff" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span> امتحان جديد </span>
        </a>
    </div>
</div>
<table id="example" class="display" style="width: 100%">
    <thead>
        <tr>
            <th><?php echo $words["id"]; ?></th>
            <th>عنوان الامتحان</th>
            <th>المحتويات</th>
            <th>علامات الطلاب</th>
            <th>الشعبة</th>
            <th>المدة</th>
            <th>النوع</th>
            <th>تاريخ البداية</th>
            <th>تاريخ النهاية</th>
            <th>تعطيل/تفعيل</th>
            <th>حذف</th>
        </tr>
    </thead>
    <tbody>
        <?php
foreach ($exams as $b) {
    //var_dump($b);
    ?>
        <tr>
            <td><?php echo $b->id; ?></td>
            <td><?php echo $b->title; ?></td>
            <td><a href="<?php echo base_url(); ?>master/exams_contents/<?php echo $b->id; ?>">المحتويات</a></td>

            <td>
                <a href="<?php echo base_url(); ?>master/exams_students_results/<?php echo $b->id; ?>">علامات الطلاب</a>
            </td>
            <td>
                <?php echo $b->course_name; ?>
            </td>

            <td>
                <?php echo $b->minutes; ?> دقيقة
            </td>

            <td>
                <?php echo $b->type; ?>
            </td>

            <td>
                <?php echo $b->start_date; ?>
            </td>

            <td>
                <?php echo $b->end_date; ?>
            </td>

            <td>
                <input name="active" type="radio" style="display: inline-block; position: unset; opacity: 1" value="1"
                    <?php if($b->active == 1){ ?>checked<?php } ?>
                    onchange="change_exam_status(<?php echo $b->id; ?>,1)" /> مفعل <br />
                <input name="active" type="radio" style="display: inline-block; position: unset; opacity: 1" value="0"
                    <?php if($b->active == 0){ ?>checked<?php } ?>
                    onchange="change_exam_status(<?php echo $b->id; ?>,0)" /> غير مفعل
            </td>
            <td><a href="<?php echo base_url(); ?>master/delete/exams/<?php echo $b->id; ?>">حذف</a></td>
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
                <h5 class="modal-title">إضافة امتحان جديد</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url(); ?>master/add_new_exam" enctype="multipart/form-data">
                    <table class="table">
                        <tR>
                            <td>عنوان الامتحان</td>
                            <td>
                                <input type="text" name="title" class="form-control" />
                            </td>
                        </tR>
                        <tR>
                            <td>مدة الامتحان بالدقيقة</td>
                            <td>
                                <input type="text" name="minutes" class="form-control" />
                            </td>
                        </tR>
                        <tR>
                            <td>نوع الامتحان</td>
                            <td>
                                <select name="type">
                                    <option value="اختبار">اختبار</option>
                                    <option value="واجب">واجب</option>
                                </select>
                            </td>
                        </tR>
                        <tR>
                            <td>تاريخ البداية</td>
                            <td>
                                <input type="text" name="start_date" id="sandbox-container1" autocomplete="off"
                                    class="form-control" />
                            </td>
                        </tR>
                        <tR>
                            <td>تاريخ النهاية</td>
                            <td>
                                <input type="text" name="end_date" id="sandbox-container2" autocomplete="off"
                                    class="form-control" />
                            </td>
                        </tR>

                        <tR>
                            <td>تفاصيل</td>
                            <td>
                                <textarea name="details" class="form-control"></textarea>
                            </td>
                        </tR>

                        <tr>
                            <td>الشعبة</td>
                            <td>
                                <select name="course_id" class="form-control">
                                    <?php foreach($courses as $c){ ?>
                                    <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>

                                    <?php } ?>
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
<link rel="stylesheet" href="https://osus.academy/admin/css/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
$(document).ready(function() {
    $('#sandbox-container1').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $('#sandbox-container2').datepicker({
        dateFormat: 'yy-mm-dd'
    });

});
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
        columnDefs: [{
            targets: '_all',
            className: 'dt-center'
        }],
    });
    $(".dataTables_filter input").addClass("form-control");
    $(".dataTables_length select").addClass("form-select");
});
</script>
</body>

</html>
