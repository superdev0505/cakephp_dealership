<?php
  $objTmp=SessionHelper::read('objTmp');
if(!empty($leadstatusinfo)){
foreach ($leadstatusinfo as $value) {
    ?>
<div class="row">
    <div class="col-md-3"  style="width:auto; margin-left:10px;">   
        <label class="strong" >Legacy Lead Status: </label> 
             <input type="text" readonly name="oldleadstatus[]"  value="<?php echo $value[$objTmp][$leadstatus]; ?>" class="form-control">
           
        <div class="separator"></div>
    </div>
    <div class="col-md-3"><label  class="strong">New Lead Status:</label> 
<!--        <input type="text" name="newcontactstsid[]" class="form-control">-->
        <select style="width: 100%" class="form-control" name="newleadstatus[]">
            <option value="Open">Open</option>
            <option value="Closed">Closed</option>

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