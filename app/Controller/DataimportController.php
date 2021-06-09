<?php
ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'). PATH_SEPARATOR . ROOT .DS . 'app/Vendor/aws');
ini_set('memory_limit', '-1');
require ROOT . DS . 'app/Vendor/aws/aws-autoloader.php';

use Aws\S3\S3Client;
App::uses('CakeEmail', 'Network/Email');
class DataimportController extends AppController {

    public $uses = array('Category');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        // parent::beforeFilter();
        // $this->response->header('Access-Control-Allow-Origin: *');
    }

    public function upload_dump() {
        $this->layout = 'admin_default';
    }

    public function get_sperson_info($sperson,$dealerid) {

        $this->layout = '';
        $objTmp=$this->Session->read('objTmp');
        $this->loadModel($objTmp);
        $this->$objTmp->useDbConfig = 'importdb';
        //Configure::write('debug', 2);

        if (!empty($sperson) && $sperson != '') {

            $conditions = array($objTmp.'.' . $sperson . ' !=' => '');
            $spersoninfo = $this->$objTmp->find('all', array('conditions' => $conditions, 'fields' => array($objTmp.'.' . $sperson), 'recursive' => '-1', 'group' => $objTmp.'.' . $sperson));
			$this->set_dealer_connection($dealerid);
            $this->set('sperson', $sperson);
            $this->set('spersoninfo', $spersoninfo);
            $this->loadModel('User');
            $conditions = array('User.dealer_id' =>$dealerid);
            $userids = $this->User->find('all', array('conditions' => $conditions, 'fields' => array('User.id','User.first_name','User.last_name'), 'order'=>array('User.first_name','User.last_name'), 'recursive' => '-1'));
            $this->set('dealerid',$dealerid);
            $this->set('userids',$userids);
        } else {
            $this->autoRender = FALSE;

            return '';
        }
    }

     public function get_user_info($dealerid) {

        $this->layout = '';
       // $this->loadModel('Tmpimport');
       // $this->Tmpimport->useDbConfig = 'importdb';
        //Configure::write('debug', 2);

        if (!empty($dealerid) && $dealerid != '') {
			
			$this->set_dealer_connection($dealerid);
            $this->loadModel('User');
            $conditions = array('User.dealer_id' =>$dealerid);
            $userids = $this->User->find('all', array('conditions' => $conditions, 'fields' => array('User.id','User.first_name','User.last_name'), 'recursive' => '-1'));
            $this->set('dealerid',$dealerid);
            $this->set('userids',$userids);
        } else {
            $this->autoRender = FALSE;

            return '';
        }
    }

    public function get_source($source) {
        $this->layout = '';
        $objTmp=$this->Session->read('objTmp');
        $this->loadModel($objTmp);
        $this->loadModel('LeadSource');
        $this->$objTmp->useDbConfig = 'importdb';
        //$this->LeadSource->useDbConfig = 'importdb';


        if (!empty($source) && $source != '') {

            $conditions = array($objTmp.'.' . $source . ' !=' => '');
            $sourceinfo = $this->$objTmp->find('all', array('conditions' => $conditions, 'fields' => array($objTmp.'.' . $source), 'recursive' => '-1', 'group' => $objTmp.'.' . $source));

            $this->set('source', $source);
            $this->set('sourceinfo', $sourceinfo);


            //$this->ContactStatus->useTable = 'makes_match';
            //$allsource = $this->LeadSource->find('all', array('conditions' => array('LeadSource.dealer_id' => 0), 'order' => 'LeadSource.name ASC'));
            $allsource = $this->LeadSource->find('all', array('order' => 'LeadSource.name ASC'));
            $this->set('allsource', $allsource);
        } else {
            $this->autoRender = FALSE;

            return '';
        }
    }

    public function get_constatusid($constatusid) {
        $this->layout = '';
         $objTmp=$this->Session->read('objTmp');
        $this->loadModel($objTmp);
        $this->loadModel('ContactStatus');
        $this->$objTmp->useDbConfig = 'importdb';
       // $this->ContactStatus->useDbConfig = 'importdb';

        //Configure::write('debug', 2);

        if (!empty($constatusid) && $constatusid != '') {
            $conditions = array($objTmp.'.'.$constatusid . ' !=' => '');
            $constatusidinfo = $this->$objTmp->find('all', array('conditions' => $conditions, 'fields' => array($objTmp.'.' . $constatusid), 'recursive' => '-1', 'group' => $objTmp.'.' . $constatusid));
            $this->set('constatusid', $constatusid);
            $this->set('constatusidinfo', $constatusidinfo);
            ///load contact status id
            //$this->ContactStatus->useTable = 'makes_match';
            $allconids = $this->ContactStatus->find('all');
            $this->set('allconids', $allconids);
//        debug($allconids);
//        exit;
        } else {
            $this->autoRender = FALSE;
            return '';
        }
    }

    public function get_salesstep($salesstep) {
        $this->layout = '';
       $objTmp=$this->Session->read('objTmp');
        $this->loadModel($objTmp);
        $this->$objTmp->useDbConfig = 'importdb';

        //Configure::write('debug', 2);

        if (!empty($salesstep) && $salesstep != '') {
            $conditions = array($objTmp.'.' . $salesstep . ' !=' => '');
            $salesstepinfo = $this->$objTmp->find('all', array('conditions' => $conditions, 'fields' => array($objTmp.'.' . $salesstep), 'recursive' => '-1', 'group' => $objTmp.'.' . $salesstep));
            $this->set('salesstepinfo', $salesstepinfo);
            $this->set('salesstep', $salesstep);
        } else {
            $this->autoRender = FALSE;
            return '';
        }
    }

    public function get_leadstatus($leadstatus) {
        $this->layout = '';
         $objTmp=$this->Session->read('objTmp');
        $this->loadModel($objTmp);
       $this->$objTmp->useDbConfig = 'importdb';
//$this->ContactStatus->useDbConfig = 'importdb';
        //Configure::write('debug', 2);

        if (!empty($leadstatus) && $leadstatus != '') {
            $conditions = array($objTmp.'.' . $leadstatus . ' !=' => '');
            $leadstatusinfo = $this->$objTmp->find('all', array('conditions' => $conditions, 'fields' => array($objTmp.'.' . $leadstatus), 'recursive' => '-1', 'group' => $objTmp.'.' . $leadstatus));
            $this->set('leadstatusinfo', $leadstatusinfo);
            $this->set('leadstatus', $leadstatus);
        } else {
            $this->autoRender = FALSE;
            return '';
        }
    }

    public function multiexplode($delimiters, $string) {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return $launch;
    }

    function in_arrayi($needle, $haystack) {
        return in_array(strtolower($needle), array_map('strtolower', $haystack));
    }

    public function parse_name($oldname) {

        $sufixes = array('Jr', 'Jr.', 'Sr', 'Sr.', 'iii', 'ii');

        if ($oldname != '') {
            $oldname = preg_replace("/(&)/", " ", $oldname);
            $name_ar = $this->multiexplode(array(' ', ','), $oldname);
            $ar = array();
            $ret['suffix'] = '';
            foreach ($name_ar as $key => $value) {
                if ($value != '') {
                    if ($this->in_arrayi($value, $sufixes)) {
                        $ret['suffix'] = $value; //ucwords(strtolower($value));
                    } else {
                        $ar[] = ucwords(strtolower($value));
                    }
                }
            }
            if (strpos($oldname, ',') !== false) {
                $ret['first_name'] = (isset($ar[1])) ? $ar[1] : "";
                $ret['middle_name'] = (isset($ar[2])) ? $ar[2] : "";
                $ret['last_name'] = (isset($ar[0])) ? $ar[0] : "";
            } else {
                $ret['first_name'] = (isset($ar[0])) ? $ar[0] : "";
                $ret['middle_name'] = (isset($ar[2])) ? $ar[2] : "";
                $ret['last_name'] = (isset($ar[1])) ? $ar[1] : "";
            }

            return $ret;
        } else {
            return array("first_name" => '', "middle_name" => '', "last_name" => '', "suffix" => '');
        }
    }

    public function clean_s($output) {
        return preg_replace("/(')/", "", $output);
    }

    public function data_clean($id=null) {

//Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user
      $this->set('id',$id);

        ///tmp table name object
        $objTmp='Tmp'.$id.'import';
      $this->Session->write('objTmp',$objTmp);

        ini_set('max_execution_time', 0);
        $this->loadModel($objTmp);
        $this->loadModel('MakesMatch');
        $this->loadModel('LeadSource');
        $this->loadModel('User');
        $this->loadModel('Datamapping');
        ///$this->Tmpimport->useDbConfig = 'importdb';
       // $this->MakesMatch->useDbConfig = 'importdb';
       // $this->LeadSource->useDbConfig = 'importdb';
        $this->$objTmp->useDbConfig = 'importdb';
        $this->Datamapping->useDbConfig = 'importdb';
        $this->layout = 'admin_default';

        $allfields = array_keys($this->$objTmp->schema());
        $fields = $allfields;
        $afields = array_combine($allfields, $fields);
          file_get_contents("https://app.dealershipperformancecrm.com/managesvn/setdebug/0");
        $newfields = array('auto_id' => 'auto_id',
            'new_first_name' => 'new_first_name',
            'new_last_name' => 'new_last_name',
            'new_m_name' => 'new_m_name',
            'new_suffix' => 'new_suffix',
            'chk_duplicate' => 'chk_duplicate',
            'step_modifed' => 'step_modifed',
            'new_import' => 'new_import',
            'import_date' => 'import_date',
            'new_dealer_name' => 'new_dealer_name',
            'new_dealer_id' => 'new_dealer_id',
            'new_sales_step' => 'new_sales_step',
            'new_sales_status' => 'new_sales_status',
            'new_lead_status' => 'new_lead_status',
            'new_sales_source' => 'new_sales_source',
            'new_contact_status_id' => 'new_contact_status_id',
            'new_sperson' => 'new_sperson',
            'new_user_id' => 'new_user_id',
            'new_sold_date' => 'new_sold_date',
            'new_web_selection' => 'new_web_selection',
            'new_class' => 'new_class',
            'new_type' => 'new_type',
            'new_category' => 'new_category',
            'new_trade_selection' => 'new_trade_selection',
            'new_trade_class' => 'new_trade_class',
            'new_trade_type' => 'new_trade_type',
            'new_trade_category' => 'new_trade_category',
            'new_next_activity' => 'new_next_activity',
            'new_created' => 'new_created',
            'new_modified' => 'new_modified');

        $finalfields = array_diff($afields, $newfields);

        //$finalfields=  array_combine($allfields, $fields);
        $this->set('finalfields', $finalfields);

//d_type list
        $this->loadModel('MakesMatch');
        $this->MakesMatch->useTable = 'makes_match';
        $alldtypes = $this->MakesMatch->find('list', array(
            'fields' => array('MakesMatch.id', 'MakesMatch.d_type'),
            'conditions' => array('MakesMatch.d_type !=' => ''),
            'group' => array('MakesMatch.d_type')
                ));


        $alldtypes = array_values($alldtypes);
        $dtypes = $alldtypes;
        $finaldtypes = array_combine($alldtypes, $dtypes);
        $this->set('finaldtypes', $finaldtypes);
//         debug($finaldtypes);
//    exit('test');
//

        if ($this->request->is('post')) {


$isexist=$this->Datamapping->findByFileId($id);

$mappingdata['Datamapping']['file_id'] = $id;
$mappingdata['Datamapping']['dealer_id'] = $this->request->data['Dataimport']['new_dealer_id'];
$mappingdata['Datamapping']['dealer_name'] = $this->request->data['Dataimport']['new_dealer_name'];
$mappingdata['Datamapping']['fullname'] = $this->request->data['Dataimport']['fullname'];
$mappingdata['Datamapping']['fname'] = $this->request->data['Dataimport']['fname'];
$mappingdata['Datamapping']['lname'] = $this->request->data['Dataimport']['lname'];
$mappingdata['Datamapping']['mname'] = $this->request->data['Dataimport']['mname'];
$mappingdata['Datamapping']['suffix'] = $this->request->data['Dataimport']['suffix'];
$mappingdata['Datamapping']['phone'] = $this->request->data['Dataimport']['phone'];
$mappingdata['Datamapping']['mobile'] = $this->request->data['Dataimport']['mobile'];
$mappingdata['Datamapping']['work_num'] = $this->request->data['Dataimport']['work_num'];
$mappingdata['Datamapping']['created_date'] = $this->request->data['Dataimport']['created_date'];
$mappingdata['Datamapping']['modified_date'] = $this->request->data['Dataimport']['modified_date'];
$mappingdata['Datamapping']['nextactivity_date'] = $this->request->data['Dataimport']['nextactivity_date'];
$mappingdata['Datamapping']['year'] = $this->request->data['Dataimport']['year'];
$mappingdata['Datamapping']['unit_value'] = $this->request->data['Dataimport']['unit_value'];
$mappingdata['Datamapping']['condition'] = $this->request->data['Dataimport']['condition'];
$mappingdata['Datamapping']['model'] = $this->request->data['Dataimport']['model'];
$mappingdata['Datamapping']['d_type'] = $this->request->data['Dataimport']['d_type'];
$mappingdata['Datamapping']['make'] = $this->request->data['Dataimport']['make'];
$mappingdata['Datamapping']['trade_year'] = $this->request->data['Dataimport']['trade_year'];
$mappingdata['Datamapping']['trade_unit_value'] = $this->request->data['Dataimport']['trade_unit_value'];
$mappingdata['Datamapping']['trade_condition'] = $this->request->data['Dataimport']['trade_condition'];
$mappingdata['Datamapping']['trade_model'] = $this->request->data['Dataimport']['trade_model'];
$mappingdata['Datamapping']['trade_d_type'] = $this->request->data['Dataimport']['trade_d_type'];
$mappingdata['Datamapping']['trade_make'] = $this->request->data['Dataimport']['trade_make'];

///Final_stage Fields
$mappingdata['Datamapping']['email'] = $this->request->data['Dataimport']['email'];
$mappingdata['Datamapping']['fax'] = $this->request->data['Dataimport']['fax'];
$mappingdata['Datamapping']['best_time'] = $this->request->data['Dataimport']['best_time'];
$mappingdata['Datamapping']['dob'] = $this->request->data['Dataimport']['dob'];
$mappingdata['Datamapping']['address'] = $this->request->data['Dataimport']['address'];
$mappingdata['Datamapping']['city'] = $this->request->data['Dataimport']['city'];
$mappingdata['Datamapping']['state'] = $this->request->data['Dataimport']['state'];
$mappingdata['Datamapping']['zip'] = $this->request->data['Dataimport']['zip'];
$mappingdata['Datamapping']['county'] = $this->request->data['Dataimport']['county'];
$mappingdata['Datamapping']['country'] = $this->request->data['Dataimport']['country'];
$mappingdata['Datamapping']['vin'] = $this->request->data['Dataimport']['vin'];
$mappingdata['Datamapping']['odometer'] = $this->request->data['Dataimport']['odometer'];
$mappingdata['Datamapping']['stock_num'] = $this->request->data['Dataimport']['stock_num'];
$mappingdata['Datamapping']['vin_trade'] = $this->request->data['Dataimport']['vin_trade'];
$mappingdata['Datamapping']['odometer_trade'] = $this->request->data['Dataimport']['odometer_trade'];
$mappingdata['Datamapping']['stock_num_trade'] = $this->request->data['Dataimport']['stock_num_trade'];

 if (isset($this->request->data['notesfld']) && !empty($this->request->data['notesfld'])) {
     $mappingdata['Datamapping']['notesfld'] = json_encode($this->request->data['notesfld']);
 }


//debug($this->request->data);

if(isset($this->request->data['sperson_notexist'])){
$mappingdata['Datamapping']['sperson_notexist'] = $this->request->data['new_sperson_id'];

}else{
$mappingdata['Datamapping']['sperson'] = $this->request->data['Dataimport']['sperson'];
$mappingdata['Datamapping']['oldsperson_id'] = json_encode($this->request->data['oldsperson_id']);
$mappingdata['Datamapping']['sperson_id'] = json_encode($this->request->data['sperson_id']);
$mappingdata['Datamapping']['sperson_notexist'] = '0';

}

 if (isset($this->request->data['Dataimport']['contact_status_id']) && !empty($this->request->data['Dataimport']['contact_status_id'])) {
$mappingdata['Datamapping']['contact_status_id'] = $this->request->data['Dataimport']['contact_status_id'];
$mappingdata['Datamapping']['oldcontactstsid'] = json_encode($this->request->data['oldcontactstsid']);
$mappingdata['Datamapping']['newcontactstsid'] = json_encode($this->request->data['newcontactstsid']);
 }

 if (isset($this->request->data['Dataimport']['sales_step']) && !empty($this->request->data['Dataimport']['sales_step'])) {
$mappingdata['Datamapping']['sales_step'] = $this->request->data['Dataimport']['sales_step'];
$mappingdata['Datamapping']['oldsalesstep'] = json_encode($this->request->data['oldsalesstep']);
$mappingdata['Datamapping']['newsalesstep'] = json_encode($this->request->data['newsalesstep']);
 }

 if (isset($this->request->data['Dataimport']['lead_status']) && !empty($this->request->data['Dataimport']['lead_status'])) {
$mappingdata['Datamapping']['lead_status'] = $this->request->data['Dataimport']['lead_status'];
$mappingdata['Datamapping']['oldleadstatus'] = json_encode($this->request->data['oldleadstatus']);
$mappingdata['Datamapping']['newleadstatus'] = json_encode($this->request->data['newleadstatus']);
 }

 if (isset($this->request->data['Dataimport']['source']) && !empty($this->request->data['Dataimport']['source'])) {
$mappingdata['Datamapping']['source'] = $this->request->data['Dataimport']['source'];
$mappingdata['Datamapping']['newsource'] = json_encode($this->request->data['newsource']);
$mappingdata['Datamapping']['oldsource'] = json_encode($this->request->data['oldsource']);
$mappingdata['Datamapping']['newsource_input'] = json_encode($this->request->data['newsource_input']);
 }

 //debug($mappingdata);
 //debug($isexist);

           // exit('test');
        if (empty($isexist)) {
                $this->Datamapping->id = null;
                $this->Datamapping->save($mappingdata);
                $this->Session->setFlash(__('Data Cleaning Successfully saved!'), 'alertsuccess', array('class' => 'alert-success'));
                $this->render('confirm');
            } else {
                $this->Datamapping->id = $isexist['Datamapping']['id'];
                $this->Datamapping->save($mappingdata);
                $this->Session->setFlash(__('Data Cleaning Successfully saved!'), 'alertsuccess', array('class' => 'alert-success'));
                $this->render('confirm');
            }

          //  exit('test');




            //$this->redirect(array('controller' => 'Dataimport', 'action' => 'final_stage'));
            //exit('Data Cleaning Successfully Completed!');
        }
    }



    //import data Final stage, data will move into contact table.
    public function final_stage() {

        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user

        ini_set('max_execution_time', 0);
        date_default_timezone_set('America/Los_Angeles');
        $this->layout = 'admin_default';
        $this->loadModel('Tmpimport');
        $this->loadModel('Contact');
        $this->loadModel('LeadSold');
        $this->loadModel('History');
        $this->loadModel('Event');

        $this->$objTmp->useDbConfig = 'importdb';
        $this->Contact->useDbConfig = 'importdb';
        $this->LeadSold->useDbConfig = 'importdb';
        $this->History->useDbConfig = 'importdb';
        $this->Event->useDbConfig = 'importdb';

         /*debug($this->Session->read('Dataimport.phone_fld'));
         debug($this->Session->read('Dataimport.mobile_fld'));
         debug($this->Session->read('Dataimport.work_num_fld'));
         debug($this->Session->read('Dataimport.year_fld'));
         debug($this->Session->read('Dataimport.trade_year_fld'));
         debug($this->Session->read('Dataimport.unit_value_fld'));
         debug($this->Session->read('Dataimport.trade_unit_value_fld'));
         debug($this->Session->read('Dataimport.condition_fld'));
         debug($this->Session->read('Dataimport.trade_condition_fld'));
         debug($this->Session->read('Dataimport.model_fld'));
         debug($this->Session->read('Dataimport.trade_model_fld'));
         debug($this->Session->read('Dataimport.make_fld'));
         debug($this->Session->read('Dataimport.trade_make_fld'));
         exit('test');*/
 $isExistChk = $this->Tmpimport->find('count', array(
        'conditions' => array('Tmpimport.new_dealer_id >' =>0)
    ));

 if($isExistChk==0){
     //debug("testing more");

             $this->Session->setFlash(__("Dealer ID Can not Empty!"), 'alert', array('class' => 'alert-error'));
             $this->redirect(array('controller' => 'Dataimport', 'action' => 'data_clean'));
 }

        $allfields = array_keys($this->Tmpimport->schema());
        $fields = $allfields;
        $afields = array_combine($allfields, $fields);

        $newfields = array('auto_id' => 'auto_id',
            'new_first_name' => 'new_first_name',
            'new_last_name' => 'new_last_name',
            'new_m_name' => 'new_m_name',
            'new_suffix' => 'new_suffix',
            'chk_duplicate' => 'chk_duplicate',
            'step_modifed' => 'step_modifed',
            'import' => 'import',
            'import_date' => 'import_date',
            'new_dealer_name' => 'new_dealer_name',
            'new_dealer_id' => 'new_dealer_id',
            'new_sales_step' => 'new_sales_step',
            'new_sales_status' => 'new_sales_status',
            'new_lead_status' => 'new_lead_status',
            'new_sales_source' => 'new_sales_source',
            'new_contact_status_id' => 'new_contact_status_id',
            'new_sperson' => 'new_sperson',
            'new_user_id' => 'new_user_id',
            'new_sold_date' => 'new_sold_date',
            'new_web_selection' => 'new_web_selection',
            'new_class' => 'new_class',
            'new_type' => 'new_type',
            'new_category' => 'new_category',
            'new_trade_selection' => 'new_trade_selection',
            'new_trade_class' => 'new_trade_class',
            'new_trade_type' => 'new_trade_type',
            'new_trade_category' => 'new_trade_category',
            'new_next_activity' => 'new_next_activity',
            'new_created' => 'new_created',
            'new_modified' => 'new_modified');
        $finalfields = array_diff($afields, $newfields);
        //$finalfields=  array_combine($allfields, $fields);
        $this->set('finalfields', $finalfields);


        if ($this->request->is('post')) {


            if (!empty($this->request->data['notesfld'])) {
                $notes = '';
                $i = 0;
                foreach ($this->request->data['notesfld'] as $nvalue) {
                    if ($i == 0) {
                        $notes.="CONCAT('" . $nvalue . ": ', `" . $nvalue . "`)";
                    } else {
                        $notes.=",CONCAT('" . $nvalue . ": ', `" . $nvalue . "`)";
                    }
                    $i++;
                }
                $notes = "CONCAT_WS(','," . $notes . ")";
            } else {
                $notes = '';
            }

            // debug($notes);
//         exit('test');

            $import_date = date('Y-m-d H:i:s');
            $dealer_id = $this->Tmpimport->find('first');
            //$ref_num = $dealer_id['Tmpimport']['new_dealer_id'] . '_' . strtotime(date("Y-m-d H:i:s"));
            $ref_num = $dealer_id['Tmpimport']['new_dealer_id'] . '_' . strtotime(date("Y"));

            if ($this->Session->read('Dataimport.phone_fld')!='') {
                $phone= ', `' .$this->Session->read('Dataimport.phone_fld'). '`';

            } else {
                $phone = ",''";
            }
            if ($this->Session->read('Dataimport.mobile_fld')!='') {
                $mobile = ', `' .$this->Session->read('Dataimport.mobile_fld'). '`';

            } else {
                $mobile = ", ''";
            }
            if ($this->Session->read('Dataimport.work_num_fld')!='') {
                $wnum = ', `' .$this->Session->read('Dataimport.work_num_fld'). '`';

            } else {
                $wnum = ", ''";
            }
            $allPhone=$phone.$mobile.$wnum;

       if ($this->Session->read('Dataimport.year_fld')!='') {
                $year = ', `' .$this->Session->read('Dataimport.year_fld'). '`';

            } else {
                $year = ', 0';
            }
            if ($this->Session->read('Dataimport.make_fld')!='') {
                $make = ', `' .$this->Session->read('Dataimport.make_fld'). '`';

            } else {
                $make = ", 'any make'";
            }
            if ($this->Session->read('Dataimport.model_fld')!='') {
                $model = ', `' .$this->Session->read('Dataimport.model_fld'). '`';

            } else {
                $model = ", 'any model'";
            }
            if ($this->Session->read('Dataimport.condition_fld')!='') {
                $vcondition = ', `' .$this->Session->read('Dataimport.condition_fld'). '`';

            } else {
                $vcondition = ", 'Any'";
            }
            if ($this->Session->read('Dataimport.unit_value_fld')!='') {
                $vprice = ', `' .$this->Session->read('Dataimport.unit_value_fld'). '`';

            } else {
                $vprice = ", '0'";
            }
$vinfo=$year . $make . $model.$vcondition.$vprice;

            //Trade Year,make, model
            if ($this->Session->read('Dataimport.trade_year_fld')!='') {
                $year_trade = ', `' .$this->Session->read('Dataimport.trade_year_fld'). '`';

            } else {
                $year_trade = ', 0';
            }
            if ($this->Session->read('Dataimport.trade_make_fld')!='') {
                $make_trade = ', `' .$this->Session->read('Dataimport.trade_make_fld'). '`';

            } else {
                $make_trade = ", 'any make'";
            }
            if ($this->Session->read('Dataimport.trade_model_fld')!='') {
                $model_trade = ', `' .$this->Session->read('Dataimport.trade_model_fld'). '`';
            } else {
                $model_trade = ", 'any model'";
            }
            if ($this->Session->read('Dataimport.trade_condition_fld')!='') {
                $tcondition = ', `' .$this->Session->read('Dataimport.trade_condition_fld'). '`';
            } else {
                $tcondition = ", 'any'";
            }
            if ($this->Session->read('Dataimport.trade_unit_value_fld')!='') {
                $tprice = ', `' .$this->Session->read('Dataimport.trade_unit_value_fld'). '`';
            } else {
                $tprice = ", '0'";
            }
            //End Trade Year,make, model

            $trade_info = $year_trade . $make_trade . $model_trade.$tcondition.$tprice;


            $fldvalue = array('email','fax', 'best_time', 'dob', 'address', 'city', 'state', 'zip', 'county', 'country', 'vin', 'odometer', 'stock_num','vin_trade', 'odometer_trade', 'stock_num_trade', 'notes');
            $dymcfld = '';
            foreach ($fldvalue as $value) {

                if (isset($this->request->data['Dataimport'][$value]) && !empty($this->request->data['Dataimport'][$value])) {

                    $dymcfld.=', `' . $this->request->data['Dataimport'][$value] . '`';
                } else {

                    if ($value != 'notes') {
                        $dymcfld.=",''";
                    } else {
                        if($notes==''){
                            $dymcfld.=",''";
                        }  else {
                        $dymcfld.=',' . $notes;
                            }

                    }
                }
            }

            $insertContactTbl = "insert into contacts(`first_name`, `last_name`, `m_name`, `suffix`, `ref_num`, `gender`, `company_id`, `company`, `owner`, `sperson`, `owner_id`, `user_id`, `chk_duplicate`, `import`, `import_date`, `sales_step`, `status`, `lead_status`,  `source`, `contact_status_id`, `web_selection`, `class`, `type`, `category`, `trade_selection`, `class_trade`, `type_trade`, `category_trade`, `step_modified`, `created`, `modified`, `next_activity`, `phone`, `mobile`, `work_number`, `year`, `make`, `model`, `condition`, `unit_value`, `year_trade`, `make_trade`, `model_trade`,`condition_trade`,`trade_value`, `email`, `fax`, `best_time`, `dob`, `address`, `city`, `state`, `zip`, `county`, `country`, `vin`, `odometer`, `stock_num`,`vin_trade`,`odometer_trade`,`stock_num_trade`,`notes`) select `new_first_name`, `new_last_name`, `new_m_name`, `new_suffix`, '" . $ref_num . "' as `ref_num`,'Not Known' as `gender`, `new_dealer_id`, `new_dealer_name`, `new_sperson`, `new_sperson`, `new_user_id`, `new_user_id`, `chk_duplicate`, `import`, '" . $import_date . "' as `import_date`, `new_sales_step`, `new_sales_status`, `new_lead_status`, `new_sales_source`, `new_contact_status_id`, `new_web_selection`, `new_class`, `new_type`, `new_category`,`new_trade_selection`, `new_trade_class`, `new_trade_type`, `new_trade_category`, `new_modified`, `new_created`, `new_modified`, `new_next_activity`".$allPhone.$vinfo. $trade_info . $dymcfld . " from tmpimports";
//            $this->Contact->query($insertContactTbl);
//            exit('test');
//            debug($insertContactTbl);
//            exit('t3est');

            /*  $this->Contact->query($insertContactTbl);
              $this->loadModel('History');
              $addhistory="INSERT INTO `histories` ( `contact_id`, `sperson`,  `comment`,  `year`, `make`, `model`,  `status`, `h_type`, `created`, `modified`, `sales_step`, dealer_id) select `id`, `sperson`, `notes`, `year`, `make`, `model`, `status`, 'New CRM Move', `created`, DATE_FORMAT(`modified`, '%a-%b %d, %Y %h:%i %p'), `sales_step`, `company_id` from contacts where company_id = '".$dealer_id['Tmpimport']['new_dealer_id']."' and ref_num = '".$ref_num."'";
              $this->History->query($addhistory);
              //debug($addhistory);
              $this->loadModel('LeadSold');
              $movsold="insert into lead_solds (`contact_id`, `company_id` , `company` , `first_name` , `last_name` , `phone` , `mobile` , `email` , `address` , `city` , `state` , `zip` , `sales_step` , `status` , `source` , `contact_status_id` ,  `lead_status` ,  `owner` ,  `sperson` ,  `user_id` ,  `chk_duplicate` ,  `import` ,  `import_date` ,  `notes` ,  `condition` ,  `year` ,  `make` ,  `model` ,  `vin` ,  `category` ,  `type` ,  `class` ,  `web_selection` ,  `ref_num` ,  `created` ,  `modified` ) select  id, `company_id` ,  `company` ,  `first_name` ,  `last_name` ,  `phone` ,  `mobile` ,  `email` ,  `address` ,  `city` ,  `state` ,  `zip` ,  `sales_step` ,  `status` ,  `source` ,  `contact_status_id` ,  `lead_status` ,  `owner` ,  `sperson` ,  `user_id` ,  `chk_duplicate` ,  `import` ,  `import_date` ,  `notes` ,  `condition` ,  `year` ,  `make` ,  `model` ,  `vin` ,  `category` ,  `type` ,  `class` ,  `web_selection` ,  `ref_num` ,  `created` ,  `modified`   from contacts where company_id = '".$dealer_id['Tmpimport']['new_dealer_id']."' and ref_num = '".$ref_num."' and sales_step = '10'";
              // debug($movsold);
              $this->LeadSold->query($movsold); */

            try {

                //if( $this->Contact->query($insertContactTbl)){
                $this->Contact->query($insertContactTbl);
                $this->loadModel('History');
                $addhistory = "INSERT INTO `histories` ( `contact_id`, `sperson`,  `comment`,  `year`, `make`, `model`,  `status`, `h_type`, `created`, `modified`, `sales_step`, dealer_id) select `id`, `sperson`, `notes`, `year`, `make`, `model`, `status`, 'New CRM Move', `created`, DATE_FORMAT(`modified`, '%a - %b %d, %Y %h:%i %p'), `sales_step`, `company_id` from contacts where company_id = '" . $dealer_id['Tmpimport']['new_dealer_id'] . "' and ref_num = '" . $ref_num . "'";
                $this->History->query($addhistory);
                //debug($addhistory);
                $this->loadModel('LeadSold');
                $movsold = "insert into lead_solds (`contact_id`, `company_id` , `company` , `first_name` , `last_name` , `phone` , `mobile` , `email` , `address` , `city` , `state` , `zip` , `sales_step` , `status` , `source` , `contact_status_id` ,  `lead_status` ,  `owner` ,  `sperson` ,  `user_id` ,  `chk_duplicate` ,  `import` ,  `import_date` ,  `notes` ,  `condition` ,  `year` ,  `make` ,  `model` ,  `vin` ,  `category` ,  `type` ,  `class` ,  `web_selection` ,  `ref_num` ,  `created` ,  `modified`, `year_trade`, `make_trade`, `model_trade`, `class_trade`, `type_trade`, `category_trade`,`condition_trade`,`trade_value`,`vin_trade`,`odometer_trade`,`stock_num_trade`) select  id, `company_id` ,  `company` ,  `first_name` ,  `last_name` ,  `phone` ,  `mobile` ,  `email` ,  `address` ,  `city` ,  `state` ,  `zip` ,  `sales_step` ,  `status` ,  `source` ,  `contact_status_id` ,  `lead_status` ,  `owner` ,  `sperson` ,  `user_id` ,  `chk_duplicate` ,  `import` ,  `import_date` ,  `notes` ,  `condition` ,  `year` ,  `make` ,  `model` ,  `vin` ,  `category` ,  `type` ,  `class` ,  `web_selection` ,  `ref_num` ,  `created` ,  `modified`, `year_trade`, `make_trade`, `model_trade`, `class_trade`, `type_trade`, `category_trade`,`condition_trade`,`trade_value`,`vin_trade`,`odometer_trade`,`stock_num_trade` from contacts where company_id = '" . $dealer_id['Tmpimport']['new_dealer_id'] . "' and ref_num = '" . $ref_num . "' and sales_step = '10'";
// debug($movsold);
                $this->LeadSold->query($movsold);


                $this->loadModel('Event');
                $addevent = "INSERT INTO `events` (`contact_id`, `dealer_id`, `event_type_id`, `title`, `details`, `end`, `start`,  `status`, `all_day`, `active`, `user_id`, `first_name`, `last_name`, `sperson`, `hide`,`logged_user_id`, `email`, `phone`, `mobile`,`form_used`, `created`, `modified`, `customer_showed`) select `id`, `company_id`, '13', 'Phone Call Out', 'Call Out to Customer- ', DATE_ADD(`next_activity`, INTERVAL 15 MINUTE), `next_activity`,'Scheduled', '0', '1', `user_id`, `first_name`, `last_name`, `sperson`, '0', null, `email`, `phone`, `mobile`, 'short', `created`, `created`, '0' from contacts where company_id = '" . $dealer_id['Tmpimport']['new_dealer_id'] . "' and ref_num = '" . $ref_num . "' and (`next_activity` != '0000-00-00 00:00:00' OR `next_activity` != '')";
                $this->Event->query($addevent);

                $this->render('confirm');
//           }else{
//     $this->Session->setFlash(__('Sorry, Data can not move.'), 'alert', array('class' => 'alert-error'));
//    $this->redirect(array('controller' => 'Dataimport', 'action' => 'final_stage'));
//           }
            } catch (Exception $e) {
                $error = 'Error during moving data: ' . $e->getMessage();
                $this->Session->setFlash(__($error), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'final_stage'));
            }


            // debug($insertContactTbl);
            //exit('test');
        }
    }

    public function testimport() {

        $handle = fopen(WWW_ROOT . "files" . DS . "todo" . DS . "inputfile.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                // process the line read.
            }

            fclose($handle);
        } else {
            // error opening the file.
        }

        exit('test');
        /*
          // if ($this->request->is('post')) {
          ini_set('max_execution_time', 0);
          //$handle = fopen($this->request->data['Dataimport']['file']["tmp_name"], "r");
          //$inputFileName = './sampleData/example1.xls';
          App::import('Vendor', 'phpexcel/Classes/PHPExcel/IOFactory');
          date_default_timezone_set('America/Los_Angeles');
          //  Read your Excel workbook
          try {
          $inputFileType = PHPExcel_IOFactory::identify($this->request->data['Dataimport']['file']["tmp_name"]);
          $objReader = PHPExcel_IOFactory::createReader($inputFileType);
          $objPHPExcel = $objReader->load($this->request->data['Dataimport']['file']["tmp_name"]);
          $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

          if (!empty($sheetData)) {

          foreach ($sheetData[1] as $value) {
          $header[] = str_replace(array(" "), "_", trim($value));
          }

          debug($header);
          }


          exit('test');
          } catch (Exception $e) {
          $error = 'Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage();
          $this->Session->setFlash(__($error), 'alert', array('class' => 'alert-error'));
          $this->redirect(array('controller' => 'Dataimport', 'action' => 'importdump'));
          } */


        // }
    }


    public function tests3(){

         $this->layout = 'admin_default';
          ini_set('max_execution_time', 0);
         //$filename = WWW_ROOT . "files" . DS . "todo" . DS . "ActiveFindlayRV.csv";
            // open the file
            /*$handle = fopen("https://auto-import-files.s3.amazonaws.com/autoimport_55dca6e9cc71a_test.csv", "r");
              // read the 1st row as headings
              $header = fgetcsv($handle);
              $data = array();
              // read each data row in the file
              while (($row = fgetcsv($handle)) !== FALSE) {
              //$i++;
              $arrcom['Tmpimport'] = array_combine($header, $row);
              $data[] = $arrcom;
              }
              // close the file
              fclose($handle);

              debug($arrcom);
              */

       // $file=file_get_contents("https://auto-import-files.s3.amazonaws.com/autoimport_55dca6e9cc71a_test.csv");
        //$filename  = "autoimport_55dca6e9cc71a_test.csv";
        $filename  = "autoimport_55dcc02c1ed65_TLP_data_dump_WaukonHD_1535_20150731084430_2.csv";
        $filepath=WWW_ROOT . "files" . DS . "autoimport" . DS .$filename;
		/*$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "auto-import-files";

		$result = $client->getObject(array(
		    'Bucket' => $bucket,
		    'Key'    => $filename,
                    'SaveAs' => $filepath
		));*/
                //exit('ok');
                 /*$this->response->body($result['Body']);
	    $this->response->download($filename);
	    return $this->response;*/
//                debug($result);
//                exit('test');
	    //$this->response->body($result['Body']);
        //$filename = WWW_ROOT . "files" . DS . "autoimport" . DS . "test.csv";
        //$filename = "auto-import-files.s3.amazonaws.com/autoimport_55dca6e9cc71a_test.csv";
               App::import('Vendor', 'phpexcel/Classes/PHPExcel/IOFactory');
            date_default_timezone_set('America/Los_Angeles');
//  Read your Excel workbook
            try {
                //exit('test11');
                $inputFileType = PHPExcel_IOFactory::identify($filepath);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($filepath);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, FALSE, false, true);
print_r('test22');
                if (!empty($sheetData)) {
                    $i = 1;
                    $data = array();
                    foreach ($sheetData as $value) {

                        if ($i == 1) {
                            foreach ($value as $head) {
                                $header[] = str_replace(array(" ", "/", "%", "#", "-", "&", "$", "@", "!", ";"), "", trim($head));



                            }
//
//                      echo '<pre>';
//                        print_r($header);
//                        exit('stest333');

                        } else {
                            $arrcom['Tmpimport'] = array_combine($header, $value);
                            $data[] = $arrcom;
                        }
                        $i++;
                    }

                    //debug($header);
                    //debug($data);
                }

                //exit('test');
            } catch (Exception $e) {
                $error = 'Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage();
                debug($error);
                exit('ddddddtest');
                $this->Session->setFlash(__($error), 'alert', array('class' => 'alert-error'));
                //$this->redirect(array('controller' => 'Dataimport', 'action' => 'tests3'));
            }
