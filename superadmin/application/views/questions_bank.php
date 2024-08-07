<?php $this->load->view('template/body');?>


<script>
	function change_fields(type){
		if(type == "خيار متعدد"){
			document.getElementById("multichoic").style.display = "block";

		}
		else{
			document.getElementById("multichoic").style.display = "none";

		}
	}

	function change_question(id, type, number){
		if(type == "نص"){
			document.getElementById(id).innerHTML = '<textarea name="question_'+number+'" class="form-cotrol"></textarea>';
		}
		else{
			document.getElementById(id).innerHTML = '<input type="file" name="img_'+number+'" class="form_control" />';
		}
	}

</script>
<script>
function change_questions_ordering(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_questions_ordering",
                data: {'id': id, 'value': value}

            }).done(function (msg) {
                   alert("تم تغيير الترتيب");
            });
}
</script>

<script>
    function change_exam_status(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>master/change_exam_status",
                data: {'id': id, 'value': value}

            }).done(function (msg) {

            });
    }
</script>

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>بنك الاسئلة</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
					بنك الاسئلة
                </li>
              </ol>
            </nav>
          </div>
          <div
            class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
          >
            <button>
              <img
                src="../../assets/images/printer.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span>طباعة</span>
            </button>
            <button>
              <img
                src="../../assets/images/file.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span> تصدير إلى PDF </span>
            </button>
            <button>
              <img
                src="../../assets/images/download-cloud.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span> إستيراد </span>
            </button>

            <a href="<?php echo base_url(); ?>master/add_new_question_bank" class="add_student">
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
              <span> سؤال جديد </span>
            </a>
          </div>
        </div>
        <form class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
          <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
            <div class="d-flex justify-content-start align-items-start flex-column gap-1">
              <label for=""> الحالة </label>
              <select
                name="schools"
                id="schools"
                class="form-select form-control"
              >
                <option selected disabled>الحالة</option>
                <option value="">حالة 1</option>
                <option value="">حالة 2</option>
                <option value="">حالة 3</option>
                <option value="">حالة 4</option>
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
			  	<th><?php echo $words["id"]; ?></th>
				<th>السؤال</th>
				<th>نص السؤال</th>
				<th>الصورة</th>
				<th>نوع السؤال</th>
				<th>حذف</th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($questions as $b) {
    //var_dump($b);
    ?>
              <tr>
			  	<td><?php echo $b->id; ?></td>
				<td><?php echo $b->name; ?><br /><?php echo $b->added_by; ?></td>
				<td><?php echo $b->text; ?></td>
				<td>
					<?php if ($b->image != '') {?>
						<img src="<?php echo base_url(); ?>../uploads/questions/<?php echo $b->image; ?>" width="200" />
					<?php } else {?>
						لا يوجد
					<?php }?>
				</td>
				<td><?php echo $b->question_type; ?></a></td>
				<td><a href="<?php echo base_url(); ?>master/delete_question/<?php echo $b->id; ?>">حذف</a></td>
              </tr>
		<?php
}?>
            </tbody>
          </table>

		  </div>
    </div>

<?php $this->load->view('template/footer');?>
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
