<div align="center">
</br>
&nbsp;&nbsp;&nbsp; <a class="btn btn-success btn" href="/reports">Drop-Down Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-success btn" href="/reports2">Unit Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" disabled href="/reports3">Lead Stats</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" href="/reports4">Events Graphs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn" href="/reports5">Eblast Graphs</a>
</br>
<?php
echo $this->Html->script('jqplot/jquery.jqplot.min');
echo $this->Html->script('jqplot/plugins/jqplot.highlighter.min');
echo $this->Html->script('jqplot/plugins/jqplot.cursor.min');
echo $this->Html->script('jqplot/plugins/jqplot.dateAxisRenderer.min');
echo $this->Html->script('jqplot/plugins/jqplot.pieRenderer.min');
echo $this->Html->script('jqplot/plugins/jqplot.donutRenderer.min');
?>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>theme/Default/js/jqplot/jquery.jqplot.min.css"/>
<br/>
<table align="center" width="1000px" border="4">
<tr>
<td><h4>All Lead Stats</h4>
</td>
</tr>
<tr align="center" bgcolor="#ffffff" >
<td><div id="leads_overview" style="display: inline-block;width: 900px;"></div></td>
</tr>
<tr>
<td><h4>Showroom Stats</h4>
</td>
</tr>
<tr>
<td><div> </div></td>
</tr>
<tr>
<td><h4>Phone Stats</h4>
</td>
</tr>
<tr>
<td><div> </div></td>
</tr>
<tr>
<td><h4>Web Lead Stats</h4>
</td>
</tr>
<tr>
<td><div> </div></td>
</tr>
</table>
</div>
<br/>
<div> 
</div>
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
        // The url for our json data
        var all_leads = "<?php echo $this->webroot ?>reports3/getMainLeads";
        var plot2 = $.jqplot('leads_overview', all_leads, {
            title: "All Leads",
            dataRenderer: ajaxDataRenderer,
            axes: {
                xaxis: {
                    renderer: $.jqplot.DateAxisRenderer,
                    tickOptions: {
                        formatString: '%b&nbsp;%#d'
                    },
                    label: "Date Created"
                },
                yaxis: {
                    min: 0,
                    //tickInterval: 1,
                    label: "Number of leads"
                }
            },
            highlighter: {
                show: true,
                sizeAdjust: 7.5
            },
            cursor: {
                show: false
            },
            dataRendererOptions: {
                unusedOptionalUrl: all_leads,
                showDataLabels: true
            }
        });
        //PIE Chart
        var data = "<?php echo $this->webroot ?>reports/getLeadsPieData";
        var plot1 = jQuery.jqplot('leads_piechart', [data],
                {
                    title: "Leads Distribution",
                    dataRenderer: ajaxDataRenderer,
                    seriesDefaults: {
                        // Make this a pie chart.
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: {
                            // Put data labels on the pie slices.
                            // By default, labels show the percentage of the slice.
                            showDataLabels: true
                        }
                    },
                    legend: {show: true, location: 'e'}
                }
        );
    });
</script>
</div>