 									<?php foreach($locationNames as $locationName){ ?>
                                    <div class="border-bottom innerAll">
                                        <?php echo $locationName['LocationName']['location_name']; ?>  
                                        <button data-location-id = '<?php echo $locationName['LocationName']['id']; ?> ' type="button" class="btn btn-xs btn-danger delete_your_locatioin">X</button> 
                                    </div>
                                    <?php } ?>