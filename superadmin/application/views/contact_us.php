
<?php $this->load->view('template/body'); ?>

<style>
.not_seen{
		background: darkseagreen;
		color: #000;
		
	}
</style>
<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>الرسائل</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				الرسائل
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
				<th>البريد الالكتروني</th>
				<th>عرض</th>
				<th>حذف</th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($contact_us as $o) {
    //var_dump($b);
    ?>
			<tr <?php if($o->seen == 0 ){ ?>class="not_seen"<?php } ?>>
				<td><?php echo $o->id; ?></td>
				<td><?php echo $o->name; ?></td>
				<td><?php echo $o->email; ?></td>
				<td><a href="<?php echo base_url(); ?>home/view_contact_us/<?php echo $o->id; ?>">عرض</a></td>
				
				<td><a href='<?php echo base_url(); ?>home/delete_contact_us/<?php echo $o->id; ?>'><img src="<?php echo base_url(); ?>images/icons/delete.png"  /></a></td>
		
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
