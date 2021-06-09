 <div class="col-md-3">
                  <?php if(!empty($userids)) { ?>
                <label  class="strong">User ID:</label> 
        <!--        <input type="text" name="sperson_id[]" class="form-control">-->
              

                    <select style="width: 100%" class="form-control" name="new_sperson_id">
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