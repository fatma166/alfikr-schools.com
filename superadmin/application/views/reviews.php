
<?php $this->load->view('template/body'); ?>
<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>التقييمات</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				التقييمات
                </li>
              </ol>
            </nav>
          </div>
        </div>
		<table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
			  	<th>الرقم</th>
				<th>الاسم</th>
				<th>المنتج</th>
				<th>التعليق</th>
				<th>التقييم</th>
				<th>تفعيل</th>
				<th>حذف</th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($reviews as $r) {
    //var_dump($b);
    ?>
			<tr>
			<td><?php echo $r->id; ?></td>
				<td><?php echo $r->fullname; ?></td>
				<td><?php echo $r->product_name; ?></td>
				<td><?php echo $r->comment; ?></td>
				<td><?php echo $r->stars; ?></td>
			    <td>
					<?php if($r->approved == 0){ ?>
					<a href='<?php echo base_url(); ?>settings/approve_review/<?php echo $r->id; ?>/1'><img src="<?php echo base_url(); ?>images/icons/featured_on.png" alt="مفضلة" /></a>
					<?php } else { ?>
					<a href='<?php echo base_url(); ?>settings/approve_review/<?php echo $r->id; ?>/0'><img src="<?php echo base_url(); ?>images/icons/featured_off.png" alt="مفضلة" /></a>
					<?php } ?>
			    </td>
				<td><a href='<?php echo base_url(); ?>settings/delete_review/<?php echo $r->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png"  /></a></td>
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
