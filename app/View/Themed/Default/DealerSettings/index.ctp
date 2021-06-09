<?php $dealer_id = AuthComponent::user('dealer_id'); ?>
<br />
<br /><br />
<br />
<style type="text/css">
    .bad-web-lead-container label {
        display: inline-block;
        margin: 1px 10px 0 0 !important;
    }
</style>

<div class="innerLR">
    <?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>

            <div class="row">
                <div class="col-md-6">

                    <div class="widget widget-heading-simple widget-body-white">

                        <div class="bg-primary innerAll" style="border: 1px solid #e2e1e1">
                            <strong>Dealer Settings #1</strong>
                        </div>


                        <div class="widget-body">


                            24 Follw-up:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="24-follow-up" id="24-follow-up" type="checkbox"  <?php if (isset($dealer_settings['24-follow-up']) && $dealer_settings['24-follow-up'] == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
                            </div>

                            &nbsp;

                            Show all leads:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="show-all-leads" id="show-all-leads" type="checkbox"  <?php if (isset($dealer_settings['show-all-leads']) && $dealer_settings['show-all-leads'] == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
                            </div>

                            &nbsp;

                            Log List View:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="traditional-log-view" id="traditional-log-view" type="checkbox"  <?php if (isset($dealer_settings['traditional-log-view']) && $dealer_settings['traditional-log-view'] == 'On') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>
                            <br><br>
                            Service offset:&nbsp;
                            <?php echo $this->Form->input('service_day_offset', array('value' => $dealer_info['DealerName']['service_day_offset'], 'div' => false, 'type' => 'select', 'label' => false, 'options' => array(2 => '2 ', 5 => '5 ', 7 => '7 ', '14' => '14 '))); ?>
                            &nbsp;days


                            Show 2nd Face:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="show-second-face" id="show-second-face" type="checkbox"  <?php if (isset($dealer_settings['show-second-face']) && $dealer_settings['show-second-face'] == 'On') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>
                            &nbsp;
                            Required 2nd Face:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="required-second-face" id="required-second-face" type="checkbox"  <?php if (isset($dealer_settings['required-second-face']) && $dealer_settings['required-second-face'] == 'On') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>
                            &nbsp;


                            &nbsp;
                            <br><br>
                            Hide Side Menu:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="hide-side-menu" id="hide-side-menu" type="checkbox"  <?php if (isset($dealer_settings['hide-side-menu']) && $dealer_settings['hide-side-menu'] == 'Off') echo ''; else echo 'checked="checked"'; ?>   />
                            </div>
                            &nbsp;

                            Email Process:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="email-process" id="email-process" type="checkbox"  <?php if (isset($dealer_settings['email-process']) && $dealer_settings['email-process'] == 'On') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>
                            &nbsp;

                            <br><br>
                            Location Transfer:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="location_transfer" id="location_transfer" type="checkbox"  <?php if (isset($dealer_settings['location_transfer']) && $dealer_settings['location_transfer'] == 'On') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>
                            &nbsp;

                            Move Lead to Deal:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="move-lead-deal" id="move-lead-deal" type="checkbox"  <?php if (isset($dealer_info['DealerName']['move_lead']) && $dealer_info['DealerName']['move_lead'] == '1') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>
                            <br><br>
                            Start Search Phone/Name:
                            <?php
                            $start_search_value = (isset($dealer_settings['start_search']))? $dealer_settings['start_search'] :   "Name" ;
                            echo $this->Form->input('start_search', array('value'=>$start_search_value, 'type'=>'select','options'=>array("Phone"=>"Phone",'Name'=>'Name','Email'=>'Email'), 'style'=>'width: auto; display: inline-block', 'class'=>'form-control', 'label'=>false, 'div'=>false )); ?>

                             &nbsp;

                            Gender Required:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="gender_required" id="gender_required" type="checkbox"  <?php if (isset($dealer_settings['gender_required']) && $dealer_settings['gender_required'] == 'Off') echo ''; else echo 'checked="checked"'; ?>   />
                            </div>

                           <br><br>

                            After Hrs GSM Push:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="after_hrs_gsm_push" id="after_hrs_gsm_push" type="checkbox"  <?php if (isset($dealer_settings['after_hrs_gsm_push']) && $dealer_settings['after_hrs_gsm_push'] == 'On') echo 'checked="checked"'; else echo ''; ?>   />
                            </div>

                             <?php if(AuthComponent::user('dealer_id') != 1833){ ?>
                             &nbsp;

                             <!-- Logged In - Active Round Robin: -->
                             <br>Active Round Robin - For users that have logged in at least once:
                            <div class="make-switch" data-on="success" data-on-label="Yes" data-off-label="No"  data-off="default">
                                <input  name="logged_active_round_robin" id="logged_active_round_robin" type="checkbox"  <?php if (isset($dealer_settings['logged_active_round_robin']) && $dealer_settings['logged_active_round_robin'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>
                            <?php } ?>

                            <br><br>
                            Duplicate Vendor Merge (Single Lead):
                            <div class="make-switch" data-on="success"   data-off="default">
                                <input  name="duplicate_vendor_merge" id="duplicate_vendor_merge" type="checkbox"  <?php if (isset($dealer_settings['duplicate_vendor_merge']) && $dealer_settings['duplicate_vendor_merge'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>

                            &nbsp;

                            Multiple location merge:
                            <div class="make-switch" data-on="success"   data-off="default">
                                <input  name="multiple_location_merge" id="multiple_location_merge" type="checkbox"  <?php if (isset($dealer_settings['multiple_location_merge']) && $dealer_settings['multiple_location_merge'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>

                              <br><br>

                            Leads Equity Sort (Workload):
                            <div class="make-switch" data-on="success" data-on-label="Oldest" data-off-label="Newest"    data-off="default">
                                <input  name="workload_order" id="workload_order" type="checkbox"  <?php if (isset($dealer_settings['workload_order']) && $dealer_settings['workload_order'] == 'Off') echo ''; else echo 'checked="checked"'; ?>
                                    />
                            </div>


                            <br><br>
                            MGR Sign off:
                            <div class="make-switch" data-on="success"   data-off="default">
                                <input  name="mgr_sign_off" id="mgr_sign_off" type="checkbox"  <?php if (isset($dealer_settings['mgr_sign_off']) && $dealer_settings['mgr_sign_off'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>

                             &nbsp;

                            Vehicle Match Alert:
                            <div class="make-switch" data-on="success"   data-off="default">
                                <input  name="vehicle_match_alert" id="vehicle_match_alert" type="checkbox"  <?php if (isset($dealer_settings['vehicle_match_alert']) && $dealer_settings['vehicle_match_alert'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>


                             <br><br>
                            Equity Search Show All:
                            <div class="make-switch" data-on="success"   data-off="default">
                                <input  name="equity_sperson" id="equity_sperson" type="checkbox"  <?php if (isset($dealer_settings['equity_sperson']) && $dealer_settings['equity_sperson'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>
                             &nbsp;
                             Email Validation:
                            <div class="make-switch" data-on="success"   data-off="default">
                                <input  name="email_required" id="email_required" type="checkbox"  <?php if (isset($dealer_settings['email_required']) && $dealer_settings['email_required'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>

                             <br><br>
                            Originator Change (Internet):
                            <div class="make-switch" data-on="success"   data-off="default">
                                <input  name="owner_change_internet" id="owner_change_internet" type="checkbox"  <?php if (isset($dealer_settings['owner_change_internet']) && $dealer_settings['owner_change_internet'] == 'On') echo 'checked="checked"'; else echo ''; ?>
                                    />
                            </div>

                            <br><br>
                            Event Auto Time:
                            <div class="input-group bootstrap-timepicker" style="display: inline-block" >
                            <?php
                            $event_time_value =  (isset($dealer_settings['auto_event_time']))? $dealer_settings['auto_event_time'] : "10:00 AM";



                            echo $this->Form->input('auto_event_time', array("value" => $event_time_value, "style" => "width: 100px; display: inline-block", 'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
                             </div> <button class="btn btn-success btn-sm" id="save_event_auto_time">Save Event Time</button>



                             <br><br>
                            Business Hour: Start
                            <div class="input-group bootstrap-timepicker" style="display: inline-block" >
                            <?php
                            $business_hours_start =  (isset($dealer_settings['business_hours_start']))? $dealer_settings['business_hours_start'] : "08:00 AM";
                            echo $this->Form->input('business_hours_start', array("value" => $business_hours_start, "style" => "width: 100px; display: inline-block", 'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
                             </div>
                             End
                             <div class="input-group bootstrap-timepicker" style="display: inline-block" >
                            <?php
                            $business_hours_end =  (isset($dealer_settings['business_hours_end']))? $dealer_settings['business_hours_end'] : "08:00 PM";
                            echo $this->Form->input('business_hours_end', array("value" => $business_hours_end, "style" => "width: 100px; display: inline-block", 'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
                             </div>

                             <button class="btn btn-success btn-sm" id="save_business_hours">Save Business Hours</button>

                             <br><br>

                            State/Provinces:
                            <div class="make-switch" data-on="success" data-on-label="US" data-off-label="CA"    data-off="default">
                                <input  name="state_provinces" id="state_provinces" type="checkbox"  <?php if (isset($dealer_settings['state_provinces']) && $dealer_settings['state_provinces'] == 'Off') echo ''; else echo 'checked="checked"'; ?>
                                    />
                            </div>
                            &nbsp; &nbsp;
                            Report Range Limit:
                            <div class="make-switch" data-on="success"     data-off="default">
                                <input  name="report_range_limit" id="report_range_limit" type="checkbox"  <?php if (isset($dealer_settings['report_range_limit']) && $dealer_settings['report_range_limit'] == 'Off') echo "" ; else echo 'checked="checked"' ; ?>
                                    />
                            </div>

                            <?php $get_country_list = $this->App->getCountryList(); ?>
                          <br/><br/>
                           Country:&nbsp;

						   <?php echo $this->Form->input('dealer_country',array('label'=> false,'div' =>false,'class'=>'form-control dealer-default-settings','type' => 'select','name' =>'dealer_country','options' => $get_country_list,'style' =>'width:32%;display:initial;','value' => $dealer_settings['dealer_country']));  ?>&nbsp;&nbsp;&nbsp;Locale&nbsp; <?php echo $this->Form->input('dealer_locale',array('label'=> false,'div' =>false,'class'=>'form-control dealer-default-settings','name' =>'dealer_locale','type' => 'select','options' => $this->App->getLocaleList(),'style' =>'width:32%;display:initial;','value' => $dealer_settings['dealer_locale']));  ?>

                            <br><br>

                            <div class="row">
                                <div class="col-md-5">
                                    Location Names:
                                    <div class="make-switch" data-on="success"     data-off="default">
                                        <input  name="location_names" id="location_names" type="checkbox"  <?php if (isset($dealer_settings['location_names']) && $dealer_settings['location_names'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                            />
                                    </div>
                                </div>
                                 <div class="col-md-5">
                                    Service Search:
                                    <div class="make-switch" data-on="success"     data-off="default">
                                        <input  name="service_search" id="service_search" type="checkbox"  <?php if (isset($dealer_settings['service_search']) && $dealer_settings['service_search'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                            />
                                    </div>
                                </div>
                                <br/><br/>
                                 <div class="col-md-5">
                                    Lightspeed Search:
                                    <div class="make-switch" data-on="success"     data-off="default">
                                        <input  name="lightspeed_search" id="lightspeed_search" type="checkbox"  <?php if (isset($dealer_settings['lightspeed_search']) && $dealer_settings['lightspeed_search'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                            />
                                    </div>
                                </div>
                                <br/><br/>
                                 <div class="col-md-6">
                                    Add MGRs to Lead Push Options:
                                    <div class="make-switch" data-on="success"     data-off="default">
                                        <input  name="add_mgr_group_to_lead_push_options" id="add_mgr_group_to_lead_push_options" type="checkbox"  <?php if (isset($dealer_settings['add_mgr_group_to_lead_push_options']) && $dealer_settings['add_mgr_group_to_lead_push_options'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                            />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                 	Transfer Lead Opt. (Create New Lead):
                                    <div class="make-switch" data-on="success"     data-off="default">
                                        <input  name="tranfer_lead_to_salesperson" id="tranfer_lead_to_salesperson" type="checkbox"  <?php if (isset($dealer_settings['tranfer_lead_to_salesperson']) && $dealer_settings['tranfer_lead_to_salesperson'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                            />
                                    </div>
                                </div>

                                <br/><br/>
                                <div class="col-md-6">
                                   Turn on Advanced Round Robin Rules
                                   <div class="make-switch" data-on="success"     data-off="default">
                                       <input  name="advanced_round_robin_rules" id="advanced_round_robin_rules" type="checkbox"  <?php if (isset($dealer_settings['advanced_round_robin_rules']) && $dealer_settings['advanced_round_robin_rules'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                           />
                                   </div>
                                </div>

                                <div class="col-md-6">
                                   CASL Feature
                                   <div class="make-switch" data-on="success"     data-off="default">
                                       <input  name="casl_feature" id="casl_feature" type="checkbox"  <?php if (isset($dealer_settings['casl_feature']) && $dealer_settings['casl_feature'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                           />
                                   </div>
                                </div>
                                <br/><br/>
                                <div class="col-md-6">
                                   Dealer Visit Lead Action
                                   <div class="make-switch" data-on="success"     data-off="default">
                                       <input  name="dealer_visit" id="dealer_visit" type="checkbox"  <?php if (isset($dealer_settings['dealer_visit']) && $dealer_settings['dealer_visit'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                           />
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   Dealer Visit Lead Action Showroom Leads
                                   <div class="make-switch" data-on="success"     data-off="default">
                                       <input  name="dealer_visit_showroom" id="dealer_visit_showroom" type="checkbox"  <?php if (isset($dealer_settings['dealer_visit_showroom']) && $dealer_settings['dealer_visit_showroom'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                           />
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   Leads Auto Merge Email Notification
                                   <div class="make-switch" data-on="success"     data-off="default">
                                       <input  name="auto_merge_notification" id="auto_merge_notification" type="checkbox"  <?php if (isset($dealer_settings['auto_merge_notification']) && $dealer_settings['auto_merge_notification'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                           />
                                   </div>
                                </div>
                                <br/><br/>
                                <div class="col-md-12" style="background-color: rgb(230, 243, 220)">
                                   CASL Unsubscribe Page
                                    <?php echo $this->Form->input("casl_unsubscribe_page", array('style' => 'width: 100%', 'label' => false, 'type'=>'textarea', 'value' => $caslUnsubscribe_content)); ?>
                                    <button type="button" id="save_casl_unsubscribe_page" class="btn btn-success pull-right" style="margin-top: 10px; margin-bottom: 10px;">Save</button>
                                </div>
                                <br/><br/>
                                <div class="col-md-12" style="background-color: rgb(230, 243, 220)">
                                   Send Calendar Invite Email Subject
                                    <?php echo $this->Form->input("calendar_invite_subject", array('style' => 'width: 100%', 'label' => false, 'type'=>'textarea', 'value' => $calendar_invitation_data['subject'])); ?>
                                   Send Calendar Invite Email Content
                                    <?php echo $this->Form->input("calendar_invite_content", array('style' => 'width: 100%', 'label' => false, 'type'=>'textarea', 'value' => $calendar_invitation_data['content'])); ?>
                                    <button type="button" id="save_calendar_invite" class="btn btn-success pull-right" style="margin-top: 10px; margin-bottom: 10px;">Save</button>
                                </div>

                                <br/><br/>
                                <div class="col-md-12">
                                    <br>

                                    <div id="add_location_div" style="">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="field_add_location" placeholder="Location Name">
                                                  <span class="input-group-btn">
                                                    <button class="btn btn-success" id="submit_add_location" type="button">Add Location</button>
                                                  </span>
                                            </div>
                                        </div>

                                        <div id="locations_list">
                                            <table class="table table-striped table-responsive swipe-horizontal table-condensed ">
                                                <thead>
                                                <tr class="bg-inverse">
                                                    <th>Location Name</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                                <?php foreach($locationNames as $locationName){ ?>
                                                <tr>
                                                    <td class="border-bottom innerAll">
                                                        <?php echo $locationName['LocationName']['location_name']; ?>
                                                    </td>
                                                    <td class="border-bottom innerAll text-right">
                                                        <button data-location-id = '<?php echo $locationName['LocationName']['id']; ?> ' type="button" class="btn btn-xs btn-danger delete_your_locatioin"><i class="fa fa-times"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <br>
                            <hr>
                            <br>



                            <div class="row">

                                <div class="col-md-5">
                                   Lead Change Report:
                                    <div class="make-switch" data-on="success"     data-off="default">
                                        <input  name="lead_change_report" id="lead_change_report" type="checkbox"  <?php if (isset($dealer_settings['lead_change_report']) && $dealer_settings['lead_change_report'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?>
                                            />
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-12" style="background-color: #d9edf7" >

                                    <div id="lead_change_report_group_div" style="margin-top: 10px">


                                         <div class="row">
                                            <div class="col-md-4">
                                                Report Range:
                                                <?php
                                                $lead_change_report_range_value = 7;
                                                if(!empty($dealer_settings['lead_change_report_range'])){
                                                    $lead_change_report_range_value = $dealer_settings['lead_change_report_range'];
                                                }
                                                $step_opt = array(
                                                    '7' => '1 Week',
                                                    '14' => '2 Weeks',
                                                    '30' => '1 Month'
                                                );

                                                echo $this->Form->input('lead_change_report_range', array( 'label'=>false, 'div' => false,
                                                'empty'=>false,  'value' => $lead_change_report_range_value,
                                                'options' => $step_opt, 'type'=>'select', 'class' => 'form-control', 'style'=>"width: auto; display: inline-block;"));

                                                ?>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="field_lead_change_alert_group" placeholder="Email">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-success" id="submit_lead_change_alert_group" type="button">Add Email</button>
                                                          </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="lead_change_alert_group_list">
                                            <table class="table table-striped table-responsive swipe-horizontal table-condensed ">
                                                <thead>
                                                <tr class="bg-inverse">
                                                    <th>Lead Change Report Group</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                                <?php foreach($lead_change_alert_emails as $lead_change_alert_email){ ?>
                                                <tr>
                                                    <td class="border-bottom innerAll">
                                                        <?php echo $lead_change_alert_email['LeadChangeAlertEmail']['email']; ?>
                                                    </td>
                                                    <td class="border-bottom innerAll text-right">
                                                        <button data-alert-id = '<?php echo $lead_change_alert_email['LeadChangeAlertEmail']['id']; ?>' type="button" class="btn btn-xs btn-danger delete_lead_change_alert"><i class="fa fa-times"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>


                                </div>


                                <div class="col-md-12"> &nbsp; </div>


                                <div class="col-md-12" style="background-color: rgb(230, 243, 220)" >



                                    <div id="lead_change_report_group_div" style="margin-top: 10px">


                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Duplicate Lead Alert</h4>
                                            </div>
                                            <div class="col-md-4">
                                                Duration:
                                                <?php
                                                $lead_dup_report_duration_value = "";
                                                if(!empty($duplicateLeadAlert)){
                                                    $lead_dup_report_duration_value = $duplicateLeadAlert['DuplicateLeadAlert']['notification_duration'];
                                                }
                                                $step_opt = array(
                                                    '30' => '1 Month',
                                                    '60' => '2 Months',
                                                    '90' => '3 Months'
                                                );

                                                echo $this->Form->input('lead_dup_lead_range_notification_duration', array( 'label'=>false, 'div' => false,
                                                'empty'=>"Select",  'value' => $lead_dup_report_duration_value,
                                                'options' => $step_opt, 'type'=>'select', 'class' => 'form-control', 'style'=>"width: auto; display: inline-block;"));

                                                ?>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="field_dup_lead_alert_group" placeholder="Email">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-success" id="submit_dup_lead_alert_group" type="button">Add Email</button>
                                                          </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="lead_dup_alert_group_list">
                                            <table class="table table-striped table-responsive swipe-horizontal table-condensed ">
                                                <thead>
                                                <tr >
                                                    <th>Recipients</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                                <?php foreach($duplicateLeadAlert_recipients as $duplicateLeadAlert_recipient){ ?>
                                                <tr>
                                                    <td class="border-bottom innerAll">
                                                        <?php echo $duplicateLeadAlert_recipient; ?>
                                                    </td>
                                                    <td class="border-bottom innerAll text-right">
                                                        <button data-alert-id = '<?php echo $duplicateLeadAlert_recipient; ?>' type="button" class="btn btn-xs btn-danger delete_dup_lead_alert"><i class="fa fa-times"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-12" >&nbsp;</div>
                                <!-- Dormant Notification settings start -->

                                <div class="col-md-12" style="background-color: rgb(230, 243, 240)" >

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 style="margin-top: 10px">Dormant Notification</h4>
                                        </div>
                                        <div class="col-md-4">
                                            Dormant Time:
                                            <?php
                                            $dormant_time = "";
                                            if (isset($dealer_settings['dormant_time'])){
                                                $dormant_time = $dealer_settings['dormant_time'];
                                            }
                                            $dormant_time_opt = array(
                                                '1' => '1 Day',
                                                '2' => '2 Day',
                                                '3' => '3 Day',
                                                '4' => '4 Day',
                                                '5' => '5 Day',
                                                '6' => '6 Day',
                                                '7' => '7 Day',
                                                '8' => '8 Day',
                                                '9' => '9 Day',
                                                '10' => '10 Day'
                                            );
                                            echo $this->Form->input('dormant_time', array( 'label'=>false, 'div' => false,
                                            'empty'=>"Select",  'value' => $dormant_time ,
                                            'options' => $dormant_time_opt, 'type'=>'select', 'class' => 'form-control', 'style'=>"width: auto; display: inline-block;"));
                                            ?>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="field_dormant_lead_alert_group" placeholder="Email">
                                                      <span class="input-group-btn">
                                                        <button class="btn btn-success" id="submit_dormant_lead_alert_group" type="button">Add Email</button>
                                                      </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="lead_dormant_alert_group_list">
                                        <table class="table table-striped table-responsive swipe-horizontal table-condensed ">
                                            <thead>
                                            <tr >
                                                <th>Recipients</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                            <?php foreach($dormantLeadAlert_recipients as $dormantLeadAlert_recipient){ ?>
                                            <tr>
                                                <td class="border-bottom innerAll">
                                                    <?php echo $dormantLeadAlert_recipient; ?>
                                                </td>
                                                <td class="border-bottom innerAll text-right">
                                                    <button data-alert-id = '<?php echo $dormantLeadAlert_recipient; ?>' type="button" class="btn btn-xs btn-danger delete_dormant_lead_alert"><i class="fa fa-times"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div>
                                <!-- Dormant Notificatin settings Ends -->








                            </div>




















                            </div>
                        </div>


                </div>



                <!-- D type settings start -->
                <div class="col-md-6">
                     <div class="widget widget-heading-simple widget-body-white">

                         <div class="bg-primary innerAll" style="border: 1px solid #e2e1e1">
                            <strong>Dealer Settings #2</strong>
                        </div>


                        <div class="widget-body">

                            <?php $cnt = 1;
                            foreach ($d_type_options_popup as $key => $value) { ?>
                                <span style='display: inline-block; ' ><?php echo $key; ?> &nbsp; &nbsp;</span>
                                <div class="make-switch" data-on="success" data-off="default" style='margin-bottom: 10px;' >
                                    <input name="<?php echo $key; ?>" id="<?php echo $key; ?>" class='d_type_settings' type="checkbox"
                                    <?php if (isset($current_d_type_settings[$key]) && $current_d_type_settings[$key] == 'Off')
                                        echo ''; else
                                        echo 'checked="checked"';
                                    ?>
                                           />
                                </div> &nbsp;

                            <?php if ($cnt % 3 == 0) echo "<br>"; $cnt++;
                            } ?>

                            <span style='display: inline-block; ' >In Stock:</span>
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="in-stock" id="in-stock" type="checkbox"
                            <?php if (isset($dealer_settings['in-stock']) && $dealer_settings['in-stock'] == 'Off') echo ""; else echo 'checked="checked"'; ?>   />
                            </div>
                            <br />
                            <br />
                            <?php //if(in_array(AuthComponent::user('dealer_id'),array(2501,5000))){  ?>
                            Turn OFF BDC Auto Alert:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="bdc-alert-status" id="bdc-alert-status" type="checkbox"  <?php if (isset($dealer_info['DealerName']['bdc_alert']) && $dealer_info['DealerName']['bdc_alert'] == '1') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>
                            <?php //}  ?>

                            &nbsp;

                            Address Validation (Sold):
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="address-validation" id="address-validation" type="checkbox"  <?php if (isset($dealer_settings['address-validation']) && $dealer_settings['address-validation'] == 'On') echo 'checked="checked"'; else echo ""; ?>   />
                            </div>

                            <br />
                            <br />

                            <div class='bad-web-lead-container'>
                                <span>Remove Bad Lead:</span>
                                <br>
                                <?php
                                $allowed_group = array();
                                if (isset($dealer_settings['bad_web_lead_group'])) {
                                    if ($dealer_settings['bad_web_lead_group'] != '') {
                                        $lstar = explode(",", $dealer_settings['bad_web_lead_group']);
                                        foreach ($lstar as $lsar) {
                                            $allowed_group[$lsar] = 1;
                                        }
                                    }
                                } else {
                                    foreach ($groups as $key => $value) {
                                        if ($key == '8' || $key == '3' || $key == '7')
                                            continue;
                                        $allowed_group[$key] = 1;
                                    }
                                }
                                //debug($allowed_group);
                                foreach ($groups as $key => $value) {
                                    echo $this->Form->input('settings_bad_leads_' . $key, array('checked' => isset($allowed_group[$key]), 'hiddenField' => false, 'div' => false, 'class' => 'bad_web_lead_ckbox', 'label' => $value, 'value' => $key, 'type' => 'checkbox'));
                                }
                                ?>
                            </div>
                            <br />
                            <div class='bad-web-lead-container'>
                                <span>Holidays:</span>
                                <br>
                                <?php
                                $week_days = array('1'=>"Monday",'2'=>'Tuesday','3'=>'Wednesday','4'=>'Thursday','5'=>'Friday','6'=>'Saturday','7'=>'Sunday');
                                $selected_holidays = array();
                                if (isset($dealer_settings['holidays'])) {
                                    if ($dealer_settings['holidays'] != '') {
                                        $lstar = explode(",", $dealer_settings['holidays']);
                                        foreach ($lstar as $lsar) {
                                            $selected_holidays[$lsar] = 1;
                                        }
                                    }
                                }
                                //debug($selected_holidays);
                                foreach ($week_days as $key => $value) {
                                    echo $this->Form->input('settings_holidays_' . $key, array('checked' => isset($selected_holidays[$key]), 'hiddenField' => false, 'div' => false, 'class' => 'holidays_ckbox', 'label' => $value, 'value' => $key, 'type' => 'checkbox'));
                                }
                                ?>
                            </div>

                            <br>
                            <div class='bad-web-lead-container'>
                                <span>Shopper Notification:</span>
                                <br>
                                <?php
                                $allowed_group_shopper = array();
                                if (isset($dealer_settings['shopper_notification_group'])) {
                                    if ($dealer_settings['shopper_notification_group'] != '') {
                                        $lstar = explode(",", $dealer_settings['shopper_notification_group']);
                                        foreach ($lstar as $lsar) {
                                            $allowed_group_shopper[$lsar] = 1;
                                        }
                                    }
                                }else{
                                    foreach ($groups as $key => $value) {
                                        $allowed_group_shopper[ $key ] = 1;
                                    }
                                }
                                foreach ($groups as $key => $value) {
                                    echo $this->Form->input('settings_shopper_group_' . $key, array('checked' => isset($allowed_group_shopper[$key]), 'hiddenField' => false, 'div' => false, 'class' => 'shopper_notification_ckbox', 'label' => $value, 'value' => $key, 'type' => 'checkbox'));
                                }
                                ?>
                            </div>

                              <br>
                             <div class='bad-web-lead-container'>
                                <strong>Move Lead Allowed Group:</strong>
                                <br>
                                <?php
                                $movelead_allowed_group = array();
                                if (isset($dealer_settings['move_lead_allowed_group'])) {
                                    if ($dealer_settings['move_lead_allowed_group'] != '') {
                                        $movelead_allowed_group= explode(",", $dealer_settings['move_lead_allowed_group']);
                                    }
                                }else{
										$movelead_allowed_group = $this->App->default_settings('move_lead_allowed_group');
                                }
                                foreach ($groups as $key => $value) {
                                    echo $this->Form->input('move_lead_allowed_group' . $key, array('checked' => in_array($key,$movelead_allowed_group), 'hiddenField' => false, 'div' => false, 'class' => 'move_lead_allowed_group', 'label' => $value, 'value' => $key, 'type' => 'checkbox'));
                                }
                                ?>
                            </div>

                            <br>
                            <div class=''>
                                <span>Dealer Spike Leads:</span>
                                <br>
                                <?php
                                $dealerspike_sources = array(
                                    "Dealer Spike - Employment",
                                    "Dealer Spike - Rental Form",
                                    "Dealer Spike - Parts Request",
                                    "Dealer Spike - Schedule Service",
                                    "Dealer Spike - Contact Form",
                                    "Dealer Spike - LeadPop"
                                );

                                $cnt = 1;
                                foreach ($dealerspike_sources as $value) {
                                ?>

                                <span style='display: inline-block; ' ><?php echo $value; ?> &nbsp; &nbsp;</span>
                                <div class="make-switch" data-on="success" data-off="default" style='margin-bottom: 10px;' >
                                <input name="<?php echo $value; ?>" id="<?php echo $value; ?>" class='dealerspike_lead_settings' type="checkbox"

                                <?php

                                if (isset($current_SettingsDealerspike[$value]) && $current_SettingsDealerspike[$value] == 'Off')
                                    echo '';
                                else
                                    echo 'checked="checked"';
                                ?>
                                />
                                </div> &nbsp;

                                <?php if ($cnt % 1 == 0) echo "<br>"; $cnt++; } ?>
                            </div>


                            DNC BDC Only:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="dnc_bdc_only" id="dnc_bdc_only" type="checkbox"  <?php if (isset($dealer_settings['dnc_bdc_only']) && $dealer_settings['dnc_bdc_only'] == 'On') echo 'checked="checked"'; else echo "" ; ?>   />
                            </div>
                               &nbsp;&nbsp;
                            QR Code Activation:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="qr_code_activation" id="qr_code_activation" type="checkbox"  <?php if (isset($dealer_settings['qr_code_activation']) && $dealer_settings['qr_code_activation'] == 'On') echo 'checked="checked"'; else echo "" ; ?>   />
                            </div>
                            <br><br>
                            Additional Contact:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="additional_contact" id="additional_contact" type="checkbox"  <?php if (isset($dealer_settings['additional_contact']) && $dealer_settings['additional_contact'] == 'On') echo 'checked="checked"'; else echo "" ; ?>   />
                            </div>
                            &nbsp;&nbsp;
                            Validate Method Of Payment:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="validate_method_of_payment" id="validate_method_of_payment" type="checkbox"  <?php if (isset($dealer_settings['validate_method_of_payment']) && $dealer_settings['validate_method_of_payment'] == 'On') echo 'checked="checked"'; else echo "" ; ?>   />
                            </div>

                            <br><br>
                            Team Breakdown:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="team_breakdown" id="team_breakdown" type="checkbox"  <?php if (isset($dealer_settings['team_breakdown']) && $dealer_settings['team_breakdown'] == 'On') echo 'checked="checked"'; else echo "" ; ?>   />
                            </div>
                             <br><br>
                            Forms View:
                            <?php
                            $forms_view_values = array();
                            if(empty($dealer_settings['forms_view'])){
                                $all_groups_ids = array_keys($groups);
                                $forms_view_values = $all_groups_ids;
                            }else{
                                $forms_view_values = explode(",", $dealer_settings['forms_view']);
                            }

                            echo $this->Form->input('forms_view',array( 'label'=>false, 'div' => false, 'multiple'=>true, 'empty'=>"Select", 'id' => 'ManageTeamTeamMember',  'value' => $forms_view_values, 'options' => $groups, 'type'=>'select', 'hiddenField' => false, 'style' => 'width: 100%')); ?>

                            <br><br>
                            Multi Vehicle Step:
                            <?php
                            $multi_deal_higher_step_values = 1;
                            if(!empty($dealer_settings['multi_deal_higher_step'])){
                                $multi_deal_higher_step_values = $dealer_settings['multi_deal_higher_step'];
                            }
                            $step_opt = array();
                            for($i=1; $i <= 9; $i++){
                                $step_opt[$i] = $i;
                            }
                            echo $this->Form->input('multi_deal_higher_step', array( 'label'=>false, 'div' => false,
                            'empty'=>false,  'value' => $multi_deal_higher_step_values,
                            'options' => $step_opt, 'type'=>'select', 'class' => '', ));

                            ?>
                             &nbsp;&nbsp;
                            Log-In Goal:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="log_in_goal" id="log_in_goal" type="checkbox"  <?php if (isset($dealer_settings['log_in_goal']) && $dealer_settings['log_in_goal'] == 'On') echo 'checked="checked"'; else echo "" ; ?>   />
                            </div>

                            <br><br>
                            DNC Manual Upload / Process:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="dnc_manual_uplaod_process" id="dnc_manual_uplaod_process" type="checkbox"  <?php if (isset($dealer_settings['dnc_manual_uplaod_process']) && $dealer_settings['dnc_manual_uplaod_process'] == 'On') echo 'checked="checked"'; else echo "" ; ?>   />
                            </div>
                             <br><br>

                             Person In The Dealership Notification (Add New Lead Form):
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="person_in_dealership" id="person_in_dealership" type="checkbox"  <?php if (isset($dealer_settings['person_in_dealership']) && $dealer_settings['person_in_dealership'] == 'Off') echo ""; else echo 'checked="checked"' ; ?>   />
                            </div>
                            <br><br>

                            Status Update Optional in Event (Add/Edit):
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="status_update_optional_event" id="status_update_optional_event" type="checkbox"  <?php if (isset($dealer_settings['status_update_optional_event']) && $dealer_settings['status_update_optional_event'] == 'Off') echo ''; else echo 'checked="checked"' ; ?>   />
                            </div>
                            <br><br>


                            <?php
                            //$freedom_group = array(1640,762,262,759,758,760,761,491,492,1627,1626,1406,1912);
                           // if(!in_array($dealer_id, $freedom_group)){
                            ?>

                            Lead Statuses Required (New Lead Form):
                            <div data-toggle="tooltip"
                                data-original-title=" OFF: Auto status will be assigned in new lead form"
                                data-placement="top" class="make-switch" data-on="success" data-off="default">
                                <input name="lead_status_required_new_lead" id="lead_status_required_new_lead" type="checkbox"  <?php if (isset($dealer_settings['lead_status_required_new_lead']) && $dealer_settings['lead_status_required_new_lead'] == 'On') echo 'checked="checked"';  else  echo '';
                                 ?>   />
                            </div>
                            <?php
                            //}
                            ?>
                            <br><br>


                            Restrict All Events for Salesperson:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="restrict_events_employee" id="restrict_events_employee" type="checkbox"  <?php if (isset($dealer_settings['restrict_events_employee']) && $dealer_settings['restrict_events_employee'] == 'On') echo 'checked="checked"'; else echo ''; ?>   />
                            </div>
                            <br><br>


                            Required Year/Make/Model:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="required_year_make_model" id="required_year_make_model" type="checkbox"  <?php if (isset($dealer_settings['required_year_make_model']) && $dealer_settings['required_year_make_model'] == 'Off') echo "" ; else echo 'checked="checked"' ; ?>   />
                            </div>
                            <br><br>


							 Required Unit Value/Price:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="unit_value_price" id="unit_value_price" type="checkbox"  <?php if (isset($dealer_settings['unit_value_price']) && $dealer_settings['unit_value_price'] == 'Off') echo "" ; else echo 'checked="checked"' ; ?>   />
                            </div>
                            <br><br>


                            Log Change Notification:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="log_change_notification" id="log_change_notification" type="checkbox"  <?php if (isset($dealer_settings['log_change_notification']) && $dealer_settings['log_change_notification'] == 'On') echo 'checked="checked"'  ; else echo "" ; ?>   />
                            </div>

                            <br><br>

                            MGR Lead Action - No Lead Ownership:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="mgr_lead_action_no_lead_ownership" id="mgr_lead_action_no_lead_ownership" type="checkbox"  <?php if (isset($dealer_settings['mgr_lead_action_no_lead_ownership']) && $dealer_settings['mgr_lead_action_no_lead_ownership'] == 'On') echo 'checked="checked"'  ; else echo "" ; ?>   />
                            </div>


                            <br><br>

                            Restrict Eblast for Sales Person:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="restrict_eblast_salesperson" id="restrict_eblast_salesperson" type="checkbox"  <?php if (isset($dealer_settings['restrict_eblast_salesperson']) && $dealer_settings['restrict_eblast_salesperson'] == 'On') echo 'checked="checked"'  ; else echo "" ; ?>   />
                            </div>

                            <br><br>

                            Activate Lite Version CRM:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="activate_lite_version" id="activate_lite_version" type="checkbox"  <?php if (isset($dealer_settings['activate_lite_version']) && $dealer_settings['activate_lite_version'] == 'On') echo 'checked="checked"'  ; else echo "" ; ?>   />
                            </div>
                            <br><br>
                            Stock Num Required for Sold Lead:
                            <div class="make-switch" data-on="success" data-off="default">
                                <input name="stock_num_required_sold" id="stock_num_required_sold" type="checkbox"  <?php if (isset($dealer_settings['stock_num_required_sold']) && $dealer_settings['stock_num_required_sold'] == 'Off') echo "" ; else echo 'checked="checked"'  ; ?>   />
                            </div>








                            <br><br>
                            <!-- Custom Event Type start -->
                            <div class="row">

                                <div class="col-md-12" style="background-color: rgb(230, 243, 240)" >

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 style="margin-top: 10px">Event Types</h4>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="field_custom_event_type_name" placeholder="Event Type">
                                                      <span class="input-group-btn">
                                                        <button class="btn btn-success" id="submit_custom_event_type" type="button">+ Add</button>
                                                      </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>

                                    <div id="custom_event_type_list_container">
                                        <table class="table table-striped table-responsive swipe-horizontal table-condensed ">
                                            <thead>
                                            <tr >
                                                <th>Event Types</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                            <?php foreach($eventCustomTypes as $eventCustomType){ ?>
                                            <tr>
                                                <td class="border-bottom innerAll">
                                                    <?php echo $eventCustomType['EventType']['name']; ?>
                                                </td>
                                                <td class="border-bottom innerAll text-right">
                                                    <button data-alert-id = '<?php echo $eventCustomType['EventType']['id']; ?>' type="button" class="btn btn-xs btn-danger delete_custom_event_type"><i class="fa fa-times"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- Custom Event Type Ends -->















                        </div>


                    </div>

                </div>
                <!-- D Type Settings End -->


            <!-- Lead Rule Filters -->


            <?php if($advanced_round_robin_dealer_setting["DealerSetting"]["value"] == 'On'){ ?>
                <div class="col-md-6">
                    <div class="widget widget-heading-simple widget-body-white">
                        <!-- Widget heading -->
                        <div class="widget-head">
                            <h4 class="heading">Advanced Round Robin Section</h4>
                        </div>
                        <div class="widget-body">

            <div class="row" style="background-color: lightgrey;padding: 10px 0px 30px 0px;">

              <div class="col-md-12">
                <h3>Lead Rule Filters</h3>
              </div>
              <br><br>
              <div class="col-md-6">
                <h4>Advanced Lead Rule Filters</h4>
                <hr><br>

                Filter on Vehicle Type:
                <div class="make-switch" data-on="success" data-off="default">
                  <input  name="lead_rule_filter_d_type" id="lead_rule_filter_d_type" type="checkbox"  <?php if (isset($dealer_settings['lead_rule_filter_d_type']) && $dealer_settings['lead_rule_filter_d_type'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?> />
                </div><br><br>

                Filter on Vehicle Class:
                <div class="make-switch" data-on="success" data-off="default">
                  <input  name="lead_rule_filter_type" id="lead_rule_filter_type" type="checkbox"  <?php if (isset($dealer_settings['lead_rule_filter_type']) && $dealer_settings['lead_rule_filter_type'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?> />
                </div><br><br>

                Filter on Vehicle Make:
                <div class="make-switch" data-on="success" data-off="default">
                  <input  name="lead_rule_filter_make" id="lead_rule_filter_make" type="checkbox"  <?php if (isset($dealer_settings['lead_rule_filter_make']) && $dealer_settings['lead_rule_filter_make'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?> />
                </div><br><br>

                Filter on Vehicle Category:
                <div class="make-switch" data-on="success" data-off="default">
                  <input  name="lead_rule_filter_category" id="lead_rule_filter_category" type="checkbox"  <?php if (isset($dealer_settings['lead_rule_filter_category']) && $dealer_settings['lead_rule_filter_category'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?> />
                </div><br><br>

                Filter on Vehicle Condition:
                <div class="make-switch" data-on="success"     data-off="default">
                  <input  name="lead_rule_filter_condition" id="lead_rule_filter_condition" type="checkbox"  <?php if (isset($dealer_settings['lead_rule_filter_condition']) && $dealer_settings['lead_rule_filter_condition'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?> />
                </div><br><br>

                Filter on Vehicle Location  <br><small>For clients with multiple location</small>:
                <div class="make-switch" data-on="success"     data-off="default">
                  <input  name="lead_rule_filter_location" id="lead_rule_filter_location" type="checkbox"  <?php if (isset($dealer_settings['lead_rule_filter_location']) && $dealer_settings['lead_rule_filter_location'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?> />
                </div><br><br>
                Filter on Lead Source:
                <div class="make-switch" data-on="success"     data-off="default">
                  <input  name="lead_rule_filter_source" id="lead_rule_filter_source" type="checkbox"  <?php if (isset($dealer_settings['lead_rule_filter_source']) && $dealer_settings['lead_rule_filter_source'] == 'On') echo 'checked="checked"' ; else echo ""  ; ?> />
                </div><br>

              </div>

            </div><br><hr><br>

            </div>
            </div>
            </div>

            <?php } ?>
            <!-- Lead Change Report -->

          </div>

    <?php /* ?><div class="row">


      <div class="col-md-12">


      <!-- Widget -->
      <div class="widget widget-heading-simple widget-body-white">

      <!-- Widget heading -->
      <div class="widget-head">
      <h4 class="heading">Dealership Logo</h4>
      </div>
      <!-- // Widget heading END -->

      <div class="widget-body">
      <div class="row">
      <?php echo $this->Form->create('DealerName',array('class'=>'apply-nolazy','type'=>'file','url'=>array('controller'=>'dealer_settings','action'=>'upload_coupon_image')));
      echo $this->Form->hidden('id',array('value'=>$dealer_info['DealerName']['id']));
      ?>


      <div class="col-md-3">
      Dealership Logo: <input type="file" name="data[DealerName][dealer_logo]" />
      </div>
      <?php if(!empty($dealer_info['DealerName']['dealer_logo'])){
      $imgpath=WWW_ROOT.'files'.DS.'dealer_name'.DS.'dealer_logo'.DS.$dealer_info['DealerName']['id'].DS.''.$dealer_info['DealerName']['dealer_logo'];

      if(file_exists($imgpath)){
      //$imageData = base64_encode(file_get_contents($imgpath));
      //$src = 'data: '.$this->_getFileMimeType($imgpath).';base64,'.$imageData;
      $src=FULL_BASE_URL.'/app/webroot/files/'.'dealer_name'.'/dealer_logo/'.$dealer_info['DealerName']['id'].'/'.$dealer_info['DealerName']['dealer_logo'];
      $coupon_image='<img src="'.$src.'" style="width:300px;height:100px;" />';
      echo $coupon_image;
      }
      ?>

      <?php } ?>

      <button class="btn btn-primary" type="submit">Upload</button>
      <?php echo $this->Form->end(); ?>
      </div>
      <div class="separator"></div>

      </div>
      </div>


      </div>
      </div><?php */ ?>




    <div class="row">

        <div class="col-md-12">


            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Sendgrid User Details</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div id="sendgrid_response"></div>
                    <div class="col-md-3" style="width:30%;">
                        Username: <input type="text" class="form-control" style="width:200px;display:inline;" name="sendgrid_username" id="sendgrid_username" value="<?php echo $SendgridUserDetails['SendgridSubuser']['username']; ?>">
                    </div>
                    &nbsp;&nbsp;
                    <div class="col-md-3" style="width:29%;" >
                        Password: <input type="password" style="width:200px;display:inline;" class="form-control" name="sendgrid_password" id="sendgrid_password" value="<?php echo $SendgridUserDetails['SendgridSubuser']['password']; ?>">
                    </div>
                    &nbsp;&nbsp;
                    <div class="col-md-4" style="width:35%;">
                        Confirm Password: <input type="password" style="width:200px;display:inline;" class="form-control" name="sendgrid_confirm_password" id="sendgrid_confirm_password" value="<?php echo $SendgridUserDetails['SendgridSubuser']['password']; ?>">
                    </div>
                    <?php
                    if (!isset($SendgridUserDetails['SendgridSubuser']['username'])) {
                        ?>
                        <div class="col-md-1" style="width:3%;" id="btn_sendgrid_create_user_save">
                            <button class="btn btn-primary" type="button" onclick="CreateSendgridUser()">Save</button>
                        </div>
    <?php
}
?>
                    <div class="separator"></div>

                </div>
            </div>


        </div>
    </div>

<?php if(in_array(AuthComponent::user('group_id'),array(1,2,6,9))){ ?>

    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
            <div class="widget-head"><h4>Export tool alert group</h4></div>
            <div class="widget-body">

                                         <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="email" class="form-control" id="report-email-alert-group" placeholder="Email">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-success" id="submit-report-email-alert-group" type="button">Add Email</button>
                                                          </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="report-email-alert-group-list" style="max-height:200px;overflow-y:scroll;">
                                           <table class="table table-striped table-responsive swipe-horizontal table-condensed ">
                                            <thead>
                                            <tr class="bg-inverse">
                                                <th>Contact Report Alert Group</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                            <?php
                                              if(!empty($contact_alert_emails)){
                                                foreach($contact_alert_emails as $email){ ?>
                                            <tr>
                                                <td class="border-bottom innerAll">
                                                    <?php echo $email['ReportAlertEmail']['email']; ?>
                                                </td>
                                                <td class="border-bottom innerAll text-right">
                                                    <button data-id = '<?php echo $email['ReportAlertEmail']['id']; ?>' type="button" class="btn btn-xs btn-danger delete-contact-report-alert"><i class="fa fa-times"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php } } ?>
                                        </table>
                                       </div>
     					           </div>
           					 </div>
						</div>

        <div class="col-md-6">
        <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Export Tool Password</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('DealerName', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'update_dealer_password')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>

                        <div class="form-group">
                            <?php echo $this->Form->label('dealer_password', 'Dealer Password', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo $this->Form->text('dealer_password', array('required' => true, 'class' => 'form-control', 'type' => 'password')); ?>
                                <?php echo $this->Form->error('dealer_password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>


        </div>
    </div>

<?php } ?>





    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Sold Alert Group</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                        <?php foreach ($SoldAlertEmails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['SoldAlertEmail']['email']; ?>&nbsp;</td>
                                                <td class="actions">
                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success sold_alert_edit_email', 'data-placement' => 'top',
                                                        'data-original-title' => "Edit Email", 'data-toggle' => "tooltip",
                                                        'data-id' => $email['SoldAlertEmail']['id'],
                                                        'data-email' => $email['SoldAlertEmail']['email']));
                                                    ?>

                                            <?php
                                            echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_sold_web_alert',
                                                $email['SoldAlertEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger',
                                                'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?'));
                                            ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
                            <?php //debug($lead_sources);  ?>
                            <?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Sold Alert Group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('SoldAlertEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_sold_alert_email')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>

                        <div class="form-group">
                            <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
                                <?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>





















    <!--	NPA API Setting-->
    <div class="row">

        <div class="col-md-12">


            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">NPA API Settings</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body" style="padding-left: 5px;padding-right:5px;padding-top:14px;padding-bottom: 14px;">
                    <div id="npa_response">

                    </div>
                    <div class="col-md-3" style="width:24%;">
                        Username: <input type="text" class="form-control" style="width:200px;display:inline;" name="npa_username" id="npa_username" value="<?php echo $npa_setting['NpaapiSetting']['username']; ?>">
                    </div>
                    &nbsp;&nbsp;
                    <div class="col-md-3" style="width:24%;" >
                        Password: <input type="password" style="width:200px;display:inline;" class="form-control" name="npa_password" id="npa_password" value="<?php echo $npa_setting['NpaapiSetting']['password']; ?>">
                    </div>
                    &nbsp;&nbsp;
                    <div class="col-md-4" style="width:28%;">
                        Confirm Password: <input type="password" style="width:200px;display:inline;" class="form-control" name="npa_confirm_password" id="npa_confirm_password" value="<?php echo $npa_setting['NpaapiSetting']['password']; ?>">
                    </div>

                    <?php
                    //if(!isset($SendgridUserDetails['SendgridSubuser']['username'])){
                    ?>
                    <div class="col-md-1" style="width:3%;" id="btn_npaapi_create_user_save">
                        <button class="btn btn-primary" type="button" onclick="CreateNpaApiUser()">Save</button>
                    </div>
<?php
//}
?>

                    <div class="col-md-1" style="width:16%; margin-left: 43px;text-align: right;">
                        <span style='display: inline-block;'>NPA:</span>
                        <div class="make-switch" data-on="success" data-off="default">
                            <input name="npa" id="npa" type="checkbox"
<?php if (isset($npa_setting['NpaapiSetting']['active']) && $npa_setting['NpaapiSetting']['active'] == '0') echo ""; else echo 'checked="checked"'; ?>   />
                        </div>
                    </div>



                    <div class="separator"></div>

                </div>
            </div>


        </div>
    </div>
    <!--	NPA API Setting end-->


    <!-- Workload Settings: Starts -->

    <div class="row">

        <div class="col-md-6">


            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Manage PreSale Headers</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
<?php
echo $this->Form->create('WorkloadSettings', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'workload_settings', 'presale')));
echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
?>

                        <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                            <!-- Table heading -->
                            <thead>
                                <tr>
                                    <th>Header Name</th>
                                    <th>Status</th>
                                    <!--<th>Action</th> -->
                                </tr>
                            </thead
                            ><!-- // Table heading END -->
                            <!-- Table body -->
                            <tbody>
                                        <?php foreach ($WorkloadSettings['presale'] as $details) { ?>
                                    <tr class="text-primary">
                                        <td><?php echo $details['WorkloadSetting']['header']; ?>&nbsp;</td>
                                        <!-- <td style="<?php echo ($details['WorkloadSetting']['active'] == 1) ? "color:green;font-weight:bold" : "color:red;font-weight:bold"; ?> "><?php echo ($details['WorkloadSetting']['active'] == 1) ? 'Active' : 'Inactive'; ?>&nbsp;</td> -->
                                        <td class="actions">


    <?php
    //echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_workload_header','data-placement'=>'top','data-original-title'=>"Edit Header",'data-toggle'=>"tooltip",'data-id'=>$details['WorkloadSetting']['id'],'data-header'=>$details['WorkloadSetting']['header'],'active'=>$details['WorkloadSetting']['active']));
    ?>
                                            <div class="make-switch " data-on="success" data-off="default">
                                                <input class="active_workload" onclick="ActivateWorkloadHeader(this);" name="workload_active_<?php echo $details['WorkloadSetting']['id']; ?>" id="workload_active_<?php echo $details['WorkloadSetting']['id']; ?>" type="checkbox" value="<?php echo $details['WorkloadSetting']['id']; ?>"  <?php if (isset($details['WorkloadSetting']['active']) && $details['WorkloadSetting']['active'] == 1) echo 'checked="checked"'; else echo ""; ?>   />
                                            </div>


                                        </td>
                                    </tr>
<?php } ?>
                                <!-- // Table row END -->
                            </tbody>
                            <!-- // Table body END -->
                        </table>
                        <!-- // Table END -->

<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->



        </div>


        <div class="col-md-6">


            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Manage PostSale Headers</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
<?php
echo $this->Form->create('WorkloadSettings', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'workload_settings', 'postsale')));
echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
?>

                        <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                            <!-- Table heading -->
                            <thead>
                                <tr>
                                    <th>Header Name</th>
                                    <th>Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead
                            ><!-- // Table heading END -->
                            <!-- Table body -->
                            <tbody>
                                        <?php foreach ($WorkloadSettings['postsale'] as $details) { ?>
                                    <tr class="text-primary">
                                        <td><?php echo $details['WorkloadSetting']['header']; ?>&nbsp;</td>
                                        <!-- <td style="<?php echo ($details['WorkloadSetting']['active'] == 1) ? "color:green;font-weight:bold" : "color:red;font-weight:bold"; ?> "><?php echo ($details['WorkloadSetting']['active'] == 1) ? 'Active' : 'Inactive'; ?>&nbsp;</td> -->
                                        <td class="actions">


    <?php
    // echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),'',array('escape'=>false,'class'=>'btn btn-sm btn-success edit_workload_header','data-placement'=>'top','data-original-title'=>"Edit Header",'data-toggle'=>"tooltip",'data-id'=>$details['WorkloadSetting']['id'],'data-header'=>$details['WorkloadSetting']['header'],'active'=>$details['WorkloadSetting']['active']));
    ?>
                                            <div class="make-switch " data-on="success" data-off="default">
                                                <input class="active_workload" onclick="ActivateWorkloadHeader(this);" name="workload_active_<?php echo $details['WorkloadSetting']['id']; ?>" id="workload_active_<?php echo $details['WorkloadSetting']['id']; ?>" type="checkbox" value="<?php echo $details['WorkloadSetting']['id']; ?>"  <?php if (isset($details['WorkloadSetting']['active']) && $details['WorkloadSetting']['active'] == 1) echo 'checked="checked"'; else echo ""; ?>   />
                                            </div>


                                        </td>
                                    </tr>
<?php } ?>
                                <!-- // Table row END -->
                            </tbody>
                            <!-- // Table body END -->
                        </table>
                        <!-- // Table END -->

<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->




        </div>



    </div>

    <!-- Workload Settings: Ends -->

    <div class="row">

        <div class="col-md-6">


            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Daily Door Counts</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('DealerDoorcount', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_dealer_doorcounts')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>
                        <div class="form-group">
<?php echo $this->Form->label('daily_door_counts', 'Daily Door Counts', array('class' => 'col-sm-4 control-label')); ?>
                            <div class="col-sm-8">
                            <?php echo $this->Form->number('daily_door_counts', array('required' => true, 'class' => 'form-control')); ?>
                                <?php echo $this->Form->error('daily_door_counts'); ?>
                            </div>
                        </div>

                        <div class="form-group">
<?php echo $this->Form->label('log_date', 'Date', array('class' => 'col-sm-4 control-label')); ?>
                            <div class="col-sm-8">
<?php echo $this->Form->text('log_date', array('required' => true, 'style' => 'width: 80%', 'class' => 'form-control')); ?>
<?php echo $this->Form->error('log_date'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button type="submit" class="btn btn-primary">Save</button>

                                <button id='list_daily_door_counts' type="button" class="btn btn-success pull-right">Door Counts</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->



        </div>


        <div class="col-md-6">


            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Daily POS Count</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('DealerRegister', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_dealer_registers')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>
                        <div class="form-group">
                            <?php echo $this->Form->label('daily_register_amount', 'Daily POS Count', array('class' => 'col-sm-4 control-label')); ?>
                            <div class="col-sm-8">
                                <?php echo $this->Form->number('daily_register_amount', array('step' => 'any', 'required' => true, 'class' => 'form-control')); ?>
                                <?php echo $this->Form->error('daily_register_amount'); ?>
                            </div>
                        </div>
                        <div class="form-group">
<?php echo $this->Form->label('log_date', 'Date', array('class' => 'col-sm-4 control-label')); ?>
                            <div class="col-sm-8">
<?php echo $this->Form->text('log_date', array('required' => true, 'style' => 'width: 80%', 'class' => 'form-control')); ?>
<?php echo $this->Form->error('log_date'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>

                                <button id='list_dealer_registers' type="button" class="btn btn-success pull-right">Daily POS Count</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->




        </div>



    </div>









 <!-- Mgr Event Reminder start -->

    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Mgr Event Reminder</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                        <?php foreach ($MgrEventReminderEmails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['MgrEventReminderEmail']['email']; ?>&nbsp;</td>
                                                <td class="actions">
                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success mgr_event_reminder_edit_email', 'data-placement' => 'top',
                                                        'data-original-title' => "Edit Email", 'data-toggle' => "tooltip",
                                                        'data-id' => $email['MgrEventReminderEmail']['id'],
                                                        'data-email' => $email['MgrEventReminderEmail']['email']));
                                                    ?>

                                            <?php
                                            echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_mgr_event_recipient',
                                                $email['MgrEventReminderEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger',
                                                'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?'));
                                            ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
                            <?php //debug($lead_sources);  ?>
                            <?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add Mgr Event Reminder Recipient Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                        <?php
                        echo $this->Form->create('MgrEventReminderEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_mgr_event_reminder')));
                        echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                        ?>
                        <div class="form-group">
                            <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
                                <?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>

    <!-- //Mgr Event Reminder end -->






















    <div class="row">
<?php $surveys[0] = 'BDC Appointment Alert'; ?>
        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">BDC Survey Alert GROUP LIST</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Survey Groups</th>
                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($emails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $surveys[$email['SurveyGroup']['survey_id']]; ?>&nbsp;</td>
                                                <td><?php echo $email['SurveyGroup']['email']; ?>&nbsp;</td>
                                                <td class="actions">


    <?php
    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success edit_email', 'data-placement' => 'top', 'data-original-title' => "Edit Email", 'data-toggle' => "tooltip", 'data-id' => $email['SurveyGroup']['id'], 'data-email' => $email['SurveyGroup']['email'], 'data-survey' => $email['SurveyGroup']['survey_id']));
    ?>


    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_email', $email['SurveyGroup']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>
                                            </tr>
                            <?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Survey Group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('SurveyGroup', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_email')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>
                        <div class="form-group">
<?php echo $this->Form->label('survey_id', 'Survey Group', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                            <?php
                            $surveys[5] = "Service Survey (Service Lead " . $dealer_info['DealerName']['service_day_offset'] . " Days)";

                            echo $this->Form->input('survey_id', array('required' => true, 'class' => 'form-control', 'options' => $surveys, 'empty' => 'Select Survey Group', 'label' => false));
                            ?>
<?php echo $this->Form->error('survey_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
                        <?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>

<?php /// Scoring Leads group emails  ?>
    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">SCORE LEAD GROUP LIST</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>

                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($lead_score_emails as $l_email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $l_email['LeadScoreEmail']['email']; ?>&nbsp;</td>
                                                <td class="actions">


                                            <?php ?>


    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_lead_score_email', $l_email['LeadScoreEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>
                                            </tr>
<?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Lead Score Group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                            <?php
                            echo $this->Form->create('LeadScoreEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_lead_score_email')));
                            echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                            ?>

                        <div class="form-group">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
<?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>

<?php // end scoring lead  ?>
<?php
$daily_recap_frequency = array(1=>'Daily',2 => 'Weekly',3 =>'Both');
?>

    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">DAILY RECAP GROUP LIST</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Frequency</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($recap_emails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['RecapCronEmail']['email']; ?>&nbsp;</td>
                                                <td><?php echo $daily_recap_frequency[$email['RecapCronEmail']['frequency']]; ?>&nbsp;</td>
                                                <td class="actions">


                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success recap_edit_email', 'data-placement' => 'top', 'data-original-title' => "Edit Email", 'data-toggle' => "tooltip", 'data-id' => $email['RecapCronEmail']['id'], 'data-email' => $email['RecapCronEmail']['email']));
                                                    ?>


    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_recap_email', $email['RecapCronEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>
                                            </tr>
<?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Recap Group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                            <?php
                            echo $this->Form->create('RecapCronEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_recap_email')));
                            echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                            ?>
						  <div class="form-group">
<?php echo $this->Form->label('frequency', 'Report Frequency', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->input('frequency', array('div'=>false,'label' => false,'required' => true, 'class' => 'form-control', 'type' => 'select','options'=>$daily_recap_frequency)); ?>
<?php echo $this->Form->error('frequency'); ?>
                            </div>
                         </div>
                        <div class="form-group">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
<?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>

<?php // New Log Alert Group ?>


<?php
$weblead_response_frequency = array(1=>'Daily',2 => 'Weekly',3 =>'Monthly');
?>

    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Weblead Response Alert Group List</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Frequency</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($weblead_response_emails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['WebleadResponseEmail']['email']; ?>&nbsp;</td>
                                                <td><?php echo $weblead_response_frequency[$email['WebleadResponseEmail']['frequency']]; ?>&nbsp;</td>
                                                <td class="actions">


                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success weblead_response_edit_email', 'data-placement' => 'top', 'data-original-title' => "Edit Email", 'data-toggle' => "tooltip", 'data-id' => $email['WebleadResponseEmail']['id'], 'data-email' => $email['WebleadResponseEmail']['email']));
                                                    ?>


    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_weblead_response_email', $email['WebleadResponseEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>
                                            </tr>
<?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add Weblead Response Group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                            <?php
                            echo $this->Form->create('WebleadResponseEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_weblead_response_email')));
                            echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                            ?>
						  <div class="form-group">
<?php echo $this->Form->label('frequency', 'Report Frequency', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->input('frequency', array('div'=>false,'label' => false,'required' => true, 'class' => 'form-control', 'type' => 'select','options'=>$weblead_response_frequency)); ?>
<?php echo $this->Form->error('frequency'); ?>
                            </div>
                         </div>
                        <div class="form-group">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
<?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>
<?php // End New Log alert Group ?>

<?php // Start Weblead response alert group section ?>

<?php
$daily_newlog_frequency = array(1=>'Daily',2 => 'Weekly',3 =>'Monthly');
?>

    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">New Log Alert Group List</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Frequency</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($newlog_emails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['NewLogAlert']['email']; ?>&nbsp;</td>
                                                <td><?php echo $daily_newlog_frequency[$email['NewLogAlert']['frequency']]; ?>&nbsp;</td>
                                                <td class="actions">


                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success newlog_edit_email', 'data-placement' => 'top', 'data-original-title' => "Edit Email", 'data-toggle' => "tooltip", 'data-id' => $email['NewLogAlert']['id'], 'data-email' => $email['NewLogAlert']['email']));
                                                    ?>


    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_newlog_email', $email['NewLogAlert']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>
                                            </tr>
<?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New log Group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                            <?php
                            echo $this->Form->create('NewLogAlert', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_newlog_email')));
                            echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                            ?>
						  <div class="form-group">
<?php echo $this->Form->label('frequency', 'Report Frequency', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->input('frequency', array('div'=>false,'label' => false,'required' => true, 'class' => 'form-control', 'type' => 'select','options'=>$daily_newlog_frequency)); ?>
<?php echo $this->Form->error('frequency'); ?>
                            </div>
                         </div>
                        <div class="form-group">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
<?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>
<?php // End New Log alert Group ?>



<?php //End weblead response alert group section ?>
 <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">BDC SERVICE GROUP LIST</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($BdcServicesGroupEmails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['BdcServicesGroupEmail']['email']; ?>&nbsp;</td>
                                                <td class="actions">


                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success bdc_service_group_edit_email', 'data-placement' => 'top', 'data-original-title' => "Edit Email", 'data-toggle' => "tooltip", 'data-id' => $email['BdcServicesGroupEmail']['id'], 'data-email' => $email['BdcServicesGroupEmail']['email']));
                                                    ?>


    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_bdc_service_email', $email['BdcServicesGroupEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>
                                            </tr>
<?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New BDC service group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>

                        <?php
                        echo $this->Form->create('BdcServicesGroupEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_bdc_service_group_email')));
                        echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                        ?>

                        <div class="form-group">
                            <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                            <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
                            <?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>


    <!-- Worksheet Notificatoin Start -->

     <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Worksheet Notification</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                        <?php foreach ($worksheet_notification_emails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['WorksheetNotificationEmail']['email']; ?>&nbsp;</td>
                                                <td class="actions">


                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success worksheet_notification_edit_email', 'data-placement' => 'top', 'data-original-title' => "Edit Email", 'data-toggle' => "tooltip", 'data-id' => $email['WorksheetNotificationEmail']['id'], 'data-email' => $email['WorksheetNotificationEmail']['email']));
                                                    ?>

                                                    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_worksheet_notification_email', $email['WorksheetNotificationEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
                            <?php //debug($lead_sources);  ?>
                            <?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Worksheet Notification</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>

                        <?php
                        echo $this->Form->create('WorksheetNotificationEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_worksheet_notification_email')));
                        echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                        ?>

                        <div class="form-group">
                            <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                            <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
                            <?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>


    <!-- Worksheet notification end -->















    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">EMAIL LEADS LIST - LAST MONTH</h4>
                </div>
<?php
$options = array('SALES' => 'SALES', 'PARTS' => 'PARTS', 'SERVICE' => 'SERVICE', 'SOLD' => 'SOLD');
?>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <table style="float:right;">
                                <tr>
                                    <td>
<?php echo $this->Form->input('send_contact_details_type', array('required' => true, 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width:100px;', 'options' => $options)); ?>
                                    </td>
                                    <td>
                                        <button id='btn_send_contact_details' type="button" class="btn btn-success" onclick="SendContactDetailsForLastMonth()">Send</button>
                                    </td>
                                </tr>
                            </table>
                            <div class="separator"></div>
                            <div class="separator"></div>
                            <div class="separator"></div>
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Type</th>
                                            <th>Action </th>


                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
<?php
foreach ($send_lead_contact_details as $email) {
    if ($email['SendMonthlyLeadContact']['type'] == '') {
        $email['SendMonthlyLeadContact']['type'] = 'SALES';
    }
    ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['SendMonthlyLeadContact']['email']; ?>&nbsp;</td>
                                                <td><?php echo $email['SendMonthlyLeadContact']['type']; ?>&nbsp;</td>
                                                <td class="actions">


    <?php
    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success send_lead_contact_edit_email', 'data-placement' => 'top', 'data-original-title' => "Edit Email", 'data-toggle' => "tooltip", 'data-id' => $email['SendMonthlyLeadContact']['id'], 'data-email' => $email['SendMonthlyLeadContact']['email'], 'email-type' => $email['SendMonthlyLeadContact']['type']));
    ?>


    <?php echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_send_contact_details', $email['SendMonthlyLeadContact']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?')); ?>
                                                </td>

                                            </tr>
                            <?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New "Monthly Lead Contacts" Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('SendMonthlyLeadContact', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_send_contact_details')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>

                        <div class="form-group">
                            <div>
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-9">
                                <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
                                    <?php echo $this->Form->error('email'); ?>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div>
<?php echo $this->Form->label('type', 'Type', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-9">
<?php echo $this->Form->input('type', array('required' => true, 'label' => false, 'class' => 'form-control', 'options' => $options)); ?>
<?php echo $this->Form->error('type'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>


    </div>



    <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">DEALER WEB PAGE LEADS ALERT</h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div style=" max-height: 430px; overflow: auto;">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Emails</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($webAlertEmails as $email) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo $email['WebAlertEmail']['email']; ?>&nbsp;</td>
                                                <td class="actions">
                                                    <?php
                                                    echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success web_alert_edit_email', 'data-placement' => 'top',
                                                        'data-original-title' => "Edit Email", 'data-toggle' => "tooltip",
                                                        'data-id' => $email['WebAlertEmail']['id'],
                                                        'data-email' => $email['WebAlertEmail']['email']));
                                                    ?>

                                            <?php
                                            echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_web_alert',
                                                $email['WebAlertEmail']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger',
                                                'data-placement' => 'top', 'data-original-title' => "Delete Email", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Email?'));
                                            ?>
                                                </td>
                                            </tr>
                            <?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Web Alert Group Email</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('WebAlertEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_web_alert')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>

                        <div class="form-group">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email')); ?>
                        <?php echo $this->Form->error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->
        </div>

    </div>

    <!-- Show webleads -->
    <?php echo $this->element('dealer_settings/web_leads', array('webleads' => $webleads)); ?>


   <div class="row">

        <div class="col-md-6">
            <div class="widget widget-heading-simple widget-body-white">
                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">BDC Survey Status </h4>
                </div>
                <div class="widget-body">
                    <div class="row" style="max-height:250px;overflow-y:scroll;">
                        <div class="col-md-12">
                            <div>
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                    <!-- Table heading -->
                                    <thead>
                                        <tr>
                                            <th>Status Group</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead
                                    ><!-- // Table heading END -->
                                    <!-- Table body -->
                                    <tbody>
                                                <?php foreach ($bdc_statuses as $status) { ?>
                                            <tr class="text-primary">
                                                <td><?php echo ucfirst($status['BdcStatus']['status_id']); ?>&nbsp;</td>
                                                <td><?php echo $status['BdcStatus']['name']; ?>&nbsp;</td>
                                                <td class="actions">


                                                    <?php
                                                    if ($status['BdcStatus']['dealer_id'] != 0) {
                                                        echo $this->Html->link(__('<i class="fa fa-pencil"></i>'), '', array('escape' => false, 'class' => 'btn btn-sm btn-success edit_status', 'data-placement' => 'top', 'data-original-title' => "Edit Status", 'data-toggle' => "tooltip", 'data-id' => $status['BdcStatus']['id'], 'data-name' => $status['BdcStatus']['name'], 'data-status' => $status['BdcStatus']['status_id']));
                                                        ?>


        <?php
        echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller' => 'dealer_settings', 'action' => 'delete_status', $status['BdcStatus']['id']), array('escape' => false, 'class' => 'btn btn-sm btn-danger', 'data-placement' => 'top', 'data-original-title' => "Delete Status", 'data-toggle' => "tooltip"), __('Are you sure you want to delete Status?'));
    }
    ?>
                                                </td>
                                            </tr>
                            <?php } ?>
                                        <!-- // Table row END -->
                                    </tbody>
                                    <!-- // Table body END -->
                                </table>
                                <!-- // Table END -->
                            </div>
<?php //debug($lead_sources);  ?>
<?php //echo $this->element('sql_dump');  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


		<div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">SET BCC,CC OUTGOING EMAIL SENT FROM THE CRM</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('SetCcBccDefaultEmail', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'set_cc_bcc_default_email')));
                                echo $this->Form->hidden('SetCcBccDefaultEmail.dealer_id', array('value' => AuthComponent::user('dealer_id')));
							                  echo $this->Form->input('SetCcBccDefaultEmail.id', array('type'=>'hidden','value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['id']));
                                ?>

                        <div class="form-group">
                                <?php echo $this->Form->label('email_type', 'Email Type', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-9">
                                  <?php echo $this->Form->input('SetCcBccDefaultEmail.email_type', array('value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['email_type'],'required'=> true, 'type'=>'select','options'=>array('Lead Emails'=>'Lead Emails','Lead Notification'=>'Lead Notification'), 'class' => 'form-control', 'label' => false)); ?>
                                </div>
                        </div>

                        <div class="form-group">
                                <?php echo $this->Form->label('cc', 'CC', array('class' => 'col-sm-3 control-label')); ?>
                                <div class="col-sm-9">
                                  <?php echo $this->Form->input('SetCcBccDefaultEmail.cc', array('value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['cc'],'type'=>'text','required' => false, 'class' => 'form-control', 'label' => false)); ?>
                                </div>
                        </div>

						            <div class="form-group">
                            <?php echo $this->Form->label('bcc', 'BCC', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
						                    <?php echo $this->Form->input('SetCcBccDefaultEmail.bcc', array('value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['bcc'],'required' => false, 'class' => 'form-control', 'label' => false)); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->



        </div>

        <div class="col-md-6">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Add New Survey Status</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
                                <?php
                                echo $this->Form->create('BdcStatus', array('class' => 'form-horizontal apply-nolazy', 'type' => 'post', 'url' => array('controller' => 'dealer_settings', 'action' => 'add_status')));
                                echo $this->Form->hidden('dealer_id', array('value' => AuthComponent::user('dealer_id')));
                                ?>
                        <div class="form-group">
                                <?php echo $this->Form->label('status_id', 'Status Group', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('status_id', array('required' => true, 'class' => 'form-control', 'options' => array('contact' => 'Contact', 'no contact' => 'No Contact', 'bad number' => 'Bad Number', 'voicemail' => 'Voicemail', 'call back' => 'Call Back', 'no number' => 'No Number'), 'empty' => 'Select Status Group', 'label' => false)); ?>
<?php echo $this->Form->error('status_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
<?php echo $this->Form->label('name', 'Status', array('class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-9">
                        <?php echo $this->Form->text('name', array('required' => true, 'class' => 'form-control')); ?>
                        <?php echo $this->Form->error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>

                    </div>
                </div>

            </div>
            <!-- // Widget END -->



        </div>


    </div>

    <!-- // Widget END -->
    <div class="row">
<?php
$custom_form_dealer_ids = array(1224, 829, 830, 5000);

if (in_array($dealer_id, $custom_form_dealer_ids) || AuthComponent::user('id') == 232) {
    ?>
            <div class="col-md-6">


                <!-- Widget -->
                <div class="widget widget-heading-simple widget-body-white">

                    <!-- Widget heading -->
                    <div class="widget-head">
                        <h4 class="heading">Manage Custom Forms</h4>
                    </div>
                    <!-- // Widget heading END -->

                    <div class="widget-body">
                        <div class="innerLR">
                            <div class="separator"></div>
    <?php ?>

                            <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                <!-- Table heading -->
                                <thead>
                                    <tr>
                                        <th>Form Name</th>
                                        <th>Status</th>
                                        <th>Combine Print</th>
                                                                                  <!--<th>Action</th> -->
                                    </tr>
                                </thead
                                ><!-- // Table heading END -->
                                <!-- Table body -->
                                <tbody>
    <?php foreach ($custom_forms as $details) { ?>
                                        <tr class="text-primary">
                                            <td><?php echo $details['CustomForm']['name']; ?>&nbsp;</td>
                                            <td>
                                                <div class="make-switch " data-on="success" data-off="default">
                                                    <input class="custom_forms" name="custom_form_<?php echo $details['CustomForm']['id']; ?>" data-id="<?php echo $details['CustomForm']['id']; ?>" form-type="custom_form" form-print="0" type="checkbox" value="<?php echo $details['CustomForm']['id']; ?>" <?php if (in_array($details['CustomForm']['id'], $active_custom_form)) {
            echo 'checked="checked"';
        } ?> />
                                                </div>


                                            </td>
                                            <td>
                                                <div class="make-switch " data-on="success" data-off="default">
                                                    <input class="custom_forms" name="custom_form_<?php echo $details['CustomForm']['id']; ?>" data-id="<?php echo $details['CustomForm']['id']; ?>" form-type="custom_form" form-print="1" type="checkbox" value="<?php echo $details['CustomForm']['id']; ?>" <?php if (in_array($details['CustomForm']['id'], $active_print_form)) {
            echo 'checked="checked"';
        } ?> />
                                                </div> </td>

                                        </tr>
    <?php } ?>
                                    <!-- // Table row END -->
                                </tbody>
                                <!-- // Table body END -->
                            </table>
                            <!-- // Table END -->

            <?php echo $this->Form->end(); ?>

                        </div>
                    </div>

                </div>
                <!-- // Widget END -->



            </div>
<?php } ?>
        <div class="col-md-6">


            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Manage Worksheets</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <div class="innerLR">
                        <div class="separator"></div>
<?php ?>

                        <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                            <!-- Table heading -->
                            <thead>
                                <tr>
                                    <th>Worksheet Name</th>
                                    <th>Status</th>
                                    <th>Combine Print</th>
                                                                                <!--<th>Action</th> -->
                                </tr>
                            </thead
                            ><!-- // Table heading END -->
                            <!-- Table body -->
                            <tbody>
<?php foreach ($custom_worksheet_forms as $details) { ?>
                                    <tr class="text-primary">
                                        <td><?php echo $details['CustomForm']['name']; ?>&nbsp;</td>
                                        <td>
                                            <div class="make-switch " data-on="success" data-off="default">
                                                <input class="custom_forms" name="custom_form_<?php echo $details['CustomForm']['id']; ?>" data-id="<?php echo $details['CustomForm']['id']; ?>" form-type="worksheet" form-print="0" type="checkbox" value="<?php echo $details['CustomForm']['id']; ?>" <?php if (in_array($details['CustomForm']['id'], $active_custom_form)) {
        echo 'checked="checked"';
    } ?> />
                                            </div></td>
                                        <td>
                                            <div class="make-switch " data-on="success" data-off="default">
                                                <input class="custom_forms" name="custom_form_<?php echo $details['CustomForm']['id']; ?>" data-id="<?php echo $details['CustomForm']['id']; ?>" form-type="worksheet" form-print="1" type="checkbox" value="<?php echo $details['CustomForm']['id']; ?>" <?php if (in_array($details['CustomForm']['id'], $active_print_form)) {
        echo 'checked="checked"';
    } ?> />
                                            </div></td>



                                    </tr>
<?php } ?>
                                <!-- // Table row END -->
                            </tbody>
                            <!-- // Table body END -->
                        </table>
                        <!-- // Table END -->



                    </div>
                </div>

            </div>
            <!-- // Widget END -->



        </div>






    </div>






</div>





<div class="modal fade" id="modal-2">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

                        <?php echo $this->Form->create('SurveyGroup', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_survey'), 'id' => 'SurveyGroupEdit', 'class' => 'form-inline ')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Survey Email</legend>
                <div class="separator"></div>
                <div class="row">

                        <?php
                        echo $this->Form->hidden('id', array('id' => 'SurveyGroup_id'));
                        echo $this->Form->label('survey_id', 'Survey Group', array('class' => 'col-sm-3 control-label'));
                        ?>
                    <div class="col-sm-9">
<?php echo $this->Form->input('survey_id', array('required' => true, 'class' => 'form-control', 'options' => $surveys, 'empty' => 'Select Survey Group', 'label' => false, 'id' => 'survey_id')); ?>
<?php echo $this->Form->error('survey_id'); ?>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="row">
        <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'surveyEmail')); ?>
<?php echo $this->Form->error('survey_id'); ?>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
<?php echo $this->Form->end(); ?>

    </div>
</div>

                    <?php // Edit BDC Survey status modal  ?>

<div class="modal fade" id="modal-3">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

                        <?php echo $this->Form->create('BdcStatus', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_status'), 'id' => 'BdcStatusEdit', 'class' => 'form-inline ')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Survey Status</legend>
                <div class="separator"></div>
                <div class="row">

                        <?php
                        echo $this->Form->hidden('id', array('id' => 'BdcStatus_id'));
                        echo $this->Form->label('status_id', 'Status Group', array('class' => 'col-sm-3 control-label'));
                        ?>
                    <div class="col-sm-9">
<?php echo $this->Form->input('status_id', array('required' => true, 'class' => 'form-control', 'options' => array('contact' => 'Contact', 'no contact' => 'No Contact', 'bad number' => 'Bad Number', 'voicemail' => 'Voicemail', 'call back' => 'Call Back'), 'empty' => 'Select Status Group', 'label' => false, 'id' => 'status_id')); ?>
<?php echo $this->Form->error('status_id'); ?>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="row">
        <?php echo $this->Form->label('name', 'Status', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->text('name', array('required' => true, 'class' => 'form-control', 'id' => 'surveyName')); ?>
<?php echo $this->Form->error('name'); ?>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
<?php echo $this->Form->end(); ?>

    </div>
</div>

</div>

<div class="modal fade" id="modal-4">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

            <?php echo $this->Form->create('RecapCronEmail', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_recap_email'), 'id' => 'RecapCronEmailEdit', 'class' => 'form-inline ')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Recap Email</legend>
                <div class="separator"></div>
                <div class="row">

                    <?php  echo $this->Form->hidden('id', array('id' => 'RecapCronEmail_id'));  ?>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'email')); ?>
                        <?php echo $this->Form->error('recap_id'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>





<?php // New log alert email edit modal ?>


<div class="modal fade" id="modal-newlog">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

            <?php echo $this->Form->create('NewLogAlert', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_newlog_email'), 'id' => 'NewLogAlertEdit', 'class' => 'form-inline apply-nolazy','type' => 'post')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit New Log Email</legend>
                <div class="separator"></div>
                <div class="row">

                    <?php  echo $this->Form->hidden('id', array('id' => 'NewLogAlert_id'));  ?>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'NewLogAlert_email')); ?>
                        <?php echo $this->Form->error('NewLogAlert_email'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>






<?php // end new log alert modal ?>


<?php //weblead response start ?>

<div class="modal fade" id="modal-weblead-response">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

            <?php echo $this->Form->create('WebleadResponseEmail', array('url' => array('controller' => 'dealer_settings', 'action' => 'add_weblead_response_email'), 'id' => 'WebleadResponseEdit', 'class' => 'form-inline apply-nolazy','type' => 'post')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit New Log Email</legend>
                <div class="separator"></div>
                <div class="row">

                    <?php  echo $this->Form->hidden('id', array('id' => 'WebleadResponse_id'));  ?>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'WebleadResponse_email')); ?>
                        <?php echo $this->Form->error('WebleadResponse_email'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>


<?php //weblead response end ?>

<div class="modal fade" id="modal-444">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

            <?php echo $this->Form->create('BdcServicesGroupEmail', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_bdc_service_group_email'), 'id' => 'BdcServiceEmailEdit', 'class' => 'form-inline ')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit BDC Service Group Email</legend>
                <div class="separator"></div>
                <div class="row">

                    <?php  echo $this->Form->hidden('id', array('id' => 'BdcServiceGroupEmail_id'));  ?>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'BdcServiceGroup_email')); ?>
                        <?php echo $this->Form->error('recap_id'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>


<div class="modal fade" id="modal-worksheet_notification">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

            <?php echo $this->Form->create('WorksheetNotificationEmail', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_worksheet_notification_email'), 'id' => 'WorksheetNotificationEdit', 'class' => 'form-inline ')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Worksheet Notification Email</legend>
                <div class="separator"></div>
                <div class="row">

                    <?php  echo $this->Form->hidden('id', array('id' => 'WorksheetNotificationEmail_id'));  ?>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'WorksheetNotificationEmail_email')); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>


<div class="modal fade" id="modal-6">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

<?php echo $this->Form->create('SendMonthlyLeadContact', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_send_contact_email'), 'id' => 'SendMonthlyLeadContactEdit', 'class' => 'form-inline ')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit "Send Lead Contact" Email</legend>
                <div class="separator"></div>
                <div class="row">

<?php
echo $this->Form->hidden('id', array('id' => 'SendMonthlyLeadContactEmail_id'));
?>
                </div>
                <div class="separator"></div>
                <div class="row">
                        <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'email')); ?>

                    </div>
                </div>
                <div class="separator"></div>
                <div class="row">
<?php echo $this->Form->label('type', 'Type', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->input('type', array('required' => true, 'label' => false, 'class' => 'form-control', 'options' => $options)); ?>

                    </div>
                </div>



            </div>

        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
            <?php echo $this->Form->end(); ?>

    </div>
</div>

<div class="modal fade" id="modal-20">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

                    <?php echo $this->Form->create('WebAlertEmail', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_web_alert'), 'id' => 'WebAlertEmailEdit', 'class' => 'form-inline apply-nolazy')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Web Alert Email</legend>
                <div class="separator"></div>
                <div class="row">

                        <?php
                        echo $this->Form->hidden('id', array('id' => 'WebAlertEmail_id'));
                        ?>
                </div>
                <div class="separator"></div>
                <div class="row">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'WebAlertemailedit')); ?>
<?php echo $this->Form->error('web_alert_id'); ?>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
<?php echo $this->Form->end(); ?>

    </div>
</div>


<div class="modal fade" id="modal-20_sold_alert">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

                    <?php echo $this->Form->create('SoldAlertEmail', array('url' => array('controller' => 'dealer_settings', 'action' => 'edit_sold_alert'), 'id' => 'SoldAlertEmailEdit', 'class' => 'form-inline apply-nolazy')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Sold Alert Email</legend>
                <div class="separator"></div>
                <div class="row">

                        <?php
                        echo $this->Form->hidden('id', array('id' => 'SoldAlertEmail_id'));
                        ?>
                </div>
                <div class="separator"></div>
                <div class="row">
<?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'SoldAlertemailedit')); ?>
<?php echo $this->Form->error('sold_alert_id'); ?>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
<?php echo $this->Form->end(); ?>

    </div>
</div>

<!-- mgr event reminder Modal start -->

<div class="modal fade" id="mgreventreminder_modal-20">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

        <?php echo $this->Form->create('MgrEventReminderEmail', array('url' => array('controller' => 'dealer_settings', 'action' => 'mgr_event_reminder_edit'), 'id' => 'MgrEventReminderEmailEdit', 'class' => 'form-inline apply-nolazy')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Trader Media Web Alert Email</legend>
                <div class="separator"></div>
                <div class="row">
                    <?php echo $this->Form->hidden('id', array('id' => 'MgrEventReminderEmail_id')); ?>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <?php echo $this->Form->label('email', 'Email', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
                        <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'type' => 'email', 'id' => 'MgrEventReminderEmailEditInput')); ?>
                        <?php echo $this->Form->error('web_alert_id'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
    <?php echo $this->Form->end(); ?>

    </div>
</div>


<!--    //mgr event reminder ends -->



<div class="modal fade" id="modal-5">

    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">

<?php echo $this->Form->create('WorkloadSetting', array('url' => array('controller' => 'dealer_settings', 'action' => 'workload_settings'), 'id' => 'WorkloadSettingEdit', 'class' => 'form-inline ')); ?>
            <!-- Modal body -->
            <div class="modal-body">
                <legend>Edit Workload Header</legend>
                <div class="separator"></div>
                <div class="row">

<?php
echo $this->Form->hidden('id', array('id' => 'WorkloadSetting_id'));
?>
                </div>
                <div class="separator"></div>
                <div class="row">
                        <?php echo $this->Form->label('header', 'Header', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->text('header', array('required' => true, 'class' => 'form-control', 'id' => 'WorkloadSetting_header')); ?> &nbsp;&nbsp;&nbsp;
<?php
echo $this->Form->error('workload_header_id');
?>
                    </div>
                </div>

                <div class="row">
<?php echo $this->Form->label('active', 'Active', array('class' => 'col-sm-3 control-label')); ?>
                    <div class="col-sm-9">
<?php echo $this->Form->text('active', array('label' => false, 'id' => 'WorkloadSetting_active', 'type' => 'checkbox', 'value' => 1)); ?>

                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer center margin-none">
            <a href="#" class="btn btn-danger pull-left" id="close_modal" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        </div>
<?php echo $this->Form->end(); ?>

    </div>
</div>



<script>

    $script.ready('bundle', function() {


<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
                    $(window).load(function(){
<?php } ?>


                    $("#ManageTeamTeamMember").change(function(){
                        var vals = $(this).val();
                        var vals_str = vals.join(",");

                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': vals_str},
                            url:  "/dealer_settings/save_settings_form_view/forms_view/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });
                    });


                    $("#multi_deal_higher_step").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).val()},
                            url:  "/dealer_settings/save_settings_form_view/multi_deal_higher_step/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });
                    });


/***************************************************************************************/
/****** Start of new ajax method functionality for binding settings click events *******/
/***************************************************************************************/
                    var settingsAry = [
                        ["lead_rule_filter_d_type","D Type"],
                        ["lead_rule_filter_type","Type"],
                        ["lead_rule_filter_make","Make"],
                        ["lead_rule_filter_category","Category"],
                        ["lead_rule_filter_condition","Condition"],
                        ["lead_rule_filter_location","Location"],
                        ["lead_rule_filter_source","Source"],
                        ["tm_lead_rule_filter_category","Category"],
                        ["tm_lead_rule_filter_condition","Condition"],
                        ["tm_lead_rule_filter_location","Location"],
                        ["advanced_round_robin_rules",""],
    				    ["tranfer_lead_to_salesperson",""],
                        ["casl_feature",""],
                        ["dealer_visit",""],
                        ["dealer_visit_showroom",""],
                        ["auto_merge_notification",""],

                    ];

                    for(x in settingsAry){
                      (function(y){
                        $("#"+settingsAry[x][0]).change(function(e){
                          setting_change_ajax(settingsAry[y][0],{'value' : $(this).is(":checked"),'setting_type':settingsAry[y][1]});
                        });
                      }(x));

                    }

                    function setting_change_ajax(rule,data,url,type,dataType,cbSuccess,cbFailure){

                      //Check for url
                      if(!rule || !data) return false;

                      //Define some presets
                      var url = url || "/dealer_settings/save_settings/" + rule + "/";
                      var type = type || "get";
                      var dataType = dataType || "json";
                      var cbSuccess = cbSuccess || function(data){ alert("Your Change was saved.  Please refresh page to see changes."); return; }
                      var cbFailure = cbFailure || function(data){ alert("Something went wrong when trying to save your settings.  Please reload the page and try again."); }

                      //Make Ajax call to contoller method
                      $.ajax({
                        type: type,
                        cache: false,
                        dataType: dataType,
                        data: data,
                        url: url,
                        success: cbSuccess,
                        error: cbFailure
                      });

                    }
/*******************************************************/
/************************END****************************/
/*******************************************************/



                    $("#lead_change_report_range").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).val()},
                            url:  "/dealer_settings/save_settings_form_view/lead_change_report_range/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });
                    });

                    $("#dormant_time").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).val()},
                            url:  "/dealer_settings/save_settings_form_view/dormant_time/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            },
                            error : function (request, error){
                                alert("Your change couldn't be saved, Please try again: " + error);
                            }
                        });
                    });

                    $("#lead_dup_lead_range_notification_duration").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).val()},
                            url:  "/dealer_settings/save_settings_lead_dup_duration/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            },
                            error : function (request, error){
                                alert("Your change couldn't be saved, Please try again: " + error);
                            }
                        });
                    });







                    $('#auto_event_time').timepicker();
                    $('#business_hours_start').timepicker();
                    $('#business_hours_end').timepicker();

                    //$('#EblastScheduleTime').timepicker({ defaultTime: "<?php echo date("H:i",(time()+(10*60)));?>" });



                    $("#save_event_auto_time").click(function(){
                        $.ajax({
                            type: "post",
                            cache: false,
                            dataType: 'json',
                            data: { auto_time  : $('#auto_event_time').val() },
                            url:  "/dealer_settings/save_event_auto_time/",
                            success: function(data){
                                alert("Event auto time saved.");
                            }
                        });

                    });

                     $("#save_business_hours").click(function(){
                        $.ajax({
                            type: "post",
                            cache: false,
                            dataType: 'json',
                            data: { business_hours_start  : $('#business_hours_start').val(), business_hours_end  : $('#business_hours_end').val(), },
                            url:  "/dealer_settings/save_business_hours/",
                            success: function(data){
                                alert("Business Hours saved.");
                            }
                        });

                    });



					 $(".move_lead_allowed_group").change(function(){
                        var checked = [];
                        var unchecked = [];
                        $(".move_lead_allowed_group").each(function() {
                            if(this.checked){
                                checked.push(this.value);
                            }else{
                                unchecked.push(this.value);
                            }
                        });

                        $.ajax({
                            type: "post",
                            cache: false,
                            dataType: 'json',
                            data: { checked  : checked, unchecked : unchecked,setting:'move_lead_allowed_group' },
                            url:  "/dealer_settings/save_option_group_setting/",
                            success: function(data){

                            }
                        });
                    });



                    $(".bad_web_lead_ckbox").change(function(){
                        var checked = [];
                        var unchecked = [];
                        $(".bad_web_lead_ckbox").each(function() {
                            if(this.checked){
                                checked.push(this.value);
                            }else{
                                unchecked.push(this.value);
                            }
                        });

                        $.ajax({
                            type: "post",
                            cache: false,
                            dataType: 'json',
                            data: { checked  : checked, unchecked : unchecked },
                            url:  "/dealer_settings/save_bad_web_lead_ckbox/",
                            success: function(data){

                            }
                        });
                    });



                    $(".shopper_notification_ckbox").change(function(){
                        var checked = [];
                        var unchecked = [];
                        $(".shopper_notification_ckbox").each(function() {
                            if(this.checked){
                                checked.push(this.value);
                            }else{
                                unchecked.push(this.value);
                            }
                        });

                        $.ajax({
                            type: "post",
                            cache: false,
                            dataType: 'json',
                            data: { checked  : checked, unchecked : unchecked },
                            url:  "/dealer_settings/shopper_notification_ckbox/",
                            success: function(data){

                            }
                        });
                    });


                    $(".holidays_ckbox").change(function(){
                        var checked = [];
                        var unchecked = [];
                        $(".holidays_ckbox").each(function() {
                            if(this.checked){
                                checked.push(this.value);
                            }else{
                                unchecked.push(this.value);
                            }
                        });

                        $.ajax({
                            type: "post",
                            cache: false,
                            dataType: 'json',
                            data: { checked  : checked, unchecked : unchecked },
                            url:  "/dealer_settings/save_holidays_ckbox/",
                            success: function(data){

                            }
                        });
                    });







                    //D Type Update

                    $(".d_type_settings").change(function(){

                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: { value  : $(this).is(":checked"), dtype : $(this).attr("name") },
                            url:  "/dealer_settings/save_dtype_settings/",
                            success: function(data){

                            }
                        });

                    });

                     $(".dealerspike_lead_settings").change(function(){

                        $.ajax({
                            type: "get",
                            cache: false,
                            data: { value  : $(this).is(":checked"), dtype : $(this).attr("name") },
                            url:  "/dealer_settings/save_dealerspikesource_settings/",
                            success: function(data){
                                 if(data == "false"){
                                     alert("This will deactivate the lead type for be delivered to the CRM.");
                                 }
                            }
                        });

                    });







                    $("#DealerDoorcountLogDate").bdatepicker({
                        format: 'yyyy-mm-dd',
                        //	startDate: "2013-02-14"
                    }).on('changeDate', function(selected){
                        $(this).bdatepicker('hide');
                    });

                    $("#DealerRegisterLogDate").bdatepicker({
                        format: 'yyyy-mm-dd',
                        //	startDate: "2013-02-14"
                    }).on('changeDate', function(selected){
                        $(this).bdatepicker('hide');
                    });



                    $(".alert").delay(3000).fadeOut("slow");
                    $("#24-follow-up").change(function(){

                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/24-follow-up/",
                            success: function(data){

                            }
                        });

                    });

                    $("#show-all-leads").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/show-all-leads/",
                            success: function(data){

                            }
                        });

                    });


                    $("#show-second-face").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/show-second-face/",
                            success: function(data){

                            }
                        });

                    });

                    $("#required-second-face").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/required-second-face/",
                            success: function(data){

                            }
                        });

                    });



                    $("#start_search").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $("#start_search").val()  },
                            url:  "/dealer_settings/save_settings/start_search/",
                            success: function(data){

                            }
                        });

                    });


                    $("#traditional-log-view").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/traditional-log-view/",
                            success: function(data){

                            }
                        });

                    });

                    $("#hide-side-menu").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/hide-side-menu/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#location_transfer").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/location_transfer/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#gender_required").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/gender_required/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#after_hrs_gsm_push").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/after_hrs_gsm_push/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#logged_active_round_robin").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/logged_active_round_robin/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#duplicate_vendor_merge").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/duplicate_vendor_merge/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#multiple_location_merge").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/multiple_location_merge/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#workload_order").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/workload_order/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#dnc_bdc_only").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/dnc_bdc_only/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#qr_code_activation").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/qr_code_activation/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#additional_contact").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/additional_contact/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#log_in_goal").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/log_in_goal/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#dnc_manual_uplaod_process").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/dnc_manual_uplaod_process/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#required_year_make_model").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/required_year_make_model/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#unit_value_price").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/unit_value_price/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

					$("#log_change_notification").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/log_change_notification/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#mgr_lead_action_no_lead_ownership").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/mgr_lead_action_no_lead_ownership/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#restrict_eblast_salesperson").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/restrict_eblast_salesperson/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });
                    });

                    $("#activate_lite_version").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/activate_lite_version/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });
                    });

                    $("#stock_num_required_sold").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/stock_num_required_sold/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });
                    });






                     $("#person_in_dealership").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/person_in_dealership/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#status_update_optional_event").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/status_update_optional_event/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#restrict_events_employee").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/restrict_events_employee/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });






                    $("#lead_status_required_new_lead").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/lead_status_required_new_lead/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });





                    $("#team_breakdown").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            context: $(this),
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/team_breakdown/",
                            success: function(data){
                                if( $(this).is(":checked")  == true){

                                    bootbox.dialog({
message: "<div  style='text-align: center'>Go to  <a class='no-ajaxify' href='/manage_teams/'>Manage Team</a> <br>NOTE: The Manage Team can be found under Settings Menu <div>",
                                        title: "Team Breakdown",
                                        buttons: {
                                            success: {
                                                label: "Ok",
                                                className: "btn-success",
                                                callback: function() {

                                                }
                                            },
                                        }
                                    });

                                }
                            }
                        });

                    });




                     $("#validate_method_of_payment").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/validate_method_of_payment/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });







					 $("#lightspeed_search").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/lightspeed_search/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#add_mgr_group_to_lead_push_options").change(function(){
                         $.ajax({
                           type: "get",
                           cache: false,
                           dataType: 'json',
                           data: {'value': $(this).is(":checked")},
                           url:  "/dealer_settings/save_settings/add_mgr_group_to_lead_push_options/",
                           success: function(data){
                               alert('Plese refresh to see changes');
                           }
                       });
                    });


                    $("#state_provinces").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/state_provinces/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    // Lead change report
                    if( $("#lead_change_report").is(":checked") == true ){
                        $("#lead_change_report_group_div").show();
                    }else{
                        $("#lead_change_report_group_div").hide();
                    }

                    $("#lead_change_report").change(function(){
                        if( $(this).is(":checked") == true ){
                            $("#lead_change_report_group_div").show();
                        }else{
                            $("#lead_change_report_group_div").hide();
                        }

                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/lead_change_report/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                                //

                            }
                        });
                    });





                    if( $("#location_names").is(":checked") == true ){
                        $("#add_location_div").show();
                    }else{
                        $("#add_location_div").hide();
                    }


                    $("#location_names").change(function(){
                        if( $(this).is(":checked") == true ){
                            $("#add_location_div").show();
                        }else{
                            $("#add_location_div").hide();
                        }

                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/location_names/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                                //

                            }
                        });
                    });

                    $("#submit_add_location").click(function(){
                        if($("#field_add_location").val() == ''){
                            alert("Please enter location");
                        }else{
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'location_name': $("#field_add_location").val()},
                                url:  "/dealer_settings/add_location/",
                                success: function(data){
                                    $("#locations_list").html(data);
                                    $("#field_add_location").val("");
                                }
                            });
                        }

                    });

                    $("#save_casl_unsubscribe_page").click(function(){
                        if($("#casl_unsubscribe_page").val() == ''){
                            alert("Please enter content");
                        }else{
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'content': $("#casl_unsubscribe_page").val()},
                                url:  "/dealer_settings/save_casl_unsubscribe_page/",
                                success: function(data){
                                    alert("Content has been saved successfully");
                                }
                            });
                        }

                    });

                    $("#save_calendar_invite").click(function(){
                        if($("#calendar_invite_subject").val() == ''){
                            alert("Please enter the email subject");
                        }else if($("#calendar_invite_content").val() == ''){
                            alert("Please enter the email content");
                        }
                        else{
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'subject': $("#calendar_invite_subject").val(),'content':$("#calendar_invite_content").val()},
                                url:  "/dealer_settings/save_calendar_invite/",
                                success: function(data){
                                    alert("Calendar invite email content has been saved successfully");
                                }
                            });
                        }

                    });




                    $("#submit_lead_change_alert_group").click(function(){
                        if($("#field_lead_change_alert_group").val() == ''){
                            alert("Please enter email");
                        }else{
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'email': $("#field_lead_change_alert_group").val()},
                                url:  "/dealer_settings/add_lead_change_alert_group/",
                                success: function(data){
                                    $("#lead_change_alert_group_list").html(data);
                                    $("#field_lead_change_alert_group").val("");
                                }
                            });
                        }

                    });

                    $("#submit_dup_lead_alert_group").click(function(){
                        if($("#field_dup_lead_alert_group").val() == ''){
                            alert("Please enter email");
                        }else{
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'email': $("#field_dup_lead_alert_group").val()},
                                url:  "/dealer_settings/add_lead_dup_alert_group/",
                                success: function(data){
                                    $("#lead_dup_alert_group_list").html(data);
                                    $("#field_dup_lead_alert_group").val("");
                                },
                                error : function (request, error){
                                    alert("Recipient couldn't be saved, Please try again: " + error);
                                }
                            });
                        }

                    });

                    $("#submit_dormant_lead_alert_group").click(function(){
                        if($("#field_dormant_lead_alert_group").val() == ''){
                            alert("Please enter email");
                        }else{
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'email': $("#field_dormant_lead_alert_group").val()},
                                url:  "/dealer_settings/add_dormant_lead_alert_group/",
                                success: function(data){
                                    $("#lead_dormant_alert_group_list").html(data);
                                    $("#field_dormant_lead_alert_group").val("");
                                },
                                error : function (request, error){
                                    alert("Recipient couldn't be saved, Please try again: " + error);
                                }
                            });
                        }

                    });



                    $( document ).on( "click", ".delete_lead_change_alert", function() {
                        if(confirm("Do you want to delete the email?")){
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'id': $(this).attr("data-alert-id")},
                                url:  "/dealer_settings/delete_lead_change_alert_group/",
                                success: function(data){
                                    $("#lead_change_alert_group_list").html(data);
                                    $("#field_lead_change_alert_group").val("");
                                }
                            });
                        }
                    });

                     $( document ).on( "click", ".delete_dup_lead_alert", function() {
                        if(confirm("Do you want to delete the email?")){
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'id': $(this).attr("data-alert-id")},
                                url:  "/dealer_settings/delete_dup_lead_alert_group/",
                                success: function(data){
                                    $("#lead_dup_alert_group_list").html(data);
                                    $("#field_dup_lead_alert_group").val("");
                                },
                                error : function (request, error){
                                    alert("Recipient couldn't be removed, Please try again: " + error);
                                }
                            });
                        }
                    });

                    $( document ).on( "click", ".delete_dormant_lead_alert", function() {
                        if(confirm("Do you want to delete the email?")){
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'id': $(this).attr("data-alert-id")},
                                url:  "/dealer_settings/delete_dormant_lead_alert_group/",
                                success: function(data){
                                    $("#lead_dormant_alert_group_list").html(data);
                                    $("#field_dormant_lead_alert_group").val("");
                                },
                                error : function (request, error){
                                    alert("Recipient couldn't be removed, Please try again: " + error);
                                }
                            });
                        }
                    });





                    $( document ).on( "click", ".delete_your_locatioin", function() {
                        if(confirm("Do you want to delete the location?")){
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'location_id': $(this).attr("data-location-id")},
                                url:  "/dealer_settings/delete_location/",
                                success: function(data){
                                    $("#locations_list").html(data);
                                    $("#field_add_location").val("");
                                }
                            });
                        }
                    });





                    $("#submit_custom_event_type").click(function(){
                        if($("#field_custom_event_type_name").val() == ''){
                            alert("Please event type");
                        }else{
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'event_type_name': $("#field_custom_event_type_name").val()},
                                url:  "/dealer_settings/add_custom_event_type/",
                                success: function(data){
                                    $("#custom_event_type_list_container").html(data);
                                    $("#field_custom_event_type_name").val("");
                                },
                                error : function (request, error){
                                    alert("Event Type couldn't be saved, Please try again: " + error);
                                }
                            });
                        }

                    });
                    $( document ).on( "click", ".delete_custom_event_type", function() {
                        if(confirm("Do you want to delete the event type?")){
                            $.ajax({
                                type: "POST",
                                cache: false,
                                data: {'id': $(this).attr("data-alert-id")},
                                url:  "/dealer_settings/delete_custom_event_type/",
                                success: function(data){
                                    $("#custom_event_type_list_container").html(data);
                                    $("#field_custom_event_type_name").val("");
                                },
                                error : function (request, error){
                                    alert("Event Type couldn't be removed, Please try again: " + error);
                                }
                            });
                        }
                    });



                    $("#mgr_sign_off").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/mgr_sign_off/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#vehicle_match_alert").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/vehicle_match_alert/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#equity_sperson").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/equity_sperson/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#email_required").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/email_required/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#owner_change_internet").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/owner_change_internet/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });

                    $("#report_range_limit").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/report_range_limit/",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });






                    $("#email-process").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/email-process/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });

                    });


                    $("#address-validation").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/address-validation/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });

                    });

					 $("#service_search").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/service_search/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });

                    });




                    $("#in-stock").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/save_settings/in-stock/",
                            success: function(data){
                                alert('Plese refresh to see changes');
                            }
                        });

                    });


                    //NPA API settings
                    $("#npa").change(function(){
                        $.ajax({
                            type: "get",
                            cache: false,
                            dataType: 'json',
                            data: {'value': $(this).is(":checked")},
                            url:  "/dealer_settings/npa_active",
                            success: function(data){
                                //alert('Plese refresh to see changes');
                            }
                        });

                    });
                    //NPA API settings End


                    $("#service_day_offset").on('change',function(){
                        $.ajax({
                            type:'GET',
                            url:'<?php echo $this->Html->url(array('controller' => 'dealer_settings', 'action' => 'set_service_day_offset')); ?>/'+$(this).val(),
                            success: function(){
                                alert("Service offset has been changed successfully");
                            }

                        });

                    });


	// Dealer country and locale settings

