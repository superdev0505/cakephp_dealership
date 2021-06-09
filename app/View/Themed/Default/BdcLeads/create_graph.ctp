
<?php //echo $graphData; ?>
<?php //echo $js; ?>
<img src="data:image/svg+xml;base64,<?php echo base64_encode($graphData); ?>" />
<br />
<?php echo $this->Html->image('image4.svg'); ?>