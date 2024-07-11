 <?php $this->load->view('template/head'); ?>

<div
      class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
    >
      <div class="title_page">
        <h2>الكتب الدراسية</h2>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              القسم العلمي
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              الكتب الدراسية
            </li>
          </ol>
        </nav>
      </div>
      <div
      class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
    >
      <button>
        <img
          src="<?php echo base_url(); ?>assets/images/printer.svg"
          alt="print"
          width="20"
          height="20"
          loading="lazy"
        />
        <span>طباعة</span>
      </button>
      <button>
        <img
          src="<?php echo base_url(); ?>assets/images/file.svg"
          alt="print"
          width="20"
          height="20"
          loading="lazy"
        />
        <span> تصدير إلى PDF </span>
      </button>
      <button>
        <img
          src="<?php echo base_url(); ?>assets/images/download-cloud.svg"
          alt="print"
          width="20"
          height="20"
          loading="lazy"
        />
        <span> إستيراد </span>
      </button>

    </div>
    </div>
		<form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
      <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
        
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
          <label for=""> المراحل الدراسية </label>
          <select name="class" id="class" class="form-select form-control" aria-label="Default select example" aria-placeholder="Segmentation*">
            <option selected="" disabled="">المراحل الدراسية</option>
            <option value="">مرحلة 1</option>
            <option value="">مرحلة 2</option>
            <option value="">مرحلة 3</option>
            <option value="">مرحلة 4</option>
          </select>
        </div>
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
          <label for=""> الصف الدراسي </label>
          <select name="class" id="class" class="form-select form-control">
            <option selected="" disabled="">الصف الدراسي</option>
            <option value="test">صف 1</option>
            <option value="">صف 2</option>
            <option value="">صف 3</option>
            <option value="">صف 4</option>
          </select>
        </div>
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
          <label for="">الشعبة </label>
          <select name="class" id="class" class="form-select form-control">
            <option selected="" disabled="">الشعبة</option>
            <option value="test">شعبة 1</option>
            <option value="">شعبة 2</option>
            <option value="">شعبة 3</option>
            <option value="">شعبة 4</option>
          </select>
        </div>
        <div class="d-flex justify-content-start align-items-start flex-column gap-1">
          <label for="">المادة </label>
          <select name="class" id="class" class="form-select form-control">
            <option selected="" disabled="">المادة</option>
            <option value="test">مادة 1</option>
            <option value="">مادة 2</option>
            <option value="">مادة 3</option>
            <option value="">مادة 4</option>
          </select>
        </div>
      </div>
      <div class="filter_btn">
        <button type="submit"> فلتر </button>
      </div>
    </form>
   
    <table id="booksTable" class="display" style="width: 100%">
      <thead>
        <tr>
          <th>اسم الكتاب</th>
      
          <th>المادة</th>
          <th>الصورة</th>
          <th> معاينة</th>
        </tr>
      </thead>
      <tbody>
	  <?php foreach($books as $b){ ?>
        <tr>
          <td><?php echo $b->name; ?></td>
          <td>مادة 1</td>
          <td> <img src="<?php echo base_url(); ?>../<?php echo $b->image; ?>" alt="avatar" width="80" height="80"> </td>
          <td class="actions">
            <a href="<?php echo base_url(); ?>../<?php echo $b->link; ?>" class="btn">تنزيل</a>
          </td>  
        </tr>
	  <?php } ?>
      </tbody>
    </table>
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
        var isSmallScreen = $(window).width() <= 500;
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
scrollX: true, 
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
        $(window).resize(function () {
          if ($(window).width() <= 500) {
            table.columns.adjust().draw();
          }
        });
      });
    </script>