<?php
					if(!empty($other_leads) ||!empty($part_other_leads) || !empty($service_other_leads) )
					{?>
                    <div class="row well">
                    <h4 class="">Lead in Other Location</h4>
                    <table class="table table-bordered" style="font-size:12px">
                    <thead>
                    <tr class="bg-inverse">
                    <th>Dealer</th>
                    <th>Lead ID</th>
                    <th>BDC Status</th>
                   
                    </tr>
                    </thead>
                    <tbody>
                     <?php foreach($other_leads as $o_lead){ ?>
                    <tr>
                    <td><?php echo '#'.$o_lead['BdcLead']['company_id'].' - '.$other_dealer_names[$o_lead['BdcLead']['company_id']]; ?></td>
                    <td><?php echo '#'.$o_lead['BdcLead']['id']. ' (CRM Lead)'; ?></td>
                    <td><?php if(empty($o_lead['BdcSurvey']))
					{
						echo 'No Survey';
					}else
					{
						echo $o_lead['BdcSurvey'][0]['status'].'<br/>';
						echo date('m/d/Y',strtotime($o_lead['BdcSurvey'][0]['created']));
					}
					?></td>
                    </tr>
					<?php } ?>
                    
                    
                    <?php foreach($part_other_leads as $o_lead){ ?>
                    <tr>
                    <td><?php echo '#'.$o_lead['PartLeadsDms']['dealer_id'].' - '.$other_dealer_names[$o_lead['PartLeadsDms']['dealer_id']]; ?></td>
                    <td><?php echo '#'.$o_lead['PartLeadsDms']['id']. ' (Parts Lead)'; ?></td>
                    <td><?php if(empty($o_lead['BdcSurvey']))
					{
						echo 'No Survey';
					}else
					{
						echo $o_lead['BdcSurvey'][0]['status'].'<br/>';
						echo date('m/d/Y',strtotime($o_lead['BdcSurvey'][0]['created']));
					}
					?></td>
                    </tr>
					<?php } ?>
                       <?php foreach($service_other_leads as $o_lead){ ?>
                    <tr>
                    <td><?php echo '#'.$o_lead['ServiceLeadsDms']['dealer_id'].' - '.$other_dealer_names[$o_lead['ServiceLeadsDms']['dealer_id']]; ?></td>
                    <td><?php echo '#'.$o_lead['ServiceLeadsDms']['id']. ' (Service Lead)'; ?></td>
                    <td><?php if(empty($o_lead['BdcSurvey']))
					{
						echo 'No Survey';
					}else
					{
						echo $o_lead['BdcSurvey'][0]['status'].'<br/>';
						echo date('m/d/Y',strtotime($o_lead['BdcSurvey'][0]['created']));
					}
					?></td>
                    </tr>
					<?php } ?>
                    </tbody>
                    </table>
                    <div class="separator"></div>
                    </div>
                    
					<?php }?>