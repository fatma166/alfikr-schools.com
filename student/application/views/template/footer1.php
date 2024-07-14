<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/datatable.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdownMenuButton1');
        const dropdownMenu = document.querySelector('.notification-menu');

        dropdownButton.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target) && !dropdownButton.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    });
</script>
<script>
   /* $(document).ready(function () {
        var isSmallScreen = $(window).width() <= 500;
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
            scrollX: true,
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
        $(window).resize(function () {
            if ($(window).width() <= 500) {
                table.columns.adjust().draw();
            }
        });
    });*/
</script>
<script>
   /* $(document).ready(function () {
        var isSmallScreen = $(window).width() <= 500;
        var table = $("#allExamsTable").DataTable({
            dom:
                "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
                "<'row'<'col-sm-12 table_layout'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"],
            ],
            responsive: true,
            scrollX: true,
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
        $(window).resize(function () {
            if ($(window).width() <= 500) {
                table.columns.adjust().draw();
            }
        });
    });*/
</script>
<script>
   /* $(document).ready(function () {
        var isSmallScreen = $(window).width() <= 500;
        var table = $("#todayExamsTable").DataTable({
            dom:
                "<'row'<'col-sm-12 col-md-6 length_'l><'col-sm-12 col-md-6 search_'f>>" +
                "<'row'<'col-sm-12 table_layout'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"],
            ],
            responsive: true,
            scrollX: true,
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
        $(window).resize(function () {
            if ($(window).width() <= 500) {
                table.columns.adjust().draw();
            }
        });
    });*/
</script>
