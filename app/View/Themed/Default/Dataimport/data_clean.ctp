<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
        <div id="trim_search_result">
            <br>
            <div id="report_data_container">
                <h4>Automatic Import Process (Data Cleaning):</h4>
            </div>

            <div class="widget-body">
                <div class="innerLR">

                    <?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
                    <?php echo $this->Form->create('Dataimport', array('url' => array('controller' => 'Dataimport', 'action' => 'data_clean',$id), 'class' => 'form-horizontal apply-nolazy', 'role' => "form", 'type' => 'file')); ?>
                    <!--                                    Start Tab-->
                    <!--                                    Start Tab-->

                    <div class="widget">
                        <div class="widget-body padding-none">
                            <div class="tabsbar tabsbar-2">
                                <ul class="row row-merge">
                                    <li class="col-md-3 text-center active" style="width:100px;padding: 0px;"><a style="padding: 0px;padding-left: 2px;" data-toggle="tab" href="#tab1-4" id="clk_dealership">Dealer Info</a></li>
                                    <li class="col-md-3" style=" width: 212px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab2-4" id="clk_weblead">Customer Name (Split)& Date</a></li>
                                    <li class="col-md-3" style=" width: 146px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab3-4" id="clk_nonusedweblead">Sperson/ User_id</a></li>
                                    <li class="col-md-3" style=" width: 146px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab4-4" id="clk_usedweblead">Vehicle Clean Up</a></li>
                                    <li class="col-md-3" style=" width: 110px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab6-6" id="clk_nonusedweblead">Sales Source</a></li>
                                    <li class="col-md-3" style=" width: 148px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab5-5" id="clk_usedweblead">Contact_Status_id</a></li>
                                    <li class="col-md-3" style=" width: 128px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab7-7" id="clk_usedweblead">Sales Step</a></li>
                                    <li class="col-md-3" style=" width: 128px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab8-8" id="clk_usedweblead">Others</a></li>
                                    <li class="col-md-3" style=" width: 138px;padding-left: 0px;" ><a style="padding: 0px;text-align: center;" data-toggle="tab" href="#tab9-9" id="clk_usedweblead">Lead Status</a></li>
                                </ul>
                            </div>
                            <!-- // Tabs Heading END -->

                            <div class="tab-content">

                                <!-- Tab content -->
                                <div id="tab1-4" class="tab-pane active" style="padding-left:10px">
                                    <!--				<ul class="list-group list-group-1 margin-none borders-none" style="height: 470px;overflow-y: scroll;">-->
                                    <div class="row">
                                        <div class="col-md-3"><?php echo $this->Form->label('new_dealer_id', 'Dealer ID:', array('class' => 'strong')); ?> <?php echo $this->Form->input('new_dealer_id', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3"> <?php echo $this->Form->label('new_dealer_name', 'Dealer Name:'); ?> <?php echo $this->Form->input('new_dealer_name', array('type' => 'text', 'label' => false, 'class' => 'form-control')); ?>
                                            <div class="separator"></div>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>  
                                    </div>
                                </div>
                                <!-- // Tab content END -->

                                <!-- Tab content -->
                                <div id="tab2-4" class="tab-pane" style="padding-left:10px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="DataimportLabel" class="strong text-primary ">Customer Info Clean up:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><?php echo $this->Form->label('fullname', 'Customer Full Name Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('fullname', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-1">
                                            <label  class="strong">Not exist?</label> 
                                            <input type="checkbox" name="fullname_notexist" id="fullname_notexist" class="form-control">
                                            <div class="separator">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" id="names_parts" style="display: none;">
                                        <div class="col-md-3"><?php echo $this->Form->label('fname', 'Customer First Name Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('fname', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                        <div class="col-md-3"><?php echo $this->Form->label('lname', 'Customer Last Name Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('lname', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3"><?php echo $this->Form->label('mname', 'Customer Middle Name Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('mname', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3"><?php echo $this->Form->label('suffix', 'Suffix Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('suffix', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="DataimportLabel" class="strong text-primary ">Phone, Mobile & Work Number Clean up:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><?php echo $this->Form->label('phone', 'Phone Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('phone', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3"><?php echo $this->Form->label('mobile', 'Mobile Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('mobile', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3"><?php echo $this->Form->label('work_num', 'Work Number Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('work_num', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="DataimportLabel" class="strong text-primary "> Correct date time format for CRM:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php echo $this->Form->label('created_date', 'Created Date Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('created_date', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <!--                                <div class="col-md-3"><?php //echo $this->Form->label('modified_date', 'Modified Date Field:', array('class' => 'strong'));  ?> 
                                        <?php
                                        /* echo $this->Form->input('modified_date', array(
                                          'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%')); */
                                        ?>
                                        
                                                                            <div class="separator"></div>
                                                                        </div>-->
                                        <div class="col-md-3"><?php echo $this->Form->label('modified_date', 'Modified Date Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('modified_date', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                        <div class="col-md-3"><?php echo $this->Form->label('nextactivity_date', 'Next Activity Date Field (For EVENTS):', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('nextactivity_date', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>	
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>          
                                    </div>
                                </div>
                                <!-- // Tab content END -->
                                <!-- Non used Tab content -->
                                <div id="tab3-4" class="tab-pane" style="padding-left:10px">
                                    <div class="row">
                                        <div class="col-md-3"><?php echo $this->Form->label('sperson', 'Sperson Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('sperson', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-1">
                                            <label  class="strong">Not exist?</label> 
                                            <input type="checkbox" name="sperson_notexist" id="sperson_notexist" class="form-control">
                                            <div class="separator">
                                            </div>
                                        </div>

                                    </div>
                                    <div id="allvalue" class="row">

                                    </div>
                                    <div class="row" style="display: none;" id="sperson_notexistdata">
                                     
                                    </div>


                                    <!--     OR                        <div class="row">
                                        <div class="col-md-3"><?php //echo $this->Form->label('new_dealer_id', 'Dealer ID:', array('class' => 'strong'));  ?> <?php //echo $this->Form->input('new_dealer_id', array('type' => 'text', 'label' => false, 'div' => false,'class' => 'form-control'));  ?>
                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3"> <?php //echo $this->Form->label('new_dealer_name', 'Dealer Name:');  ?> <?php //echo $this->Form->input('new_dealer_name', array('type' => 'text', 'label' => false, 'class' => 'form-control'));  ?>
                                            <div class="separator"></div>
                                        </div>  
                                    </div>-->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>          
                                    </div>
                                </div>
                                <!-- // Non used Tab content END -->
                                <!-- Used Tab content -->
                                <div id="tab4-4" class="tab-pane" style="padding-left:10px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="strong text-primary " for="DataimportLabel">YEAR, Unit Value & Condition Clean Up:</label>  <div class="separator"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">

                                            <?php echo $this->Form->label('year', 'Year Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('year', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','selected' =>'Year','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <?php echo $this->Form->label('unit_value', 'Unit Value Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('unit_value', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'Price','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3">

                                            <?php echo $this->Form->label('condition', 'Condition Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('condition', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control','selected' =>'Condition','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="strong text-primary " for="DataimportLabel"> MOD/CAT/CLASS Clean Up:</label>

                                            <div class="separator"></div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php echo $this->Form->label('model', 'Model Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('model', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'Model','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3">

                                            <?php echo $this->Form->label('d_type', 'D_Type:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('d_type', array(
                                                'options' => $finaldtypes, 'empty' => FALSE, 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                        <div class="col-md-3">
                                            <?php echo $this->Form->label('make', 'Make Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('make', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'Make','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>   

                                    <!--                            Trade Clean-up-->
                                    <!--                            Trade Clean-up-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="strong text-primary " for="DataimportLabel">Trade YEAR, Trade Unit Value & Trade Condition Clean Up:</label>  <div class="separator"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">

                                            <?php echo $this->Form->label('trade_year', 'Trade Year Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('trade_year', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'TradeYear','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <?php echo $this->Form->label('trade_unit_value', 'Trade Unit Value Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('trade_unit_value', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'TradePrice','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3">

                                            <?php echo $this->Form->label('trade_condition', 'Trade Condition Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('trade_condition', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'TradeCondition','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="strong text-primary " for="DataimportLabel"> Trade MOD/CAT/CLASS Clean Up:</label>

                                            <div class="separator"></div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php echo $this->Form->label('trade_model', 'Trade Model Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('trade_model', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'TradeModel','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>
                                        <div class="col-md-3">

                                            <?php echo $this->Form->label('trade_d_type', 'Trade D_Type:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('trade_d_type', array(
                                                'options' => $finaldtypes, 'empty' => FALSE, 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                        <div class="col-md-3">
                                            <?php echo $this->Form->label('trade_make', 'Trade Make Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('trade_make', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'selected' =>'TradeMake','style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>
                                    <!-- end   Trade Clean-up-->
                                    <!--    end    Trade Clean-up-->
<div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>          
                                    </div>

                                </div>
                                <div id="tab6-6" class="tab-pane" style="padding-left:10px">
                                    <div class="row">
                                        <div class="col-md-3"><?php echo $this->Form->label('source', 'Sales Source Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('source', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>
                                    <div id="allsource" class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>          
                                    </div>
                                </div>
                                <div id="tab5-5" class="tab-pane" style="padding-left:10px">
                                    <div class="row">
                                        <div class="col-md-3"><?php echo $this->Form->label('contact_status_id', 'Contact Status Id Field:', array('class' => 'strong')); ?> 
                                            <?php
                                            echo $this->Form->input('contact_status_id', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>
                                    <div id="allconid" class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>          
                                    </div>
                                </div>
                                <div id="tab7-7" class="tab-pane" style="padding-left:10px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php
                                            echo $this->Form->label('sales_step', 'Sales Step Field:', array('class' => 'strong'));
                                            ?> 
                                            <?php
                                            echo $this->Form->input('sales_step', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>
                                    <div id="salesstep" class="row">

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>          
                                    </div>
                                </div>
                                <div id="tab8-8" class="tab-pane" style="padding-left:10px">
                                    <div class="row" style="padding-left: 20px;">
                                    <table class="table table-bordered table-hover table-striped" style="width: 96%;">
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
                                        </tbody>   
                                    </table>
                                    
                                    <div class="clearfix"></div>
                                        <!--  
                                            <br>--set the default value as "Previous CRM-Open"
                                            <br>
                                            --set "Sold/Rolled" for Sold leads   -->
                                    </div>
                                   
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
                                            <a class="btn btn-primary btnNext">Next</a>
                                            <div class="separator"></div>
                                        </div>          
                                    </div>
                                </div>
                                <div id="tab9-9" class="tab-pane" style="padding-left:10px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php
                                            echo $this->Form->label('lead_status', 'Lead Status Field:', array('class' => 'strong'));
                                            ?> 
                                            <?php
                                            echo $this->Form->input('lead_status', array(
                                                'options' => $finalfields, 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                            ?>

                                            <div class="separator"></div>
                                        </div>

                                    </div>
                                    <div id="leadstatus" class="row">

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a class="btn btn-primary btnPrevious">Previous</a>
                                            
<!--                                            <a class="btn btn-primary btnNext">Next</a>-->
                                            <div class="separator"></div>
                                        </div>          
                                    </div>
                                </div>
                                <!-- // Used Tab content END -->
                            </div>

                        </div>
                    </div>

                    <!--                                    End Tab-->

                    <div class="pull-right">
                        <button  id='submit_support' class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Submit</button>
                    </div>
                    <div class="clearfix"></div>

                    <?php echo $this->Form->end(); ?> 

                </div>
            </div>
            <br>
        </div>
        <!-- //Search result End-->
    </div>
</div>

<script type="text/javascript">
    $script.ready('bundle', function() {
        
        $('.btnNext').click(function(){
            $('.row-merge > .active').next('li').find('a').trigger('click');
        });
        
        $('.btnPrevious').click(function(){
            $('.row-merge > .active').prev('li').find('a').trigger('click');
        });
        
        $(".alert").delay(3000).fadeOut("slow");
        //$(".dealershipinfo").click(function(){
        $(document).on('change',"#DataimportSperson", function() {
            
            var dealer_id=$('#DataimportNewDealerId').val();
            //var dealer_id=$('#DataimportNewDealerId').attr('DealerId');
            var sperson=$(this).val();
            
            //alert(dealer_id);
             if(dealer_id==''){
             $("#DataimportSperson option[value='']").attr('selected', true);
             alert("Please Enter a Dealership ID.");
             return false;
        }
             
            if(sperson!=''){   
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "/Dataimport/get_sperson_info/"+sperson+"/"+dealer_id,
                    success: function(data){
                        //$("#tab3-4").append(data);
                        $("#sperson_notexistdata").css( "display", "none");
                        //  $("#sperson_notexist option[value='']").attr('selected', true);
                        $('#sperson_notexist').prop('checked', false); 
                        $("#allvalue").empty();
                        $("#allvalue").append(data);
                    }
                });
            }else{
                $("#allvalue").empty();
            }
        
            
        });
      
        //Sales Source
        //Sales Source
        //Sales Source
        $(document).on('change',"#DataimportSource", function() {
            
            //var sperson=$(this).attr('DealerId');
            var source=$(this).val();
            
            //            alert(sperson);
            //            return false;
            if(source!=''){   
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "/Dataimport/get_source/"+source,
                    success: function(data){
                        //$("#tab3-4").append(data);
                        $("#allsource").empty();
                        $("#allsource").append(data);
                    }
                });
            }else{
                $("#allsource").empty();
            }   
            
        });
      
        //Contact status_id
        $(document).on('change',"#DataimportContactStatusId", function() {
            
            //var sperson=$(this).attr('DealerId');
            var constatus_id=$(this).val();
                     
            if(constatus_id!=''){   
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "/Dataimport/get_constatusid/"+constatus_id,
                    success: function(data){
                        //$("#tab3-4").append(data);
                        $("#allconid").empty();
                        $("#allconid").append(data);
                    }
                });
            }else{
                $("#allconid").empty();
            }      
            
        });
        //Sales step
        $(document).on('change',"#DataimportSalesStep", function() {
            
            //var sperson=$(this).attr('DealerId');
            var salesstep=$(this).val();
                     
            if(salesstep!=''){   
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "/Dataimport/get_salesstep/"+salesstep,
                    success: function(data){
                        //$("#tab3-4").append(data);
                        $("#salesstep").empty();
                        $("#salesstep").append(data);
                    }
                });
            }else{
                $("#salesstep").empty();
            }     
            
        });
        //Lead status
        $(document).on('change',"#DataimportLeadStatus", function() {
            
            //var sperson=$(this).attr('DealerId');
            var leadstatus=$(this).val();
                     
            if(leadstatus!=''){   
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "/Dataimport/get_leadstatus/"+leadstatus,
                    success: function(data){
                        //$("#tab3-4").append(data);
                        $("#leadstatus").empty();
                        $("#leadstatus").append(data);
                    }
                });
            }else{
                $("#leadstatus").empty();
            }   
            
        });
        
        $("#sperson_notexist").click(function(){
            if($('#sperson_notexist').is(':checked')){
                $("#allvalue").empty();
                $("#sperson_notexistdata").css( "display", "block");
                $("#DataimportSperson option[value='']").attr('selected', true);
                 var dealer_id=$('#DataimportNewDealerId').val();
             if(dealer_id==''){
             $("#DataimportSperson option[value='']").attr('selected', true);
             alert("Please Enter a Dealership ID.");
             return false;
        }
             
            if(dealer_id!=''){   
                $.ajax({
                    type: "GET",
                    cache: false,
                    url: "/Dataimport/get_user_info/"+dealer_id,
                    success: function(data){
                        $("#allvalue").empty();
                        $("#sperson_notexistdata").empty();
                        $("#sperson_notexistdata").append(data);
                    }
                });
            }
            
            }else{
                $("#sperson_notexistdata").css( "display", "none");
            }
        });
    
  
        $("#fullname_notexist").click(function(){
            if($('#fullname_notexist').is(':checked')){
                //$("#allvalue").empty();
                $("#names_parts").css( "display", "block");
                $("#DataimportFullname option[value='']").attr('selected', true);
            }else{
                $("#names_parts").css( "display", "none");
            }
        });
  
        $(document).on('click',".source_notmatch", function() {
      
            var sourceid=$(this).attr('sourceid');
            //        alert(sourceid);
            //        return false;
        
            if($('#source_notmatch_'+sourceid).is(':checked')){
                //$("#allvalue").empty();
                $("#source_"+sourceid).css( "display", "block");
                $("#source_drop_"+sourceid).css( "display", "none");
                //$("#DataimportSperson option[value='']").attr('selected', true);
            }else{
                $("#source_"+sourceid).css( "display", "none");
                $("#source_drop_"+sourceid).css( "display", "block");
            }
        });
    
    
    });
</script>