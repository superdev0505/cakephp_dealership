										
<?php
 if($logged_active_round_robin == 'On'){ ?>
	<?php foreach ($weblead_queue_list as $w_q) { ?>
	<tr class="gradeA">
		<td><?php echo $w_q['User']['full_name']; ?> # <?php echo $w_q['User']['id']; ?>&nbsp;</td>
		<td><?php echo $w_q[$tb_model_name]['dealer_id']; ?>&nbsp;</td>
		<td><?php echo ($w_q[$tb_model_name]['last_receive'] != null) ? date("m/d/Y g:i A",strtotime($w_q[$tb_model_name]['last_receive'])) : ""; ?>&nbsp;</td>
		<td><?php echo date("m/d/Y g:i A",strtotime($w_q[$tb_model_name]['last_login'])); ?>&nbsp;</td>
	</tr>
	<?php } ?>
<?php }else{ ?>
	<?php foreach ($weblead_queue_list as $w_q) { ?>
	<tr class="gradeA">
		<td><?php echo $w_q['User']['first_name']." ".$w_q['User']['last_name']; ?> # <?php echo $w_q['User']['id']; ?>&nbsp;</td>
		<td><?php echo $w_q['User']['dealer_id']; ?>&nbsp;</td>
		<td><?php echo ($w_q['User']['last_receive'] != null) ? date("m/d/Y g:i A",strtotime($w_q['User']['last_receive'])) : ""; ?>&nbsp;</td>
		<td><?php echo ($w_q['User']['last_login'])? date("m/d/Y g:i A",strtotime($w_q['User']['last_login'])) : "" ; ?>&nbsp;</td>
	</tr>
	<?php } ?>
<?php } ?>