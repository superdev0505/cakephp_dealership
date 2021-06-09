<?php
class KnowledgeBasesController extends AppController { 

   
    
    public function index() {
        $this->layout='knowledge_base';
        ///dashboard of knowledgeBase
        
    }
    
    
    public function savedata($id=null) {
        $this->autoRender=FALSE;
        $this->loadModel('KnowledgeBase');
        $data['KnowledgeBase']['content']=$this->request->query['content'];        
        $this->KnowledgeBase->id=$id;
        if($this->KnowledgeBase->save($data)){
            echo 'success';
            die();
        }else{
            echo 'Something Wrong!';
            die();
        }
    }
    
    
    
    //Top menu
    public function weblead_arrived() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
            
        
    }
    
    public function bdcset_leatappt() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    public function mgr_message() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    public function logchanges() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    public function account() {
             $this->layout='ajax';
        
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
             
    }
    
    public function message() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    
    
    
    public function support() {
             $this->layout='ajax';
        $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
    }
    
    public function dailychk() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
   
    public function logout() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    
    
    public function startlead() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
   
    public function open_month() {
             $this->layout='ajax';
        
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
             
    }
   
    public function closed_month() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
   
    public function sold_month() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
   
    public function pending_month() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    
    public function dormant() {
             $this->layout='ajax';
        
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
             
    }
    
    public function today_events() {
             $this->layout='ajax';
        
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
             
    }
    
    public function overdue_events() {
             $this->layout='ajax';
        
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
             
    }
    
    public function todays_lead() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    
    public function workload() {
             $this->layout='ajax';
        
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
             
    }
    
    
    public function real_time() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
             
        
    }
   
    public function recap() {
             $this->layout='ajax';
             
        $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
    }
   

    
    public function notworked_leads() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
   
    public function sales_step_search() {
             $this->layout='ajax';
             
             $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));
        
    }
    
    
    public function sales_status_search() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
   
    public function quick_lead_search() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
   
    public function vehicle_search() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function showroom() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
   
    public function mobile() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
   
    public function work_lead() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function view_web() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function view_phone() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function view_showroom() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function view_mobile() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function inbox() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function compose() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function email_setting() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function email_template() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function syncemail() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
   
    public function calender() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

    public function work_deal() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

    public function deal_fixed() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function master_report() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function drop_downs() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function vehicle_stats() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function sales_pipe_line() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function eblast_stats() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function daily_recap() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function nworked_leads() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function overview() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function inhouse_bdc() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function bdc_reports() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function add_ticket() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }
    
    public function about_kb() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

    
    public function invalid_lead() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

  
    public function dealer_setting() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

  
    public function leads_rules() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

  
    public function vehicle_info() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

  
    public function employees() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

  
    public function source_add() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

  
    public function lead_transfer() {
             $this->layout='ajax';
    $this->loadModel('KnowledgeBase');
            $data=  $this->KnowledgeBase->GetInsertdata($this->request->params['action']);
            $this->set(compact('data'));         
        
    }

}