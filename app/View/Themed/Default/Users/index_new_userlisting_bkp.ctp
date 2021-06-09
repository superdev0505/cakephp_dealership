</br></br>
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
?>

<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>

<?php
if ($step_procces === "lemco_steps") {
    $options = array('Pending' => 'Pending', 'Meet' => 'Meet-Step 1', 'Greet' => 'Greet-Step 2', 'Probe' => 'Probe-Step 3', 'Sit On' => 'Sit On-Step 4', 'Sit Down' => 'Sit Down-Step 5', 'Write Up' => 'Write Up-Step 6', 'Close' => 'Close-Step 7', 'F/I' => 'F/I-Step 8', 'Sold' => 'Sold-Step 9');
} else {
    $options = array('Connect' => 'Connect', 'Understand' => 'Understand', 'Satisfy' => 'Satisfy', 'Trial Close' => 'Trial Close', 'Obtain Commitment' => 'Obtain Commitment', 'Maintain Realationship' => 'Maintain Realationship');
}
?>

<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-1 month', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<br>
<br>
<?php
$selected_lead_type = (isset($this->request->params['pass'][0])) ? $this->request->params['pass'][0] : "";
?>
<div class="innerLR">

    <?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>

    <div class="widget widget-body-white">
        <div class="widget-body">

            <div class="row">
                <?php echo $this->Form->create('User', array('url' => array_merge(array('action' => 'index'), $this->params['pass']),'class'=>'form-inline no-ajaxify')); ?>
                <div class="col-md-3">
                <?php echo $this->Form->input('search_all',array('div'=>false,'class'=>'form-control','placeholder'=>'Search','label'=>false)); ?>
                <button type="submit" class="btn btn-success" style="position: relative; margin-left: 250px;margin-top: -55px;"><i class="icon-search"></i></button>
                <!-- <a class="btn btn-primary" id="more" ><i class="icon-caret-down"></i> More</a> -->	
                </div>
                <?php echo $this->Form->end(); ?>
                <div class="col-md-4" style="margin-left: 35px;">
                    <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'add_new')); ?>" class="btn btn-success" ><i class="fa fa-plus"></i> New User</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Widget -->
    <div class="wizard">
        <div class="widget widget-heading-simple widget-body-white widget-employees">
            <div class="widget-body padding-none">
                <div class="row row-merge">
                    <div class="col-md-3 listWrapper">
                        <div id="search-result-content"></div>
                    </div>
                    <div class="col-md-9 detailsWrapper">
                        <div class="ajax-loading hide">
                            <i class="icon-spinner icon-spin icon-4x"></i>
                        </div>
                        <div id="user_details_content"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- // Widget END -->		

</div>

<script>
$script.ready('bundle', function() {
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
            $(window).load(function() {
<?php } ?>
            $(".alert").delay(3000).fadeOut("slow");
<?php
//load search area with given lead type
if (isset($this->request->params['pass']['0'])) {
    ?>
                $("#lead_details_content").html("&nbsp;");
                $('.ajax-loading').removeClass('hide');
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "/users/search_result/<?php echo $groupid; ?>/load_first",
                    success: function(data) {
                        $("#search-result-content").html(data);
                        $('.ajax-loading').addClass('hide');
                    }
                });

    <?php }
?>

<?php
//load newly added/edited leads
if (isset($load_user)) {
    ?>
                
                $("#lead_details_content").html("&nbsp;");
                $("#lead_details_content").prev('.ajax-loading').removeClass('hide');
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "<?php echo $this->Html->url(array('action' => 'index_new_userlisting', $load_user)); ?>",
                    success: function(data) {
                        $("#user_details_content").html(data);
                        $("#user_details_content").prev('.ajax-loading').addClass('hide');
                    }
                });
    <?php }
?>

<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
            });
<?php } ?>
});
</script>

