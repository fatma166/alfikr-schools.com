<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>المرحلة الدراسية الحالية</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div style="background-color: #f1f1f1; padding: 10px; border: solid 1px #ccc;">
                <table class="table">
                    <tr>
                        <td><h2>المرحلة الدراسية: <?php echo $course_type[0]->ar_name;?></h2></td>
                    </tr>                
                </table>
                <table class="table">
                    <tr>
                        <td><h2>الشعبة: <?php echo $course[0]->name;?></h2></td>
                    </tr>               
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>المرحلة الدراسية السابقة</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div style="background-color: #f1f1f1; padding: 10px; border: solid 1px #ccc;">
                <table class="table">
                    <tr>
                        <td><h2>المرحلة الدراسية: <?php echo $previous_course_type[0]->ar_name;?></h2></td>
                    </tr>                
                </table>
                <table class="table">
                    <tr>
                        <td><h2>الشعبة: <?php echo $previous_course[0]->name;?></h2></td>
                    </tr>               
                </table>
                <table class="table">
                    <tr>
                        <td><h2>التقييم: <?php echo $previous_course_review[0]->comment;?></h2></td>
                    </tr>               
                </table>
            </div>
        </div>
    </div>
</div>
        