<?php
class EmailSyncStatusController extends AppController {

    public $uses = array('Category','Trim','XmlInventory','MarineInventory');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index(){

        $this->layout = 'admin_default';

        $this->loadModel('Process');
        $this->Process->useDbConfig  =  'eblast_rds';

        $processes = $this->Process->find("all");

        $process_status = array();
        foreach($processes as $process){
            $diff_minute = round( (strtotime("now") - strtotime($process['Process']['start'])) / 60);
            if($process['Process']['in_progress'] == '1' && $diff_minute > 240){
                $process['Process']['warning'] = 1;
            }else{
                $process['Process']['warning'] = 0;
            }
            $process_status[ $process['Process']['id'] ] = $process;
        }
        $this->set('process_status', $process_status);


        //Single User Process
        $this->loadModel('EmailSetting');
        $this->EmailSetting->bindModel(array(
            'belongsTo'=>array('User'=>array('fields'=>array("User.id","User.first_name","User.last_name"))),
        ));
        $e_settings = $this->EmailSetting->find("all", array('conditions'=>array('EmailSetting.email_sync_inprogress' => 1)));
        // debug($e_settings);
        $e_settings_all = array();
        foreach($e_settings as $e_setting){
            $diff_minute = round( (strtotime("now") - strtotime($e_setting['EmailSetting']['last_check'])) / 60);
            if($e_setting['EmailSetting']['email_sync_inprogress'] == '1' && $diff_minute > 240){
                $e_setting['EmailSetting']['warning'] = 1;
            }else{
                $e_setting['EmailSetting']['warning'] = 0;
            }
            $e_settings_all[ $e_setting['EmailSetting']['id'] ] = $e_setting;
        }
        $this->set('e_settings_all', $e_settings_all);

    }

    public function reset_settings($process_id = null){

        $this->loadModel('EmailSetting');

        $this->EmailSetting->updateAll( 
            array('EmailSetting.email_sync_inprogress' => "0"), 
            array('EmailSetting.id' => $process_id )
        );
        $this->redirect(array('action' => 'index'));

    }

    public function reset($process_id = null){

        $this->loadModel('Process');
        $this->Process->useDbConfig = 'eblast_rds';

        $this->Process->updateAll( 
            array('in_progress' => "0", 'start' => null, 'stop' => null), 
            array('Process.id' => $process_id )
        );
        $this->redirect(array('action' => 'index'));

    }


    

}

?>
