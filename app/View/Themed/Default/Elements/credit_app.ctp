<style>

/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
}
.text_captialize{
	text-transform:capitalize;
}
body {
	font-family:"Arial";
}

a {
	text-decoration:none;
	color:inherit;
}
hr {
display: block;
margin-top:0.1em;
margin-bottom:0.1em;

border-style: inset;
border-width: 1px;
}
input{
    border: 1px solid #aaa;
    padding: 5px 0;



}
input, textarea, keygen, select, button, isindex {
margin-top: 0em;
}


.clear:after {
    content: '';
    display: table;
    clear: both;
}

.full,
.half,
.three,
.four,
.two-three,
.six,
.label20,
.label30,
.eight {
	float: left;
	margin: 0 0.5%;
	padding: 10px 10px;
	position: relative;
	box-sizing: border-box;
}

.label20{
	width:19%;
}
.label30{
	width:28%;
}
.six {
	width :15%
}
.eight {
	width :12%
}
.full {
	width: 99%;
}

.half {
	width: 49%;
}

.three {
	width: 32.33%;
}

.four {
	width: 24%;
}

.two-three {
	width: 65.66%;
}

.wraper.main,
.wraper.main *{
	box-sizing: border-box;
}

.wraper.main{
	width:1048px;
	background:#fff;
	padding: 0;
	margin:0px auto;
	border-radius: 7px;
}

.wraper.main input {
	padding: 5px;
	margin:2px 0px 2px 0px;
}
.wraper.main input::-moz-placeholder {
     padding: 1px 1px 1px 1px;
}
.wraper.main input:-moz-placeholder {
    text-indent: 3.8%;
}
.have-border {
    border: 1px solid #aaa;
}

button, select, option{
	cursor:pointer;
	padding:4px 0;
}
.top-three {
    display: inline-block;
    width: 33%;
    padding:0 3px;
}

.date{
	text-align:center;
	padding: 18px 0;
}
.red{
color:red;
}
.sub-title {
	font-weight:bold;
	text-align:center;
	padding:4px 0;
}

.condition-text {
    width: 32%;
    display: inline-block;
}

.select-person select {
    width: 100%;
}

.condition-input {
    width: 32.33%;
}

.salesection input {
    width: 30%;
}
.salesection span {
    width: 65%;
    display: inline-block;
}

.wraper-section {
	margin-bottom: 15px;
}

.content-left {
    width: 63.76%;
    border: 1px solid #aaa;
    padding: 10px 3px;
    display: inline-block;
    float: left;
    margin: 0 0 0 12px;
}
.content-left .col1 {
    width: 10%;
}
.content-left .col2 {
    width: 20%;
}
.content-left .col3 {
    width: 25%;
}
.content-left .col4 {
    width: 41%;
}

.content-right {
    width: 31.4%;
    display: inline-block;
    height: 119px;
    padding: 5px;
    border: 1px solid #aaa;
    margin: 0 7px 0 7px;
}

.wraper.content.middle:after {
    content: "";
    clear: both;
    display: table;
}

.detail-left p {
    font-weight: bold;
}

.detail-left hr {
    border-color: #000;
    margin: 0 0 29px 0;
}

.detail-right .col1 {
    width: 99%;
}
.detail-right .col2 {
    width: 48%;
}
.detail-right .col3 {
    width: 32.4%;
}

.footer button {
    padding: 10px 0;
    width: 33%;
}
.wraper.footer {
    padding: 10px 10px 30px 10px;
}

/*2nd Form*/

.left1{
    width: 50%;

    padding: 3px;
    display: inline-table;
	margin:1px 0;

}
.right1{
    width: 49%;

    padding: 3px;
    display: inline-table;
	margin:1px 0;

}

.input3 {
    width: 3%;
}
.input5 {
    width: 5%;
}
.input12 {
    width: 12%;
}
.input15 {
    width: 15%;
}
.input17 {
    width: 17%;
}
.input20 {
    width: 20%;
}
.input35 {
    width: 33%;
}
.input37 {
    width: 35%;
}
.input60 {
    width: 55%;
}
.span24 {
    width: 24%;
    display: inline-block;
}
.span15 {
    width: 15%;
    display: inline-block;
}
.span60 {
    width: 62%;
    display: inline-block;
}

.input70 {
    width: 68%;
}
.input71 {
    width: 69%;
}

.input33 {
    width: 30.4%;
}

.separator1 {
    background: #000;
    color: #fff;
    text-align: center;
    width: 100%;
    padding: 7px 0;
}
.separatorFoot {
    background: #000;
    color: #fff;
    text-align: center;
    width: 100%;
    padding: 7px 0;
}


.center {
    height: 64px;
}
.center span {
    width: 40%;
    display: inline-block;
}
.center input {
    width: 55%;
}

