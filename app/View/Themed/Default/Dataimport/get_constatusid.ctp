<?php
  $objTmp=SessionHelper::read('objTmp');
if(!empty($constatusidinfo)){
foreach ($constatusidinfo as $value) {
    ?>
<div class="row">
    <div class="col-md-3"  style="width:auto; margin-left:10px;">   
        <label class="strong" >Legacy Contact_status_id : </label> 
             <input type="text" readonly name="oldcontactstsid[]"  value="<?php echo $value[$objTmp][$constatusid]; ?>" class="form-control">
           
        <div class="separator"></div>
    </div>
    <div class="col-md-3"><label  class="strong">New Contact_status_id:</label> 
<!--        <input type="text" name="newcontactstsid[]" class="form-control">-->
        <select style="width: 100%" class="form-control" name="newcontactstsid[]">
<?php
foreach ($allconids as $vid) {
    ?>
            <option value="<?php echo $vid['ContactStatus']['id']; ?>"><?php echo $vid['ContactStatus']['name']; ?></option>
<?php
}
?>
</select>
        <div class="separator">
        </div>
    </div>
    
</div>
    <?php
    }
}else{
?>

<div class="row">
    <div class="col-md-3">   
        
        No Data Found..
</div>
</div>

<?php
    
}
?>