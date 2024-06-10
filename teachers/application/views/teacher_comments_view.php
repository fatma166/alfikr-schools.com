<?php $this->load->view('template/body'); ?>


<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>الطلاب / التعليقات السابقة</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    التعليقات
                </li>
            </ol>
        </nav>
    </div>

</div>

<table id="booksTable" class="display" style="width: 100%">
    <thead>
        <tr>
            <th>الرقم</th>
            <th>الاسم</th>
            <th>تاريخ التعليق</th>
            <th>التعليق</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;
            foreach($comments as $c){ ?>
        <tr>
            <td><?php echo $i; ?></td>

            <td>
                <?php echo $c->student_name; ?>
            </td>
            <td><?php echo $c->date; ?></td>
            <td><?php echo $c->comment; ?></td>
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
