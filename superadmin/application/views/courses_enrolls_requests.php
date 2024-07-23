<?php $this->load->view('template/body'); ?>
<script>
function change_ordering(ordering, id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/change_ordering",
                data: {'ordering': ordering, 'id': id}

            }).done(function (msg) {
                   alert("تمت التغييرات");
            });
}

function status(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_req_status",
                data: {'value': value, 'id': id}

            }).done(function (msg) {
                   
            });
}


function top_menu(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/top_menu",
                data: {'id': id, 'value': value}

            }).done(function (msg) {
                   
            });
}


</script>
       
<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>طلبات التسجيل</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  طلبات التسجيل
                </li>
              </ol>
            </nav>
          </div>
          <div
            class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
          >
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
            <button>
              <img
                src="<?php echo base_url(); ?>../assets/images/download-cloud.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span> إستيراد </span>
            </button>
            
            <!-- <a href="/student/add.html" class="add_student">
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
            </a> -->
          </div>
        </div>
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
              <label for=""> المادة </label>
              <select
                name="category1"
                id="category1"
                class="form-select form-control"
              >
                <option selected disabled>المادة</option>
                <option value="test">مادة 1</option>
                <option value="">مادة 2</option>
                <option value="">مادة 3</option>
                <option value="">مادة 4</option>
              </select>
            </div>
            <div class="d-flex justify-content-start align-items-start flex-column gap-1">
              <label for=""> الحالة </label>
              <select
                name="category1"
                id="category1"
                class="form-select form-control"
              >
                <option selected disabled>الحالة</option>
                <option value="test">تمت الموافقة</option>
                <option value="">لم يتم الموافقة</option>
              </select>
            </div>
          </div>
          <div class="filter_btn">
            <button type="submit"> فلتر </button>
          </div>
        </form>
<table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
                <th>تحديد</th>
                <th>الرقم</th>
                <th>الصورة</th>
                <th>اسم</th>
				<th>المرحلة الدراسية</th>
                <th>البريد الألكتروني</th>
                <th>الموبايل</th>
                
            
                <th> الحالة </th>
                <th> تاريخ الطلب </th>
                <th> موافقة وتسجيل </th>
				<th> عمليات </th>
              </tr>
            </thead>
            <tbody>
			<?php 
		foreach($req as $o){
	?>
              <tr>
                <td> <input type="checkbox"> </td>
                <td><?php echo $o->id; ?></td>
                <td>  <img src="<?php echo base_url(); ?>../uploads/<?php echo $o->picture; ?>" width="200" alt=""> </td>
                <td class="name_">
                  <a href="<?php echo base_url(); ?>master/student_profile/<?php echo $o->id; ?>"> <?php echo $o->student; ?> </a>
                </td>
				<td><?php echo $o->course; ?></td>
                <td><?php echo $o->email; ?></td>
                <td><?php echo $o->phone; ?></td>
                
        
                <td> 
				
				<?php if($o->status == 1){ ?>
				      <span class="status active"> تمت الموافقة  </span>
				    <?php } else{ ?>
				    لم تتم الموافقة بعد
				    <?php } ?>
                  
                </td>
                <td> 
                    <?php echo $o->date; ?>
                </td>
                <td>
                    <a href="<?php echo base_url(); ?>master/approve_student_request/<?php echo $o->id; ?>">موافقة وتسجيل</a>
                </td>
				<td> 
				<a href="<?php echo base_url(); ?>master/delete/courses_enrolls_requests/<?php echo $o->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذه الصفحة');" class="btn btn-danger"><span class="fa fa-trash"></span></a>
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
 </body>
</html>
