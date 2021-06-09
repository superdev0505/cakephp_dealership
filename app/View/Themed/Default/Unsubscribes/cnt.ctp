<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>Dealership Performance 360 CRM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->css('font-awesome.min');
        ?>
    </head>    
    <body>
    	<div class="container-fluid">
	    	<div style="text-align: center">
	    		<p>&nbsp;</p>
	    		<blockquote>
					<p class="text-success"><?php echo $caslUnsubscribe_content; ?></p>
				</blockquote>
	    	</div>
		</div>	

        <?php //echo $this->element('sql_dump'); ?>

	</body>
</html>