//            echo '<pre>';
//            print_r($header);
//              exit('stest');

              Configure::write('debug', 2);
            //$cachePaths = array('views', 'persistent', 'models');
            $cachePaths = array('models');
            foreach ($cachePaths as $config) {
                clearCache(null, $config);
            }

//
//         debug($data);
//
//        exit('test');
            /* Load Model datasource */

            App::import('Model', 'ConnectionManager');
            $con = new ConnectionManager;
            $cn = $con->getDataSource('default');
            //$cn = $con->getDataSource('importdb');
            /// User table schema
            $sql = "DROP TABLE IF EXISTS tmpimports";
            if ($cn->query($sql)) {
                debug('exists');
            } else {
                debug('not exists');
            }

            // for each header field
            foreach ($header as $k => $head) {
                $allcolumns.="`" . $head . "` VARCHAR(255) DEFAULT NULL,";
            }


            $additFields = $allcolumns . "new_first_name varchar(250) ,
new_last_name varchar(250) ,
new_m_name varchar(250) ,
new_suffix varchar(250) ,
chk_duplicate tinyint(1) DEFAULT 0,
step_modifed datetime ,
import varchar(10)  DEFAULT 'Y',
import_date datetime,
new_dealer_name varchar(250) ,
new_dealer_id varchar(100) ,
new_sales_step varchar(250) ,
new_sales_status varchar(250) ,
new_lead_status varchar(250) ,
new_sales_source varchar(250) ,
new_contact_status_id int ,
new_sperson varchar(250) ,
new_user_id int ,
new_sold_date datetime  ,
new_web_selection varchar(200) ,
new_class varchar(200) ,
new_type varchar(200) ,
new_category varchar(200) ,
new_trade_selection varchar(200) ,
new_trade_class varchar(200) ,
new_trade_type varchar(200) ,
new_trade_category varchar(200) ,
new_next_activity datetime  ,
new_created datetime  ,
new_modified datetime  ,";

            $sql = "CREATE TABLE tmpimports(
          auto_id INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
          " . $additFields . " PRIMARY KEY ( `auto_id` )
          )";

            if ($cn->query($sql)) {
                echo('done');
            } else {
                echo('Not...');
            }

            Configure::write('Cache.disable', true);

            $this->loadModel('Tmpimport');
            //$this->Tmpimport->useDbConfig = 'importdb';
            if ($this->Tmpimport->saveAll($data)) {
                exit('test , all is done.');
                /*$this->Session->setFlash(__('Import Success.'), 'alertsuccess', array('class' => 'alert-success'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'data_clean'));*/
            } else {
                $this->Session->setFlash(__('Unable to Import!'), 'alert', array('class' => 'alert-error'));
                //$this->redirect(array('controller' => 'projects', 'action' => 'adminindex'));
            }

    }



