<?php

class FullCalendarController extends FullCalendarAppController {

    var $name = 'FullCalendar';
	public $uses = array('FullCalendar','Event');

    function index() {
        $this->layout = 'calendar';
        $this->set('title_for_layout', 'Calendar');
    }
	
	function index_new() {
        $this->layout = 'calendar_new';
        $this->set('title_for_layout', 'Calendar');
    }
	
	

}

?>
