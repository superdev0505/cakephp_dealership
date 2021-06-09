</br>
<?php
$dealer = AuthComponent::user('dealer');
//echo $dealer;

$dealer_id = AuthComponent::user('dealer_id');
//echo $dealer_id;

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer_type = AuthComponent::user('dealer_type');
//echo $dealer_type;

$sales_steps = AuthComponent::user('step_procces');
//echo $sales_steps;
?>
<br />
<br />
<br />
<div class="innerLR">
    <?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
    <div class="row">
        <!--        <div class="col-md-9">-->
        <div >
            <div class="wizard">
                <div class="widget widget-tabs widget-tabs-responsive">
                    <!-- Widget heading -->
                    <div class="widget-head">
                        <ul>
                            <li class="active"><a href="#tab1-1" id='btn_tab_1' class="glyphicons user" data-toggle="tab"><i></i>Add New Master User</a></li>
                            <li class=""><a href="#tab1-2" id='btn_tab_step_definition' class="glyphicons user" data-toggle="tab"><i></i>Step Definition</a></li>
                        </ul>
                    </div>
                    <div class="widget-body">
                        <?php
                        echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action'=>'add_new_master'), 'autocomplete' => "off", 'novalidate' , 'class' => 'form-inline apply-nolazy'));

                        echo $this->Form->hidden('register_timestamp', array('value' => date('Y-m-d H:i:s')));
                        ?>
                        <div class="tab-content">

                            <!-- Tab 2 start -->
                           <div class="tab-pane" id="tab1-2">





                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                                            <!-- Table heading -->
                                            <thead>
                                                <tr>
                                                    <th>Step ID</th>
                                                    <th>Default Name</th>
                                                    <th>Custom Name</th>
                                                    <th>Visible</th>
                                                    <th>Call Center</th>

                                                </tr>
                                            </thead><!-- // Table heading END -->
                                            <!-- Table body -->

                                            <tbody>


                                                <tr>
                                                    <td style="color: #3695d5">
                                                        3 &nbsp;

