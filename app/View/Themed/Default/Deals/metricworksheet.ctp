<!DOCTYPE html>
<html lang="en" type="text/html">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>FORM</title>
<style>
/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
}

body {
	font-family:"Arial";
}

a {
	text-decoration:none;
	color:inherit;
}

input{
    border: 1px solid #aaa;
    padding: 5px 0;
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
.two-three {
	float: left;
	margin: 0 0.5%;
	padding: 10px 10px;
	position: relative;
	box-sizing: border-box;
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
	width:1024px;
	background:#ddd;
	padding: 0 10px;
	margin:20px auto;
	border-radius: 7px;
}

.wraper.main input {
	padding: 5px;
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

.left1,.right1{
    width: 49.69%;
    border: 1px solid #aaa;
    padding: 4px;
    display: inline-block;
	margin:10px 0;
}
.input35 {
    width: 35%;
}
.span24 {
    width: 24%;
    display: inline-block;
}

.input71 {
    width: 71%;
}

.input33 {
    width: 31.4%;
}

.separator1 {
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
    padding: 191px 0 7px 0;
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
</style>
</head><body>


<div class="wraper main">
<form action="" method="post">

<div class="wraper-section clear">
<div class="top-three">
  <p class="left-margin date">Date	12/02/2014</p>
	<p class="left-margin sub-title red">SALE PERSON</p>
	<div class="select-person">
	<select>
	<option>Select Value</option>
	<option value="value1">Value1</option>
	<option value="value2">Value2</option>
	<option value="valueX">Value(x)</option>
	</select>
	</div><!--select-person-->
</div>

<div class="top-three">
	<p class="sub-title" style="margin:0 0 31px 0;">WORK SHEET</p>
</div>

<div class="top-three">
	<p class="left-margin sub-title">FLOOR MANAGER</p>
	<div class="select-person">
	<select>
	<option>Select Value</option>
	<option value="value1">Value1</option>
	<option value="value2">Value2</option>
	<option value="valueX">Value(x)</option>
	</select>
	</div>
</div>

<div class="have-border three">
	<span class="condition-text">Condition</span>
	<select class="select condition">
		<option >Select Value</option>
		<option value="value1">Value1</option>
		<option value="value2">Value2</option>
		<option value="valueX">Value(x)</option>
	</select>
	<button type="button" name="" class="lookup">Lookup</button>
	<input type="text" name="" placeholder="YEAR" class="condition-input"/>
	<input type="text" name="" placeholder="MAKE" class="condition-input"/>
	<input type="text" name="" placeholder="MODEL" class="condition-input"/>
	<input type="text" name="" placeholder="COLOR" class="condition-input"/>
	<input type="text" name="" placeholder="MILEAGE" class="condition-input"/>
	<input type="number" name="" placeholder="STOCK" class="condition-input"/>
	<hr/>

		<div class="salesection">
			<span>Sale Price $</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:65%;">
			<option >Accy's & Install</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:65%;">
			<option >Destination</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<input type="text" name="" placeholder="$"/><hr/>
		
			<span>Assembly/PDI</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:30%;">
			<option>select</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<span style="width:34%;">Doc/Lic/Reg</span>
			<input type="text" name="" style="width:30%;" placeholder="$"/><hr/>

			<span>Tax @ 7.8%</span>
			<input type="number" name="" placeholder="$"/><hr/>

			<span>Subtotal</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Trade</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Tax Credit</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Difference</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>+Payoff Of</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Final Total</span>
			<input type="number" name="" placeholder="$"/>
		</div><!--Sale Section-->
		</div><!--Left-row-->




		<div class="have-border three">
			<span class="condition-text">Condition</span>
			<select class="select condition">
				<option >Select Value</option>
				<option value="value1">Value1</option>
				<option value="value2">Value2</option>
				<option value="valueX">Value(x)</option>
			</select>&nbsp;
			<input type="text" name="" placeholder="YEAR" class="condition-input"/>
			<input type="text" name="" placeholder="MAKE" class="condition-input"/>
			<input type="text" name="" placeholder="MODEL" class="condition-input"/>
			<input type="text" name="" placeholder="COLOR" class="condition-input"/>
			<input type="text" name="" placeholder="MILEAGE" class="condition-input"/>
			<input type="number" name="" placeholder="STOCK" class="condition-input"/>
			<hr/>

		<div class="salesection">
			<span>Sale Price $</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:65%;">
			<option >Accy's & Install</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:65%;">
			<option >Destination</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<input type="text" name="" placeholder="$"/><hr/>
		
			<span>Assembly/PDI</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:30%;">
			<option>select</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<span style="width:34%;">Doc/Lic/Reg</span>
			<input type="text" name="" style="width:30%;" placeholder="$"/><hr/>

			<span>Tax @ 7.8%</span>
			<input type="number" name="" placeholder="$"/><hr/>

			<span>Subtotal</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Trade</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Tax Credit</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Difference</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>+Payoff Of</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Final Total</span>
			<input type="number" name="" placeholder="$"/>
		</div><!--Sale Section-->
		</div><!--Middle-row-->

		<div class="have-border three">
			<span class="condition-text">Condition</span>
			<select class="select condition">
			<option >Select Value</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<button type="button" name="" style="visibility:hidden;">Lookup</button>
			<input type="text" name="" placeholder="YEAR" class="condition-input"/>
			<input type="text" name="" placeholder="MAKE" class="condition-input"/>
			<input type="text" name="" placeholder="MODEL" class="condition-input"/>
			<input type="text" name="" placeholder="COLOR" class="condition-input"/>
			<input type="text" name="" placeholder="MILEAGE" class="condition-input"/>
			<input type="number" name="" placeholder="STOCK" class="condition-input"/>
			<hr/>

		<div class="salesection">
			<span>Sale Price $</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:65%;">
			<option >Accy's & Install</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:65%;">
			<option >Destination</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<input type="text" name="" placeholder="$"/><hr/>
		
			<span>Assembly/PDI</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<select style="width:30%;">
			<option>select</option>
			<option value="value1">Value1</option>
			<option value="value2">Value2</option>
			<option value="valueX">Value(x)</option>
			</select>
			<span style="width:34%;">Doc/Lic/Reg</span>
			<input type="text" name="" style="width:30%;" placeholder="$"/><hr/>

			<span>Tax @ 7.8%</span>
			<input type="number" name="" placeholder="$"/><hr/>

			<span>Subtotal</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Trade</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Tax Credit</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Difference</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>+Payoff Of</span>
			<input type="text" name="" placeholder="$"/><hr/>

			<span>Final Total</span>
			<input type="number" name="" placeholder="$"/>
		</div><!--Sale Section-->
		</div><!--Right-row-->
	</div><!--wrapper Header-->


<div class="wraper-section clear">

<div class="have-border two-three">
  <p style="text-align:center;margin:0 0 10px 0;">TRADE INFORMATION</p>
  <input type="text" name="" placeholder="Year" class="col1"/>
  <input type="text" name="" placeholder="Make" class="col2"/>
  <input type="text" name="" placeholder="Model" class="col3"/>
  <input type="number" name="" placeholder="VIN # (Must be 17 Digits)" class="col4"/>
  <hr/>
  <input type="text" name="" placeholder="Color" class="col1"/>
  <input type="text" name="" placeholder="Mileage" class="col2"/>
  <input type="text" name="" placeholder="Payoff Amount" class="col3"/>
  <input type="text" name="" placeholder="Bank Name" class="col4"/>
</div>

<div class="three">
  <p style="text-align:center;">METHOD PAYMENT</p>
  <select style="width:95%;">
		<option>select</option>
		<option value="value1">Value1</option>
		<option value="value2">Value2</option>
		<option value="valueX">Value(x)</option>
  </select>
</div>

</div>

<div class="wraper-section clear">

<div class="detail-left three">
<p>
IF FINANCING, PURCHASER AUTHORIZES DEALER TO VERIFY THIS DATA WITH CREDIT BUREAU & ACKNOWLEDGES VIEWING THIS WORKSHEET.
<br>
<br>
<br>X
<hr>
</p>


<p>
IF PAYING BY ANOTHER MEANS, I HEREBY ACKNOWLEDGES VIEWING THIS WORKSHEET.
<br>
<br>
<br>X
<hr>
</p>

</div>

<div class="detail-right have-border two-three">
<p>Name</p>
  <input type="text" name="" placeholder="First" class="col2"/>&nbsp; &nbsp;
  <input type="text" name="" placeholder="Last" class="col2"/><hr/>

  <input type="text" name="" placeholder="Address" class="col1"/><hr/>

  <input type="text" name="" placeholder="CITY" class="col3"/>
  <select class="col3">
	<option>STATE</option>
	<option value="value1">Value1</option>
	<option value="value2">Value2</option>
	<option value="valueX">Value(x)</option>
  </select>

  <input type="text" name="" placeholder="ZIP" class="col3"/><hr/>

  <input type="text" name="" placeholder="DAY TIME CONTACT # " class="col2"/>&nbsp; &nbsp;
  <input type="text" name="" placeholder="SOCIAL SECURITY" class="col2"/><hr/>

  <input type="text" name="" placeholder="CELL/PAGER/HOME #" class="col2"/>&nbsp; &nbsp;
  <input type="text" name="" placeholder="DATE OF BIRTH" class="col2"/><hr/>
  
  <input type="text" name="" placeholder="EMAIL ADDRESS" class="col1"/>
</div><!--Detail right-->

</div><!--Detail-->

<div class="wraper-section clear foot">
<button type="button">SUBMIT</button>
<button type="button">Back</button>
<button type="button">Clear Screen</button>
</div><!--wrapper footer-->

</form>

</div>


</body></html>
