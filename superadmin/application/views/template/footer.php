
        <script src="<?php echo base_url(); ?>../assets/js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo base_url(); ?>../assets/js/bootstrap.min.js"></script>
    
    
    <script src="<?php echo base_url(); ?>../assets/js/datatable.js"></script>
    <script src="cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    
    <script>
        $(document).ready(function () {
          var table = $("#gradeTable").DataTable({
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
    <script>
        $(document).ready(function () {
          var table = $("#activityTable").DataTable({
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
    <script>
        $(document).ready(function () {
          var table = $("#numbersTable").DataTable({
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
    <script>
        $(document).ready(function () {
          var table = $("#sanctionsTable").DataTable({
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
    <script>
        $(document).ready(function () {
          var table = $("#filesTable").DataTable({
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
    <script>
        $(document).ready(function () {
          var table = $("#examsTable").DataTable({
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
    <script>
        $(document).ready(function () {
          var table = $("#audienceTable").DataTable({
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
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var addFileBtn = document.querySelector('.add_file_btn');
          var addFileDiv = document.querySelector('.add_file');
        
          addFileBtn.addEventListener('click', function() {
            addFileDiv.style.display = addFileDiv.style.display === 'none' ? 'block' : 'none';
            addFileBtn.style.display = 'none';
          });
        });
        </script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
              var addFileBtn = document.querySelector('.add_file_btn');
              var addFileDiv = document.querySelector('.add_file');
              var saveButton = document.querySelector('.btn__save__file button');
          
              addFileBtn.addEventListener('click', function() {
                  // Toggle the visibility of add_file
                  addFileDiv.style.display = addFileDiv.style.display === 'none' ? 'block' : 'none';
              });
          
              saveButton.addEventListener('click', function() {
                  // Hide the add_file div when the "حفظ" button is clicked
                  addFileDiv.style.display = 'none';
                  addFileBtn.style.display = 'flex';
              });
          });
          </script>
  </body>
</html>
