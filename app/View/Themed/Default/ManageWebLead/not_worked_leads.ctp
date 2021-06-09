<br><br><br><br>

<style>
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
	
}
</style>


<div class='innerLR'>








<!-- Direct leads start -->


	<div class="widget widget-body-white">
		<div class="widget-head">
			<h4 class="heading">Web Leads Direct Not Touched</h4>
		</div>
		<div class="widget-body">
			<div class="row">
				<div class="col-md-12">

	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse'>
			<th>Staff</th>
			<th>Web leads Arrived</th>
			<th>Web leads Worked</th>
			<th>Web leads not worked</th>
			<th>Postion</th>
			<th>Lead Type</th>
		</tr>
		</thead>
		<tbody>
		<?php

		$total_web_lead = array(
			'lead_arrived' => 0,
			'lead_worked' => 0,
			'lead_notworked' => 0,
		);

		$user_lead_arrived = array();
		$user_lead_worked = array();
		$user_lead_notworked = array();
		

		 foreach($direct_web_lead_stats as $key=>$contact) { ?>
		<tr class="gradeA">

			<td><?php echo $contact['sperson']; ?></td>
			<td>
				<?php 

				//debug($contact);

				if (isset($contact['lead_arrived'])){ 
				 		echo $this->html->link($contact['lead_arrived'], array('action'=>'stat_details',"?"=>array('type'=>'lead_arrived_direct','user_id'=>$key)), 
				 		array('class'=>'stat_popup no-ajaxify') ) ; 
				 		$total_web_lead['lead_arrived'] += $contact['lead_arrived'];
				 		$user_lead_arrived[] = $key;

					} 
				?>
			</td>
			<td>
				<?php if (isset($contact['lead_worked'])){
				 	echo $this->html->link($contact['lead_worked'], array('action'=>'stat_details',"?"=>array('type'=>'lead_worked_direct','user_id'=>$key)) , 
					array('class'=>'stat_popup no-ajaxify') );
					$total_web_lead['lead_worked'] += $contact['lead_worked'];
					$user_lead_worked[] = $key;	 
				}

				?>
			</td>

			<td <?php  if( isset($contact['lead_notworked']) && $contact['lead_notworked'] <= 5 ){ 
				//echo " style = 'background: rgb(252,228,214) ' " ; 
					echo "class='text-danger'";
				} else if( isset($contact['lead_notworked']) && $contact['lead_notworked'] > 5 ) {  
				 //echo " style = 'background: #ab7a4b' "  ;     
					echo "class='text-danger'";
				  }     
				  ; ?>     >

				<?php if (isset($contact['lead_notworked'])) {
				 	echo $this->html->link($contact['lead_notworked'], array('action'=>'stat_details',"?"=>array('type'=>'lead_notworked_direct','user_id'=>$key)) , 
				 	array('class'=>'stat_popup no-ajaxify text-danger') ) ;
				 	$total_web_lead['lead_notworked'] += $contact['lead_notworked'];
				 	$user_lead_notworked[] = $key;
				}

				  ?>
			</td>
			<td><?php echo $contact['group']; ?></td>
			<td>Web XML</td>

		</tr>
		<?php } ?>

		<tr>
			<td><strong>Total</strong></td>
			<td><strong><?php  

			echo ($total_web_lead['lead_arrived']!= 0)?  $this->html->link( $total_web_lead['lead_arrived'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_arrived_direct','user_id'=> implode(',', $user_lead_arrived)  )), 
			array('class'=>'stat_popup no-ajaxify') ) : "" ; 

			?></strong></td>
			<td><strong><?php  
				echo ($total_web_lead['lead_worked']!= 0)?  $this->html->link( $total_web_lead['lead_worked'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_worked_direct',
					'user_id'=> implode(',', $user_lead_worked)  )),array('class'=>'stat_popup no-ajaxify') )
				: "";
				 ; 

			?></strong></td>
			<td  <?php  
			if($total_web_lead['lead_notworked'] > 0 && $total_web_lead['lead_notworked'] <= 5  ){
				//echo " style = 'background: rgb(252,228,214) ' " ;  
				echo "class='text-danger'";
			}else if( $total_web_lead['lead_notworked'] > 5  ){
				//echo " style = 'background: #ab7a4b' "  ;
				echo "class='text-danger'";
			}
			 ?>   >
				<strong><?php  
				echo ($total_web_lead['lead_notworked']!= 0)?  $this->html->link( $total_web_lead['lead_notworked'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_notworked_direct',
					'user_id'=> implode(',', $user_lead_notworked)  )),array('class'=>'stat_popup no-ajaxify text-danger') ) : "" ; 

				?>

			</strong></td>
			<td><strong></strong></td>
			<td><strong></strong></td>
		</tr>

		</tbody>
	</table>

				</div>	
			</div>
		</div>
	</div>



