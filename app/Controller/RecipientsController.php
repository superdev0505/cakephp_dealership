<?php
class RecipientsController extends AppController {

	public $components = array('RequestHandler','Paginator');
    public $uses = array('List', 'Recipient', 'User');

	public function beforeFilter() {
        parent::beforeFilter();
        $dealer_ids = $this->get_dealer_ids(); 
    	$this->set('dealer_ids',$dealer_ids);
    }

    public function add() {
    	$this->layout = 'marketing_default';

    	$list_id = base64_decode( $this->request->query['key'] );
    	$this->set('list_id', $list_id);

    	$list = $this->List->find('first', array('conditions' => array('List.id'=>$list_id)));
    	$this->set('list',$list);
	}

	public function get_dealer_ids(){

    	$user_active = $this->User->find('list', array('fields' => array('dealer_id', 'dealer'),
                'conditions' => array('User.username' => $this->Auth->User('username'))));
    	return $user_active;
    }

    public function delete_recipient($rec_id, $list_id){

    	$this->Recipient->id = $rec_id;
    	$this->Recipient->delete();
    	$this->autoRender = false;

    	$current_count = $this->Recipient->find('count', array("conditions"=> array("Recipient.list_id" => $list_id) ));
    	$this->List->id = $list_id;
	    $this->List->saveField("total_recipient", $current_count );
    }

    public function recipient_list(){
		$list_id =  $this->request->query['list_id'];	

    	if ($this->request->is('post')) {

    		if( isset($this->request->query['type']) && $this->request->query['type'] = 'upload' ){

    			// debug($this->request->data);
	    		// debug($_FILES);

	    		$row = 1;
	    		if (($handle = fopen($_FILES['file']['tmp_name'], "r")) !== FALSE) {
				    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				        
				        if($this->request->data['first_row_header'] == 'true' && $row == 1){
				        	//echo "skip";
				        }else{
				        	//debug($data);
				        	$this->Recipient->create();
	    					$this->Recipient->save(array("Recipient"=> array(
	    						"list_id" => $this->request->query['list_id'],
	    						"email_address" => $data[1],
	    						"name" => $data[0]
	    					) ));	
				        }
				        $row++;
				    }
				    fclose($handle);
				}

    		}else{
    			$this->Recipient->create();
	    		$this->Recipient->save(array("Recipient"=>$this->request->data));	
    		}
    		

			
    	}

		$conditions['Recipient.list_id'] = $list_id;
		$this->paginate = array(
			'conditions' => $conditions,
			'order' => array('Recipient.id'=>'DESC'),
			'limit' => 30,
		);
		$recipients = $this->Paginate("Recipient");
		$this->set('recipients', $recipients);

		if ($this->request->is('post')) {
			$paging_count = $this->params['paging'];
			$this->List->id = $list_id;
	    	$this->List->saveField("total_recipient", $paging_count['Recipient']['count'] );
    	}

    }

	

}