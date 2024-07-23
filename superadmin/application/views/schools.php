<?php $this->load->view('template/head'); ?>



<script>
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
        
        function PrintElem()
{
	document.getElementById('forprint').style.display = 'block';
	document.getElementById('forprint').style.width = '100%';
    var mywindow = window.open('', 'PRINT', 'height=600,width=1000');

    mywindow.document.write('<html><head><title></title>');
    mywindow.document.write('</head><body >');
    //mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById("tableprint").innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();
	document.getElementById('forprint').style.display = 'none';
	document.getElementById('forprint').style.width = '100%';
    return true;
}
</script>


<div id="tableprint" style="display: none; width: 100%;">
<table id="forprint" width="100%"  class="table" style="direction: rtl; width: 100%; display: none;">
		<tr bgcolor="#f1f1f1">
             
              <th style="padding: 5px;">الرقم</th>
          
              <th style="padding: 5px;" width="300">الإسم</th>
              <th style="padding: 5px;" >الحالة</th>
           
             
            
              
            </tr>
			<?php 
				$i = 1;
				foreach($schools as $s){
					//var_dump($p);
			?>
            <tr  style="border-bottom: solid 1px #ccc;">
             
              <td><?php echo $i; ?></td>
             
              </td>
              <td class="name_">
              
                  <?php echo $s->name; ?>
          
              </td>
              <td><?php if($s->status == 1){ ?>نشط<?php } else{ ?>غير نشط<?php } ?></td>
    
              
            </tr>
			<?php
	        $i++;
					}
				?>
		</table>

</div>

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>المدارس</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  المدارس
                </li>
              </ol>
            </nav>
          </div>
          <div
            class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
          >
            <button onclick="PrintElem();">
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
            <button onclick="fnExcelReport()">
              <img
                src="<?php echo base_url(); ?>../assets/images/download-cloud.svg"
                alt="print"
                width="20"
                height="20"
                loading="lazy"
              />
              <span> إكسل </span>
            </button>
            
            <a href="<?php echo base_url(); ?>master/new_school" class="add_student">
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
              <span> إضافة مدرسة </span>
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
                onchange="location.href='<?php echo base_url(); ?>master/schools/?status='+this.value"
              >
                <option selected disabled>الحالة</option>
                <option value="-1" <?php if($this->input->get('status') == -1){ ?>selected<?php  } ?>>الكل</option>
                <option value="-2" <?php if($this->input->get('status') == -2){ ?>selected<?php  } ?>>غير نشط</option>
                <option value="1" <?php if($this->input->get('status') == 1){ ?>selected<?php  } ?>>نشط</option>
               
              </select>
            </div>
          </div>
         
        </form>
          <table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
                <th>تحديد</th>
                <th>الرقم</th>
                <th>الاسم</th>
                <th>الحالة</th>
              </tr>
            </thead>
            <tbody>
			<?php 
	    $i = 1;
		foreach($schools as $s){
			//var_dump($p);
	?>
              <tr>
                <td> <input type="checkbox"> </td>
                <td><?php echo $s->id; ?></td>
                <td class="name_">
                  <a href="<?php echo base_url(); ?>master/edit_school/<?php echo $s->id; ?>">  
				        <?php echo $s->name; ?></a>
                </td>
                <td> 
                <?php if($s->status == 1){ ?>
                    <span class="status active"> نشط  </span>
                <?php } else{ ?>
                 <span class="status not_pay "> غير نشط  </span>
                <?php } ?>
                </td>
              </tr>
		<?php }  ?>
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