<input name="data[StepDefinition][11][custom_name]" value="Pending" class="form-control" style="width: auto; color: #3695d5" type="Hidden" id="StepDefinition11CustomName">
<input type="hidden" name="data[StepDefinition][11][step_id]" value="1" id="StepDefinition11StepId">
<input type="hidden" name="data[StepDefinition][11][dealer_id]" value="1370" id="StepDefinition11DealerId">
<input type="hidden" name="data[StepDefinition][11][visible]" id="StepDefinition11Visible" value="1">
<input type="hidden" name="data[StepDefinition][11][call_center]" id="StepDefinition11CallCenter" value="0">




                                                    </td>
                                                    <td style="color: #3695d5">Greet&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][0][custom_name]" value="Greet" class="form-control"
                                                         style="width: auto; color: #3695d5" type="text" id="StepDefinition0CustomName">
                                                    </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][0][step_id]" value="3" id="StepDefinition0StepId">                                            <input type="hidden" name="data[StepDefinition][0][dealer_id]" value="1370" id="StepDefinition0DealerId">

                                                        <input type="hidden" name="data[StepDefinition][0][visible]" id="StepDefinition0Visible_" value="0">
                                                        <label for="StepDefinition0Visible" class="checkbox">
                                                        <input type="checkbox" name="data[StepDefinition][0][visible]" checked="checked" style="width: auto" value="1" id="StepDefinition0Visible">
                                                        </label>                                       </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][0][call_center]" id="StepDefinition0CallCenter_" value="0"><label for="StepDefinition0CallCenter" class="checkbox"><input type="checkbox" name="data[StepDefinition][0][call_center]" class="chk_call_center" style="width: auto" value="1" id="StepDefinition0CallCenter"></label>                                        </td>


                                                </tr>
                                                                                <tr>
                                                    <td style="color: #3695d5">4&nbsp;</td>
                                                    <td style="color: #3695d5">Identify&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][1][custom_name]" value="Identify" class="form-control" style="width: auto; color: #3695d5" type="text" id="StepDefinition1CustomName"></td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][1][step_id]" value="4" id="StepDefinition1StepId">                                            <input type="hidden" name="data[StepDefinition][1][dealer_id]" value="1370" id="StepDefinition1DealerId">

                                                        <input type="hidden" name="data[StepDefinition][1][visible]" id="StepDefinition1Visible_" value="0"><label for="StepDefinition1Visible" class="checkbox"><input type="checkbox" name="data[StepDefinition][1][visible]" checked="checked" style="width: auto" value="1" id="StepDefinition1Visible"></label>                                       </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][1][call_center]" id="StepDefinition1CallCenter_" value="0"><label for="StepDefinition1CallCenter" class="checkbox"><input type="checkbox" name="data[StepDefinition][1][call_center]" class="chk_call_center" style="width: auto" value="1" id="StepDefinition1CallCenter"></label>                                        </td>


                                                </tr>
                                                                                <tr>
                                                    <td style="color: #3695d5">5&nbsp;</td>
                                                    <td style="color: #3695d5">Present&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][2][custom_name]" value="Present" class="form-control" style="width: auto; color: #3695d5" type="text" id="StepDefinition2CustomName"></td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][2][step_id]" value="5" id="StepDefinition2StepId">                                            <input type="hidden" name="data[StepDefinition][2][dealer_id]" value="1370" id="StepDefinition2DealerId">

                                                        <input type="hidden" name="data[StepDefinition][2][visible]" id="StepDefinition2Visible_" value="0"><label for="StepDefinition2Visible" class="checkbox"><input type="checkbox" name="data[StepDefinition][2][visible]" checked="checked" style="width: auto" value="1" id="StepDefinition2Visible"></label>                                       </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][2][call_center]" id="StepDefinition2CallCenter_" value="0"><label for="StepDefinition2CallCenter" class="checkbox"><input type="checkbox" name="data[StepDefinition][2][call_center]" class="chk_call_center" style="width: auto" value="1" id="StepDefinition2CallCenter"></label>                                        </td>


                                                </tr>
                                                                                <tr>
                                                    <td style="color: #3695d5">6&nbsp;</td>
                                                    <td style="color: #3695d5">Sit Down&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][3][custom_name]" value="Sit Down" class="form-control" style="width: auto; color: #3695d5" type="text" id="StepDefinition3CustomName"></td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][3][step_id]" value="6" id="StepDefinition3StepId">                                            <input type="hidden" name="data[StepDefinition][3][dealer_id]" value="1370" id="StepDefinition3DealerId">

                                                        <input type="hidden" name="data[StepDefinition][3][visible]" id="StepDefinition3Visible_" value="0"><label for="StepDefinition3Visible" class="checkbox"><input type="checkbox" name="data[StepDefinition][3][visible]" checked="checked" style="width: auto" value="1" id="StepDefinition3Visible"></label>                                       </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][3][call_center]" id="StepDefinition3CallCenter_" value="0"><label for="StepDefinition3CallCenter" class="checkbox"><input type="checkbox" name="data[StepDefinition][3][call_center]" class="chk_call_center" style="width: auto" value="1" id="StepDefinition3CallCenter"></label>                                        </td>


                                                </tr>
                                                                                <tr>
                                                    <td style="color: #3695d5">7&nbsp;</td>
                                                    <td style="color: #3695d5">Write Up&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][4][custom_name]" value="Write Up" class="form-control" style="width: auto; color: #3695d5" type="text" id="StepDefinition4CustomName"></td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][4][step_id]" value="7" id="StepDefinition4StepId">                                            <input type="hidden" name="data[StepDefinition][4][dealer_id]" value="1370" id="StepDefinition4DealerId">

                                                        <input type="hidden" name="data[StepDefinition][4][visible]" id="StepDefinition4Visible_" value="0" disabled="disabled"><label for="StepDefinition4Visible" class="checkbox"><input type="checkbox" name="data[StepDefinition][4][visible]" checked="checked" disabled="disabled" style="width: auto" class="disabled" value="1" id="StepDefinition4Visible"></label>                                      </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][4][call_center]" id="StepDefinition4CallCenter_" value="0"><label for="StepDefinition4CallCenter" class="checkbox"><input type="checkbox" name="data[StepDefinition][4][call_center]" class="chk_call_center" style="width: auto" value="1" id="StepDefinition4CallCenter"></label>                                        </td>


                                                </tr>
                                                                                <tr>
                                                    <td style="color: #3695d5">8&nbsp;</td>
                                                    <td style="color: #3695d5">Close&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][5][custom_name]" value="Close" class="form-control" style="width: auto; color: #3695d5" type="text" id="StepDefinition5CustomName"></td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][5][step_id]" value="8" id="StepDefinition5StepId">
                                                        <input type="hidden" name="data[StepDefinition][5][dealer_id]" value="1370" id="StepDefinition5DealerId">

                                                        <input type="hidden" name="data[StepDefinition][5][visible]" id="StepDefinition5Visible_" value="0" disabled="disabled"><label for="StepDefinition5Visible" class="checkbox">
                                                        <input type="checkbox" name="data[StepDefinition][5][visible]" checked="checked" disabled="disabled" style="width: auto" class="disabled" value="1" id="StepDefinition5Visible"></label>
                                                    </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][5][call_center]" id="StepDefinition5CallCenter_" value="0">
                                                        <label for="StepDefinition5CallCenter" class="checkbox">
                                                            <input type="checkbox" name="data[StepDefinition][5][call_center]" class="chk_call_center" style="width: auto" value="1" id="StepDefinition5CallCenter">
                                                        </label>
                                                    </td>


                                                </tr>
                                                                                <tr>
                                                    <td style="color: #3695d5">9&nbsp;</td>
                                                    <td style="color: #3695d5">F/I&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][6][custom_name]" value="F/I" class="form-control" style="width: auto; color: #3695d5" type="text" id="StepDefinition50CustomName"></td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][6][step_id]" value="9" id="StepDefinition50StepId">
                                                        <input type="hidden" name="data[StepDefinition][6][dealer_id]" value="1370" id="StepDefinition50DealerId">

                                                        <input type="hidden" name="data[StepDefinition][6][visible]" id="StepDefinition50Visible_" value="0"><label for="StepDefinition50Visible" class="checkbox"><input type="checkbox" name="data[StepDefinition][6][visible]" checked="checked" style="width: auto" value="1" id="StepDefinition50Visible"></label>                                       </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][6][call_center]" id="StepDefinition50CallCenter_" value="0">
                                                        <label for="StepDefinition50CallCenter" class="checkbox">
                                                            <input type="checkbox" name="data[StepDefinition][6][call_center]" class="chk_call_center" style="width: auto"
                                                             value="1" id="StepDefinition50CallCenter"></label>
                                                    </td>


                                                </tr>
                                                                                <tr>
                                                    <td style="color: #3695d5">10&nbsp;</td>
                                                    <td style="color: #3695d5">Sold&nbsp;</td>
                                                    <td style="color: #3695d5">
                                                        <input name="data[StepDefinition][7][custom_name]" value="Sold" class="form-control"
                                                         style="width: auto; color: #3695d5" type="text" id="StepDefinition51CustomName">
                                                    </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][7][step_id]" value="10" id="StepDefinition51StepId">
                                                        <input type="hidden" name="data[StepDefinition][7][dealer_id]" value="1370" id="StepDefinition51DealerId">

                                                        <input type="hidden" name="data[StepDefinition][7][visible]" id="StepDefinition51Visible_" value="0" disabled="disabled"><label for="StepDefinition51Visible" class="checkbox"><input type="checkbox" name="data[StepDefinition][7][visible]" checked="checked" disabled="disabled" style="width: auto" class="disabled" value="1" id="StepDefinition51Visible"></label>
                                                    </td>
                                                    <td style="color: #3695d5">
                                                        <input type="hidden" name="data[StepDefinition][7][call_center]" id="StepDefinition51CallCenter_" value="0"><label for="StepDefinition51CallCenter" class="checkbox"><input type="checkbox" name="data[StepDefinition][7][call_center]" class="chk_call_center" style="width: auto" value="1" id="StepDefinition51CallCenter"></label>
                                                    </td>


                                                </tr>
                                                                            <!-- // Table row END -->
                                            </tbody>
                                            <!-- // Table body END -->
                                        </table>
                                        <!-- // Table END -->

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'adminhome', 'action' => 'index')); ?>" class="btn btn-primary"><i class="icon-reply"></i>&nbsp;Back to Dashboard</a>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-2" style="float: right;left: -25px;">
                                        <button id="submit_form_master_user" class="btn btn-success" type="button"><i class="icon-save"></i> Add New User</button>

                                        <div class="separator"></div>
                                    </div>
                                </div>


                            </div>
                            <!-- Tab 2 End -->


                            <!-- Step 1 -->
                            <div class="tab-pane active" id="tab1-1">
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('dealer', '<i style="color:red;">*</i> Dealer Name:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('dealer', array('type' => 'text',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('dealer_id', '<i style="color:red;">*</i> Dealer ID:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('dealer_id', array('type' => 'text',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('first_name', '<i style="color:red;">*</i> First Name:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('first_name', array( 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('last_name', '<i style="color:red;">*</i> Last Name:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('last_name', array( 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_address', '<i style="color:red;">*</i> Dealer Address:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_address', array('type' => 'text',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_city', '<i style="color:red;">*</i> Dealer City:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_city', array('type' => 'text',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('locale', '<i style="color:red;">*</i> Dealer Locale:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('locale', array('type' => 'select', 'class' => 'form-control','options' => $this->App->getLocaleList(), 'style' => 'width: 100%')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_state', '<i style="color:red;">*</i> Dealer State:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_state', array('type' => 'select', 'options' => $this->App->getStateList('United States', 'array'), 'empty' => 'Select', 'label' => false, 'div' => false, 'selected' => '', 'class' => 'form-control', 'style' => 'width: 100%')); ?>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_zip', '<i style="color:red;">*</i> Dealer Zip:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_zip', array( 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_phone', '<i style="color:red;">*</i> Dealer Phone:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_phone', array('type' => 'text',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_fax', '<i style="color:red;">*</i> Dealer Fax:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_fax', array('type' => 'text',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_website', '<i style="color:red;">*</i> Dealer Website:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_website', array( 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_web_provider', '<i style="color:red;">*</i> Website Provider:', array('class' => 'strong')); ?>
                                        <?php
                                        echo $this->Form->input('d_web_provider', array(
                                            'options' => array(
                                                'Dealer Spike' => 'Dealer Spike',
                                                'PSN' => 'PSN',
                                                '50 Below' => '50 Below',
                                                'ADP' => 'ADP',
                                                'Cobalt' => 'Cobalt',
                                                'ARI' => 'ARI',
                                                'Dealer Socket' => 'Dealer Socket',
                                                'Other' => 'Other'
                                            ),
                                            'empty' => 'Select',
                                            'label' => false,
                                            'div' => false,

                                            'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('username', '<i style="color:red;">*</i> Username:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('username', array( 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('zone', '<i style="color:red;">*</i> Time Zone:', array('class' => 'strong')); ?>
                                        <?php
                                        echo $this->Form->input('zone', array(
                                            'options' => $this->App->getTimezoneList(),
                                            'empty' => 'Select',
                                            'label' => false,
                                            'div' => false,
                                            'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('step_procces', '<i style="color:red;">*</i> Step Procces:', array('class' => 'strong')); ?>
                                        <?php
                                        echo $this->Form->input('step_procces', array(
                                            'options' => array(
                                                'lemco_steps' => 'Lemco 1-9',
                                                'hd_steps' => 'H-D Steps 1-7'),
                                            'empty' => 'Select',
                                            'label' => false,
                                            'div' => false,

                                            'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('dealer_type', '<i style="color:red;">*</i> Dealer Type:', array('class' => 'strong')); ?>
                                        <?php
                                        echo $this->Form->input('dealer_type', array(
                                            'options' => array(
                                                'HD' => 'H-D Dealer',
                                                'Metric' => 'Metric Dealer',
                                                'RV' => 'RV',
                                                'Marine' => 'Marine',
                                                'Auto' => 'Auto',
                                                'AG' => 'AG',
                                                'Wheel/Tire' => 'Wheel/Tire','Trailer' => 'Trailer'),
                                            'empty' => 'Select',
                                            'label' => false,
                                            'div' => false,
                                            'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('group_id', '<i style="color:red;">*</i> Staff Type:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('group_id', array('options' => $grouplist, 'class' => 'form-control', 'style' => 'width: 100%', 'empty' => 'Select')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_type', '<i style="color:red;">*</i> D Type:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_type', array('type' => 'text',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('password', '<i style="color:red;">*</i> Password:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('password', array('type' => 'password',  'class' => 'form-control')); ?>
                                        <a href="javascript:" id="access">Click to Auto-fill "Access"</a> | <a href="javascript:" id="noaccess">Click to Auto-fill "No Access"</a>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php echo $this->Form->label('confirm', '<i style="color:red;">*</i> Confirm Password:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('confirm', array('type' => 'password',  'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('d_email', '<i style="color:red;">*</i> Dealer Email:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('d_email', array('type' => 'email',  'id' => 'demail', 'class' => 'form-control')); ?>
                                        <a href="javascript:" id="dl_email">Click to Auto-fill "Dealer Email"</a>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->label('email', '<i style="color:red;">*</i> Your Email:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('email', array('type' => 'email',  'class' => 'form-control')); ?>
                                        <a href="javascript:" id="uremail">Click to Auto-fill "Your Email"</a>
                                        <div class="separator"></div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <?php echo $this->Form->label('pool_id', '<i style="color:red;">*</i> Database Pool:', array('class' => 'strong')); ?>
                                        <?php echo $this->Form->input('pool_id', array('options' => $pool_list, 'class' => 'form-control', 'style' => 'width: 100%', 'empty' => 'Select','required' => 'required')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    
                                    
                                    <div class="col-md-2">
                                        <?php echo $this->Form->input('active', array('checked'=>'checked', 'hiddenField'=>false, 'label' => '&nbsp; <i style="color:red;">*</i> Activate User', 'div' => false, 'class' => 'input-mini')); ?>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?php echo $this->Html->url(array('controller' => 'adminhome', 'action' => 'index')); ?>" class="btn btn-primary"><i class="icon-reply"></i>&nbsp;Back to Dashboard</a>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-2" style="float: right;left: -25px;">

                                        <button id='tab_next_strep' class='btn btn-sm btn-success' type ='button' >Next Step</button>

                                        <div class="separator"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $script.ready('bundle', function() {

<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
            $(window).load(function(){
<?php } ?>


                function validate_form(){

                        if( $("#UserDealer").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDealer").focus();
                            alert('Please enter Dealer Name');
                            return false;
                        }
                        if( $("#UserDealerId").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDealerId").focus();
                            alert('Please enter Dealer ID');
                            return false;
                        }
                        if( $("#UserFirstName").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserFirstName").focus();
                            alert('Please enter First Name');
                            return false;
                        }
                        if( $("#UserLastName").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserLastName").focus();
                            alert('Please enter Last Name');
                            return false;
                        }
                        if( $("#UserDAddress").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDAddress").focus();
                            alert('Please enter Dealer Address');
                            return false;
                        }
                        if( $("#UserDCity").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDCity").focus();
                            alert('Please enter  Dealer City');
                            return false;
                        }

                        if( $("#UserDState").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDState").focus();
                            alert('Please Select  Dealer State');
                            return false;
                        }
                         if( $("#UserDZip").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                           $("#UserDZip").focus();
                            alert('Please enter  Dealer Zip');
                            return false;
                        }
                         if( $("#UserDPhone").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDPhone").focus();
                            alert('Please enter  Dealer Phone');
                            return false;
                        }
                         if( $("#UserDFax").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDFax").focus();
                            alert('Please enter  Dealer Faz');
                            return false;
                        }
                        if( $("#UserDWebsite").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDWebsite").focus();
                            alert('Please enter  Dealer Website');
                            return false;
                        }
                        if( $("#UserDWebProvider").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                           $("#UserDWebProvider").focus();
                            alert('Please Select Dealer Website Provider ');
                            return false;
                        }
                        if( $("#UserUsername").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                           $("#UserUsername").focus();
                            alert('Please enter Username');
                            return false;
                        }
                        if( $("#UserZone").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                           $("#UserZone").focus();
                            alert('Please select Dealer Time Zone');
                            return false;
                        }
                        if( $("#UserStepProcces").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                           $("#UserStepProcces").focus();
                            alert('Please select Step Procces');
                            return false;
                        }
                        if( $("#UserDealerType").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                           $("#UserDealerType").focus();
                            alert('Please Select Dealer Type ');
                            return false;
                        }

                        if( $("#UserGroupId").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserGroupId").focus();
                            alert('Please enter  Dealer ');
                            return false;
                        }

                        if( $("#UserDType").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserDType").focus();
                            alert('Please enter  Dealer ');
                            return false;
                        }

                        if( $("#UserPassword").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                           $("#UserPassword").focus();
                            alert('Please enter  Dealer Password');
                            return false;
                        }
                        if( $("#UserConfirm").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                          $("#UserConfirm").focus();
                            alert('Please enter  Dealer Confirm Password');
                            return false;
                        }
                        if( $("#demail").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#demail").focus();
                            alert('Please enter  Dealer Email');
                            return false;
                        }
                        if( $("#UserEmail").val() == '' ){
                            $("#btn_tab_1").trigger('click');
                            $("#UserEmail").focus();
                            alert('Please enter  Your Email');
                            return false;
                        }

                        $("#btn_tab_step_definition").trigger('click');

                     }

                    $("#tab_next_strep").click(function(){
                        validate_form();
                    });

                    $("#submit_form_master_user").click(function(){
                        if( validate_form() == false){
                            return false;
                        }else{
                            $("#UserAddNewMasterForm").submit();
                        }
                    });

<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
            });
<?php } ?>

        var us_states = <?php echo $this->App->getStateList('United States', 'json'); ?>;
        var ca_states = <?php echo $this->App->getStateList('Canada', 'json'); ?>;

        load_states('en-us');

        function load_states(country) {
            if(country == 'en-us') {
                state_list = us_states;
                $("label[for = UserDState]").text('');
                $("label[for = UserDState]").append('<i style="color:red;">*</i> Dealer State:');
            } else {
                state_list = ca_states;
                $("label[for = UserDState]").text('');
                $("label[for = UserDState]").append('<i style="color:red;">*</i> Dealer Province:');
            }

            var select_state = $('#UserDState');
            select_state.find('option').remove();
            select_state.append('<option value="">Select</option>');
            $.each(state_list, function(key, value) {
                select_state.append('<option value=' + key + '>' + value + '</option>');
            });
        }

        $('#UserLocale').change(function() {
            load_states($(this).val());
        });

        //auto fill password and confirm password
        $( "#access" ).click(function() {
            $( "#UserPassword" ).val("access123!");
            $( "#UserConfirm" ).val("access123!");
        });
        $( "#noaccess" ).click(function() {
            $( "#UserPassword" ).val("noaccess123!");
            $( "#UserConfirm" ).val("noaccess123!");
        });

        //auto fill your email
        $("#uremail").click(function() {
            $("#UserEmail").val("unknow@unknown.com");
        });
        //auto fill Dealer email
        $("#dl_email").click(function() {
            $("#demail").val("unknow@unknown.com");
        });
        //auto fill User Name By Last Name
        $("#UserLastName").blur(function() {
            var firstName=$("#UserFirstName").val().toLowerCase();
            var firstName=firstName.replace(/\s/g, '');
            var brkFname = firstName.split(' ');
            var firstLetter = brkFname[brkFname.length - 1].charAt(0);
            var lastName=$("#UserLastName").val().toLowerCase();
            var fullname=firstLetter+lastName;
            $("#UserUsername").val(fullname);
        });
        //auto fill User Name By First Name
        $("#UserFirstName").blur(function() {
            var firstName=$("#UserFirstName").val().toLowerCase();
            var firstName=firstName.replace(/\s/g, '');
            var brkFname = firstName.split(' ');
            var firstLetter = brkFname[brkFname.length - 1].charAt(0);
            var lastName=$("#UserLastName").val().toLowerCase();
            var fullname=firstLetter+lastName;
            $("#UserUsername").val(fullname);
        });
        //on change of Dealer Type
        $("#UserDealerType").change(function(){
            //alert($("#buy_quantity").val());
            var txtvalue=$("#UserDealerType").val();
            if(txtvalue=='HD'){
                $("#UserDType").val('Harley-Davidson');
            }else if(txtvalue=='Metric'){
                $("#UserDType").val('Powersports');
            }else{
                $("#UserDType").val(txtvalue);
            }
        });
    });
</script>
