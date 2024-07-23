<?php $this->load->view('template/body'); ?>



<div class="tabs__form w-100">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">البيانات </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-books-tab" data-bs-toggle="pill" data-bs-target="#pills-books" type="button" role="tab" aria-controls="pills-books" aria-selected="true">الكتب</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-exams-tab" data-bs-toggle="pill" data-bs-target="#pills-exams" type="button" role="tab" aria-controls="pills-exams" aria-selected="true">الأختبارات </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-duties-tab" data-bs-toggle="pill" data-bs-target="#pills-duties" type="button" role="tab" aria-controls="pills-duties" aria-selected="true">الواجبات </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-bank-tab" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="true">بنك الأسئلة  </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-grade-tab" data-bs-toggle="pill" data-bs-target="#pills-grade" type="button" role="tab" aria-controls="pills-grade" aria-selected="true">المواد المساعدة</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-division-tab" data-bs-toggle="pill" data-bs-target="#pills-division" type="button" role="tab" aria-controls="pills-division" aria-selected="true">الشعب</button>
            </li>
          </ul>
          <div class="tab-content form__details" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
              <div class="form__details w-100">
                <form method="post" action="<?php echo base_url(); ?>master/edit_main_subject_done"  enctype="multipart/form-data">
                  <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input_form">
                                <label for=""> اسم المادة </label>
                                <input type="text" name="name" value="<?php echo $subject->name; ?>" class="form-control" placeholder="اسم المادة">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input_form">
                            <label for=""> المرحلة </label>
                            <select
                              name="course_type"
                              id="gender"
                              class="form-select form-control"
                            >
                              <option selected disabled>المرحلة</option>
                              <?php 
					foreach($courses_types as $c){
						if($c->id == $subject->course_type){
					?>
							<option value='<?php echo $c->id; ?>' selected><?php echo $c->ar_name; ?></option>
					<?php 
						}
						else{
				    ?>
							<option value='<?php echo $c->id; ?>'><?php echo $c->ar_name; ?></option>
					<?php
						}
						
					}	
				    ?>
                            </select>
                          </div>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="" class="mb-2"> الصورة </label>
                            <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                    style="gap: 8px">
                                <input class="form-control" name="img" type="file" id="formFile">
                                <img src="<?php echo base_url(); ?>../<?php echo $subject->image; ?>" alt="download" alt="download"
                                        loading="lazy" width="40" height="40"/>
                                <span> اضغط او قم بالسحب </span>
                                <p>png, jpg, jpeg (max. 800x400px)</p>
                            </div>
                        </div>
                        <div class="btn__save">
                          <button>حفظ</button>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $subject->id; ?>" />
                  </div>
                </form>
              </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab" tabindex="0">
                <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
                  <div
                    class="d-flex justify-content-start align-items-center flex-row gap-3 w-100 flex-lg-nowrap flex-wrap"
                  >
                    <!-- <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                  <label for="">بحث</label>
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                      <img src="../../assets/images/search-md.svg" alt="search" width="20" height="20" loading="lazy"/>
                    </span>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="بحث"
                      aria-label="Username"
                      aria-describedby="basic-addon1"
                    />
                  </div>
                </div> -->
                    <div
                      class="d-flex justify-content-start align-items-start flex-column gap-1"
                    >
                      <label for=""> المدارس </label>
                      <select
                        name="schools"
                        id="schools"
                        class="form-select form-control"
                      >
                        <option selected disabled>المدارس</option>
                        <option value="">مدرسة 1</option>
                        <option value="">مدرسة 2</option>
                        <option value="">مدرسة 3</option>
                        <option value="">مدرسة 4</option>
                      </select>
                    </div>
                    <div
                      class="d-flex justify-content-start align-items-start flex-column gap-1"
                    >
                      <label for=""> المراحل الدراسية </label>
                      <select
                        name="class"
                        id="class"
                        class="form-select form-control"
                        aria-label="Default select example"
                        aria-placeholder="Segmentation*"
                      >
                        <option selected disabled>المراحل الدراسية</option>
                        <option value="">مرحلة 1</option>
                        <option value="">مرحلة 2</option>
                        <option value="">مرحلة 3</option>
                        <option value="">مرحلة 4</option>
                      </select>
                    </div>
                    <div
                      class="d-flex justify-content-start align-items-start flex-column gap-1"
                    >
                      <label for=""> الصفوف الدراسية </label>
                      <select name="class" id="class" class="form-select form-control">
                        <option selected disabled>الصفوف الدراسية</option>
                        <option value="test">صف 1</option>
                        <option value="">صف 2</option>
                        <option value="">صف 3</option>
                        <option value="">صف 4</option>
                      </select>
                    </div>
                    <div
                      class="d-flex justify-content-start align-items-start flex-column gap-1"
                    >
                      <label for=""> الشعب </label>
                      <select
                        name="category1"
                        id="category1"
                        class="form-select form-control"
                      >
                        <option selected disabled>الشعب</option>
                        <option value="test">شعبة 1</option>
                        <option value="">شعبة 2</option>
                        <option value="">شعبة 3</option>
                        <option value="">شعبة 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="filter_btn">
                    <button type="submit">فلتر</button>
                  </div>
                </form>
                <table id="bank" class="display" style="width: 100%">
                  <thead>
                    <tr>
                      <th>تحديد</th>
                      <th>اسم بنك الأسئلة</th>
                      <th>اسم المعلم</th>
                      <th>المدرسة</th>
                      <th>المادة</th>
                      <th>المرحلة الدراسية</th>
                      <th>الصف</th>
                      <th>الشعبة</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" /></td>
                      <td>
                        <a href="../../practical-section/questions-bank/bank-details.html"> بنك 1 </a>
                      </td>
                      <td>أحمد يسري</td>
                      <td>مـدرسة الخ الخ الخ</td>
                      <td>مادة 1</td>
                      <td>المرحلة الثانية</td>
                      <td>صف 1</td>
                      <td>شعبة 1</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" /></td>
                      <td>
                        <a href="../../practical-section/questions-bank/bank-details.html"> بنك 1 </a>
                      </td>
                      <td>أحمد يسري</td>
                      <td>مـدرسة الخ الخ الخ</td>
                      <td>مادة 1</td>
                      <td>المرحلة الثانية</td>
                      <td>صف 1</td>
                      <td>شعبة 1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
            <div class="tab-pane fade" id="pills-books" role="tabpanel" aria-labelledby="pills-books-tab" tabindex="0">
              <a href="<?php base_url(); ?>master/new_book_form?main_subject=<?php echo $subject->id; ?>"> إضافة كتاب </a>
                <table id="booksTable" class="display" style="width: 100%">
                  <thead>
                    <tr>
                      <th>اسم الكتاب</th>
                      <th>الصورة</th>
                      <th> معاينة</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($books as $b){ ?>
                    <tr>
                      <td><?php echo $b->name; ?></td>
                      <td><img src="<?php echo base_url(); ?>../uploads/<?php echo $b->image; ?>" /></td>

                      <td class="actions">
                        <a href="<?php echo base_url(); ?>../uploads/<?php echo $b->link; ?>"> <img src="<?php echo base_url(); ?>../assets/images/eye.svg" alt="trash" width="24" height="24" loading="lazy"> </a>
                      </td> 
                      <?php } ?>
                    </tr>
                  </tbody>
                </table>
          
              </div>
              <div class="tab-pane fade" id="pills-exams" role="tabpanel" aria-labelledby="pills-exams-tab" tabindex="0">
                <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
                    <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
                      <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                        <label for=""> المراحل الدراسية </label>
                        <select
                          name="class"
                          id="class"
                          class="form-select form-control"
                          aria-label="Default select example"
                          aria-placeholder="Segmentation*"
                        >
                          <option selected disabled>المراحل الدراسية</option>
                          <option value="">مرحلة 1</option>
                          <option value="">مرحلة 2</option>
                          <option value="">مرحلة 3</option>
                          <option value="">مرحلة 4</option>
                        </select>
                      </div>
                      <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                        <label for=""> الصفوف الدراسية </label>
                        <select
                          name="class"
                          id="class"
                          class="form-select form-control"
                        >
                          <option selected disabled>الصفوف الدراسية</option>
                          <option value="test">صف 1</option>
                          <option value="">صف 2</option>
                          <option value="">صف 3</option>
                          <option value="">صف 4</option>
                        </select>
                      </div>
                    </div>
                    <div class="filter_btn">
                      <button type="submit"> فلتر </button>
                    </div>
                  </form>
                  <table id="examsTable" class="display" style="width: 100%">
                    <thead>
                      <tr>
                        <th>اسم الاختبار</th>
                        <th>المرحلة</th>
                        <th>الصف الدراسي</th>
                        <th>تاريخ الأنشاء</th>
                        <th>اسم المدرس</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>اختبار 1</td>
                        <td>مرحلة 1</td>
                        <td>صف 1</td>
                        <td>27-11-2020</td>
                        <td>مدرس 1</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
              <div class="tab-pane fade" id="pills-duties" role="tabpanel" aria-labelledby="pills-duties-tab" tabindex="0">
                <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
                    <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
                      <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                        <label for=""> المراحل الدراسية </label>
                        <select
                          name="class"
                          id="class"
                          class="form-select form-control"
                          aria-label="Default select example"
                          aria-placeholder="Segmentation*"
                        >
                          <option selected disabled>المراحل الدراسية</option>
                          <option value="">مرحلة 1</option>
                          <option value="">مرحلة 2</option>
                          <option value="">مرحلة 3</option>
                          <option value="">مرحلة 4</option>
                        </select>
                      </div>
                      <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                        <label for=""> الصفوف الدراسية </label>
                        <select
                          name="class"
                          id="class"
                          class="form-select form-control"
                        >
                          <option selected disabled>الصفوف الدراسية</option>
                          <option value="test">صف 1</option>
                          <option value="">صف 2</option>
                          <option value="">صف 3</option>
                          <option value="">صف 4</option>
                        </select>
                      </div>
                    </div>
                    <div class="filter_btn">
                      <button type="submit"> فلتر </button>
                    </div>
                  </form>
                  <table id="dutiesTable" class="display" style="width: 100%">
                    <thead>
                      <tr>
                        <th>اسم الاختبار</th>
                        <th>المرحلة</th>
                        <th>الصف الدراسي</th>
                        <th>تاريخ الأنشاء</th>
                        <th>اسم المدرس</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>اختبار 1</td>
                        <td>مرحلة 1</td>
                        <td>صف 1</td>
                        <td>27-11-2020</td>
                        <td>مدرس 1</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
              <div class="tab-pane fade" id="pills-grade" role="tabpanel" aria-labelledby="pills-grade-tab" tabindex="0">
                  <table id="gradeTable" class="display" style="width: 100%">
                    <thead>
                      <tr>
                        <th>الاسم</th>
                        <th>اسم المدرس</th>
                        <th>تاريخ الأنشاء</th>
                        <th>تحميل</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> مادة مساعدة 1 </td>
                        <td> مدرس 1 </td>
                        <td> 27-11-2020 </td>
                        <td> <img
                          src="../../assets/images/download-cloud.svg"
                          alt="print"
                          width="20"
                          height="20"
                          loading="lazy"
                        /> </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="tab-pane fade" id="pills-division" role="tabpanel" aria-labelledby="pills-division-tab" tabindex="0">
              <table id="divisionTable" class="display" style="width: 100%">
                <thead>
                  <tr>
                    <th>اسم الشعبة</th>
                    <th>اسم المدرس</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> شعبة 1 </td>
                    <td> مدرس 1 </td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>

		
		
		 <?php $this->load->view('template/footer'); ?>
		 
		 
		 
    <script>
      $(document).ready(function () {
        var table = $("#booksTable").DataTable({
          dom:
            "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
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

<script>
  $(document).ready(function () {
    var table = $("#examsTable").DataTable({
        "bDestroy": true,
      dom:
        "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
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
<script>
  $(document).ready(function () {
    var table = $("#gradeTable").DataTable({
        "bDestroy": true,
      dom:
        "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
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
<script>
  $(document).ready(function () {
    var table = $("#divisionTable").DataTable({
      dom:
        "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
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
<script>
  $(document).ready(function () {
    var table = $("#dutiesTable").DataTable({
      dom:
        "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
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
<script>
  $(document).ready(function () {
    var table = $("#bank").DataTable({
      dom:
        "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
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

		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 