public function uploadfile() {


    //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user

    $this->layout = 'admin_default';
                ini_set('max_execution_time', 0);
		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "auto-import-files";


		App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
    	//$bucket = 'lead-assets';
    	$success_action_redirect = "https://app.dealershipperformancecrm.com/Dataimport/importdump/";
    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
		//$s3policy->addCondition('', 'acl', 'private')
		$s3policy->addCondition('', 'acl', 'public-read')
	         ->addCondition('', 'bucket', $bucket)
	         ->addCondition('starts-with', '$key', '')
	         ->addCondition('starts-with', '$Content-Type', '')
	         ->addCondition('', 'success_action_redirect', $success_action_redirect);

		$policy = $s3policy->getPolicy(true);
		$signature = $s3policy->getSignedPolicy();

		$this->set('policy',$policy);
		$this->set('signature',$signature);
		$this->set('bucket',$bucket);

		$filename =  uniqid("impt_")."_";
		$this->set('filename',$filename);

    }



            //import data from different files into RDS.
    public function importdump() {
        $this->layout = 'admin_default';
// var_dump($this->request);
// exit('test');

      //  if ($this->request->is('post')) {
            ini_set('max_execution_time', 0);
//    debug($this->request->data);
//    exit('test');
            //$filename = WWW_ROOT . "files" . DS . "todo" . DS . "ActiveFindlayRV.csv";
            // open the file
            /* $handle = fopen($this->request->data['Dataimport']['file']["tmp_name"], "r");
              // read the 1st row as headings
              $header = fgetcsv($handle);
              $data = array();
              // read each data row in the file
              while (($row = fgetcsv($handle)) !== FALSE) {
              //$i++;
              $arrcom['Tmpimport'] = array_combine($header, $row);
              $data[] = $arrcom;
              }
              // close the file
              fclose($handle);

              debug($arrcom);
              exit('stest');
             */

$filename=$this->request->query['key'];
$filepath=WWW_ROOT . "files" . DS . "autoimport" . DS .$filename;

//Save file in Server.
// $client = S3Client::factory(array(
//     		'key'    => 'AKIAJCHHC37LYOABAIIQ',
//     		'secret' => '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',
// 		));
// 		$bucket = "auto-import-files";

// 		$result = $client->getObject(array(
// 		    'Bucket' => $bucket,
// 		    'Key'    => $filename,
//                     'SaveAs' => $filepath
// 		));


            App::import('Vendor', 'phpexcel/Classes/PHPExcel/IOFactory');
            date_default_timezone_set('America/Los_Angeles');
//  Read your Excel workbook
            try {
                //$inputFileType = PHPExcel_IOFactory::identify($this->request->data['Dataimport']['file']["tmp_name"]);
                $inputFileType = PHPExcel_IOFactory::identify($filepath);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($filepath);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, FALSE, false, true);

                //debug($sheetData[1]);
            if (in_array(null, $sheetData[1])) {
                    //debug('test2222333333');
                 $this->Session->setFlash(__("Column Name Can not Empty!"), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'uploadfile'));
                    }

                if (!empty($sheetData)) {
                    $i = 1;
                    $data = array();
                    foreach ($sheetData as $value) {

                        if ($i == 1) {
                            foreach ($value as $head) {
                                $header[] = str_replace(array(" ", "/", "%", "#", "-", "&", "$", "@", "!", ";","_"), "", trim($head));
                            }
                           // debug($header);
                    if (in_array(null, $header)) {
                    $this->Session->setFlash(__("Column Name Can not Empty!"), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'uploadfile'));
                    }

                        } else {
                            $arrcom['Tmpimport'] = array_combine($header, $value);
                            $data[] = $arrcom;
                        }
                        $i++;
                    }

                    //debug($header);
                if (empty($data)) {
                  $this->Session->setFlash(__("No Data Found in Your File!"), 'alert', array('class' => 'alert-error'));
                    $this->redirect(array('controller' => 'Dataimport', 'action' => 'uploadfile'));
                }

