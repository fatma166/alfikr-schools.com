<?php $this->load->view('template/body'); ?>


<div
      class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
    >
      <div class="title_page">
        <h2>الملاحظات</h2>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              القسم العلمي
            </li>
            <li class="breadcrumb-item active" aria-current="page">
			الملاحظات
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

    </div>
    </div>
		
    <table id="booksTable" class="display" style="width: 100%">
      <thead>
        <tr>
			<th>الرقم</th>
            <th>صورة المدرس</th>
            <th>اسم المدرس</th>
            <th>المادة</th>
            <th>التعليق</th>
            <th>تاريخ التعليق</th>
        </tr>
      </thead>
      <tbody>
	  <?php $i=1; 
	  	foreach($comments as $c){ ?>
        <tr>
		<td><?php echo $i;?></td>
                                <td style="text-align: center">
                                    <?php foreach($teachers5 as $t){
                                        if($t->id == $c->teacher_id){
                                            if($t->image){ ?>
                                            <img width="50" src="<?php echo base_url().'../uploads/'.$t->image; ?>"  />
                                            <?php } else { ?>
                                                <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                    <?php  }}} ?>
                                </td>
                                <td>
                                    <?php foreach($teachers5 as $t){
                                        if($t->id == $c->teacher_id){
                                            echo $t->full_name;
                                        }
                                    }?>
                                </td>
                                <td>
                                    <?php foreach($teachers5 as $t){
                                        if($t->id == $c->teacher_id){
                                            echo $t->details;
                                        }
                                    }?>
                                </td>
                                <td><?php echo $c->comment; ?></td>
                                <td><?php echo $c->date; ?></td>
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
        var table = $("#commentsTable").DataTable({
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