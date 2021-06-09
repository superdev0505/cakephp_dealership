<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
        <div id="trim_search_result">
            <br>
            <div id="report_data_container">
                <h4>Automatic Import Process (Final Stage- Data move into contacts, histories, lead_solds, Events Table here):</h4>
            </div>

            <div class="widget-body">
                <div class="innerLR">

                    <div class="widget">
                        <div class="widget-body padding-none" style="margin: 15px;">

                            <div class="table-responsive">
                                <div id="Campaign-grid" class="grid-view">

                                    <table class="table table-bordered table-hover table-striped">
                                        <thead  class="bg-primary">
                                            <tr>
                                                <th id="Campaign-grid_c0"  style="width:215px;" >CRM Fields</th>
                                                <th id="Campaign-grid_c0">Legacy Fields</th>
                                            </tr>
                                        </thead>
                                        <tbody>               
                                            <?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
                                            <?php echo $this->Form->create('Dataimport', array('url' => array('controller' => 'Dataimport', 'action' => 'final_stage'), 'class' => 'form-horizontal apply-nolazy', 'role' => "form", 'type' => 'file')); ?>
                                            <?php
                                            //$fldvalue = array('email', 'phone', 'work_number', 'mobile', 'fax', 'best_time', 'dob', 'address', 'city', 'state', 'zip', 'county', 'country', 'year', 'make', 'model', 'condition', 'unit_value', 'vin', 'odometer', 'stock_num', 'year_trade', 'make_trade', 'model_trade', 'condition_trade', 'trade_value', 'vin_trade', 'odometer_trade', 'stock_num_trade', 'notes');
                                            $fldvalue = array('email','fax', 'best_time', 'dob', 'address', 'city', 'state', 'zip', 'county', 'country','vin', 'odometer', 'stock_num','vin_trade', 'odometer_trade', 'stock_num_trade', 'notes');
                                            //$allcrmfields = array('Email', 'Phone', 'Work Number', 'Mobile', 'Fax', 'Best Time', 'Date of Birth', 'Address', 'City', 'State', 'Zip', 'County', 'Country', 'Year', 'Make', 'Model', 'Condition', 'Unit Value', 'Vin', 'Odometer', 'Stock Num', 'Trade Year', 'Trade Make', 'Trade Model', 'Trade Condition', 'Trade Unit Value', 'Trade Vin', 'Trade Odometer', 'Trade Stock Num', 'Notes');
                                            $allcrmfields = array('Email','Fax', 'Best Time', 'Date of Birth', 'Address', 'City', 'State', 'Zip', 'County', 'Country', 'Vin', 'Odometer', 'Stock Num', 'Trade Vin', 'Trade Odometer', 'Trade Stock Num', 'Notes');
                                            $inc = 0;
                                            foreach ($allcrmfields as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $value; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($value != 'Notes') {

                                                            echo $this->Form->input($fldvalue[$inc], array(
                                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                                        } else {
                                                            ?>


                                                            <?php
                                                            foreach ($finalfields as $fld_value) {
                                                                ?> 
                                                                <div style="display: inline-block; margin-top: 0;" class=""> 
                                                                    <label class="status-done1"> 
                                                                        <input  class="checkbox1" type="checkbox" value="<?php echo $fld_value; ?>" name="notesfld[]" >
                                    <!--                                    <i class="fa fa-fw fa-square-o"></i>-->
                                                                        <?php echo $fld_value; ?>
                                                                    </label> 
                                                                </div>
                                                                &nbsp;&nbsp;
                                                                <?php
                                                            }
                                                        }
                                                        ?> 

                                                    </td>
                                                </tr>
                                                <?php
                                                $inc++;
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    Auto Fill in Fields
                                                </td>
                                                <td>
                                                    First Name,	Last Name, Middle Name, Suffix,Phone, Work Phone, Mobile, Dealer Name, Dealer_id,  Sperson, user_id, chk_duplicate, Import, Import Date, Sales_step, Sales_status, Lead_status, Source, Contact_status_id, Year, Make, Model, Condition, Unit Value, Web Selection, Class, Type, Category, Trade Year, Trade Make, Trade Model, Trade Condition, Trade Unit Value, Trade Selection, Trade Class, Trade Type, Trade Category, Step Modifed Date, Sold Date, Created Date, Modified Date
                                                </td>
                                            </tr>

                                        </tbody>   
                                    </table>
                                    <div class="pull-right">
                                        <button type="submit" id='submit_support' class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Move Data</button>
                                    </div>
                                    <div class="clearfix"></div>

<?php echo $this->Form->end(); ?> 

                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <!-- //Search result End-->
            </div>
        </div>

        <script type="text/javascript">
            $script.ready('bundle', function() {
                //$(".alert").delay(8000).fadeOut("slow");
            });
        </script>