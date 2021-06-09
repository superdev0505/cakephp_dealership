<div align="center">
</br>
&nbsp;&nbsp;&nbsp; <a class="btn btn-success btn" href="/reports">Drop-Down Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-success btn" href="/reports2">Unit Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" href="/reports3">Lead Stats</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" disabled href="/reports4">Events Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" href="/reports5">Eblast Graphs</a>
</br>
</br>
<table width="1200px" border="3">
<tr bgcolor="#ffffff" >
<td><div id="event_status_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
<td><div id="status_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
<td><div id="source_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
<td><div id="buying_time_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
</tr>
<tr bgcolor="#ffffff" >
<td><div id="gender_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
<td><div id="best_time_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
<td><div id="type_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
<td><div id="type_trade_piechart" style="display: inline-block;width:300px;height:300;"> </div></td>
</tr>
</table>

<script>
$(document).ready(function() {
var ajaxDataRenderer = function(url, plot, options) {
var ret = null;
$.ajax({
async: false,
url: url,
dataType: "json",
success: function(data) {
console.log(data);
ret = data;
}
});
return ret;
};

//Leads Type PIE Chart
var event_status_data = "<?php echo $this->webroot ?>reports/getEventStatusPieData";

var event_status_plot1 = jQuery.jqplot('event_status_piechart', [event_status_data],
{
title: "Event Status (ALL)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);

//Status PIE Chart
var status_data = "<?php echo $this->webroot ?>reports/getStatusPieData";

var status_plot = jQuery.jqplot('status_piechart', [status_data],
{
title: "Leads Status (Top 5)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);
// Source PIE Chart
var source_data = "<?php echo $this->webroot ?>reports/getSourcePieData";

var source_plot = jQuery.jqplot('source_piechart', [source_data],
{
title: "Leads Source (Top 5)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);
//Buying Time PIE Chart
var buying_time_data = "<?php echo $this->webroot ?>reports/getBuyingTimePieData";

var buying_time_plot = jQuery.jqplot('buying_time_piechart', [buying_time_data],
{
title: "Buying Time (Top 5)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);

//Gender PIE Chart
var gender_data = "<?php echo $this->webroot ?>reports/getGenderPieData";

var gender_plot = jQuery.jqplot('gender_piechart', [gender_data],
{
title: "Gender (ALL)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);

//Best Time PIE Chart
var best_time_data = "<?php echo $this->webroot ?>reports/getBestTimePieData";

var best_time_plot = jQuery.jqplot('best_time_piechart', [best_time_data],
{
title: "Best Time (ALL)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);

//Unit Type PIE Chart
var type_data = "<?php echo $this->webroot ?>reports/getTypePieData";

var type_plot = jQuery.jqplot('type_piechart', [type_data],
{
title: "Unit Type (Top 5)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);

//Used Unit Type PIE Chart
var type_trade_data = "<?php echo $this->webroot ?>reports/getTypeTradePieData";

var type_trade_plot = jQuery.jqplot('type_trade_piechart', [type_trade_data],
{
title: "Used Unit Type (Top 5)",
dataRenderer: ajaxDataRenderer,
seriesDefaults: {
renderer: jQuery.jqplot.PieRenderer,
rendererOptions: {
showDataLabels: true
}
},
legend: {show: true, location: 'e'}
}
);

});

</script>
</div>
