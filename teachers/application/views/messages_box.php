<?php $this->load->view('template/head'); ?>


<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>صندوق البريد</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    رسائل الطلاب
                </li>
            </ol>
        </nav>
    </div>
</div>
<table id="booksTable" class="display" style="width: 100%">
    <thead>
        <tr>
            <th>اسم الطالب</th>
            <th>صورة الطالب</th>
            <th>تاريخ الإرسال</th>
            <th>الرسالة</th>
            <th>الرد على الرسالة</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($messages as $m){ ?>
        <tr>
            <td><?php foreach($students as $s){
                                        if($s->id == $m->student_id){
                                            echo $s->first_name. " " .$s->last_name ;}
                                        }?>
            </td>
            <td style="text-align: center">
                <?php foreach($students as $s){
                                            if($s->id == $m->student_id){
                                                if($s->picture){ ?>
                <img width="50" src="<?php echo base_url().'../uploads/'.$s->picture; ?>" />
                <?php } else { ?>
                <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                <?php  } 
                                            }
                                        }?>
            </td>
            <td><?php echo $m->date;?></td>
            <td><?php echo $m->message;?></td>
            <td>
                <a href="<?php echo base_url(); ?>master/reply_messaage_page/<?php echo $m->id; ?>"
                    class="btn btn-success">الرد على الرسالة</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

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
