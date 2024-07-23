<?php $this->load->view('template/body'); ?>

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>اللغة</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				اللغة
                </li>
              </ol>
            </nav>
          </div>
        </div>
		<table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
			  	<th><?php echo $words["name"]; ?></th>
				<th>عربي</th>
				<th>انكليزي</th>
				<th>تركي</th>
				<th><?php echo $words["edit"]; ?></th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($all_words as $w) {
    //var_dump($b);
    ?>
        <form method="post" action="<?php echo base_url(); ?>settings/edit_language">
			<tr>
				<td><?php echo $w->title; ?></td>
				<td><textarea name="ar" style="width: 150px;"><?php echo $w->ar; ?></textarea></td>
				<td><textarea name="en" style="width: 150px;"><?php echo $w->en; ?></textarea></td>
				<td><textarea name="tr" style="width: 150px;"><?php echo $w->tr; ?></textarea></td>
				<td>
					<input type="submit" value="<?php echo $words['edit']; ?>" class="btn btn-success" />
					<input type="hidden" name="id" value="<?php echo $w->id; ?>" />
				</td>
			</tr>
		</form>
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
