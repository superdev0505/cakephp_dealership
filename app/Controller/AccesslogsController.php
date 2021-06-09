<?php
App::uses('CakeEmail', 'Network/Email');

class AccesslogsController extends AppController {

	public function index() {
		$this->layout='default_new';
	}
	private function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}
	
	public function adminindex() {
             $limit=100;
           //  $limit=1;
             $this->set('today','');
//            debug($this->request->pass);
//            exit('test');
            $this->loadModel('AccessLog');
		//Check Master or admin user
		$admin_user_info = $this->Auth->User();
		if( $admin_user_info['group_id'] != '9' && $admin_user_info['group_id'] != '1'    ){
			$this->Session->setFlash(__('You are not authorised to access this page'), 'session_message', array('class' => 'alert-error'));
			$this->redirect(array('controller' => 'adminhome', 'action' => 'login'));
		}
		//Check Master or admin user
if(empty($this->request->pass)){
                
      if (isset($this->request->data['supports']['select_date']) && !empty($this->request->data['supports']['select_date'])) {
            
          $date = date('Y-m-d', strtotime($this->request->data['supports']['select_date']));
            //$supports = $this->AccessLog->find('all', array('order' => 'AccessLog.id DESC', 'conditions' => array('DATE(AccessLog.created)' => $date)));
            
            
            $total_supports = $this->AccessLog->find('count', array('conditions' => array('DATE(AccessLog.created)' => $date)));
            
            $this->paginate = array(
			'conditions' => array('DATE(AccessLog.created)' => $date),
			'order' =>'AccessLog.id DESC',
			'limit' =>$limit,
		);
		$supports = $this->Paginate('AccessLog');
            
            
            
            
            $this->set('fld','date');
            $this->set('flv',strtotime($this->request->data['supports']['select_date']));
            
            
               //exit('test22222');
        } elseif ( (isset($this->request->data['supports']['fvalue']) && !empty($this->request->data['supports']['fvalue'])) && (isset($this->request->data['supports']['field']) && !empty($this->request->data['supports']['field'])) ){
            
            if ($this->request->data['supports']['field'] == 'ip') {
                    $con = array('AccessLog.ip' => $this->request->data['supports']['fvalue']);
                    $this->set('fld', 'ip');
                    $this->set('flv', $this->request->data['supports']['fvalue']);
                } elseif ($this->request->data['supports']['field'] == 'url') {
                    $con = array('AccessLog.url LIKE' => '%' . $this->request->data['supports']['fvalue'] . '%');
                    $this->set('fld', 'url');
                    $this->set('flv', $this->request->data['supports']['fvalue']);
                } elseif ($this->request->data['supports']['field'] == 'user_id') {
                    $con = array('AccessLog.user_id' => $this->request->data['supports']['fvalue']);
                    $this->set('fld', 'user_id');
                    $this->set('flv', $this->request->data['supports']['fvalue']);
                } elseif ($this->request->data['supports']['field'] == 'dealer_id') {
                    $con = array('AccessLog.dealer_id' => $this->request->data['supports']['fvalue']);
                     
                    $this->set('fld','dealer_id');
                    $this->set('flv', $this->request->data['supports']['fvalue']);
                } elseif ($this->request->data['supports']['field'] == 'sperson') {
                    $con = array('AccessLog.sperson LIKE' => '%' . $this->request->data['supports']['fvalue'] . '%');
                    $this->set('fld','sperson');
                    $this->set('flv', $this->request->data['supports']['fvalue']);
                } elseif ($this->request->data['supports']['field'] == 'http_user_agent') {
                    $con = array('AccessLog.http_user_agent LIKE' => '%' . $this->request->data['supports']['fvalue'] . '%');
                    $this->set('fld','http_user_agent');
                    $this->set('flv', $this->request->data['supports']['fvalue']);
                }
           
                
                $total_supports = $this->AccessLog->find('count', 
                        array('conditions' => $con));
            
            $this->paginate = array(
			'conditions' =>$con,
			'order' =>'AccessLog.id DESC',
			'limit' =>$limit,
		);
		$supports = $this->Paginate('AccessLog');
                
            //exit('test');
           /* $supports = $this->AccessLog->find('all', 
                    array(
                        'order' => 'AccessLog.id DESC',
                        'conditions' => $con                        
                
                ));*/
                
                
                
        } else {
            $date = date('Y-m-d');
            $total_supports = $this->AccessLog->find('count', array('conditions' => array('DATE(AccessLog.created)' => $date)));
            
            $this->paginate = array(
			'conditions' => array('DATE(AccessLog.created)' => $date),
			'order' =>'AccessLog.id DESC',
			'limit' => $limit,
		);
		$supports = $this->Paginate('AccessLog');
            
                 $this->set('fld','');
            $this->set('flv','');
//                debug($supports);
//            exit('test');

            
        }
}  else {
    //exit('test');
    if($this->request->pass[0]=='date'){
         $date = date('Y-m-d', $this->request->pass[1]);
            $total_supports = $this->AccessLog->find('count', array('conditions' => array('DATE(AccessLog.created)' => $date)));
            
            $this->paginate = array(
			'conditions' => array('DATE(AccessLog.created)' => $date),
			'order' =>'AccessLog.id DESC',
			'limit' =>$limit,
		);
		$supports = $this->Paginate('AccessLog');
            $this->set('fld','date');
            $this->set('flv',$this->request->pass[1]);
    }else{
        
        if (!isset($this->request->pass[2]) && empty($this->request->pass[2])) {
         if ($this->request->pass[0] == 'ip') {
                    $con = array('AccessLog.ip' => $this->request->pass[1]);
                    $this->set('fld', 'ip');
                    $this->set('flv', $this->request->pass[1]);
                } elseif ($this->request->pass[0] == 'url') {
                    $con = array('AccessLog.url LIKE' => '%' . $this->request->pass[1] . '%');
                    $this->set('fld', 'url');
                    $this->set('flv', $this->request->pass[1]);
                } elseif ($this->request->pass[0] == 'user_id') {
                    $con = array('AccessLog.user_id' =>$this->request->pass[1]);
                    $this->set('fld', 'user_id');
                    $this->set('flv',$this->request->pass[1]);
                } elseif ($this->request->pass[0] == 'dealer_id') {
                    $con = array('AccessLog.dealer_id' =>$this->request->pass[1]);
                     
                    $this->set('fld','dealer_id');
                    $this->set('flv',$this->request->pass[1]);
                } elseif ($this->request->pass[0] == 'sperson') {
                    $con = array('AccessLog.sperson LIKE' => '%' .$this->request->pass[1]. '%');
                    $this->set('fld','sperson');
                    $this->set('flv',$this->request->pass[1]);
                } elseif ($this->request->pass[0]== 'http_user_agent') {
                    $con = array('AccessLog.http_user_agent LIKE' => '%' .$this->request->pass[1]. '%');
                    $this->set('fld','http_user_agent');
                    $this->set('flv', $this->request->pass[1]);
                }
           
                
                $total_supports = $this->AccessLog->find('count', 
                        array('conditions' => $con));
            
            $this->paginate = array(
			'conditions' =>$con,
			'order' =>'AccessLog.id DESC',
			'limit' =>$limit,
		);
		$supports = $this->Paginate('AccessLog');
        
        }else{
            
            if ($this->request->pass[0] == 'user_id') {
                    $con = array('AccessLog.user_id' =>$this->request->pass[1],'DATE(AccessLog.created)' =>date('Y-m-d'));
                    $this->set('fld', 'user_id');
                    $this->set('flv',$this->request->pass[1]);
                    $this->set('today',$this->request->pass[2]);
                } elseif ($this->request->pass[0] == 'dealer_id') {
                    $con = array('AccessLog.dealer_id' =>$this->request->pass[1],'DATE(AccessLog.created)' =>date('Y-m-d'));
                     
                    $this->set('fld','dealer_id');
                    $this->set('flv',$this->request->pass[1]);
                    $this->set('today',$this->request->pass[2]);
                }
                
                $total_supports = $this->AccessLog->find('count', 
                        array('conditions' => $con));
            
            $this->paginate = array(
			'conditions' =>$con,
			'order' =>'AccessLog.id DESC',
			'limit' =>$limit,
		);
		$supports = $this->Paginate('AccessLog');   
                
                
                
        }
        
//          $this->set('fld',$this->request->pass[0]);
//            $this->set('flv',$this->request->pass[1]);
    }
}


$overalluser=$this->AccessLog->find('all',array('conditions'=>array('AccessLog.user_id !='=>'0','AccessLog.user_id !='=>''),'group'=>'AccessLog.user_id','order'=>'totalu DESC','fields'=>array("count('user_id') as 'totalu'",'AccessLog.user_id'),'limit'=>6));


$aluser=array();
$i=0;
foreach($overalluser as $value){
    if($value['AccessLog']['user_id']!='0'){
        if($i<=4){
    $new=array($value['AccessLog']['user_id']=>'User ID# '.$value['AccessLog']['user_id']);
     $aluser = Set::merge($aluser,$new);
        $i++;
     
        }
    }
    
}

//debug($aluser);

$overalldealer=$this->AccessLog->find('all',array('conditions'=>array('AccessLog.dealer_id !='=>'0','AccessLog.dealer_id !='=>''),'group'=>'AccessLog.dealer_id','order'=>'totalu DESC','fields'=>array("count('dealer_id') as 'totalu'",'AccessLog.dealer_id'),'limit'=>6));


//$aluser=array(''=>'Select');
$i=0;
foreach($overalldealer as $value){
    if($value['AccessLog']['dealer_id']!='0'){
         if($i<=4){
    $new=array($value['AccessLog']['dealer_id']=>'Dealer ID# '.$value['AccessLog']['dealer_id']);
     $aluser = Set::merge($aluser,$new);
          $i++;
     
         }
    }
     //$i++;
}


////////////////top 5 by current date
////////////////top 5 by current date
////////////////top 5 by current date
////////////////top 5 by current date


$today_user=$this->AccessLog->find('all',array('conditions'=>array('DATE(AccessLog.created)' =>date('Y-m-d'),'AccessLog.user_id !='=>0,'AccessLog.user_id !='=>''),'group'=>'AccessLog.user_id','order'=>'totalu DESC','fields'=>array("count('user_id') as 'totalu'",'AccessLog.user_id'),'limit'=>6));
//$log = $this->AccessLog->getDataSource()->getLog(false, false);
//debug($log);
//debug($today_user);
//exit('test');

$all_today=array();
$i=0;
foreach($today_user as $value){
    if($value['AccessLog']['user_id']!='0'){
         if($i<=4){
    $new=array($value['AccessLog']['user_id']=>'User ID# '.$value['AccessLog']['user_id']);
     $all_today = Set::merge($all_today,$new);
      $i++;   
     }
    }
    
}

//debug($aluser);

$today_dealer=$this->AccessLog->find('all',array('conditions'=>array('DATE(AccessLog.created)' =>date('Y-m-d'),'AccessLog.dealer_id !='=>'0','AccessLog.dealer_id !='=>''),'group'=>'AccessLog.dealer_id','order'=>'totalu DESC','fields'=>array("count('dealer_id') as 'totalu'",'AccessLog.dealer_id'),'limit'=>6));


//$aluser=array(''=>'Select');
$i=0;
foreach($today_dealer as $value){
    
     if($value['AccessLog']['dealer_id']!='0'){
          if($i<=4){
    $new=array($value['AccessLog']['dealer_id']=>'Dealer ID# '.$value['AccessLog']['dealer_id']);
     $all_today = Set::merge($all_today,$new);
$i++;
     }
     }

     
}


////////////////end top 5 by current date
////////////////end top 5 by current date

//$log = $this->AccessLog->getDataSource()->getLog(false, false);
//debug($log);
//debug($aluser);
//exit('test');
        //Configure::write('debug',2);
		//$this->layout='support';
		$this->set('supports',$supports);
		$this->set('aluser',$aluser);
		$this->set('all_today',$all_today);
		$this->set('total_supports',$total_supports);
		//$this->set('month',$month);
	$this->layout = 'admin_default';
 	}
        
}