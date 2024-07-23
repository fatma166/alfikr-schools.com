<?php $this->load->view('template/body'); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.min.css">
<script src="<?php echo base_url(); ?>js/lightbox-plus-jquery.min.js"></script>
          
<script>
function choose_category(cat_id){
	location.href = '<?php echo base_url(); ?>products/?category_id='+cat_id;
}
</script>


<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>المناطق</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				المناطق 
                </li>
              </ol>
            </nav>
          </div>
          <div
            class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
          >
            <a href="<?php echo base_url(); ?>master/new_region" class="add_student">
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
              <span> منطقة جديدة </span>
            </a>
          </div>
        </div>
		<table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
			  	<th><?php echo $words["id"]; ?></th>
				<th>الاسم العربي</th>
				<th>اسم المدينة</th>	
				<th>تعديل</th>
				<th>حذف</th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($regions as $s) {
    //var_dump($b);
    ?>
              <tr>
			  	<td><?php echo $s->id; ?></td>
				<td><?php echo $s->name; ?></td>
				<td><?php echo $s->city_name; ?></td>
				<td><a href="<?php echo base_url(); ?>master/edit_region/<?php echo $s->id; ?>">تعديل</a></td>
				<td><a href="<?php echo base_url(); ?>master/delete/regions/<?php echo $s->id; ?>">حذف</a></td>
              </tr>
		<?php
}?>
            </tbody>
			<?php 
		$this->load->helper('url');


		$currentURL = current_url();

		$params   = $_SERVER['QUERY_STRING']; 

		$fullURL = $currentURL . '?' . $params; 

		$this->session->set_userdata('products_url', $fullURL); 
	?>
          </table>

		  </div>
    </div>

<?php $this->load->view('template/footer');?>
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
