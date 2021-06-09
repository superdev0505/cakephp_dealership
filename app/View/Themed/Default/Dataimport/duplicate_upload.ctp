<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
        <div id="trim_search_result">
            <br>
            <div id="report_data_container">
                <h4>Devteam_Automatic Import Process (Duplicate Upload File):</h4>
            </div>

            <div class="widget-body">
                <div class="innerLR" style="width: 550px;">
<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
                    <form class="apply-nolazy form-horizontal" id="s3imgform" 
                          action="<?php echo $this->Html->url(array('controller'=>'dataimport','action'=>'devteam_uploadfile')); ?>" method="post" enctype="multipart/form-data">

                        <div class="row"> 
                            <div class="col-sm-5">
                                   Last Duplicate Rowid: <input type="text" name="rowid" value="">
                            </div>
                            <div class="col-sm-4">
                                <!--			<button type="submit" class="btn btn-success" id="upload">Upload</button>-->
                                <input type="submit" class="btn btn-success" value="Next >>" />
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