<?php $this->load->view('template/body'); ?>


<div
      class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
    >
      <div class="title_page">
        <h2>الرسائل</h2>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              القسم العلمي
            </li>
            <li class="breadcrumb-item active" aria-current="page">
			الرسائل
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
			<th>اسم المدرس</th>
            <th>صورة المدرس</th>
            <th>اسم المادة</th>
            <th>تاريخ الإرسال</th>
            <th>الرسالة</th>
            <th>الرد على الرسالة</th>
        </tr>
      </thead>
      <tbody>
	  <?php foreach($messages as $m){ ?>
        <tr>
		<td>
                                    <?php foreach($teachers5 as $t){
                                        if($t->id == $m->teacher_id){
                                            echo $t->full_name;
                                        }
                                    }?>
                                </td>
                                <td style="text-align: center">
                                    <?php foreach($teachers5 as $t){
                                        if($t->id == $m->teacher_id){
                                            if($t->image){ ?>
                                            <img width="50" src="<?php echo base_url().'../uploads/'.$t->image; ?>"  />
                                            <?php } else { ?>
                                                <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                    <?php  }}} ?>
                                </td>
                                <td>
                                    <?php foreach($teachers5 as $t){
                                        if($t->id == $m->teacher_id){
                                            echo $t->details;
                                        }
                                    }?>
                                </td>
                                <td><?php echo $m->date; ?></td>
                                <td><?php echo $m->message; ?></td>	
                                <td>
								
									<button onclick="document.getElementById('teacher_id').value =<?php echo $m->teacher_id; ?>;  show_msg_modal();"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">
										مراسلة
									  </button>
                                </td>
        </tr>
	  <?php } ?>
      </tbody>
    </table>
    </div>
	<div class="modal center-modal fade" id="modal-center" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">إرسال رسالة</h5>
			<button type="button" class="close" data-dismiss="modal">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			 	  
			<form method="post" action="<?php echo base_url(); ?>master/send_teacer_messaage"  enctype="multipart/form-data">
			<table class='table table-striped '>
				<tr>
					<td>
					      <textarea class="form-control"  name="message" style="width: 100%" id="message" placeholder="محتوى الرسالة" required></textarea>
					</td>
				</tr>
				
				
						   
			</table>

					
			<input type="hidden" name="teacher_id" value="0" id="teacher_id" />
			
			
			
			
		  </div>
		  <div class="modal-footer modal-footer-uniform">
		  <button type="submit" class="btn btn-primary ">إرسال</button>
			<button type="button" class="btn btn-secondary float-right" onclick="hide_msg_modal();" data-dismiss="modal">إلغاء</button>
			
		  </div>
		</div>
		</form>
	  </div>
	</div>

</div>
<script>
    function show_comp_modal(){
        $('#modal-warning').modal('show');
    }
    function hide_comp_modal(){
        $('#modal-warning').modal('hide');
    }
    function show_msg_modal(){
        $('#modal-center').modal('show');
    }
    function hide_msg_modal(){
        $('#modal-center').modal('hide');
    }
</script>

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