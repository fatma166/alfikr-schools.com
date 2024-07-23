<?php $this->load->view('template/body'); ?>
<script>
function change_ordering(ordering, id){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/change_ordering",
                data: {'ordering': ordering, 'id': id}

            }).done(function (msg) {
                   alert("تمت التغييرات");
            });
}

function useful_links(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/useful_links",
                data: {'value': value, 'id': id}

            }).done(function (msg) {
                   
            });
}


function top_menu(id, value){
		   //console.log(categories_array);
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>pages/top_menu",
                data: {'id': id, 'value': value}

            }).done(function (msg) {
                   
            });
}

</script>
       
<div
          class="header__page d-flex justify-content-between align-items-start flex-row flex-wrap w-100"
        >
          <div class="title_page">
            <h2>الصفحات</h2>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href=""><i class="mdi mdi-home-outline"></i> الرئيسية </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  القسم الإداري
                </li>
                <li class="breadcrumb-item active" aria-current="page">
				الصفحات
                </li>
              </ol>
            </nav>
          </div>
          <div
            class="actions_page d-flex justify-content-start align-otems-center flex-row gap-2 flex-wrap"
          >

            <a href="<?php echo base_url(); ?>pages/new_page" class="add_student">
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
              <span> صفحة جديدة </span>
            </a>
          </div>
        </div>
		<table id="example" class="display" style="width: 100%">
            <thead>
              <tr>
			  	<th><?php echo $words["id"]; ?></th>
				<th><?php echo $words["arabic_name"]; ?></th>
				<th><?php echo $words["english_name"]; ?></th>
				<th>روابط مهمة</th>
				<th>القائمة العلوية</th>
				<th>الترتيب</th>
				<th></th>
              </tr>
            </thead>
            <tbody>
			<?php
foreach ($pages as $c) {
    //var_dump($b);
    ?>
              <tr>
			  	<td><?php echo $c->id; ?></td>
				<td><?php echo $c->ar_name; ?></td>
				<td><?php echo $c->en_name; ?></td>
				<td>
				    <input type="checkbox" <?php if($c->useful_links == 1){ ?>checked<?php } ?> value="<?php echo $c->id; ?>"  class="js-switch" onchange="useful_links(<?php echo $c->id; ?>,<?php if($c->useful_links == 1){ ?>0<?php }else{ ?>1<?php } ?>)"   /> 
				</td>
				<td>
				     <input type="checkbox" <?php if($c->top_menu == 1){ ?>checked<?php } ?> value="<?php echo $c->id; ?>"  class="js-switch" onchange="top_menu(<?php echo $c->id; ?>,<?php if($c->top_menu == 1){ ?>0<?php }else{ ?>1<?php } ?>)"  /> 
				</td>
				<td><input type="text" name="ordering"  onchange="change_ordering(this.value, <?php echo $c->id; ?>)" value="0" style="width: 50px;" /></td>
				<td>
				    <a href="<?php echo base_url(); ?>settings/delete/pages/<?php echo $c->id; ?>" onclick="return confirm('هل تريد حقاً حذف هذه الصفحة');" class="btn btn-danger"><span class="fa fa-trash"></span></a>
					<a href="<?php echo base_url(); ?>pages/edit/<?php echo $c->id; ?>" class="btn btn-warning" alt="تعديل"><span class="fa fa-edit"></span></a>
				</td>
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
