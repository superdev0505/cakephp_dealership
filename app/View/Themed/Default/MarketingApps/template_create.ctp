</br></br></br></br>
 <div class="row-fluid wrapper">

                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="breadcrumb">
<li><a href="/eblasts">Dashboard</a><span class="divider"></span></li><li><a href="/eblasts/templates">Templates</a>
<span class="divider"></span></li><li class="active">Update </li></ul>
<div class="page-content">
                                <div id="notify-container">
                                                                    </div>
                                    
    <div class="pull-right">
        <a href="javascript:;" onclick="window.open('/customer/templates/tr498fn1wk757/preview', 'Preview', 'height=600, width=600'); return false;" class="btn btn-default">Preview</a>
        <a data-toggle="modal" href="#template-test-email" class="btn btn-default">Send a test email using this template</a>
    </div>
    <div class="clearfix"><!-- --></div>
    <hr />
        
<form id="yw0" action="/customer/templates/tr498fn1wk757/update" method="post">
<div style="display:none"><input type="hidden" value="3da63df74a218a322207999fe18c1a52770697c7" name="csrf_token" /></div>    
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"> <span class="glyphicon glyphicon-text-width"></span> Templates </h3>
    </div>
    <div class="panel-body">
        
        <div class="form-group col-lg-6">
            <label for="CustomerEmailTemplate_name" class="required">Name <span class="required">*</span></label>            <input data-title="Name" data-container="body" data-toggle="popover" data-content="The name of the template, used for you to make the difference if having to many templates." class="form-control has-help-text" placeholder="Name" data-placement="top" name="CustomerEmailTemplate[name]" id="CustomerEmailTemplate_name" type="text" maxlength="255" value="example-template" />                    </div>
        
        <div class="form-group col-lg-6">
            <label for="CustomerEmailTemplate_inline_css" class="required">Inline css <span class="required">*</span></label>            <select data-title="Inline css" data-container="body" data-toggle="popover" data-content="Whether the parser should extract the css from the head of the document and inline it for each matching attribute found in the document body." class="form-control has-help-text" placeholder="Inline css" data-placement="top" name="CustomerEmailTemplate[inline_css]" id="CustomerEmailTemplate_inline_css">
<option value="yes" selected="selected">Yes</option>
<option value="no">No</option>
</select>                    </div>
        
        <div class="clearfix"><!-- --></div>
        <hr />
        
        <div class="form-group">
            <label for="CustomerEmailTemplate_content" class="required">Content <span class="required">*</span></label>            
<textarea class="form-control" placeholder="Content" rows="15" name="CustomerEmailTemplate[content]" id="CustomerEmailTemplate_content">
</textarea>
</div>

    </div>
    <div class="panel-footer">
        <div class="pull-right">
            <button type="submit" class="btn btn-default btn-submit" data-loading-text="Please wait, processing...">Save changes</button>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    
</div>
</form>
<div class="modal fade" id="template-test-email" tabindex="-1" role="dialog" aria-labelledby="template-test-email-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Send a test email</h4>
        </div>
        <div class="modal-body">
             <div class="callout">
                 <strong>Notes: </strong><br />
                * if multiple recipients, separate the email addresses by a comma.<br /> * the email tags will not be parsed while sending test emails.<br /> * make sure you save the template changes before you send the test.             </div>

            <form id="template-test-form" action="/customer/templates/tr498fn1wk757/test" method="post">
                <div style="display:none">
                    <input type="hidden" value="3da63df74a218a322207999fe18c1a52770697c7" name="csrf_token" />
                </div>
                <input class="form-control" type="text" name="email" id="email" />
            </form>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-submit" onclick="$('#template-test-form').submit();">Send test</button>
        </div>
      </div>
    </div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
    

  <script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
var wysiwygOptionsCustomerEmailTemplate_content = {'language':'en','contentsCss':['/customer/assets/css/bootstrap.min.css','/customer/assets/css/style.css'],'filebrowserBrowseUrl':'/customer/extensions/ckeditor/filemanager','filebrowserImageWindowHeight':400,'fullPage':true,'allowedContent':true,'height':800};
$("#CustomerEmailTemplate_content").ckeditor(wysiwygOptionsCustomerEmailTemplate_content);
});
/*]]>*/
</script>