<!-- Direct leads ends -->




<!-- Direct and push starts -->

	<div class="widget widget-body-white">
		<div class="widget-head">
			<h4 class="heading">Web Leads Pushed Not Touched</h4>
		</div>
		<div class="widget-body">
			<div class="row">
				<div class="col-md-12">

	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse'>
			<th>Staff</th>
			<th>Web leads Arrived</th>
			<th>Leads Pushed To</th>
			<th>Pushed to Staff</th>
			<th>Web leads Worked</th>
			<th>Web leads not worked</th>
			<th>Postion</th>
			<th>Lead Type</th>
		</tr>
		</thead>
		<tbody>
		<?php

		$total_web_lead = array(
			'lead_arrived' => 0,
			'lead_pushedto' => 0,
			'lead_pushed_to_staff' => 0,
			'lead_worked' => 0,
			'lead_notworked' => 0,
		);

		$user_lead_arrived = array();
		$user_lead_pushedto = array();
		$user_lead_pushed_to_staff = array();
		$user_lead_worked = array();
		$user_lead_notworked = array();
		

		 foreach($combine_web_lead_stats as $key=>$contact) { ?>
		<tr class="gradeA">

			<td><?php echo $contact['sperson']; ?></td>
			<td>
				<?php 

				//debug($contact);

				if (isset($contact['lead_arrived'])){ 
				 		echo $this->html->link($contact['lead_arrived'], array('action'=>'stat_details',"?"=>array('type'=>'lead_arrived','user_id'=>$key)), 
				 		array('class'=>'stat_popup no-ajaxify') ) ; 
				 		$total_web_lead['lead_arrived'] += $contact['lead_arrived'];
				 		$user_lead_arrived[] = $key;

					} 
				?>
			</td>
			<td><?php if (isset($contact['lead_pushedto'])){
				 		echo $this->html->link($contact['lead_pushedto'], array('action'=>'stat_details',"?"=>array('type'=>'lead_pushedto','user_id'=>$key)), 
				 		array('class'=>'stat_popup no-ajaxify') );
				 		$total_web_lead['lead_pushedto'] += $contact['lead_pushedto'];
				 		$user_lead_pushedto[] = $key;
				 	}
				?>
			</td>
			<td><?php if (isset($contact['lead_pushed_to_staff'])){
						echo $this->html->link($contact['lead_pushed_to_staff'], array('action'=>'stat_details',"?"=>array('type'=>'lead_pushed_to_staff','user_id'=>$key)), 
						array('class'=>'stat_popup no-ajaxify') );
						$total_web_lead['lead_pushed_to_staff'] += $contact['lead_pushed_to_staff'];
						$user_lead_pushed_to_staff[] = $key;
					}
				?>
			</td>

			<td>
				<?php if (isset($contact['lead_worked'])){
				 	echo $this->html->link($contact['lead_worked'], array('action'=>'stat_details',"?"=>array('type'=>'lead_worked','user_id'=>$key)) , 
					array('class'=>'stat_popup no-ajaxify') );
					$total_web_lead['lead_worked'] += $contact['lead_worked'];
					$user_lead_worked[] = $key;	 
				}

				?>
			</td>

			<td <?php  if( isset($contact['lead_notworked']) && $contact['lead_notworked'] <= 5 ){ 
				//echo " style = 'background: rgb(252,228,214) ' " ; 
					echo "class='text-danger'";
				} else if( isset($contact['lead_notworked']) && $contact['lead_notworked'] > 5 ) {  
				 //echo " style = 'background: #ab7a4b' "  ;     
					echo "class='text-danger'";
				  }     
				  ; ?>     >

				<?php if (isset($contact['lead_notworked'])) {
				 	echo $this->html->link($contact['lead_notworked'], array('action'=>'stat_details',"?"=>array('type'=>'lead_notworked','user_id'=>$key)) , 
				 	array('class'=>'stat_popup no-ajaxify text-danger') ) ;
				 	$total_web_lead['lead_notworked'] += $contact['lead_notworked'];
				 	$user_lead_notworked[] = $key;
				}

				  ?>
			</td>
			<td><?php echo $contact['group']; ?></td>
			<td>Web XML</td>

		</tr>
		<?php } ?>

		<tr>
			<td><strong>Total</strong></td>
			<td><strong><?php  

			echo ($total_web_lead['lead_arrived']!= 0)?  $this->html->link( $total_web_lead['lead_arrived'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_arrived','user_id'=> implode(',', $user_lead_arrived)  )), 
			array('class'=>'stat_popup no-ajaxify') ) : "" ; 

			?></strong></td>
			<td><strong><?php  
			//echo $total_web_lead['lead_pushedto'];
			echo ($total_web_lead['lead_pushedto']!= 0)?  $this->html->link( $total_web_lead['lead_pushedto'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_pushedto',
					'user_id'=> implode(',', $user_lead_pushedto)  )),array('class'=>'stat_popup no-ajaxify') )
				: "";
				 ; 

			 ?></strong></td>
			<td><strong><?php 

				echo ($total_web_lead['lead_pushed_to_staff']!= 0)?  $this->html->link( $total_web_lead['lead_pushed_to_staff'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_pushed_to_staff',
					'user_id'=> implode(',', $user_lead_pushed_to_staff)  )),array('class'=>'stat_popup no-ajaxify') )
				: "";
				 ; 

			 ?></strong></td>
			<td><strong><?php  
				echo ($total_web_lead['lead_worked']!= 0)?  $this->html->link( $total_web_lead['lead_worked'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_worked',
					'user_id'=> implode(',', $user_lead_worked)  )),array('class'=>'stat_popup no-ajaxify') )
				: "";
				 ; 

			?></strong></td>
			<td  <?php  
			if($total_web_lead['lead_notworked'] > 0 && $total_web_lead['lead_notworked'] <= 5  ){
				//echo " style = 'background: rgb(252,228,214) ' " ;  
				echo "class='text-danger'";
			}else if( $total_web_lead['lead_notworked'] > 5  ){
				//echo " style = 'background: #ab7a4b' "  ;
				echo "class='text-danger'";
			}
			 ?>   >
				<strong><?php  
				echo ($total_web_lead['lead_notworked']!= 0)? $this->html->link( $total_web_lead['lead_notworked'] , array('action'=>'stat_details',"?"=>array('type'=>'lead_notworked',
					'user_id'=> implode(',', $user_lead_notworked)  )),array('class'=>'stat_popup no-ajaxify text-danger') ) : "" ; 

				?>

			</strong></td>
			<td><strong></strong></td>
			<td><strong></strong></td>
		</tr>

		</tbody>
	</table>

				</div>	
			</div>
		</div>
	</div>

