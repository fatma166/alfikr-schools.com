<?php $this->load->view('template/body'); ?>

<script>
	function display_item(type){
		if(type == 1){
			document.getElementById("cat_id_title").style.display="block";
			document.getElementById("cat_id_content").style.display="block";
		}
	}
</script>

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>السلايدر</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				السلايدر 
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
            <div class="d-flex justify-content-start align-items-start flex-column gap-1">
				<form method='post' action='<?php echo base_url(); ?>settings/new_slider' id='form'  enctype="multipart/form-data">           
					<table class='table'>
						<tr>
							<td colspan="2"><h3>سلايدر جديد</h3></td>
						</tr>
						<tr>
							<td>الصورة</td>
							<td><input type="file" name="img" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="إضافة" class="btn btn-success" /></td>
						</tr>
					</table>
				</form>
            </div>
        </div>
		<table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
			  	<th>الرقم</th>
				<th>السلايد</th>
				<th>حذف</th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($slider as $c) {
    //var_dump($b);
    ?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><img src="<?php echo base_url(); ?>../uploads/<?php echo $c->image; ?>" width="200" /></td>
				<td><a href='<?php echo base_url(); ?>settings/delete_slider/<?php echo $c->id; ?>'>حذف</a></td>
			</tr>
		<?php
}?>
            </tbody>
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
