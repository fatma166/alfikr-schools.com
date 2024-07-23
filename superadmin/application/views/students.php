<?php $this->load->view('template/head'); ?>





<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>الطلاب</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  الطلاب
                </li>
              </ol>
            </nav>
          </div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script>
              function move_to_another_course_type(){
                  var checkedValue = null; 
                    var inputElements = document.getElementsByClassName('students_ids');
                    var ids = "";
                    var j = 0;
                    for(var i=0; inputElements[i]; ++i){
                          if(inputElements[i].checked){
                              j++;
                               checkedValue = inputElements[i].value;
                               ids = ids + checkedValue + "-";
                          }
                    }
                    
                    if(j > 0){
                        ids = ids.substring(0, ids.length - 1);
                        location.href="<?php echo base_url(); ?>master/move_to_another_course_type/?ids="+ids;
                    }
                    else{
                        alert('الرجاء اختيار طالب على الأقل');
                    }
              }
              
              
              
          </script>
          <?php if($this->input->get('msg') == 'move_done'){ ?>
          <script>
          alert('تمت عملية نقل الطلاب بنجاح');
          </script>
          <?php } ?>
          <div
            class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
          >
            <div class="position-relative">
              <button class="operation_">
                <span>عمليات</span>
              </button>
              <section class="operations__btns">
                <button onclick="move_to_another_course_type();"> نقل الى مرحلة جديدة </button>
              </section>
            </div>
            <button>
              <img
                src="<?php echo base_url(); ?>../assets/images/printer.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span>طباعة</span>
            </button>
            <button>
              <img
                src="<?php echo base_url(); ?>../assets/images/file.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span> تصدير إلى PDF </span>
            </button>
            <button id="export-to-excel">
              <img
                src="<?php echo base_url(); ?>../assets/images/download-cloud.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span> إستيراد </span>
            </button>
            <a href="<?php echo base_url(); ?>master/new_student" class="add_student">
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
              <span> إضافة طالب </span>
            </a>
          </div>
        </div>
        <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
          <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
            <!-- <div class="d-flex justify-content-start align-items-start flex-column gap-1">
              <label for="">بحث</label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                  <img src="./assets/images/search-md.svg" alt="search" width="20" height="20" loading="lazy"/>
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
            <div class="d-flex justify-content-start align-items-start flex-column gap-1">
              <label for=""> المدارس </label>
              <select
                name="school_id"
                id="school_id"
                class="form-select form-control"
              >
                <option selected value="0">جميع المدارس</option>
                <?php foreach($schools as $s){ ?>
                <option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
                <?php } ?>
                
              </select>
            </div>
            <div class="d-flex justify-content-start align-items-start flex-column gap-1">
              <label for=""> المراحل الدراسية </label>
              <select
                name="course_type"
                id="class"
                class="form-select form-control"
                aria-label="Default select example"
                aria-placeholder="Segmentation*"
                onchange="fetch_courses_by_course_type(this.value)"
              >
                <option selected value="0">جميع المراحل الدراسية</option>
                <?php foreach($courses_types as $s){ ?>
                <option value="<?php echo $s->id; ?>"><?php echo $s->ar_name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="d-flex justify-content-start align-items-start flex-column gap-1">
              <label for=""> الفصول الدراسية </label>
              <select
                name="course_id"
                id="course_id"
                class="form-select form-control"
              >
                <option selected value="0">جميع الفصول الدراسية</option>
            
              </select>
            </div>
            <script>
function fetch_courses_by_course_type(course_type){
		   //console.log(categories_array);
		   var  school_id = document.getElementById('school_id').value;
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/fetch_courses_by_course_type",
                data: {'course_type': course_type, 'school_id': school_id}

            }).done(function (msg) {
                    document.getElementById("course_id").innerHTML = msg;
            });
		}
	</script>
            
          </div>
          <div class="filter_btn">
            <button type="submit"> فلتر </button>
            <?php if($this->input->get('course_type') != 0 || $this->input->get('school_id') != 0){ ?>
							<button type="button"  onclick="location.href='<?php echo base_url(); ?>master/students'" style="padding: 1.5px; width: 100px;" value="" >إلغاء الفرز</button>
						<?php } ?>
          </div>
        </form>
          <table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
                <th>تحديد</th>
                <th>الرقم</th>
                <th>الصورة</th>
                <th>الإسم</th>
                <th>الموبايل</th>
                <th>اسم المدرسة</th>
                <th>المرحلة الدراسية</th>
                <th> الشعبة الدراسية </th>
                <th> الحالة </th>
              </tr>
            </thead>
            <tbody>
			<?php foreach($students as $s){ ?>
              <tr>
                <td> <input type="checkbox" class="students_ids" value="<?php echo $s->id; ?>" name="ids[]"> </td>
                <td><?php echo $s->id; ?></td>
                <td> 

 <?php if($s->picture){ ?>
                        <img width="50" src="<?php echo base_url().'../uploads/'.$s->picture; ?>"  />
                                <?php } else { ?>
                                <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                <?php  } ?>
				</td>
                <td class="name_">
                  <a href="<?php echo base_url(); ?>master/student_profile/<?php echo $s->id; ?>"> <?php echo $s->first_name .' ' .$s->last_name; ?> </a>
                </td>
                <td><?php echo $s->mobile; ?></td>
                <td><?php echo $s->school_name; ?></td>
                 <td><?php echo $s->course_type_name; ?></td>
                <td><?php echo $s->course_name; ?></td>
               
                <td> 
					<?php if($s->status =="active"){ ?>
				    <span class="status active"> نشط  </span>
				    <?php } else if($s->status =="graduated"){ ?>
				    متخرج    
				    <?php  } else if($s->status == 'deleted'){ ?>
				    <span class="status stopped"> موقوف  </span>
				    <?php  } else{  ?>
					<span class="status not_pay"> لم يسدد  </span>
					
					<?php } ?>
                    
                </td>
              </tr>
			  
			<?php } ?>
             
            </tbody>
          </table>
      </div>
    </div>












 <?php $this->load->view('template/footer'); ?>

    <script>
      $(document).ready(function () {
        var isSmallScreen = $(window).width() <= 500;
        var table = $("#example").DataTable({
          dom:
            "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
            "<'row'<'col-sm-12 table_layout'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
          ],
          responsive: true,
scrollX: true, 
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
        $(window).resize(function () {
          if ($(window).width() <= 500) {
            table.columns.adjust().draw();
          }
        });
      });
    </script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const operationBtn = document.querySelector('.operation_');
          const operationsBtns = document.querySelector('.operations__btns');
        
          // Show/Hide operations__btns when clicking operation_ button
          operationBtn.addEventListener('click', function(event) {
            operationsBtns.style.display = (operationsBtns.style.display === 'block') ? 'none' : 'block';
            event.stopPropagation();
          });
        
          // Hide operations__btns when clicking outside of it
          document.addEventListener('click', function(event) {
            const isClickInside = operationsBtns.contains(event.target) || operationBtn.contains(event.target);
            if (!isClickInside) {
              operationsBtns.style.display = 'none';
            }
          });
        });
      </script>


<script>
    $(document).ready(function() {
        $('#export-to-excel').click(function() {
            // Make an AJAX request to the export_to_excel method
            $.ajax({
                url: '<?php echo site_url('Master/students_export_to_excel'); ?>',
                type: 'GET',
                success: function(response) {
                    // Trigger the file download
                    window.location.href = '<?php echo site_url('Master/students_export_to_excel'); ?>';
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.log('Error exporting to Excel:', error);
                }
            });
        });
    });
</script>
  </body>
</html>
