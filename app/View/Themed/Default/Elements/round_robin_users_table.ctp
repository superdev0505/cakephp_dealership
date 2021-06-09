
<?php $input_id =  CakeText::uuid(); ?>
<div>

<div class="widget">
  <div class="widget-head"><h4 class="heading">New Round Robin Filter Group</h4></div>
  <div class="widget-body">

    <div class="row">
      <?php if(!empty($rr_ds_locations_list))  { ?>
      <div class="col-md-3">
        Location: <br><?php echo $this->Form->select('RoundRobinGroup.location_input',$rr_ds_locations_list,
        array("id"=>$input_id."_round_robin_filter_group_location", 'class' => 'input-small','rel'=>'Location','empty'=>"Select")); ?>
      </div>
      <?php } ?>

      <?php if(!empty($rr_ds_conditions_list)) { ?>
      <div class="col-md-3">
      Condition: <br><?php echo $this->Form->select('RoundRobinGroup.condition_input',$rr_ds_conditions_list,
      array("id"=>$input_id."_round_robin_filter_group_condition", 'class' => 'input-small','empty'=>"Select", 'rel'=>"Condition")); ?>
      </div>
      <?php } ?>



      <?php if(!empty($rr_ds_type_list)) { ?>
          <div class="col-md-3">
              Class: <br><?php echo $this->Form->select('RoundRobinGroup.vehicle_type_input',$rr_ds_type_list,
              array("id" => $input_id."_round_robin_filter_group_type", "input-id" => $input_id, 'class' => 'input-small select_type','style'=>'width: 100%',  'empty' => "Select", 'rel' => "Type")); ?>
          </div>
      <?php } ?>

      <?php if(!empty($rr_ds_make_list)) { ?>
          <div class="col-md-3">
              Make: <br><?php echo $this->Form->select('RoundRobinGroup.vehicle_make_input', $rr_ds_make_list,
              array("id" => $input_id."_round_robin_filter_group_make", 'class' => 'input-small', 'empty' => "Select", 'rel' => "Type")); ?>
          </div>
      <?php } ?>


      <?php if(!empty($rr_ds_d_type_list)) { ?>
          <div class="col-md-3">
              Type: <br><?php echo $this->Form->select('RoundRobinGroup.vehicle_d_type_input', $rr_ds_d_type_list,
              array("id" => $input_id."_round_robin_filter_group_d_type", 'class' => 'input-small', 'empty' => "Select", 'rel' => "D Type")); ?>
          </div>
      <?php } ?>

      <?php if(!empty($rr_ds_sources_list)) { ?>

          <div class="col-md-3">
              Source: <br><?php echo $this->Form->select('RoundRobinGroup.source', $rr_ds_sources_list,
              array("id" => $input_id."_round_robin_filter_group_source", 'class' => 'input-small', 'empty' => "Select", 'rel' => "Source")); ?>
          </div>
      <?php } ?>


    </div>

    &nbsp;

    <div class="row">

      <?php if(!empty($rr_ds_categories_list)) {
        if(!empty($rr_contact_type_ar[$vendor_name])){
            foreach($rr_contact_type_ar[$vendor_name] as $cats){
                $rr_ds_categories_list[ $cats ] = $cats;
            }
        }
        asort($rr_ds_categories_list);
        ?>
          <div class="col-md-6">
              Category: <br><?php echo $this->Form->select('RoundRobinGroup.category_input',$rr_ds_categories_list,
              array('multiple' => true, 'style'=>'width: 100%', "id"=>$input_id."_round_robin_filter_group_category", 'class' => 'input-small round_robin_filter_input_category','empty'=>"Select", 'rel'=>"Category")); ?>
          </div>

      <?php } ?>

    </div>

    &nbsp;

    <div class="row">
      <div class="col-md-12" style='text-align: right'>
        Filter Name: <?php echo $this->Form->text('RoundRobinGroup.name_input',
        array("id"=>$input_id."_round_robin_filter_group_name", 'class' => 'form-control input-sm ','empty'=>"Select",
       'style' => array("width: auto; display: inline-block"), 'rel'=>"User")); ?>
        &nbsp;
        <label>
        <input type="checkbox" name="data[RoundRobinGroup][round_robin_filter_group_default]" id="<?php echo $input_id; ?>_round_robin_filter_group_default"
        class=""  value="1"> Set as Default Filter Group
        </label>
        <input type="hidden" name="data[RoundRobinGroup][round_robin_filter_group_vendor]" value="<?php echo $vendor_name; ?>" id="<?php echo $input_id; ?>_round_robin_filter_group_vendor" >
        &nbsp;&nbsp;
        <button type="button" input_id = '<?php echo $input_id; ?>' class="btn btn-success btn-sm btn-round-robin-filtergroup-add">
          <i class="fa fa-plus"></i>
        </button>
      </div>
    </div>



  </div>
</div>
<div style="text-align: right;"></div>
</div>


<h4>Round Robin Filter Group</h4>

<?php
$round_robin_groups = array();
if(isset($round_robin_group_vendor[$vendor_name])){
  $round_robin_groups =   $round_robin_group_vendor[$vendor_name];
}