//                    debug($data);
//                    exit('test');
                }

                //exit('test');
            } catch (Exception $e) {
                $error = 'Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage();
                $this->Session->setFlash(__($error), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'uploadfile'));
            }


            Configure::write('debug', 2);
            //$cachePaths = array('views', 'persistent', 'models');
            $cachePaths = array('models');
            foreach ($cachePaths as $config) {
                clearCache(null, $config);
            }

//
//         debug($data);
//        exit('test');
            /* Load Model datasource */

            App::import('Model', 'ConnectionManager');
            $con = new ConnectionManager;
           $cn = $con->getDataSource('default');
           //$cn = $con->getDataSource('importdb');
            /// User table schema
            $sql = "DROP TABLE IF EXISTS tmpimports";
            if ($cn->query($sql)) {
                debug('exists');
            } else {
                debug('not exists');
            }

            // for each header field
            foreach ($header as $k => $head) {
                $allcolumns.="`" . $head . "` VARCHAR(255) DEFAULT NULL,";
            }


            $additFields = $allcolumns . "new_first_name varchar(250) ,
new_last_name varchar(250) ,
new_m_name varchar(250) ,
new_suffix varchar(250) ,
chk_duplicate tinyint(1) DEFAULT 0,
step_modifed datetime ,
import varchar(10)  DEFAULT 'Y',
import_date datetime,
new_dealer_name varchar(250) ,
new_dealer_id varchar(100) ,
new_sales_step varchar(250) ,
new_sales_status varchar(250) ,
new_lead_status varchar(250) ,
new_sales_source varchar(250) ,
new_contact_status_id int ,
new_sperson varchar(250) ,
new_user_id int ,
new_sold_date datetime  ,
new_web_selection varchar(200) ,
new_class varchar(200) ,
new_type varchar(200) ,
new_category varchar(200) ,
new_trade_selection varchar(200) ,
new_trade_class varchar(200) ,
new_trade_type varchar(200) ,
new_trade_category varchar(200) ,
new_next_activity datetime  ,
new_created datetime  ,
new_modified datetime  ,";

            $sql = "CREATE TABLE tmpimports(
          auto_id INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
          " . $additFields . " PRIMARY KEY ( `auto_id` )
          )";

            if ($cn->query($sql)) {
                echo('done');
            } else {
                echo('Not...');
            }

            Configure::write('Cache.disable', true);

            $this->loadModel('Tmpimport');
            //$this->Tmpimport->useDbConfig = 'importdb';
            if ($this->Tmpimport->saveAll($data)) {
                $this->Session->setFlash(__('Import Success.'), 'alertsuccess', array('class' => 'alert-success'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'data_clean'));
            } else {
                $this->Session->setFlash(__('Unable to Import!'), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'uploadfile'));
            }

            //$allfields=array_keys($this->Tmpimport->schema());
