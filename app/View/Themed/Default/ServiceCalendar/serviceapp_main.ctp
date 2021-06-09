<br />
<br /><br /><br />
<?php
function format_phone($phone){
    $phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
    return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
}
?>
<style>
.heading5{
	font-size:7pt !important;
	}
</style>
<?php echo $this->Session->flash(); ?>
<div class="innerLR">
              <div class="row">
                    <!-- Column -->
                    <div class="col-md-2">
                        <!-- Widget -->
                        <div class="widget widget-3">
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading heading5">
                                    <span class="glyphicons coins"><i></i>
                                    </span>New Service</h4>
                            </div>
                            <!-- // Widget heading END -->
                            <div class="widget-body large">
                                <?php echo count($new_service); ?>
                            </div>
                            <!-- Widget footer -->
                            <div class="widget-footer align-center">
                              
                                <a href="#" class="glyphicons list stat_view" data-id="<?php echo implode(',',$new_service); ?>"><i></i> View</a>
                            </div>
                            <!-- // Widget footer END -->
                        </div>
                        <!-- // Widget END -->
                    </div>
                    <!-- // Column END -->
                    <!-- Column -->
                    <div class="col-md-2">
                        <!-- Widget -->
                        <div class="widget widget-3">
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading heading5">
                                    <span class="glyphicons user_add"><i></i>
                                    </span>Existing Service</h4>
                            </div>
                            <!-- // Widget heading END -->
                            <div class="widget-body large">
                                <?php echo count($existing_service); ?>
                            </div>
                            <!-- Widget footer -->
                            <div class="widget-footer align-center">
                               
                                <a href="#" class="glyphicons list stat_view" data-id="<?php echo implode(',',$existing_service); ?>"><i></i> View</a>
                            </div>
                            <!-- // Widget footer END -->
                        </div>
                        <!-- // Widget END -->
                    </div>
                    <!-- // Column -->
                    <!-- Column -->
                    <div class="col-md-2">
                        <!-- Widget -->
                        <div class="widget widget-3">
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading heading5">
                                    <span class="glyphicons user_remove"><i></i>
                                    </span>Cancellations</h4>
                            </div>
                            <!-- // Widget heading END -->
                            <div class="widget-body large cancellations">
                               
                                0
                            </div>
                            <!-- Widget footer -->
                            <div class="widget-footer align-center">
                             
                                <a href="#" class="glyphicons list stat_view" data-id=""><i></i> View</a>
                            </div>
                            <!-- // Widget footer END -->
                        </div>
                        <!-- // Widget END -->
                    </div>
                    <!-- // Column -->
                    
             
                    <!-- Column -->
                    <div class="col-md-2">
                        <!-- Widget -->
                        <div class="widget widget-3">
                            <!-- Widget heading -->

                            <div class="widget-head">
                                <h4 class="heading heading5">
                                    <span class="glyphicons coins"><i></i>
                                    </span>Today's Service</h4>
                            </div>
                            <!-- // Widget heading END -->
                            <div class="widget-body large">
                               <?php echo count($today_service); ?>
                            </div>
                            <!-- Widget footer -->
                            <div class="widget-footer align-center">
                               
                                <a href="#" class="glyphicons list stat_view" data-id="<?php echo implode(',',$today_service); ?>"><i></i> View</a>
                            </div>
                            <!-- // Widget footer END -->
                        </div>
                        <!-- // Widget END -->
                    </div>
                    <!-- // Column END -->
                    <!-- Column -->
                    <div class="col-md-2">
                        <!-- Widget -->
                        <div class="widget widget-3">
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading heading5">
                                    <span class="glyphicons user_add"><i></i>
                                    </span>Month's Service</h4>
                            </div>
                            <!-- // Widget heading END -->
                            <div class="widget-body large">
                                <?php echo count($month_service); ?>
                            </div>
                            <!-- Widget footer -->
                            <div class="widget-footer align-center">
                              
                                <a href="#" class="glyphicons list stat_view" data-id="<?php echo implode(',',$month_service); ?>"><i></i> View</a>
                            </div>
                            <!-- // Widget footer END -->
                        </div>
                        <!-- // Widget END -->
                    </div>
                    <!-- // Column -->
                    <!-- Column -->
                    <div class="col-md-2">
                        <!-- Widget -->
                        <div class="widget widget-3">
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading heading5">
                                    <span class="glyphicons user_remove"><i></i>
                                    </span>Warranty's Service</h4>
                            </div>
                            <!-- // Widget heading END -->
                            <div class="widget-body large cancellations">
                               
                               <?php echo count($warranty_service); ?>
                            </div>
                            <!-- Widget footer -->
                            <div class="widget-footer align-center">
                                
                                <a href="#" class="glyphicons list stat_view" data-id="<?php echo implode(',',$warranty_service); ?>" ><i></i> View</a>
                            </div>
                            <!-- // Widget footer END -->
                        </div>
                        <!-- // Widget END -->
                    </div>
                    <!-- // Column -->
                    
                </div> 
                
                <div class="clearfix"></div>
                 <form class="margin-none form-inline" id="LeadSearchForm">
                <div class="filter-bar">
                    
                        <!-- From -->
                        <div class="form-group col-md-3 padding-none">
                            <label>First Name:</label>
                            <div class="col-md-7 padding-none">
                                <?php echo $this->Form->input('first_name',array('div'=>false,'label'=>false,'class'=>'form-control')); 
								echo $this->Form->hidden('service_lead_id');
								?>
                                
                            </div>
                        </div>
                        <!-- // From END -->
                        <!-- To -->
                        <div class="form-group col-md-2 padding-none" style="width:19.31%!important">
                            <label>Last Name:</label>
                            <div class="col-md-7 padding-none">
                              <?php echo $this->Form->input('last_name',array('div'=>false,'label'=>false,'class'=>'form-control')); ?>  
                            </div>
                        </div>
                        <!-- // To END -->
                        <!-- Min -->
                        <div class="form-group col-md-2 padding-none" style="width:18%!important">
                            <label>Phone(All):</label>
                            <div class="col-md-6 padding-none">
                                <?php echo $this->Form->input('phone',array('div'=>false,'label'=>false,'class'=>'form-control')); ?>
                            </div>
                        </div>
                        <!-- // Min END -->
                        <!-- Max -->
                        <div class="form-group col-md-3 padding-none">
                            <label>Email:</label>
                            <div class="col-md-8 padding-none">
                                <?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'class'=>'form-control')); ?>
                            </div>
                        </div>
                        <a class="btn btn-inverse pull-right" id="AdvanceSearch">Advanced Search</a>
                       
                        <!-- // Max END -->
                        <!-- Select -->
                        
                        <!-- // Select END -->
                        <div class="clearfix"></div>
                    
                </div>
                <div class="filter-bar advance_option"  style="display:none;">
                  
                        <!-- From -->
                        <div class="form-group col-md-2 padding-none">
                            <?php echo $this->Form->input('category', array( 'label'=>'Type:', 'class' => 'form-control', 'required' => 'required'/*,'readonly' => 'readonly'*/,'options'=>$d_type_options,'div'=>false ,'type' => 'select','multiple' => false, 'empty' => 'Please Select',)); ?>
                        </div>
                        <!-- // From END -->
                        <!-- To -->
                        <div class="form-group col-md-2 padding-none">
                            <?php echo $this->Form->input('type', array( 'label'=>'Category:', 'class' => 'form-control', 'required' => 'required'/*,'readonly' => 'readonly'*/,'div'=>false ,'type' => 'select', 'multiple' => false, 'empty' => 'Please Select','options'=>$body_type,'style'=>'width: 62%')); ?>
                        </div>
                        <!-- // To END -->
                        <!-- Min -->
                        <div class="form-group col-md-2 padding-none">
                            <?php echo $this->Form->input('make', array('type' => 'text', 'label'=>'Make:', 'class' => 'form-control', 'required' => 'required','div'=>false ,'type' => 'select', 'multiple' => false, 'empty' => 'Please Select','options'=>array(),'style'=>'width: 68%','value'=>'')); ?>
                        </div>
                        <!-- // Min END -->
                        <!-- Max -->
                        <div class="form-group col-md-1 padding-none" style="width:11.6%!important">
                            <?php echo $this->Form->input('syear', array('label'=>'Year:', 'class' => 'form-control', 'required' => 'required','div'=>false ,'type' => 'select', 'multiple' => false, 'empty' => 'Please Select','options'=>array(),'id'=>'syear','year'=>false,'style'=>'width: 60%')); ?>
                        </div>
                        <!-- // Max END -->
                        <!-- Select -->
                        <div class="form-group col-md-3 padding-none">
                            <?php echo $this->Form->input('model_id', array('type' => 'text', 'label'=>'Model:', 'class' => 'form-control', 'required' => 'required','div'=>false ,'type' => 'select', 'multiple' => false, 'empty' => 'Please Select','options'=>array(),'style'=>'width: 80%')); ?>
                        </div>
                       <div class="form-group col-md-2 padding-none" style="width:13%!important">
                           <?php echo $this->Form->input('class', array('type' => 'text', 'label'=>'Class:', 'class' => 'form-control', 'required' => 'required','div'=>false ,'type' => 'select', 'multiple' => false, 'empty' => 'Please Select','options'=>array(),'style'=>'width:67%;')); ?>
                        </div>
                        <!-- // Select END -->
                      <br /> <br />
                  
                        <!-- From -->
                        
                        <!-- // From END -->
                        <!-- To -->
                        <div class="form-group col-md-2 padding-none">
                            <?php echo $this->Form->input('unit_value', array('type' => 'text', 'label'=>'Unit/Value:', 'class' => 'form-control','div'=>false,'style'=>'width:57%;')); ?>
                        </div>
                        <!-- // To END -->
                        <!-- Min -->
                        <div class="form-group col-md-2 padding-none" style="width:11.11%!important">
                            <?php echo $this->Form->input('stock_num', array('type' => 'text', 'label'=>'Stock #:', 'class' => 'form-control','div'=>false,'style'=>'width:50%;')); ?>
                        </div>
                        <!-- // Min END -->
                        <!-- Max -->
                        <div class="form-group col-md-2 padding-none" style="width:14.11%!important">
                            <?php
