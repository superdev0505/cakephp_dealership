</br>
<?php
$timezone = AuthComponent::user('zone');
//echo $timezone;
?>
<?php
$sperson = AuthComponent::user('username');
//echo $sperson;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeshort = date('mdY');
//echo $datetimeshort;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimeslash = date('m/d/Y');
//echo $datetimeslash;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimetext = date('Y-m-d H:i:s');
//echo $datetimetext;
?>
<?php
$date = new DateTime();
date_default_timezone_set($timezone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;
?>

<?php
$company = AuthComponent::user('dealer');
// echo $x;
$companyid = AuthComponent::user('dealer_id');
// echo $x;
?>
<!-- get salesperson (user ful name) -->
<?php
$x = AuthComponent::user('full_name');
// echo $x;
?>
<?php
$selected_lead_type = "";
if (isset($this->request->params['named']['selected_lead_type']) && $this->request->params['named']['selected_lead_type'] != '') {
    $selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>

<br />
<br />
<br />
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
    <!-- row -->
    <div class="row">
        <div class="col-md-8">
            <div class="wizard">
                <div class="widget widget-tabs widget-tabs-responsive">
                    <!-- Widget heading -->
                    <div class="widget-head">
                        <ul>
                            <li class="active" ><a href="#tab2-1" class="glyphicons road" data-toggle="tab"><i></i>Vehicle Info - OEM</a></li>
                        </ul>
                    </div>
                    <!-- // Widget heading END -->
                    <div class="widget-body"> 
                        <?php echo $this->Form->create('InventoryOem', array('type'=>'post','class' => 'form-inline apply-nolazy', 'role' => "form")); 
						if(isset($this->request->params['pass'][0])){
							echo $this->Form->input('id', array('value' => $this->request->params['pass'][0]));
						}
						?> 
                        <div class="tab-content">
                            <!-- Step 2 -->
                            <div id="tab2-1 active">
                                <div class="row">
                                    
									 <div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('unit_value', 'Value/Unit'); ?> <?php
                                        echo $this->Form->input('unit_value', array(
                                            'type' => 'text',
                                            'required' => 'required',
                                            'label' => false, 'div' => false,
                                            'class' => 'form-control'
                                        ));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
									
                                    <div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('stock_num', 'Stock#'); ?> <?php
                                        echo $this->Form->input('StockNum', array(
                                            'type' => 'text',
                                            'required' => 'required',
                                            'label' => false, 'div' => false,
                                            'class' => 'form-control'
                                        ));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('condition', 'Condition:'); ?>
                                        <?php
                                        echo $this->Form->input('Condition', array('type' => 'select', 'required' => 'required', 'options' => array(
                                                'New' => 'New',
                                                'Used' => 'Used',
                                                'Rental' => 'Rental',
                                                'Demo' => 'Demo'
                                            ), 'empty' => 'Select', 'label' => false, 'div' => false, 'selected' => $this->request->input['Contact']['condition'], 'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('year', 'Year:'); ?> <?php
                                        echo $this->Form->input('Year', array('type' => 'select', 'required' => 'required', 'options' => array('2014' => '2014',
                                                '2013' => '2013',
                                                '2012' => '2012',
                                                '2011' => '2011',
                                                '2010' => '2010',
                                                '2009' => '2009',
                                                '2008' => '2008',
                                                '2007' => '2007',
                                                '2006' => '2006',
                                                '2005' => '2005',
                                                '2004' => '2004',
                                                '2003' => '2003',
                                                '2002' => '2002',
                                                '2001' => '2001',
                                                '2000' => '2000',
                                            ), 'empty' => 'selected', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('make', 'Make:'); ?> <?php
                                        echo $this->Form->input('Make', array('type' => 'select', 'required' => 'required', 'options' => array(
                                                'American Ironhorse' => 'American Ironhorse',
                                                'Anderson MA' => 'Anderson MA',
                                                'Aprilia' => 'Aprilia',
                                                'Arctic Cat' => 'Arctic Cat',
                                                'Argo' => 'Argo',
                                                'ATK' => 'ATK',
                                                'ASPT' => 'ASPT',
                                                'Benelli' => 'Benelli',
                                                'Big Bear Choppers' => 'Big Bear Choppers',
                                                'Big Dog' => 'Big Dog',
                                                'Bimota' => 'Bimota',
                                                'BMW' => 'BMW',
                                                'Bombardier' => 'Bombardier',
                                                'Boss Hoss' => 'Boss Hoss',
                                                'Buell' => 'Buell',
                                                'Bultaco' => 'Bultaco',
                                                'Bush Hog' => 'Bush Hog',
                                                'Bushtec' => 'Bushtec',
                                                'Can-Am' => 'Can-Am',
                                                'Cannondale' => 'Cannondale',
                                                'Continental' => 'Continental',
                                                'Cobra' => 'Cobra',
                                                'Dinli' => 'Dinli',
                                                'Ducati' => 'Ducati',
                                                'Down to Ear' => 'Down to Ear',
                                                'E-TON' => 'E-TON',
                                                'Excelsior-Henderson' => 'Excelsior-Henderson',
                                                'Gas Gas' => 'Gas Gas',
                                                'Genuine Sccoter Co.' => 'Genuine Sccoter Co.',
                                                'Harley-Davidson' => 'Harley-Davidson',
                                                'Hannigan' => 'Hannigan',
                                                'Honda' => 'Honda',
                                                'Husaberg' => 'Husaberg',
                                                'Husqvarna' => 'Husqvarna',
                                                'Hyosung' => 'Hyosung',
                                                'Indian' => 'Indian',
                                                'John Deere' => 'John Deere',
                                                'Kasea' => 'Kasea',
                                                'Karavan' => 'Karavan',
                                                'Kawasaki' => 'Kawasaki',
                                                'KTM' => 'KTM',
                                                'Kubota' => 'Kubota',
                                                'KYMCO' => 'KYMCO',
                                                'LEM' => 'LEM',
                                                'Lehman Trikes' => 'Lehman Trikes',
                                                'Maico' => 'Maico',
                                                'Magic Tilt' => 'Magic Tilt',
                                                'Moto Guzzi' => 'Moto Guzzi',
                                                'Motor-Trike' => 'Motor-Trike',
                                                'Moto-Ski' => 'Moto-Ski',
                                                'Motovation' => 'Motovation',
                                                'MV Agusta' => 'MV Agusta',
                                                'Neosho' => 'Neosho',
                                                'Nuko' => 'Nuko',
                                                'Piaggio' => 'Piaggio',
                                                'Polaris' => 'Polaris',
                                                'Performance' => 'Perfromance',
                                                'Rupp' => 'Rupp',
                                                'Roadsmith' => 'Roadsmith',
                                                'Royal Enfield' => 'Royal Enfield',
                                                'Schwinn' => 'Schwinn',
                                                'SDG' => 'SDG',
                                                'Sea-Doo' => 'Sea-Doo',
                                                'Shuttle Craf' => 'Shutle Craf',
                                                'Shorelandr' => 'Shorelandr',
                                                'Ski-Doo' => 'Ski-Doo',
                                                'Snow Hawk' => 'Snow Hawk',
                                                'Suzuki' => 'Suzuki',
                                                'SYM' => 'SYM',
                                                'Swift' => 'Swift',
                                                'Squire' => 'Squire',
                                                'TM' => 'TM',
                                                'Thunder Mountain' => 'Thunder Mountain',
                                                'Tomberlin' => 'Tomberlin',
                                                'Triumph' => 'Triumph',
                                                'Qlink' => 'Qlink',
                                                'United Motors' => 'United Motors',
                                                'Ural' => 'Ural',
                                                'Vespa' => 'Vespa',
                                                'Victory' => 'Victory',
                                                'VOR' => 'VOR',
                                                'Yamaha' => 'Yamaha',
                                                'Wells fargo' => 'Wells Fargo',
                                                'Watsonian' => 'Watsonian',
                                                'Zero' => 'Zero',
                                            ), 'empty' => 'Select','label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3"> <font color="red">*</font> <?php echo $this->Form->label('model', 'Model:'); ?> <?php echo $this->Form->input('Model', array('type' => 'text', 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                    <div class="col-md-3"> <font color='red'>*</font> <?php echo $this->Form->label('type', 'Unit Type:'); ?> <?php
                                        echo $this->Form->input('Type', array('type' => 'select', 'required' => 'required', 'options' => array(
                                                'ATV' => 'ATV',
                                                'Boat' => 'Boat',
                                                'Car' => 'Car',
                                                'Cruiser/Vtwin' => 'Cruiser/Vtwin',
                                                'Dirt Bike' => 'Dirt Bike',
                                                'Go Kart' => 'Go Kart',
                                                'PWC' => 'PWC',
                                                'RV' => 'RV',
                                                'Scooter' => 'Scooter',
                                                'Side x Side' => 'Side x Side',
                                                'Side Car' => 'Side Car',
                                                'Trailer' => 'Trailer',
                                                'Trike' => 'Trike',
                                                'Snowmobile' => 'Snowmobile',
                                                'Street Bikes' => 'Street Bikes',
                                                'Utility Vehicle' => 'Utility Vehicle',
                                                'UTV' => 'UTV',
                                            ), 'empty' => 'Select', 'label' => false, 'div' => false, 'class' => 'form-control', 'style' => 'width: 100%'));
                                        ?>
                                        <div class="separator"></div>
                                    </div>
									<div class="col-md-3"> <font color="red">*</font> 
										<?php echo $this->Form->label('engine', 'Engine:'); ?>
										<?php echo $this->Form->input('engine', array('type' => 'text', 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                   
                                </div>
                                <div class="row">
									
									 <div class="col-md-3">
										<?php echo $this->Form->label('vin', 'Vin Number #:'); ?>
										<?php echo $this->Form->input('vin', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
									
									<div class="col-md-3">
										<?php echo $this->Form->label('odometer', 'Miles:'); ?>
										<?php echo $this->Form->input('odometer', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
									
                                    <div class="col-md-3"> <?php echo $this->Form->label('unit_color', 'Color:'); ?> <?php echo $this->Form->input('Color', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'form-control')); ?>
                                        <div class="separator"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?php echo $this->Html->url(array('action' => 'oem_vehicle_input')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save vehical</button>
                            </div>
                            
                        </div>
                        <?php echo $this->Form->end(); ?> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Widget -->
            <div class="widget widget-heading-simple widget-body-white widget-employees">
                <div class="widget-body">
				
					<div class="clearfix">
						<?php echo $this->Form->create('InventoryOem2', array('url'=>array('controller'=>'contacts','action'=>'used_vehicle_input'),'class' => 'form-inline apply-nolazy', 'role' => "form")); ?> 
						<?php echo $this->Form->input('Year', array('type' => 'select', 'required' => 'required', 'options' => array(
								'2014' => '2014',
								'2013' => '2013',
								'2012' => '2012',
								'2011' => '2011',
								'2010' => '2010',
								'2009' => '2009',
								'2008' => '2008',
								'2007' => '2007',
								'2006' => '2006',
								'2005' => '2005',
								'2004' => '2004',
								'2003' => '2003',
								'2002' => '2002',
								'2001' => '2001',
								'2000' => '2000',
							), 'empty' => 'Year', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 75px;  float: left;'));	 ?>
						<?php echo $this->Form->input('Make', array('type' => 'select', 'required' => 'required', 'options' => array(
										'American Ironhorse' => 'American Ironhorse',
										'Anderson MA' => 'Anderson MA',
										'Aprilia' => 'Aprilia',
										'Arctic Cat' => 'Arctic Cat',
										'Argo' => 'Argo',
										'ATK' => 'ATK',
										'ASPT' => 'ASPT',
										'Benelli' => 'Benelli',
										'Big Bear Choppers' => 'Big Bear Choppers',
										'Big Dog' => 'Big Dog',
										'Bimota' => 'Bimota',
										'BMW' => 'BMW',
										'Bombardier' => 'Bombardier',
										'Boss Hoss' => 'Boss Hoss',
										'Buell' => 'Buell',
										'Bultaco' => 'Bultaco',
										'Bush Hog' => 'Bush Hog',
										'Bushtec' => 'Bushtec',
										'Can-Am' => 'Can-Am',
										'Cannondale' => 'Cannondale',
										'Continental' => 'Continental',
										'Cobra' => 'Cobra',
										'Dinli' => 'Dinli',
										'Ducati' => 'Ducati',
										'Down to Ear' => 'Down to Ear',
										'E-TON' => 'E-TON',
										'Excelsior-Henderson' => 'Excelsior-Henderson',
										'Gas Gas' => 'Gas Gas',
										'Genuine Sccoter Co.' => 'Genuine Sccoter Co.',
										'Harley-Davidson' => 'Harley-Davidson',
										'Hannigan' => 'Hannigan',
										'Honda' => 'Honda',
										'Husaberg' => 'Husaberg',
										'Husqvarna' => 'Husqvarna',
										'Hyosung' => 'Hyosung',
										'Indian' => 'Indian',
										'John Deere' => 'John Deere',
										'Kasea' => 'Kasea',
										'Karavan' => 'Karavan',
										'Kawasaki' => 'Kawasaki',
										'KTM' => 'KTM',
										'Kubota' => 'Kubota',
										'KYMCO' => 'KYMCO',
										'LEM' => 'LEM',
										'Lehman Trikes' => 'Lehman Trikes',
										'Maico' => 'Maico',
										'Magic Tilt' => 'Magic Tilt',
										'Moto Guzzi' => 'Moto Guzzi',
										'Motor-Trike' => 'Motor-Trike',
										'Moto-Ski' => 'Moto-Ski',
										'Motovation' => 'Motovation',
										'MV Agusta' => 'MV Agusta',
										'Neosho' => 'Neosho',
										'Nuko' => 'Nuko',
										'Piaggio' => 'Piaggio',
										'Polaris' => 'Polaris',
										'Performance' => 'Perfromance',
										'Rupp' => 'Rupp',
										'Roadsmith' => 'Roadsmith',
										'Royal Enfield' => 'Royal Enfield',
										'Schwinn' => 'Schwinn',
										'SDG' => 'SDG',
										'Sea-Doo' => 'Sea-Doo',
										'Shuttle Craf' => 'Shutle Craf',
										'Shorelandr' => 'Shorelandr',
										'Ski-Doo' => 'Ski-Doo',
										'Snow Hawk' => 'Snow Hawk',
										'Suzuki' => 'Suzuki',
										'SYM' => 'SYM',
										'Swift' => 'Swift',
										'Squire' => 'Squire',
										'TM' => 'TM',
										'Thunder Mountain' => 'Thunder Mountain',
										'Tomberlin' => 'Tomberlin',
										'Triumph' => 'Triumph',
										'Qlink' => 'Qlink',
										'United Motors' => 'United Motors',
										'Ural' => 'Ural',
										'Vespa' => 'Vespa',
										'Victory' => 'Victory',
										'VOR' => 'VOR',
										'Yamaha' => 'Yamaha',
										'Wells fargo' => 'Wells Fargo',
										'Watsonian' => 'Watsonian',
										'Zero' => 'Zero',
									), 'empty' => 'Make', 'label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;  float: left;')); ?>
						<div style="width: 147px; float: left">
							<?php echo $this->Form->input('Type', array('type' => 'select', 'required' => 'required', 'options' => array(
										'ATV' => 'ATV',
										'Boat' => 'Boat',
										'Car' => 'Car',
										'Cruiser/Vtwin' => 'Cruiser/Vtwin',
										'Dirt Bike' => 'Dirt Bike',
										'Go Kart' => 'Go Kart',
										'PWC' => 'PWC',
										'RV' => 'RV',
										'Scooter' => 'Scooter',
										'Side x Side' => 'Side x Side',
										'Side Car' => 'Side Car',
										'Trailer' => 'Trailer',
										'Trike' => 'Trike',
										'Snowmobile' => 'Snowmobile',
										'Street Bikes' => 'Street Bikes',
										'Utility Vehicle' => 'Utility Vehicle',
										'UTV' => 'UTV',
									), 'empty' => 'Type','label' => false, 'div' => false, 'class' => 'form-control input-sm', 'style'=>'width: 100px;')); ?>
							&nbsp; <button id="btn_search_used_vehicle" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
						</div>
						<?php echo $this->Form->end(); ?>
					</div>
					
					<div class="separator"></div>
					<ul class="list-unstyled">
					<?php foreach($oem_vehicles as $oem_vehicle){ ?>
						<li class="border-bottom">
							<a href="/contacts/oem_vehicle_input/<?php echo $oem_vehicle['InventoryOem']['id']; ?>/">
							<?php echo $oem_vehicle['InventoryOem']['Condition'];  ?> 
							<?php echo $oem_vehicle['InventoryOem']['Year'];  ?> 
							<?php echo $oem_vehicle['InventoryOem']['Make'];  ?> 
							<?php echo $oem_vehicle['InventoryOem']['Model'];  ?> 
							<?php echo $oem_vehicle['InventoryOem']['Type'];  ?>
							<?php echo $oem_vehicle['InventoryOem']['Color'];  ?>&nbsp;
									#<?php echo $oem_vehicle['InventoryOem']['StockNum'];  ?>
							  &nbsp;$<?php echo $oem_vehicle['InventoryOem']['unit_value'];  ?>
					
							</a>
						</li>
					<?php } ?>
					</ul>
					<br />
					<div class="">
						<ul class="pagination margin-none">
							<?php echo $this->Paginator->prev('<<'); ?>
							<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
							<?php echo $this->Paginator->next('>>'); ?>
						</ul>
					</div>
				
				</div>
            </div>
            <!-- // Widget END -->
			
			
			
        </div>
    </div>
    <!-- // row END -->
	<?php //echo $this->element('sql_dump'); ?>
</div>


<script>

    $script.ready('bundle', function() {

<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
            $(window).load(function() {
<?php } ?>


	$(".alert").delay(3000).fadeOut("slow");
	
	//Search used Vehicle
	$("#btn_search_used_vehicle").click(function(event){
		location.href = "/contacts/oem_vehicle_input/Year:"+$("#InventoryOem2Year").val()+"/Make:"+$("#InventoryOem2Make").val()+"/Type:"+$("#InventoryOem2Type").val()+"/";
		return false;
	});	



<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { ?>
            });
<?php } ?>

    });

</script>
