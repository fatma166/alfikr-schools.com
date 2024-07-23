<?php $this->load->view('template/head'); ?>

<div class="tabs__form w-100">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="true">البيانات الشخصية</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-exams-tab" data-bs-toggle="pill" data-bs-target="#pills-exams" type="button" role="tab" aria-controls="pills-exams" aria-selected="true">الأختبارات </button>
              </li> 
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-duties-tab" data-bs-toggle="pill" data-bs-target="#pills-duties" type="button" role="tab" aria-controls="pills-duties" aria-selected="true">  الواجبات</button>
              </li> 
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-division-tab" data-bs-toggle="pill" data-bs-target="#pills-division" type="button" role="tab" aria-controls="pills-division" aria-selected="true">المادة</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-helpers-tab" data-bs-toggle="pill" data-bs-target="#pills-helpers" type="button" role="tab" aria-controls="pills-helpers" aria-selected="true">المواد المساعدة</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-table-tab" data-bs-toggle="pill" data-bs-target="#pills-table" type="button" role="tab" aria-controls="pills-table" aria-selected="true">جدول الدوام</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-files-tab" data-bs-toggle="pill" data-bs-target="#pills-files" type="button" role="tab" aria-controls="pills-files" aria-selected="true">الملفات</button>
              </li>
              </ul>

