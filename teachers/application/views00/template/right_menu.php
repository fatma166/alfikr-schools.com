<?php
function is_should_show_list($key, $no = 2)
{
    if ($key == 0) {
        $names = ['master/students_page','master/lessons_timetable','master/teachers_files','master/teacher_comments_page','master/questions_bank','master/messages_box','master/exams','master/main_subjects','exam/index','questionBank/index'];
    }
    foreach ($names as $one) {
      if ($no = 1) {
        if ($_SERVER['REQUEST_URI'] == config_item('custom_suffix_url') . $one) {
          return 'show';
        }
      } else {
        if ($_SERVER['REQUEST_URI'] == config_item('custom_suffix_url') . $one) {
          return 'true';
        } else {
          return 'false';
        }

      }
    }
}
?>
<aside class="d-lg-flex d-none">
      <div
        class="sidebar_header d-flex justify-content-between flex-row align-items-center"
      >
        <div class="menu_">
          <img
            src="<?php echo base_url(); ?>../assets/images/menu.svg"
            alt="menu"
            height="24"
            height="24"
          />
        </div>
        <div class="logo_img">
          <img
            src="<?php echo base_url(); ?>../assets/images/logo.png"
            alt="logo"
            width="80"
            height="80"
          />
        </div>
      </div>
      <div class="links__aside">
				<ul class="p-0">
            <li>
              <a href="<?php echo base_url(); ?>home" style="color: #da3837; font-weight: bold">
                <img src="<?php echo base_url(); ?>../assets/images/home.svg" alt="" style="margin-inline-end: 5px">
                الصفحة الرئيسية
              </a>
            </li>
        </ul>
        <div class="accordion accordion-flush" id="accordionFlushExample">
		<?php $i = 1;?>
		<?php foreach ($right_menu as $key => $m) {?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapse<?php echo $i; ?>"
                aria-expanded="<?php echo is_should_show_list($key) ?>"
                aria-controls="flush-collapseOne"
              >
                <img
                  src="<?php echo base_url(); ?>../assets/images/<?php echo $m->icon; ?>"
                  alt="book"
                  width="24"
                  height="24"
                  loading="lazy"
                />
                <?php echo $m->ar_title; ?>
              </button>
            </h2>
            <div
              id="flush-collapse<?php echo $i; ?>"
              class="accordion-collapse collapse <?php echo is_should_show_list($key, 1) ?>"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <ul>
				<?php foreach ($m->children as $c) {?>
                      <?php if ($c->id != 32) {?>
                  <li>
                    <a href="<?php echo base_url(); ?><?php echo $c->link; ?>" <?php echo $_SERVER['REQUEST_URI'] == config_item('custom_suffix_url') . $c->link ? 'class="active"' : '' ?>> <?php echo $c->ar_title; ?> </a>
                  </li>
                  <?php }?>
                      <?php }?>
                </ul>
              </div>
            </div>
          </div>
		<?php $i++;?>
		<?php }?>


        </div>
      </div>
      <div class="logout__">
        <button onclick="location.href='<?php echo base_url(); ?>login/logout'">
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M15.2395 22.27H15.1095C10.6695 22.27 8.52953 20.52 8.15953 16.6C8.11953 16.19 8.41953 15.82 8.83953 15.78C9.23953 15.74 9.61953 16.05 9.65953 16.46C9.94953 19.6 11.4295 20.77 15.1195 20.77H15.2495C19.3195 20.77 20.7595 19.33 20.7595 15.26V8.74C20.7595 4.67 19.3195 3.23 15.2495 3.23H15.1195C11.4095 3.23 9.92953 4.42 9.65953 7.62C9.60953 8.03 9.25953 8.34 8.83953 8.3C8.41953 8.27 8.11953 7.9 8.14953 7.49C8.48953 3.51 10.6395 1.73 15.1095 1.73H15.2395C20.1495 1.73 22.2495 3.83 22.2495 8.74V15.26C22.2495 20.17 20.1495 22.27 15.2395 22.27Z"
              fill="#292D32"
            />
            <path
              d="M15.0001 12.75H3.62012C3.21012 12.75 2.87012 12.41 2.87012 12C2.87012 11.59 3.21012 11.25 3.62012 11.25H15.0001C15.4101 11.25 15.7501 11.59 15.7501 12C15.7501 12.41 15.4101 12.75 15.0001 12.75Z"
              fill="#292D32"
            />
            <path
              d="M5.85043 16.1C5.66043 16.1 5.47043 16.03 5.32043 15.88L1.97043 12.53C1.68043 12.24 1.68043 11.76 1.97043 11.47L5.32043 8.12C5.61043 7.83 6.09043 7.83 6.38043 8.12C6.67043 8.41 6.67043 8.89 6.38043 9.18L3.56043 12L6.38043 14.82C6.67043 15.11 6.67043 15.59 6.38043 15.88C6.24043 16.03 6.04043 16.1 5.85043 16.1Z"
              fill="#292D32"
            />
          </svg>
          <span style="font-size: 20px !important"> تسجيل خروج </span>
        </button>
      </div>
    </aside>
