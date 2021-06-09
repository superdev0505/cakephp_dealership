<?php
if (!empty($spersoninfo)) {
    foreach ($spersoninfo as $value) {
        $objTmp=SessionHelper::read('objTmp');
        ?>
        <div class="row">
            <div class="col-md-3"  style="width:auto; margin-left:10px;">   
                <label class="strong" >Legacy Sperson : </label> 
                <input type="text" readonly name="oldsperson_id[]"  value="<?php echo $value[$objTmp][$sperson]; ?>" class="form-control">

                <div class="separator"></div>
            </div>
            <div class="col-md-3">
                  <?php if(!empty($userids)) { ?>
                <label  class="strong">User ID:</label> 
        <!--        <input type="text" name="sperson_id[]" class="form-control">-->
              

                    <select id="sperson_userid" style="width: 100%" class="form-control" name="sperson_id[]">
                        <!--<option value="" selected="selected">Select</option>-->
                        <?php
                        foreach ($userids as $uinfo) {
                            ?>
                            <option value="<?php echo $uinfo['User']['id']; ?>"><?php echo $uinfo['User']['first_name'] . ' ' . $uinfo['User']['last_name']; ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <?php
                }else{
                    echo "<span class='text-danger'> Please create a user for Dealership ID # ".$dealerid."</span>";
                }
                ?>

                <div class="separator">
                </div>
            </div>
            <!--    <div class="col-md-3">
                    <label> Sperson Name:</label> 
                    <div class="control-group"><div class="controls">
                            <input type="text" name="sperson_name[]" class="form-control" >
                        
                        </div></div>        
                    <div class="separator">
                    </div>
                </div> -->

        </div>
        <?php
    }
} else {
    ?>

    <div class="row">
        <div class="col-md-3">   

            No Data Found..
        </div>
    </div>

    <?php
}
?>