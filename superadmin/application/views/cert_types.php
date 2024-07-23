<?php $this->load->view('template/head'); ?>

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>كل النماذج
</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم العلمي
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  كل النماذج

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
			<a href="<?php echo base_url(); ?>master/new_cert_type" class="add_student">
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
              <span> إضافة نموذج </span>
            </a>
          </div>
        </div>



<script>
	function view_modal(id){
        //var $data = $('#review_product_id span').text();
        var url = '<?php echo base_url(); ?>master/edit_course_type/'+id;
        $.ajax({
            type: 'GET',
            url: url,
            success: function (output) {
				$('#login_for_review').html(output);//now its working
				$('#login_for_review').modal('show');//now its working
            },
            error: function(output){
				alert("fail");
            }
        });
	}
</script>

<div id="login_for_review" class="modal" style="" role="dialog">
 
</div>











<table id="example" class="display" style="width: 100%">
          <thead>
            <tr>
              <th>تحديد</th>
              <th>اسم النموذج</th>
              <th>المرحلة</th>
              <th>نموذج لـ </th>
         
              <th>إجراء</th>
            </tr>
          </thead>
          <tbody>
		  <?php foreach($cert_types as $c){ ?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $c->name; ?></td>
              <td>
                <?php echo $c->course_type_name; ?>
              </td>
              <td class="name_">
                <?php echo $c->for_who; ?>
              </td>
           
              
              <td class="actions">
                <button onclick='location.href="<?php echo base_url(); ?>master/delete/cert_types/<?php echo $c->id; ?>"'> <img src="<?php echo base_url(); ?>../assets/images/trash.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
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
  </body>
</html>
