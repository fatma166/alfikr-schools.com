<div class="tab-pane fade" id="pills-grade" role="tabpanel" aria-labelledby="pills-grade-tab" tabindex="0">
                    <table id="gradeTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>المرحلة</th>
                            <th>الشعبة</th>
                            <th>الحالة</th>
                            <th>التقييم</th>
                            <th>تاريخ البداية</th>
                            <th>تاريخ الأنتهاء</th>
                          </tr>
                        </thead>
                        <tbody>
						<?php foreach($student_courses1 as $s){?>
                            <tr>
                                <td><?php foreach($courses as $cou){foreach($cou as $c){if($c->id == $s->course_id){foreach($courses_types as $type){foreach($type as $t){if($t->id == $c->course_type){echo $t->ar_name;}}}}}}?></td>
                                <td><?php foreach($courses as $cou){foreach($cou as $c){if($c->id == $s->course_id){echo $c->name;}}}?></td>
                                <td><?php if($s->is_finished == '0'){echo '<span class="status active"> مستمر</span>';} else{echo "منتهي";} ?></td>
                                <td><?php foreach($courses as $cou){foreach($cou as $c){if($c->id == $s->course_id){foreach($courses_reviews as $review){foreach($review as $r){if($r->course_id == $c->id){echo $r->comment;}}}}}}?></td>
                                <td><?php if($s->start_date == NULL){echo "--";} else{echo $s->start_date;} ?></td>
                                <td><?php if($s->end_date == NULL){echo "--";} else{echo $s->end_date;} ?></td>
                            </tr>
                        <?php }?>
                          
                        </tbody>
                      </table>
                </div>