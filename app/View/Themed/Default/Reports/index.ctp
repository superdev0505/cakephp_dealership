<style>
.piechart-drop-head {
	font-family: sans-serif;
	color: #2c2c2c;
	font-size: 14px;
	font-weight: bold;
	margin: 0 0 0 40px;
}
.piechart-drop {
	 display: inline-block;
	 width:300px;height:300;
	 text-align: center;
	 margin-top: 10px;
}
.pietable{
	width: 665px;
   margin: 0 0 0 10px;
   border: 3px solid #2c2c2c;
}
.show-piechart {
	display: inline-block;
	width:300px;
	height:300px;
}
</style>
<div align="center">
</br>
&nbsp;&nbsp;&nbsp; <a class="btn btn-success btn" disabled href="/reports">Drop-Down Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-success btn" href="/reports2">Unit Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" href="/reports3">Lead Stats</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" href="/reports4">Events Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" href="/reports5">Eblast Graphs</a>
</br>
</br>
<table class="pietable">
<tr bgcolor="#ffffff" >
<td style="border-right: 1px solid;">
<div class="piechart-drop-head">Select Drop-Downs Graphs</div>
<div  class="piechart-drop"> 
<select name="piecharts">
<option value="getLeadsPieData" selected>Leads Type (ALL)</option>
<option value="getStatusPieData">Leads Status (Top 5)</option>
<option value="getSourcePieData">Leads Source (Top 5)</option>
<option value="getBuyingTimePieData">Buying Time (Top 5)</option>
<option value="getGenderPieData">Gender (ALL)</option>
<option value="getBestTimePieData">Best Time (ALL)</option>
<option value="getStepsPieData">Sales Steps (Top 5)</option>
<option value="getLeadStatusPieData">Logs Open / Closed (ALL)</option>
</select>
</div>
<td>
<td><div id="leads_piechart" class="show-piechart"> </div></td>

</tr>

</table>
<script type="text/javascript">
$(function () {
    
	$('select').on('change', function() {
			 showpiechart( this.value ); // or $(this).val()
	});



function showpiechart(url){


	var newdata = [];
	var dataPath = "<?php echo $this->webroot ?>reports/"+url;
	

  jQuery.get(dataPath, function(data) {
       var glacier = JSON.parse(data);
	              var data = [];
		          var i = 0;
                     $.each(glacier[0], function(s, t) {
						    data[i] = { label: '"'+t[0]+'"', data:t[1]};
							         i++;
		
		          });

				  // GRAPH 5
	$.plot($("#leads_piechart"), data, 
	{
		series: {
			pie: { 
				show: true,
				radius: 3/4,
				label: {
					show: true,
					radius: 3/4,
					
					background: { 
						opacity: 0.5,
						color: '#000'
					}
				}
			}
		},
		legend: {
			show: false
		}
	});
				  
    
     
	   
});



}
 showpiechart("getLeadsPieData");
});



</script>
	


</div>