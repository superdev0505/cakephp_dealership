<!-- Autoresponds table -->
<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
    <thead>
        <tr>
            <th style="width: 10%;" >Ref#</th>
            <th style="width: 60%;" >Autoresponder Name</th>
            <th>Created On</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
		
        foreach($autoresponders as $autoresponder) { 
          
        ?>
        <tr class="selectable" style="">
            <td class="center" style="width: 41px;"><?php echo $autoresponder['Autoresponder']['id']; ?></td>
            <td class="important" style="width: 130px;">
				<?php echo $this->Html->link("<u>".$autoresponder['Autoresponder']['name']."</u>",array('controller'=>'eblasts','action'=>'autoresponder_rules',$autoresponder['Autoresponder']['id']),array('autoresponder_name'=>$autoresponder['Autoresponder']['name'],'class'=>'no-ajaxify lnk_campaign_details','escape'=>false)); ?>
			</td>
			
           <td><?php echo $this->Time->format('M d, Y', $autoresponder['Autoresponder']['created']); ?></td>
           <td>
            <a data-survey="2"  data-original-title="Edit autoresponder" data-placement="top" class="btn btn-sm btn-success edit_email" href="/eblasts/setup_autoresponder/<?php echo $autoresponder['Autoresponder']['id'];?>"><i class="fa fa-pencil"></i></a>
            </td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- // Products table END -->
<!-- Options -->
<div class=""><a href="<?php echo $this->Html->url(array('action'=>'/')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
    <div class="pull-right">
        <ul class="pagination margin-none">
            <?php echo $this->Paginator->prev('<<'); ?>
            <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
            <?php echo $this->Paginator->next('>>'); ?>
        </ul>
    </div>
    <div class="clearfix"></div>
<!-- // Pagination END -->
</div>
<!-- // Options END -->