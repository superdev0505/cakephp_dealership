<?php
  $objTmp=SessionHelper::read('objTmp');
if(!empty($salesstepinfo)){
foreach ($salesstepinfo as $value) {
    ?>
<div class="row">
    <div class="col-md-3"  style="width:auto; margin-left:10px;">   
        <label class="strong" >Legacy Sales Step : </label> 
             <input type="text" readonly name="oldsalesstep[]"  value="<?php echo $value[$objTmp][$salesstep]; ?>" class="form-control">
           
        <div class="separator"></div>
    </div>
    <div class="col-md-3"><label  class="strong">New Sales Step:</label> 
<!--        <input type="text" name="newcontactstsid[]" class="form-control">-->
        <select style="width: 100%" class="form-control" name="newsalesstep[]">
            <option value="3">Greet</option>
            <option value="10">Sold</option>

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