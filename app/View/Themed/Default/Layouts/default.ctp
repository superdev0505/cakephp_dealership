<?php
$dealer = AuthComponent::user('dealer');
// echo $company;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title . ' - ' . $title_for_layout; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- for contact popup -->
    <!-- for contact popup end -->
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('bootstrap');
    echo $this->Html->css('bootstrap-responsive.min');
    echo $this->Html->css('font-awesome.min');
    echo $this->Html->css('custom'); //costom css
    echo $this->Html->css('styleless'); //dynamic css
    //       echo $this->Html->css('style_worksheet', null, array('inline' => false));
    echo $this->Html->css('bootstrap.icon-large.min.css');
    echo $this->Html->css('start/jquery-ui');
    echo $this->Html->css('jquery-ui-timepicker-addon');
    echo $this->Html->css('jquery-ui.css');
    echo $this->Html->script('jquery');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('jquery.validate.min');
    echo $this->Html->script('jquery-ui-1.9.2.custom.min');
    echo $this->Html->script('jqplot/jquery.jqplot.min');
    echo $this->Html->script('jqplot/plugins/jqplot.highlighter.min');
    echo $this->Html->script('jqplot/plugins/jqplot.cursor.min');
    echo $this->Html->script('jqplot/plugins/jqplot.dateAxisRenderer.min');
    echo $this->Html->script('jqplot/plugins/jqplot.pieRenderer.min');
    echo $this->Html->script('jqplot/plugins/jqplot.donutRenderer.min');
    ?>
  <link rel="stylesheet" href="<?php echo $this->webroot; ?>theme/Default/css/jquery-ui.css"/>
<script type="text/javascript" src="<?php echo $this->webroot; ?>theme/Default/js/jquery-ui.js"/></script>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>theme/Default/js/jqplot/jquery.jqplot.min.css" / >
<link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/js/fancybox/source/jquery.fancybox.css" type = "text/css" media = "screen" / >
<script type="text/javascript"src="<?php echo $this->webroot; ?>app/webroot/js/fancybox/source/jquery.fancybox.pack.js?v=4" ></script>
    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <style type="text/css">
        body {
            padding-bottom: 0px;
            background-color: #ffffff;
        }

        .masthead .nav {
            margin-bottom: 10px;
        }

        .navbar-search {
            margin-top: 0px;
        }

        a.btn {
            button . btn
        }

        .nav > li > a.no-hover:hover {
            text-decoration: none;
            background: transparent;
            color: rgb(0, 136, 204);
            background-image: none;
        }

        .dropdown:hover .dropdown-menu {
            /*display: block;*/
        }

        .copyright .dropup {
            display: inline-block;
        }
    </style>
    <!-- for contact popup -->
    <!-- <link rel="STYLESHEET" type="text/css" href="/app/View/Themed/Default/webroot/popup-contact.css"> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    
    </head>
