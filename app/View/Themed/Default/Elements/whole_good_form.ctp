<div class="page-break"></div>
<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>
body{ padding:0; margin:0 5%; font-family:Arial, Helvetica, sans-serif;}

.dte_fm{border:2px solid black; width:20%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm2{border:2px solid black; width:37%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm3{border:2px solid black; width:50%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm4{border:2px solid black; width:90%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm5{border:2px solid black; width:90%; background:none; border:none; margin-right:20px;}

.dte_fm6{border:2px solid black; width:28%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}

@media print {
		#fixedfee_selection,.price_options,.noprint {
			display: none;
		}
		.dte_fm{border:2px solid black; width:15% !important; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}

		#worksheet_container{
					width:80%px !important;
				}
		td {
			padding:1px 0 !important;
		}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" style="border:solid 3px #000;" >
      <tr>
        <td style="background:#ccc; color:#fff; font-size:18px; text-align:center; padding:10px 0; font-weight:600;">WHOLE GOODS WORKSHEETS</td>
      </tr>
    </table>

      <table width="100%">
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">DATE <input name="date"  value="<?php echo isset($info['date']) ? $info['date'] : date('Y-m-d h:i:s'); ?>"  type="text" class="dte_fm" /> 
		SALESPERSON: <input name="salesperson"  value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>"  type="text" class="dte_fm2" /> 
		CASH <input name="cash"  value="<?php echo isset($info['cash']) ? $info['cash'] : "checked" ?>"  type="checkbox"/> 
		FINANCE <input name="finance"  value="<?php echo isset($info['finance']) ? $info['finance'] : "checked" ?>"  type="checkbox"/></td>
         </tr>
         
        <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  CUSTOMER NAME: <input name="customer_name1"  value="<?php echo isset($info['customer_name1']) ? $info['customer_name1'] :  $info['first_name'].' '.$info['last_name']; ?>"  type="text" class="dte_fm3" /></td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  PRODUCT 1: <input  value="<?php echo isset($info['product1']) ? $info['product1'] : $info['year'].','.$info['make'].','.$info['model']; ?>"  name="product1" type="text" class="dte_fm3" /> 
		STOCK # 1: <input name="pr1_stock"  value="<?php echo isset($info['pr1_stock']) ? $info['pr1_stock'] : $info['stock_num']; ?>"  type="text" class="dte_fm" /> </td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  Vin 1: <input  value="<?php echo isset($info['vin1']) ? $info['vin1'] : $info['vin'] ?>"  name="vin1" type="text" class="dte_fm3" /></td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  PRODUCT 2: <input  value="<?php echo isset($info['product2']) ? $info['product2'] : "" ?>"  name="product2" type="text" class="dte_fm3" />  STOCK # 2: <input name="pr2_stock" type="text" class="dte_fm" /> </td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  Vin 2: <input  value="<?php echo isset($info['vin2']) ? $info['vin2'] : "" ?>"  name="vin2" type="text" class="dte_fm3" /></td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  PRODUCT 3: <input  value="<?php echo isset($info['product3']) ? $info['product3'] : "" ?>"  name="product3" type="text" class="dte_fm3" />  STOCK # 3: <input name="pr3_stock" type="text" class="dte_fm" /> </td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;"> Vin 3: <input  value="<?php echo isset($info['vin3']) ? $info['vin3'] : "" ?>"  name="vin3" type="text" class="dte_fm3" /></td>
      </tr>
    </table>

     <table width="100%" style="border:solid 3px #000; background:#ccc;" >
      <tr>
        <td style="color:#fff; font-size:18px; text-align:center; padding:10px 0; font-weight:600;  width:50%;">WHOLE GOODS WORKSHEETS</td>
         <td style="color:#fff; font-size:18px; text-align:center; padding:10px 0; font-weight:600; width:50%;">WHOLE GOODS WORKSHEETS</td>
      </tr>
    </table>
    
    <table width="100%" style="border:solid 1px #000;" >
        <tr>
          <td style="color:#000; font-size:15px; padding:5px 0; font-weight:normal;  width:50%;">
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
        <td style="width:33%; padding:0px 15px;">BUYERS ORDER:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">RETAIL SELL:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">TRADE EVALUATION:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">COST:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">DUE BILL:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">PDI:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">COPY OF DRIVERS LICENSE:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">MISC. EXP.:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">INSURANCE CARD: </td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">REBATE #1:</td>
      </tr>
      
       <tr>
        <td style="width:33%; padding:0px 15px;">COPY OF INVOICE:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">REBATE #2:</td>
      </tr>
      
       <tr>
        <td style="width:40%; padding:0px 15px;">TRADE TITLE:</td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;">REBATE #3:</td>
      </tr>
      
       <tr>
        <td style="width:40%; padding:0px 15px;">LIEN RELEASE FORM</td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> LESS REBATES:</td>
      </tr>
      
       <tr>
        <td style="width:40%; padding:0px 15px;">TRAILER TITLE </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> PROFIT $ :</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">LIEN RELEASE FORM </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;">  PROFIT %:</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">LOAN PAYOFF FORM </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> FIN. SOURCE:</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">LOGGED </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> DATE FUNDED:</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">FUNDING CHECKLIST</td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;">TRADE ACV:</td>
      </tr>
     </table>
        </td>
        

         <td style="color:#000; font-size:15px; padding:5px 0; font-weight:normal; width:50%;">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="width:33%;">STOCK # 1</td>
            <td style="width:33%;">STOCK # 2</td>
            <td style="width:33%;">STOCK # 3</td>
          </tr>
        </table>
         
         <p><input name="stock1"  value="<?php echo isset($info['stock1']) ? $info['stock1'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock2"  value="<?php echo isset($info['stock2']) ? $info['stock2'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock3"  value="<?php echo isset($info['stock3']) ? $info['stock3'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock4"  value="<?php echo isset($info['stock4']) ? $info['stock4'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock5"  value="<?php echo isset($info['stock5']) ? $info['stock5'] : "" ?>"  type="text" class="dte_fm4" /></p>
        <p><input name="stock6"  value="<?php echo isset($info['stock6']) ? $info['stock6'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock7"  value="<?php echo isset($info['stock7']) ? $info['stock7'] : "" ?>"  type="text" class="dte_fm4" /></p>
        <p><input name="stock8"  value="<?php echo isset($info['stock8']) ? $info['stock8'] : "" ?>"  type="text" class="dte_fm4" /></p>
        <p><input name="stock9"  value="<?php echo isset($info['stock9']) ? $info['stock9'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock10"  value="<?php echo isset($info['stock10']) ? $info['stock10'] : "" ?>"  type="text" class="dte_fm4" /></p>
            <p><input name="stock11"  value="<?php echo isset($info['stock11']) ? $info['stock11'] : "" ?>"  type="text" class="dte_fm4" /></p>
               <p><input name="stock12"  value="<?php echo isset($info['stock12']) ? $info['stock12'] : "" ?>"  type="text" class="dte_fm4" /></p>
                  <p><input name="stock13"  value="<?php echo isset($info['stock13']) ? $info['stock13'] : "" ?>"  type="text" class="dte_fm4" /></p>
              </td>
           </tr>
    </table>
    
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:20px;">INVOICE AMOUNT - M.S.R.P. / INVOICE</td>
    <td style="width:20%; font-size:20px; height:70px; border-right:solid 1px #000; padding-top:22px;">$<input name="invoice1"  value="<?php echo isset($info['invoice1']) ? $info['invoice1'] : "" ?>"  type="text" class="dte_fm6" /> $ <input name="invoice2"  value="<?php echo isset($info['invoice2']) ? $info['invoice2'] : "" ?>"  type="text" class="dte_fm6" /></td>
    <td style="width:20%; font-size:20px; border-right:solid 1px #000 ; padding-left:28px;">$<input name="invoice3" type="text" class="dte_fm6"  value="<?php echo isset($info['invoice3']) ? $info['invoice3'] : "" ?>"  /> $ <input name="invoice4" type="text" class="dte_fm6"  value="<?php echo isset($info['invoice4']) ? $info['invoice4'] : "" ?>"  /></td>
     <td style="width:20%; font-size:20px; padding-left:5px; padding-top:22px;">$<input name="invoice5" type="text" class="dte_fm6"  value="<?php echo isset($info['invoice5']) ? $info['invoice5'] : "" ?>"  /> $ <input  value="<?php echo isset($info['invoice6']) ? $info['invoice6'] : "" ?>"  name="invoice6" type="text" class="dte_fm6" /></td>
  </tr>
</table>
 
    
   
    <table width="49%" style="border:solid 3px #000; margin:0 2% 0 0; float:left;" >
      <tr>
        <td style="background:#ccc; color:#fff; font-size:20px; text-align:center; border-bottom:solid 3px #000; padding:10px 0; font-weight:600;">Comments</td>
      </tr>
      <tr>
        <td style="color:#000; font-size:18px; padding:10px 0; font-weight:600; height:50 0px;">
		<textarea name="comments1"  type="textarea"  rows="3" cols="10" class="dte_fm5" >
		<?php echo isset($info['comments1']) ? $info['comments1'] : "" ?>
		</textarea>        
        </td>
      </tr>
    </table>
    
    <table width="49%" style="border:solid 3px #000;" >
      <tr>
        <td style=" background:#ccc; color:#000; font-size:18px; text-align:center; padding:10px 0; border-bottom:solid 3px #000; font-weight:600;">Misc. Expense Detail</td>
      </tr>
      
      <tr>
         <td style="color:#000; font-size:18px; padding:10px 0; font-weight:600; height:50 0px;">
		<textarea name="comments1"  type="textarea"  rows="3" cols="10" class="dte_fm5" >
		<?php echo isset($info['expense1']) ? $info['expense1'] : "" ?>
		</textarea>  </td>
      </tr>
      
     
    </table>
			</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
	</div>
	
	<?php echo $this->Form->end(); ?>
</div>