$(".dealer-default-settings").on('change',function(){
	$setting_name = $(this).attr('name');
	$value = $(this).val();
	$url = '<?php echo $this->Html->url(array('controller' => 'dealer_settings','action' => 'dealer_location_settings')); ?>/'+$setting_name+'?value='+$value;
	$.ajax({
			type:'GET',
			url:$url,
			success: function(){
				alert("Settings has been changed successfully");
			}

		});
	});





<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
                    });
<?php } ?>

                $(".edit_workload_header").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    header=$(this).attr('data-header');
                    active = $(this).attr('active');
                    if(active==1){
                        $("#WorkloadSetting_active").attr("checked",true);
                    }else{
                        $("#WorkloadSetting_active").removeAttr("checked");
                    }

                    $("#WorkloadSettingEdit #WorkloadSetting_id").val(id);
                    $("#WorkloadSettingEdit #WorkloadSetting_header").val(header);
                    $("#modal-5").modal('show');

                });


                $("#WorkloadSettingEdit").on('submit',function(){
                    $("#modal-5").modal('hide');
                    $.ajax({
                        type: "POST",
                        cache: false,
                        data:$(this).serialize(),
                        url:  "/dealer_settings/workload_settings/",
                        success: function(data){
                            location.reload();
                        },
                        async: false,
                    });
                });


                $(".edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    survey=$(this).attr('data-survey');
                    $("#SurveyGroupEdit #SurveyGroup_id").val(id);
                    $("#SurveyGroupEdit #survey_id").val(survey);
                    $("#SurveyGroupEdit #surveyEmail").val(email);
                    $("#modal-2").modal('show');

                });


                $("#SurveyGroupEdit").on('submit',function(){
                    $("#modal-2").modal('hide');
                    $.ajax({
                        type: "POST",
                        cache: false,

                        data:$(this).serialize(),
                        url:  "/dealer_settings/edit_survey/",
                        success: function(data){
                            location.reload();
                        }
                    });
                });

                $(".edit_status").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    name=$(this).attr('data-name');
                    status=$(this).attr('data-status');
                    $("#BdcStatusEdit #BdcStatus_id").val(id);
                    $("#BdcStatusEdit #status_id").val(status);
                    $("#BdcStatusEdit #surveyName").val(name);
                    $("#modal-3").modal('show');

                });

                $("#BdcStatusEdit").on('submit',function(){
                    $("#modal-3").modal('hide');
                    $.ajax({
                        type: "POST",
                        cache: false,

                        data:$(this).serialize(),
                        url:  "/dealer_settings/edit_status/",
                        success: function(data){
                            location.reload();
                        }
                    });
                });


                $(".recap_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    $("#RecapCronEmailEdit #RecapCronEmail_id").val(id);
                    $("#RecapCronEmailEdit #email").val(email);
                    $("#modal-4").modal('show');

                });

				$(".newlog_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    $("#NewLogAlertEdit #NewLogAlert_id").val(id);
                    $("#NewLogAlertEdit #NewLogAlert_email").val(email);
                    $("#modal-newlog").modal('show');

                });

				$(".weblead_response_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    $("#WebleadResponseEdit #WebleadResponse_id").val(id);
                    $("#WebleadResponseEdit #WebleadResponse_email").val(email);
                    $("#modal-weblead-response").modal('show');

                });


                $(".bdc_service_group_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    $("#BdcServiceEmailEdit #BdcServiceGroupEmail_id").val(id);
                    $("#BdcServiceEmailEdit #BdcServiceGroup_email").val(email);
                    $("#modal-444").modal('show');

                });

                $(".worksheet_notification_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    $("#WorksheetNotificationEdit #WorksheetNotificationEmail_id").val(id);
                    $("#WorksheetNotificationEdit #WorksheetNotificationEmail_email").val(email);
                    $("#modal-worksheet_notification").modal('show');

                });





                $(".send_lead_contact_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    type=$(this).attr('email-type');
                    $("#SendMonthlyLeadContactEdit #SendMonthlyLeadContactEmail_id").val(id);
                    $("#SendMonthlyLeadContactEdit #email").val(email);
                    if(type==''){
                        type = 'SALES';
                    }
                    $("#SendMonthlyLeadContactEdit #SendMonthlyLeadContactType").val(type);
                    $("#modal-6").modal('show');

                });




                $(".sold_alert_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    $("#SoldAlertEmailEdit #SoldAlertEmail_id").val(id);
                    $("#SoldAlertEmailEdit #SoldAlertemailedit").val(email);
                    $("#modal-20_sold_alert").modal('show');

                });



                $(".web_alert_edit_email").on('click',function(e){
                    e.preventDefault();
                    id=$(this).attr('data-id');
                    email=$(this).attr('data-email');
                    $("#WebAlertEmailEdit #WebAlertEmail_id").val(id);
                    $("#WebAlertEmailEdit #WebAlertemailedit").val(email);
                    $("#modal-20").modal('show');

                });



                $("#BdcServiceEmailEdit").on('submit',function(){
                    $("#modal-444").modal('hide');
                    $.ajax({
                        type: "POST",
                        cache: false,

                        data:$(this).serialize(),
                        url:  "/dealer_settings/edit_bdc_service_group_email/",
                        success: function(data){
                            location.reload();
                        }
                    });
                });


                $("#WorksheetNotificationEdit").on('submit',function(){
                    $("#modal-worksheet_notification").modal('hide');
                    $.ajax({
                        type: "POST",
                        cache: false,

                        data:$(this).serialize(),
                        url:  "/dealer_settings/edit_worksheet_notification_email/",
                        success: function(data){
                            location.reload();
                        }
                    });
                });

		//Contact Report Alert group add email address

		$("#submit-report-email-alert-group").on('click',function(e){
			e.preventDefault();
			if($("#report-email-alert-group").val()&&$("#report-email-alert-group")[0].checkValidity())
			{
				$email = $("#report-email-alert-group").val();
				$.ajax({
					type:'POST',
					url:'<?php echo $this->Html->url(array('controller' => 'dealer_settings','action' => 'save_contact_alert_group'));?>',
					data:{email:$email,action:'add'},
					success:function(data){
						$("#report-email-alert-group-list").html(data);
						 $("#report-email-alert-group").val('');
						}

					});
			}else{
				alert('Please enter valid email address');
			}

			});

			//delete contact alert group emails
			$("body").on('click','.delete-contact-report-alert',function(e){
				e.preventDefault();
				if(confirm('Are you sure you want to delete this email address?'))
				{
				$data_id = $(this).attr('data-id');
				$.ajax({
					type:'POST',
					url:'<?php echo $this->Html->url(array('controller' => 'dealer_settings','action' => 'save_contact_alert_group'));?>',
					data:{id:$data_id,action:'delete'},
					success:function(data){
						$("#report-email-alert-group-list").html(data);
						 $("#report-email-alert-group").val('');
						}

					});

				}

				});



                $("#RecapCronEmailEdit").on('submit',function(){
                    $("#modal-4").modal('hide');
                    $.ajax({
                        type: "POST",
                        cache: false,

                        data:$(this).serialize(),
                        url:  "/dealer_settings/edit_recap_email/",
                        success: function(data){
                            location.reload();
                        }
                    });
                });



                //List of daily_door_counts

                $("#SendMonthlyLeadContactEdit").on('submit',function(){
                    $("#modal-6").modal('hide');
                    $.ajax({
                        type: "POST",
                        cache: false,

                        data:$(this).serialize(),
                        url:  "/dealer_settings/add_send_contact_details/",
                        success: function(data){
                            location.reload();
                        }
                    });
                });

                $("#list_daily_door_counts").on('click',function(e){
                    e.preventDefault();

                    $.ajax({
                        type: "GET",
                        cache: false,
                        url: "/dealer_settings/list_daily_door_counts/",
                        success: function(data){
                            bootbox.dialog({
                                message: data,
                                title: "Daily Door Counts",
                            });
                        }
                    });
                });

                //List of daily_door_counts
                $("#list_dealer_registers").on('click',function(e){
                    e.preventDefault();

                    $.ajax({
                        type: "GET",
                        cache: false,
                        url: "/dealer_settings/list_dealer_registers/",
                        success: function(data){
                            bootbox.dialog({
                                message: data,
                                title: "Daily POS Count",
                            });
                        }
                    });
                });

                $('[name^="workload_active"]').change(function(){

                    $.ajax({
                        type: "get",
                        cache: false,
                        dataType: 'json',
                        data: {'active': $(this).is(":checked"),'id':$(this).val()},
                        url:  "/dealer_settings/activate_workload_header/",
                        success: function(data){

                        }
                    });

                });

                $('.custom_forms').change(function(){

                    form_id=$(this).attr('data-id');
                    form_type=$(this).attr('form-type');
                    form_print=$(this).attr('form-print');
                    action='add';
                    if(!$(this).is(":checked"))
                    {
                        action='delete';
                    }
                    $.ajax({
                        type: "post",
                        cache: false,
                        dataType: 'json',
                        data: {form_id: form_id,form_type:form_type,action:action,form_print:form_print},
                        url:  "/dealer_settings/custom_forms/",
                        success: function(data){

                        }
                    });

                });


                $('#move-lead-deal').change(function(){
                    val='0';
                    if($(this).is(":checked"))
                    {
                        val='1';
                    }
                    $.ajax({
                        type: "GET",
                        cache: false,
                        url:  "/dealer_settings/move_lead_deal/"+val,
                        success: function(data){

                        }
                    });

                });

                $('#bdc-alert-status').change(function(){
                    val='0';
                    if($(this).is(":checked"))
                    {
                        val='1';
                    }
                    $.ajax({
                        type: "GET",
                        cache: false,
                        url:  "/dealer_settings/bdc_alert_status/"+val,
                        success: function(data){

                        }
                    });

                });


            });



            /////NPA api setting save

            function CreateNpaApiUser(){
                var username = $("#npa_username").val();
                var password = $("#npa_password").val();
                var confirm_password = $("#npa_confirm_password").val();
                if(username==''){
                    alert("You must enter username");
                    return false;
                }
                if(password==''){
                    alert("You must enter Password");
                    return false;
                }
                if(confirm_password==''){
                    alert("You must enter Confirm Password");
                    return false;
                }

                /*if(username.length>64){
                        alert("Username must be upto 64 characters");
                        return false;
                }

                if(password.length<6){
                        alert("Paasword must be at least 6 characters");
                        return false;
                }*/

                if(password!=confirm_password){
                    alert("Password and Confirm Password do not match");
                    return false;
                }

                $.ajax({
                    type: "get",
                    cache: false,
                    data: {'user': username,'password':password},
                    url:  "/dealer_settings/create_npa_user/",
                    success: function(data){
                        if($.trim(data)=='success'){
                            $("#npa_response").html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong>Successful!</strong> NPA API information is saved.</div>');
                            $("#npa_response").delay(3000).fadeOut("slow");
                            //$("#btn_sendgrid_create_user_save").html('');
                        }else if($.trim(data)!=''){
                            $("#npa_response").html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>'+data+'</div>');
                            $("#npa_response").delay(3000).fadeOut("slow");
                        }
                    }
                });
            }

            /////NPA api setting save end



            function SendContactDetailsForLastMonth(){
                var send_contact_details_type = $("#send_contact_details_type").val();
                $.ajax({
                    type: "get",
                    cache: false,
                    url:  "/crons/SendContactDetailsForLastMonth/<?php echo AuthComponent::user('dealer_id'); ?>/"+send_contact_details_type,
                    success: function(data){
                        alert("Contacts details are sent in email");
                    }
                });

            }

            function CreateSendgridUser(){
                var username = $("#sendgrid_username").val();
                var password = $("#sendgrid_password").val();
                var confirm_password = $("#sendgrid_confirm_password").val();
                if(username==''){
                    alert("You must enter username");
                    return false;
                }
                if(password==''){
                    alert("You must enter Password");
                    return false;
                }
                if(confirm_password==''){
                    alert("You must enter Confirm Password");
                    return false;
                }

                if(username.length>64){
                    alert("Username must be upto 64 characters");
                    return false;
                }

                if(password.length<6){
                    alert("Paasword must be at least 6 characters");
                    return false;
                }

                if(password!=confirm_password){
                    alert("Password and Confirm Password do not match");
                    return false;
                }

                $.ajax({
                    type: "get",
                    cache: false,
                    data: {'user': username,'password':password},
                    url:  "/dealer_settings/create_sendgrid_user/",
                    success: function(data){
                        if($.trim(data)=='success'){
                            $("#sendgrid_response").html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong>Successful!</strong> User is created on Sendgrid.</div>');
                            $("#btn_sendgrid_create_user_save").html('');
                        }else if($.trim(data)!=''){
                            $("#sendgrid_response").html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>'+data+'</div>');
                        }
                    }
                });
            }

</script>
