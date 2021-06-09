

<div class="row">
	<div class="col-md-12">
		<span class="text-primary">Select Recipient Type: &nbsp;</span>
			<?php echo $this->Form->input('recipient_type', array('options' =>
			array('list'=>' From List &nbsp;', 'lead' =>' From Leads '),  'type' => 'radio', 'value' => 'lead')); ?>
		<div class="separator"><hr></div>
	</div>
</div>


<div class="row" id="recipient_list_container" style="display: none">
	<div class="col-md-12">
		<?php echo $this->Form->label('list_id','Recipient List'); ?>
		<br>
		<?php
			echo $this->Form->input('list_id', array(
				'type' => 'select',
				'empty' => "Select",
				'options' => $list_option,
				'label'=>false,'div'=>false,'class'=>'form-control'
			));
        ?>
	</div>
</div>

<div id="recipient_search_container" >




	<div class="widget widget-body-white">
		<div class="widget-body">

			<div class="row">

				<div class="col-md-7">

					<h4>Search Recipient</h4>


					<input type='hidden' name='s_d_range' value='<?php echo date("Y-m-d",strtotime("-1 month")); ?>' id = 's_d_range'>
					<input type='hidden' name='e_d_range' value='<?php echo date("Y-m-d",strtotime("now")); ?>' id = 'e_d_range'>

					<input type='hidden' name='multiple_added_search'  id = 'multiple_added_search'>


					<?php  echo $this->Form->label('search_lead_type', 'Lead Type: &nbsp;');
					echo $this->Form->input('search_lead_type', array(
					'div' => false,
					'options' => array('All'=>'All', 'Open'=>'Open', 'Closed'=>'Closed','Sold'=>'Sold'),
					'class' => 'form-control',
					'label' => false,
					'style' => 'width: auto'), array('div' => false));
					?>

					&nbsp; &nbsp;

					<?php
					echo $this->Form->label('search_status_header','Status Header: &nbsp;');
					echo $this->Form->select('search_status_header', $lead_status_headers, array(
						'empty' => 'Select',
						'value'=>$search_status_header,
						'label'=>false, 'class' => 'form-control selectpicker','style'=>''));
					?>
					<br><br>

					<?php
					echo $this->Form->label('search_status','Status: &nbsp;');
					echo $this->Form->select('search_status',  null , array(
						'name'=>'search_status',
						'empty' => 'Select',
						'label'=>false,'div'=>false,
						'class' => 'form-control selectpicker','style'=>''
					));
					?>
					&nbsp; &nbsp;
					<?php echo $this->Form->label('search_sales_step','Step:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_sales_step',array(
						'type'=>'select',
						'options'=> $SalesStep,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						));
					?>
					&nbsp;&nbsp;
                    <?php echo $this->Form->label('search_type','Category:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_type',array(
						'type'=>'text',
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'style' => 'width: auto'
						));
					?>
					<div class="separator"></div>
					<?php
					$est_payment_options = array();
					for($i=0; $i<=19; $i++){
						$st = $i*100;
						$lt = $st+100;
						$est_payment_options[ "$".$st."-"."$".$lt ] = "$".$st."-"."$".$lt;
					}

					echo $this->Form->label('search_est_payment_search','Payment:  &nbsp;');
					echo $this->Form->input('search_est_payment_search',array('options'=>$est_payment_options,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						));
					?>
					&nbsp; &nbsp;
					<?php echo $this->Form->label('search_source','Source:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_source',array(
						'type'=>'select',
						'options'=> $lead_sources_options,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						));
					?>
					<div class="separator"></div>
					<?php  echo $this->Form->label('search_zip', 'Zip: &nbsp;');
					echo $this->Form->input('search_zip', array(
					'div' => false,
					'class' => 'form-control',
					'label' => false,
					'style' => 'width: auto'), array('div' => false));
					?>

					<!-- /* Form Select for search_make */-->
					&nbsp; &nbsp;
					<?php echo $this->Form->label('search_make','Make:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_make',array(
						'type'=>'select',
						'options'=> $makeOptions,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						));
					?>

					<div class="separator"></div>

					<div class="row">
						<div class="col-md-3">
							<?php  echo $this->Form->label('search_model', 'Model: &nbsp;');
							echo $this->Form->input('search_model', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'style' => 'width: auto'), array('div' => false));
							?>
						</div>

						<div class="col-md-4">
							<?php
							if(in_array(AuthComponent::user('group_id'),array('2','4','6','7','9','12','13'))){

							 echo $this->Form->label('search_user_id','Sales Person:', array('class'=>'strong'));
								echo $this->Form->input('search_user_id',array(
								'type'=>'select',
								'options'=> $spersons,
								'div' => false,
								'style' => 'width: 100%',
								'class' => 'form-control',
								'label' => false,
								'empty'=>'All',
								));
							}else{
								echo $this->Form->input('search_user_id', array("type"=>'hidden'));
							}
							?>
						</div>


						<div class="col-md-5">
							Period:
							<div id="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
								<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
								<span>
									<?php echo date("F j, Y",strtotime("-1 month")); ?> - <?php echo date("F j, Y",strtotime("now")); ?>
									<b class="caret"></b>
								</span>
							</div>
						</div>
					</div>



					<div class="separator"></div>



					<?php  echo $this->Form->label('search_name', 'Search Name: &nbsp;');
					echo $this->Form->input('search_name', array(
					'div' => false,
					'class' => 'form-control',
					'label' => false,
					'style' => 'width: auto'), array('div' => false));
					?> &nbsp; &nbsp;


					<button type="button" id="btn_do_equity_search" class="btn btn-primary btn-sm">Search</button> &nbsp;
					<button type="button" id="btn_reset_equity_search" class="btn btn-warning btn-sm">Reset</button> &nbsp;
					<button type="button" id="btn_save_equity_search" class="btn btn-primary btn-sm">Save Search</button>

					&nbsp;&nbsp;&nbsp;

					<button type="button" id="btn_add_this_search" class="btn btn-primary btn-sm">
						Add This Search
						<i class="fa fa-arrow-right"></i>
					</button>



				</div>

				<div class="col-md-5">
					<h4>Saved Search</h4>
					<div id="saved_search" class="innerAll" style="max-height: 241px; overflow: auto; border: 1px solid #e2e1e1;">

						<?php foreach ($marketingEquitySearches as $marketingEquitySearch) { ?>
						<span style="margin-top: 5px; font-size: 90%"	data-searchid="<?php echo $marketingEquitySearch['EblastAppSearch']['id']; ?>" class="label label-primary label-stroke">
							<a  onclick="do_equity_search('<?php echo $marketingEquitySearch['EblastAppSearch']['id']; ?>', event, 'eblast')" class="equity_searches no-ajaxify" href="#" >[M]
								<u><?php echo $marketingEquitySearch['User']['full_name']; ?> - <?php echo $marketingEquitySearch['EblastAppSearch']['search_name']; ?>
								</u>
							</a>
							&nbsp; &nbsp;
							<a class="remove_equity_searches" href="#" onclick="remove_equity_search('<?php echo $marketingEquitySearch['EblastAppSearch']['id']; ?>','eblast')"
							 class="btn btn-xs btn-danger">X</a>
						</span>

						<?php } ?>

						<?php foreach ($equitySearches as $equitySearch) { ?>
						<span style="margin-top: 5px; font-size: 90%"	data-searchid="<?php echo $equitySearch['EquitySearch']['id']; ?>" class="label label-primary label-stroke">
							<a  onclick="do_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>', event, 'equity')" class="equity_searches no-ajaxify" href="#" >[Eq]
								<u><?php echo $equitySearch['User']['full_name']; ?> - <?php echo $equitySearch['EquitySearch']['search_name']; ?></u>
							</a>
							&nbsp; &nbsp;
							<a class="remove_equity_searches" href="#" onclick="remove_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>','equity')"
							 class="btn btn-xs btn-danger">X</a>
						</span>

						<?php } ?>

					</div>

					<div class="separator"></div>
					<div class="separator"></div>

					<div class="widget">
						<div class="widget-head">
							<h4 class="heading glyphicons search"><i></i>Added Search</h4>
						</div>
						<div class="widget-body list">
							<ul id="list_added_searches">
							</ul>
						</div>
					</div>



				</div>


			</div>

		</div>
	</div>


	<div class="widget widget-body-white">
		<div class="widget-body">
			<div id="equity_search_result">
			</div>
		</div>
	</div>




</div>
