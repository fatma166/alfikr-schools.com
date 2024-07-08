<?php $this->load->view('template/head'); ?>

<div
        class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
      >
        <div class="title_page">
          <h2>الحساب الشخصي </h2>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                القسم الإداري
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                الحساب الشخصي 
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="__details w-100">
        <div class="row">
          <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
              <p> الاسم الكامل </p>
              <span> <?php echo $teacher[0]->full_name; ?> </span>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
              <p> رقم الجوال </p>
              <span> <?php echo $teacher[0]->mobile; ?> </span>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
              <p> الصورة الشخصية </p>
              <img src="<?php echo base_url(); ?>../uploads/<?php echo $teacher[0]->image; ?>" alt="avatar" width="120" height="120">
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
              <p> البريد الألكتروني </p>
              <span> <?php echo $teacher[0]->email; ?> </span>
            </div>
          </div>
          <!-- <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
              <p> المرحلة </p>
              <span> مرحلة 1 </span>
            </div>
          </div> -->
          <!-- <div class="col-md-3">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
              <p> المادة </p>
              <span> مادة 1 </span>
            </div>
          </div> -->
          <div class="col-12">
            <div class="d-flex justify-content-start align-items-start flex-column gap-2 mb-5">
              <p> الوصف </p>
              <span> <?php echo $teacher[0]->about; ?> </span>
            </div>
          </div>
          </div>
        </div>
      </div>
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
