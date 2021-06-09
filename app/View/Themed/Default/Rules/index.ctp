<style>
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;

}
</style>
</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div class="row">
<?php echo $this->element("rules", array('rules' => $rules, 'users' => $users,'rule_direct' => $rule_direct, 'advanced_round_robin_dealer_setting' => $advanced_round_robin_dealer_setting,'all_active_users' => $all_active_users, 'RulesRoundrobinNovehicle_user_id' => $RulesRoundrobinNovehicle_user_id,'weblead_queue' => $weblead_queue, 'next_receive' => $next_receive,'keyword'=>'')); ?>

		<!--=====================================================================================-->
		<!--Boats Cycles rules start -->
            <?php
echo $this->element("rules", array('rules' => $boatscycles_rules, 'users' => $users,'rule_direct' => $boatscycles_rule_direct, 'advanced_round_robin_dealer_setting' => $advanced_round_robin_dealer_setting,'all_active_users' => $all_active_users, 'RulesRoundrobinNovehicle_user_id' => $RulesRoundrobinNovehicle_user_id,'weblead_queue' => $weblead_queue, 'next_receive' => $next_receive,'rr_users'=>$rr_users,'keyword'=>'boatsCycles','title'=>'Boats and Cycles','vendor_name'=>'BoatsCycles'));
                ?>
		<!-- //Boats Cycles rules end -->

		<!-- Unified element output for every row in element_creation_data -->
					<?php
									// All uptodate REFNUMS in one place, Will be used later for the script output.
					$element_creation_data = array(
																'trader' => array(
																		'title' => 'Trader Media',
																		'vendor_name' => 'Trader Media'
																	)
																,'engagetosell' => array(
																		'title' => 'Engage to Sell',
																		'vendor_name' => 'Engage To Sell'
																	)
																,'contactatonce' => array(
																		'title' => 'Contact At Once',
																		'vendor_name' => 'Contact At Once'
																	)
																,'costco' => array(
																		'title' => 'Costco Auto Program',
																		'vendor_name' => 'Costco'
																	)
							// This one currently does not work, probably because of camelCased naming
															/*	,'boatsCycles' => array(
																		'title' => 'Boats and Cycles',
																		'vendor_name' => 'BoatsCycles'
																	)*/
																,'chopper' => array(
																		'title' => 'ChopperExchange',
																		'vendor_name' => 'ChopperExchange'
																	)
																,'rvusa' => array(
																		'title' => 'RVUSA',
																		'vendor_name' => 'RVUSA'
																	)
																,'ebizautos' => array(
																		'title' => 'Ebizautos',
																		'vendor_name' => 'Ebizautos'
																	)
																,'marinconnection' => array(
																		'title' => 'Marine Connection',
																		'vendor_name' => 'Marine Connection'
																	)
																,'powersports' => array(
																		'title' => 'Powersports Marketing',
																		'vendor_name' => 'Powersports Marketing'
																	)
																,'redziarv' => array(
																		'title' => 'Redzia RV',
																		'vendor_name' => 'Redzia RV'
																	)
																,'endeavor' => array(
																		'title' => 'ARI-Endeavor',
																		'vendor_name' => 'Endeavor'
																	)
																,'digitalpowersports' => array(
																		'title' => 'Digital Powersports',
																		'vendor_name' => 'digitalpowersports'
																	)
																,'kijiji' => array(
																		'title' => 'Kijijileads.com',
																		'vendor_name' => 'kijiji'
																	)
																,'navyfederal' => array(
																		'title' => 'Navy Federal Auto Buying Program',
																		'vendor_name' => 'navyfederal'
																	)
																,'rvt' => array(
																		'title' => 'RVT.com',
																		'vendor_name' => 'rvt'
																	)
																,'gdcauto' => array(
																		'title' => 'Gdcauto',
																		'vendor_name' => 'gdcauto'
																	)
																,'yachtworld' => array(
																		'title' => 'Yachtworld',
																		'vendor_name' => 'yachtworld'
																	)
																,'motolease' => array(
																		'title' => 'Motolease',
																		'vendor_name' => 'Motolease'
																	)
																,'boats' => array(
																		'title' => 'Boats.com',
																		'vendor_name' => 'Boats'
																	)
																,'nglobalgroup' => array(
																		'title' => 'Nautic Global Group',
																		'vendor_name' => 'nglobalgroup'
																	)
																,'edgewater' => array(
																		'title' => 'Edgewater Boats',
																		'vendor_name' => 'Edgewater'
																	)
																,'iboats' => array(
																		'title' => 'iboats',
																		'vendor_name' => 'Iboats'
																	)
																,'footsteps' => array(
																		'title' => 'Footsteps',
																		'vendor_name' => 'Footsteps'
																	)
																,'dcentric' => array(
																		'title' => 'Dealer Centric',
																		'vendor_name' => 'Dcentric'
																	)
																,'tracker' => array(
																		'title' => 'Tracker Marine Group',
																		'vendor_name' => 'Tracker'
																	)
																,'bruns' => array(
																		'title' => 'brunswickboatgroup.com',
																		'vendor_name' => 'bruns'
																	)
																,'pbhmarine' => array(
																		'title' => 'Pbhmarinegroup.com',
																		'vendor_name' => 'pbhmarine'
																	)
																,'kingfisher' => array(
																		'title' => 'Kingfisher',
																		'vendor_name' => 'kingfisher'
																	)
																,'interactrv' => array(
																		'title' => 'Interactrv.com',
																		'vendor_name' => 'interactrv'
																	)
																,'godfrey' => array(
																		'title' => 'Godfrey Marine',
																		'vendor_name' => 'godfrey'
																	)
																,'grady' => array(
																		'title' => 'Grady White',
																		'vendor_name' => 'grady'
																	)
																,'nexttruck' => array(
																		'title' => 'Next Truck Online',
																		'vendor_name' => 'nexttruck'
																	)
																,'seedc' => array(
																		'title' => 'See Dealer Cost',
																		'vendor_name' => 'seedc'
																	)
																,'duckworth' => array(
																		'title' => 'Duck worth',
																		'vendor_name' => 'duckworth'
																	)
																,'pioneer' => array(
																		'title' => 'Pioneerboats.com',
																		'vendor_name' => 'pioneer'
																	)
																,'autotrader' => array(
																		'title' => 'Autotrader',
																		'vendor_name' => 'autotrader'
																	)
																,'websitealive' => array(
																		'title' => 'websitealive.com',
																		'vendor_name' => 'websitealive'
																	)
																,'ecarlist' => array(
																		'title' => 'ecarlist.com',
																		'vendor_name' => 'Ecarlist.com'
																	)
																,'autojini' => array(
																		'title' => 'autojini.com',
																		'vendor_name' => 'autojini.com'
																	)
																,'cargurus' => array(
																		'title' => 'Cargurus.com',
																		'vendor_name' => 'cargurus.com'
																	)
																,'calltrckingapi' => array(
																		'title' => 'Call Trcking Metrics Api',
																		'vendor_name' => 'calltrckingapi'
																	)
																,'callrail' => array(
																		'title' => 'callrail.com',
																		'vendor_name' => 'callrail'
																	)
																,'getemin' => array(
																		'title'         => 'Get Em In',
																		'vendor_name'   => 'getemin'
																),
																'commtruck' => array(
																		'title'         => 'CommercialTruckTrader.com',
																		'vendor_name'   => 'commtruck'
																),
																'carsale' => array(
																		'title'         => 'Carsforsale.com',
																		'vendor_name'   => 'carsale'
																),
																'craigslist' => array(
																		'title'         => 'Craig\'s List',
																		'vendor_name'   => 'craigslist'
																),
																'mailchimp' => array(
																		'title'         => 'Mailchimp',
																		'vendor_name'   => 'Mailchimp'
																),
																'kbb' => array(
																		'title'         => 'Kbb.com',
																		'vendor_name'   => 'Kbb'
																),
																'iseecars' => array(
																		'title'         => 'Iseecars.com',
																		'vendor_name'   => 'Iseecars'
																),
																'autosoftwareleads' => array(
																		'title'         => 'Autosoftwareleads',
																		'vendor_name'   => 'Autosoftwareleads'
																),
																'psndealer' => array(
																		'title'         => 'Psndealer.com',
																		'vendor_name'   => 'Psndealer'
																),
																'apcequipment' => array(
																		'title'         => 'Apcequipment.com',
																		'vendor_name'   => 'APC Equipment'
																),
																'reachlocallivechat' => array(
																		'title'         => 'Reachlocallivechat',
																		'vendor_name'   => 'reachlocallivechat'
																),
																'cisco' => array(
																		'title'         => 'Cisco',
																		'vendor_name'   => 'Cisco'
																),
																'manitouboats' => array(
																		'title'         => 'Manitouboats',
																		'vendor_name'   => 'Manitouboats'
																),
																'smedia' => array(
																		'title'         => 'Smedia',
																		'vendor_name'   => 'Smedia'
																),
																'mydealers' => array(
																		'title'         => 'BoatDealers.ca',
																		'vendor_name'   => 'mydealers'
																),
																'oempolaris' => array(
																		'title'         => 'Polaris',
																		'vendor_name'   => 'oempolaris'
																),
																'freedomsite' => array(
																		'title'         => 'FreedomMarine.com',
																		'vendor_name'   => 'freedomsite'
																),
																'driveitnow' => array(
																		'title'         => 'Driveitnow',
																		'vendor_name'   => 'driveitnow'
																),
																'onlyinboards' => array(
																		'title'         => 'Onlyinboards',
																		'vendor_name'   => 'onlyinboards'
																),
																'airstream' => array(
																		'title'         => 'Airstream',
																		'vendor_name'   => 'airstream'
																),
																'nautique' => array(
																		'title'         => 'Nautique',
																		'vendor_name'   => 'nautique'
																),
																'getauto' => array(
																		'title'         => 'Getauto',
																		'vendor_name'   => 'getauto'
																),
																'pixelmotionmotors' => array(
																		'title'         => 'Pixelmotionmotors',
																		'vendor_name'   => 'pixelmotionmotors'
																),
																'liveadmins' => array(
																		'title'         => 'Live Admins',
																		'vendor_name'   => 'liveadmins'
																),
																'uvsjunction' => array(
																		'title'         => 'Uvsjunction',
																		'vendor_name'   => 'uvsjunction'
																),
																'valuemytradein' => array(
																		'title'         => 'Valuemytradein',
																		'vendor_name'   => 'valuemytradein'
																),
																'cars' => array(
																		'title'         => 'Cars',
																		'vendor_name'   => 'cars'
																),
																'textron' => array(
																		'title'         => 'Textron',
																		'vendor_name'   => 'textron'
																),
																'carfax' => array(
																		'title'         => 'Carfax',
																		'vendor_name'   => 'carfax'
																),
																'credit' => array(
																		'title'         => '700 Credit',
																		'vendor_name'   => 'credit'
																),
																'ducatiomaha' => array(
																		'title'         => 'Ducatiomaha',
																		'vendor_name'   => 'ducatiomaha'
																),
																'liveeventstream' => array(
																		'title'         => 'Liveeventstream',
																		'vendor_name'   => 'liveeventstream'
																),
																'carnow' => array(
																		'title'         => 'Carnow',
																		'vendor_name'   => 'carnow'
																),
																'trailercentral' => array(
																		'title'         => 'Trailercentral',
																		'vendor_name'   => 'trailercentral'
																),
																'endeavorsuite' => array(
																		'title'         => 'Endeavorsuite',
																		'vendor_name'   => 'endeavorsuite'
																),
																'armsvc' => array(
																		'title'         => 'Armsvc',
																		'vendor_name'   => 'armsvc'
																),
																'automoxiecrm' => array(
																		'title'         => 'Automoxiecrm',
																		'vendor_name'   => 'automoxiecrm'
																),
																'truecar' => array(
																		'title'         => 'Truecar',
																		'vendor_name'   => 'truecar'
																),
																'ducati' => array(
																		'title'         => 'Ducati',
																		'vendor_name'   => 'ducati'
																),
																'skierschoice' => array(
																		'title'         => 'Skierschoice',
																		'vendor_name'   => 'skierschoice'
																),
																'dxone' => array(
																		'title'         => 'Dx1app',
																		'vendor_name'   => 'dxone'
																),
																'adventurecamper' => array(
																		'title'         => 'Adventurecamper',
																		'vendor_name'   => 'adventurecamper'
																),
																'thepapers' => array(
																		'title'         => 'The Papers',
																		'vendor_name'   => 'thepapers'
																),
																'automanager' => array(
																		'title'         => 'Automanager',
																		'vendor_name'   => 'automanager'
																),
																'targetmediapartners' => array(
																		'title'         => 'Targetmediapartners',
																		'vendor_name'   => 'targetmediapartners'
																),
																'searay' => array(
																		'title'         => 'Searay',
																		'vendor_name'   => 'searay'
																),
																'hclrv' => array(
																		'title'         => 'Hclrv',
																		'vendor_name'   => 'hclrv'
																),
																'brp' => array(
																		'title'         => 'Brp',
																		'vendor_name'   => 'brp'
																),
																'dealer' => array(
																		'title'         => 'Dealer.com',
																		'vendor_name'   => 'dealer'
																),
																'yourautosolutions' => array(
																		'title'         => 'Yourautosolutions',
																		'vendor_name'   => 'yourautosolutions'
																),
																'autorevo' => array(
																		'title'         => 'Autorevo',
																		'vendor_name'   => 'autorevo'
																),
																'youradstats' => array(
																		'title'         => 'Youradstats',
																		'vendor_name'   => 'youradstats'
																),
																'cfm' => array(
																		'title'         => 'Cfm',
																		'vendor_name'   => 'cfm'
																),
																'dealercarsearch' => array(
																		'title'         => 'Dealercarsearch',
																		'vendor_name'   => 'dealercarsearch'
																),
																'tractorhouse' => array(
																		'title'         => 'Tractorhouse',
																		'vendor_name'   => 'tractorhouse'
																),
																'gubagoo' => array(
																		'title'         => 'Gubagoo',
																		'vendor_name'   => 'gubagoo'
																),
																'fastline' => array(
																		'title'         => 'Fastline',
																		'vendor_name'   => 'fastline'
																),
																'leisurevans' => array(
																		'title'         => 'Leisurevans',
																		'vendor_name'   => 'leisurevans'
																),
																'edmunds' => array(
																		'title'         => 'Edmunds',
																		'vendor_name'   => 'edmunds'
																),
																'boattradevalue' => array(
																		'title'         => 'Boattradevalue',
																		'vendor_name'   => 'boattradevalue'
																),
																'carcode' => array(
																		'title'         => 'Carcode',
																		'vendor_name'   => 'carcode'
																),
																'kawasakidealer' => array(
																		'title'         => 'Kawasakidealer',
																		'vendor_name'   => 'kawasakidealer'
																),
																'fpsapproved' => array(
																		'title'         => 'Fpsapproved',
																		'vendor_name'   => 'fpsapproved'
																),
																'servicesinteractrv' => array(
																		'title'         => 'Servicesinteractrv',
																		'vendor_name'   => 'servicesinteractrv'
																),
																'used' => array(
																		'title'         => 'Used',
																		'vendor_name'   => 'used'
																),
																'boatchat' => array(
																		'title'         => 'Boatchat',
																		'vendor_name'   => 'boatchat'
																),
																'truckertotrucker' => array(
																		'title'         => 'Truckertotrucker',
																		'vendor_name'   => 'truckertotrucker'
																),
																'equipmenttrader' => array(
																		'title'         => 'Equipmenttrader',
																		'vendor_name'   => 'equipmenttrader'
																),
																'sportsmanboatsmfg' => array(
																		'title'         => 'Sportsmanboatsmfg',
																		'vendor_name'   => 'sportsmanboatsmfg'
																),
																'cargigi' => array(
																		'title'         => 'Cargigi',
																		'vendor_name'   => 'cargigi'
																),
																'jastmedia' => array(
																		'title'         => 'Jastmedia',
																		'vendor_name'   => 'jastmedia'
																),
																'rollickoutdoor' => array(
																		'title'         => 'Rollickoutdoor.com',
																		'vendor_name'   => 'rollickoutdoor'
																),
																'lancecamper' => array(
																		'title'         => 'Lancecamper.com',
																		'vendor_name'   => 'lancecamper'
																),
																'truckntrailer' => array(
																		'title'         => 'Truckntrailer.com',
																		'vendor_name'   => 'truckntrailer'
																),
																'imanpro' => array(
																		'title'         => 'Imanpro.com',
																		'vendor_name'   => 'imanpro'
																),
																'storm_division' => array(
																		'title'         => 'Storm Division',
																		'vendor_name'   => 'storm_division'
																),
																'celltuck' => array(
																		'title'         => 'Celltuck.com',
																		'vendor_name'   => 'celltuck'
																),
																'kz_rv' => array(
																		'title'         => 'kz-rv.com',
																		'vendor_name'   => 'kz_rv'
																),
																'vogtrv_wpengine' => array(
																		'title'         => 'Team Velocity Marketing',
																		'vendor_name'   => 'vogtrv_wpengine'
																),
																'dealerwebinstinct' => array(
																		'title'         => 'Dealer Webinstinct',
																		'vendor_name'   => 'dealerwebinstinct'
																),
																'buckeyerv' => array(
																		'title'         => 'Buckeyerv',
																		'vendor_name'   => 'buckeyerv'
																),
																'polaris_digital' => array(
																		'title'         => 'Polaris Digital',
																		'vendor_name'   => 'polaris_digital'
																),
																'skyriverrv' => array(
																		'title'         => 'Skyriverrv',
																		'vendor_name'   => 'skyriverrv'
																),
																'callcap' => array(
																		'title'         => 'Callcap',
																		'vendor_name'   => 'callcap'
																),
																'auction' => array(
																		'title'         => 'Auction123.com',
																		'vendor_name'   => 'auction'
																),
																'northwoodmail' => array(
																		'title'         => 'Northwoodmail.com',
																		'vendor_name'   => 'northwoodmail'
																),
																'hammer_corp' => array(
																		'title'         => 'Hammer Corp',
																		'vendor_name'   => 'hammer_corp'
																),
																'montereyboats' => array(
																		'title'         => 'Montereyboats',
																		'vendor_name'   => 'montereyboats'
																),
																'rvadpros' => array(
																		'title'         => 'Rvadpros',
																		'vendor_name'   => 'rvadpros'
																),
																'malibuboats' => array(
																		'title'         => 'Malibuboats',
																		'vendor_name'   => 'malibuboats'
																),
																'hubspot' => array(
																		'title'         => 'Hubspot',
																		'vendor_name'   => 'hubspot'
																),
																'appone' => array(
																		'title'         => 'Appone.net',
																		'vendor_name'   => 'appone'
																),
																'pixelmotion' => array(
																		'title'         => 'Pixelmotion.com',
																		'vendor_name'   => 'pixelmotion'
																),
																'sitedonerite' => array(
																		'title'         => 'Sitedonerite.com',
																		'vendor_name'   => 'sitedonerite'
																),
																'geteminleads' => array(
																		'title'         => 'Geteminleads.com',
																		'vendor_name'   => 'geteminleads'
																),
																'rvchat' => array(
																		'title'         => 'Rvchat.com',
																		'vendor_name'   => 'rvchat'
																),
																'natureandmerv' => array(
																		'title'         => 'Natureandmerv.com',
																		'vendor_name'   => 'natureandmerv'
																),
																'ipssolutions' => array(
																		'title'         => 'IPS Solutions',
																		'vendor_name'   => 'ipssolutions'
																),
																'webdb' => array(
																		'title'         => 'Web DB',
																		'vendor_name'   => 'webdb'
																),
																'denvermarine' => array(
																		'title'         => 'Edwatkinsmarine.com',
																		'vendor_name'   => 'denvermarine'
																),
																'builderdesigns' => array(
																		'title'         => 'Builderdesigns.com',
																		'vendor_name'   => 'builderdesigns'
																),
																'vespaoftc' => array(
																		'title'         => 'Vespaoftc.com',
																		'vendor_name'   => 'vespaoftc'
																),
																'eldoradorv' => array(
																		'title'         => 'Eldoradorv.com',
																		'vendor_name'   => 'eldoradorv'
																)
														);
					//hattiesburg rules start
					 //if(in_array($dealer_id,array(20070,20075,20080,410,20090))) {

						 $element_creation_data['hattiesburg'] = array (
							'title'=>'Hattiesburg Cycles',
							'vendor_name'=>'Hattiesburg'
						 );
					 //}
					//hattiesburg rules end
					//truckpaper rules start
					//if(AuthComponent::user('dealer_id') == '2663'){

						$element_creation_data['truckpaper'] = array (
							'title'=>'Truckpaper.com',
							'vendor_name'=>'truckpaper'
						 );
					//}
					//truckpaper rules end

					foreach($element_creation_data as $key => $values) {

						echo $this->element("rules1", array(
								'rules' => ${$key . '_rules'},
								'users' => $users,
								'rule_direct' => ${$key . '_rule_direct'},
								'advanced_round_robin_dealer_setting' => $advanced_round_robin_dealer_setting,
								'all_active_users' => $all_active_users,
								'RulesRoundrobinNovehicle_user_id' => $RulesRoundrobinNovehicle_user_id,
								'weblead_queue' => $weblead_queue,
								'next_receive'  => $next_receive,
								'rr_users'      => $rr_users,
								'keyword'       => $key,
								'title'         => $values['title'],
								'vendor_name'   => $values['vendor_name']
						));
					}
					?>
				<!-- Unified element creation rules end -->

		<!-- Auto Sweet rules start -->
	<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Auto Sweet web Rules</h4>
				</div>
				<div class="widget-body">
						<div class="row">
							<div class="col-md-12">

						<div style="">

							<?php echo $this->Form->create('Contact', array('url'=>array('controller'=>'rules', 'action'=>'save_auto_sweet_rule'),'id'=>'ContactAutoSweetForm', 'type'=>'post', 'class' => 'apply-nolazy', 'role'=>"form")); ?>

							<div class="checkbox">
								<label class="checkbox-custom">
									<input type="checkbox" id="ContactAutoSweetOpen"  <?php echo ($auto_sweet_rules['auto_sweet_open'] == true)? 'checked="checked"' : "" ?>  class="auto_sweet_chk_rules" name="data[Contact][auto_sweet_open]" value="auto_sweet_open" >
									<i class="fa fa-fw fa-square-o"></i>  Open Rule first-come first served.
								</label>
							</div>

							<div class="checkbox">
								<label class="checkbox-custom">
									<input type="checkbox" id="ContactAutoSweetDirect" <?php echo ($auto_sweet_rules['auto_sweet_direct'] == true)? 'checked="checked"' : "" ?> class="auto_sweet_chk_rules" name="data[Contact][auto_sweet_direct]" value="auto_sweet_direct" >
									<i class="fa fa-fw fa-square-o"></i>   Direct Rule to assigned sales person:
								</label>
								<?php echo $this->Form->select('auto_sweet_users_id', $users, array('value' => $auto_sweet_rule_direct['Rule']['user_id'], 'class' => 'input-small','empty'=>"Select")); ?>
							</div>

							<div class="checkbox">
								<label class="checkbox-custom">
									<input type="checkbox" id="ContactAutoSweetRoundRobin" <?php echo ($auto_sweet_rules['auto_sweet_round-robin'] == true)? 'checked="checked"' : "" ?> class="auto_sweet_chk_rules" name="data[Contact][auto_sweet_round-robin]" value="auto_sweet_round-robin" >
								<i class="fa fa-fw fa-square-o"></i>
									Round-Robin Rule assinged to logged in users in order of last recivied.
									<a  href="#modal-2" id="dset_round_robin" data-toggle="modal" class="btn btn-default btn-stroke">Select employee</a>

								</label>
							</div>
							<?php if($auto_sweet_rules['auto_sweet_round-robin'] == true){ ?>

								<?php if($round_robin_category == 'On'){ ?>
									<?php echo $this->element("round_robin_queue_table", array('round_table_data' =>$dealer_spike_round_data) ); ?>
								<?php  }else{ ?>

									<h4>Round Robin Queue</h4>
									<div class="text-right">
										<span class="text-warning">Sperson with no Vehicle: </span>
										<?php
									 	echo $this->Form->select('roundrobin_novehicle_auto_sweet',$all_active_users, array('vendor'=>"auto_sweet", 'value'=>$RulesRoundrobinNovehicle_user_id, 'class' => 'input-small roundrobin_novehicle','empty'=>"Select"));
										?>
									</div>
			                        <table class="table table-striped table-responsive swipe-horizontal ">
			                                <!-- Table heading -->
			                                <thead>
			                                        <tr>
			                                                <th>Employee</th>
			                                                <th>Dealer</th>
			                                                <th>Last Receive</th>
			                                                <th>Last Login</th>
			                                        </tr>
			                                </thead>
			                                <!-- // Table heading END -->
			                                <!-- Table body -->
			                        <tbody>
			                                <!-- Table row -->
			                                 <?php echo  $this->element("queue_table",  array('weblead_queue_list'=> $auto_sweet_weblead_queue ,'tb_model_name'=>'WebleadQueue')); ?>
			                                <!-- // Table row END -->
			                            </tbody>
			                            <!-- // Table body END -->
			                        </table>

									<div>Next Receive: <span class="text-primary"><?php echo $auto_sweet_next_receive['User']['full_name']; ?> # <?php echo $auto_sweet_next_receive['User']['id']; ?></span></div>

								<?php } ?>

							<?php } ?>
							<div class="text-right">
								<button type="submit" id="auto_sweet_submit_rules" class="btn btn-primary">Save</button>
							</div>

							<?php echo $this->Form->end(); ?>

						</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<!-- //Auto Sweet rules end -->


	</div>
	<?php  //echo $this->element("sql_dump"); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-2">

	<div class="modal-dialog" style="width: 850px;">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">
				<div class="row">
					<?php
					foreach($round_robin_users as $ruser){ ?>
						<div class="col-md-3">
							<div class="checkbox">
								<label class="checkbox-custom">
									<input type="checkbox" name="checkbox_round_robin_<?php echo $ruser['User']['id']; ?>" class="round_robin_chk"  <?php echo ($ruser['User']['round_robin'] == true)? 'checked="checked"' : ""; ?>  id="r_user_<?php echo $ruser['User']['id']; ?>" value="<?php echo $ruser['User']['id']; ?>" >
									<i class="fa fa-fw fa-square-o"></i> <?php echo $ruser['User']['full_name']; ?>
								</label>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-primary" data-dismiss="modal">Ok</a>
			</div>
		</div>
	</div>

</div>
<!-- // Modal END -->


<?php
//debug( $rules['open'] );
//debug( $rules['direct'] );
//debug( $rules['round-robin'] );
echo $this->element("sql_dump");
?>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

	$(".round_robin_chk").checkbox();

	//set default
	<?php if( $rules['open'] == true ){ ?>
		$("#ContactOpen").checkbox('check');
	<?php } ?>
	<?php if( $rules['direct'] == true ){ ?>
		$("#ContactDirect").checkbox('check');
	<?php } ?>
	<?php if( $rules['round-robin'] == true ){ ?>
		$("#ContactRoundRobin").checkbox('check');
	<?php } ?>

	<?php foreach($round_robin_users as $ruser){
		if($ruser['User']['round_robin'] == true){
	?>
		$("#r_user_<?php echo $ruser['User']['id'] ?>").checkbox('check');
	<?php } }?>

	$(".round_robin_chk").click(function(){
		//console.log( $(this).is(":checked") );
		rr_status = $(this).is(":checked");
		user_id = $(this).val();

		$.ajax({
			type: "POST",
			data: {'rr_status': rr_status, 'user_id':user_id},
			url: "/rules/set_round_robin/",
			success: function(data){
				$("#oem_vehicle_list").html(data);
			}
		});
		return true;
	});




	$(".alert").delay(3000).fadeOut("slow");

	$(".chk_rules").click(function(){
		$(".chk_rules").checkbox('uncheck');
		$(this).checkbox('check');
		//$("#ContactStatus").val(  $(this).prop('value')  );
	});



	<?php // These two refnums will be working on the previous basis
				// but eventually has to be added to the general rule as well
		//set default for Boats Cycles rules
	if( $boatscycles_rules['boatsCycles_open'] == true ){ ?>
		$("#ContactBoatscyclesOpen").checkbox('check');
	<?php } ?>
	<?php if( $boatscycles_rules['boatsCycles_direct'] == true ){ ?>
		$("#ContactBoatscyclesDirect").checkbox('check');
	<?php } ?>
	<?php if( $boatscyles_rules['boatsCycles_round-robin'] == true ){ ?>
		$("#ContactBoatscyclesRoundRobin").checkbox('check');
	<?php } ?>



	<?php ///set default for Auto Sweet

	if( $auto_sweet_rules['auto_sweet_open'] == true ){ ?>
		$("#ContactAutoSweetOpen").checkbox('check');
	<?php } ?>
	<?php if( $auto_sweet_rules['auto_sweet_direct'] == true ){ ?>
		$("#ContactAutoSweetDirect").checkbox('check');
	<?php } ?>
	<?php if( $auto_sweet_rules['auto_sweet_round-robin'] == true ){ ?>
		$("#ContactAutoSweetRoundRobin").checkbox('check');
	<?php } // These two has to be added to the cycle as well?>

		<?php
								// <<<!!!===--- Loop for Outputting scripts for each REFNUM ---===!!!>>>
		//
			foreach($element_creation_data as $key => $values) {
		?>

		///set default for every $key in the $element_creation_data = CatSun
			<?php if( ${$key . '_rules'}[$key.'_open'] == true ){ ?>
				$("#Contact<?php echo(ucfirst($key));  ?>Open").checkbox('check');
			<?php } ?>
			<?php if( ${$key . '_rules'}[ucfirst($key) . '_direct'] == true ){ ?>
				$("#Contact<?php echo(ucfirst($key));  ?>Direct").checkbox('check');
			<?php } ?>
			<?php if( ${$key . '_rules'}[ucfirst($key) . '_round-robin'] == true ){ ?>
				$("#Contact<?php echo(ucfirst($key));  ?>RoundRobin").checkbox('check');
			<?php } ?>

				$(".<?php echo($key); ?>_chk_rules").click(function(){
					$(".<?php echo($key); ?>_chk_rules").checkbox('uncheck');
					$(this).checkbox('check');

				});

				$("#<?php echo($key); ?>_submit_rules").click(function(){
					if($("#Contact<?php echo(ucfirst($key)); ?>Direct").is(":checked")
							&& $("#Contact<?php echo(ucfirst($key)); ?>UsersId").val() == "" ){
						alert("Please select sales person");
						$("#Contact<?php echo(ucfirst($key)); ?>UsersId").focus();
						return false;
					}
					if(!confirm("Do you want to activate the rule?")){
						return false;
					}

				});
		<?php } ?>


// ========== Check rules for those two
	///for Boats Cycles
	$(".boatsCycles_chk_rules").click(function(){
		$(".boatsCycles_chk_rules").checkbox('uncheck');
		$(this).checkbox('check');
		//$("#ContactStatus").val(  $(this).prop('value')  );
	});

		///for auto sweet
		$(".auto_sweet_chk_rules").click(function(){
			$(".auto_sweet_chk_rules").checkbox('uncheck');
			$(this).checkbox('check');

		});


// Submit Rules section <!-- START -->

	$("#submit_rules").click(function(){
		if($("#ContactDirect").is(":checked") && $("#ContactUsersId").val() == "" ){
			alert("Please select sales person");
			$("#ContactUsersId").focus();
			return false;
		}
		if(!confirm("Do you want to activate the rule?")){
			return false;
		}

	});

///For Boats Cycles
	$("#boatscycles_submit_rules").click(function(){
		if($("#ContactBoatscyclesDirect").is(":checked") && $("#ContactBoatscyclesUsersId").val() == "" ){
			alert("Please select sales person");
			$("#ContactBoatscyclesUsersId").focus();
			return false;
		}
		if(!confirm("Do you want to activate the rule?")){
			return false;
		}

	});


	///For Auto Sweet
	$("#auto_sweet_submit_rules").click(function(){
		if($("#ContactAutoSweetDirect").is(":checked") && $("#ContactAutoSweetUsersId").val() == "" ){
			alert("Please select sales person");
			$("#ContactAutoSweetUsersId").focus();
			return false;
		}
		if(!confirm("Do you want to activate the rule?")){
			return false;
		}

	});


		//Round robin
			$(".btn-roundrobin-adduser").click(function(){
				var rcatid = $(this).attr('roundrobin_cat_id');
				var usr_id = $("#roundrobin_cat_add_user_"+rcatid).val();
				if(usr_id == ''){
					$("#roundrobin_cat_add_user_"+rcatid).focus();
					alert("Please select user");
					return true;
				}


				location.href = "/rules/roundrobin_user_add/"+rcatid+"/"+usr_id;

				return true;
			});
	//Save round robin sperson with no vehicle settings
	$(".roundrobin_novehicle").change(function(){

		var usrid = $(this).val();

		$.ajax({
			type: "POST",
			data: {'usrid': usrid},
			url: "/rules/roundrobin_no_vehicle/",
			success: function(data){
				//console.log(data);
				location.href = '/rules';
				//$("#oem_vehicle_list").html(data);
			}
		});
	});


	//New Round Robin Rules section
	// $(".btn-round-robin-user-add").click(function(event){
	// 	event.preventDefault;
	// 	var input_id = $(this).attr("input_id");

	// 	var dsRrFilters = $('select.round_robin_users_add');
	// 	var rr_data = {};

	// 	dsRrFilters.each(function(){
	// 		if($(this).val() == ''){
	// 			$(this).focus();
	// 			alert("Please select "+$(this).attr("rel"));
	// 			return false;
	// 		} else {
	// 			rr_data[$(this).attr("rel")] = $(this).val();
	// 		}
	// 	});

	// 	if(Object.keys(rr_data).length == dsRrFilters.length){
	// 		$(this).attr("disabled", true);  //Disable multiple form submissions
	// 		$.ajax({
	// 			type: "POST",
	// 			data: rr_data,
	// 			url: "/rules/round_robin_add_user/",
	// 			success: function(data){
	// 				location.href = '/rules';
	// 			}
	// 		});
	// 	}

	// });

	$(".btn-round-robin-filtergroup-add").click(function(event){
		event.preventDefault();

		var input_id = $(this).attr("input_id");
		var rr_data = {};
		var validate = true;

		$("[id^='"+input_id+"']").each(function(index, element){
			if(element.name == 'data[RoundRobinGroup][round_robin_filter_group_default]'){
				rr_data[element.name] = $(this).is(":checked");
			}else{
				rr_data[element.name] = $(this).val();
			}
			if(element.name == 'data[RoundRobinGroup][name_input]' && $(this).val() == ''){
				alert("Please enter Group Name");
				$(this).focus();
				validate = false;
			}
		});

		if(validate == true){
			$(this).attr("disabled", true);
			$.ajax({
				type: "POST",
				data: rr_data,
				url: "/rules/round_robin_filter_group/",
				success: function(data){
					location.href = '/rules';
				}
			});
		}

	});


	$(".btn-roundrobin-adduser-group").click(function(event){
		event.preventDefault();
		var validate = true;
		var input_id = $(this).attr("input_id");
		var roundrobin_group_id = $(this).attr("roundrobin_group_id");
		var sperson = $("#"+input_id+ "-" + roundrobin_group_id +"-round_robin_users_add_user").val();

		console.log(input_id, roundrobin_group_id, sperson);
		if(!sperson){
			alert("Please select sales person")
			validate = false;
		}

		if(validate == true){
			$(this).attr("disabled", true);
			$.ajax({
				type: "POST",
				data: {'roundrobin_group_id' : roundrobin_group_id, 'sperson' : sperson },
				url: "/rules/round_robin_add_user/",
				success: function(data){
					location.href = '/rules';
				}
			});
		}

	});



	if (typeof $.fn.select2 != 'undefined'){
		$(".round_robin_filter_input_category").select2({
		    placeholder: "Select Categories",
		    allowClear: true
		});
	}



	$(".edit_roundrobingroup_rules").click(function(event){
		$.ajax({
			type: "GET",
			cache: false,
			url: "/rules/edit_roundrobingroup/"+$(this).attr("round-robin-group-id"),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Edit Round Robin Filter Group",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});

	});









	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
