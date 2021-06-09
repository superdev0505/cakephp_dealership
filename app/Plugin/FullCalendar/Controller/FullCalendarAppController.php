<?php
class FullCalendarAppController extends AppController {

//	var $components = array('Acl', 'Session');
	var $components = array('Session');
	var $helpers =  array('Session',
        	'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
        	'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
        	'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
			'Js'=>array('Jquery')
    );

}
?>