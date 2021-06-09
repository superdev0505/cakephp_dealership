<script type="text/javascript">
    plgFcRoot = '<?php echo $this->Html->url('/', true); ?>' + "full_calendar";
    var clickTimer;
    var doubleClick;
</script>
<?php
//echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min', '/full_calendar/js/ready'), array('inline' => 'false'));
echo $this->Html->script(array('/full_calendar/js/jquery-ui.custom.min', '/full_calendar/js/fullcalendar.min', '//cdn.jsdelivr.net/qtip2/2.2.0/basic/jquery.qtip.js', '/full_calendar/js/ready'), array('inline' => 'false'));
echo $this->Html->css('/full_calendar/css/fullcalendar', null, array('inline' => false));
echo $this->Html->css('/full_calendar/css/qtip.min');
?>

<br/>
<div class="calendar-box">
    <div>
    <!-- 	<a class="btn btn-success" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add')); ?>"><i class="icon-plus-sign"></i> New Event</a>
            <a class="btn btn-info" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events')); ?>"><i class="icon-tasks"></i> Event View</a>
            <a class="btn btn-info pull-right" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'event_types')); ?>" >Event Types</a> -->

    </div>
    <div id="calendar"></div>
</div>
<div align="right">
    <a class="btn btn-success-mini" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events')); ?>">
        <i class="icon-calendar"></i>Back to Events
    </a>
</div>