<!-- Direct and push ends -->



<!-- Call Center Push Start -->



	<div class="widget widget-body-white">
		<div class="widget-head">
			<h4 class="heading">Call Center Leads Arrived</h4>
		</div>
		<div class="widget-body">
			<div class="row">
				<div class="col-md-12">

	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Staff</th>
			<th>Leads Pushed To</th>
			<th>Pushed to Staff</th>
			<th>Leads Worked</th>
			<th>Lead Not Worked</th>
			<th>Postion</th>
		</tr>
		</thead>
		<tbody>
		<?php 

		$total_bdc_web_lead = array(
			'lead_pushed' => 0,
			'lead_pushed_to_stuff' => 0,
			'lead_worked' => 0,
			'lead_not_worked' => 0,
		);

		$user_lead_pushed = array();
		$user_lead_pushed_to_stuff = array();
		$user_lead_worked = array();
		$user_lead_not_worked = array();



		foreach($bdc_combine_web_lead_stats as $key=>$contact) { ?>
		<tr class="gradeA">

			<td><?php echo $contact['sperson']; ?></td>
			<td>
				<?php if (isset($contact['lead_pushed'])){ 
				 echo $this->html->link($contact['lead_pushed'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_pushed','user_id'=>$key)), 
				 	array('class'=>'stat_popup no-ajaxify') );
				 $total_bdc_web_lead['lead_pushed'] += $contact['lead_pushed'];
				 $user_lead_pushed[] = $key;
				}
				  ?>
			</td>

			<td>
				<?php if (isset($contact['lead_pushed_to_stuff'])){
				 	echo $this->html->link($contact['lead_pushed_to_stuff'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_pushed_to_stuff','user_id'=>$key)), 
				 	array('class'=>'stat_popup no-ajaxify') );
				 	$total_bdc_web_lead['lead_pushed_to_stuff'] += $contact['lead_pushed_to_stuff'];
				 	$user_lead_pushed_to_stuff[] = $key;
				}
				  ?>
			</td>

			<td>
				<?php if (isset($contact['lead_worked'])){
				 echo $this->html->link($contact['lead_worked'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_worked','user_id'=>$key)) ,
				  array('class'=>'stat_popup no-ajaxify') );
				 	$total_bdc_web_lead['lead_worked'] += $contact['lead_worked'];
				 	$user_lead_worked[] = $key;
				  } ?>
			</td>

			<td

			<?php  if( isset($contact['lead_not_worked']) && $contact['lead_not_worked'] <= 5 ){ 
				//echo " style = 'background: rgb(252,228,214) ' " ; 
				} else if( isset($contact['lead_not_worked']) && $contact['lead_not_worked'] > 5 ) { 
				  //echo " style = 'background: #ab7a4b' "  ;    
				    }     
				  ; ?> 

			>
				<?php if (isset($contact['lead_not_worked'])){
				 	
				 	echo $this->html->link($contact['lead_not_worked'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_not_worked','user_id'=>$key)) , array('class'=>'stat_popup no-ajaxify text-danger') );

					$total_bdc_web_lead['lead_not_worked'] += $contact['lead_not_worked'];
					$user_lead_not_worked[] = $key;

				 }
				  ?>
			</td>
			<td><?php echo $contact['group']; ?></td>

		</tr>
		<?php } ?>


		<tr>
			<td><strong>Total</strong></th>
			<td><strong><?php  
			echo ($total_bdc_web_lead['lead_pushed'] != 0)?

			 $this->html->link($total_bdc_web_lead['lead_pushed'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_pushed','user_id'=> implode(',', $user_lead_pushed)  )), 
				 array('class'=>'stat_popup no-ajaxify') ) : "" ;



			 ?></strong></th>
			<td><strong><?php  
			echo ($total_bdc_web_lead['lead_pushed_to_stuff'] != 0)? 

			$this->html->link($total_bdc_web_lead['lead_pushed_to_stuff'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_pushed_to_stuff','user_id'=>implode(',', $user_lead_pushed_to_stuff))), 
				 array('class'=>'stat_popup no-ajaxify') ) : "" ;

			?></strong></th>
			<td><strong><?php  
				echo ($total_bdc_web_lead['lead_worked'] != 0)?

				$this->html->link($total_bdc_web_lead['lead_worked'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_worked','user_id'=>implode(',', $user_lead_worked))), 
				 array('class'=>'stat_popup no-ajaxify') ) : "" ;

				?></strong></th>
			<td

				<?php  
			if($total_bdc_web_lead['lead_not_worked'] > 0 && $total_bdc_web_lead['lead_not_worked'] <= 5  ){
				//echo " style = 'background: rgb(252,228,214) ' " ;  
				echo "class='text-danger'";
			}else if( $total_bdc_web_lead['lead_not_worked'] > 5  ){
				//echo " style = 'background: #ab7a4b' "  ;
				echo "class='text-danger'";
			}
			 ?> 

			><strong><?php 
			 echo ($total_bdc_web_lead['lead_not_worked']!= 0) ?

			 $this->html->link($total_bdc_web_lead['lead_not_worked'], array('action'=>'gsm_stat_details',"?"=>array('type'=>'lead_not_worked','user_id'=>implode(',', $user_lead_not_worked))), 
				 array('class'=>'stat_popup no-ajaxify text-danger') ) : "" ;

			 ?></strong></th>


			<td><strong></strong></th>
		</tr>





		</tbody>
	</table>

				</div>	
			</div>
		</div>
	</div>



<!-- Call center push ends -->






	<div class="widget widget-body-white">
		<div class="widget-head">
			<h4 class="heading">Showroom Leads Pushed Not Touched</h4>
		</div>
		<div class="widget-body">
			<div class="row">
				<div class="col-md-12">

					<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
						<!-- Table heading -->
						<thead>
						<tr class="bg-inverse">
							<th>Staff</th>
							<th>Leads Not Worked</th>
							<th>Pushed to Not worked</th>
							<th>Pushed to Worked</th>
							<th>Postion</th>
						</tr>
						</thead>
						<tbody>
						<?php 
						
						$total_bdc_web_lead = array(
							'lead_not_worked' => 0,
							'lead_pushed_to_not_worked' => 0,
							'lead_pushed_to_worked' => 0
						);

						$user_lead_not_worked = array();
						$user_lead_pushed_to_not_worked = array();
						$user_lead_pushed_to_worked = array();

						foreach($showroom_combine_stats as $key=>$contact) { ?>
						<tr class="gradeA">

							<td   ><?php echo $contact['sperson']; ?></td>
							<td   >
								<?php if (isset($contact['lead_not_worked'])){ 
								 echo $this->html->link($contact['lead_not_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_not_worked', 'contact_status' => 7, 'user_id'=>$key)), array('class'=>'stat_popup no-ajaxify') ) ; 
								 $total_bdc_web_lead['lead_not_worked'] += $contact['lead_not_worked'];
								 $user_lead_not_worked[] = $key;
								}
								  ?>
							</td>
							<td>
								<?php if (isset($contact['lead_pushed_to_not_worked'])){
								 	echo $this->html->link($contact['lead_pushed_to_not_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_not_worked', 'contact_status' => 7, 'user_id'=>$key)), array('class'=>'stat_popup no-ajaxify') ) ;
									$total_bdc_web_lead['lead_pushed_to_not_worked'] += $contact['lead_pushed_to_not_worked'];
									$user_lead_pushed_to_not_worked[] = $key;
								 }
								  ?>
							</td>

							<td   >
								<?php if (isset($contact['lead_pushed_to_worked'])){ 
								 echo $this->html->link($contact['lead_pushed_to_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_worked', 'contact_status' => 7, 'user_id'=>$key)), array('class'=>'stat_popup no-ajaxify') ) ;
								 $total_bdc_web_lead['lead_pushed_to_worked'] += $contact['lead_pushed_to_worked'];
								 $user_lead_pushed_to_worked[] = $key;
								}
								  ?>
							</td>
							<td   ><?php echo $contact['group']; ?></td>

						</tr>
						<?php } ?>



						<tr>
							<td> <strong>Total</strong></th>
							<td> 
								<strong>
									<?php echo ($total_bdc_web_lead['lead_not_worked'] != 0)? 
									 $this->html->link($total_bdc_web_lead['lead_not_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_not_worked', 'contact_status' => 7, 'user_id'=>implode(",", $user_lead_not_worked))), array('class'=>'stat_popup no-ajaxify') ) 
								 : "" ; ?>
								</strong>
							</td>	
							<td>
							 <strong><?php echo ($total_bdc_web_lead['lead_pushed_to_not_worked']!= 0) ? 
							 
							 $this->html->link($total_bdc_web_lead['lead_pushed_to_not_worked'] , array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_not_worked', 'contact_status' => 7, 'user_id'=>implode(",", $user_lead_pushed_to_not_worked))), array('class'=>'stat_popup no-ajaxify') ) 

							 : "" ;  ?></strong>
							</td>
							<td>
								<strong><?php echo ($total_bdc_web_lead['lead_pushed_to_worked'] != 0)? 
								$this->html->link($total_bdc_web_lead['lead_pushed_to_worked'] , array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_worked', 'contact_status' => 7, 'user_id'=>implode(",", $user_lead_pushed_to_worked))), array('class'=>'stat_popup no-ajaxify') ) 

								: "" ; ?></strong>
							</td>
							<td><strong></strong></td>
						</tr>

						</tbody>
					</table>

				</div>	
			</div>
		</div>
	</div>






	<div class="widget widget-body-white">
		<div class="widget-head">
			<h4 class="heading">Phone Lead Pushed Not Touched</h4>
		</div>
		<div class="widget-body">
			<div class="row">
				<div class="col-md-12">
					

					<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
						<!-- Table heading -->
						<thead>
						<tr class="bg-inverse">
							<th>Staff</th>
							<th>Leads Not Worked</th>
							<th>Pushed to Not worked</th>
							<th>Pushed to Worked</th>
							<th>Postion</th>
						</tr>
						</thead>
						<tbody>
						<?php 
						
						$total_bdc_web_lead = array(
							'lead_not_worked' => 0,
							'lead_pushed_to_not_worked' => 0,
							'lead_pushed_to_worked' => 0
						);

						$user_lead_not_worked = array();
						$user_lead_pushed_to_not_worked = array();
						$user_lead_pushed_to_worked = array();

						foreach($phone_combine_stats as $key=>$contact) { ?>
						<tr class="gradeA">

							<td   ><?php echo $contact['sperson']; ?></td>
							<td   >
								<?php if (isset($contact['lead_not_worked'])){ 
								 echo $this->html->link($contact['lead_not_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_not_worked', 'contact_status' => 6, 'user_id'=>$key)), array('class'=>'stat_popup no-ajaxify') ) ; 
								 $total_bdc_web_lead['lead_not_worked'] += $contact['lead_not_worked'];
								 $user_lead_not_worked[] = $key;
								}
								  ?>
							</td>
							<td>
								<?php if (isset($contact['lead_pushed_to_not_worked'])){
								 	echo $this->html->link($contact['lead_pushed_to_not_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_not_worked', 'contact_status' => 6, 'user_id'=>$key)), array('class'=>'stat_popup no-ajaxify') ) ;
									$total_bdc_web_lead['lead_pushed_to_not_worked'] += $contact['lead_pushed_to_not_worked'];
									$user_lead_pushed_to_not_worked[] = $key;
								 }
								  ?>
							</td>

							<td   >
								<?php if (isset($contact['lead_pushed_to_worked'])){ 
								 echo $this->html->link($contact['lead_pushed_to_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_worked', 'contact_status' => 6, 'user_id'=>$key)), array('class'=>'stat_popup no-ajaxify') ) ;
								 $total_bdc_web_lead['lead_pushed_to_worked'] += $contact['lead_pushed_to_worked'];
								 $user_lead_pushed_to_worked[] = $key;
								}
								  ?>
							</td>
							<td   ><?php echo $contact['group']; ?></td>

						</tr>
						<?php } ?>



						<tr>
							<td> <strong>Total</strong></th>
							<td> 
								<strong>
									<?php echo ($total_bdc_web_lead['lead_not_worked'] != 0)? 
									 $this->html->link($total_bdc_web_lead['lead_not_worked'], array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_not_worked', 'contact_status' => 6, 'user_id'=>implode(",", $user_lead_not_worked))), array('class'=>'stat_popup no-ajaxify') ) 
								 : "" ; ?>
								</strong>
							</td>	
							<td>
							 <strong><?php echo ($total_bdc_web_lead['lead_pushed_to_not_worked']!= 0) ? 
							 
							 $this->html->link($total_bdc_web_lead['lead_pushed_to_not_worked'] , array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_not_worked', 'contact_status' => 6, 'user_id'=>implode(",", $user_lead_pushed_to_not_worked))), array('class'=>'stat_popup no-ajaxify') ) 

							 : "" ;  ?></strong>
							</td>
							<td>
								<strong><?php echo ($total_bdc_web_lead['lead_pushed_to_worked'] != 0)? 
								$this->html->link($total_bdc_web_lead['lead_pushed_to_worked'] , array('action'=>'stat_details_showroom_phone',"?"=>array('type'=>'lead_pushed_to_worked', 'contact_status' => 6, 'user_id'=>implode(",", $user_lead_pushed_to_worked))), array('class'=>'stat_popup no-ajaxify') ) 

								: "" ; ?></strong>
							</td>
							<td><strong></strong></td>
						</tr>

						</tbody>
					</table>

				</div>	
			</div>
		</div>
	</div>










































<?php echo $this->element('sql_dump'); ?>




</div>


<script type="text/javascript">

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	


	$(".stat_popup").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Web Lead Details",
				}).find("div.modal-dialog").addClass("largeWidth3");
				}
			}
		});
		
	});

	


		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});




</script>






















