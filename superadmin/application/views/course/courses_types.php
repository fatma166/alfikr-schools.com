<?php $this->load->view('template/head'); ?>







<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>المراحل الدراسية</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم العلمي
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  المراحل الدراسية
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
            <a href="<?php echo base_url(); ?>master/new_course_type" class="add_student">
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
              <span> إضافة مرحلة دراسية </span>
            </a>
          </div>
        </div>
        <table id="example" class="display" style="width: 100%">
          <thead>
            <tr>
              <th>تحديد</th>
              <th>الرقم</th>
              <th>الصورة</th>
              <th>الإسم</th>
          <?php /*    <th>إضافة طالب</th>*/ ?>
           <?php /*   <th>إجراء</th> */ ?>
            </tr>
          </thead>
          <tbody>
		  <?php foreach($courses_types as $c){ ?>
            <tr>
              <td><input type="checkbox" /></td>
              <td>1</td>
              <td>
                <img
                  src="<?php echo base_url(); ?>../<?php echo $c->image; ?>"
                  alt="avatar"
                  height="80"
                  width="80"
                />
              </td>
              <td class="name_">
                <a href="<?php echo base_url(); ?>master/edit_course_type/<?php echo $c->id; ?>">
                 <?php 
                echo $c->ar_name;
              ?>
           
                </a>
              </td>
            <?php /*  <td class="add_student">
               	    <a href="<?php echo base_url(); ?>master/add_student_to_course_type/<?php echo $c->id; ?>" >إضافة طالب</a>
	
              </td> */ ?>
            <?php /*  <td class="actions">
                <button onclick="location.href='<?php echo base_url(); ?>master/delete/courses_types/<?php echo $c->id; ?>'"> <img src="<?php echo base_url(); ?>../assets/images/trash.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
              </td>   */ ?>
            </tr>
		  <?php } ?>
          </tbody>
        </table>
      </div>
    </div>











<?php $this->load->view('template/footer'); ?>
 <script>
      document.addEventListener('DOMContentLoaded', function() {
          const dropdownButton = document.getElementById('dropdownMenuButton1');
          const dropdownMenu = document.querySelector('.notification-menu');

          dropdownButton.addEventListener('click', function(event) {
              event.stopPropagation();
              dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
          });

          document.addEventListener('click', function(event) {
              if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                  dropdownMenu.style.display = 'none';
              }
          });
      });
  </script>

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
  </body>
</html>
