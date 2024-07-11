<?php $this->load->view('template/head'); ?>
<script>
		function fetch_word(text, div_id, lang){
		   //console.log(categories_array);
           $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>settings/display",
                data: {'word': word, 'lang': lang}

            }).done(function (msg) {
                    document.getElementById(div_id).innerHTML = msg;
            });
		}


</script>


<body class="hold-transition light-skin sidebar-mini theme-primary fixed rtl" style="margin-top: 50px;">
	<!-- Main content -->
	