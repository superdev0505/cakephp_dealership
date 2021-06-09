<?php



class EventsController extends FullCalendarAppController {



    var $name = 'Events';

    var $paginate = array(

        'limit' => 15

    );



    function index() {

        $searched = false;

        if ($this->passedArgs) {

            $args = $this->passedArgs;

            if (isset($args['search_title'])) {

                $searched = true;

            }

        }

        $this->set('searched', $searched);



        $this->Prg->commonProcess();

        $this->Event->recursive = 1;

        $current_user_id = $this->Auth->User('id');

        $group_id = $this->Auth->user('group_id');

        $dealer_id = $this->Auth->user('dealer_id');

        if ($group_id == 2) {

            $conditions = array($this->Event->parseCriteria($this->passedArgs),

                'Event.status <>' => "Completed",

                'User.dealer_id' => $dealer_id

            );

        } elseif ($group_id == 1) {

            $conditions = array($this->Event->parseCriteria($this->passedArgs),

                'Event.status <>' => "Completed"

            );

        } elseif ($group_id == 3) {

            $conditions = array($this->Event->parseCriteria($this->passedArgs),

                'Event.user_id' => $current_user_id,

                'Event.status <>' => "Completed",

            );

        }

        $this->paginate = array(

            'conditions' => $conditions,

            'joins' => array(

                array(

                    'table' => 'event_types',

                    'alias' => 'EventTypes',

                    'type' => 'INNER',

                    'conditions' => array(

                        'EventTypes.id = Event.event_type_id'

                    )

                ),

                array(

                    'table' => 'users',

                    'alias' => 'User',

                    'type' => 'INNER',

                    'conditions' => array(

                        'User.id = Event.user_id'

                    )

                )

            ),

            'order' => 'start DESC',

            'limit' => 15,

        );

        $this->set('events', $this->paginate());
		$this->view = "../Events2/index";

    }



    function view($id = null) {

        if (!$id) {

            $this->Session->setFlash(__('Invalid event', true), 'alert');

            $this->redirect(array('action' => 'index'));

        }

        $this->set('event', $this->Event->read(null, $id));

    }



    function add() {

        if (!empty($this->request->data)) {

            $this->request->data['Event']['user_id'] = $this->Auth->user('id');

            $this->Event->create();

            if ($this->Event->saveAll($this->request->data)) {

                $this->Session->setFlash(__('The event has been saved', true), 'alert', array('class' => 'alert-success'));

                $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash(__('The event could not be saved. Please, try again.', true), 'alert', array('class' => 'alert-error'));

            }

        }

        $this->set('zone', $this->Auth->user('zone'));

        $this->params['Contact'] = $this->Auth->user();

        $this->set('eventTypes', $this->Event->EventType->find('list'));

        $this->set('contacts', $this->Event->Contact->find('list'));

        $this->set('users', $this->Event->User->find('list'));

    }



    function edit($id = null) {

        if (!$id && empty($this->request->data)) {

            $this->Session->setFlash(__('Invalid event', true), 'alert', array('class' => 'alert-error'));

            $this->redirect(array('action' => 'index'));

        }

        $this->set('zone', $this->Auth->user('zone'));

        $this->Event->id = $id;

        $user_id = $this->Event->read('Event.user_id');



        if (!empty($this->request->data)) {

            if ($this->Event->saveAll($this->request->data)) {

                $this->Session->setFlash(__('The event has been saved', true), 'alert', array('class' => 'alert-success'));

                $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash(__('The event could not be saved. Please, try again.', true), 'alert', array('class' => 'alert-error'));

            }

        }

        if (empty($this->request->data)) {

            $this->request->data = $this->Event->findById($id);

        }



        $this->set('eventTypes', $this->Event->EventType->find('list'));

        $this->set('contacts', $this->Event->Contact->find('list'));

        $this->set('users', $this->Event->User->find('list'));
		
		//$this->view = "../Events2/index";

    }



    function delete($id = null) {

        if (!$id) {

            $this->Session->setFlash(__('Invalid id for event', true), 'alert', array('class' => 'alert-error'));

            $this->redirect(array('action' => 'index'));

        }



        $this->Event->id = $id;

        $user_id = $this->Event->read('Event.user_id');



        if ($user_id['Event']['user_id'] == $this->Auth->user('id')) {

            if ($this->Event->delete($id)) {

                $this->Session->setFlash(__('Event deleted', true), 'alert');

                $this->redirect(array('action' => 'index'));

            }

            $this->Session->setFlash(__('Event was not deleted', true), 'alert', array('class' => 'alert-error'));

            $this->redirect(array('action' => 'index'));

        } else {

            $this->Session->setFlash(__('Oops! Looks like you are not the owner of Event. Only the user corresponding to the event can delete it.', true), 'alert', array('class' => 'alert-error'));

            $this->redirect(array('action' => 'index'));

        }

    }



    // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)

    function feed($id = null) {

        $this->layout = "ajax";

        $vars = $this->params['url'];

        $current_user_id = $this->Auth->User('id');

//        $conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end'], 'Event.user_id' => $current_user_id));

        $conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));



        $events = $this->Event->find('all', $conditions);

        $data = array();



        foreach ($events as $event) {

            if ($event['Event']['all_day'] == 1) {

                $allday = true;

                $end = $event['Event']['start'];

            } else {

                $allday = false;

                $end = $event['Event']['end'];

            }



            $event_contacts = $event['Event']['first_name'] . " " . $event['Event']['last_name'];

            $this->uses[] = "User";

            $event_users = $this->User->find('first', array('conditions' => array('User.id' => $event['Event']['user_id']), 'fields' => "User.first_name, User.last_name, User.id"));

            $event_users = $event_users['User']['first_name'] . " " . $event_users['User']['last_name'];



            $start1 = new DateTime($event['Event']['start']);

            $start2 = new DateTime($event['Event']['start']);

            $start1 = $start1->format('Y-m-d h:i A');

            $start = $start2->format('D M d Y H:i:s eO (T)');

            $event['Event']['start'] = $start;



            $end1 = new DateTime($event['Event']['end']);

            $end2 = new DateTime($event['Event']['end']);

            $end1 = $end1->format('Y-m-d h:i A');

            $end = $end2->format('D M d Y H:i:s eO (T)');

            $event['Event']['end'] = $end;



            $data[] = array(

                'id' => $event['Event']['id'],

                'title' => $event['Event']['title'],

                'start' => $event['Event']['start'],

                'end' => $event['Event']['end'],

                'allDay' => $allday,

                'url' => Router::url('/') . 'full_calendar/events/view/' . $event['Event']['id'],

                'details' => $event['Event']['details'],

                //'className' => $event['EventType']['color'],

                'toolTip' => '<br /><strong>Description: </strong>' . $event['Event']['details'] . '<br /><strong>Customer: </strong>' . $event_contacts . '<br /><strong>Sperson: </strong>' . $event_users . '<br /><strong>Start: </strong>' . $start1 . '<br /><strong>End: </strong>' . $end1 . '<br /><strong>Mobile: </strong>' . $event['Event']['mobile'] . '<br /><strong>Email: </strong>' . $event['Event']['email']);

        }



        $this->set("json", json_encode($data));

    }



    // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized

    function update() {

        $this->autoRender = FALSE;

        $vars = $this->params['url'];

        $this->Event->id = $vars['id'];

        $this->Event->saveField('start', $vars['start']);

        $this->Event->saveField('end', $vars['end']);

        if (isset($vars['allDay'])) {

            $this->Event->saveField('all_day', $vars['allday']);

        }

    }



}



?>

