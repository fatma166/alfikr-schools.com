<div class="exam__layout">
<div class="exams">
	<div class="container">
		<div
			class="exam__title d-flex justify-content-between align-items-start flex-row gap-3 mb-5"
		>
			<div>
				<h1><?php echo $query[0]['title']?></h1>
				<span> <sup>*</sup> تابع الملاحظات الاّتية </span>
			</div>
			<div>
				<h3>مدة الأمتحان : <span><?php echo $query[0]['minutes']?> دقيقة </span></h3>
				<h3>اسم المدرس : <span> <?php if( isset($teacher[0]['full_name'])) echo $teacher[0]['full_name']?> </span></h3>
			</div>
		</div>
		<ul
			class="d-flex justify-content-start flex-column align-items-start gap-3 list__notes"
		>
			<li class=""><?php echo $query[0]['details'] ?></li>

		</ul>
		<div class="next_to_exam">
			<a href="<?php echo base_url().'exam/perview_exam/'.$query[0]['id']?>" class=""> ابدأ الأمتحان </a>
		</div>
	</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
