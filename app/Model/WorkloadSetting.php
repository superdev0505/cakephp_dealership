<?php
class WorkloadSetting extends AppModel {

	function GetInsertHeaders($dealerId){
		$count = $this->find('count',array('conditions'=>array('dealer_id'=>$dealerId)));
		if($count==0){
			$presale = $this->GetPresaleSectionList();
			foreach($presale as $details){
				$typeFrm = $typeTo = 'day';
				$tmpExplodeFrm = explode("#",$details['interval']['from']);
				$from = $tmpExplodeFrm[0];
				if(isset($tmpExplodeFrm[1])){
					$typeFrm = $tmpExplodeFrm[1];
				}
				$tmpExplodeTo = explode("#",$details['interval']['to']);
				$to = $tmpExplodeTo[0];
				if(isset($tmpExplodeTo[1])){
					$typeTo = $tmpExplodeTo[1];
				}
				
				$data = array('header'=>$details['name'],
							'section'=>'presale',
							'from'=>$from,
							'to'=>$to,
							'from_type'=>$typeFrm,
							'to_type'=>$typeTo,
							'dealer_id'=>$dealerId
						);
				$this->saveAll($data);
							
			}
			
			
			$postsale = $this->GetPostsaleSectionList();
			foreach($postsale as $details){
				$typeFrm = $typeTo = 'day';
				$tmpExplodeFrm = explode("#",$details['interval']['from']);
				$from = $tmpExplodeFrm[0];
				if(isset($tmpExplodeFrm[1])){
					$typeFrm = $tmpExplodeFrm[1];
				}
				$tmpExplodeTo = explode("#",$details['interval']['to']);
				$to = $tmpExplodeTo[0];
				if(isset($tmpExplodeTo[1])){
					$typeTo = $tmpExplodeTo[1];
				}
				
				$data = array('header'=>$details['name'],
							'section'=>'postsale',
							'from'=>$from,
							'to'=>$to,
							'from_type'=>$typeFrm,
							'to_type'=>$typeTo,
							'dealer_id'=>$dealerId
						);
				$this->saveAll($data);
							
			}
		}
		
		return $this->find('all',array('conditions'=>array('dealer_id'=>$dealerId),'order'=>array('from_type','from')));
	
	}
	
	
	function GetPresaleSectionList(){
			return array(
				'1'=>array('name'=>'(Sales) (Call 1) Earn Your Business - 24 hours','interval'=>array('from'=>'1','to'=>'2')),
				//'2'=>'(Sales) (No contact)  No purchase Survey (Attempt 2) - 24 hrs',
				'3'=>array('name'=>'(BDC) Pre-Purchase Survey - 48 hours','interval'=>array('from'=>'2','to'=>'3')),
				'4'=>array('name'=>'(Sales) (Call 2) Earn Your Business - 72 hours','interval'=>array('from'=>'3','to'=>'4')),
				'10'=>array('name'=>'(Sales) (Call 3) Earn Your Business - 4 days','interval'=>array('from'=>'4','to'=>'5')),
				'5'=>array('name'=>'(Sales) (Call 4) Earn Your Business - 5 days','interval'=>array('from'=>'5','to'=>'6')),
				'11'=>array('name'=>'(Sales) (Call 5) Earn Your Business - 6 days','interval'=>array('from'=>'6','to'=>'7')),
				'6'=>array('name'=>'(Sales) (Call 6) Earn Your Business - 7 days','interval'=>array('from'=>'7','to'=>'10')),
				'7'=>array('name'=>'(Sales) (Call 7) Earn Your Business - 10 days','interval'=>array('from'=>'10','to'=>'14')),
				'8'=>array('name'=>'(Sales) (Call 8) Earn Your Business - 14 days','interval'=>array('from'=>'14','to'=>'21')),
				'9'=>array('name'=>'(Sales) (Call 9) Earn Your Business - 21 days','interval'=>array('from'=>'21','to'=>'45')),
				//'10'=>'(BDC) (Call 8) Dead Lead follow-up (Save) - 30 days',
				//'11'=>'(BDC) (Call 9) Dead Lead follow-up (Save) - 45 days'
			);
			
		}
	
									
									
