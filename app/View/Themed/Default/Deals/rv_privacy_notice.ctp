<?php

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');

$d_address = AuthComponent::user('d_address');
//echo $daddress;

$sperson = AuthComponent::user('full_name');

$d_city = AuthComponent::user('d_city');
//echo $dcity;

$d_state = AuthComponent::user('d_state');
//echo $dstate;

$d_zip = AuthComponent::user('d_zip');
//echo $dzip;

$d_phone = AuthComponent::user('d_phone');
//echo $dphone;

$d_fax = AuthComponent::user('d_fax');
//echo $dfax;

$d_email = AuthComponent::user('d_email');
//echo $demail;

$d_website = AuthComponent::user('d_website');
//echo $dwebsite;

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('m/d/Y');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;
//echo "<pre>";
//print_r($info);
?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
    <?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
    <div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
    <style>

    #worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
    input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
    label{font-size: 13px;}
    ul{margin: 0; padding: 0;}
    li{margin-bottom: 7px; font-size: 14px; display: inline-block; width: 90%; margin-right: 1%;}
    table{font-size: 14px; border-top: 1px solid #000;}
    td, th{padding: 7px; border-bottom: 1px solid #000; font-weight: normal;}
    th{padding: 4px; border-right: 1px solid #000;}
    td:first-child, th:first-child{border-left: 1px solid #000;}
    td{border-right: 1px solid #000;}
    table input[type="text"]{border: 0px; text-align: center;}
    th, td{text-align: center; padding: 10px;}
    .right table{border: 0px;}
    .right table td{border: 0px; padding: 2px;}
    .right input[type="text"]{border-bottom: 1px solid #000;}
    .no-border input[type="text"]{border: 0px;} 
    .bg{background-color: #000; color: #fff; text-align: left; padding: 12px 16px; font-size: 18px;}
    .wraper.main input {padding: 0px;}
    
@media print {
    .bg{background-color: #000 !important; color: #fff; }
    .second-page{margin-top: 60% !important;}
    .wraper.main input {padding: 0px !important;}
    .dontprint{display: none;}
    }
    </style>
    
    <!-- worksheet start -->
    <div class="wraper header">
        <div class="row" style="float: left; width: 100%; margin: 4px 0; box-sizing: border-box; border-bottom: 1px solid #000;">
            <div class="left" style="float: left; width: 20%; background-color: #000; color: #fff; font-size: 24px; padding: 17px 21px;    text-align: center; box-sizing: border-box;">
                FACTS
            </div>
            <div class="form-field" style="float: left; width: 80%; margin: 0; box-sizing: border-box; padding: 10px 0 0 10px; line-height: 24px;">
                <h2 style="float: left; width: 100%; margin: 0; font-size: 18px;"><b>WHAT DOES Sunfair Chevrolet, Inc. <br> DO WITH YOUR PERSONAL INFORMATION?</b></h2>
            </div>
        </div>
        
        <div class="row" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; box-sizing: border-box;">
            <div class="left" style="float: left; width: 20%; height: 65px; background-color: #000; color: #fff; box-sizing: border-box; padding: 10px 30px; border-left: 1px solid #000;">
                Why?
            </div>
            <div class="form-field" style="float: left; width: 80%; margin: 0; box-sizing: border-box; box-sizing: border-box; padding: 5px;">
                <p style="float: left; width: 100%; margin: 0;">Financoal companies choose how they share your personal information. Federal law gives consumers the right to limit some but not all sharing. Federal law also requires us to tell you how we collect, share, and protect your personal information. Please read this notice carefully to understand what we do.</p>
            </div>
        </div>
        
        <div class="row" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; box-sizing: border-box;">
            <div class="left" style="float: left; width: 20%; height: 125px; background-color: #000; color: #fff; box-sizing: border-box; padding: 10px 30px; border-left: 1px solid #000;">
                <b>What?</b>
            </div>
            <div class="form-field" style="float: left; width: 80%; margin: 0; box-sizing: border-box; box-sizing: border-box; padding: 5px;">
                <p style="float: left; width: 100%; margin: 0;">The types of personal information we collect and share depend on the product or service you have with us. This information can include:</p>
                <ul style="margin: 0; padding: 0;">
                    <li style="float: left; width: 100%;">Social Security number and Income</li>
                    <li style="float: left; width: 17.5%;">Credit History</li>
                    <li style="float: left; width: 70%;">and  Credit Scores</li>
                    <li style="float: left; width: 17.5%;">Account Balances</li>
                    <li style="float: left; width: 30%;">and  Payment History</li>
                </ul>
            </div>
        </div>
        
        <div class="row" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; box-sizing: border-box;">
            <div class="left" style="float: left; width: 20%; height: 65px; background-color: #000; color: #fff; box-sizing: border-box; padding: 10px 30px; border-left: 1px solid #000;">
                <b>How?</b>
            </div>
            <div class="form-field" style="float: left; width: 80%; margin: 0; box-sizing: border-box; box-sizing: border-box; padding: 5px;">
                <p style="float: left; width: 100%; margin: 0;">All financial companies need to share customers' personal information to run their everyday business. In the section below, we list the reasons financial companies can share their customers' personal information; teh reasons Sunfair Chevrolet, Inc. chooses to share; and whether you can limit this sharing.</p>
            </div>
        </div>
        
        <table cellpadding="0" cellspacing="0" width="100%;">
            <tr style="background-color: #000; color: white;">
                <td style="width: 50%; text-align: left;padding-left: 31px;"><b>Reasons we can share your personal information</b></td>
                <td style="width: 25%;"><b>Does Sunfair <br> Chevrolet, Inc. Share? </b></td>
                <td style="width: 25%;"><b>Can you limit this sharing?</b></td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    <b>For our everyday business purposes--</b>
                    <p style="font-size: 14px; margin: 0;">Such as to process your transactions, maintain your account(s), respond to court orders and legal investigations, or report to credit bureaus</p>
                </td>
                <td><input type="text" name="sunfair1" value="<?php echo isset($info['sunfair1']) ? $info['sunfair1'] : "" ?>" style="width: 100%;"></td>
                <td><input type="text" name="limit1" value="<?php echo isset($info['limit1']) ? $info['limit1'] : "" ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    <b>For our marketing purposes--</b>
                    <p style="font-size: 14px; margin: 0;">to offer our  products and services to you</p>
                </td>
                <td><input type="text" name="sunfair2" value="<?php echo isset($info['sunfair2']) ? $info['sunfair2'] : "" ?>" style="width: 100%;"></td>
                <td><input type="text" name="limit2" value="<?php echo isset($info['limit2']) ? $info['limit2'] : "" ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    <b>For joint marketing with other financial companies</b>
                </td>
                <td><input type="text" name="sunfair3" value="<?php echo isset($info['sunfair3']) ? $info['sunfair3'] : "" ?>" style="width: 100%;"></td>
                <td><input type="text" name="limit3" value="<?php echo isset($info['limit3']) ? $info['limit3'] : "" ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    <b>For our affiliates' everyday business purposes--</b>
                    <p style="font-size: 14px; margin: 0;">Information about your transactions and experiences</p>
                </td>
                <td><input type="text" name="sunfair4" value="<?php echo isset($info['sunfair4']) ? $info['sunfair4'] : "" ?>" style="width: 100%;"></td>
                <td><input type="text" name="limit4" value="<?php echo isset($info['limit4']) ? $info['limit4'] : "" ?>" style="width: 100%;"></td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    <b>For our affiliates' everyday business purposes--</b>
                    <p style="font-size: 14px; margin: 0;">information about your creditworthiness</p>
                </td>
                <td><input type="text" name="sunfair5" value="<?php echo isset($info['sunfair5']) ? $info['sunfair5'] : "" ?>" style="width: 100%;"></td>
                <td><input type="text" name="limit5" value="<?php echo isset($info['limit5']) ? $info['limit5'] : "" ?>" style="width: 100%;"></td>
            </tr>
            
            <tr>
                <td style="text-align: left;">
                    <b>For our affiliates to market to you</b>
                </td>
                <td><input type="text" name="sunfair6" value="<?php echo isset($info['sunfair6']) ? $info['sunfair6'] : "" ?>" style="width: 100%;"></td>
                <td><input type="text" name="limit6" value="<?php echo isset($info['limit6']) ? $info['limit6'] : "" ?>" style="width: 100%;"></td>
            </tr>
            
            <tr>
                <td style="text-align: left;">
                    <b>For nonaffiliates to market to you</b>
                </td>
                <td><input type="text" name="sunfair7" value="<?php echo isset($info['sunfair7']) ? $info['sunfair7'] : "" ?>" style="width: 100%;"></td>
                <td><input type="text" name="limit7" value="<?php echo isset($info['limit7']) ? $info['limit7'] : "" ?>" style="width: 100%;"></td>
            </tr>
        </table>
        
        <div class="row" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; box-sizing: border-box;">
            <div class="left" style="float: left; width: 20%; height: 130px; background-color: #000; color: #fff; box-sizing: border-box; padding: 10px 30px; border-left: 1px solid #000;">
                <b>To limit our sharing</b>
            </div>
            <div class="form-field" style="float: left; width: 80%; margin: 0; box-sizing: border-box; box-sizing: border-box; padding: 5px;">
                <ul>
                    <li>Call 509-577-5904 or</li>
                    <li>Visit us online : www.Bobhallauto.com</li>
                </ul>
                <p style="float: left; width: 100%; margin: 0; font-weight: normal;"><b>Please note:</b><br>
                    If you are a new customer, we can begin sharing your information 30 days from the date we sent this notice. When you are <i>no longer</i> our customer, we continue to share your information as described in this notice. <br>However, you can contact us at any time to limit our sharing.</p>
            </div>
        </div>
        
        <div class="row" style="float: left; width: 100%; margin: 3px 0; border: 1px solid #000; box-sizing: border-box;">
            <div class="left" style="float: left; width: 20%; height: 36px; background-color: #000; color: #fff; box-sizing: border-box; padding: 10px 30px; border-left: 1px solid #000;">
                <b>Questions?</b>
            </div>
            <div class="form-field" style="float: left; width: 80%; margin: 0; box-sizing: border-box; box-sizing: border-box; padding: 5px;">
                <p style="float: left; width: 100%; margin: 0; font-weight: normal;">Call 509-577-5904 or go to www.Bobhallauto.com</p>
            </div>
        </div>
        
        <table  class="second-page" cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
            <tr>
                <td class="bg" colspan="2"><b>Who we are</b></td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>Who is providing this notice?</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;"><b>Sunfair chevrolet, Inc.</b></td>
            </tr>
        </table>
        
        <table cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
            <tr>
                <td class="bg" colspan="2"><b>What we do</b></td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>How does Sunfair Chevrolet protect my personal informtion?</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;"><b>To protect your personal information from unauthorized access and use, we use security measures that comply with federal law. These ,measures include computer safeguards and secured files and buildings.</b></td>
            </tr>
            
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>How does Sunfair Chevrolet collect my personal information?</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;">
                    <p style="float: left; width: 100%; margin: 3px 0 7px; font-size: 16px;">We collect your personal information, for example, when you</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px;"><span style="width: 36%; display: inline-block;">Applying for financing</span> or Apply  for a lease</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px;"><span style="width: 36%; display: inline-block;">Give us your contact info </span> or Pay us by check</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px;">Show us your government-issued ID</p>
                    <p style="float: left; width: 100%; margin: 10px 0 3px; font-size: 16px;">We also collect your information fom others, such as credit bureaus, affiliates, or other companies.</p>
                </td>
            </tr>
            
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>Why can't I limit all sharing?</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;">
                    <p style="float: left; width: 100%; margin: 3px 0 7px; font-size: 16px;">Federal law gives you the right to limit only</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px; padding: 0 5px;">Sharing for affiliates' everyday business purposes - information about your creditworthiness</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px; padding: 0 5px;">affiliates from using your information to market to you</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px; padding: 0 5px;">sharing for nonaffiliates to market to you</p>
                    <p style="float: left; width: 100%; margin: 10px 0 3px; font-size: 16px;">State laws and individual companies may give you additional rights to limit sharing.</p>
                </td>
            </tr>
            
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>What happens when I limit sharing for an account I hold jointly with someone else?</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;">Your choices will apply to everyone on your account unless you tell us otherwise.</td>
            </tr>
        </table>
        
        <table cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
            <tr>
                <td class="bg" colspan="2"><b>Definitions</b></td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>Affiliates</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;">
                    <p style="float: left; width: 100%; margin: 3px 0 7px; font-size: 16px;">Companies related by common ownership or control. They can be financial and nonfinancial companies.</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px; padding: 0 5px;"><i>Our affilites include companies with a "Bob Hall" name such as Bob Hall Sunfiar Chevrolet, Bob Hall Mazda and Bob Hall Honda.</i></p>
                </td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>Nonaffiliates</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;">
                    <p style="float: left; width: 100%; margin: 3px 0 7px; font-size: 16px;">Companies not related by common ownership or control. They can be financial and nonfinancial companies.</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px; padding: 0 5px;"><i>Nonaffiliates we share with can include banks, finance companies, insurance companies and direct marketing companies.</i></p>
                </td>
            </tr>
            <tr>
                <td style="width: 40%; text-align: left; font-size: 16px;"><b>Joint marketing</b></td>
                <td style="width: 60%; text-align: left; font-size: 16px;">
                    <p style="float: left; width: 100%; margin: 3px 0 7px; font-size: 16px;">A formal agreement between nonaffiliated financial companies that together market  financial products or services to you.</p>
                    <p style="float: left; width: 100%; margin: 3px 0; font-size: 16px; padding: 0 5px;"><i>Sunfair Chevrolet doesn't jointly market.</i></p>
                </td>
            </tr>
        </table>
        
        <table cellpadding="0" cellspacing="0" width="100%" style="margin: 3px 0;">
            <tr>
                <td class="bg" colspan="2"><b>Other important information</b></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left; font-size: 16px; border-bottom: 0px;">Acknowledgement of Receipt: I hereby acknowledge that I have received a copy of this Form from Sunfair Chevrolet, Inc.</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left; font-size: 16px;">
                    <div class="form-field" style="float: left; width: 47%;">
                        <input type="text" name="name" style="float: left; width: 100%; border-bottom: 1px solid #000;">
                        <label style="font-size: 15px;">Customer Signature</label>
                    </div>
                    <div class="form-field" style="float: right; width: 47%;">
                        <input type="text" name="name" style="float: left; width: 100%; border-bottom: 1px solid #000;">
                        <label style="font-size: 15px;">Printed Name</label>
                    </div>
                </td>
            </tr>
            
            
        </table>
    </div>
    <!-- worksheet end -->
        
        
        <!-- no print buttons -->
    <br/>
    <div class="dontprint">
        <button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
        <button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
        <button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
    </div>
    
    <?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

    //alert("please select a fee"); 
    
    $(".date_input_field").bdatepicker();

    /*$('#est_payoff').on('change keyup paste',function(){
        
        //update_10days_payoff();
        //update_initial_investment();
        //if($("#doc").val()!=''&&$("freight").val()!='')
        //calculate_tax(tax_percent);
        //calculateMonthWisePayments();
    });*/
        
    
    /*
    if( $('#sell_price').val() != '' && $('#sell_price').val() > 0 ){
        downpayment = ($('#sell_price').val() / 100 ) * 25;
        $('#down_pay').val( downpayment.toFixed(2)  ) ;
    }
    */
        
    
    $('#worksheet_wraper').stop().animate({
      scrollTop: $("#worksheet_wraper")[0].scrollHeight
    }, 800);
    

    $("#worksheet_container").scrollTop(0);


    $("#btn_print").click(function(){
        $( "#worksheet_container" ).printThis();
    });
    
    $("#btn_back").click(function(){
        
    });


    //calculate();
    
    
     
});

    
    
    
    
    
</script>
</div>
