<div class="row">
	<?php foreach( $templates as $template ) { ?>
        <div class="col-sm-3">
            <div class="widget">
                <a class="display-block bg-info innerAll text-center text-white">

					<?php if($template['Template']['template_image'] != ''){ ?>
						<?php echo $this->Html->image("template-thumbs/".$template['Template']['template_image'], array('width'=>"50",'height'=>"30")); ?>
					<?php } ?>
                </a>
                <div class="text-center innerAll">
                    <u>
                        <?php // echo $this->Form->input('selected_template', array('value' => $template['Templates']['template_id'], 'type' => 'radio','label'=>false,'div'=>false,'class' => 'form-control')); ?>
						<?php
						if($selected_template_id==$template['Template']['template_id']){
							$selected = 'checked="checked"';
						}else{
							$selected = '';
						}
						//echo $selected_template_id;
						?>
                        <input <?php echo $selected;?> type="radio" value="<?php echo $template['Template']['template_id'].'_'.$template['Template']['template_type']; ?>" name="template_id" class="form-control templates" /> <?php echo $template['Template']['template_title']; ?>
                    </u>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>