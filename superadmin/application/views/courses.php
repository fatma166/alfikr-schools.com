<?php $this->load->view('template/head'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>


function exporttopdf(){
    document.getElementById('tableprint').style.display = 'block';
    document.getElementById('forprint').style.display = 'block';
    var doc = new jsPDF();          
var elementHandler = {
  '#ignorePDF': function (element, renderer) {
    return true;
  }
};
var source = window.document.getElementById('tableprint');
doc.fromHTML(
    source,
    15,
    15,
    {
      'width': 180,'elementHandlers': elementHandler
    });

doc.output("dataurlnewwindow");
}


function fnExcelReport() {
            var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var j = 0;
            var tab = document.getElementById('forprint'); // id of table
        
            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                //tab_text=tab_text+"</tr>";
            }
        
            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
        
            var msie = window.navigator.userAgent.indexOf("MSIE ");
        
            // If Internet Explorer
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
        
                sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
            } else {
                // other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
            }
        
            return sa;
        }



</script>
<div id="tableprint" style="display: none; width: 100%;">
<table id="forprint" width="100%"  class="table" style="direction: rtl; width: 100%; display: none;">
		<tr bgcolor="#f1f1f1">
             
              <th style="padding: 5px;">الرقم</th>
              <th style="padding: 5px;">الصورة</th>
              <th style="padding: 5px;" width="300">الإسم</th>
              <th style="padding: 5px;" >المرحلة الدراسية</th>
              <th style="padding: 5px;" width="150">اسم المدرسة</th>
              <th style="padding: 5px;">التكلفة</th>
             
            
              
            </tr>
			<?php 
				$i = 1;
				foreach($courses as $s){
					//var_dump($p);
			?>
            <tr  style="border-bottom: solid 1px #ccc;">
             
              <td><?php echo $i; ?></td>
              <td>
                <img
                  src="<?php echo base_url(); ?>../uploads/<?php echo $s->image; ?>"
                  alt="avatar"
                  height="50"
                  width="50"
                />
              </td>
              <td class="name_">
              
                  <?php echo $s->name; ?>
          
              </td>
              <td><?php echo $s->course_type; ?></td>
              <td><?php echo $s->school_name; ?></td>
              <td><?php echo $s->cost; ?></td>
              
            </tr>
			<?php
	        $i++;
					}
				?>
		</table>

</div>
<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
         id="customers">
          <div class="title_page">
            <h2>الشعب</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم العلمي
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  الشعب
                </li>
              </ol>
            </nav>
          </div>
          <div
            class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
          >
            <button onclick="PrintElem();">
              <img
                src="../../assets/images/printer.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span>طباعة</span>
            </button>
            <button onclick="exporttopdf()">
              <img
                src="../../assets/images/file.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
				
              />
              <span> تصدير إلى PDF </span>
            </button>
            <button onclick="fnExcelReport()">
              <img
                src="../../assets/images/download-cloud.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span> إكسل </span>
            </button>
          </div>
        </div>
        <form action="<?php echo base_url(); ?>master/courses" method="get" class="filter__action w-100 flex-lg-nowrap flex-wrap gap-2">
          <div
            class="d-flex justify-content-start align-items-center flex-row gap-3 w-100 flex-lg-nowrap flex-wrap"
          >
            <div
              class="d-flex justify-content-start align-items-start flex-column gap-1"
            >
              <label for=""> المدارس </label>
              <select
                name="school_id"
                id="schools"
                class="form-select form-control"
              >
                <option selected disabled>المدارس</option>
                <?php foreach($schools as $s){ ?>
								<option <?php if($this->input->get('school_id') == $s->id){ ?>selected<?php } ?> value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
								<?php } ?>
              </select>
            </div>
            <div
              class="d-flex justify-content-start align-items-start flex-column gap-1"
            >
              <label for=""> المراحل الدراسية </label>
              <select
                name="course_type_id"
                id="class"
                class="form-select form-control"
                aria-label="Default select example"
                aria-placeholder="Segmentation*"
              >
                <option selected disabled>المراحل الدراسية</option>
                <?php foreach($courses_types as $s){ ?>
								<option <?php if($this->input->get('course_type_id') == $s->id){ ?>selected<?php } ?> value="<?php echo $s->id; ?>"><?php echo $s->ar_name; ?></option>
								<?php } ?>
              </select>
            </div>
          </div>
          <div class="filter_btn">
            <button type="submit">فلتر</button>
			<?php if($this->input->get('course_type_id') != 0 || $this->input->get('school_id') != 0){ ?>
							<button type="button"  onclick="location.href='<?php echo base_url(); ?>master/courses'" style="padding: 1.5px; width: 100px;" value="" >إلغاء الفرز</button>
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
              <th>المرحلة الدراسية</th>
              <th>اسم المدرسة</th>
              <th>التكلفة</th>
              <th>إضافة مدرس</th>
           <?php /*   <th>إضافة طالب</th>*/ ?>
              <th>البرنامج</th>
     <?php /*         <th>إجراء</th>    */ ?>
            </tr>
          </thead>
          <tbody>
		  <?php 
				$i = 1;
				foreach($courses as $s){
					//var_dump($p);
			?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?php echo $i; ?></td>
              <td>
                <img
                  src="<?php echo base_url(); ?>../uploads/<?php echo $s->image; ?>"
                  alt="avatar"
                  height="80"
                  width="80"
                />
              </td>
              <td class="name_">
                <a href="<?php echo base_url(); ?>master/edit_course/<?php echo $s->id; ?>">
                  <?php echo $s->name; ?>
                </a>
              </td>
              <td><?php echo $s->course_type; ?></td>
              <td><?php echo $s->school_name; ?></td>
              <td><?php echo $s->cost; ?></td>
              <td class="add_teacher">
                <a href="<?php echo base_url(); ?>master/add_teacher_to_course/<?php echo $s->id; ?>"> إضافة مدرس </a>
              </td>
             <?php /* <td class="add_student">
                <a href="<?php echo base_url(); ?>master/add_student_to_course/<?php echo $s->id; ?>"> إضافة طالب </a>
              </td> */ ?>
			  <td>
					<a href="<?php echo base_url(); ?>master/time_table/<?php echo $s->id; ?>">
						تعديل البرنامج
					</a>
				</td>
           <?php /*   <td class="actions">
                <button onclick="<?php echo base_url(); ?>master/delete/courses/<?php echo $s->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذا العنصر');"> <img src="<?php echo base_url(); ?>../assets/images/trash.svg" alt="trash" width="24" height="24" loading="lazy"> </button>
              </td> */ ?>
            </tr>
			<?php
	        $i++;
					}
				?>
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