<div class="tab-content form__details" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                    <form method="post" action="<?php echo base_url(); ?>master/edit_teacher_done" enctype="multipart/form-data">
                        <div class="row">
                            <h2> الصورة الشخصية </h2>
                            <div class="col-md-6 d-flex justify-content-center align-items-center">
                                <img src="<?php echo base_url(); ?>../uploads/<?php echo $teacher->image; ?>" alt="" width="150" height="150">
                            </div>
                            <div class="col-md-6">
                                <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4"
                                        style="gap: 8px">
                                    <input class="form-control" name="img" type="file" id="formFile">
                                    <img src="<?php echo base_url(); ?>../assets/images/down.svg" alt="download" alt="download"
                                            loading="lazy" width="40" height="40"/>
                                    <span> اضغط او قم بالسحب </span>
                                    <p>png, jpg, jpeg (max. 800x400px)</p>
                                </div>
                            </div>
                            <h2> البيانات الشخصية </h2>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الاسم الكامل </label>
                                    <input type="text" name="full_name" <?php echo $teacher->full_name; ?> class="form-control" placeholder="الاسم الكامل">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الجنس </label>
                                    <select
                                    name="gender"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <option selected disabled>الجنس</option>
                                    <option value="male" <?php if($teacher->gender == 'male'){ ?>selected<?php } ?>>ذكر</option>
                                    <option value="female" <?php if($teacher->gender == 'female'){ ?>selected<?php } ?>>أنثى</option>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الحالة الأجتماعية </label>
                                    <select
                                    name="married"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <option selected disabled>الحالة الأجتماعية</option>
                                    <option value="0" <?php if($teahcer->married == 0){ ?>selected<?php } ?>>اعزب</option>
                                    <option value="1" <?php if($teahcer->married == 1){ ?>selected<?php } ?>>متزوج</option>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> تاريخ الميلاد </label>
                                    <input name="birthdate" type="date" class="form-control" value="<?php echo $teacher->birthdate; ?>" placeholder="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الجنسية </label>
                                    <select
                                    name="country_id"
                                    id="gender"
                                    class="form-select form-control"
                                >
                                    <option selected disabled>الجنسية</option>
                                    <?php foreach($countries as $c){ ?>
                                    <option value="<?php echo $c->id; ?>" <?php if($c->id == $teacher_country_id){ ?>selected<?php } ?>><?php echo $c->country_name; ?></option>
                                    <?php } ?>
                                </select>                            
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> الرقم الوطني </label>
                                    <input name="ID_number" value="<?php echo $teacher->ID_number; ?>" type="text" class="form-control" placeholder="الرقم الوطني">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input_form">
                                    <label for=""> البريد الألكتروني </label>
                                    <input type="email"  value="<?php echo $teacher->email ?>" class="form-control" placeholder="البريد الألكتروني">
                                </div>
                            </div>
                        </div>
                        <div class="btn__save">
                            <button>حفظ</button>
                        </div>
                        <input type="hidden" name="teacher_id" value="<?php echo $teacher->id; ?>" />
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-exams" role="tabpanel" aria-labelledby="pills-exams-tab" tabindex="0">
                  <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
                      <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
                        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                          <label for=""> المادة </label>
                          <select
                            name="schools"
                            id="schools"
                            class="form-select form-control"
                          >
                            <option selected disabled>المدارس</option>
                            <option value="">مادة 1</option>
                            <option value="">مادة 2</option>
                            <option value="">مادة 3</option>
                            <option value="">مادة 4</option>
                          </select>
                        </div>
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
                        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                          <label for="">الشعبة </label>
                          <select
                            name="class"
                            id="class"
                            class="form-select form-control"
                          >
                            <option selected disabled>الشعبة</option>
                            <option value="test">شعبة 1</option>
                            <option value="">شعبة 2</option>
                            <option value="">شعبة 3</option>
                            <option value="">شعبة 4</option>
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
                          <th>اسم الأختبار</th>
                          <th>المرحلة</th>
                          <th>الصف الدراسي</th>
                          <th>الشعبة</th>
                          <th>المادة</th>
                          <th>تاريخ الأنشاء</th>
                          <th>عمليات</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>اختبار 1</td>
                          <td>مرحلة 1</td>
                          <td>صف 1</td>
                          <td>شعبة 1</td>
                          <td>مادة 1</td>
                          <td>27-11-2020</td>
                          <td class="actions">
                            <button > <img src="<?php echo base_url(); ?>../assets/images/trash.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
                          </td>                        
                        </tr>
                      </tbody>
                    </table>
                </div>
                  <div class="tab-pane fade" id="pills-duties" role="tabpanel" aria-labelledby="pills-duties-tab" tabindex="0">
                    <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
                        <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for=""> المادة </label>
                            <select
                              name="schools"
                              id="schools"
                              class="form-select form-control"
                            >
                              <option selected disabled>المدارس</option>
                              <option value="">مادة 1</option>
                              <option value="">مادة 2</option>
                              <option value="">مادة 3</option>
                              <option value="">مادة 4</option>
                            </select>
                          </div>
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
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for="">الشعبة </label>
                            <select
                              name="class"
                              id="class"
                              class="form-select form-control"
                            >
                              <option selected disabled>الشعبة</option>
                              <option value="test">شعبة 1</option>
                              <option value="">شعبة 2</option>
                              <option value="">شعبة 3</option>
                              <option value="">شعبة 4</option>
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
                            <th>اسم الأختبار</th>
                            <th>المرحلة</th>
                            <th>الصف الدراسي</th>
                            <th>الشعبة</th>
                            <th>المادة</th>
                            <th>تاريخ الأنشاء</th>
                            <th>عمليات</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>اختبار 1</td>
                            <td>مرحلة 1</td>
                            <td>صف 1</td>
                            <td>شعبة 1</td>
                            <td>مادة 1</td>
                            <td>27-11-2020</td>
                            <td class="actions">
                              <button > <img src="<?php echo base_url(); ?>../assets/images/trash.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
                            </td>                        
                          </tr>
                        </tbody>
                      </table>
                </div>
                  <div class="tab-pane fade" id="pills-division" role="tabpanel" aria-labelledby="pills-division-tab" tabindex="0">
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
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for="">الشعبة </label>
                            <select
                              name="class"
                              id="class"
                              class="form-select form-control"
                            >
                              <option selected disabled>الشعبة</option>
                              <option value="test">شعبة 1</option>
                              <option value="">شعبة 2</option>
                              <option value="">شعبة 3</option>
                              <option value="">شعبة 4</option>
                            </select>
                          </div>
                        </div>
                        <div class="filter_btn">
                          <button type="submit"> فلتر </button>
                        </div>
                      </form>
                      <table id="divisionTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>اسم المادة</th>
                            <th> المرحلة الدراسية </th>
                            <th>الصف الدراسي</th>
                            <th>الشعبة</th>
                            <th>عمليات</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>مادة 1</td>
                            <td>مرحلة 1</td>
                            <td>صف 1</td>
                            <td>شعبة 1</td>
                            <td class="actions">
                              <button > <img src="<?php echo base_url(); ?>../assets/images/trash.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
                            </td>                        
                          </tr>
                        </tbody>
                      </table>
                </div>
                  <div class="tab-pane fade" id="pills-helpers" role="tabpanel" aria-labelledby="pills-helpers-tab" tabindex="0">
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
                          <div class="d-flex justify-content-start align-items-start flex-column gap-1">
                            <label for="">الشعبة </label>
                            <select
                              name="class"
                              id="class"
                              class="form-select form-control"
                            >
                              <option selected disabled>الشعبة</option>
                              <option value="test">شعبة 1</option>
                              <option value="">شعبة 2</option>
                              <option value="">شعبة 3</option>
                              <option value="">شعبة 4</option>
                            </select>
                          </div>
                        </div>
                        <div class="filter_btn">
                          <button type="submit"> فلتر </button>
                        </div>
                      </form>
                      <table id="helpersTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>اسم المادة المساعدة</th>
                            <th>تاريخ الأنشاء</th>
                            <th>مرحلة دراسية</th>
                            <th>صف دراسي</th>
                            <th>الشعبة</th>
                            <th>تحميل</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>مادة مساعدة</td>
                            <td>27-11-2020</td>
                            <td>مرحلة دراسية 1</td>
                            <td>صف دراسي 1</td>
                            <td>شعبة 1</td>
                            <td class="actions">
                              <button > <img src="<?php echo base_url(); ?>../assets/images/download.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
                            </td>                        
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab" tabindex="0">
                  <div class="w-100">
                    <h2 class="mb-4"> جدول الدوام </h2>
                    <div class="table_layout w-100 mb-3">
                      <table border="5" cellspacing="0" align="center" width="100%">
                        <!--<caption>Timetable</caption>-->
                        <tr>
                            <td align="center" height="50" width="100"><br>
                                <b>اليوم/الوقت - الحصة</b></br>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>الأولى<br>9:30-10:20</b>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>الثانية<br>10:20-11:10</b>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>الثالثة<br>11:10-12:00</b>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>12:00-12:40</b>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>الرابعة<br>12:40-1:30</b>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>الخامسة<br>1:30-2:20</b>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>السادسة<br>2:20-3:10</b>
                            </td>
                            <td align="center" height="50" width="100">
                                <b>السابعة<br>3:10-4:00</b>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" height="50">
                                <b>السبت</b>
                            </td>
                            <td align="center" height="50">رياضيات <br> صف 3/1 <br> <span> لم يحضر </span> </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1 <br> <span> لم يحضر </span></td>
                            <td align="center" height="50">رياضيات<br> صف 3/1 <br> <span> لم يحضر </span></td>
                            <td rowspan="6" align="center" height="50">
                                <h2>B<br>R<br>E<br>A<br>K</h2>
                            </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1 </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                        </tr>
                        <tr>
                            <td align="center" height="50">
                                <b>الأحد</b>
                            </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                        </tr>
                        <tr>
                            <td align="center" height="50">
                                <b>الأثنين</b>
                            </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                        </tr>
                        <tr>
                            <td align="center" height="50">
                                <b>الثلاثاء</b>
                            </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                        </tr>
                        <tr>
                            <td align="center" height="50">
                                <b>الأربعاء</b>
                            </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                        </tr>
                        <tr>
                            <td align="center" height="50">
                                <b>الخميس</b>
                            </td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                            <td align="center" height="50">رياضيات<br> صف 3/1</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab" tabindex="0">
                  <button href="" class="add_file_btn">
                    <svg
                      width="20"
                      height="20"
                      viewBox="0 0 24 24"
                      color="#fff"
                      fill="#fff"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M12 5V19M5 12H19"
                        color="#fff"
                        stroke="white"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                    <span> إضافة ملف </span>
                  </button>
                  <form action="" class="add_file">
                      <div class="row ">
                          <div class="col-md-6">
                              <div class="input_form">
                                  <label for=""> اسم الملف </label>
                                  <input type="text" class="form-control" placeholder="اسم الملف ">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="input_form w-100">
                                  <label for=""> صورة الملف </label>
                                  <div class="file__zone d-flex justify-content-center align-items-center flex-column mb-4 w-100"
                                          style="gap: 8px">
                                      <input class="form-control" type="file" id="formFile">
                                      <img src="<?php echo base_url(); ?>../assets/images/download.svg" alt="download" alt="download"
                                              loading="lazy" width="40" height="40"/>
                                      <span> اضغط او قم بالسحب </span>
                                      <p>png, jpg, jpeg (max. 800x400px)</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="btn__save btn__save__file justify-content-start align-items-start">
                          <button type="button">حفظ</button>
                      </div>
                  </form>
                  <table id="filesTable" class="display" style="width: 100%">
                      <thead>
                        <tr>
                          <th>اسم الملف</th>
                          <th>عرض</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>ملف 1</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
        </div>
      </div>
    </div>


    <?php $this->load->view('template/footer'); ?>
    
    
     <script>
      $(document).ready(function () {
        var table = $("#filesTable").DataTable({
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
      document.addEventListener('DOMContentLoaded', function() {
        var addFileBtn = document.querySelector('.add_file_btn');
        var addFileDiv = document.querySelector('.add_file');
      
        addFileBtn.addEventListener('click', function() {
          addFileDiv.style.display = addFileDiv.style.display === 'none' ? 'block' : 'none';
          addFileBtn.style.display = 'none';
        });
      });
      </script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            var addFileBtn = document.querySelector('.add_file_btn');
            var addFileDiv = document.querySelector('.add_file');
            var saveButton = document.querySelector('.btn__save__file button');
        
            addFileBtn.addEventListener('click', function() {
                // Toggle the visibility of add_file
                addFileDiv.style.display = addFileDiv.style.display === 'none' ? 'block' : 'none';
            });
        
            saveButton.addEventListener('click', function() {
                // Hide the add_file div when the "حفظ" button is clicked
                addFileDiv.style.display = 'none';
                addFileBtn.style.display = 'flex';
            });
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
                var table = $("#helpersTable").DataTable({
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
