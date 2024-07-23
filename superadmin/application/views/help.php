<?php $this->load->view('template/head'); ?>








<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>المساعدة والإرشادات</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  إعدادات الموقع
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  المساعدة والإرشادات
                </li>
              </ol>
            </nav>
          </div>
          
        </div>
       
          <table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
              
                <th>العنوان</th>
           
                <th>مشاهدة</th>
              </tr>
            </thead>
            <tbody>
			<?php 
	    $i = 1;
		foreach($videos as $s){
			//var_dump($p);
	?>
              <tr>
              
                <td><?php echo $s->title; ?></td>
               
                <td> 
                <a href="<?php echo base_url(); ?>../uploads/help_videos/<?php echo $s->video_url; ?>" target="_blank" >اضغط هنا</a>
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
