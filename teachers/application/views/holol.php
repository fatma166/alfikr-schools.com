<?php $this->load->view('template/body'); ?>

<script>
function fetch_books(id){
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>holol/fetch_books",
                data: {'id': id}

            }).done(function (msg) {
                    document.getElementById('books_view').innerHTML = msg;
            });
}



function fetch_book_sections(id){
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>holol/fetch_book_sections",
                data: {'id': id}

            }).done(function (msg) {
                    document.getElementById('sections_view').innerHTML = msg;
            });
}


function fetch_section_conetents(id){
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>holol/fetch_book_sections",
                data: {'id': id}

            }).done(function (msg) {
                    document.getElementById('contents_view').innerHTML = msg;
            });
}



</script>









<select name="main_books" id="main_books" class="form-control" onchange="fetch_books(this.value)" >
	<option value="0">الرجاء اختيار القسم الرئيسي</option>
	<option value="1">IQ</option>
	<option value="2">Math</option>
	<option value="3">Geometry</option>
</select><br />
<span id='books_view'></span><Br />
<span id='sections_view'></span>
<span id='conetnts_view'></span>


<?php $this->load->view('template/footer'); ?>