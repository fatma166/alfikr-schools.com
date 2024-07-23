
<?php $this->load->view('template/body'); ?>




<div
      class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
    >
      <div class="title_page">
        <h2>الشهادات</h2>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              القسم الإداري
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              الشهادات
            </li>
          </ol>
        </nav>
      </div>
      <div
        class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
      >
        <a href="<?php echo base_url(); ?>master/cert_types"> كل النماذج </a>
        <a href="<?php echo base_url(); ?>master/new_certificate" class="add_student">
          <span> إضافة شهادة </span>
        </a>
      </div>
    </div>
    <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
      <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
          <label for=""> اسم الطالب </label>
          <select
            name="schools"
            id="schools"
            class="form-select form-control"
          >
            <option selected disabled>اسم الطالب</option>
			<?php foreach($students as $s){ ?>
            <option value="<?php echo $s->id; ?>"><?php echo $s->first_name .' ' .$s->last_name; ?></option>
		        
		        <?php } ?>
          </select>
        </div>
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
          <label for=""> اسم النموذج </label>
          <select
            name="schools"
            id="schools"
            class="form-select form-control"
          >
            <option selected value="0">كل النماذج</option>
            <?php foreach($cert_types as $c){ ?>
            <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
          <label for=""> المرحلة  </label>
          <select
            name="schools"
            id="schools"
            class="form-select form-control"
          >
            <option selected value="0">جميع المراحل </option>
            <?php foreach($courses_types as $c){ ?>
            <option value="<?php echo $c->id; ?>"><?php echo $c->ar_name; ?></option>
            <?php } ?>
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
            <th>اسم الطالب</th>
            <th>نوع النموذج</th>
           
            
            <th>تاريخ الأصدار</th>
            <th>تحميل</th>
            <th>المرحلة</th>
          </tr>
        </thead>
        <tbody>
		<?php foreach($certificates as $c){ ?>
				
          <tr>
            <td> <input type="checkbox"> </td>
            <td>
              <a href="<?php echo base_url(); ?>master/view_cert/<?php echo $c->id; ?>" style="color:#000">   <?php echo $c->student_name; ?> </a>
            </td>
            <td class="name_">
                <?php echo $c->cert_type_name; ?>
            </td>
            
            <td><?php echo $c->date; ?></td>
            <td> <button onclick='location.href="<?php echo base_url(); ?>master/download_cert/<?php echo $c->id; ?>"'> <img src="../../assets/images/download-cloud.svg" alt="download"> </button> </td>
            
            <td> 
                <?php echo $c->course_type_name; ?>
            </td>
          </tr>
		<?php } ?>
        </tbody>
      </table>
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