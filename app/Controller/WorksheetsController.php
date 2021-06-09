<?php
class WorksheetsController extends AppController {
    public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType');
    public $components = array('RequestHandler');

	function index() {

  $this->layout='default_worksheet'; //app/views/layouts/my_index_layout.ctp

}

function view($id) {

    $this->layout = 'default_worksheet'; //app/views/layouts/my_view/layout.cpt

}
}



