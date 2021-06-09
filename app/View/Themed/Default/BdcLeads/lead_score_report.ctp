<!-- Table -->

<div class="widget" style="max-height:400px;overflow:scroll;">
		<div class="widget-head">
			<h4 class="heading">Lead Score Report (<?php echo $lead_scores_count; ?>)</h4>
            <div style="float:right;display:inline;">Show <?php echo $this->Form->input('record_limit',array('label'=>false,'div'=>false,'value'=>$record_limit,'options'=>array(20=>20,50=>50,100=>100,200=>200,'all'=>'All'))); ?> Records</div>
		</div>
		<div class="widget-body innerAll">
        <div class="row-fluid">
			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Lead ID #</th>
						<th>Source</th>
                        <th>Salesperson</th>
                        <th>Week</th>
                        <th>Grade</th>
                        <th>Location</th>
                        <th>CS Agent</th>
                        <th>Details</th>
                        <th>Logged CRM</th>
                        <th>CRM Source Correct?</th>
                        <th>DMS Source Correct?</th>
                        <th>Date/Time</th>
                       	
                    </tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					foreach($lead_scores as $score){
					?>
					
					<tr class="text-primary">
						<td><?php echo $score['LeadScore']['contact_id']; ?>&nbsp;</td>
                        <td><?php echo  $score['ScoreSource']['name']; ?>&nbsp;</td>
                        <td><?php echo $score['LeadScore']['sperson']; ?>&nbsp;</td>
                        <td><?php echo $score['LeadScore']['week']; ?>&nbsp;</td>
                        <td><?php echo $score['LeadScore']['score'];  ?>&nbsp;</td>
                        <td><?php echo $score['LeadScore']['location']; ?>&nbsp;</td>
						<td><?php echo $score['LeadScore']['cs_agent'];  ?>&nbsp;</td>
						<td><?php echo $score['LeadScore']['details'];  ?>&nbsp;</td>
						<td><?php echo strtoupper($score['LeadScore']['logged_crm']);  ?>&nbsp;</td>
						<td><?php echo strtoupper($score['LeadScore']['crm_source_correct']);  ?>&nbsp;</td>
						<td><?php echo strtoupper($score['LeadScore']['dms_source_correct']);  ?>&nbsp;</td>
                        <td><?php echo date('D - M d,Y h:i A',strtotime($score['LeadScore']['created']));  ?>&nbsp;</td>
                        
					</tr>
					<?php } ?>
				</tbody>
				<!-- // Table body END -->
				
			</table>
            </div>
	      </div>
    </div>
	
    
    <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Source Stats</h4>
		</div>
		<div class="widget-body innerAll"  style="height:500px;">
        
        <div class="col-md-4"  style="max-height:450px;overflow-y:scroll;">
 
        <table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Source</th>
						<th>Count</th>
                   	</tr>
                </thead>
                <tbody>
                <?php foreach($sources as $source){?>
                <tr>
                <td><?php echo $source['source']; ?></td>
                <td><?php echo $source['source_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
       </table>
      
       </div>
       <div class="col-md-8" style="text-align:center">
       <div id="top_source_json_data" style="display:none;"><?php echo json_encode($top_sources); ?></div>
        <div id="status_piechart" style="display: inline-block;	width:450px;	height:450px;"></div>
       </div>
    
</div>
</div>

<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Logged CRM Stats</h4>
		</div>
		<div class="widget-body innerAll"  style="height:500px;">
        
        <div class="col-md-4">
 
        <table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Status</th>
						<th>Count</th>
                   	</tr>
                </thead>
                <tbody>
                <?php foreach($l_crms as $l_crm){?>
                <tr>
                <td><?php echo strtoupper($l_crm['status']); ?></td>
                <td><?php echo $l_crm['source_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
       </table>
      
       </div>
       <div class="col-md-8" style="text-align:center">
       <div id="top_crm_status_json_data" style="display:none;"><?php echo json_encode($l_json_crm); ?></div>
        <div id="l_crm_piechart" style="display: inline-block;	width:450px;	height:450px;"></div>
       </div>
    
</div>
</div>

<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Lead Grade Stats</h4>
		</div>
		<div class="widget-body innerAll"  style="height:500px;">
        
        <div class="col-md-4">
 
        <table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Grade</th>
						<th>Count</th>
                   	</tr>
                </thead>
                <tbody>
                <?php foreach($grades as $grade){?>
                <tr>
                <td><?php echo strtoupper($grade['score']); ?></td>
                <td><?php echo $grade['source_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
       </table>
      
       </div>
       <div class="col-md-8" style="text-align:center">
       <div id="top_score_json_data" style="display:none;"><?php echo json_encode($lead_grades_crm); ?></div>
        <div id="lead_score_piechart" style="display: inline-block;	width:450px;	height:450px;"></div>
       </div>
    
</div>
</div>

<div class="widget">
		<div class="widget-head">
			<h4 class="heading">CRM Source Correct? Stats</h4>
		</div>
		<div class="widget-body innerAll"  style="height:500px;">
        
        <div class="col-md-4">
 
        <table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Status</th>
						<th>Count</th>
                   	</tr>
                </thead>
                <tbody>
                <?php foreach($crm_sources_correct as $sr){?>
                <tr>
                <td><?php echo strtoupper($sr['crm_source_correct']); ?></td>
                <td><?php echo $sr['source_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
       </table>
      
       </div>
       <div class="col-md-8" style="text-align:center">
       <div id="top_crm_sources_json" style="display:none;"><?php echo json_encode($crm_sources_json); ?></div>
        <div id="crm_sources_piechart" style="display: inline-block;	width:450px;	height:450px;"></div>
       </div>
    
</div>
</div>
    	
<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Lead Source Stats</h4>
		</div>
		<div class="widget-body innerAll"  style="height:500px;">
        
        <div class="col-md-4"  style="max-height:450px;overflow-y:scroll;">
 
        <table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Source</th>
						<th>Count</th>
                   	</tr>
                </thead>
                <tbody>
                <?php foreach($lead_sources as $source){?>
                <tr>
                <td><?php echo $source['lead_source']; ?></td>
                <td><?php echo $source['source_count']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
       </table>
      
       </div>
       <div class="col-md-8" style="text-align:center">
       <div id="lead_source_json_data" style="display:none;"><?php echo json_encode($lead_sources_json); ?></div>
        <div id="lead_source_piechart" style="display: inline-block;	width:450px;	height:450px;"></div>
       </div>
    
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
						   $("#record_limit").change(function(){
												group='null';
												if($("#LeadGroupStat").attr('data-id')=='group'){
													group='all_builds';
												}
												limit=$(this).val();			  
												load_lead_score_report(group,limit);			  
												});
						   
						   
						   });
</script>
			
			