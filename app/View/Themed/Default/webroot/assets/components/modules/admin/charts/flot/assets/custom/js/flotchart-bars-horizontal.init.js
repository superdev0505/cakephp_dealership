function dealerGraph(rawData,ticks,gLabel,gDivId){
	//var rawData = [[1582.3, 0], [28.95, 1],[1603, 2],[774, 3],[1245, 4], [85, 5],[1025, 6]];
        var dataSet = [{ label: gLabel, data: rawData }];
        //var ticks = [[0, "Gold"], [1, "Silver"], [2, "Platinum"], [3, "Palldium"], [4, "Rhodium"], [5, "Ruthenium"], [6, "Iridium"]];
 
        var options = {
            series: {
                bars: {
                    show: true
                }
            },
            bars: {
                align: "center",
                barWidth: 0.2,
                horizontal: true,
				
              	
            },
            xaxis: {
                axisLabel: "Lead Count",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 10,
               
                tickColor: "#5E5E5E",
                color: "black"
            },

         yaxis: {
				show: true,
				/*axisLabel: "Lead Steps",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Verdana, Arial',
                axisLabelPadding: 5,*/
				//tickLength:0,
				autoscaleMargin:0.01,
               	tickColor: "#5E5E5E",
			   	tickSize:0,
				min:0,
               	ticks: ticks,			
                color: "black",
				
            },
            legend: { position: "ne", backgroundColor: null, backgroundOpacity: 0 },
            grid: {
				  show: true,
			    //aboveData: true,
			    color: "#3f3f3f" ,
			    //labelMargin: 5,
			   // axisMargin: 0, 
			   //// borderWidth: 0,
			    borderColor:null,
			    //minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    //autoHighlight: false,
			   // mouseActiveRadius: 20,
                
                backgroundColor: { colors: ["#FFFFFF", "#FFFFFF"] }


			}, 
			colors: [],
	        
        };
 
       
           
      
 
        var previousPoint = null, previousLabel = null;
 
        $.fn.UseTooltip = function () {
            $(this).bind("plothover", function (event, pos, item) {
                if (item) {
                    if ((previousLabel != item.series.label) ||
                 (previousPoint != item.dataIndex)) {
                        previousPoint = item.dataIndex;
                        previousLabel = item.series.label;
                        $("#tooltip").remove();
 
                        var x = item.datapoint[0];
                        var y = item.datapoint[1];
 
                        var color = item.series.color;
						
                        //alert(color)
                       	//console.log(y);               
 							
                        showTooltip(item.pageX,
                        item.pageY,
                        color,
                        "<strong>" + item.series.label + "</strong><br>" + item.series.yaxis.ticks[y].label +
                        " : <strong>" + x + "</strong>");
                    }
                } else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        };
 
        function showTooltip(x, y, color, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y - 10,
                left: x + 10,
                border: '2px solid ' + color,
                padding: '3px',
                'font-size': '9px',
                'border-radius': '5px',
                'background-color': '#fff',
                'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                opacity: 0.9
            }).appendTo("body").fadeIn(200);
        }
	 $.plot($(gDivId), dataSet, options);
     $(gDivId).UseTooltip();
}
//www.jqueryflottutorial.com/how-to-make-jquery-flot-horizontal-bar-chart.html#0hhEAS5jbh8DOsuD.99




/*(function($)
{
	if (typeof charts == 'undefined') 
		return;

	charts.chart_horizontal_bars = 
	{
		// chart data
		data: null,

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			grid: {
				show: true,
			    aboveData: false,
			    color: "#3f3f3f" ,
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: false,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: {active:false},
		        bars: {
		        	show:true,
					horizontal: true,
					barWidth:0.2,
					fill:1
				}
	        },
	        legend: { position: "ne", backgroundColor: null, backgroundOpacity: 0 },
	        colors: [],
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.0",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			}
		},
		
		placeholder: "#chart_horizontal_bars",
		
		// initialize
		init: function()
		{
			// apply styling
			charts.utility.applyStyle(this);
			
			var d1 = [];
		    for (var i = 0; i <= 5; i += 1)
		        d1.push([parseInt(Math.random() * 30),i ]);

		    var d2 = [];
		    for (var i = 0; i <= 5; i += 1)
		        d2.push([parseInt(Math.random() * 30),i ]);

		    var d3 = [];
		    for (var i = 0; i <= 5; i += 1)
		        d3.push([ parseInt(Math.random() * 30),i]);

		    this.data = new Array();
		    this.data.push({
		        data: d1,
		        bars: {
		            horizontal:true, 
		            show: true, 
		            barWidth: 0.2, 
		            order: 1
		        }
		    });
			this.data.push({
			    data: d2,
			    bars: {
			        horizontal:true, 
			        show: true, 
			        barWidth: 0.2, 
			        order: 2
			    }
			});
			this.data.push({
			    data: d3,
			    bars: {
			        horizontal:true, 
			        show: true, 
			        barWidth: 0.2, 
			        order: 3
			    }
			});

			this.plot = $.plot($(this.placeholder), this.data, this.options);
		}
	};

	charts.chart_horizontal_bars.init();
})(jQuery);*/