.blank {
    visibility: hidden;
    padding: 190px 0 0px 0;
}
.blank2 {
    visibility: hidden;
    padding: 172px 0 0px 0;
}
.blank3 {
    visibility: hidden;
    padding: 86px 0 0px 0;
}

.left-margin {
    text-align: left;
}

.select.condition {
    width: 32.43%;
}

.lookup {
    width: 32.33%;
}

.have-border.two-three {
    padding: 10px;
}

.wraper-section.clear.foot {
    padding: 0 0 20px 0;
}
.wraper-section.clear.foot button {
    width: 33%;
    padding: 7px 0;
}

.separator1-half {
    display: inline-block;
    width: 49.66%;
    text-align: center;
    background: #000;
    color: #fff;
    padding: 7px 0;
}
.print_month
	{
		display:none;
	}

table.main_width td,table.mid_width td
{
	padding:6px;
}
@media print {
    #fixedfee_selection,.price_options,.noprint {
        display: none;
    }
	#worksheet_container
	{
		font-size:8px!important;
	}
	.print_month
	{
		display:block;
	}

input[type="checkbox"]{
height : 9px!important;
}
input[type="text"]{
height : 20px!important;
border:0px!important;
}


.full,
.half,
.three,
.four,
.two-three,
.six,
.label20,
.label30,
.eight {


	padding: 2px 2px!important;

}
h2{
	font-size:18px!important;
	font-weight:bolder;
}
h4,h3
{
	font-size:13px!important;
	font-weight:bold;
	padding-top:0px;!important;
	padding: 0px!important;
}
table.main_width
{
	width:997px!important;
}
table.mid_width
{
	width:890px!important;
}
table.set_padding td
{
	padding: 1px 2px 0px 8px;!important;

}
table.no_padding td
{
	padding: 0px!important;
}
td
{
	font-size:10px!important;
}
input[type="text"].bottom_border
{
border-bottom: 1px solid #000!important;

}
span.zero_padding,div.zero_padding
{
	padding:0px!important;
}

 @page
        {
            size: auto;   /* auto is the current printer page size */
            margin: 7mm 7mm 1mm 7mm ;  /* this affects the margin in the printer settings */
        }


}
</style>
		<div class="wraper header">
         <table class="main_width no_padding">
			<tr>
            <td style="width:30%"><h2 style="text-align:center;">CREDIT APPLICATION</h2></td>
            <td align="center"><strong>IMPORTANT:</strong> READ THESE INSTRUCTIONS BEFORE COMPLETING THIS APPLICATION</span></td>
            <td align="center"><h4>PURCHASE / LEASE</h4></td>
            </tr>
            </table>
           <table class="main_width no_padding">
            <tr><td rowspan="3" style="vertical-align:middle;width:15%;"><h4 style="text-align:center; vertical-align:middle;">Check Appropriate Box</h4></td>
            <td><input type="checkbox" name="individual_credit" value="yes" <?php echo (isset($info['individual_credit'])&&$info['individual_credit']=='yes')?'checked="checked"':''; ?> />&nbsp; If you are applying for individual credit in your own name and are relying on your own income or assets and not the income and assets of another person as the basis for repayment of the credit
requested, complete Section A.</td>
            </tr>
            <tr><td><input type="checkbox" name="married_and_community" value="yes" <?php echo (isset($info['married_and_community'])&&$info['married_and_community']=='yes')?'checked="checked"':''; ?> />&nbsp; If you are married and live in a community property state, complete all Sections including Section B providing information about your spouse.</td></tr>
            <tr><td><input type="checkbox" name="joint_credit" value="yes" <?php echo (isset($info['joint_credit'])&&$info['joint_credit']=='yes')?'checked="checked"':''; ?>  />&nbsp; If this is an application for joint credit with another person, complete all Sections providing information in Section B about the co-applicant. </td></tr>
            </table>

        <table style="width:99%">
        <tr><td width="82.1%">
		<h4 style="text-align:center;padding:10px;">NOTE: APPLICANT, IF MARRIED, MAY APPLY FOR A SEPARATE ACCOUNT</h4><td><td><table  bordercolor="#CCCCCC" border="1" ><tr><td>
        Down Payment<br/>
        <input type="text" name="top_down_payment" style="width:153px" value="<?php echo isset($info['top_down_payment'])?$info['top_down_payment']:''; ?>" />
        </td></tr></table>
        </tr>
        </table>

         <table bordercolor="#CCCCCC" border="1" class="main_width set_padding" >
         <tr>
         <td>SELLER<br  />
         <input type="text" style="width:255px;" name="sperson" value="<?php echo $info['sperson']; ?>" /></td>
          <td>Email<br  />
         <input type="text" style="width:150px;" name="email" value="<?php echo $info['email']; ?>" /></td>
         <td>STOCK NO.<br /><input type="text" style="width:120px;" name="stock_num" value="<?php echo $info['stock_num']; ?>" /></td>
         <td>VIN<br /><input type="text" style="width:180px;" name="vin" value="<?php echo $info['vin']; ?>" /></td>
         <td>DATE<br /><input type="text" style="width:103px;" name="created" value="<?php echo date('Y-m-d'); ?>" /></td>
         <td>AMOUNT REQUESTED<br /><input type="text" style="width:113px;" name="amount" value="<?php echo $info['amount']; ?>" /></td>
         </tr>
         </table>
