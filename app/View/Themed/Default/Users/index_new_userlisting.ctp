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
                    <?php echo $this->Form->create('Users', array('autocomplete'=>"off", 'class' => 'form-inline no-ajaxify')); ?>
                    <div class="col-md-3">
                            <?php
                            echo $this->Form->select('search_all', array(
                            '2' => 'Sales Manager',
                            '4' => 'Floor Manager',
                            '3' => 'Employee'), array('div' => false, 'selected'=>$selected_type, 'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Staff Search', 'id' => 'UserSearchAll'));
                            //keep the state of Quick Search
                            echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
                            ?>
                    </div>
                    <div class="col-md-3">
                            <button id="btn-submit-search" class="btn btn-inverse pull-right no-ajaxify"><i class="icon-search"></i></button>
                            <div class="overflow-hidden">
                                    <?php						
                                    echo $this->Form->input('search_all2', array(
                                    'div' => false,
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Staff Name Search'), array('div' => false, 'id' => 'UserSearchAll2'));
                                    ?>						
                            </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                <div class="col-md-4" style="margin-left: 35px;">
                    <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'add_new')); ?>" class="btn btn-success" ><i class="fa fa-plus"></i> New User</a>&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>
    <!-- Widget -->
    <div class="wizard">
        <div class="widget widget-heading-simple widget-body-white widget-employees">
            <div class="widget-body padding-none">
                <div class="row row-merge">
                    <div class="col-md-4 listWrapper">
                        <div id="search-result-content"></div>
                    </div>
                    <div class="col-md-8 detailsWrapper">
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
                    url: "<?php echo $this->Html->url(array('controller' => 'users','action' => 'search_result')); ?>/<?php echo $groupid; ?>/load_first",
                    success: function(data) {
                        $("#search-result-content").html(data);
                        $('.ajax-loading').addClass('hide');
                    }
                });

    <?php }
?>
          $('#btn-submit-search').live('click',function(){
               var val = $('#UsersSearchAll2').val();
               $("#lead_details_content").html("&nbsp;");
               $('.ajax-loading').removeClass('hide');
               $("#user_details_content").html("&nbsp;");
               var groupid = $('select#UserSearchAll option:selected').val();
               if($.trim(groupid) == ""){
                   groupid = 0;
               }

               if($.trim(val) != ""){
                    $.ajax({
                          type: "GET",
                          cache: false,
                          url: "<?php echo $this->Html->url(array('controller' => 'users','action' => 'search_result_all')); ?>/"+groupid+"/"+val+"/load_first",
                          success: function(data) {
                              $("#search-result-content").html(data);
                              $('.ajax-loading').addClass('hide');
                          }
                     });
               } else {
                    $.ajax({
                        type: "GET",
                        cache: false,
                        url: "<?php echo $this->Html->url(array('controller' => 'users','action' => 'search_result_all')); ?>/"+groupid+"/load_first",
                        success: function(data) {
                            $("#search-result-content").html(data);
                            $('.ajax-loading').addClass('hide');
                        }
                    });
               }
          });
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

