<?php $this->load->view('template/body');?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>

<script>
function choose_category(cat_id) {
    location.href = '<?php echo base_url(); ?>products/?category_id=' + cat_id;
}
</script>
<script>
function change_quantity(quantity, product_id) {
    //console.log(categories_array);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>products/change_quantity",
        data: {
            'quantity': quantity,
            'product_id': product_id
        }

    }).done(function(msg) {
        alert("تم تغيير الكمية");
    });
}
</script>

<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>الدفعات</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    الدفعات 
                </li>
            </ol>
        </nav>
    </div>
    <div class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap">
        <a href="<?php echo base_url(); ?>master/new_payment" class="add_student">
            <svg width="20" height="20" viewBox="0 0 24 24" color="#fff" fill="#fff" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" color="#fff" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span> دفعة جديدة </span>
        </a>
    </div>
</div>
<form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2" method="get"
    action="<?php echo base_url(); ?>master/payments">
    <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
            <table class="table">

                <td>
                    <div id="total_payments_view"></div>
                </td>
                <td style="width: 320px;"><input type="text" value="<?php echo $this->input->get('start_date'); ?>"
                        name="start_date" class="form-control" style="width: 300px;" id="sandbox-container1" required
                        autocomplete="off" placeholder="من .. " /></td>
                <td style="width: 320px;"><input type="text" required
                        value="<?php echo $this->input->get('start_date'); ?>" name="end_date" class="form-control"
                        style="width: 300px;" id="sandbox-container2" autocomplete="off" placeholder="إلى .. " />

                </td>

                <td><input type="submit" class="btn btn-success" value="بحث" /></td>
                <td>
                    <?php if ($this->input->get('start_date') != '') {
    ?>
                    <a href="<?php echo base_url(); ?>master/payments" class="btn btn-danger">إلغاء الفلتر</a>
                    <?php
}?>

                </td>
            </table>
        </div>
    </div>
    <div class="filter_btn">
        <button type="submit"> فلتر </button>
    </div>
</form>
<table id="example" class="display" style="width: 100%">
    <thead>
        <tr>
            <th>الرقم</th>
            <th>الطالب</th>
            <th>الدورة</th>
            <th>الكمية</th>
            <th>الموظف</th>
            <th>التاريخ</th>
            <th>تعديل</th>
            <th>طباعة</th>
            <th>المبلغ المتبقي </th>
            <th>حذف</th>
        </tr>
    </thead>
    <tbody>
        <?php
$total_payments = 0;
foreach ($payments as $m) {
    //var_dump($b);
    ?>
        <tr>
            <td id="id_<?php echo $m->id; ?>"><?php echo $m->id; ?></td>
            <td id="student_name_<?php echo $m->id; ?>"><?php echo $m->first_name . ' ' . $m->last_name; ?> </td>
            <td id="course_name_<?php echo $m->id; ?>"><?php echo $m->name; ?></td>
            <td id="amount_<?php echo $m->id; ?>"><?php echo $m->amount; ?></td>
            <td id="username_<?php echo $m->id; ?>"><?php echo $m->username; ?></td>
            <td id="date_<?php echo $m->id; ?>"><?php echo $m->date; ?></td>
            <td><a href="<?php echo base_url(); ?>master/edit_payment/<?php echo $m->id; ?>">تعديل</a></td>
            <td><input type="button" value="طباعة" class="btn btn-success" onclick="printDiv(<?php echo $m->id; ?>)" />
            </td>
            <td id="restamount_<?php echo $m->id; ?>">
                <?php
$total_payments += $m->total;
    $rest = $m->course_cost - $m->total;
    echo $rest;
    ?>
            </td>
            <td>
                <a href="<?php echo base_url(); ?>master/delete/payments/<?php echo $m->id; ?>">
                    حذف
                </a>
            </td>
        </tr>
        <?php
}?>
    </tbody>
    <?php
$this->load->helper('url');

$currentURL = current_url();

$params = $_SERVER['QUERY_STRING'];

$fullURL = $currentURL . '?' . $params;

$this->session->set_userdata('products_url', $fullURL);
?>
</table>

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
document.getElementById('total_payments_view').innerHTML = "المبلغ الإجمالي " + <?php echo $total_payments; ?> + "$ ";
</script>


<script>
function printDiv(vid) {


    var id = "id_" + vid;
    var student_name = "student_name_" + vid;
    //alert(student_name);
    var course_name = "course_name_" + vid;
    var date = "date_" + vid;
    var amount = "amount_" + vid;
    var username = "username_" + vid;
    var restamount = "restamount_" + vid;



    var id = document.getElementById(id).innerHTML;
    var student_name = document.getElementById(student_name).innerHTML;
    var course_name = document.getElementById(course_name).innerHTML;
    var date = document.getElementById(date).innerHTML;
    var amount = document.getElementById(amount).innerHTML;
    var username = document.getElementById(username).innerHTML;






    var restamount = document.getElementById(restamount).innerHTML;

    var html = '<div style="font-size: 16px;">';
    //html = html + '</div>';

    html = html + '<h2 align="center">منصة ماس للتعليم</h2><hr />';
    html = html + '<h3 align="right">رقم الإيصال: ' + id + '</h3>';
    //html = html + '<h3 align="right">اسم الطالب ' + student_name + '</h3>';
    html = html + '<table width="100%" align="center">';
    /* html = html + '<table width="318" align="center"><tr><td width="200" style="font-size: 23px;">رقم الطلب</td><td style="font-size: 23px;">'+order_number+'</td>'; */
    html = html + '<tr><td style="font-size: 14px;">التاريخ: </td><td style="font-size: 23px;">' + date +
        '</td><td><div align="center"><img src="https://emisa-akademi.com/admin/images/logo.png" width="150" /></td></tr>';
    html = html + '<tr><td style="font-size: 14px;">اسم الطالب: </td><td style="font-size: 23px;">' + student_name +
        '</td></tr>';
    html = html + '<tr><td style="font-size: 14px;">اسم الدورة: </td><td style="font-size: 23px;">' + course_name +
        '</td></tr>';
    html = html + '<tr><td style="font-size: 14px;">المبلغ: </td><td style="font-size: 23px;">' + amount + '</td></tr>';

    html = html + '<tr><td style="font-size: 14px;">المبلغ المتبقي</td><td style="font-size: 23px;">' + restamount +
        '</td></tr>';



    html = html + '</table>';

    html = html + '<table width="80%" align="center"><tr><td align="left">الختم والتوقيع</td></tr></table>';
    html += "<br /><br /><br />";
    html += html;


    //html = html + '<div style="position: absolute; bottom: 0px; text-align: center; width: 100%">' + center_address +  ' <br /><div style="direction: ltr"> ' + center_phone +  '</div></div>';
    document.body.innerHTML = html;
    window.print();
    //document.body.innerHTML = originalContents;

    window.close()
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
    });
    $(".dataTables_filter input").addClass("form-control");
    $(".dataTables_length select").addClass("form-select");
});
</script>
</body>

</html>
