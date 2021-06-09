<div class="widget">
        <div class="widget-head">
                <h4 class="heading">Follow Up (24 HRS )</h4>
        </div>
        <div class="widget-body innerAll">
                <?php echo $this->element('followupelement', array('arrResults'=>$followupdata24hrs,'export'=>$export)); ?>
        </div>
</div>


<div class="widget">
        <div class="widget-head">
                <h4 class="heading">Follow Up (48 HRS )</h4>
        </div>
        <div class="widget-body innerAll">
                <?php echo $this->element('followupelement', array('arrResults'=>$followupdata48hrs,'export'=>$export)); ?>
        </div>
</div>


<div class="widget">
        <div class="widget-head">
                <h4 class="heading">Follow Up (72 HRS )</h4>
        </div>
        <div class="widget-body innerAll">
                <?php echo $this->element('followupelement', array('arrResults'=>$followupdata72hrs,'export'=>$export)); ?>
        </div>
</div>
