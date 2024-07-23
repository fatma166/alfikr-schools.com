<?php $this->load->view('template/body'); ?>

<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>الأسئلة الشائعة</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				الأسئلة الشائعة
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="d-flex justify-content-start align-items-center flex-row gap-3 w-100  flex-lg-nowrap flex-wrap">
            <div class="d-flex justify-content-start align-items-start flex-column gap-1">
				<form method='post' action='<?php echo base_url(); ?>settings/new_faq_done' id='form'  enctype="multipart/form-data">           
					<table class='table'>
						<tr>
							<td colspan="2"><h3>سؤال جديد</h3></td>
						</tr>
						<tr>
							<td>السؤال بالعربي</td>
							<td><input type="text" name="ar_qs"  class="form-control" /></td>
						</tr>
						<tr>
							<td>الإجابة بالعربي</td>
							<td><input type="text" name="ar_answer" class="form-control" /></td>
						</tr>
						<tr>
							<td>الترتيب</td>
							<td><input type="text" name="ordering" /></td>
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
				<th>السؤال</th>
				<th>الإجابة</th>
				<th>حذف</th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($faqs as $c) {
    //var_dump($b);
    ?>
			<tr>
				<td><?php echo $c->id; ?></td>
				<td><?php echo $c->ar_qs; ?></td>
				<td><?php echo $c->ar_answer; ?></td>
				<td><a href='<?php echo base_url(); ?>settings/delete/faqs/<?php echo $c->id; ?>'>حذف</a></td>
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
