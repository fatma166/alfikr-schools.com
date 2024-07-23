<div class="tab-pane fade" id="pills-numbers" role="tabpanel" aria-labelledby="pills-numbers-tab" tabindex="0">
                    <table id="numbersTable" class="display" style="width: 100%">
                        <thead>
                          <tr>
                            <th>التاريخ</th>
                            <th>الدفعة</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($payments as $p){ ?>
	<tr>
		<td><?php echo $p->date; ?></td>
		<td><?php echo $p->amount; ?></td>
	</tr>
	<?php  } ?>
                        </tbody>
                      </table>
                </div>