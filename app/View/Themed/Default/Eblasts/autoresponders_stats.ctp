<?php
function pr_stat($val, $type, $eblastid){

	if($val != null){

		if($val == 0){
			return $val;
		}else{
			return '<a class="eblast_details_link_auto no-ajaxify" report_url="/eblasts/statistics_details_auto/'.$type.'/'.$eblastid.'/" href="javascript:" >'.$val.'</a>';
		}
	}else{
		return "0";
	}
}
?>	


<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
	<thead>
		<tr>
            <th >Auto Responder Rule</th>
            <th>Details</th>
			<th>Created On</th>
            <th>Email Mode</th>
			<th>Template</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($autoresponder_results as $autor){  ?>
		
		<?php //debug($autor); ?>

		<tr>
            <td class="important">
            	<?php 
            		if( $autor['AutoresponderRule']['rule_type'] == 'auto_rule' ){
            			echo "<span title='{$autor['AutoresponderRule']['id']}'>"."Update Rule"."</span>";
            		}else{
            			echo "<span title='{$autor['AutoresponderRule']['id']}'>".$autor['AutoresponderRule']['rule_type']."</span>";
            		}

            	?>
            </td>
            <td>
            	<?php //echo $autor['AutoresponderRule']['id']; ?>

            	<?php if( $autor['AutoresponderRule']['rule_type'] == 'auto_rule' ){ ?>

            	<strong>Lead Status:</strong> <?php echo $autor['AutoresponderRule']['search_lead_status']; ?><br>
            	<strong>Lead Type:</strong> <?php echo $autor['ContactStatus']['name']; ?><br>
            	<strong>Sales Step:</strong> <?php echo $sales_step_options[ $autor['AutoresponderRule']['search_sales_step'] ]; ?><br>
            	<strong>Status:</strong> <?php echo $autor['AutoresponderRule']['search_status']; ?><br>
            	<strong>Source:</strong> <?php echo $autor['AutoresponderRule']['search_source']; ?><br>

            	<?php } ?>

            </td>
            <td><?php echo $this->Time->format('M d, Y', $autor['AutoresponderRule']['created']); ?></td>
            <td><?php echo $this->Time->format('M d, Y', $autor['AutoresponderRule']['email_mode']); ?></td>
			<td><?php echo $autor['Template']['template_title']; ?></td>
		</tr>

		<!-- Stats -->
		<tr>
			<td colspan = '5'>


				<table class="table table-condensed table-striped table-inverse table-vertical-center">
					<thead>
						<tr >
							<th class="bg-inverse">Processed</th>
							<th class="bg-inverse" >Delivered</th>
							<th class="bg-inverse" >Deferred</th>
							<th class="bg-inverse" >Opens</th>
							<th class="bg-inverse" >Clicks</th>
							<th class="bg-inverse" >Unsubscribes</th>
							<th class="bg-inverse" >Bounces</th>
							<th class="bg-inverse" >Dropped</th>
							<th class="bg-inverse" >Spams</th>
						</tr>
						<tr >
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['processed'], 'processed', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['delivered'], 'delivered', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['deferred'], 'deferred', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['open'], 'open', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['click'], 'click', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['unsubscribe'], 'unsubscribe', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['bounced'], 'bounced', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['dropped'], 'dropped', $autor['AutoresponderRule']['id'] ); ?></td>
							<td><?php echo pr_stat($eblast_s[ $autor['AutoresponderRule']['id'] ]['spamreport'], 'spamreport', $autor['AutoresponderRule']['id'] ); ?></td>
						</tr>
					</thead>
				</table>









			</td>
		</tr>





	<?php }  ?>

	</tbody>
</table>
<?php //debug( $eblast_s ); ?>


	<script>

$(function(){


	$(".eblast_details_link_auto").click(function(event){
		event.preventDefault();
		uurl = $(this).attr('report_url');
		$.ajax({
			type: "GET",
			cache: false,
			url: uurl,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "<b>Statistics Details </b>",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});




});

</script>


















