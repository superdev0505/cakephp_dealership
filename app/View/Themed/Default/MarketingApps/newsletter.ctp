</br></br></br></br>
<body>
 
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="breadcrumb">
<li><a href="/eblasts">Dashboard</a><span class="divider"></span></li><li><a href="/eblasts/newsletter">Newsletter</a>  <span class="divider"></span></li><li class="active">View all </li></ul>                            <div class="page-content">
                                <div id="notify-container">
                                                                    </div>
                                
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-envelope"></span>&nbsp;Newsletter</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-default btn-xs" title="New" href="/customer/campaigns/create">Create Newsleter</a><a class="btn btn-default btn-xs" title="Refresh" href="/customer/campaigns/index">Refresh</a>        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="panel-body">
        
        <div class="table-responsive">
        <div id="Campaign-grid" class="grid-view">
<div class="summary">Displaying 1-1 of 1 result.</div>
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th id="Campaign-grid_c0">Newsletter Name</th><th id="Campaign-grid_c1">Status</th><th id="Campaign-grid_c2">Date added</th><th id="Campaign-grid_c3">Schedule sending</th><th class="button-column" id="Campaign-grid_c4">Options</th></tr>
</thead>
<tbody>
<tr class="odd">
<td><a href="/customer/campaigns/mp505lhq51619/overview">Big Event Sale</a></td><td>SENT</td><td>12/4/13 11:49 AM</td><td>12/4/13 10:20 AM</td><td><a title="Overview" class="" href="/customer/campaigns/mp505lhq51619/overview"> &nbsp; <span class="glyphicon glyphicon-info-sign"></span> &nbsp;</a>    <a title="Copy" class="copy-campaign" href="/customer/campaigns/mp505lhq51619/copy"> &nbsp; <span class="glyphicon glyphicon-subtitles"></span> &nbsp;</a>  <a title="Delete" class="delete" href="/customer/campaigns/mp505lhq51619/delete"> &nbsp; <span class="glyphicon glyphicon-remove-circle"></span> &nbsp; </a></td></tr>
</tbody>
</table>
<div class="keys" style="display:none" title="/customer/campaigns/index"><span>1</span></div>
</div>        </div>    
    </div>
</div>                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
    

  <script type="text/javascript" src="/customer/assets/cache/3e8bf277/gridview/jquery.yiigridview.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery(document).on('click','#Campaign-grid a.delete',function() {
	if(!confirm('Are you sure you want to delete this item?')) return false;
	var th = this,
		afterDelete = function(){};
	jQuery('#Campaign-grid').yiiGridView('update', {
		type: 'POST',
		url: jQuery(this).attr('href'),
		data:{ 'csrf_token':'3da63df74a218a322207999fe18c1a52770697c7' },
		success: function(data) {
			jQuery('#Campaign-grid').yiiGridView('update');
			afterDelete(th, true, data);
		},
		error: function(XHR) {
			return afterDelete(th, false, XHR);
		}
	});
	return false;
});
jQuery('#Campaign-grid').yiiGridView({'ajaxUpdate':['Campaign-grid'],'ajaxVar':'ajax','pagerClass':'pagination pull-right','loadingClass':'grid-view-loading','filterClass':'grid-filter-cell','tableClass':'table table-bordered table-hover table-striped','selectableRows':0,'enableHistory':false,'updateSelector':'{page}, {sort}','filterSelector':'{filter}','pageVar':'page'});
});
/*]]>*/
</script>
</body>
</html>