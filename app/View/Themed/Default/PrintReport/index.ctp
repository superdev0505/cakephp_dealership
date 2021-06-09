<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>
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
	width:1048px;
	background:#fff;
	padding: 0 10px;
	margin:0px auto;
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
    width: 48%;
    border: 1px solid #aaa;
    padding: 3px;
    display: inline-block;
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

th, td{
	padding: 10px;
}
table, th, td
{
  border-collapse:collapse;
  border: 1px solid black;
  text-align:left;
}


</style>
    </head>
    <body>

<?php 
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

?>
<h2><?php echo $userinfo['dealer']; ?></h2> <br>
<div class='text-primary'>
	<?php echo $report_type;?> (<?php echo $today;?>)  <br><br>
</div>

<?php if($this->request->query['report_type'] == 'dormant_48_box' || $this->request->query['report_type'] ==  'pending_month_box'){ ?>


	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >

					<th>Ref No.</th>
					<th>Created Date</th>
					<th>Updated Date</th>
					<th>Next Activity</th>
					<th>Sales Person</th>
					<th>Full Name</th>
					<th>Phone#</th>
					<th>Vehicle</th>
					<th>Log Type</th>
					<th>Sale Step</th>
					<th>Open/Close</th>
					<th>Status</th>

		</tr>
		</thead>
		<tbody>
			<?php foreach($contacts as $details) { ?>
			<tr class="gradeA">
				<td><?php echo $details['Contact']['id'];?></td>
						<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['created']));?></td>
						<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['modified']));?></td>
						<td>
							<?php 
							if($details['Event']['start']  != ''){
								echo date("F j, Y h:i A",  strtotime( $details['Event']['start'] )  ); 
							}
							

							?>
						</td>
						<td><?php echo $details['Contact']['sperson'];?></td>
						<td>
							<?php echo $details['Contact']['first_name'];?>
							<?php echo $details['Contact']['m_name'];?>
							<?php echo $details['Contact']['last_name'];?>
						 </td>
						<td>
							<?php echo format_phone(  $details['Contact']['mobile']) ;?>, 
							<?php echo format_phone(  $details['Contact']['phone']) ;?>
						</td>
						<td>
							<?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'] ;?>
						</td>
						<td><?php echo $ContactStatus[$details['Contact']['contact_status_id']];?></td>
						<td><?php echo  $sales_steps[$details['Contact']['sales_step']];?></td>
						<td><?php echo $details['Contact']['lead_status'];?></td>
						<td><?php echo $details['Contact']['status'];?></td>
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>


<?php } else if($this->request->query['report_type'] == 'overdue_event_box' || $this->request->query['report_type'] == 'today_event_box'){ ?>



	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >

					<th>Ref No.</th>
					<th>Created Date</th>
					<th>Updated Date</th>
					<th>Next Activity</th>
					<th>Sales Person</th>
					<th>Full Name</th>
					<th>Phone#</th>
					<th>Vehicle</th>
					<th>Log Type</th>
					<th>Sale Step</th>
					<th>Open/Close</th>
					<th>Status</th>

		</tr>
		</thead>
		<tbody>
			<?php foreach($events as $details) { ?>
			<tr class="gradeA">
				<td><?php echo $details['Contact']['id'];?></td>
						<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['created']));?></td>
						<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['modified']));?></td>
						<td>
							<?php echo date("F j, Y h:i A",  strtotime( $details['Event']['start'] )  ); ?>
						</td>
						<td><?php echo $details['Contact']['sperson'];?></td>
						<td>
							<?php echo $details['Contact']['first_name'];?>
							<?php echo $details['Contact']['m_name'];?>
							<?php echo $details['Contact']['last_name'];?>
						 </td>
						<td>
							<?php echo ($details['Contact']['mobile'] != '')?   format_phone(  $details['Contact']['mobile']) : "" ;?><br> 
							<?php echo ($details['Contact']['phone'] != '')? format_phone(  $details['Contact']['phone']) : "" ;?>
						</td>
						<td>
							<?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'] ;?>
						</td>
						<td><?php echo $ContactStatus[$details['Contact']['contact_status_id']];?></td>
						<td><?php echo  $sales_steps[$details['Contact']['sales_step']];?></td>
						<td><?php echo $details['Contact']['lead_status'];?></td>
						<td><?php echo $details['Contact']['status'];?></td>
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>

		
<?php } ?>




</body>
</html>