<h4 style="text-align:left;padding-top:8px;"><strong>SECTION A:</strong> Information Regarding Applicant</h4>
<table><tr><td>
 <table border="1" bordercolor="#CCCCCC" class="main_width set_padding" >
 <tr><td>LAST NAME <br/><input type="text" style="width:130px;" class="text_captialize" name="last_name" value="<?php echo $info['last_name']; ?>" /></td>
 <td>FIRST NAME<br/><input type="text" style="width:130px;" name="first_name" class="text_captialize" value="<?php echo $info['first_name']; ?>" /></td>
 <td>INITIAL<br/><input type="text" style="width:70px;" name="suffix" value="<?php echo $info['suffix']; ?>" /></td>
  <td>DOB<br/><input style="font-size:12px;" type="text" style="width:80px;" name="dob_data" value="<?php echo $info['dob']; ?>" /></td>
	<td>DRIVER LICENSE#<br/><input type="text" style="width:140px;" name="driver_lic" value="<?php echo !empty($info['driver_lic'])?$info['driver_lic']:''; ?>" /></td>
   <td>SSN / TAX ID<br/><input type="text" style="width:120px;" name="ss_num" value="<?php echo $info['ss_num']; ?>"  /></td>
    <td>Age of <br />Dependants<br/><input type="text" style="width:120px;" name="age_of_dependants" value="<?php echo $info['age_of_dependants']; ?>" /></td>
     <td><input type="radio" name="martial_status" value="Married" <?php echo (isset($info['martial_status'])&&$info['martial_status']=='Married')?'checked="checked"':''; ?> /> &nbsp;Married<br/><input type="radio" name="martial_status" value="Unmarried" <?php echo (isset($info['martial_status'])&&$info['martial_status']=='Separated')?'checked="checked"':''; ?>  /> &nbsp;Unmarried<br/><input type="radio" name="martial_status" Unmarried value="Separated" /> &nbsp;Separated</td>
 </tr>
 <tr><td colspan="2">Address<br/><input type="text" style="width:272px;" name="address" value="<?php echo $info['address']; ?>"  /></td>
 <td>City<br/><input type="text" style="width:80px;" name="city" value="<?php echo $info['city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="state" value="<?php echo $info['state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="zip" value="<?php echo $info['zip']; ?>" /></td>
<td>Home Phone<br/><input type="text" style="width:120px;" name="phone" value="<?php echo $info['phone']; ?>" /></td>
<td colspan="2">HOW LONG AT ADDRESS?<br/><input type="text" style="width:100px;" name="residence_length" value="<?php echo $info['residence_length']; ?>" />YRS</td>
</tr>
<tr><td colspan="2" style="width:25%">PREVIOUS ADDRESSES (TO COVER 5 YRS RESIDENCE)<br/><input type="text" style="width:272px;" name="address2" value="<?php echo $info['address2']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="city2" value="<?php echo $info['city2']; ?>"  /></td>
 <td>State<br/><input type="text" style="width:80px;" name="state2" value="<?php echo $info['state2']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="zip2" value="<?php echo $info['zip2']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="residence_length2" value="<?php echo $info['residence_length2']; ?>" />YRS</td>
<td colspan="2">LIVED IN THE COMMUNITY?<br/><input type="text" style="width:100px;" name="in_community2" value="<?php echo $info['in_community2']; ?>" />&nbsp;YRS</td>
</tr>
<tr><td colspan="2"><input type="text" style="width:272px;" name="address3" value="<?php echo $info['address3']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="city3" value="<?php echo $info['city3']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="state3" value="<?php echo $info['state3']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="zip3" value="<?php echo $info['zip3']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="residence_length3" value="<?php echo $info['residence_length3']; ?>" />YRS
<?php /*?><input type="text" style="width:25px;" />YRS&nbsp; <input type="text" style="width:25px;" />MOS<?php */?></td>
<?php /*?><td colspan="2">LIVED IN THE COMMUNITY?<br/>
<input type="text" style="width:100px;" name="in_community3" value="<?php echo $info['in_community3']; ?>" /> YRS
<input type="text" style="width:40px;" />&nbsp;YRS&nbsp;&nbsp; <input type="text" style="width:40px;" /><?php&nbsp;MOS  </td>*/?>
<td valign="middle">
<input type="radio" name="house_rent" value="Buy" <?php echo (isset($info['house_rent'])&&$info['house_rent']=='Buy')?'checked="checked"':''; ?> /> &nbsp;Buy &nbsp;&nbsp;&nbsp;<input type="radio" name="house_rent" value="Rent" <?php echo (isset($info['house_rent'])&&$info['house_rent']=='Rent')?'checked="checked"':''; ?> /> &nbsp;Rent&nbsp;&nbsp;
&nbsp;<input type="radio" name="house_rent" value="Own" <?php echo (isset($info['house_rent'])&&$info['house_rent']=='Own')?'checked="checked"':''; ?> /> &nbsp;Own
</td>
<td> Payment Amt. <br/>
<input type="text" style="width:102px;" name="rent_payment_amount" value="<?php echo $info['rent_payment_amount']; ?>" />
</td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER<br /><input type="text" style="width:272px;" name="employer" value="<?php echo $info['employer']; ?>" /></td>
<td colspan="2">OCCUPATION OR RANK<br /><input type="text" style="width:160px;" name="main_job" value="<?php echo $info['main_job']; ?>" /></td>
<td colspan="2">DEPARTMENT OR BADGE NO.<br /><input type="text" style="width:275px;" name="department"  value="<?php echo $info['department']; ?>" /></td>
<td colspan="2">HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="job_length" value="<?php echo $info['job_length']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER'S ADDRESS<br /><input type="text" style="width:272px;" name="employer_address" value="<?php echo $info['employer_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="employer_city" value="<?php echo $info['employer_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="employer_state" value="<?php echo $info['employer_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="employer_zip" value="<?php echo $info['employer_zip']; ?>" /></td>
<td>Work Phone<br/>
<input type="text" style="width:120px;" name="work_phone" value="<?php echo $info['work_phone']; ?>" /></td>
<td colspan="2"></td>
</tr>
<tr>
<table bordercolor="#CCCCCC" border="1" class="main_width set_padding">
<tr><td style="width:25%">PREVIOUS EMPLOYMENT (TO COVER 5 YEAR HISTORY)<br /><input type="text" style="width:220px;" name="previous_employer" value="<?php echo $info['previous_employer']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="previous_employer_address" value="<?php echo $info['previous_employer_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="previous_employer_city" value="<?php echo $info['previous_employer_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:90px;" name="previous_employer_state" value="<?php echo $info['previous_employer_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:60px;" name="previous_employer_zip" value="<?php echo $info['previous_employer_zip']; ?>" /></td>
<td>Phone #<br /><input type="text" style="width:110px;" name="previous_employer_phone" value="<?php echo $info['previous_employer_phone']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="previous_employer_length" value="<?php echo $info['previous_employer_length']; ?>" /> YRS</td>
</tr>
<tr><td>&nbsp;<br /><input type="text" style="width:220px;" name="previous_employer2" value="<?php echo $info['previous_employer2']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="previous_employer_address2" value="<?php echo $info['previous_employer_address2']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="previous_employer_city2" value="<?php echo $info['previous_employer_city2']; ?>" /></td>
<td>State<br /><input type="text" style="width:90px;" name="previous_employer_state2" value="<?php echo $info['previous_employer_state2']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:60px;" name="previous_employer_zip2" value="<?php echo $info['previous_employer_zip2']; ?>" /></td>
<td>Phone #<br /><input type="text" style="width:110px;" name="previous_employer_phone2" value="<?php echo $info['previous_employer_phone2']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;"  name="previous_employer_length2" value="<?php echo $info['previous_employer_length2']; ?>" /> YRS</td>
</tr>
<tr><td style="width:25%">NEAREST RELATIVE NOT LIVING WITH YOU<br /><input type="text" style="width:220px;" name="ref1_name" value="<?php echo $info['ref1_name']; ?>"  /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="ref1_address" value="<?php echo $info['ref1_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="ref1_city" value="<?php echo $info['ref1_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:90px;" name="ref1_state" value="<?php echo $info['ref1_state']; ?>"  /></td>
<td>Zip<br /><input type="text" style="width:60px;" name="ref1_zip" value="<?php echo $info['ref1_zip']; ?>"  /></td>
<td>Phone #<br /><input type="text" style="width:110px;" name="ref1_phone" value="<?php echo $info['ref1_phone']; ?>" /></td>
<td>Relationship<br/><input type="text" style="width:120px;" name="ref1_type" value="<?php echo $info['ref1_type']; ?>"  /></td>
</tr>

</table>
</tr>
 </table>
 </td></tr>
 </table>
 <div class="full zero_padding">
 <span class="full zero_padding">
 <strong>Income</strong>
 </span>
 <span class="full zero_padding">
 <table style="width:100%" class="mid_width no_padding">
 <tr>
 <td>Applicant's Gross Monthly Income from Employment</td><td></td>
 <td align="right">$<input type="text" style="width:120px;" name="income_monthly"  class="bottom_border grossincome1" value="<?php echo isset($info['income_monthly']) ? $info['income_monthly'] : "0.00"; ?>" /></td>
 </tr>
 <tr>
 <td>Alimony, Child Support, or separate Maintenance Income not to be revealed if you do not wish to have it considered as a basis for repaying this obligation</td>
 <td></td>
 <td align="right">$<input type="text" style="width:120px;" name="mortgage_month_amount" value="<?php echo isset($info['mortgage_month_amount']) ? $info['mortgage_month_amount'] : "0.00"; ?>"  class="grossincome1 bottom_border" /></td>
 </tr>
 <tr>
 <td>Alimony, Child Support, or separate Maintenance Income received under:<br />
  <input type="checkbox" name="income_court" value="yes" <?php echo (isset($info['income_court'])&&$info['income_court']=='yes')?'checked="checked"':''; ?> />&nbsp; Court Order&nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="income_written_agreement" value="yes" <?php echo (isset($info['income_written_agreement'])&&$info['income_written_agreement']=='yes')?'checked="checked"':''; ?> />&nbsp; Written Agreement&nbsp;&nbsp;&nbsp;
  <input type="checkbox"  name="income_oral_understanding" <?php echo (isset($info['income_oral_understanding'])&&$info['income_oral_understanding']=='yes')?'checked="checked"':''; ?> />&nbsp; Oral Understanding&nbsp;&nbsp;&nbsp;</td><td></td>
  <td align="right" style="width:15%" >$<input type="text" style="width:120px;" name="other_income2" value="<?php echo isset($info['other_income2']) ? $info['other_income2'] : "0.00"; ?>"  class="grossincome1 bottom_border"  /></td>
 </tr>
 <tr>
 <td>Amount of other Monthly Income and Source(s)</td><td></td>
 <td align="right" style="width:15%" >$<input type="text" style="width:120px;" name="other_income" value="<?php echo isset($info['other_income']) ? $info['other_income'] : "0.00"; ?>"  class="grossincome1 bottom_border"  /></td>
 </tr>
 <tr>
 <td></td><td><strong>TOTAL MONTHLY INCOME</strong></td>
 <td align="right" style="width:15%" >$<input type="text" style="width:120px;" name="other_monthly"  value="<?php echo $info['other_monthly']; ?>" id="totalincome1" /></td>
 </tr>

 </table>
 </span>


 </div>

 <h4 style="text-align:left;padding-top:8px;"><strong>SECTION B:</strong> Information Regarding Spouse, or Co-Applicant</h4>
<table><tr><td>
 <table border="1" bordercolor="#CCCCCC" class="main_width set_padding">
 <tr><td>LAST NAME <br/><input type="text" style="width:130px;" name="cobuyer_lname" value="<?php echo $info['cobuyer_lname']; ?>" /></td>
 <td>FIRST NAME<br/><input type="text" style="width:130px;" name="cobuyer_fname" value="<?php echo $info['cobuyer_fname']; ?>" /></td>
 <td>INITIAL<br/><input type="text" style="width:70px;" name="co_suffix" value="<?php echo $info['co_suffix']; ?>" /></td>
  <td>DOB<br/><input type="text" style="width:80px;" name="cobuyer_dob" value="<?php echo $info['cobuyer_dob']; ?>"  /></td>
  <td>DRIVER LICENSE#<br/><input type="text" style="width:140px;" name="cobuyer_licence" value="<?php echo $info['cobuyer_licence']; ?>" /></td>
   <td>SSN / TAX ID<br/><input type="text" style="width:120px;" name="cobuyer_ssn" value="<?php echo $info['cobuyer_ssn']; ?>" /></td>
    <td>Age of <br />Dependants<br/><input type="text" style="width:120px;" name="age_of_dependants" value="<?php echo $info['age_of_dependants']; ?>" /></td>
     <td><input type="radio" name="co_maritial_status" value="Married" <?php echo (isset($info['co_maritial_status'])&&$info['co_maritial_status']=='Married')?'checked="checked"':''; ?> /> &nbsp;Married<br/><input type="radio" name="co_maritial_status" value="Unmarried" <?php echo (isset($info['co_maritial_status'])&&$info['co_maritial_status']=='Unmarried')?'checked="checked"':''; ?> /> &nbsp;Unmarried<br/><input type="radio" name="co_maritial_status" value="Separated" <?php echo (isset($info['co_maritial_status'])&&$info['co_maritial_status']=='Separated')?'checked="checked"':''; ?> /> &nbsp;Separated</td>
 </tr>
 <tr><td colspan="2">Address<br/><input type="text" style="width:272px;" name="cobuyer_address" value="<?php echo $info['cobuyer_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="cobuyer_city" value="<?php echo $info['cobuyer_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="cobuyer_state" value="<?php echo $info['cobuyer_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="cobuyer_zip" value="<?php echo $info['cobuyer_zip']; ?>" /></td>
<td>Home Phone<br/><input type="text" style="width:120px;" name="cobuyer_phone" value="<?php echo $info['cobuyer_phone']; ?>" /></td>
<td colspan="2">HOW LONG AT ADDRESS?<br/><input type="text" style="width:100px;" name="cobuyer_residence_length" value="<?php echo $info['cobuyer_residence_length']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2" style="width:25%">PREVIOUS ADDRESSES (TO COVER 5 YRS RESIDENCE)<br/><input type="text" style="width:272px;" name="co_address" value="<?php echo $info['co_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="co_city" value="<?php echo $info['co_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="co_state" value="<?php echo $info['co_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="co_zip" value="<?php echo $info['co_zip']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="co_residence_length" value="<?php echo $info['co_residence_length']; ?>" /> YRS</td>
<td colspan="2">LIVED IN THE COMMUNITY?<br/><input type="text" style="width:100px;" name="co_in_community" value="<?php echo $info['co_in_community']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2"><input type="text" style="width:272px;" name="co_address2" value="<?php echo $info['co_address2']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="co_city2" value="<?php echo $info['co_city2']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="co_state2" value="<?php echo $info['co_state2']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="co_zip2" value="<?php echo $info['co_zip2']; ?>" /></td>
<td>How Long ?<br/>
<input type="text" style="width:70px;" name="co_residence_length2" value="<?php echo $info['co_residence_length2']; ?>" /> YRS</td>
<?php /*?><td colspan="2">LIVED IN THE COMMUNITY?<br/><input type="text" style="width:100px;" name="co_in_community2" value="<?php echo $info['co_in_community2']; ?>" /> YRS</td><?php */?>
<td valign="middle">
<input type="radio" name="house_rent2" value="Buy" <?php echo (isset($info['house_rent2'])&&$info['house_rent2']=='Buy')?'checked="checked"':''; ?> /> &nbsp;Buy &nbsp;&nbsp;&nbsp;<input type="radio" name="house_rent2" value="Rent" <?php echo (isset($info['house_rent2'])&&$info['house_rent2']=='Rent')?'checked="checked"':''; ?> /> &nbsp;Rent&nbsp;&nbsp;
&nbsp;<input type="radio" name="house_rent2" value="Own" <?php echo (isset($info['house_rent2'])&&$info['house_rent2']=='Own')?'checked="checked"':''; ?> /> &nbsp;Own
</td>
<td> Payment Amt. <br/>
<input type="text" style="width:102px;" name="rent_payment_amount2" value="<?php echo $info['rent_payment_amount2']; ?>" />
</td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER<br /><input type="text" style="width:272px;" name="cobuyer_employer" value="<?php echo $info['cobuyer_employer']; ?>" /></td>
<td colspan="2">OCCUPATION OR RANK<br /><input type="text" style="width:160px;" name="cobuyer_main_job" value="<?php echo $info['cobuyer_main_job']; ?>" /></td>
<td colspan="2">DEPARTMENT OR BADGE NO.<br /><input type="text" style="width:275px;" name="cobuyer_department" value="<?php echo $info['cobuyer_department']; ?>" /></td>
<td colspan="2">HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="cobuyer_job_length" value="<?php echo $info['cobuyer_job_length']; ?>" /> YRS</td>
</tr>
<tr><td colspan="2">PRESENT EMPLOYER'S ADDRESS<br /><input type="text" style="width:272px;" name="cobuyer_employer_address" value="<?php echo $info['cobuyer_employer_address']; ?>" /></td>
 <td>City<br/><input type="text" style="width:80px;" name="cobuyer_employer_city" value="<?php echo $info['cobuyer_employer_city']; ?>" /></td>
 <td>State<br/><input type="text" style="width:80px;" name="cobuyer_employer_state" value="<?php echo $info['cobuyer_employer_state']; ?>" /></td>
 <td>Zip<br/><input type="text" style="width:140px;" name="cobuyer_employer_zip" value="<?php echo $info['cobuyer_employer_zip']; ?>" /></td>
<td>Work Phone<br/>
<input type="text" style="width:120px;" name="cobuyer_work_phone" value="<?php echo $info['cobuyer_work_phone']; ?>" /></td>
<td colspan="2"></td>
</tr>
<tr>
<table bordercolor="#CCCCCC" border="1" class="main_width set_padding">
<tr><td style="width:25%">PREVIOUS EMPLOYMENT (TO COVER 5 YEAR HISTORY)<br /><input type="text" style="width:220px;" name="co_previous_employer" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="co_previous_employer_address" value="<?php echo $info['co_previous_employer_address']; ?>"  /></td>
<td>City<br /><input type="text" style="width:120px;" name="co_previous_employer_city" value="<?php echo $info['co_previous_employer_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:90px;" name="co_previous_employer_state" value="<?php echo $info['co_previous_employer_state']; ?>"  /></td>
<td>Zip<br /><input type="text" style="width:60px;" name="co_previous_employer_zip" value="<?php echo $info['co_previous_employer_zip']; ?>" /></td>
<td>Phone #<br /><input type="text" style="width:110px;" name="co_previous_employer_phone" value="<?php echo $info['co_previous_employer_phone']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="co_previous_employer_length" value="<?php echo $info['co_previous_employer_length']; ?>" /> YRS</td>
</tr>
<tr><td>&nbsp;<br /><input type="text" style="width:220px;" name="co_previous_employer2" value="<?php echo $info['co_previous_employer2']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="co_previous_employer_address2" value="<?php echo $info['co_previous_employer_address2']; ?>"  /></td>
<td>City<br /><input type="text" style="width:120px;" name="co_previous_employer_city2" value="<?php echo $info['co_previous_employer_city2']; ?>" /></td>
<td>State<br /><input type="text" style="width:90px;" name="co_previous_employer_state2" value="<?php echo $info['co_previous_employer_state2']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:60px;" name="co_previous_employer_zip2" value="<?php echo $info['co_previous_employer_zip2']; ?>" /></td>
<td>Phone #<br /><input type="text" style="width:110px;" name="co_previous_employer_phone2" value="<?php echo $info['co_previous_employer_phone2']; ?>" /></td>
<td>HOW LONG EMPLOYED?<br/><input type="text" style="width:100px;" name="co_previous_employer_length2" value="<?php echo $info['co_previous_employer_length2']; ?>" /> YRS</td>
</tr>
<tr><td style="width:25%">NEAREST RELATIVE NOT LIVING WITH YOU<br /><input type="text" style="width:220px;" name="co_ref_name" value="<?php echo $info['co_ref_name']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:157px;" name="co_ref_address" value="<?php echo $info['co_ref_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="co_ref_city" value="<?php echo $info['co_ref_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:90px;" name="co_ref_state" value="<?php echo $info['co_ref_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:60px;" name="co_ref_zip" value="<?php echo $info['co_ref_zip']; ?>" /></td>
<td>Phone #<br /><input type="text" style="width:110px;" name="co_ref_phone" value="<?php echo $info['co_ref_phone']; ?>" /></td>
<td>Relationship<br/><input type="text" style="width:120px;" name="co_ref_type" value="<?php echo $info['co_ref_type']; ?>" /></td>
</tr>

</table>
</tr>
 </table>
 </td></tr>
 </table>
 <div class="full zero_padding">
 <span class="full zero_padding">
 <strong>Income</strong>
 </span>
 <span class="full zero_padding">
 <table style="width:100%" class="mid_width no_padding">
 <tr>
 <td>Applicant's Gross Monthly Income from Employment</td><td></td>
 <td align="right" style="width:15%;">$<input type="text" style="width:120px;" name="cobuyer_income_monthly" value="<?php echo isset($info['cobuyer_income_monthly']) ? $info['cobuyer_income_monthly'] : "0.00"; ?>"   class="grossincome2 bottom_border"  /></td>
 </tr>

 <tr>
 <td>Alimony, Child Support, or separate Maintenance Income not to be revealed if you do not wish to have it considered as a basis for repaying this obligation</td><td></td>
 <td align="right" style="width:15%;">$<input type="text" style="width:120px;" name="cobuyer_monthly_mortgage" value="<?php echo isset($info['cobuyer_monthly_mortgage']) ? $info['cobuyer_monthly_mortgage'] : "0.00"; ?>"   class="grossincome2 bottom_border" /></td>
 </tr>

 <tr>
 <td>Alimony, Child Support, or separate Maintenance Income received under:<br />
  <input type="checkbox" name="court_order" value="yes" <?php echo (isset($info['court_order'])&&$info['court_order']=='yes')?'checked="checked"':''; ?> />&nbsp; Court Order&nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="written_agreement" value="yes" <?php echo (isset($info['written_agreement'])&&$info['written_agreement']=='yes')?'checked="checked"':''; ?> />&nbsp; Written Agreement&nbsp;&nbsp;&nbsp;
  <input type="checkbox" name="oral_understanding" value="yes" <?php echo (isset($info['oral_understanding'])&&$info['oral_understanding']=='yes')?'checked="checked"':''; ?> />&nbsp; Oral Understanding&nbsp;&nbsp;&nbsp;</td><td></td>
 <td align="right" style="width:15%;">$<input type="text" style="width:120px;" name="cobuyer_monthly_mortgage2" value="<?php echo isset($info['cobuyer_monthly_mortgage2']) ? $info['cobuyer_monthly_mortgage2'] : "0.00"; ?>"  class="grossincome2 bottom_border" /></td>
 </tr>

 <tr>
 <td>Amount of other Monthly Income and Source(s)</td><td></td>
 <td align="right" style="width:15%;">$<input type="text" style="width:120px;" name="cobuyer_other_income_monthly" value="<?php echo isset($info['cobuyer_other_income_monthly']) ? $info['cobuyer_other_income_monthly'] : "0.00"; ?>"   class="grossincome2 bottom_border"  /></td>
 </tr>
 <tr>
 <td></td>
 <td><strong>TOTAL MONTHLY INCOME</strong></td>
 <td align="right">$<input type="text" style="width:120px;" name="cobuyer_total_income_monthly" value="<?php echo $info['cobuyer_total_income_monthly']; ?>"   id="totalincome2" /></td>
 </tr>

 </table>
 </span>






 </div>

 <h4 style="text-align:left;padding-top:8px;"><strong>SECTION C:</strong> </h4><h4 style="text-align:left;padding-top:8px;"><strong>SECTION B:</strong> Information Regarding Spouse, or Co-Applicant</h4>
 <table  bordercolor="#CCCCCC" border="1" class="main_width set_padding">
 <tr><td>PERSONAL FRIENDS KNOWN OVER ONE YEAR<br />1. &nbsp;<input type="text" style="width:292px;" name="ref2_name" value="<?php echo $info['ref2_name']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:180px;" name="ref2_address" value="<?php echo $info['ref2_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="ref2_city" value="<?php echo $info['ref2_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="ref2_state" value="<?php echo $info['ref2_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="ref2_zip" value="<?php echo $info['ref2_zip']; ?>" /></td>
<td>Relationship<br/><input type="text" style="width:110px;" name="ref2_type" value="<?php echo $info['ref2_type']; ?>" /></td>
</tr>
<tr><td>&nbsp;<br />2. &nbsp;<input type="text" style="width:292px;" name="ref3_name" value="<?php echo $info['ref3_name']; ?>" /></td>
<td>Addres<br /><input type="text" style="width:180px;" name="ref3_address" value="<?php echo $info['ref3_address']; ?>" /></td>
<td>City<br /><input type="text" style="width:120px;" name="ref3_city" value="<?php echo $info['ref3_city']; ?>" /></td>
<td>State<br /><input type="text" style="width:120px;" name="ref3_state" value="<?php echo $info['ref3_state']; ?>" /></td>
<td>Zip<br /><input type="text" style="width:80px;" name="ref3_zip" value="<?php echo $info['ref3_zip']; ?>" /></td>
<td>Relationship<br/><input type="text" style="width:110px;" name="ref3_type" value="<?php echo $info['ref3_type']; ?>" /></td>
</tr>
 </table>
 <span class="full">The undersigned, (1) make the above representations, which are certified to be correct, for the purpose of securing credit; (2) authorize financial institutions to obtain consumer credit reports on me periodically and to gather employment history as they consider necessary and appropriate; (3) authorize your affiliates to obtain consumer credit reports on me; (4) understands that we, or any financial institution to whom this application is submitted,will retain this application whether or not it is approved, and that it is the applicant's responsibility to notify the creditor of any change of name, addreess, or employment; (5) unless the circle that follows is marked, I authorize the Dealer and any assignee or other person to whom this application is submitted to share and use information about me, including information in my application, with other entities that are related to them by common ownership or affiliated with them by common control. If the circle is marked, I direct the dealer and any assignee or other person to whom this application is submitted not to give information to such entities (other than information on their own transactions and experiences).<br/>
The financial instution named below may be requested to purchase a sales finance contractwritten, or to be written, with your purchase. You are notified pursuant to the Fair Credit Reporting Act that your application may be
submitted to them. I acknowledge that I have received the privacy policy provided by Del Amo Motorsports.
 </span>



         <span class="span60" style="width:48%">
         PURCHASER HEREBY ACKNOWLEDGES RECEIPT OF A COPY OF THIS CREDIT STATEMENT<br />
         <input type="text" class="bottom_border" style="width:99%" /><br/>
         APPLICANT'S SIGNATURE

         </span>
          <span class="span60" style="width:48%">
         CO-APPLICANT'S SIGNATURE MEANS YOU INTEND TO APPLY FOR JOINT CREDIT<br />
         <input type="text" class="bottom_border" style="width:99%" /><br/>
         CO-APPLICANT'S SIGNATURE

         </span>
		<!---left1-->

        <p align="center" style="padding-top:10px;">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	</div>
