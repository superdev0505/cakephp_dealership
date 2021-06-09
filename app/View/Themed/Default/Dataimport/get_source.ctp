<?php
 $objTmp=SessionHelper::read('objTmp');
if(!empty($sourceinfo)){
        $i=1;
    $j=0;
foreach ($sourceinfo as $value) {
    ?>
<div class="row">
    <div class="col-md-3"  style="width:auto; margin-left:10px;">   
        <label class="strong" >Legacy Sales Source : </label> 
             <input type="text" readonly name="oldsource[]"  value="<?php echo $value[$objTmp][$source]; ?>" class="form-control">
           
        <div class="separator"></div>
    </div>
    <div class="col-md-3"><label  class="strong">New Sales Source:</label> 
        <input type="text" name="newsource_input[]" class="form-control" id="source_<?=$i?>" style="display: none;">
                <select style="width: 100%" class="form-control" id="source_drop_<?=$i?>" name="newsource[]">
                    <?php
                    foreach ($allsource as $vid) {
                        ?>
                        <option value="<?php echo $vid['LeadSource']['name']; ?>"><?php echo $vid['LeadSource']['name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
        
        <div class="separator">
        </div>
    </div>
<div class="col-md-1">
            <label  class="strong">Not Match?</label> 
            <input type="checkbox" name="source_notmatch[<?=$j?>]" id="source_notmatch_<?=$i?>" sourceid="<?=$i?>" class="form-control source_notmatch">
            <div class="separator">
            </div>
        </div>
</div>
    <?php
    $i++;
    $j++;
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