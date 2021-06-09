<?php
$dealer = AuthComponent::user('dealer');
// echo $dealer;
$cid = AuthComponent::user('dealer_id');
// echo $cid;
$sperson = AuthComponent::user('full_name');
// echo $cid;
$zone = AuthComponent::user('zone');
//echo $zone;
//$id = $_GET['id'];
//$cid = $_GET['cid'];
//$dealer = $_GET['dealer'];
$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('Y-m-d H:i:s');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('D - M d, Y g:i A');
//echo $datetimefullview;

?>

<div class="control-group head-group" >
<?php echo $this->Form->create('Deal', array('action' => 'add', 'class' => 'form-inline')); ?>
<fieldset>


<hr style="height:3px; border:none; color:#000; background-color:#000; text-align:left; margin: 0 0 0 auto;">
<div class="control-group" >
<div class="controls">
</div> 
</div>
<tr>
<div align ="center">
<p><strong>CURRENT  FIXED FEE / PAYMENT IN USE -  Select Fee to view in edit (below)</strong> </p>
&nbsp; &nbsp; &nbsp; <font color='red'>*</font>&nbsp;<strong>Edit Fee(s):</strong>&nbsp; <?php
echo $this->Form->input('condition', array(
    'type' => 'select',
    'required' => 'required',
    'options' => array(
        'New Boat' => 'New Boat',
        'Used Boat' => 'Used Boat',
        'New Motrcycle' => 'New Motrcycle',
        'Used Motrcycle' => 'Used Motrcycle'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>

&nbsp; &nbsp; &nbsp;<?php echo $this->Form->submit('<i class="icon-edit"></i> Edit', array('div' => false, 'class' => 'btn btn-success')); ?>
</br></br>
<hr style="height:3px; border:none; color:#000; background-color:#000; text-align:left; margin: 0 0 0 auto;"></br>
<div align ="center">
<p><strong>EDIT FIXED FEE / PAYMENT</strong> </p>
&nbsp; &nbsp; &nbsp; <font color='red'>*</font>&nbsp;Fee(s) Condition:&nbsp; <?php
echo $this->Form->input('condition', array(
    'type' => 'select',
    'required' => 'required',
    'options' => array(
        'New' => 'New',
        'Used' => 'Used',
        'Rental' => 'Rental',
        'Demo' => 'Demo'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp; <font color='red'>*</font>&nbsp;Fee(s) Unit Type:&nbsp; <?php
echo $this->Form->input('type', array(
    'type' => 'select',
    'required' => 'required',
    'options' => array(
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
        'UTV' => 'UTV'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>

</br></br>
<p>(1) Edit or change fee(s) for this set of entrys. (below).</p>

&nbsp; <font color="red">*</font>&nbsp;Tags: $&nbsp;  <?php echo $this->Form->input('tag_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; <font color="red">*</font>&nbsp;Title: $&nbsp;  <?php echo $this->Form->input('title_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;<font color="red">*</font>&nbsp;Doc:$&nbsp;  <?php echo $this->Form->input('doc_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; <font color="red">*</font>&nbsp;Freight: $&nbsp;<?php echo $this->Form->input('freight_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;<font color="red">*</font>&nbsp;Prep: $&nbsp; <?php echo $this->Form->input('prep_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
</br>
</br>
&nbsp;<font color="red">*</font>&nbsp;PPM: $&nbsp; <?php echo $this->Form->input('ppm_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;<font color="red">*</font>&nbsp;Hazard: $&nbsp; <?php echo $this->Form->input('roadhazard_fee', array('type' => 'text', 'class' => 'input-mini')); ?>

&nbsp; <font color="red">*</font>&nbsp;ESP: $&nbsp; <?php echo $this->Form->input('esp_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;<font color="red">*</font>&nbsp;GAP: $&nbsp; <?php echo $this->Form->input('gap_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; <font color="red">*</font>&nbsp;Tire/W:  $&nbsp; <?php echo $this->Form->input('tire_wheel_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
</br>
</br>
&nbsp; <font color="red">*</font>&nbsp;Lic/R: $&nbsp; <?php echo $this->Form->input('licreg_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; <font color="red">*</font>&nbsp;VSC:$&nbsp; <?php echo $this->Form->input('vsc_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; <font color="red">*</font>&nbsp;Roadside:$&nbsp; <?php echo $this->Form->input('roadside_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp; <font color="red">*</font>&nbsp;Theft:$&nbsp; <?php echo $this->Form->input('theft_fee', array('type' => 'text', 'class' => 'input-mini')); ?>

&nbsp; <font color="red">*</font>&nbsp;Parts: $&nbsp; <?php echo $this->Form->input('parts_fee', array('type' => 'text', 'class' => 'input-mini')); ?>
&nbsp;<font color="red">*</font>&nbsp;Service:$&nbsp; <?php echo $this->Form->input('service_fee', array('type' => 'text', 'class' => 'input-mini')); ?></br>
</br>
&nbsp; <font color="red">*</font>&nbsp;Tax:&nbsp; <?php
echo $this->Form->input('tax_fee', array('type' => 'select', 'options' => array(
'1' => '1%',
'2' => '2%',
'3' => '3%',
'4' => '4%'
, '5' => '5%',
'6' => '6%',
'7' => '7%',
'8' => '8%',
'9' => '9%',
'10' => '10%',
'11' => '11%',
'12' => '12%',
'13' => '13%',
'14' => '14%',
'15' => '15%',
'16' => '16%',
), 'empty' => 'Select', 'selected' => '', 'id' => 'ContactTaxFee', 'selected' => $this->request->input['Contact']['tax_fee'], 'class' => 'input-small'));
?> %

&nbsp;&nbsp;<font color="red">*</font>&nbsp;Deal Notes:&nbsp;<?php echo $this->Form->input('notes', array('type' => 'text', 'class' => 'span4','value'=>'')); ?>
</br></br>
&nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'index')); ?>" class="btn btn-danger"><i class="icon-reply"></i>&nbsp;Back to Deals</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<?php echo $this->Form->submit('<i class="icon-save"></i> Update Fixed Fee(s)', array('div' => false, 'class' => 'btn btn-success')); ?>
</fieldset>
<div class="form-actions" align="left">
<?php echo $this->Form->end(); ?>
</div>
</form>
</table>
</div> 