//        debug($allfields);
//
//        exit('test');
        //}
    }

        public function file_status()
	{
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}

         Configure::write('debug', 2);

		//Check Master or admin user
		$this->layout='admin_default';

              $this->loadModel('Fileimportstatus');
              $this->loadModel('Datamapping');
              $this->Fileimportstatus->bindModel(
        array('hasOne' => array(
                'Datamapping' => array(
                    'className' => 'Datamapping',
                    'foreignKey' => 'file_id'
                )
            )
        )
    );
	$this->Fileimportstatus->useDbConfig = 'importdb';
	$this->Datamapping->useDbConfig = 'importdb';
		/*$vals = $this->Fileimportstatus->find('all', array( 'conditions'=>array(
			"Fileimportstatus.status" => 0
		)));  */
                $vals = $this->Fileimportstatus->find('all', array( 'order'=>array(
			"Fileimportstatus.id DESC"
		)));

//              debug($vals);
//              exit('test');

                $this->set('vals',$vals);



	}



   public function data_status() {
        //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user
        $this->layout = 'admin_default';

        $this->loadModel('Tmp3imports');
           $this->paginate = array(
            'order' => array('Tmp3imports.auto_id'=>'ASC'),
            'limit' => 2,
        );
        $data = $this->Paginate('Tmp3imports');
        debug($data);
        $this->set('allfields',array_keys($data[0][Tmp3imports]));
        exit('test');

    }




    public function devteam_uploadfile() {


    //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user

    $this->layout = 'admin_default';
                ini_set('max_execution_time', 0);
		$client = S3Client::factory(array(
    		'key'    => 'AKIAJCHHC37LYOABAIIQ',
    		'secret' => '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',
		));
		$bucket = "auto-import-files";


		App::import('Vendor', 'PostPolicy', array('file' => 'PostPolicy/PostPolicy.php'));
    	//$bucket = 'lead-assets';
    	$success_action_redirect = "https://app.dealershipperformancecrm.com/Dataimport/devteam_importdump/";
    	$s3policy = new Aws_S3_PostPolicy('AKIAJCHHC37LYOABAIIQ', 'hoZWyqqE+ftesS+oy7aPrfxFC4kbvoPC3fU+xbs0', $bucket, 86400);
		//$s3policy->addCondition('', 'acl', 'private')
		$s3policy->addCondition('', 'acl', 'public-read')
	         ->addCondition('', 'bucket', $bucket)
	         ->addCondition('starts-with', '$key', '')
	         ->addCondition('starts-with', '$Content-Type', '')
	         ->addCondition('', 'success_action_redirect', $success_action_redirect);

		$policy = $s3policy->getPolicy(true);
		$signature = $s3policy->getSignedPolicy();

		$this->set('policy',$policy);
		$this->set('signature',$signature);
		$this->set('bucket',$bucket);
         if ($this->request->is('post')) {
            if (!empty($this->request->data['rowid'])) {

                $filename = uniqid("impt_") . "_";
                $this->set('filename', 'rowid_' . $this->request->data['rowid'] . '_' . $filename);
            } else {

                $filename = uniqid("impt_") . "_";
                $this->set('filename', $filename);
            }
        } else {
            $filename = uniqid("impt_") . "_";
            $this->set('filename', $filename);
        }
    }

    public function duplicate_upload() {


    //Check Master or admin user
        $admin_user_info = $this->Auth->User();
        if ($admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1') {
            $this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
        }
        //Check Master or admin user

    $this->layout = 'admin_default';

    }


      //fileName save in fileimportstatus table
    public function devteam_importdump() {
        $this->layout = 'admin_default';
        $this->loadModel('Fileimportstatus');
        $this->Fileimportstatus->useDbConfig = 'importdb';
        /*$filename = $this->request->query['key'];
        $filepath = WWW_ROOT . "files" . DS . "autoimport" . DS . $filename;
        $client = S3Client::factory(array(
          'key' => 'AKIAJCHHC37LYOABAIIQ',
          'secret' => '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',
          ));
          $bucket = "auto-import-files";

          $result = $client->getObject(array(
          'Bucket' => $bucket,
          'Key' => $filename,
          'SaveAs' => $filepath
          ));

        exit('testddd');*/
        $duplicateChk=  explode('_', $this->request->query['key']);
        if($duplicateChk[0]=='rowid'){
            $data['Fileimportstatus']['duplicate_rowid'] = $duplicateChk[1];
        }

        $data['Fileimportstatus']['filename'] = $this->request->query['key'];
        $this->Fileimportstatus->save($data);
        $this->set('filename',$this->request->query['key']);
        $this->redirect(array('controller' => 'Dataimport', 'action' => 'file_status'));
       // exit('test');

    }

  //for Devteam import data from different files into RDS.
    public function Old_devteam_importdump() {
        $this->layout = 'admin_default';
        //$this->autoRender=FALSE;
        //ini_set('max_execution_time', 0);
        $filename = $this->request->query['key'];



        //$filepath = WWW_ROOT . "files" . DS . "autoimport" . DS . $filename;
        //$filepath ="https://auto-import-files.s3.amazonaws.com/".$filename;

        $filepath=file_get_contents("https://auto-import-files.s3.amazonaws.com/".$filename);
//        debug($file);
//        exit('test');
//Save file in Server.
        /* $client = S3Client::factory(array(
          'key' => 'AKIAJCHHC37LYOABAIIQ',
          'secret' => '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',
          ));
          $bucket = "auto-import-files";

          $result = $client->getObject(array(
          'Bucket' => $bucket,
          'Key' => $filename,
          'SaveAs' => $filepath
          )); */


        App::import('Vendor', 'phpexcel/Classes/PHPExcel/IOFactory');
        date_default_timezone_set('America/Los_Angeles');
//  Read your Excel workbook
        try {
            //$inputFileType = PHPExcel_IOFactory::identify($this->request->data['Dataimport']['file']["tmp_name"]);
            $inputFileType = PHPExcel_IOFactory::identify($filepath);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($filepath);
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, FALSE, false, true);
            //debug($sheetData[1]);
            if (in_array(null, $sheetData[1])) {
                //debug('test2222333333');
                $this->Session->setFlash(__("Column Name Can not Empty!"), 'alert', array('class' => 'alert-error'));
                $this->redirect(array('controller' => 'Dataimport', 'action' => 'uploadfile'));
            }

            if (!empty($sheetData)) {
                $i = 1;
                $data = array();
                foreach ($sheetData as $value) {

                    if ($i == 1) {
                        foreach ($value as $head) {
                            $header[] = str_replace(array(" ", "/", "%", "#", "-", "&", "$", "@", "!", ";", "_"), "", trim($head));
                        }
                        // debug($header);
                        if (in_array(null, $header)) {
                            $this->Session->setFlash(__("Column Name Can not Empty!"), 'alert', array('class' => 'alert-error'));
                            $this->redirect(array('controller' => 'Dataimport', 'action' => 'uploadfile'));
                        }
                    } else {
                        $arrcom['Tmpimport'] = array_combine($header, $value);
                        $data[] = $arrcom;

                        //$data[] = array_combine($header, $value);
                    }
                    $i++;
                }

                //debug($header);
                if (empty($data)) {
                    $this->Session->setFlash(__("No Data Found in Your File!"), 'alert', array('class' => 'alert-error'));
                    $this->redirect(array('controller' => 'Dataimport', 'action' => 'devteam_uploadfile'));
                }

//                    debug($data);
//                    exit('test');
            }

            //exit('test');
        } catch (Exception $e) {
            $error = 'Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage();
            $this->Session->setFlash(__($error), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'Dataimport', 'action' => 'devteam_uploadfile'));
        }
        debug($data);
        exit('test');

        Configure::write('debug', 2);
        //$cachePaths = array('views', 'persistent', 'models');
        $cachePaths = array('models');
        foreach ($cachePaths as $config) {
            clearCache(null, $config);
        }

