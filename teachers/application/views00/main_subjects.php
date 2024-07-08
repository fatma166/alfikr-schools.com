<?php $this->load->view('template/head'); ?>

<div class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100">
    <div class="title_page">
        <h2>المواد</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				المواد
                </li>
            </ol>
        </nav>
    </div>
</div>
<table id="booksTable" class="display" style="width: 100%">
    <thead>
        <tr>
		<th>الرقم</th>
				<th>الصورة</th>
				<th>الاسم</th>
				<th>المرحلة الدراسية</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($subjects as $c){ ?>
        <form method="post" action="<?php echo base_url(); ?>master/edit_main_subject">
	<tr>
		<td><?php echo $c->id; ?></td>
	  <td><img src="<?php echo base_url(); ?>../<?php echo $c->image; ?>" width="150" /></td>
        <td>
            
              <?php 
                echo $c->name;
              ?>
           
                
            
        </td>
		<td>
			<?php 
                echo $c->course_type;
              ?>
		
		</td>
		
		
				
    </tr>
	</form>
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
		buttons: [
			'copy', 'csv', 'excel', 'print',
			{
				extend: 'pdfHtml5',
				text: 'PDF',
				exportOptions: {
					columns: ':visible',
					modifier: {order: 'index'},
					format: {
						body: function (data, row, column, node) {
							const arabic = /[\u0600-\u06FF]/;

							if (arabic.test(data)) {
								return data.split(' ').reverse().join(' ');
							}
							return data;
						},
						header: function (data, row, column, node) {
							const arabic = /[\u0600-\u06FF]/;

							if (arabic.test(data)) {
								return data.split(' ').reverse().join(' ');
							}
							return data;
						}
					}
				}
			}
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
