<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
        <div id="trim_search_result">
            <br>
            <div id="report_data_container">
                <h4>Devteam_Automatic Import Process (Upload File):</h4>
            </div>

            <div class="widget-body">
                <div class="innerLR" style="width: 550px;">
<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
                    <form class="apply-nolazy form-horizontal" id="s3imgform" 
                          action="https://<?php echo $bucket; ?>.s3.amazonaws.com/" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="key" value="<?php echo $filename; ?>${filename}">
                        <input type="hidden" name="AWSAccessKeyId" value="AKIAJCHHC37LYOABAIIQ"> 
                <!--	<input type="hidden" name="acl" value="private"> -->
                        <input type="hidden" name="acl" value="public-read"> 
                        <input type="hidden" name="success_action_redirect" value="https://app.dealershipperformancecrm.com/Dataimport/devteam_importdump/">
                        <input type="hidden" name="policy" value="<?php echo $policy; ?>">

                        <input type="hidden" name="signature" value="<?php echo $signature; ?>">
                        <input type="hidden" name="Content-Type" value="">	


                        <div class="row"> 
                            <div class="col-sm-8">
                                <?php //echo $this->Form->input('image', array('class'=>"form-control",'type'=>'file','label'=>false,'div'=>false,'style'=>'height:auto;','id'=>'settingImage' )); ?>
                                <input name="file" id="settingImage" type="file" class="form-control" 'style'='height:auto;' > 
                            </div>
                            <div class="col-sm-4">
                                <!--			<button type="submit" class="btn btn-success" id="upload">Upload</button>-->
                                <input type="submit" class="btn btn-success" value="Upload" />
                            </div>
                        </div>

                    </form> 	


                </div>
            </div>
            <br>
        </div>
        <!-- //Search result End-->
    </div>
</div>