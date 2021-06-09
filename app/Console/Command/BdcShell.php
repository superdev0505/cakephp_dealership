<?php 
App::uses('View', 'View');
class BdcShell extends AppShell {
	
	
	public $uses = array('Contact','User', 'BdcSurvey','RecapCronEmail','LeadStatus','BdcStatus','LeadSold');
	
	public function main()
	{
		$this->saleperson_pdf_report();
		$this->bdc_csr_report_pdf();
	}
	
	public  function saleperson_pdf_report()
		{
			$this->layout=null;
			$this->autoRender=false;
		//$this->layout = null;
		
		$dealer_names=$this->User->find('list',array('fields'=>'dealer_id,dealer','group'=>'dealer_id'));
		// get Month
		$get_day=date('d');
		$stats_month = date('m');
		if($get_day=='01')
		{
				if($stats_month=='01')
				{
					$stats_month = 12;
				}else
				{
					$stats_month--; 
				}
		}
		
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		if($get_day=='01'){
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		$subject='Sales Staff End Month report';
		$f_name='_end_';
		}else{
			$subject='Sales Staff mid Month report';
			$f_name='_mid_';
			$last_day_this_month  = date('Y-m-15 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		}
		$this->loadModel('RecapCronEmail');
		$dealer_emails=$this->RecapCronEmail->find('all');
		$dealer_info_array=array();
		foreach($dealer_emails as $d_emails)
		{
			$dealer_info_array[$d_emails['RecapCronEmail']['dealer_id']][]=$d_emails['RecapCronEmail']['email'];
		}
		foreach($dealer_info_array as $d_id=>$d_s_emails)
		{
			$view= new View();
			$view->layout=null;
			$view->autoRender=false;
			
		$user_id = $d_id;
		$emailVars['dealer_name']=$dealer_names[$user_id];
		$emailVars['dealer_id']=$user_id;
		$emailVars['month']=date('F',strtotime($first_day_this_month));
	
		$emailVars['report']=$subject;
		$this->loadModel('LeadStatus');
		$lead_statuses=$this->LeadStatus->find('list',array('conditions'=>array('LeadStatus.header'=>array('Sold Deal (Closed)','Sold FollowUp Out (Closed)','Sold FollowUp In (Closed)','Sold Pick-Up (Closed)'))));
		array_push($lead_statuses,'Duplicate-Closed');
		array_push($lead_statuses,'Customer Update Edit ONLY');
		$this->loadModel('BdcSurvey');
		$fields=array('BdcSurvey.*','BdcLead.id','BdcLead.sales_step','BdcLead.modified');
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead')));
		$conditions = array(
			
		//	'BdcLead.user_id' => $current_user_id,
			'Contact.sales_step !=' => '1',
			/*'User.group_id' => $this->Contact->ReportUserGroups,*/
			'NOT'=>array('Contact.status' => $lead_statuses),
			'Contact.modified >=' => $first_day_this_month,
			'Contact.modified <=' => $last_day_this_month,
			'Contact.company_id'=>$user_id
            );
		$all_leads = $this->Contact->find('list', array('fields'=>'Contact.id,Contact.id','conditions'=>$conditions));
		$leads=count($all_leads);
		$all_calls=$this->BdcSurvey->find('all',array('fields'=>$fields,'conditions'=>array('dealer_id'=>$user_id,'latest'=>'yes','BdcSurvey.created >='=>$first_day_this_month,'BdcSurvey.created <='=>$last_day_this_month,'BdcSurvey.survey_id'=>2)));
		if(empty($all_calls))
		{
			continue;
		}
		$total_counts=array(
							'total_ndf'=>'0',
							'contacts'=>'0',
							'contact_per'=>'0',
							'bad_number'=>'0',
							'bad_per'=>'0',
							'in'=>'0',
							'contact_in'=>'0',
							'sold'=>'0',
							'contact_sold'=>'0',
							'no_number'=>'0',
							'no_number_per'=>'0',
							'contact_bad'=>0,
							'contact_ids'=>array(0),
							'bad_ids'=>array(0),
							'no_ids'=>array(0),
							'in_ids'=>array(0),
							'sold_ids'=>array(0),
							);
		$total_counts['total_ndf']=$leads;
		foreach($all_calls as $call)
		{
			if($call['BdcSurvey']['status']=='contact')
			{
				$total_counts['contacts']++;
				$total_counts['contact_ids'][]=$call['BdcLead']['id'];
			}
			elseif($call['BdcSurvey']['status']=='bad number')
			{
				$total_counts['bad_number']++;
				$total_counts['bad_ids'][]=$call['BdcLead']['id'];
			}
			elseif($call['BdcSurvey']['status']=='no number')
			{
				$total_counts['no_number']++;
				$total_counts['no_ids'][]=$call['BdcLead']['id'];
			}
			if($call['BdcLead']['sales_step']!=$call['BdcSurvey']['lead_sales_step']&&$call['BdcLead']['modified']>$call['BdcSurvey']['created']&&$call['BdcSurvey']['status']=='contact')
			{
				$total_counts['in']++;
				$total_counts['in_ids'][]=$call['BdcLead']['id'];
			}
			if(/*$call['BdcLead']['sales_step']=='Sold'&&*/($call['BdcLead']['status']=='Sold/Rolled'||$call['BdcLead']['status']=='Sold/Rolled-Multi Vehicle')&&$call['BdcLead']['modified']>$call['BdcSurvey']['created']&&$call['BdcSurvey']['status']=='contact')
			{
				$total_counts['sold']++;
				$total_counts['sold_ids'][]=$call['BdcLead']['id'];
			}
		}
		$total_counts['contact_bad']=$total_counts['total_ndf']-($total_counts['bad_number']+$total_counts['no_number']);
		$total_counts['contact_per']=round(($total_counts['contacts']/$total_counts['contact_bad'])*100);
		$total_counts['bad_per']=round(($total_counts['bad_number']/$total_counts['total_ndf'])*100);
		$total_counts['no_number_per']=round(($total_counts['no_number']/$total_counts['total_ndf'])*100);
		$total_counts['contact_in']=round(($total_counts['in']/$total_counts['contacts'])*100);
		$total_counts['contact_sold']=round(($total_counts['sold']/$total_counts['contacts'])*100);
		
		$view->set('total_count',$total_counts);
		$view->set('all_leads',$all_leads);
		
		
		
		
		
		// Bdc Sales Person report
		$report_results = $this->BdcSurvey->query("
		SELECT
		`Contact`.`user_id`,
		`BdcSurvey`.`status`,
		
		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.`modified`), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`lead_status` = 'Sold/Rolled' ||`Contact`.`lead_status` = 'Sold/Rolled-Multi Vehicle')&&`BdcSurvey`.`modified` <= `Contact`.`modified`, 1, 0)) AS sold_leads
	
		FROM `contacts` AS `Contact`
		LEFT JOIN users `User` ON Contact.user_id = `User`.id
		RIGHT JOIN `bdc_surveys` `BdcSurvey` ON `Contact`.id=BdcSurvey.bdc_lead_id 
		WHERE ".$this->Contact->ReportUserGroupQuery." `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes' AND `BdcSurvey`.`survey_id`=2
		GROUP BY  `Contact`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		$this->loadModel('BdcStatus');
		
		/*$survey_leads=$this->BdcSurvey->find('list',array('fields'=>'id,bdc_lead_id','conditions'=>array(
			'BdcSurvey.dealer_id' => $user_id,
			'BdcSurvey.survey_id' => 2,
			'BdcSurvey.latest' => 'yes',
			'BdcSurvey.created >=' => $first_day_this_month,
			'BdcSurvey.created <=' => $last_day_this_month,
			'BdcSurvey.status' =>'contact'
		)));
		$this->loadModel('LeadSold');
		$bdc_sold_leads=$this->LeadSold->find('list',array('fields'=>'id,contact_id','conditions'=>array('contact_id'=>$survey_leads)));*/
		$bdc_sold_leads=$this->BdcSurvey->query("select LeadSold.id,LeadSold.contact_id from bdc_surveys AS BdcSurvey RIGHT JOIN lead_solds LeadSold ON BdcSurvey.`bdc_lead_id`=`LeadSold`.`contact_id` AND `BdcSurvey`.`modified` <= `LeadSold`.`modified` where `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`status`='contact'",array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		$bdc_sold_leads=array_map(function($element){return $element['LeadSold']['contact_id'];}, $bdc_sold_leads);
		
		//$status_list=$this->BdcSurvey->find('list',array('fields'=>'BdcSurvey.c_status,COUNT(BdcSurvey.c_status) '));
		//pr($status_list);
		$status_result=$this->BdcStatus->query("SELECT `BdcStatus`.`name`,`BdcStatus`.`id`,count(`BdcSurvey`.`c_status`) AS status_count from bdc_statuses AS `BdcStatus` RIGHT JOIN bdc_surveys `BdcSurvey` ON `BdcStatus`.`id`=`BdcSurvey`.`c_status` AND `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes'  where  `BdcStatus`.`dealer_id` in (:user_id,0) GROUP BY  `BdcStatus`.`id` order by status_count DESC",array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		
		
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('className'=>'BdcStatus','foreignKey'=>'c_status'))));
		$conditions = array(
			'BdcSurvey.dealer_id' => $user_id,
			'BdcSurvey.survey_id' => 2,
			'BdcSurvey.latest' => 'yes',
			'BdcSurvey.created >=' => $first_day_this_month,
			'BdcSurvey.created <=' => $last_day_this_month,
			'BdcSurvey.c_status REGEXP("^[0-9]+$")' 
		);
        
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(BdcSurvey.c_status) as count,BdcSurvey.c_status, BdcStatus.name',
            'group' => 'BdcSurvey.c_status order by count DESC LIMIT 5'
        );
		$top_status=$this->BdcSurvey->find('all',$params);
		$final_data = array();
        foreach ($top_status as $status) {
            $final_data[$status['BdcStatus']['name']] = (int) $status[0]['count'];
        }
		
		$this->loadModel('SurveyAnswer');
		$conditions_survey=$conditions;
		$conditions_survey['BdcSurvey.status']='contact';
		//Find list of all contacted survey
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcLead')));
		$survy_ids=$this->BdcSurvey->find('all',array('fields'=>'BdcSurvey.id,BdcLead.user_id','conditions'=>$conditions_survey));
		
		// make all survey ids user wise
		$user_wise_survey=array();
		$bdc_survey_ids=array();
		foreach ($survy_ids as $val)
		{
			$bdc_survey_ids[]=$val['BdcSurvey']['id'];
			$user_wise_survey[$val['BdcLead']['user_id']][]=$val['BdcSurvey']['id'];
		}
		
		// Find count for all the question answer with yes/no
		$answer_fields=array('`SurveyAnswer`.`id`',
					'`SurveyAnswer`.`question_id`',
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^Yes', 1, 0)) AS yes_count",
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^No', 1, 0)) AS no_count",
				"SUM(if(`SurveyAnswer`.`answer`=''||`SurveyAnswer`.`answer`=',' , 1, 0)) AS na_count",
				'Question.name');
		$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$bdc_survey_ids,'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['yes_no']=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
		
		// Find the average for one survey question
		$answer_cond1=$answer_cond;
		$answer_cond1['`SurveyAnswer`.`answer` !=']='';
		$answer_cond1['`SurveyAnswer`.`question_id`']=29;
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['avg']=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
		$user_question_per=array();
		foreach($user_wise_survey as $u_id=>$u_s_ids)
		{
			$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$u_s_ids,'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
			$answer_cond1=$answer_cond;
			$answer_cond1['`SurveyAnswer`.`answer` !=']='';
			$answer_cond1['`SurveyAnswer`.`question_id`']=29;
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count1=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
			$user_question_per[$u_id]['yes_no']=$user_s_count;
			$user_question_per[$u_id]['avg']=$user_s_count1;
		}
		
		//pr($question_dealer_count);
		
		$view->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','bdc_survey_ids','user_wise_survey','bdc_sold_leads','dealer_names','user_id'));
       	
		$html=$view->render('/Elements/sales_person_report_pdf');
		$htmlArray=explode("############################",$html);
			App::import('Vendor','SVGGraph/SVGGraph');
			App::import('Vendor','tcpdf/tcpdf');
		  	$settings = array(
			  'back_colour' => '#eee',   'stroke_colour' => '#000',
			  'back_stroke_width' => 0,  'back_stroke_colour' => '#eee',
			  'show_labels' => true,     'show_label_amount' => false,
			  'label_font' => 'Georgia', 'label_font_size' => '11',
			  'legend_entries'=>array_keys($final_data),
			  'show_label_percent'=>true,
			  'label_colour' => '#000',  
			  'graph_title'=>'Top 5 Customer Statuses', 'graph_title_font' => 'Georgia',
			  'graph_title_font_size'=>14,'graph_title_font_weight'=>'bold',
			  'sort' => false
			);
			 
			$colours = array('#EDC240','#4DA74D','#CB4B4B','#AFD8F8','#0f3','#339');
			$links = array('Dough' => 'jpegsaver.php', 'Ray' => 'crcdropper.php',
			  'Me' => 'svggraph.php');
			 
			$graph = new SVGGraph(900, 400, $settings);
			$graph->colours = $colours;
			 
			$graph->Values($final_data);
			//$graph->Links($links);
			$graphData=$graph->Fetch('PieGraph');
			
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
			// add a page
			/*$pdf->AddPage();
			
			$pdf->ImageSVG('@'.$graphData, $x=-5, $y=30, $w='200', $h='190');*/
			// output the HTML content
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[0], true, false, true, false, '');
			$pdf->Image(APP.'/webroot/img/dealership-performance-logo.jpg', $x=47, $y=8,$w='110', $h='19');
			//$pdf->endPage();
			
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[1], true, false, true, false, '');
			//$pdf->endPage();
			
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[2], true, false, true, false, '');
			$pdf->ImageSVG('@'.$graphData, $x=-35, $y=30, $w='240', $h='225');
			//$pdf->endPage();
			
			
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[3], true, false, true, false, '');
			
			for($page=4;$page<count($htmlArray);$page++)
			{
				$pdf->AddPage();
				$pdf->writeHTML($htmlArray[$page], true, false, true, false, '');
			}
			$pdf->deletePage($page);
			if (!file_exists(APP.'webroot/files/bdc_reports/dealer_'.$user_id)) {
   				mkdir(APP.'webroot/files/bdc_reports/dealer_'.$user_id, 0777, true);
			}
			$filepath=APP.'webroot/files/bdc_reports/dealer_'.$user_id.'/'.$user_id.'_bdc_salesperson'.$f_name.'report_'.date('Y_m',strtotime($first_day_this_month)).'.pdf';
			
			$pdf->Output($filepath, 'F');
			
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail();
			$email->config('sender');
			$email->from('sender@dp360crm.com');
			$email->attachments($filepath);
			$email->viewVars(array('emailVars'=>$emailVars));
			$email->template('sales_person_report_email')
					->emailFormat('html')
					->subject($subject)
					//->to($d_s_emails)
					->to(array('ss737207@gmail.com','andrew@dp360crm.com','tad@dp360crm.com','dan@dp360crm.com'))
					->bcc(array('ss737207@gmail.com','andrew@dp360crm.com','tad@dp360crm.com'))
					->send();
			
		}
			return;
			//pr($final_data);
			//$view->set(compact('graphData'));
			/*App::uses('CakeEmail', 'Network/Email');
					$email = new CakeEmail();
					//$email->config('support');
					$email->from('sender@dp360crm.com');
					$email->viewVars(array('graphData'=>$graphData,'js'=>$js));
					
					$email->template('sales_person_report_email')
						->emailFormat('html')
						->subject('test')
						->to(array('kmlshrm167@gmail.com','ss737207@gmail.com'))
						->send();	*/
			
					
		}
		
		
		public function bdc_csr_report_pdf()
		{
			
		$this->layout=null;
		$this->autoRender=false;
		
		$dealer_names=$this->User->find('list',array('fields'=>'dealer_id,dealer','group'=>'dealer_id'));
		// get Month
		$get_day=date('d');
		$stats_month = date('m');
		if($get_day=='01')
		{
				if($stats_month=='01')
				{
					$stats_month = 12;
				}else
				{
					$stats_month--; 
				}
		}
		
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		if($get_day=='01'){
			$f_name='_end_';
			$subject='CSR end month report';
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		}else{
			$f_name='_mid_';
			$subject='CSR mid month report';
			$last_day_this_month  = date('Y-m-15 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		}
		
		
		$this->loadModel('RecapCronEmail');
		$dealer_emails=$this->RecapCronEmail->find('all');
		$dealer_info_array=array();
		foreach($dealer_emails as $d_emails)
		{
			$dealer_info_array[$d_emails['RecapCronEmail']['dealer_id']][]=$d_emails['RecapCronEmail']['email'];
		}
		foreach($dealer_info_array as $d_id=>$d_s_emails){
		
			$view= new View();
			$view->layout=NULL;
			$view->autoRender=false;
		$user_id = $d_id;
		$emailVars['dealer_name']=$dealer_names[$user_id];
		$emailVars['dealer_id']=$user_id;
		$emailVars['month']=date('F',strtotime($first_day_this_month));
		$emailVars['report']=$subject;
		$this->loadModel('BdcSurvey');
		$report_results = $this->BdcSurvey->query("
		SELECT
		`BdcSurvey`.`user_id`,
		`BdcSurvey`.`status`,
		
		`User`.`first_name`,
		`User`.`last_name`,
		count(`BdcSurvey`.`user_id`) as source_count,
		count(distinct(`BdcSurvey`.`bdc_lead_id`)) as unique_leads,
		SUM(if( `BdcSurvey`.`status`= 'contact',CAST(`BdcSurvey`.`duration` AS DECIMAL),0)) AS avg_time,
		SUM(if(`BdcSurvey`.`status` = 'contact', 1, 0)) AS contact_lead,
		SUM(if(`BdcSurvey`.`status` = 'bad number', 1, 0)) AS bad_lead,
		SUM(if(`BdcSurvey`.`status` = 'no number', 1, 0)) AS no_lead,
		SUM(if((`BdcSurvey`.`lead_sales_step` != `Contact`.`sales_step`&&`BdcSurvey`.`modified` <= `Contact`.`modified`), 1, 0)) AS in_leads,
		SUM(if((`Contact`.`lead_status` = 'Sold/Rolled' ||`Contact`.`lead_status` = 'Sold/Rolled-Multi Vehicle')&&`BdcSurvey`.`modified` <= `Contact`.`modified`, 1, 0)) AS sold_leads
	
		FROM `bdc_surveys` AS `BdcSurvey`
		LEFT JOIN users `User` ON BdcSurvey.user_id = `User`.id
		LEFT JOIN contacts `Contact` ON BdcSurvey.bdc_lead_id = `Contact`.id
		WHERE ".$this->Contact->ReportUserGroupQuery." `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND  `BdcSurvey`.`survey_id`=2
		GROUP BY  `BdcSurvey`.`user_id`
		ORDER BY `User`.first_name ASC
		"
		,array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month)
		);
		if(empty($report_results))
		{
			continue;
		}
		$total_days=date('d',strtotime($last_day_this_month));
		$this->loadModel('BdcStatus');
		
		//$status_list=$this->BdcSurvey->find('list',array('fields'=>'BdcSurvey.c_status,COUNT(BdcSurvey.c_status) '));
		//pr($status_list);
		$status_result=$this->BdcStatus->query("SELECT `BdcStatus`.`name`,`BdcStatus`.`id`,count(`BdcSurvey`.`c_status`) AS status_count from bdc_statuses AS `BdcStatus` RIGHT JOIN bdc_surveys `BdcSurvey` ON `BdcStatus`.`id`=`BdcSurvey`.`c_status` AND `BdcSurvey`.`survey_id`=2 AND `BdcSurvey`.`dealer_id` = :user_id AND `BdcSurvey`.`modified` >= :first_day_this_month AND `BdcSurvey`.`modified` <= :last_day_this_month AND `BdcSurvey`.`latest`='yes'  where  `BdcStatus`.`dealer_id` in (:user_id,0) GROUP BY  `BdcStatus`.`id` order by status_count DESC ",array('user_id'=>$user_id,'first_day_this_month'=>$first_day_this_month,'last_day_this_month'=>$last_day_this_month));
		//pr($status_result);
		//die;
		$this->BdcSurvey->bindModel(array('belongsTo'=>array('BdcStatus'=>array('className'=>'BdcStatus','foreignKey'=>'c_status'))));
		$conditions = array(
			'BdcSurvey.dealer_id' => $user_id,
			'BdcSurvey.survey_id' => 2,
			'BdcSurvey.latest' => 'yes',
			'BdcSurvey.created >=' => $first_day_this_month,
			'BdcSurvey.created <=' => $last_day_this_month,
			'BdcSurvey.c_status REGEXP("^[0-9]+$")' 
		);
        
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(BdcSurvey.c_status) as count,BdcSurvey.c_status, BdcStatus.name',
            'group' => 'BdcSurvey.c_status order by count DESC LIMIT 5'
        );
		$top_status=$this->BdcSurvey->find('all',$params);
		$final_data = array();
        foreach ($top_status as $status) {
            $final_data[$status['BdcStatus']['name']] = (int) $status[0]['count'];
        }
        //$top_status_json = array($final_data);
		
		$this->loadModel('SurveyAnswer');
		$conditions_survey=$conditions;
		$conditions_survey['BdcSurvey.status']='contact';
		//Find list of all contacted survey
		$survy_ids=$this->BdcSurvey->find('list',array('fields'=>'id,user_id','conditions'=>$conditions_survey));
		// make all survey ids user wise
		$user_wise_survey=array();
		foreach ($survy_ids as $key=>$val)
		{
			$user_wise_survey[$val][]=$key;
		}
		
		// Find count for all the question answer with yes/no
		$answer_fields=array('`SurveyAnswer`.`id`',
					'`SurveyAnswer`.`question_id`',
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^Yes', 1, 0)) AS yes_count",
				"SUM(if(`SurveyAnswer`.`answer`  REGEXP '^No', 1, 0)) AS no_count",
				"SUM(if(`SurveyAnswer`.`answer`=''||`SurveyAnswer`.`answer`=',' , 1, 0)) AS na_count",
				'Question.name');
		$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>array_keys($survy_ids),'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['yes_no']=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
		
		// Find the average for one survey question
		$answer_cond1=$answer_cond;
		$answer_cond1['`SurveyAnswer`.`answer` !=']='';
		$answer_cond1['`SurveyAnswer`.`question_id`']=29;
		$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
		$question_dealer_count['avg']=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
		$user_question_per=array();
		foreach($user_wise_survey as $u_id=>$u_s_ids)
		{
			$answer_cond=array('`SurveyAnswer`.`bdc_survey_id`'=>$u_s_ids,'`SurveyAnswer`.`question_id`'=>array(20,22,28,21,30,31));
			$answer_cond1=$answer_cond;
			$answer_cond1['`SurveyAnswer`.`answer` !=']='';
			$answer_cond1['`SurveyAnswer`.`question_id`']=29;
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count=$this->SurveyAnswer->find('all',array('fields'=>$answer_fields,'conditions'=>$answer_cond,'group'=>'`SurveyAnswer`.`question_id`'));
			$this->SurveyAnswer->bindModel(array('belongsTo'=>array('Question')));
			$user_s_count1=$this->SurveyAnswer->find('all',array('fields'=>'AVG(CAST(`SurveyAnswer`.`answer` AS UNSIGNED )) AS scale,Question.name,Question.id ','conditions'=>$answer_cond1,'group'=>'`SurveyAnswer`.`question_id`'));
			$user_question_per[$u_id]['yes_no']=$user_s_count;
			$user_question_per[$u_id]['avg']=$user_s_count1;
		}
		//pr($question_dealer_count);
		
		$view->set(compact('report_results','status_result','top_status_json','question_dealer_count','user_question_per','survy_ids','user_wise_survey','total_days','dealer_names','user_id'));
		
		$html=$view->render('/Elements/bdc_csr_report_pdf');
		$htmlArray=explode("############################",$html);
			App::import('Vendor','SVGGraph/SVGGraph');
			App::import('Vendor','tcpdf/tcpdf');
		  	$settings = array(
			  'back_colour' => '#eee',   'stroke_colour' => '#000',
			  'back_stroke_width' => 0,  'back_stroke_colour' => '#eee',
			  'show_labels' => true,     'show_label_amount' => false,
			  'label_font' => 'Georgia', 'label_font_size' => '11',
			  'legend_entries'=>array_keys($final_data),
			  'show_label_percent'=>true,
			  'label_colour' => '#000',  
			  'graph_title'=>'Top 5 Customer Statuses', 'graph_title_font' => 'Georgia',
			  'graph_title_font_size'=>14,'graph_title_font_weight'=>'bold',
			  'sort' => false
			);
			 
			$colours = array('#EDC240','#4DA74D','#CB4B4B','#AFD8F8','#0f3','#339');
			$links = array('Dough' => 'jpegsaver.php', 'Ray' => 'crcdropper.php',
			  'Me' => 'svggraph.php');
			 
			$graph = new SVGGraph(900, 400, $settings);
			$graph->colours = $colours;
			 
			$graph->Values($final_data);
			//$graph->Links($links);
			$graphData=$graph->Fetch('PieGraph');
			
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
			// add a page
			/*$pdf->AddPage();
			
			$pdf->ImageSVG('@'.$graphData, $x=-5, $y=30, $w='200', $h='190');*/
			// output the HTML content
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[0], true, false, true, false, '');
			$pdf->Image(APP.'/webroot/img/dealership-performance-logo.jpg', $x=47, $y=8,$w='110', $h='19');
			//$pdf->endPage();
			
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[1], true, false, true, false, '');
			//$pdf->endPage();
			
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[2], true, false, true, false, '');
			$pdf->ImageSVG('@'.$graphData, $x=-35, $y=30, $w='240', $h='225');
			//$pdf->endPage();
			
			
			$pdf->AddPage();
			$pdf->writeHTML($htmlArray[3], true, false, true, false, '');
			
			for($page=4;$page<count($htmlArray);$page++)
			{
				$pdf->AddPage();
				$pdf->writeHTML($htmlArray[$page], true, false, true, false, '');
			}
			$pdf->deletePage($page);
			if (!file_exists(APP.'webroot/files/bdc_reports/dealer_'.$user_id)) {
   				mkdir(APP.'webroot/files/bdc_reports/dealer_'.$user_id, 0777, true);
			}
			$filepath=APP.'webroot/files/bdc_reports/dealer_'.$user_id.'/'.$user_id.'_bdc_csr'.$f_name.'report_'.date('Y_m',strtotime($first_day_this_month)).'.pdf';
			$pdf->Output($filepath, 'F');
			
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail();
			$email->config('sender');
			$email->from('sender@dp360crm.com');
			$email->attachments($filepath);
			$email->viewVars(array('emailVars'=>$emailVars));
			$email->template('sales_person_report_email')
					->emailFormat('html')
					->subject($subject)
					//->to($d_s_emails)
					->to(array('ss737207@gmail.com','andrew@dp360crm.com','tad@dp360crm.com','dan@dp360crm.com'))
					->bcc(array('ss737207@gmail.com','andrew@dp360crm.com','tad@dp360crm.com'))
					->send();
		
		
		}
		die;
	
		}
	
	
    }
