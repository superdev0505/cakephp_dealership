<?php

class DealerSetting extends AppModel {
	var $name = 'DealerSetting';

		public function get_filter_rules($vendor,$dealer_id){
			$rule_settings = array();
			switch($vendor){
					case "DS":
					$rule_settings = $this->find('list',array('fields'=>array('DealerSetting.name','DealerSetting.value'),'conditions'=>array('DealerSetting.name like' => 'ds_lead_rule_filter_%', 'DealerSetting.dealer_id'=>$dealer_id)));
						break;
					case "TM":
					$rule_settings = $this->find('list',array('fields'=>array('DealerSetting.name','DealerSetting.value'),'conditions'=>array('DealerSetting.name like' => 'tm_lead_rule_filter_%', 'DealerSetting.dealer_id'=>$dealer_id)));
					break;
			}
			return $rule_settings;
		}

    public function get_settings($settings_name, $dealer_id){

        if($settings_name == 'add_mgr_group_to_lead_push_options'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'add_mgr_group_to_lead_push_options', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
              return "Off";
            }else{
              return $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'bad_web_lead_group'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'bad_web_lead_group', 'DealerSetting.dealer_id'=>$dealer_id)));
            return  $settings;
        }

        if($settings_name == 'gender_required'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'gender_required', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
				return  "On";
			}else{
				return  $settings['DealerSetting']['value'];
			}
        }

        if($settings_name == 'workload_order'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'workload_order', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "On";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'mgr_sign_off'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'mgr_sign_off', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'equity_sperson'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'equity_sperson', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'email_required'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'email_required', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }
        if($settings_name == 'owner_change_internet'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'owner_change_internet', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'auto_event_time'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'auto_event_time', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "10:00 AM";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }


        if($settings_name == 'business_hours'){
            $business_hour = array();
            $business_hours_start = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'business_hours_start', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($business_hours_start)){
                $business_hour['business_hours_start'] = "08:00 AM";
            }else{
                $business_hour['business_hours_start'] =  $business_hours_start['DealerSetting']['value'];
            }

            $business_hours_end = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'business_hours_end', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($business_hours_end)){
                $business_hour['business_hours_end'] = "08:00 PM";
            }else{
                $business_hour['business_hours_end'] =  $business_hours_end['DealerSetting']['value'];
            }
            return $business_hour;
        }

        if($settings_name == 'shopper_notification_group'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'shopper_notification_group', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  array();
            }else{
                return  explode(",", $settings['DealerSetting']['value']);
            }
        }

        if($settings_name == 'state_provinces'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'state_provinces', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "On";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'report_range_limit'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'report_range_limit', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "On";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'location_names'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'location_names', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'dnc_bdc_only'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'dnc_bdc_only', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'qr_code_activation'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'qr_code_activation', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }
        if($settings_name == 'additional_contact'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'additional_contact', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }


        if($settings_name == 'validate_method_of_payment'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'validate_method_of_payment', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'team_breakdown'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'team_breakdown', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'forms_view'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'forms_view', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                App::import('model','Group');
                $Group = new Group;
                $groups = $Group->find('list', array('conditions'=>array('Group.id <>'=>array(1, 9))));
                return array_keys($groups);
            }else{
                return   explode(",", $settings['DealerSetting']['value']);
            }
        }


        if($settings_name == 'multi_deal_higher_step'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'multi_deal_higher_step', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "1";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'log_in_goal'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'log_in_goal', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'lead_change_report'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'lead_change_report', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'lead_change_report_range'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'lead_change_report_range', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "7";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'dnc_manual_uplaod_process'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'dnc_manual_uplaod_process', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'round_robin_category'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'round_robin_category', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }



        if($settings_name == 'person_in_dealership'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'person_in_dealership', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "On";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'status_update_optional_event'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'status_update_optional_event', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "On";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'lead_status_required_new_lead'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'lead_status_required_new_lead', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'restrict_events_employee'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'restrict_events_employee', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'required_year_make_model'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'required_year_make_model', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "On";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'log_change_notification'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'log_change_notification', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'mgr_lead_action_no_lead_ownership'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'mgr_lead_action_no_lead_ownership', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'restrict_eblast_salesperson'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'restrict_eblast_salesperson', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'activate_lite_version'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'activate_lite_version', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

        if($settings_name == 'casl_feature'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'casl_feature', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                return  "Off";
            }else{
                return  $settings['DealerSetting']['value'];
            }
        }

		if($settings_name == 'dealer_visit'){
				$settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'dealer_visit', 'DealerSetting.dealer_id'=>$dealer_id)));
				if(empty($settings)){
						return  "Off";
				}else{
						return  $settings['DealerSetting']['value'];
				}
		}
		if($settings_name == 'dealer_visit_showroom'){
				$settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'dealer_visit_showroom', 'DealerSetting.dealer_id'=>$dealer_id)));
				if(empty($settings)){
						return  "Off";
				}else{
						return  $settings['DealerSetting']['value'];
				}
		}

        if($settings_name == 'stock_num_required_sold'){
            $settings = $this->find('first', array('conditions'=>array('DealerSetting.name' => 'stock_num_required_sold', 'DealerSetting.dealer_id'=>$dealer_id)));
            if(empty($settings)){
                    return  "On";
            }else{
                    return  $settings['DealerSetting']['value'];
            }
        }

    }

    public function locations_list($dealer_id) {
        $locationNames = $this->query('select * from location_names where dealer_id = :dealer_id order by location_name', array("dealer_id"=>$dealer_id));
        $list = array();
        foreach($locationNames as $locationName){
            $list[ $locationName['location_names']['location_name'] ] = $locationName['location_names']['location_name'];
        }
        return $list;

    }

}
?>
