<?php
class EmailController extends AppController {

	public $uses = array('Contact','LeadSold');


	public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function index() {

	}
	public function inbox() {
		$this->layout='default_new';
	}
	public function compose() {
		$this->layout='default_new';
	}
	public function download() {
		$this->layout='default_new';
        $this->loadModel('AdpCustomer');
        $adp_customers = $this->AdpCustomer->find('count',array('conditions'=>array('AdpCustomer.dealer_id' => $this->Auth->user('dealer_id'))));
        debug($adp_customers);
        if(!empty($adp_customers) && $adp_customers > 0) $this->set('light_speed_bool',true);
        else $this->set('light_speed_bool',false);
	}

	public function download_email(){

		$queries = $this->request->query;

		$lead_type = $queries['search_lead_type'];
		$start_date = $queries['s_d_range']." 00:00:00";
		$end_date = $queries['e_d_range']." 23:59:59";
		$dealer_id = $this->Auth->user("dealer_id");

		$filename = "email_{$lead_type}_{$dealer_id}.csv";

		header( 'Content-Type: text/csv' );
		header( 'Content-Disposition: attachment;filename='.$filename);

		$fields = array();
		$headers = array();
        if($lead_type == 'adp_customer'){
            if( isset($queries['first_name']) ){
    			$fields[] = "AdpCustomer.first_name";
    			$headers[] ='First Name';
    		}
    		if( isset($queries['last_name']) ){
    			$fields[] = "AdpCustomer.last_name";
    			$headers[] ='Last Name';
    		}
    		if( isset($queries['email']) ){
    			$fields[] = "AdpCustomer.email";
    			$headers[] ='Email';
    		}
    		if( isset($queries['mobile']) ){
    			$fields[] = "AdpCustomer.mobile";
    			$headers[] ='Cell';
    		}
    		if( isset($queries['home_phone']) ){
    			$fields[] = "AdpCustomer.phone";
    			$headers[] ='Phone';
    		}
    		if( isset($queries['work_phone']) ){
    			$fields[] = "AdpCustomer.work_number";
    			$headers[] ='Work Number';
    		}
    		if( isset($queries['address']) ){
    			$fields[] = "AdpCustomer.address";
    			$headers[] ='Address';
    		}
    		if( isset($queries['city']) ){
    			$fields[] = "AdpCustomer.city";
    			$headers[] ='City';
    		}
    		if( isset($queries['state']) ){
    			$fields[] = "AdpCustomer.state";
    			$headers[] ='State';
    		}
    		if( isset($queries['zip']) ){
    			$fields[] = "AdpCustomer.zip";
    			$headers[] ='Zip';
    		}

            $conditions['AdpCustomer.modified >=']  = $start_date;
            $conditions['AdpCustomer.modified <=']  = $end_date;
            $conditions['AdpCustomer.email <>']  = "";
            $conditions['AdpCustomer.dealer_id']  = $this->Auth->user("dealer_id");

            $this->loadModel('AdpCustomer');
            $contacts = $this->AdpCustomer->find("all", array("order"=>"AdpCustomer.first_name", 'recursive'=> -1, 'fields'=>$fields,'conditions'=>$conditions));

            $output = fopen("php://output", "w");
            fputcsv($output, $headers);
            foreach($contacts as $contact){
                $row = array();
                foreach($contact['AdpCustomer'] as $key=>$value){
                    $row[] = $value;
                }
                fputcsv($output, $row);
            }
            fclose($output);
        } else {
    		if( isset($queries['first_name']) ){
    			$fields[] = "Contact.first_name";
    			$headers[] ='First Name';
    		}
    		if( isset($queries['last_name']) ){
    			$fields[] = "Contact.last_name";
    			$headers[] ='Last Name';
    		}
    		if( isset($queries['email']) ){
    			$fields[] = "Contact.email";
    			$headers[] ='Email';
    		}
    		if( isset($queries['mobile']) ){
    			$fields[] = "Contact.mobile";
    			$headers[] ='Cell';
    		}
    		if( isset($queries['phone']) ){
    			$fields[] = "Contact.phone";
    			$headers[] ='Phone';
    		}
    		if( isset($queries['work_number']) ){
    			$fields[] = "Contact.work_number";
    			$headers[] ='Work Number';
    		}
    		if( isset($queries['address']) ){
    			$fields[] = "Contact.address";
    			$headers[] ='Address';
    		}
    		if( isset($queries['city']) ){
    			$fields[] = "Contact.city";
    			$headers[] ='City';
    		}
    		if( isset($queries['state']) ){
    			$fields[] = "Contact.state";
    			$headers[] ='State';
    		}
    		if( isset($queries['zip']) ){
    			$fields[] = "Contact.zip";
    			$headers[] ='Zip';
    		}

    		if($lead_type != 'sold'){
    			if($lead_type == 'not_sold'){
    				$conditions['Contact.sales_step <>']  = "10";
    			}
    			$conditions['Contact.modified >=']  = $start_date;
    			$conditions['Contact.modified <=']  = $end_date;
    			$conditions['Contact.status <>']  = "Duplicate-Closed";
    			$conditions['Contact.email <>']  = "";
    			$conditions['Contact.company_id']  = $this->Auth->user("dealer_id");

    			$contacts = $this->Contact->find("all", array("order"=>"Contact.first_name", 'recursive'=> -1, 'fields'=>$fields,'conditions'=>$conditions));

    			$output = fopen("php://output", "w");
    			fputcsv($output, $headers);
    			foreach($contacts as $contact){
    				$row = array();
    				foreach($contact['Contact'] as $key=>$value){
    					$row[] = $value;
    				}
    				fputcsv($output, $row);
    			}
    			fclose($output);

    		}else if($lead_type == 'sold'){


    			$conditions['LeadSold.modified >=']  = $start_date;
    			$conditions['LeadSold.modified <=']  = $end_date;
    			$conditions['LeadSold.email <>']  = "";
    			$conditions['LeadSold.status <>']  = "Duplicate-Closed";
    			$conditions['LeadSold.company_id']  = $this->Auth->user("dealer_id");

    			$this->LeadSold->bindModel(array(
    				'belongsTo' => array('Contact')
    			));

    			$contacts = $this->LeadSold->find("all", array("order" => "LeadSold.first_name", 'fields' => $fields, 'conditions' => $conditions));

    			$output = fopen("php://output", "w");
    			fputcsv($output, $headers);

    			foreach($contacts as $contact){
    				$row = array();
    				foreach($contact['Contact'] as $key=>$value){
    					$row[] = $value;
    				}
    				fputcsv($output, $row);
    			}
    			fclose($output);
    		}
        }

		$this->autoRender = false;
	}
}
