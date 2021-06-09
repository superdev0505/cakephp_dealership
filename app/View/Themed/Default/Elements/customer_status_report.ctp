<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Customer Status Count(All) <?php $dealer_name = !empty($show_group)?isset($dealer_names[$show_group])?$dealer_names[$show_group]:'All Dealership Locations':AuthComponent::user('dealer');
			echo $dealer_name;
			 ?></h4>
            <?php 
			 if($show_print){
		 echo $this->Html->link('<i class="fa fa-download"></i>',array('controller' =>'bdc_leads','action'=>'customer_status_report',$show_group,'export' => 'yes'),array('class'=>'btn btn-inverse pull-right no-ajaxify','escape'=>false,'data-id'=>'dealership'));		 
	 echo $this->Html->link('<i class="fa fa-print"></i>',array(),array('style' =>'margin-right:5px;','class'=>'btn btn-inverse pull-right no-ajaxify','escape'=>false,'id'=>'print-dealership-report'));
	 }
			?>
		</div>
		<div class="widget-body innerAll">
        <div>
        <table class="dynamicTable tableTools table table-bordered checkboxs"  >
        		<thead>
					<tr>
						<th>Status</th>
						<th>Total Count</th>
                         
					</tr>				
				</thead>
                <tbody>
                <?php foreach($status_result as $s_res){ ?>
                <tr>
                <td><?php echo $s_res['BdcStatus']['name']; ?></td>
                <td><?php echo $s_res[0]['status_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
        </table>
        </div>
        
                 </div>
	</div>