//

        /* Load Model datasource */

        App::import('Model', 'ConnectionManager');
        $con = new ConnectionManager;
        //$cn = $con->getDataSource('default');
        $cn = $con->getDataSource('importdb');
        /// User table schema
        $sql = "DROP TABLE IF EXISTS tmpimports";
        if ($cn->query($sql)) {
            debug('exists');
        } else {
            debug('not exists');
        }

        // for each header field
        foreach ($header as $k => $head) {
            $allcolumns.="`" . $head . "` VARCHAR(255) DEFAULT NULL,";
        }


        $additFields = $allcolumns . "new_first_name varchar(250) ,
new_last_name varchar(250) ,
new_m_name varchar(250) ,
new_suffix varchar(250) ,
chk_duplicate tinyint(1) DEFAULT 0,
step_modifed datetime ,
import varchar(10)  DEFAULT 'Y',
import_date datetime,
new_dealer_name varchar(250) ,
new_dealer_id varchar(100) ,
new_sales_step varchar(250) ,
new_sales_status varchar(250) ,
new_lead_status varchar(250) ,
new_sales_source varchar(250) ,
new_contact_status_id int ,
new_sperson varchar(250) ,
new_user_id int ,
new_sold_date datetime  ,
new_web_selection varchar(200) ,
new_class varchar(200) ,
new_type varchar(200) ,
new_category varchar(200) ,
new_trade_selection varchar(200) ,
new_trade_class varchar(200) ,
new_trade_type varchar(200) ,
new_trade_category varchar(200) ,
new_next_activity datetime  ,
new_created datetime  ,
new_modified datetime  ,";

        $sql = "CREATE TABLE tmpimports(
          auto_id INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
          " . $additFields . " PRIMARY KEY ( `auto_id` )
          )";

        if ($cn->query($sql)) {
            echo('done');
        } else {
            echo('Not...');
        }

        Configure::write('Cache.disable', true);

        $this->loadModel('Tmpimport');
        $this->Tmpimport->useDbConfig = 'importdb';


        /*$allval = '';
        $j = 1;
        foreach ($header as $fldvalue) {
            if ($j == 1) {
                //$allval='$svalue["'.$fldvalue.'"]';
                $insertFields = '`' . $fldvalue . '`';
            } else {
                //$allval.=', $svalue["'.$fldvalue.'"]';
                $insertFields.=', `' . $fldvalue . '`';
            }
            $j++;
        }
      //  debug($allval);
       // debug($insertFields);


        foreach ($data as $svalue) {

            //debug($svalue);
            $k = 1;
            foreach ($header as $fldvalue) {
                if ($k == 1) {
                    $allval = "'" . $svalue[$fldvalue] . "'";
                } else {
                    $allval.=", '" . $svalue[$fldvalue] . "'";
                }
                $k++;
            }
            $sql = 'insert into `tmpimports` (' . $insertFields . ') VALUES (' . $allval . ')';
           // echo $sql;
            $this->Tmpimport->query($sql);
        }
        exit('yes it is.');*/




      $this->Tmpimport->saveAll($data);
       mail("kodegeek12@gmail.com","My subject","Testing Import message","From: bahar.iiuc@gmail.com");
        exit('all is well.');

        if ($this->Tmpimport->saveAll($data)) {
            $this->Session->setFlash(__('Import Success.'), 'alertsuccess', array('class' => 'alert-success'));
            exit('all is well.');
//$this->redirect(array('controller' => 'Dataimport', 'action' => 'data_clean'));
        } else {
            $this->Session->setFlash(__('Unable to Import!'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('controller' => 'Dataimport', 'action' => 'devteam_uploadfile'));
        }

    }

}

?>
