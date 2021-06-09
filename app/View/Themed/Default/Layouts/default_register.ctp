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
        echo $this->Html->css('bootstrap.icon-large.min.css');

        echo $this->Html->css('start/jquery-ui');
//echo $this->Html->css('redmond/jquery-ui');
//echo $this->Html->css('cupertino/jquery-ui');
        echo $this->Html->css('jquery-ui-timepicker-addon');

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
        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <style type="text/css">
            body {
                padding-bottom: 0px;
                background-color:#ffffff;
            }

            .masthead .nav {
                margin-bottom: 10px;
            }
            .navbar-search {
                margin-top:0px;
            }
            a.btn {
                button.btn
            }
            .nav > li > a.no-hover:hover {
                text-decoration:none;
                background: transparent;
                color:rgb(0,136,204);
                background-image: none;
            }
            .dropdown:hover .dropdown-menu {
                /*display: block;*/
            }
            .copyright .dropup {
                display:inline-block;
            }

        </style>
        <!-- for contact popup -->
        <link rel="STYLESHEET" type="text/css" href="/app/View/Themed/Default/webroot/popup-contact.css">


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>

    <body>
        <div class="navbar navbar-static-top">
            <div class="navbar-inner zhen-nav">
                <div class="container"><div class="logo">
                        <a class="brand muted" href="<?php echo $this->Html->url('/index.php'); ?>">
                            <!-- <?php echo $this->Html->image('../files/option/logo/' . $logo, array('class' => '', 'height' => '50px')); ?> -->
<?php
$dealer = AuthComponent::user('dealer');
//echo $dealer;
?>
<?php
$dealer_id = AuthComponent::user('dealer_id');
// echo $dealer_id;
?>
                          <?php echo "Welcome"."&nbsp;".$dealer; ?></a></div>
                            </div>
        <div class="container main-wraper">

            <?php echo $this->Session->flash('flash', array('element' => 'alert')); ?>
            <!-- <?php echo $this->Session->flash('auth', array('element' => 'alert')); ?> -->
            <?php echo $this->fetch('content'); ?>

        </div> <!-- /container -->
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
</body>
</html>