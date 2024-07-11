<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>المرحل الدراسية</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div style="background-color: #f1f1f1; padding: 10px; border: solid 1px #ccc;">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="text-align: right">المرحلة</th>
                            <th style="text-align: right">الشعبة</th>
                            <th style="text-align: right">الحالة</th>
                            <th style="text-align: right">التقييم</th>
                            <th style="text-align: right">تاريخ البداية</th>
                            <th style="text-align: right">تاريخ الانتهاء</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach($student_courses1 as $s){?>
                            <tr>
                                <td><?php foreach($courses as $cou){foreach($cou as $c){if($c->id == $s->course_id){foreach($courses_types as $type){foreach($type as $t){if($t->id == $c->course_type){echo $t->ar_name;}}}}}}?></td>
                                <td><?php foreach($courses as $cou){foreach($cou as $c){if($c->id == $s->course_id){echo $c->name;}}}?></td>
                                <td><?php if($s->is_finished == '0'){echo "مستمر";} else{echo "منتهي";} ?></td>
                                <td><?php foreach($courses as $cou){foreach($cou as $c){if($c->id == $s->course_id){foreach($courses_reviews as $review){foreach($review as $r){if($r->course_id == $c->id){echo $r->comment;}}}}}}?></td>
                                <td><?php if($s->start_date == NULL){echo "--";} else{echo $s->start_date;} ?></td>
                                <td><?php if($s->end_date == NULL){echo "--";} else{echo $s->end_date;} ?></td>
                            </tr>
                        <?php }?>
                    </tbody>            
                </table>
            </div>
        </div>
    </div>
</div>