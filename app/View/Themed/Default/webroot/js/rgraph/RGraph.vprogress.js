/**
    * o------------------------------------------------------------------------------o
    * | This file is part of the RGraph package - you can learn more at:             |
    * |                                                                              |
    * |                          http://www.rgraph.net                               |
    * |                                                                              |
    * | This package is licensed under the RGraph license. For all kinds of business |
    * | purposes there is a small one-time licensing fee to pay and for non          |
    * | commercial  purposes it is free to use. You can read the full license here:  |
    * |                                                                              |
    * |                      http://www.rgraph.net/LICENSE.txt                       |
    * o------------------------------------------------------------------------------o
    */

    if (typeof(RGraph) == 'undefined') RGraph = {};

    /**
    * The progress bar constructor
    * 
    * @param int id    The ID of the canvas tag
    * @param int value The indicated value of the meter.
    * @param int max   The end value (the upper most) of the meter
    */
    RGraph.VProgress = function (id, value, max)
    {
        this.id                = id;
        this.max               = max;
        this.value             = value;
        this.canvas            = document.getElementById(id);
        this.context           = this.canvas.getContext('2d');
        this.canvas.__object__ = this;
        this.type              = 'vprogress';
        this.coords            = [];
        this.isRGraph          = true;
        this.currentValue      = null;
        this.uid               = RGraph.CreateUID();
        this.canvas.uid        = this.canvas.uid ? this.canvas.uid : RGraph.CreateUID();
        this.colorsParsed      = false;


        /**
        * Compatibility with older browsers
        */
        RGraph.OldBrowserCompat(this.context);

        this.properties = {
            'chart.colors':             ['Gradient(white:#0c0)','Gradient(white:red)','Gradient(white:green)','yellow','pink','cyan','black','white','gray'],
            'chart.strokestyle.inner':  '#999',
            'chart.strokestyle.outer':  '#999',
            'chart.tickmarks':          true,
            'chart.tickmarks.zerostart':true,
            'chart.tickmarks.color':    '#999',
            'chart.tickmarks.inner':    false,
            'chart.gutter.left':        25,
            'chart.gutter.right':       25,
            'chart.gutter.top':         25,
            'chart.gutter.bottom':      25,
            'chart.numticks':           10,
            'chart.numticks.inner':     50,
            'chart.background.color':   '#eee',
            'chart.shadow':             false,
            'chart.shadow.color':       'rgba(0,0,0,0.5)',
            'chart.shadow.blur':        3,
            'chart.shadow.offsetx':     3,
            'chart.shadow.offsety':     3,
            'chart.title':              '',
            'chart.title.background':   null,
            'chart.title.hpos':         null,
            'chart.title.vpos':         null,
            'chart.title.bold':         true,
            'chart.title.font':         null,
            'chart.title.size':         null,
            'chart.title.color':        'black',
            
            'chart.title.side':         null,
            'chart.title.side.font':    'Arial',
            'chart.title.side.size':    12,
            'chart.title.side.color':   'black',
            'chart.title.side.bold':    true,
            
            'chart.text.size':          10,
            'chart.text.color':         'black',
            'chart.text.font':          'Arial',
            'chart.contextmenu':        null,
            'chart.units.pre':          '',
            'chart.units.post':         '',
            'chart.tooltips':           null,
            'chart.tooltips.effect':    'fade',
            'chart.tooltips.css.class': 'RGraph_tooltip',
            'chart.tooltips.highlight': true,
            'chart.tooltips.event':         'onclick',
            'chart.highlight.stroke':   'rgba(0,0,0,0)',
            'chart.highlight.fill':     'rgba(255,255,255,0.7)',
            'chart.annotatable':        false,
            'chart.annotate.color':     'black',
            'chart.zoom.factor':        1.5,
            'chart.zoom.fade.in':       true,
            'chart.zoom.fade.out':      true,
            'chart.zoom.hdir':          'right',
            'chart.zoom.vdir':          'down',
            'chart.zoom.frames':        25,
            'chart.zoom.delay':         16.666,
            'chart.zoom.shadow':        true,
            'chart.zoom.background':    true,
            'chart.zoom.action':        'zoom',
            'chart.arrows':             false,
            'chart.margin':             0,
            'chart.resizable':              false,
            'chart.resize.handle.adjust':   [0,0],
            'chart.resize.handle.background': null,
            'chart.label.inner':        false,
            'chart.labels.count':       10,
            'chart.labels.position':    'right',
            'chart.adjustable':         false,
            'chart.min':                0,
            'chart.scale.decimals':     0,
            'chart.scale.thousand':     ',',
            'chart.scale.point':        '.',
            'chart.scale.visible':      true,
            'chart.key':                null,
            'chart.key.background':     'white',
            'chart.key.position':       'graph',
            'chart.key.halign':             'right',
            'chart.key.shadow':         false,
            'chart.key.shadow.color':   '#666',
            'chart.key.shadow.blur':    3,
            'chart.key.shadow.offsetx': 2,
            'chart.key.shadow.offsety': 2,
            'chart.key.position.gutter.boxed': true,
            'chart.key.position.x':     null,
            'chart.key.position.y':     null,
            'chart.key.color.shape':    'square',
            'chart.key.rounded':        true,
            'chart.key.linewidth':      1,
            'chart.key.colors':         null,
            'chart.events.click':       null,
            'chart.events.mousemove':   null,
            'chart.border.inner':       true
        }
        
        /**
        * Allow for new style method of passing arguments to the constructor
        */
        if (arguments.length == 4) {
            this.min   = arguments[1];
            this.max   = arguments[2];
            this.value = arguments[3];
            
            this.properties['chart.min'] = arguments[1];
        }

        // Check for support
        if (!this.canvas) {
            alert('[PROGRESS] No canvas support');
            return;
        }


        /**
        * Create the dollar objects so that functions can be added to them
        */
        var linear_data = RGraph.array_linearize(value);
        for (var i=0; i<linear_data.length; ++i) {
            this['$' + i] = {};
        }


        /**
        * Translate half a pixel for antialiasing purposes - but only if it hasn't beeen
        * done already
        */
        if (!this.canvas.__rgraph_aa_translated__) {
            this.context.translate(0.5,0.5);
            
            this.canvas.__rgraph_aa_translated__ = true;
        }


        /**
        * The chart is now always registered
        */
        RGraph.Register(this);
    }


    /**
    * A generic setter
    * 
    * @param string name  The name of the property to set
    * @param string value The value of the poperty
    */
    RGraph.VProgress.prototype.Set = function (name, value)
    {
        /**
        * This should be done first - prepend the propertyy name with "chart." if necessary
        */
        if (name.substr(0,6) != 'chart.') {
            name = 'chart.' + name;
        }

        /**
        * chart.strokestyle now sets both chart.strokestyle.inner and chart.strokestyle.outer
        */
        if (name == 'chart.strokestyle') {
            this.Set('chart.strokestyle.inner', value);
            this.Set('chart.strokestyle.outer', value);
            return;
        }

        this.properties[name.toLowerCase()] = value;
    }


    /**
    * A generic getter
    * 
    * @param string name  The name of the property to get
    */
    RGraph.VProgress.prototype.Get = function (name)
    {
        /**
        * This should be done first - prepend the property name with "chart." if necessary
        */
        if (name.substr(0,6) != 'chart.') {
            name = 'chart.' + name;
        }

        return this.properties[name.toLowerCase()];
    }


    /**
    * Draws the progress bar
    */
    RGraph.VProgress.prototype.Draw = function ()
    {
        /**
        * Fire the onbeforedraw event
        */
        RGraph.FireCustomEvent(this, 'onbeforedraw');



        /**
        * Parse the colors. This allows for simple gradient syntax
        */
        if (!this.colorsParsed) {

            this.parseColors();

            
            // Don't want to do this again
            this.colorsParsed = true;
        }

        
        /**
        * Set the current value
        */
        this.currentValue = this.value;
        
        /**
        * This is new in May 2011 and facilitates indiviual gutter settings,
        * eg chart.gutter.left
        */
        this.gutterLeft   = this.Get('chart.gutter.left');
        this.gutterRight  = this.Get('chart.gutter.right');
        this.gutterTop    = this.Get('chart.gutter.top');
        this.gutterBottom = this.Get('chart.gutter.bottom');

        // Figure out the width and height
        this.width  = this.canvas.width - this.gutterLeft - this.gutterRight;
        this.height = this.canvas.height - this.gutterTop - this.gutterBottom;
        this.coords = [];

        this.Drawbar();
        this.DrawTickMarks();
        this.DrawLabels();
        this.DrawTitles();

        this.context.stroke();
        this.context.fill();
        
        
        /**
        * Draw the bevel effect if requested
        */
        if (this.properties['chart.bevel']) {
            this.DrawBevel();
        }



        /**
        * Setup the context menu if required
        */
        if (this.Get('chart.contextmenu')) {
            RGraph.ShowContext(this);
        }


        /**
        * This installs the event listeners
        */
        RGraph.InstallEventListeners(this);
        
        // Draw a key if necessary
        if (this.Get('chart.key') && this.Get('chart.key').length) {
            RGraph.DrawKey(this, this.Get('chart.key'), this.Get('chart.colors'));
        }


        
        /**
        * This function enables resizing
        */
        if (this.Get('chart.resizable')) {
            RGraph.AllowResizing(this);
        }
        
        /**
        * Instead of using RGraph.common.adjusting.js, handle them here
        */
        this.AllowAdjusting();
        
        /**
        * Fire the RGraph ondraw event
        */
        RGraph.FireCustomEvent(this, 'ondraw');
    }


    /**
    * Draw the bar itself
    */
    RGraph.VProgress.prototype.Drawbar = function ()
    {
        // Set a shadow if requested
        if (this.Get('chart.shadow')) {
            RGraph.SetShadow(this, this.Get('chart.shadow.color'), this.Get('chart.shadow.offsetx'), this.Get('chart.shadow.offsety'), this.Get('chart.shadow.blur'));
        }

        // Draw the shadow for MSIE
        if (RGraph.isOld() && this.Get('chart.shadow')) {
            this.context.fillStyle = this.Get('chart.shadow.color');
            this.context.fillRect(this.gutterLeft + this.Get('chart.shadow.offsetx'), this.gutterTop + this.Get('chart.shadow.offsety'), this.width, this.height);
        }

        // Draw the outline
        this.context.fillStyle   = this.Get('chart.background.color');
        this.context.strokeStyle = this.Get('chart.strokestyle.outer');
        this.context.strokeRect(this.gutterLeft, this.gutterTop, this.width, this.height);
        this.context.fillRect(this.gutterLeft, this.gutterTop, this.width, this.height);

        // Turn off any shadow
        RGraph.NoShadow(this);

        this.context.strokeStyle = this.Get('chart.strokestyle.outer');
        this.context.fillStyle   = this.Get('chart.colors')[0];
        var margin = this.Get('chart.margin');
        var barHeight = this.canvas.height - this.gutterTop - this.gutterBottom;

        // Draw the actual bar itself
        if (typeof(this.value) == 'number') {

            this.context.lineWidth   = 1;
            this.context.strokeStyle = this.Get('chart.strokestyle.inner');

        } else if (typeof(this.value) == 'object') {

            this.context.beginPath();
            this.context.strokeStyle = this.Get('chart.strokestyle.inner');

            var startPoint = this.canvas.height - this.gutterBottom;

            for (var i=0; i<this.value.length; ++i) {

                var segmentHeight = ( (this.value[i] - this.Get('chart.min')) / (this.max - this.Get('chart.min')) ) * barHeight;

                this.context.fillStyle = this.Get('chart.colors')[i];
                
                if (this.Get('chart.border.inner')) {
                    this.context.strokeRect(this.gutterLeft + margin, startPoint - segmentHeight, this.width - margin - margin, segmentHeight);
                }
                this.context.fillRect(this.gutterLeft + margin, startPoint - segmentHeight, this.width - margin - margin, segmentHeight);



                // Store the coords
                this.coords.push([this.gutterLeft + margin, startPoint - segmentHeight, this.width - margin - margin, segmentHeight]);

                startPoint -= segmentHeight;
            }

            
            this.context.stroke();
            this.context.fill();
        }

        /**
        * Inner tickmarks
        */
        if (this.Get('chart.tickmarks.inner')) {
        
            var spacing = (this.canvas.height - this.gutterTop - this.gutterBottom) / this.Get('chart.numticks.inner');

            this.context.lineWidth   = 1;
            this.context.strokeStyle = this.Get('chart.strokestyle.outer');

            this.context.beginPath();

            for (var y = this.gutterTop; y<RGraph.GetHeight(this) - this.gutterBottom; y+=spacing) {
                this.context.moveTo(this.gutterLeft, Math.round(y));
                this.context.lineTo(this.gutterLeft + 3, Math.round(y));

                this.context.moveTo(RGraph.GetWidth(this) - this.gutterRight, Math.round(y));
                this.context.lineTo(RGraph.GetWidth(this) - this.gutterRight - 3, Math.round(y));
            }

            this.context.stroke();
        }

        /**
        * Draw the actual bar
        */
        var barHeight = Math.min(this.height, ( (this.value - this.Get('chart.min')) / (this.max - this.Get('chart.min')) ) * this.height);

        this.context.beginPath();
        this.context.strokeStyle = this.Get('chart.strokestyle.inner');

        if (typeof(this.value) == 'number') {
            
            if (this.Get('chart.border.inner')) {
                this.context.strokeRect(this.gutterLeft + margin, this.gutterTop + this.height - barHeight, this.width - margin - margin, barHeight);
            }
            this.context.fillRect(this.gutterLeft + margin, this.gutterTop + this.height - barHeight, this.width - margin - margin, barHeight);

            // Store the coords
            this.coords.push([this.gutterLeft + margin, this.gutterTop + this.height - barHeight, this.width - margin - margin, barHeight]);
        }


        /**
        * Draw the arrows indicating the level if requested
        */
        if (this.Get('chart.arrows')) {
            var x = this.gutterLeft - 4;
            var y = RGraph.GetHeight(this) - this.gutterBottom - barHeight;
            
            this.context.lineWidth = 1;
            this.context.fillStyle = 'black';
            this.context.strokeStyle = 'black';

            this.context.beginPath();
                this.context.moveTo(x, y);
                this.context.lineTo(x - 4, y - 2);
                this.context.lineTo(x - 4, y + 2);
            this.context.closePath();

            this.context.stroke();
            this.context.fill();

            x +=  this.width + 8;

            this.context.beginPath();
                this.context.moveTo(x, y);
                this.context.lineTo(x + 4, y - 2);
                this.context.lineTo(x + 4, y + 2);
            this.context.closePath();

            this.context.stroke();
            this.context.fill();
        }




        /**
        * Draw the "in-bar" label
        */
        if (this.Get('chart.label.inner')) {
            this.context.beginPath();
            this.context.fillStyle = 'black';
            RGraph.Text(this.context,
                        this.Get('chart.text.font'),
                        this.Get('chart.text.size'),
                        ((this.canvas.width - this.gutterLeft - this.gutterRight) / 2) + this.gutterLeft,
                        this.canvas.height - this.gutterBottom - barHeight - 5,
                        RGraph.number_format(this, (this.value).toFixed(this.Get('chart.scale.decimals'))),
                        'bottom',
                        'center',
                        true,
                        null,
                        'white');
            this.context.fill();
        }
    }

    /**
    * The function that draws the tick marks. Apt name...
    */
    RGraph.VProgress.prototype.DrawTickMarks = function ()
    {
        this.context.strokeStyle = this.Get('chart.tickmarks.color');

        if (this.Get('chart.tickmarks')) {
            this.context.beginPath();
                for (var i=0; this.Get('chart.tickmarks.zerostart') ? i<=this.Get('chart.numticks') : i<this.Get('chart.numticks'); i++) {
                    
                    var startX = this.Get('chart.labels.position') == 'left' ? this.gutterLeft : this.canvas.width - this.Get('chart.gutter.right');
                    var endX   = this.Get('chart.labels.position') == 'left' ? startX - 4 : startX + 4;
                    var yPos   = (this.height * (i / this.Get('chart.numticks'))) + this.gutterTop

                    this.context.moveTo(startX, Math.round(yPos));
                    this.context.lineTo(endX, Math.round(yPos));
                }
            this.context.stroke();
        }
    }


    /**
    * The function that draws the labels
    */
    RGraph.VProgress.prototype.DrawLabels = function ()
    {
        if (!RGraph.is_null(this.Get('chart.labels.specific'))) {
            return this.DrawSpecificLabels();
        }

        this.context.fillStyle = this.Get('chart.text.color');

        var context    = this.context;
        var position   = this.Get('chart.labels.position');
        var xAlignment = position == 'left' ? 'right' : 'left';
        var yAlignment = 'center';
        var count      = this.Get('chart.labels.count');
        var units_pre  = this.Get('chart.units.pre');
        var units_post = this.Get('chart.units.post');
        var text_size  = this.Get('chart.text.size');
        var text_font  = this.Get('chart.text.font');
        var decimals   = this.Get('chart.scale.decimals');

        if (this.Get('chart.tickmarks')) {
            
            for (var i=0; i<count ; ++i) {

                var text = String(
                                  ((( (this.max - this.Get('chart.min')) / count) * (count - i)) + this.Get('chart.min')).toFixed(decimals)
                                 );

                RGraph.Text(context,
                            text_font,
                            text_size,
                            position == 'left' ? (this.gutterLeft - 5) : (this.canvas.width - this.gutterRight + 5),
                            (((this.canvas.height - this.gutterTop - this.gutterBottom) / count) * i) + this.gutterTop,
                            RGraph.number_format(this, text, units_pre, units_post),
                            yAlignment,
                            xAlignment);
            }
            
            /**
            * Show zero?
            */            
            if (this.Get('chart.tickmarks.zerostart') && this.Get('chart.min') == 0) {
                RGraph.Text(context,
                            text_font,
                            text_size,
                            position == 'left' ? (this.gutterLeft - 5) : (this.canvas.width - this.gutterRight + 5),
                            this.canvas.height - this.gutterBottom,
                            RGraph.number_format(this, this.Get('chart.min').toFixed(decimals), units_pre, units_post),
                            yAlignment,
                            xAlignment);
            }

            /**
            * chart.ymin is set
            */
            if (this.Get('chart.min') != 0) {
                RGraph.Text(context,
                            text_font,
                            text_size,
                            position == 'left' ? (this.gutterLeft - 5) : (RGraph.GetWidth(this) - this.gutterRight + 5),
                            this.canvas.height - this.gutterBottom,
                            RGraph.number_format(this, this.Get('chart.min').toFixed(decimals), units_pre, units_post),
                            yAlignment,
                            xAlignment);
            }
        }
    }
    

    /**
    * Draws titles
    */
    RGraph.VProgress.prototype.DrawTitles = function ()
    {
        var context    = this.context;
        var text_size  = this.Get('chart.text.size');
        var text_font  = this.Get('chart.text.font');
        var title_size = this.Get('chart.title.size') ? this.Get('chart.title.size') : text_size + 2;

        // Draw the title text
        if (this.Get('chart.title').length > 0) {

            this.context.fillStyle = this.Get('chart.title.color');
        
            RGraph.Text(context,
                        this.Get('chart.title.font') ? this.Get('chart.title.font') : text_font,
                        title_size,
                        this.gutterLeft + ((this.canvas.width - this.gutterLeft - this.gutterRight) / 2), // X
                        this.gutterTop - title_size, // Y
                        this.Get('chart.title'),
                        null,
                        'center',
                        null,
                        null,
                        null,
                        this.Get('chart.title.bold'));
        }
        
        // Draw side title
        if (typeof(this.Get('chart.title.side')) == 'string') {

            this.context.fillStyle = this.Get('chart.title.side.color');

            RGraph.Text(context,
                        this.Get('chart.title.side.font'),
                        this.Get('chart.title.side.size'),
                        this.Get('chart.labels.position') == 'right' ? this.gutterLeft - 10 : (this.canvas.width - this.gutterRight) + 10,
                        this.gutterTop + (this.height / 2), // Y
                        this.Get('chart.title.side'),
                        'bottom',
                        'center',
                        null,
                        this.Get('chart.labels.position') == 'right' ? 270 : 90,
                        null,
                        this.Get('chart.title.side.bold'));
        }
    }


    /**
    * Returns the focused bar
    * 
    * @param event e The event object
    */
    RGraph.VProgress.prototype.getShape =
    RGraph.VProgress.prototype.getBar = function (e)
    {
        var mouseCoords = RGraph.getMouseXY(e)

        for (var i=0; i<this.coords.length; i++) {

            var mouseCoords = RGraph.getMouseXY(e);
            var mouseX = mouseCoords[0];
            var mouseY = mouseCoords[1];
            var left   = this.coords[i][0];
            var top    = this.coords[i][1];
            var width  = this.coords[i][2];
            var height = this.coords[i][3];
            var idx    = i;

            if (mouseX >= left && mouseX <= (left + width) && mouseY >= top && mouseY <= (top + height) ) {
            
                var tooltip = RGraph.parseTooltipText(this.Get('chart.tooltips'), i);
            
                return {0: this,   'object': this,
                        1: left,   'x':      left,
                        2: top,    'y':      top,
                        3: width,  'width':  width,
                        4: height, 'height': height,
                        5: i,      'index':  i,
                                   'tooltip': tooltip };
            }
        }
    }


    /**
    * This function returns the value that the mouse is positioned at, regardless of
    * the actual indicated value.
    * 
    * @param object e The event object
    */
    RGraph.VProgress.prototype.getValue = function (e)
    {
        var mouseCoords = RGraph.getMouseXY(e);
        var mouseX      = mouseCoords[0];
        var mouseY      = mouseCoords[1];
        var canvas      = this.canvas;
        var context     = this.context;

        var value = (this.height - (mouseY - this.gutterTop)) / this.height;
            value *= this.max - this.Get('chart.min');
            value += this.Get('chart.min');
        
        if (mouseY > (this.canvas.height - this.gutterBottom)) {
            value = this.Get('chart.min');
        }
        
        if (mouseY < (this.gutterTop)) {
            this.value = this.max;
        }

        return value;
    }


    /**
    * Each object type has its own Highlight() function which highlights the appropriate shape
    * 
    * @param object shape The shape to highlight
    */
    RGraph.VProgress.prototype.Highlight = function (shape)
    {
        // Add the new highlight
        RGraph.Highlight.Rect(this, shape);
    }



    /**
    * The getObjectByXY() worker method. Don't call this call:
    * 
    * RGraph.ObjectRegistry.getObjectByXY(e)
    * 
    * @param object e The event object
    */
    RGraph.VProgress.prototype.getObjectByXY = function (e)
    {
        var mouseXY = RGraph.getMouseXY(e);

        if (
               mouseXY[0] > this.Get('chart.gutter.left')
            && mouseXY[0] < (this.canvas.width - this.Get('chart.gutter.right'))
            && mouseXY[1] >= this.Get('chart.gutter.top')
            && mouseXY[1] <= (this.canvas.height - this.Get('chart.gutter.bottom'))
            ) {

            return this;
        }
    }



    /**
    * This function allows the VProgress to be  adjustable.
    */
    RGraph.VProgress.prototype.AllowAdjusting = function () {return;}



    /**
    * This method handles the adjusting calculation for when the mouse is moved
    * 
    * @param object e The event object
    */
    RGraph.VProgress.prototype.Adjusting_mousemove = function (e)
    {
        /**
        * Handle adjusting for the HProgress
        */
        if (RGraph.Registry.Get('chart.adjusting') && RGraph.Registry.Get('chart.adjusting').uid == this.uid) {

            var mouseXY = RGraph.getMouseXY(e);
            var value   = this.getValue(e);
            
            if (typeof(value) == 'number') {

                // Fire the onadjust event
                RGraph.FireCustomEvent(this, 'onadjust');
    
                this.value = Number(value.toFixed(this.Get('chart.scale.decimals')));
                RGraph.Redraw();
            }
        }
    }



    /**
    * Draws chart.labels.specific
    */
    RGraph.VProgress.prototype.DrawSpecificLabels = function ()
    {
        var labels = this.Get('chart.labels.specific');

        if (labels) {

            var font   = this.Get('chart.text.font');
            var size   = this.Get('chart.text.size');
            var halign = (this.Get('chart.labels.position') == 'right' ? 'left' : 'right');
            var step   = this.height / (labels.length - 1);
    
            this.context.beginPath();

                this.context.fillStyle = this.Get('chart.text.color');

                for (var i=0; i<labels.length; ++i) {

                    RGraph.Text(this.context,
                                font,
                                size,
                                this.Get('chart.labels.position') == 'right' ? this.canvas.width - this.gutterRight + 7 : this.gutterLeft - 7,
                                (this.height + this.gutterTop) - (step * i),
                                labels[i],
                                'center',
                                halign);
                }
            this.context.fill();
        }
    }



    /**
    * This function positions a tooltip when it is displayed
    * 
    * @param obj object    The chart object
    * @param int x         The X coordinate specified for the tooltip
    * @param int y         The Y coordinate specified for the tooltip
    * @param objec tooltip The tooltips DIV element
    */
    RGraph.VProgress.prototype.positionTooltip = function (obj, x, y, tooltip, idx)
    {
        var coordX     = obj.coords[tooltip.__index__][0];
        var coordY     = obj.coords[tooltip.__index__][1];
        var coordW     = obj.coords[tooltip.__index__][2];
        var coordH     = obj.coords[tooltip.__index__][3];
        var canvasXY   = RGraph.getCanvasXY(obj.canvas);
        var gutterLeft = obj.Get('chart.gutter.left');
        var gutterTop  = obj.Get('chart.gutter.top');
        var width      = tooltip.offsetWidth;
        var height     = tooltip.offsetHeight;

        // Set the top position
        tooltip.style.left = 0;
        tooltip.style.top  = canvasXY[1] + coordY - height - 7 + 'px';
        
        // By default any overflow is hidden
        tooltip.style.overflow = '';

        // The arrow
        var img = new Image();
            img.src = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAFCAYAAACjKgd3AAAARUlEQVQYV2NkQAN79+797+RkhC4M5+/bd47B2dmZEVkBCgcmgcsgbAaA9GA1BCSBbhAuA/AagmwQPgMIGgIzCD0M0AMMAEFVIAa6UQgcAAAAAElFTkSuQmCC';
            img.style.position = 'absolute';
            img.id = '__rgraph_tooltip_pointer__';
            img.style.top = (tooltip.offsetHeight - 2) + 'px';
        tooltip.appendChild(img);
        
        // Reposition the tooltip if at the edges:
        
        // LEFT edge
        if ((canvasXY[0] + coordX + (coordW / 2) - (width / 2)) < 10) {
            tooltip.style.left = (canvasXY[0] + coordX - (width * 0.1)) + (coordW / 2) + 'px';
            img.style.left = ((width * 0.1) - 8.5) + 'px';

        // RIGHT edge
        } else if ((canvasXY[0] + coordX + (coordW / 2) + (width / 2)) > document.body.offsetWidth) {
            tooltip.style.left = canvasXY[0] + coordX - (width * 0.9) + (coordW / 2) + 'px';
            img.style.left = ((width * 0.9) - 8.5) + 'px';

        // Default positioning - CENTERED
        } else {
            tooltip.style.left = (canvasXY[0] + coordX + (coordW / 2) - (width * 0.5)) + 'px';
            img.style.left = ((width * 0.5) - 8.5) + 'px';
        }
    }



    /**
    * This function returns the appropriate Y coordinate for the given Y value
    * 
    * @param  int value The Y value you want the coordinate for
    * @returm int       The coordinate
    */
    RGraph.VProgress.prototype.getYCoord = function (value)
    {
        if (value > this.max || value < this.properties['chart.min']) {
            return null;
        }

        var barHeight = this.canvas.height - this.properties['chart.gutter.top'] - this.properties['chart.gutter.bottom'];
        var coord = ((value - this.properties['chart.min']) / (this.max - this.properties['chart.min'])) * barHeight;
        coord = this.canvas.height - coord - this.properties['chart.gutter.bottom'];
        
        return coord;
    }



    /**
    * This returns true/false as to whether the cursor is over the chart area.
    * The cursor does not necessarily have to be over the bar itself.
    */
    RGraph.VProgress.prototype.overChartArea = function  (e)
    {
        var mouseXY = RGraph.getMouseXY(e);
        var mouseX  = mouseXY[0];
        var mouseY  = mouseXY[1];

        if (   mouseX >= this.properties['chart.gutter.left']
            && mouseX <= (this.canvas.width - this.properties['chart.gutter.right'])
            && mouseY >= this.properties['chart.gutter.top']
            && mouseY <= (this.canvas.height - this.properties['chart.gutter.bottom'])
            ) {
            
            return true;
        }

        return false;
    }



    /**
    * 
    */
    RGraph.VProgress.prototype.parseColors = function ()
    {
        var props  = this.properties;
        var colors = props['chart.colors'];

        for (var i=0; i<colors.length; ++i) {
            colors[i] = this.parseSingleColorForGradient(colors[i]);
        }
    }



    /**
    * This parses a single color value
    */
    RGraph.VProgress.prototype.parseSingleColorForGradient = function (color)
    {
        var canvas  = this.canvas;
        var context = this.context;

        if (!color || typeof(color) != 'string') {
            return color;
        }

        if (color.match(/^gradient\((.*)\)$/i)) {
            var parts = RegExp.$1.split(':');

            // Create the gradient
            var grad = this.context.createLinearGradient(0,
                                                         this.canvas.height - this.properties['chart.gutter.bottom'],
                                                         0,
                                                         this.properties['chart.gutter.top']
                                                        );

            var diff = 1 / (parts.length - 1);

            grad.addColorStop(0, RGraph.trim(parts[0]));

            for (var j=1; j<parts.length; ++j) {
                grad.addColorStop(j * diff, RGraph.trim(parts[j]));
            }
            
            return grad ? grad : color;
        }

        return grad ? grad : color;
    }



    /**
    * Draws the bevel effect
    */
    RGraph.VProgress.prototype.DrawBevel = function ()
    {
        // In case of multiple segments - this adds up all the lengths
        for (var i=0,len=0; i<this.coords.length; ++i) len += this.coords[i][3];

        this.context.save();
            // Draw a path to clip to
            this.context.beginPath();
                this.context.rect(this.coords[0][0], this.coords[this.coords.length - 1][1] - 1, this.coords[0][2], len);
                this.context.clip();
            
            // Now draw the rect with a shadow
            this.context.beginPath();
                
                this.context.shadowColor = 'black';
                this.context.shadowOffsetX = 0;
                this.context.shadowOffsetY = 0;
                this.context.shadowBlur    = 15;
                
                this.context.lineWidth = 2;
                this.context.rect(this.coords[0][0] - 1, this.coords[this.coords.length - 1][1] - 1, this.coords[0][2] + 2, len + 2);
            
            this.context.stroke();

        this.context.restore();
    }