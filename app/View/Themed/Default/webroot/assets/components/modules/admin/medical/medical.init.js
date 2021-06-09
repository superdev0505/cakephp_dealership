function allCharts(url1,url2)
{
	if (typeof charts == 'undefined') 
		return;

	charts.metricsDrawHook = function (plot, canvascontext)
	{ 
		var t = $('#metrics table');
		
		if (!t.length)
			return;

		if (t.length && t.is('.metricsDrawHook'))
			return;

		t.addClass('metricsDrawHook');
		t.find('tr').append('<td class="legendSelect"><input type="checkbox" checked="checked"></td>');
	}

	
	$.ajax({
		type: "GET",
		cache: false,
		url: url1,
		success: function(data){
			$("#transactions_value").html(data);
		}
	});

	
	
	
	$.ajax({
		type: "GET",
		cache: false,
		dataType: 'JSON',
		url:  url2,
		success: function(json_data){
			
			
					//chart start

	charts.chart_metrics = 
	{
		// chart data
		data: 
		{
			d: []
		},

		// will hold the chart object
		plot: null,

		// chart options
		options: 
		{
			grid: {
				show: true,
			    aboveData: true,
			    color: "#3f3f3f",
			    labelMargin: 5,
			    axisMargin: 0, 
			    borderWidth: 0,
			    borderColor:null,
			    minBorderMargin: 5 ,
			    clickable: true, 
			    hoverable: true,
			    autoHighlight: true,
			    mouseActiveRadius: 20,
			    backgroundColor : { }
			},
	        series: {
	        	grow: { active:true, duration: 200 },
	            lines: {
            		show: true,
            		fill: .07,
            		lineWidth: 2
            	},
	            points: {show:false}
	        },
	        legend: { 
	        	backgroundColor: null, 
	        	backgroundOpacity: 0, 
	        	container: $('#metrics'),
	        	labelFormatter: function(label, series) {
		        	return '<a href="#" data-toggle="charts-metrics-toggle" data-series-idx="' + series.idx + '">' + label + '</a>';
		        }
	        },
	        yaxis: { min: 0 },
	        xaxis: {ticks:11, tickDecimals: 0},
	        colors: [],
	        shadowSize:1,
	        tooltip: true,
			tooltipOpts: {
				content: "%s : %y.0",
				shifts: {
					x: -30,
					y: -50
				},
				defaultTheme: false
			},
			hooks: { draw: [charts.metricsDrawHook] }
		},

		placeholder: "#chart_metrics",

		toggle: function(id)
		{
			var d = this.plot.getData(),
				show = d[id].grow.growings[0].stepDirection == 'down',
				nd = [];

			if (show)
			{
				d[id].grow.growings[0].stepDirection = 'up';
				d[id].data = this.data.d[id];
			}
			else
			{
				var max = d[id].data.length;
				d[id].data = [];

				for (var i=1;i<=max;i++)
					d[id].data.push([i, 0]);

				d[id].grow.growings[0].stepDirection = 'down';
			}

		  	this.plot.setData(d);
		  	this.plot.draw();
		},

		changeData: function(){
			/*
			var d = this.plot.getData(),
				that = this;
			this.data.d = [];

			// generate some data
			for (var i=0;i<=5;i++)
			{
				this.data.d.push([]);
				for (var j=1;j<=30;j++)
					this.data.d[i].push([j, ((6-i)*10)+charts.utility.randNum()]);
			}

			$.each(d, function(index, value){
				var a = $('[data-series-idx="'+index+'"]'),
					c = a.closest('tr').find(':checked').length;

				d[index].data = c ? that.data.d[index] : [];
			});
			this.plot.setData(d);
		  	this.plot.draw();
			*/
		},
		
		// initialize
		init: function()
		{
			if (!$(this.placeholder).length)
				return;

			var that = this;

			$('body')
			.on('click', '[data-toggle="charts-metrics-toggle"]', function(e)
			{
				e.preventDefault();
				//charts.chart_metrics.toggle($(this).attr('data-series-idx'));
				$("#transactions_value").html("");
				$.ajax({
					type: "GET",
					cache: false,
					url:  "/reports5/lead_unit_value/"+$(this).attr('data-series-idx'),
					success: function(data){
						$("#transactions_value").html(data);
					}
				});
			})
			.on('change', '.legendSelect :checkbox', function(){
				var idx = $(this).closest('tr').find('[data-toggle="charts-metrics-toggle"]').attr('data-series-idx');
				charts.chart_metrics.toggle(idx);
			})
			.on('click', '#metrics table tr', function(e){
				if ($(e.target).is('a') || $(e.target).is(':checkbox'))
					return;

				var c = $(this).find(':checkbox');
				c.prop('checked', !c.prop('checked')).trigger('change');
			})
			.on('click', '[data-toggle="charts-metrics-changedata"] .btn', function(){
				if ($(this).is('.active')) return;
				$('[data-toggle="charts-metrics-changedata"] .btn.active').removeClass('active');
				$(this).addClass('active');
				charts.chart_metrics.changeData();
			});
			
			
			if (!Modernizr.touch)
				$(this.placeholder).height($(this.placeholder).closest('.col-app').height() - 30);

			// apply styling
			this.options.colors = ["#b7cc66", primaryColor, "#cc6666",  "#cca366"  , "#7acc66", "#66cccc"];
			this.options.grid.backgroundColor = { colors: ["transparent", "transparent"]};
			this.options.grid.borderColor = primaryColor;
			this.options.grid.color = primaryColor;
			
			/*
			// generate some data
			for (var i=0;i<=5;i++)
			{
				this.data.d.push([]);
				for (var j=1;j<=30;j++)
					this.data.d[i].push([j, ((6-i)*10)+charts.utility.randNum()]);
			}
			*/
			//console.log(this.data.d);	
			console.log(json_data);	
			this.data.d = json_data;
			
			// make chart
			this.plot = $.plot(
				this.placeholder, 
				[{
         			label: "Sold Unit Value", 
         			data: this.data.d[0],
         			idx: 0,
         			grow: { growings:[ { stepMode: "linear" } ] }
         		}, 
         		{
         			label: "Open Leads Value", 
         			data: this.data.d[1],
         			idx: 1
         		},
         		{
         			label: "Closed Leads Value", 
         			data: this.data.d[2],
         			idx: 2
         		},
         		{
         			label: "Web Leads value", 
         			data: this.data.d[3],
         			idx: 3
         		},
         		{
         			label: "Showroom Value",
         			data: this.data.d[4],
         			idx: 4
         		},
         		{
         			label: "Phone Lead Value", 
         			data: this.data.d[5],
         			idx: 5
         		}],
         		this.options);
		}
	};

		//chart end 

			
			
				

		}
	});
	
	
	
	
		
	$(window).on('load', function(){
		setTimeout(function(){
			charts.chart_metrics.init();
		}, 200);
	});
}