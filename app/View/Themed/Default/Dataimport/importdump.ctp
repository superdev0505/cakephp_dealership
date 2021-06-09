<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
        <div id="trim_search_result">
            <br>
            <div id="report_data_container">
                <h4>Automatic Import Process (Upload File):</h4>
            </div>

            <div class="widget-body">
                <div class="innerLR" style="width: 550px;">

                    <?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
                    <?php
                    echo $this->Form->create('Dataimport', array('url' => array('controller' => 'Dataimport', 'action' => 'importdump'), 'class' => 'form-horizontal apply-nolazy', 'role' => "form", 'type' => 'file'));
                    //    echo $this->Form->create('Dataimport',array('url' => array('controller' => 'Dataimport','action' => 'testimport'),'class'=>'form-horizontal apply-nolazy','role'=>"form" ,'type'=>'file')); 
                    ?>
                    <div class="form-group"> <?php echo $this->Form->label('file', 'Select File:', array('class' => "col-sm-2 control-label")); ?>
                        <div class="col-sm-10"> <?php echo $this->Form->input('file', array('type' => 'file', 'div' => false, 'label' => false, 'class' => 'form-control')); ?> </div>
                    </div>

                    <div class="pull-right">
                        <button type="submit" id='submit_support' class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Import</button>
                    </div>
                    <div class="clearfix"></div>

                    <?php echo $this->Form->end(); ?> 

                </div>
            </div>
            <br>
        </div>
        <!-- //Search result End-->
    </div>
</div>