<body>
<div class="navbar navbar-static-top">
    <div class="navbar-inner zhen-nav">
        <div class="container">
            <div class="logo">
                <a class="brand muted" href="<?php echo $this->Html->url('/index.php'); ?>">
                    <!-- <?php echo $this->Html->image('../files/option/logo/' . $logo, array('class' => '', 'height' => '50px')); ?> -->
                    <?php
                    if ($dealer)
                        echo $dealer;
                    else
                        echo 'CRM Services';
                    ?></a></div>
            <ul class="nav">
                <?php if ($this->Session->read('Auth.User')): ?>
                <li class="<?php if ($this->params['controller'] == 'dashboards') echo 'active'; ?>"><a
                        href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'dashboards', 'action' => 'index')); ?>"><span><i
                                class="icon-dashboard"></i></span><?php echo __('DASHBOARD'); ?></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'contacts', 'action' => 'add')); ?>"><i
                                    class="icon-plus"></i> <?php echo __('New Contact') ?></a></li>
                    </ul>
                <li class="dropdown <?php if ($this->params['controller'] == 'contacts') echo 'active'; ?>">
                    <a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'contacts', 'action' => 'index')); ?>"><span><i
                                class="icon-list"></i></span><?php echo __('LEADS'); ?></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'contacts', 'action' => 'add')); ?>"><i
                                    class="icon-plus"></i> <?php echo __('New Contact') ?></a></li>
                    </ul>
                </li>


                <li class="dropdown <?php if ($this->params['plugin'] == 'full_calendar') echo 'active'; ?>">
                    <a href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'index')); ?>"><span><i
                                class="icon-calendar"></i></span>EVENTS</a>
                    <!-- <ul class="dropdown-menu">
                                <li><a href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'index')); ?>" ><i class="icon-tasks"></i> <?php echo __('Event View'); ?></a></li>
                                
                                <li><a href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'event_types', 'action' => 'index')); ?>" ><i class="icon-sitemap"></i> <?php echo __('Event Categories'); ?></a></li>
                                
                                <li><a href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'event_types', 'action' => 'add')); ?>" ><i class="icon-plus"></i> <?php echo __('New Category'); ?></a></li>
                                </ul> -->
                </li>
                <li class="<?php if ($this->params['controller'] == 'reports') echo 'active'; ?>"><a
                        href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'reports', 'action' => 'index')); ?>"><span><i
                                class="icon-signal"></i></span><?php echo __('REPORTS'); ?></a></li>
                <li class="dropdown <?php if ($this->params['controller'] == 'deals') echo 'active'; ?>">
                    <?php if (AuthComponent::user('group_id') !== 2){ ?>
                    <a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'deals', 'action' => 'index')); ?>"><span><i
                                class="icon-thumbs-up"></i></span><?php echo __('DEALS'); ?></a>
                </li>
                <li class="<?php if ($this->params['controller'] == 'eblast') ; ?>"><a
                        href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'Eblasts', 'action' => 'index')); ?>"><span><i
                                class="icon-envelope"></i></span><?php echo __('eBLAST'); ?></a></li>

            <?php } ?>
                <li class="<?php if ($this->params['controller'] == 'support') echo 'active'; ?>"><a
                        href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'support', 'action' => 'index')); ?>"><span><i
                                class="icon-comment"></i></span><?php echo __('SUPPORT'); ?></a></li>
                <ul class="nav pull-right">
                    <!--  <li class="<?php if (($this->params['controller'] == 'users') and ($this->params['action'] == 'edit')) echo 'active'; ?>"><a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'users', 'action' => 'edit', AuthComponent::user('id'))); ?>"><span><i class="icon-group"></i></span><?php echo AuthComponent::user('dealer'); ?></a></li> -->
                    <li class="<?php if (($this->params['controller'] == 'users') and ($this->params['action'] == 'edit')) echo 'active'; ?>">
                        <a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'users', 'action' => 'edit', AuthComponent::user('id'))); ?>"><span><i
                                    class="icon-user"></i></span><?php echo AuthComponent::user('full_name'); ?></a>
                    </li>
                    <?php if (AuthComponent::user('group_id') != 3): ?>
                        <li class="dropdown <?php if (($this->params['controller'] == 'users') and ($this->params['action'] == 'index')) echo 'active'; ?>">
                            <a class="dropdown-toggle"
                               data-toggle="dropdown"
                               href="#"><span><i class="icon-cogs"></i></span>
                                <?php echo __('Admin') ?>
                                <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link(__('Users'), array('plugin' => '', 'controller' => 'users', 'action' => 'index')); ?></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this->Html->url(array('plugin' => '', 'controller' => 'users', 'action' => 'logout')); ?>"><span><i
                                        class="icon-lock"></i></span><?php echo __('Logout'); ?></a></li>
                    <?php endif; ?>
                    <?php else: ?>
                        <li class="<?php if ($this->params['controller'] == 'users' && $this->params['action'] == 'login') echo 'active'; ?>">
                            <a href="http://m.dealershipperformance.com/"><span><i
                                        class="icon-lock"></i></span><?php echo __('Mobile Login'); ?></a></li>
                    <?php
                    endif; ?>
                </ul>
        </div>
    </div>
</div>
<div class="container main-wraper">
    <?php echo $this->Session->flash('flash', array('element' => 'alert')); ?>
    <!-- <?php echo $this->Session->flash('auth', array('element' => 'alert')); ?> -->
    <?php echo $this->fetch('content'); ?>
</div>
<!-- /container -->
<div class="footer">
    <div class="copyright">
        Copyright &copy; 2015 <?php
        if ($copyright)
            echo $copyright;
        else
            echo 'Dealership Performance';
        ?>
        <div class="dropup">
        </div>
    </div>
</div>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php
echo $this->Html->script('bootstrap-transition');
echo $this->Html->script('bootstrap-alert');
echo $this->Html->script('bootstrap-modal');
echo $this->Html->script('bootstrap-dropdown');
//echo $this->Html->script('bootstrap-scrollspy');
echo $this->Html->script('bootstrap-tab');
echo $this->Html->script('bootstrap-tooltip');
//echo $this->Html->script('bootstrap-popover');
echo $this->Html->script('bootstrap-button');
echo $this->Html->script('bootstrap-collapse');
//echo $this->Html->script('bootstrap-carousel');
echo $this->Html->script('bootstrap-typeahead');
?>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
        //Add Hover effect to menus
        jQuery('ul.nav li.dropdown').hover(function () {
            jQuery(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn();
        }, function () {
            jQuery(this).find('.dropdown-menu').stop(true, true).delay(90).fadeOut();
        });
        jQuery('.dropup').hover(function () {
            jQuery('div.dropup').find('.dropdown-menu').stop(true, true).delay(50).fadeIn();
        }, function () {
            jQuery('div.dropup').find('.dropdown-menu').stop(true, true).delay(1900).fadeOut();
        });
    });
</script>
<script>
    $(function () {
        if( $('#timepicker').length ){	
             $("#timepicker").timepicker();
	}
    });
</script>
<script>
    $(function () {
        if( $('#datepicker').length ){	
        	$("#datepicker").datepicker();
	}
    });
</script>
<script>
    jQuery(function ($) {
        $('div.btn-group[data-toggle-name]').each(function () {
            var group = $(this);
            var form = group.parents('form').eq(0);
            var name = "data[Contact][contact_status_id]";
            var hidden = $('input[name="' + name + '"]', form);
            $('button', group).each(function () {
                var button = $(this);
                button.live('click', function () {
                    hidden.val($(this).val());
                });
                if (button.val() == hidden.val()) {
                    button.addClass('active');
                }
            });
        });
    });
</script>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