echo $this->Form->input('condition', array('type' => 'select', 'required' => 'required', 'options' => array(
'Any' => 'Any',
'New' => 'New',
'Used' => 'Used',
'Rental' => 'Rental',
'Demo' => 'Demo'
), 'empty' => 'Select', 'selected' => '','label'=>'Condition','div'=>false, 'class' => 'form-control','style'=>'width: 59%'));?>
                        </div>
                        <!-- // Max END -->
                        <!-- Select -->
                        <div class="form-group col-md-2 padding-none">
                            <?php echo $this->Form->input('engine', array('type' => 'text', 'label'=>'Engine:', 'class' => 'form-control','style'=>'width:67%;','div'=>false)); ?>
                        </div>
                         <div class="form-group col-md-1 padding-none" style="width:15.91%!important">
                            <?php echo $this->Form->input('vin', array('type' => 'text', 'label'=>'Vin #:', 'class' => 'form-control','style'=>'width:77%;','div'=>false)); ?>
                        </div>
                         <div class="form-group col-md-2 padding-none" style="width:11.11%!important">
                            <?php echo $this->Form->input('odometer', array('type' => 'text', 'label'=>'Miles:', 'class' => 'form-control','style'=>'width:65%;','div'=>false)); ?>
                        </div>
                        <div class="form-group col-md-1 padding-none" style="width:13.31%!important">
                            <?php echo $this->Form->input('unit_color', array('type' => 'text', 'label'=>'Color:', 'class' => 'form-control','style'=>'width:70%;','div'=>false)); ?>
                        </div>
                        
                        <!-- // Select END -->
                        <div class="clearfix"></div>
                  
                </div>
                
                <div class="clearfix"></div>
                    <div class="clearfix"></div>
                <!-- Filters -->
                <div class="filter-bar advance_option" style="display:none;">
                   
                        <!-- From -->
                        <div class="form-group col-md-4 padding-none">
                           <?php  echo $this->Form->input('event_type_id', array('label'=>'Service Visit Type:','div'=>false ,'type' => 'select','style'=>'width: 50%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => 'required', 'options' => $eventTypes));   ?>
                        </div>
                        <!-- // From END -->
                        <!-- To -->
                        <div class="form-group col-md-4 padding-none">
                           <?php echo $this->Form->input('status', array('label'=>'Service  Appointment :','div'=>false ,'type' => 'select', 'multiple' => false, 'style'=>'width: 55%','empty' => 'Please Select', 'class' => 'form-control', 'required' => 'required', 'options' => $event_statuses));	?>
                        </div>
                        <!-- // To END -->
                        <!-- Min -->
                        <div class="form-group col-md-4 padding-none">
                           <?php  echo $this->Form->input('warrant_id', array('label'=>'Warranty:&nbsp;','div'=>false ,'type' => 'select','style'=>'width: 60%','class' => 'form-control',  'multiple' => false, 'empty' => 'Please Select', 'required' => 'required', 'options' => $service_warrant_types));   ?>
                        </div>
                        <br />
                        <br />
                        <!-- // Min END -->
                        <!-- Max -->
                        <div class="form-group col-md-3 padding-none">
                           <?php echo $this->Form->input('service_status_id', array('type' => 'select', 'label'=>'Service Status:', 'class' => 'form-control','empty'=>'Select Status','options'=>$service_statuses,'style'=>'width: 67%')); ?>
                        </div>
                        <!-- // Max END -->
                        <!-- Select -->
                        <div class="form-group col-md-3 padding-none">
                            <?php echo $this->Form->input('bay_id', array('type' => 'select', 'label'=>'Service Bays:', 'class' => 'form-control','empty'=>'Select Status','options'=>$service_bays,'style'=>'width: 67%')); ?>
                        </div>
                        <div class="form-group col-md-3 padding-none">
                            <?php echo $this->Form->input('user_id', array('type' => 'select', 'label'=>'Tech:', 'class' => 'form-control','empty'=>'Select Tech','options'=>array(),'style'=>'width: 70%'/*,'readonly' => 'readonly'*/)); ?>
                        </div>
                         <div class="form-group col-md-3 padding-none">
                            <?php echo $this->Form->input('tech2_id', array('type' => 'select', 'label'=>'Tech 2:', 'class' => 'form-control','empty'=>'Select Tech','options'=>array(),'style'=>'width: 70%')); ?>
                        </div>
                        <!-- // Select END -->
                         
                        <div class="clearfix"></div>
                   
                 
                   
              
                </div>
                 </form>
                
                <div class="filter-bar">
                    <div class="row">
                    <a href="" class="btn btn-danger pull-left" id="reset_form" >Reset</a>
                    <a href="" class="btn btn-info pull-right" id="search_form" >Search</a>
                    </div>                
              
                </div>
                <!-- // Filters END -->
                <!-- Widget -->
                <div class="widget widget-body-white" >
                    <!-- Widget heading -->
                    <div class="widget-head">
                        <h4 class="heading glyphicons calendar"><i></i> Monday, 10 June 2013</h4>
                    </div>
                    <!-- // Widget heading END -->
                    <div class="widget-body" id="LoadSearchResult">
                        <!-- Total bookings & sort by options -->
                     
                        <!-- // Total bookings & sort by options END -->
                        <!-- Table -->
                        
                        <!-- // Table END -->
                        <!-- With selected actions -->
                        
                        <!-- // With selected actions END -->
                        <!-- Pagination -->
                    
                        <div class="clearfix"></div>
                        <!-- // Pagination END -->
                    </div>
                </div>
                <!-- // Widget -->
                <!-- Row -->
                
                <!-- // Row END -->
            </div>


<script>
function get_leads()
{
		form_data=$("#LeadSearchForm").serialize();
		url='<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'search')); ?>';
		$.ajax({
				type: "POST",
				
				url:  url,
				data:form_data,
				success: function(data){
					$("#LoadSearchResult").html(data);
				}
			});
}
$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
		$(".alert").delay(3000).fadeOut("slow");
		get_leads();
		$("#addBooking").on('click',function(e){
			e.preventDefault();
			add_page = "<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'add')); ?>";
			//location.href = edit_page;
			
			$.ajax({
				type: "GET",
				cache: false,
				url:  add_page,
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Add Event",
					});
				}
			});
		});
		
		$("#AdvanceSearch").on('click',function(e){
			e.preventDefault();
			$(".advance_option").slideToggle();
			
			});
		
		$(".editEvent").on('click',function(e){
			e.preventDefault();
			data_id=$(this).attr('data-id');
			edit_page = "<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'edit')); ?>/"+data_id;
			//location.href = edit_page;
			
			$.ajax({
				type: "GET",
				cache: false,
				url:  edit_page,
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Edit Event",
					});
				}
			});
			
			});
			
			
			$.inventory({
		no_sold: "yes",
		edit_mode: "yes",
		input_type: "#category", 
		input_category:"#type",
		input_make:"#make", 
		
		input_year:"#syear",
		//input_yearedit:"#btn_year_edit",
		
	 	input_model_id:"#model_id", 
		//input_model:"#ServiceLeadModel", 
		input_class:"#class",
		//btn_edit_model:"#btn_models_edit",
		
		/*input_unitColor_id:"#ContactUnitColor",
		input_unitColor_fieldname:"data[Contact][unit_color]",*/
		
		//input_condition:"#ServiceLeadCondition",
		input_stock:"#stock_num",
		input_miles:"#odometer",
		input_vin:"#vin",
		//input_color:"#ServiceLeadColor",
		
		input_UnitValue:"#unit_value",
		input_Engine:"#engine",
		
		//input_contactId:"#ContactId",
		//spec_container:"#spec_container",
		
	});
	
	$("#search_form").on('click',function(e){
		e.preventDefault();
		$("#service_lead_id").val('');
		get_leads();
		
		});
	$("#reset_form").on('click',function(e){
		e.preventDefault();
		$("#LeadSearchForm")[0].reset();
		});
	$(".stat_view").on('click',function(e){
		e.preventDefault();
		$leads=$(this).attr('data-id');
		if($leads=='')
		{
			alert('No Service Lead for this Stat');
			return false;
		}else{
			$("#service_lead_id").val($leads);
			get_leads();
		}
		
		});		
	
			
<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
});
</script>            