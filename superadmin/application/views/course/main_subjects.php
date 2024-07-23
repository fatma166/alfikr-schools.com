<?php $this->load->view('template/head'); ?>

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>المواد</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم العلمي
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  المواد
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
			<a href="<?php echo base_url(); ?>master/new_main_subject_form" class="add_student">
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
              <span> إضافة مادة </span>
            </a>
          </div>
        </div>


<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إضافة مادة جديدة</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 <form method="post" action="<?php echo base_url(); ?>master/new_main_subject"  enctype="multipart/form-data">
				<table class='table table-striped '>
					<tr>
						<td style="width: 200px;">المواد</td>
						<td><input type="text" name="name" class="form-control" required  ></td>
					</tr>
					
					

					<tr>
						<td>المرحلة الدراسية</td>
						<td>
							<select name="course_type" class="form-control">
								<option value="0">المرحلة الدراسية</option>
								<?php foreach($courses_types as $c){ ?>
									<option value="<?php echo $c->id; ?>">
									<?php 
										
										echo $c->ar_name;
									  ?>    
										
										
									</option>
								<?php } ?>
							</select>

						</td>
						<tr>
						<td>الصورة</td>
						<td><input type="file" name="img" class="form-control" required /></td>
					</tr>
					</tr>
					
							   
				</table>
				
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إضافة</button>
			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
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
              <th>الرقم</th>
              <th>الصورة</th>
              <th>الإسم</th>
              <th>المرحلة الدراسية</th>
              
           <?php /*   <th>إجراء</th>  */ ?>
            </tr>
          </thead>
          <tbody>
		  <?php foreach($main_subjects as $c){ ?>
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
                <a href="<?php echo base_url(); ?>master/edit_main_subject/<?php echo $c->id; ?>">
                  <?php 
                echo $c->name;
              ?>
                </a>
              </td>
              <td><?php 
                echo $c->course_type_name;
              ?></td>
              
            <?php /*  <td class="actions">
                <button onclick='location.href="<?php echo base_url(); ?>master/delete/main_subjects/<?php echo $c->id; ?>"'> <img src="../../assets/images/trash.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
              </td> */ ?>
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