		function GetPostsaleSectionList(){
			return array(
									'1'=>array('name'=>'(Sales) Thank you for allowing me to earn your business - 24 hours','interval'=>array('from'=>'1','to'=>'7')),
									//'2'=>'(BDC) (No contact)  purchase Survey (Attempt 2)  - 24 hrs',
									'5'=>array('name'=>'(BDC) Purchase CSI Survey (Attempt 1) - 7 days','interval'=>array('from'=>'7','to'=>'10')),
									'6'=>array('name'=>'(BDC) Welcome to the dealership family P&A Needs offer discount (Call 1) - 10 days','interval'=>array('from'=>'10','to'=>'14')),
									'7'=>array('name'=>'(BDC) First tune and Service Appointment (Call 2) - 14 days','interval'=>array('from'=>'14','to'=>'30')),
									'9'=>array('name'=>"(Sales) 'How is everything?' Ask for referrals (Call 3) - 30 days",'interval'=>array('from'=>'30','to'=>'45')),
									'10'=>array('name'=>'(Sales) Invite to dealership events or F&I missed backend (Call 4) - 45 days','interval'=>array('from'=>'45','to'=>'60')),
									'11'=>array('name'=>'(BDC) Did you get your tune and service? (Call 5) - 60 days','interval'=>array('from'=>'60','to'=>'6#MONTH')),
									'12'=>array('name'=>'(BDC) Has the dealership taken care of your needs? (Call 6) - 6 months','interval'=>array('from'=>'6#MONTH','to'=>'12#MONTH')),
									'13'=>array('name'=>'(Sales) Happy birthday to you and Unit, trade seed (Call 7) - 12 months','interval'=>array('from'=>'12#MONTH','to'=>'18#MONTH')),
									'14'=>array('name'=>'(Sales) We are looking for quality trades (Call 8) - 18 months','interval'=>array('from'=>'18#MONTH','to'=>'24#MONTH')),
									'15'=>array('name'=>'(Sales) We have a buyer or come see the new models (Call 9) - 24 months','interval'=>array('from'=>'24#MONTH','to'=>'30#MONTH')),
									'16'=>array('name'=>'(Sales) Rebate offer/special price (Call 10) - 30 months','interval'=>array('from'=>'30#MONTH','to'=>'36#MONTH')),
									'17'=>array('name'=>'(Sales) Invite down to see the new models/special price (Call 11) - 36 months','interval'=>array('from'=>'36#MONTH','to'=>'36#MONTH'))
									);
		}
		
		function GetWorkloadSections($type,$dealerId){
			if($type=='postsale'){
				$headers  = $this->find('all',array('conditions'=>array('dealer_id'=>$dealerId,'active'=>1,'section'=>$type)));
			}else{
				$headers  = $this->find('all',array('conditions'=>array('dealer_id'=>$dealerId,'active'=>1,'section'=>$type),'order'=>'from'));
			}
			$headersList = array();
			foreach($headers as $details){
				$typeFrm = $typeTo = 'DAY';
				if(trim($details['WorkloadSetting']['from_type'])!=''){
					$typeFrm  = strtoupper(trim($details['WorkloadSetting']['from_type']));
				}
				if(trim($details['WorkloadSetting']['to_type'])!=''){
					$typeTo  = strtoupper(trim($details['WorkloadSetting']['to_type']));
				}
				$from = trim($details['WorkloadSetting']['from']);
				$to = trim($details['WorkloadSetting']['to']);

				$from = $from - 1;
				$to = $to - 1;

				$name = trim($details['WorkloadSetting']['header']);
				$headersList[$details['WorkloadSetting']['id']] = array('name'=>$name,'interval'=>array('from'=>'DATE_ADD(NOW(), INTERVAL -'.$from.' '.$typeFrm.')','to'=>'DATE_ADD(NOW(), INTERVAL -'.$to.' '.$typeTo.')'));
				
			}
			return $headersList;
		
		}

}
?> 