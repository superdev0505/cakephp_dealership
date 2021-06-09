<div class="row-fluid">

        <?php echo $this->Form->create('LeadScore',array('url' => array('controller'=>'contacts','action' => 'lead_score') , 'type'=>'post','class'=>'form-inline no-ajaxify'));
		echo $this->Form->hidden('user_id',array('value'=>$user_id));
		echo $this->Form->hidden('dealer_id',array('value'=>$dealer_id));
		echo $this->Form->hidden('saleperson_id',array('value'=>$contact_details['Contact']['user_id']));
		echo $this->Form->hidden('contact_id',array('value'=>$contact_details['Contact']['id']));
		
		?>
       <label>Source</label>
       
        <?php 
		
		echo $this->Form->input('source',array('class'=>'form-control','options'=>$score_sources,'empty'=>'Select Source','style'=>'width:100%')); ?>
               
       <label>Sperson</label>
        <?php echo $this->Form->input('sperson',array('class'=>'form-control','style'=>'width:100%','value'=>$contact_details['Contact']['sperson'],'readOnly'=>'readOnly')); ?>

                <label>Week</label>
       
        <?php 
		$weeks=array(1=>1,2=>2,3=>3,4=>4,5=>5/*,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,17=>17,18=>18,19=>19,20=>20,21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31,32=>32,33=>33,34=>34,35=>35,36=>36,37=>37,38=>38,39=>39,40=>40,41=>41,42=>42,43=>43,44=>44,45=>45,46=>46,47=>47,48=>48,49=>49,50=>50,51=>51,52=>52*/);
		echo $this->Form->input('week',array('class'=>'form-control','style'=>'width:100%','options'=>$weeks,'empty'=>'Select Week')); ?>

			<label>Grade</label>
       
        <?php 
		$grades=array('A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F'/*,'E'=>'E'*/,'n/a'=>'N/A');
		echo $this->Form->input('score',array('class'=>'form-control','options'=>$grades,'style'=>'width:100%','empty'=>'Select Grade')); ?>
               
       
        <?php echo $this->Form->hidden('location',array('class'=>'form-control','value'=>AuthComponent::user('dealer'))); ?>

               
       <label>CS Agent</label>
        <?php echo $this->Form->input('cs_agent',array('class'=>'form-control','value'=>AuthComponent::user('full_name'),'readOnly'=>'readOnly')); ?>
        <br />
        <br />
		  <strong>Latest Notes : </strong><?php echo $contact_details['Contact']['notes']; ?>     
       <br /><label>Details :</label>
        <?php echo $this->Form->input('details',array('class'=>'form-control')); ?>
		       <label>Logged CRM</label>
        <?php echo $this->Form->input('logged_crm',array('class'=>'form-control','style'=>'width:100%','empty'=>'Select','options'=>array('yes'=>'Yes','no'=>'No','n/a'=>'N/A'))); ?><br /><br />
        <strong>CRM Source : </strong><?php echo $contact_details['Contact']['source']; ?>     
       <br />
              <label>CRM Source Correct?</label>
        <?php echo $this->Form->input('crm_source_correct',array('class'=>'form-control','style'=>'width:100%','empty'=>'Select','options'=>array('yes'=>'Yes','no'=>'No','n/a'=>'N/A'))); ?>
        <div id="contact_source" style="display:none;">
        <label>CRM Source </label>
        <?php echo $this->Form->input('Contact.source',array('class'=>'form-control','style'=>'width:100%','empty'=>'Select','options'=>$lead_sources,'value'=>$contact_details['Contact']['source'])); ?>
        </div>
              <label>DMS Source Correct?</label>
        <?php echo $this->Form->input('dms_source_correct',array('class'=>'form-control','style'=>'width:100%','empty'=>'Select','options'=>array('yes'=>'Yes','no'=>'No','n/a'=>'N/A'))); ?>
        <label>Ask For Email?</label>
        <?php echo $this->Form->input('ask_for_email',array('class'=>'form-control','style'=>'width:100%','empty'=>'Select','options'=>array('yes'=>'Yes','no'=>'No','n/a'=>'N/A'))); ?>
         
        <?php /*?> <label>CS Age</label>
       
        <?php echo $this->Form->input('cs_age',array('class'=>'form-control')); ?><?php */?>
        
       <?php /*?> <label>BDC CSR</label>
       
        <?php echo $this->Form->input('bdc_csr',array('class'=>'form-control','value'=>AuthComponent::user('full_name'),'readOnly'=>'readOnly')); ?><?php */?>
        <br /><br />
		<button id="scoreLeadSubmit" type="submit" class="btn btn-success" value="Submit">Submit</button>


        <?php echo $this->Form->end();  ?>
      

</div>

<script type="text/javascript">
$(document).ready(function(){
						   
	$("#scoreLeadSubmit").on('click',function(e){
		$(this).attr('disabled','disabled');									  
		e.preventDefault();									  
		$.ajax({
			type: "POST",
			cache: false,
			url: $("#LeadScoreLeadScoreForm").attr('action'),
			data:$("#LeadScoreLeadScoreForm").serialize(),
			success: function(data){
				location.href = "/contacts/leads_main/view/"+$("#LeadScoreContactId").val();
				bootbox.hideAll();
				
			}
		});	
		
																	 
	});
	$("#LeadScoreCrmSourceCorrect").on('change',function(){
															 
															 
															 if($(this).val()=='no')
															 {
																$("div#contact_source").slideDown(); 
															 }else
															 {
																$("div#contact_source").hide();  
															 }
															 
															 });
						   
						   
						   
						   });

</script>