foreach($round_robin_groups as $row){
  $filter_criterias = array();
?>
  <div class="row">

    <div class="col-md-10" id="RoundRobinGroup_details_container_<?php echo $row['RoundRobinGroup']['id']; ?>">
      <i class="fa fa-group"></i> <strong><?php echo $row['RoundRobinGroup']['group_name']; ?> # <?php echo $row['RoundRobinGroup']['id']; ?> </strong> -

      <?php if($row['RoundRobinGroup']['is_default']){ $filter_criterias[] = "<span class='text-primary'>Default</span>"; }  ?>
      <?php if($row['RoundRobinGroup']['location'] != ''){ $filter_criterias[] = "Location: ".$row['RoundRobinGroup']['location']; }  ?>
          <?php if($row['RoundRobinGroup']['source'] != ''){ $filter_criterias[] = "Source: ".$row['RoundRobinGroup']['source']; }  ?>
      <?php if($row['RoundRobinGroup']['condition'] != ''){ $filter_criterias[] = "Condition: ".$row['RoundRobinGroup']['condition']; }  ?>
      <?php if($row['RoundRobinGroup']['category'] != ''){ $filter_criterias[] = "Category: ".$row['RoundRobinGroup']['category']; }  ?>

      <?php if($row['RoundRobinGroup']['vehicle_type'] != ''){ $filter_criterias[] = "Class: ".$row['RoundRobinGroup']['vehicle_type']; }  ?>
      <?php if($row['RoundRobinGroup']['vehicle_make'] != ''){ $filter_criterias[] = "Make: ".$row['RoundRobinGroup']['vehicle_make']; }  ?>

      <?php if($row['RoundRobinGroup']['d_type'] != ''){ $filter_criterias[] = "Type: ".$row['RoundRobinGroup']['d_type']; }  ?>

      <?php echo implode(", ", $filter_criterias); ?>
    </div>

    <div class="col-md-2 text-right ">

      <button type="button" round-robin-group-id = "<?php echo $row['RoundRobinGroup']['id']; ?>" class="btn btn-primary edit_roundrobingroup_rules btn-xs no-ajaxify"  ><i class="fa fa-pencil"></i></button>
      &nbsp;
      <a href="/rules/roundrobin_group_delete/<?php echo $row['RoundRobinGroup']['id']; ?>" class="btn btn-danger btn-xs no-ajaxify"  onclick="return confirm('Do you want to delete group?')" ><i class="fa fa-times"></i></a>
    </div>
  </div>
  <hr style="margin-bottom: 5px;">
  Sales Person: <?php echo $this->Form->select('round_robin_users_add_user',$rr_ds_users_list,
   array("id"=>$input_id. "-". $row['RoundRobinGroup']['id'] ."-round_robin_users_add_user",'class' => 'input-small round_robin_users_add','empty'=>"Select", 'rel'=>"User")); ?>

  <button type="button"  input_id = "<?php echo $input_id; ?>" roundrobin_group_id = "<?php echo $row['RoundRobinGroup']['id']; ?>"
    class="btn btn-success btn-xs btn-roundrobin-adduser-group">
    <i class="fa fa-plus"></i>
  </button>

  <?php
  $next_receive_ar = array();
  ?>

  <table class="table table-striped table-responsive swipe-horizontal" >
  <!-- Table heading -->
  <thead>
    <tr>
      <th>Sales Person</th>
      <th>Last Received</th>
      <th></th>
    </tr>
  </thead>
  <!-- // Table heading END -->
  <!-- Table body -->
  <?php
  foreach($round_robin_group_users as $row_user){
    if($row_user['RoundRobinUser']['round_robin_group_id'] != $row['RoundRobinGroup']['id']) continue;

    if($row_user['RoundRobinUser']['last_recieve']){
      $next_receive_ar[ strtotime($row_user['RoundRobinUser']['last_recieve']) ] =   $row_user['User']['first_name']. " ". $row_user['User']['last_name'] ;
    } else {
      $next_receive_ar[ intval($row_user['RoundRobinUser']['id']) ] =  $row_user['User']['first_name']. " ". $row_user['User']['last_name'] ;
    }
  ?>
    <tr>
      <td><?php echo $row_user['User']['first_name']; ?> <?php echo $row_user['User']['last_name']; ?></td>
      <td><?php echo ($row_user['RoundRobinUser']['last_recieve'])?  date("m/d/Y h:i:s A", strtotime($row_user['RoundRobinUser']['last_recieve'])) : "---"; ?></td>
      <td> <a href="/rules/round_robin_user_delete/<?php echo $row_user['RoundRobinUser']['id'] ?>" class="btn btn-danger btn-xs no-ajaxify" onclick="return confirm('Do you want to remove user?')" ><i class="fa fa-times"></i></a> </td>
    </tr>

<?php } ?>
</table>

<?php
  if(!empty($next_receive_ar)) :
    ksort($next_receive_ar);
?>
    <strong>Next Receive:</strong> <?php echo array_values($next_receive_ar)[0]; ?>
<?php endif; ?>
<br><br>
<?php } ?>
