<?php
if($keyword==''){
?>

<div class="col-md-6">
    <div class="widget widget-heading-simple widget-body-white">
        <!-- Widget heading -->
        <div class="widget-head">
            <h4 class="heading">Dealer Spike Web Lead Rules</h4>
        </div>
        <div class="widget-body">
            <div class="row">
                <div class="col-md-12">
                    <div style="">

                        <?php echo $this->Form->create('Contact', array('type' => 'post', 'class' => 'apply-nolazy', 'role' => "form")); ?>

                        <div class="checkbox">
                            <label class="checkbox-custom">
                                <input type="checkbox" id="ContactOpen"  <?php echo ($rules['open'] == true) ? 'checked="checked"' : "" ?>  class="chk_rules" name="data[Contact][open]" value="open" >
                                <i class="fa fa-fw fa-square-o"></i>  Open Rule first-come first served.
                            </label>
                        </div>

                        <div class="checkbox">
                            <label class="checkbox-custom">
                                <input type="checkbox" id="ContactDirect" <?php echo ($rules['direct'] == true) ? 'checked="checked"' : "" ?> class="chk_rules" name="data[Contact][direct]" value="direct" >
                                <i class="fa fa-fw fa-square-o"></i>   Direct Rule to assigned sales person:
                            </label>
                            <?php echo $this->Form->select('users_id', $users, array('value' => $rule_direct['Rule']['user_id'], 'class' => 'input-small', 'empty' => "Select")); ?>
                        </div>

                        <div class="checkbox">
                            <label class="checkbox-custom">
                                <input type="checkbox" id="ContactRoundRobin" <?php echo ($rules['round-robin'] == true) ? 'checked="checked"' : "" ?> class="chk_rules" name="data[Contact][round-robin]" value="round-robin" >
                                <i class="fa fa-fw fa-square-o"></i>
                                Round-Robin Rule assigned to logged in users in order of last received.
                                <a  href="#modal-2" id="dset_round_robin" data-toggle="modal" class="btn btn-default btn-stroke">Select employee</a>

                            </label>
                        </div>

                        <?php if ($rules['round-robin'] == 'On') { ?>
                            <?php if ($advanced_round_robin_dealer_setting["DealerSetting"]["value"] == 'On') { ?>
                                <?php //echo $this->element("round_robin_queue_table", array('round_table_data' =>$dealer_spike_round_data) ); ?>
                                <?php echo $this->element("round_robin_users_table", array('vendor_name' => 'Dealer Spike', 'rr_users' => $rr_users)); ?>
                            <?php } else { ?>

                                <h4>Round Robin Queue</h4>

                                <div class="text-right">
                                    <span class="text-warning">Sperson with no Vehicle: </span>
                                    <?php
                                    echo $this->Form->select('roundrobin_novehicle_dealer_spike', $all_active_users, array('vendor' => "dealer_spike",'value' => $RulesRoundrobinNovehicle_user_id, 'class' => 'input-small roundrobin_novehicle', 'empty' => "Select"));
                                    ?>
                                </div>

                                <table class="table table-striped table-responsive swipe-horizontal ">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Dealer</th>
                                            <th>Last Receive</th>
                                            <th>Last Login</th>
                                        </tr>
                                    </thead>
                                    <!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                        <?php echo $this->element("queue_table", array('weblead_queue_list' => $weblead_queue, 'tb_model_name' => 'WebleadQueue')); ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>

                                <div>Next Receive: <span class="text-primary"><?php echo $next_receive['User']['full_name']; ?> # <?php echo $next_receive['User']['id']; ?></span></div>

                            <?php } ?>
                        <?php } ?>

                        <div class="text-right">
                            <button type="submit" id="submit_rules" class="btn btn-primary">Save</button>
                        </div>

                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}else{
?>

<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading"><?php echo $title; ?> Web Lead Rules</h4>
				</div>
				<div class="widget-body">
						<div class="row">
							<div class="col-md-12">

						<div style="">

							<?php echo $this->Form->create('Contact', array('url'=>array('controller'=>'rules', 'action'=>'save_'.$keyword.'_rule'),'id'=>'Contact'.ucfirst($keyword).'Form', 'type'=>'post', 'class' => 'apply-nolazy', 'role'=>"form")); ?>

							<div class="checkbox">
								<label class="checkbox-custom">
									<input type="checkbox" id="Contact<?=ucfirst($keyword)?>Open"  <?php echo ($rules[$keyword.'_open'] == true)? 'checked="checked"' : "" ?>  class="<?=$keyword?>_chk_rules" name="data[Contact][<?=$keyword?>_open]" value="<?=$keyword?>_open" >
									<i class="fa fa-fw fa-square-o"></i>  Open Rule first-come first served.
								</label>
							</div>

							<div class="checkbox">
								<label class="checkbox-custom">
									<input type="checkbox" id="Contact<?=ucfirst($keyword)?>Direct" <?php echo ($rules[$keyword.'_direct'] == true)? 'checked="checked"' : "" ?> class="<?=$keyword?>_chk_rules" name="data[Contact][<?=$keyword?>_direct]" value="<?=$keyword?>_direct" >
									<i class="fa fa-fw fa-square-o"></i>   Direct Rule to assigned sales person:
								</label>
								<?php
                 echo $this->Form->select($keyword.'_users_id', $users, array('value' => $rule_direct['Rule']['user_id'], 'class' => 'input-small','empty'=>"Select")); ?>
							</div>

							<div class="checkbox">
								<label class="checkbox-custom">
									<input type="checkbox" id="Contact<?=ucfirst($keyword)?>RoundRobin" <?php echo ($rules[$keyword.'_round-robin'] == true)? 'checked="checked"' : "" ?> class="<?=$keyword?>_chk_rules" name="data[Contact][<?=$keyword?>_round-robin]" value="<?=$keyword?>_round-robin" >
									<i class="fa fa-fw fa-square-o"></i>
									Round-Robin Rule assigned to logged in users in order of last received.
									<a  href="#modal-2" id="dset_round_robin" data-toggle="modal" class="btn btn-default btn-stroke">Select employee</a>

								</label>
							</div>
							<?php if($rules[$keyword.'_round-robin'] == true){ ?>
								<?php if($advanced_round_robin_dealer_setting["DealerSetting"]["value"] == 'On'){ ?>
									<?php //echo $this->element("round_robin_queue_table", array('round_table_data' =>$dealer_spike_round_data) ); ?>
									<?php echo $this->element("round_robin_users_table", array('vendor_name' => $vendor_name, 'rr_users' =>$rr_users) ); ?>
								<?php	}else{ ?>

									<h4>Round Robin Queue</h4>

									<div class="text-right">
										<span class="text-warning">Sperson with no Vehicle: </span>
										<?php
echo $this->Form->select('roundrobin_novehicle_'.$keyword,$all_active_users, array('vendor'=>$keyword,'value'=>$RulesRoundrobinNovehicle_user_id, 'class' => 'input-small roundrobin_novehicle','empty'=>"Select"));
										?>
									</div>

            <table class="table table-striped table-responsive swipe-horizontal ">
                            <!-- Table heading -->
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Dealer</th>
                                    <th>Last Receive</th>
                                    <th>Last Login</th>
                                </tr>
                            </thead>
                            <!-- // Table heading END -->
                            <!-- Table body -->
                            <tbody>
                                <!-- Table row -->
<?php echo $this->element("queue_table", array('weblead_queue_list' => $weblead_queue, 'tb_model_name' => 'WebleadQueue')); ?>
                                <!-- // Table row END -->
                            </tbody>
                            <!-- // Table body END -->
                        </table>

									<div>Next Receive: <span class="text-primary"><?php echo $next_receive['User']['full_name']; ?> # <?php echo $next_receive['User']['id']; ?></span></div>

								<?php } ?>


							<?php } ?>


							<div class="text-right">
								<button type="submit" id="<?=$keyword?>_submit_rules" class="btn btn-primary">Save</button>
							</div>

							<?php echo $this->Form->end(); ?>

						</div>


							</div>
						</div>
				</div>
			</div>
		</div>

<?php
}
?>