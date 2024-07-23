<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>


<script src="<?php echo base_url(); ?>js/jspdf.js"></script>
		<script src="<?php echo base_url(); ?>js/FileSaver.js"></script>
		<script src="<?php echo base_url(); ?>js/jspdf.plugin.table.js"></script>
		<script src="<?php echo base_url(); ?>js/amiri.js"></script>
			
			<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">الطلاب </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">القسم الإداري</li>
								<li class="breadcrumb-item active" aria-current="page">الطلاب</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>
			
			
			
			






<script>
function change_quantity(quantity, product_id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>products/change_quantity",
                data: {'quantity': quantity, 'product_id': product_id}

            }).done(function (msg) {
                   alert("تم تغيير الكمية");
            });
}
</script>
<style>
    .student_row:hover{
        background: #26b99a;
        color: white;
        cursor: pointer;
    }
</style>

<script>
		function fetch_student(text){
		   //console.log(categories_array);
		   var course_id = document.getElementById("filter_course_id").value;
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/master/fetch_student_ajax",
                data: {'text': text, 'course_id': course_id}

            }).done(function (msg) {
                    document.getElementById("students_table").innerHTML = msg;
            });
		}

        function fnExcelReport() {
            var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var j = 0;
            var tab = document.getElementById('datatable'); // id of table
        
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
        
        
        function generatefromtable() {
                var utf_8_string_to_render = 'uft-8';
				var data = [], fontSize = 12, height = 0, doc;
				doc = new jsPDF('p', 'pt', 'a4', true);
				doc.setFont("times", "normal");
				doc.setFontSize(fontSize);
				doc.text(20, 20, "جميع الطلاب");
				data = [];
				data = doc.tableToJson('datatable');
				height = doc.drawTable(data, {
					xstart : 10,
					ystart : 10,
					tablestart : 40,
					marginleft : 10,
					xOffset : 10,
					yOffset : 15
				});
				
				doc.save("students.pdf");
			}
</script>

<iframe id="txtArea1" style="display:none"></iframe>




<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    
                     <div class="x_content">
                      <div class="dashboard-widget-content">
<div id="students_table">
<script language="JavaScript">
function toggle(source) {
	
  checkboxes = document.getElementsByName('ids[]');
  //console.log(checkboxes[0].checked);
  //console.log(source.checked);
  for(i = 0; i < checkboxes.length; i++){
	  checkboxes[i].checked = source.checked;
  }
}
</script>


<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">جميع التصنيفات</h4>
						  <a style="float: left;" type="button" class="btn btn-primary" href="<?php echo base_url(); ?>master/new_student" >
							إضافة طالب جديد
						  </a>
						  <div style="float: left">
                                <a class="btn btn-danger" onclick="generatefromtable()" title="تصدير إلى pdf"><i class="fa fa-file-pdf-o"></i></a> 
                                <a class="btn btn-success" onclick="fnExcelReport();" title="تصدير إلى إكسل"><i class="fa fa-file-excel-o"></i></a> 
                                <a class="btn btn-warning" title="طباعة"><i class="fa fa-print"></i></a> 
                            </div>
						</div>
						<div class="box-body">
<table class='table table-striped table-bordered' id="datatable">
    <thead>
			<tr >
				<th style="text-align: right"><input type="checkbox" onClick="toggle(this)" /></th>
				<th style="text-align: right">الرقم</th>
				<th style="text-align: center">الصورة</th>
				<th style="text-align: right">الاسم</th>
				<th style="text-align: right">الموبايل</th>
				<th style="text-align: right">اسم المدرسة</th>
				<th style="text-align: right">المرحلة الدراسية</th>
				<th style="text-align: right">الشعبة الدراسية</th>
				<th style="text-align: right">الحالة</th>
				
				<th style="text-align: right">تعديل</th>
				
			</tr>
	</thead>
	<tbody>
	<?php
	    $i = 1;
		foreach($students as $s){
		
	?>
			<tr <?php /* onclick="location.href='<?php echo base_url(); ?>master/student_profile/<?php echo $s->id; ?>'" */ ?> >
				<td><input type="checkbox" name="ids[]" value="<?php echo $s->id; ?>"  />
				<td><?php echo $i; ?></td>
				<td style="text-align: center">
				   <?php if($s->picture){ ?>
                        <img width="50" src="<?php echo base_url().'../uploads/'.$s->picture; ?>"  />
                                <?php } else { ?>
                                <i class="fa fa-user" style="font-size:50px; color: #000"></i>
                                <?php  } ?>
				</td>
				<td><?php echo $s->first_name .' ' .$s->last_name; ?></td>
				<td><?php echo $s->mobile; ?></td>
				<td><?php echo $s->school_name; ?></td>
				<td>
				    <?php echo $s->course_name; ?>
				</td>
				<Td>
				    <?php echo $s->course_type_name; ?>
				</Td>
				<td>
				    <?php if($s->status =="active"){ ?>
				    نشط
				    <?php } else if($s->status =="graduated"){ ?>
				    متخرج    
				    <?php  } else if($s->status == 'deleted'){ ?>
				    مشطوب
				    <?php  } ?>
				
				</td>
				<td><a href="<?php echo base_url(); ?>master/student_profile/<?php echo $s->id; ?>" >تعديل</a></td>
				
			</tr>
	
	<?php
	        $i++;
		}
	?>
	
	<?php 
		$this->load->helper('url');


		$currentURL = current_url();

		$params   = $_SERVER['QUERY_STRING']; 

		$fullURL = $currentURL . '?' . $params; 

		$this->session->set_userdata('products_url', $fullURL); 
	?>
	</tbody>
</table>

	</div>
						<!-- /.box-body -->
						
						<!-- /.box-footer-->
					</div>
				</div>
			</div>
		</section>
          
           
<div class="pagination" align="center"><?php //echo $links; ?></div>

</div></div></div></div>
 <script>

$( document ).ready(function() {
    $('#datatable').DataTable();
});

</script>
 
 <?php $this->load->view('template/footer'); ?>