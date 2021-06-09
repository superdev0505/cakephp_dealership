<style type="text/css">
    .modal-dialog {
    width: auto !important;
    padding: 20px;
}
    
</style>
<br>
<div class="innerLR">

    <h2>Top Menu</h2>

    <!-- BreadCum -->
    <div class="input-group">
        <div class="kb-breadcrumbs"> 
             <a href="/knowledgebases/index"><strong>Knowledge Base</strong> » 
            <a href="#">Top Menu</a> » 
            <a href="#">
                <?php if($flag==1){
                echo "Web Lead Arrived";
                }elseif($flag==2){
                echo "BDC Set Lead Appt.";
                }elseif($flag==3){
                echo "MGR Message";
                }elseif($flag==4){
                echo "Log Changes";
                }elseif($flag==5){
                echo "Account";
                }
                ?>
            </a>
        </div>
    </div>

    <div class="separator-h"></div>

    <div class="row">

        <div class="col-md-12">
            <div class="widget">

                <!-- Category Heading -->
                <h4 class="innerAll bg-gray border-bottom margin-bottom-none">
                    <?php if($flag==1){
                echo "Web Lead Arrived";
                }elseif($flag==2){
                echo "BDC Set Lead Appt.";
                }elseif($flag==3){
                echo "MGR Message";
                }elseif($flag==4){
                echo "Log Changes";
                }elseif($flag==5){
                echo "Account";
                }
                ?>
                    
                </h4>

                <!-- Category Links -->
                <div class="row innerAll">
                    <?php
                    if ($flag == 1) {
                        ?>
                        <p>This section shows the total number of web leads whose are just arrived.</p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/weblead.png" width="1250px" alt=""> 
                        <br>
                        <br>
                        <p>On mouse hover on "Web Lead Arrived" link a drop-down list will show as below with Name,Date&Time, #ID, Source, Status and Step. By clicking on a web lead, you can go to "detail view page" of that web lead. 
                        
                        </p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/weblead1.png"  width="1250px" alt=""> 

                        <?php
                    }
                    ?>
                        
                 <?php
                    if ($flag == 2) {
                        ?>
                        <p>This section shows the total number of web lead appointments.</p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/bdc.png" width="1250px" alt=""> 
                        <br>
                        <br>
                        <p>On mouse hover on "BDC Set Lead Appt." link a drop-down list will show as below with Name,Created Date&Time, #ID, Appointment date and time, Title and Event Notes. By clicking on a appointment, you can go to Event page. </p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/bdc1.png"  width="1250px" alt=""> 

                        <?php
                    }
                    ?>   
                        
                        
                 <?php
                    if ($flag == 3) {
                        ?>
                        <p>This section shows the total number of Manager Message.</p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/msg.png" width="1250px" alt=""> 
                        <br>
                        <br>
                        <p>On mouse hover on "MGR Message" link a drop-down list will show as below with message Sender Name, Message ID,Created Date&Time, Customer Name and Message. You can reply by clicking on a message. </p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/msg1.png"  width="1250px" alt="">
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>After Click on a message:</p>
<img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/msg2.png"  width="auto" alt="">
                        <?php
                    }
                    ?>  

                   <?php
                    if ($flag == 4) {
                        ?>
                        <p>This section shows the total number of "Log of changes" of your own leads.</p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/log.png" width="1250px" alt=""> 
                        <br>
                        <br>
                        <p>On mouse hover on "Log Changes" link a drop-down list will show as below with Dealer Name,Created Date&Time, Customer Name, Lead ID and description of all changes of lead. By clicking on a "log of changes", you can go to "detail page" of that lead. </p>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/log1.png"  width="1250px" alt=""> 

                        <?php
                    }
                    ?>   


                        
                         <?php
                    if ($flag == 5) {
                        ?>
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/acc1.png" width="1250px" alt=""> 
                        <br>
                        <br>
                        <p>By clicking on "Account" link, you can go to "Your Personal Information page" of your account. This page also allow you to change password, active/deactive your account.</p>
                        <br>
                        <br>
                        Example:-
                        <img src="<?php echo $this->webroot; ?>app/webroot/img/kb/topmenu/acc.png" width="1250px" alt=""> 
                        
                        <?php
                    }
                    ?>   
                        
                </div>

            </div><!-- // END col-separator -->	
        </div>
        <!-- // END col -->
    </div>
    <!-- // END row -->

</div>