<?php
class DealsController extends AppController {

    public $uses = array('Deal','History','Contact', 'User', 'DealFixedfee','InventoryOem');
	public $components = array('RequestHandler');

    public $paginate = array(
        'findType' => 'threaded',
        'limit' => 6,
        'order' => array(
            'Deal.id' => 'DESC',
        )
    );

	public function work_sheet_lookup() {
		$oem_vehicles = $this->InventoryOem->find('all',array('conditions'=>$conditons));
		$this->set('oem_vehicles', $oem_vehicles);
	}
	public function work_sheet($id) {
		$deal = $this->Deal->find('first', array('conditions'=>array('Deal.id'=>$id)));
		$this->set('deal',$deal);
		if ($this->request->is('post')) {

		}else{
			// $this->request->data = $deal;
		}
	}

	public function worksheet_notification($id = null){

		$dealer_id = $this->Auth->User('dealer_id');
		$zone = $this->Auth->User('zone');
		date_default_timezone_set($zone);


		$this->loadModel('WorksheetNotificationEmail');
		$WorksheetNotificationEmails = $this->WorksheetNotificationEmail->find('all', array('conditions'=>array('WorksheetNotificationEmail.dealer_id'=>$dealer_id)));
		$emails =  Set::extract('/WorksheetNotificationEmail/email',$WorksheetNotificationEmails);
		if(!empty($emails)){


			$deal_data = $this->Deal->find('first', array('conditions'=>array('Deal.id'=>$id)));
			$deal_statuses = $this->Deal->DealStatus->find('list');

			$contactinfo = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$deal_data['Deal']['contact_id'])));

			$subject = "A worksheet was saved for ".$contactinfo['Contact']['first_name']." ".$contactinfo['Contact']['middle_name']." ".$contactinfo['Contact']['last_name']." On ".date('m/d/Y g:i A');


			/**
			* Add email queue
			* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "",
			* template = "", $from = "", $to = "", $bcc = "")
			**/
			$this->loadModel("QueueEmail");
			$this->QueueEmail->create_email_queue(
				"worksheet_notification",
				$subject,
				"sender",
				serialize(array('deal_status'=>$deal_statuses[ $deal_data['Deal']['deal_status_id'] ] , 'contactinfo' => $contactinfo )),
				'sender@dp360crm.com',
				'worksheet_notification',
				"sender@dp360crm.com",
				serialize($emails),
				serialize(array(
					'andrew@dp360crm.com',
					'russel@dp360crm.com'
				))
			);

			//Send Email Alert end


		}
		return true;
	}


      //push deal_info into DMS API
      public function push_deal($contact_id){
          $this->autoRender=FALSE;
          $this->layout='';
          $dealinfo=$this->Deal->findByContactId($contact_id);
          $cus_number=explode('_',$dealinfo['Contact']['ref_num']);
          if($cus_number[0]!='DTrack'){
              return 'Invalid Customer ID!!!';
          }

         if(strtolower($dealinfo['Deal']['condition'])=='used' || strtolower($dealinfo['Deal']['condition'])=='u'){
              $condition='U';
          }elseif(strtolower($dealinfo['Deal']['condition'])=='new' || strtolower($dealinfo['Deal']['condition'])=='n'){
              $condition='N';
          }else{
              return 'Please enter valid CONDITION value!';
          }

          if($dealinfo['Deal']['down_payment']!=''){
              $down_payment=$dealinfo['Deal']['down_payment'];
          }else{
              $down_payment='0.0';
          }

          if($dealinfo['Deal']['loan_apr']!=''){
              $loan_apr=$dealinfo['Deal']['loan_apr'];
          }else{
              $loan_apr='0.000';
          }

          //debug($cus_number[1]);
//          debug($dealinfo);
//          exit();
           //Data, connection, auth
        $soapUrl = "https://otcert.arkona.com/opentrack/webservice.asmx"; // asmx URL of WSDL
        $soapUser = "DealerPCRM";  //  username
        $soapPassword = "DP36025$!1"; // password

        // xml post structur
        $vehicleinfo = '<?xml version="1.0" encoding="utf-8"?>
                           <soap:Envelope xmlns:tran="http://www.starstandards.org/webservices/2005/10/transport" xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <soap:Header>
      <wsse:Security mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
         <wsse:UsernameToken>
            <wsse:Username>DealerPCRM</wsse:Username>
            <wsse:Password>DP36025$!1</wsse:Password>
            <wsse:Created>2013-11-20T20:11:30E</wsse:Created>
         </wsse:UsernameToken>
      </wsse:Security>
      <tran:PayloadManifest>
         <tran:manifest contentID="1"/>
      </tran:PayloadManifest>
   </soap:Header>
   <soap:Body>
      <tran:ProcessMessage>
         <tran:payload>
            <tran:content id="Content0">
               <DealAdd>
                  <Dealer>
                     <EnterpriseCode>ZE</EnterpriseCode>
                     <CompanyNumber>ZE7</CompanyNumber>
                     <ServerName>ARKONAP.ARKONA.COM</ServerName>
                  </Dealer>
                  <Deal>
                     <CompanyNumber>ZE7</CompanyNumber>
                     <RecordType>'.$dealinfo['Deal']['RecordType'].'</RecordType>
                     <VehicleType>'.$condition.'</VehicleType>
                     <SaleType>'.$dealinfo['Deal']['SaleType'].'</SaleType>
                     <StockNumber>'.$dealinfo['Deal']['stock_num'].'</StockNumber>
                     <VIN>'.$dealinfo['Deal']['vin'].'</VIN>
                     <BuyerNumber>'.$cus_number[1].'</BuyerNumber>
                     <CoBuyerNumber/>
                     <SearchName>'.$dealinfo['Deal']['last_name'].', '.$dealinfo['Deal']['first_name'].'</SearchName>
                     <DealDate>'.str_replace('-','',date('Y-m-d'), strtotime($dealinfo['Deal']['created'])).'</DealDate>
                     <RetailPrice>'.$dealinfo['Deal']['unit_value'].'</RetailPrice>
                     <DownPayment>'.$down_payment.'</DownPayment>
                     <TradeAllowance/>
                     <TradeACV/>
                     <TradePayoff/>
                     <APR>'.$loan_apr.'</APR>
                     <RetailTerm>1</RetailTerm>
                     <InsuranceTerm>1</InsuranceTerm>
                     <DaysToFirstPayment/>
                     <PaymentFrequency/>
                     <DateTempStickerExp/>
                     <TaxGroupKey/>
                     <LendingSourceKey>0</LendingSourceKey>
                     <LeasingSourceKey/>
                     <OLAlias/>
                     <InsuranceSource/>
                     <GAPSource/>
                     <ServiceContractAmount/>
                     <ServiceContractCost/>
                     <CreditLifePremium/>
                     <LevelCLPremium/>
                     <AandHPremium/>
                     <GAPPremium/>
                     <GAPCost/>
                     <CreditLifeCode/>
                     <AandHCode/>
                     <GAPCode/>
                     <Tax1>0.00</Tax1>
                     <Tax2>0.00</Tax2>
                     <Tax3>0.00</Tax3>
                     <Tax4>0.00</Tax4>
                     <Tax5>0.00</Tax5>
                     <BuyRate/>
                     <ReserveHoldbackPercent/>
                     <NumberOfTrades>0</NumberOfTrades>
                     <TemporaryStickerNumber/>
                     <CreditLifeCertNumber/>
                     <AandHCertNumber/>
                     <GAPCertNumber/>
                     <FlooringVendor/>
                     <PDInsuranceCo/>
                     <PDInsuranceCoAlias/>
                     <PDPolicyNumber/>
                     <PDPolicyExpireDate/>
                     <PDAgentName/>
                     <PDAgentAddress/>
                     <PDAgentCity/>
                     <PDAgentState/>
                     <PDAgentZip/>
                     <PDAgentPhoneNumber/>
                     <PDCollCoverage/>
                     <PDCompCoverage/>
                     <PDFireTheftCoverage/>
                     <PDCollectionDeduct/>
                     <PDCompDeduct/>
                     <PDFireTheftDeduct/>
                     <PDVehicleUse/>
                     <PDPremium/>
                     <AMOTotal/>
                     <FeeTotal/>
                     <TotalOfPayments/>
                     <FinanceCharge/>
                     <VehicleCost>'.$dealinfo['Deal']['actual_cost'].'</VehicleCost>
                     <InternalCost>0.00</InternalCost>
                     <AddsToCostTotal/>
                     <HoldBack/>
                     <PackAmount/>
                     <CommissionableGross/>
                     <Incentive/>
                     <Rebate/>
                     <OdometerAtSale/>
                     <PickupAmount/>
                     <PickupBeginningDate/>
                     <PickupFrequency/>
                     <PickupNumberPay/>
                     <LifeReserve/>
                     <AandHReserve/>
                     <GAPReserve/>
                     <PDIReserve/>
                     <AMOReserve/>
                     <ServiceReserve/>
                     <FinanceReserve/>
                     <TotalFandIReserve/>
                     <DefDownPayment/>
                     <DefDownDueDate/>
                     <LoanOriginationFee/>
                     <LOFOverride/>
                     <EffectiveAPR/>
                     <MSRP/>
                     <LeasePrice/>
                     <AdjCapitalizedCost/>
                     <CapCostReduction/>
                     <LeaseAPR/>
                     <LeaseFactor/>
                     <LeaseTerm/>
                     <ResidualPercent/>
                     <ResidualAmount/>
                     <NetResidual/>
                     <TotalDepreciation/>
                     <MilesYearActual/>
                     <MilesYearAllow/>
                     <ExcessMileRatePrepaid/>
                     <ExcessMileRate2Penalty/>
                     <ExcessMileCharge/>
                     <AcquisitionFee/>
                     <BaseLeasePayment/>
                     <LeasePaymentAndTax/>
                     <LeaseSalesTax/>
                     <MonthlyLeaseCharge/>
                     <CapReductionTax/>
                     <SecurityDeposit/>
                     <DepositReceived/>
                     <CashReceived/>
                     <LeaseFactorBuyRate/>
                     <AmountDueAtLeaseSigning/>
                     <CapLeaseSalesTax/>
                     <SecurityDepositOverride/>
                     <AcquisitionFeeOverride/>
                     <FETOptions/>
                     <CapitalizeSalesTax/>
                     <AdvPaymentLease/>
                     <OverrideTaxRate1/>
                     <OverrideTaxRate2/>
                     <OverrideTaxRate3/>
                     <OverrideTaxRate4/>
                     <OverrideTaxRate6/>
                     <OverrideExcTrade1/>
                     <OverrideExcTrade2/>
                     <OverrideExcTrade3/>
                     <OverrideExcTrade4/>
                     <FinReserveOverride/>
                     <CostOverride/>
                     <HoldbackOverride/>
                     <TaxOverride/>
                     <RebateDownPay/>
                     <ContractSelected/>
                     <ChgInterestOn1Payment>N</ChgInterestOn1Payment>
                     <SaleAccount/>
                     <UnwindFlag/>
                     <DocumentNumber/>
                     <BuyerAge/>
                     <CoBuyerAge/>
                     <LifeCoverage/>
                     <AandHCoverage/>
                     <InsuranceTermDate/>
                     <LeaseTaxGroup/>
                     <CoBuyerLifePremium/>
                     <DateSaved/>
                     <DateTradePayoff/>
                     <CapitalizeCRTax/>
                     <RebateAsDown/>
                     <TotalDown/>
                     <TotalCapReduction/>
                     <GrossCapCost/>
                     <DealerIncentive/>
                     <NewVehicleDeliveryReport/>
                     <ExcessMileageChargeBalloon/>
                     <PenaltyExcessMileageChargeBalloon/>
                     <PrepaidExcessMileageChargeBalloon/>
                     <MilesPerYearBalloon/>
                     <MilesPerYearAllowedBalloon/>
                     <NetResidualBalloon/>
                     <ResidualAmountBalloon/>
                     <ResidualPercentBalloon/>
                     <AfterMarketTax/>
                     <TaxExemptPayments/>
                     <FullPayments/>
                     <FordPlanCode/>
                     <AandHTerm/>
                     <LeasePaymentTax/>
                     <TradeFromLease/>
                     <OriginalNetTrade/>
                     <NonTaxableTradeEquity/>
                     <P9PolicyNumber/>
                     <PartiallyExemptPayment/>
                     <PartiallyExemptTax/>
                     <ServiceContractTax/>
                     <TotalAandHCoverage/>
                     <TaxBaseAmount/>
                     <WorkInProcess/>';

    $end='</Deal>
               </DealAdd>
            </tran:content>
         </tran:payload>
      </tran:ProcessMessage>
   </soap:Body>
</soap:Envelope>';


    $tradeinfo='';
       if($dealinfo['Deal']['make_trade']!='' and $dealinfo['Deal']['model_trade']!='' and $dealinfo['Deal']['year_trade']!='' and $dealinfo['Deal']['vin_trade']!='' and $dealinfo['Deal']['stock_num_trade']!=''){

           $tradeallow='';
           if($dealinfo['Deal']['trade_allowance']!=''){
           $tradeallow='<TradeAllowance>'.$dealinfo['Deal']['trade_allowance'].'</TradeAllowance>';
           }
    $tradeinfo='<TradeIns>
                    <TradeIn>
                    <VIN>'.$dealinfo['Deal']['vin_trade'].'</VIN>
                    <StockNumber>'.$dealinfo['Deal']['stock_num_trade'].'</StockNumber>'.$tradeallow.'
                    <TradeYear>'.$dealinfo['Deal']['year_trade'].'</TradeYear>
                    <TradeMake>'.$dealinfo['Deal']['make_trade'].'</TradeMake>
                    <TradeModel>'.$dealinfo['Deal']['model_trade'].'</TradeModel>
                    <TradeSaleGroup>GM</TradeSaleGroup>
                    </TradeIn>
                    </TradeIns>';
       }

       if($dealinfo['Deal']['freight_desc']!='' AND $dealinfo['Deal']['freight_fee']!=''){
       $freight_desc= explode('_',$dealinfo['Deal']['freight_desc'],3);
       $freight='<DealFee>
            <RecordType>'.$freight_desc[0].'</RecordType>
            <SequenceNumber>'.$freight_desc[1].'</SequenceNumber>
            <Description>'.$freight_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['freight_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }

         if($dealinfo['Deal']['prep_desc']!='' AND $dealinfo['Deal']['prep_fee']!=''){
       $prep_desc= explode('_',$dealinfo['Deal']['prep_desc'],3);
       $prep='<DealFee>
            <RecordType>'.$prep_desc[0].'</RecordType>
            <SequenceNumber>'.$prep_desc[1].'</SequenceNumber>
            <Description>'.$prep_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['prep_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }

        if($dealinfo['Deal']['doc_desc']!='' AND $dealinfo['Deal']['doc_fee']!=''){
       $doc_desc= explode('_',$dealinfo['Deal']['doc_desc'],3);
       $doc='<DealFee>
            <RecordType>'.$doc_desc[0].'</RecordType>
            <SequenceNumber>'.$doc_desc[1].'</SequenceNumber>
            <Description>'.$doc_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['doc_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }

        if($dealinfo['Deal']['parts_desc']!='' AND $dealinfo['Deal']['parts_fee']!=''){
       $parts_desc= explode('_',$dealinfo['Deal']['parts_desc'],3);
       $parts='<DealFee>
            <RecordType>'.$parts_desc[0].'</RecordType>
            <SequenceNumber>'.$parts_desc[1].'</SequenceNumber>
            <Description>'.$parts_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['parts_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }


        if($dealinfo['Deal']['tag_desc']!='' AND $dealinfo['Deal']['tag_fee']!=''){
       $tag_desc= explode('_',$dealinfo['Deal']['tag_desc'],3);
       $tag='<DealFee>
            <RecordType>'.$tag_desc[0].'</RecordType>
            <SequenceNumber>'.$tag_desc[1].'</SequenceNumber>
            <Description>'.$tag_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['tag_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }


        if($dealinfo['Deal']['sales_desc']!='' AND $dealinfo['Deal']['tax_fee']!=''){
       $sales_desc= explode('_',$dealinfo['Deal']['sales_desc'],3);
       $sales='<DealFee>
            <RecordType>'.$sales_desc[0].'</RecordType>
            <SequenceNumber>'.$sales_desc[1].'</SequenceNumber>
            <Description>'.$sales_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['tax_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }

       $allfee='';
       if($freight!='' || $prep!='' || $parts!='' || $doc!='' || $tag!='' || $sales!=''){
       $allfee='<Fees>'.$freight.$prep.$parts.$doc.$tag.$sales.'</Fees>';
       }

       if($allfee!=''){
        $tradeinfo=$tradeinfo.$allfee;
       }

       if($tradeinfo!=''){
          $xml_post_string=$vehicleinfo.$tradeinfo.$end;
       }else{
          $xml_post_string=$vehicleinfo.$end;

       }
        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: http://www.starstandards.org/webservices/2005/10/transport/operations/ProcessMessage",
            "Content-length: " . strlen($xml_post_string),
        );

        $url = $soapUrl;
        // PHP cURL  for https connection with auth
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // converting
        $response = curl_exec($ch);
        curl_close($ch);

        // converting
        $response1 = str_replace("<soap:Body>", "", $response);
        $response2 = str_replace("</soap:Body>", "", $response1);

        // convertingc to XML
        $parser = simplexml_load_string($response2);
        $json = json_encode($parser);
        $data_array = json_decode($json, TRUE);
        //debug($data_array);
        echo '<pre>';
        print_r($data_array['ProcessMessageResponse']['payload']['content']['DealAddResponse']);

        exit('------');

      }

   //push deal_info into DMS API for RV_workSheet
      public function rv_push_deal($contact_id){
          $this->autoRender=FALSE;
          $this->layout='';
          $dealinfo=$this->Deal->findByContactId($contact_id);
          $cus_number=explode('_',$dealinfo['Contact']['ref_num']);
          if($cus_number[0]!='DTrack'){
              return 'Invalid Customer ID!!!';
          }

         if(strtolower($dealinfo['Deal']['condition'])=='used' || strtolower($dealinfo['Deal']['condition'])=='u'){
              $condition='U';
          }elseif(strtolower($dealinfo['Deal']['condition'])=='new' || strtolower($dealinfo['Deal']['condition'])=='n'){
              $condition='N';
          }else{
              return 'Please enter valid CONDITION value!';
          }

          if($dealinfo['Deal']['down_payment']!=''){
              $down_payment=$dealinfo['Deal']['down_payment'];
          }else{
              $down_payment='0.0';
          }
          /*
          if($dealinfo['Deal']['loan_apr']!=''){
              $loan_apr=$dealinfo['Deal']['loan_apr'];
          }else{
              $loan_apr='0.000';
          }*/

          //debug($cus_number[1]);
//          debug($dealinfo);
//          exit();
           //Data, connection, auth
        $soapUrl = "https://otcert.arkona.com/opentrack/webservice.asmx"; // asmx URL of WSDL
        $soapUser = "DealerPCRM";  //  username
        $soapPassword = "DP36025$!1"; // password

        // xml post structur
        $vehicleinfo = '<?xml version="1.0" encoding="utf-8"?>
                           <soap:Envelope xmlns:tran="http://www.starstandards.org/webservices/2005/10/transport" xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <soap:Header>
      <wsse:Security mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
         <wsse:UsernameToken>
            <wsse:Username>DealerPCRM</wsse:Username>
            <wsse:Password>DP36025$!1</wsse:Password>
            <wsse:Created>2013-11-20T20:11:30E</wsse:Created>
         </wsse:UsernameToken>
      </wsse:Security>
      <tran:PayloadManifest>
         <tran:manifest contentID="1"/>
      </tran:PayloadManifest>
   </soap:Header>
   <soap:Body>
      <tran:ProcessMessage>
         <tran:payload>
            <tran:content id="Content0">
               <DealAdd>
                  <Dealer>
                     <EnterpriseCode>ZE</EnterpriseCode>
                     <CompanyNumber>ZE7</CompanyNumber>
                     <ServerName>ARKONAP.ARKONA.COM</ServerName>
                  </Dealer>
                  <Deal>
                     <CompanyNumber>ZE7</CompanyNumber>
                     <RecordType>'.$dealinfo['Deal']['RecordType'].'</RecordType>
                     <VehicleType>'.$condition.'</VehicleType>
                     <SaleType>'.$dealinfo['Deal']['SaleType'].'</SaleType>
                     <StockNumber>'.$dealinfo['Deal']['stock_num'].'</StockNumber>
                     <VIN>'.$dealinfo['Deal']['vin'].'</VIN>
                     <BuyerNumber>'.$cus_number[1].'</BuyerNumber>
                     <CoBuyerNumber/>
                     <SearchName>'.$dealinfo['Deal']['last_name'].', '.$dealinfo['Deal']['first_name'].'</SearchName>
                     <DealDate>'.str_replace('-','',date('Y-m-d'), strtotime($dealinfo['Deal']['created'])).'</DealDate>
                     <RetailPrice>'.$dealinfo['Deal']['unit_value'].'</RetailPrice>
                     <DownPayment>'.$down_payment.'</DownPayment>
                     <TradeAllowance/>
                     <TradeACV/>
                     <TradePayoff/>
                     <APR/>
                     <RetailTerm>1</RetailTerm>
                     <InsuranceTerm>1</InsuranceTerm>
                     <DaysToFirstPayment/>
                     <PaymentFrequency/>
                     <DateTempStickerExp/>
                     <TaxGroupKey/>
                     <LendingSourceKey>0</LendingSourceKey>
                     <LeasingSourceKey/>
                     <OLAlias/>
                     <InsuranceSource/>
                     <GAPSource/>
                     <ServiceContractAmount/>
                     <ServiceContractCost/>
                     <CreditLifePremium/>
                     <LevelCLPremium/>
                     <AandHPremium/>
                     <GAPPremium/>
                     <GAPCost/>
                     <CreditLifeCode/>
                     <AandHCode/>
                     <GAPCode/>
                     <Tax1>0.00</Tax1>
                     <Tax2>0.00</Tax2>
                     <Tax3>0.00</Tax3>
                     <Tax4>0.00</Tax4>
                     <Tax5>0.00</Tax5>
                     <BuyRate/>
                     <ReserveHoldbackPercent/>
                     <NumberOfTrades>0</NumberOfTrades>
                     <TemporaryStickerNumber/>
                     <CreditLifeCertNumber/>
                     <AandHCertNumber/>
                     <GAPCertNumber/>
                     <FlooringVendor/>
                     <PDInsuranceCo/>
                     <PDInsuranceCoAlias/>
                     <PDPolicyNumber/>
                     <PDPolicyExpireDate/>
                     <PDAgentName/>
                     <PDAgentAddress/>
                     <PDAgentCity/>
                     <PDAgentState/>
                     <PDAgentZip/>
                     <PDAgentPhoneNumber/>
                     <PDCollCoverage/>
                     <PDCompCoverage/>
                     <PDFireTheftCoverage/>
                     <PDCollectionDeduct/>
                     <PDCompDeduct/>
                     <PDFireTheftDeduct/>
                     <PDVehicleUse/>
                     <PDPremium/>
                     <AMOTotal/>
                     <FeeTotal/>
                     <TotalOfPayments/>
                     <FinanceCharge/>
                     <VehicleCost/>
                     <InternalCost>0.00</InternalCost>
                     <AddsToCostTotal/>
                     <HoldBack/>
                     <PackAmount/>
                     <CommissionableGross/>
                     <Incentive/>
                     <Rebate/>
                     <OdometerAtSale/>
                     <PickupAmount/>
                     <PickupBeginningDate/>
                     <PickupFrequency/>
                     <PickupNumberPay/>
                     <LifeReserve/>
                     <AandHReserve/>
                     <GAPReserve/>
                     <PDIReserve/>
                     <AMOReserve/>
                     <ServiceReserve/>
                     <FinanceReserve/>
                     <TotalFandIReserve/>
                     <DefDownPayment/>
                     <DefDownDueDate/>
                     <LoanOriginationFee/>
                     <LOFOverride/>
                     <EffectiveAPR/>
                     <MSRP/>
                     <LeasePrice/>
                     <AdjCapitalizedCost/>
                     <CapCostReduction/>
                     <LeaseAPR/>
                     <LeaseFactor/>
                     <LeaseTerm/>
                     <ResidualPercent/>
                     <ResidualAmount/>
                     <NetResidual/>
                     <TotalDepreciation/>
                     <MilesYearActual/>
                     <MilesYearAllow/>
                     <ExcessMileRatePrepaid/>
                     <ExcessMileRate2Penalty/>
                     <ExcessMileCharge/>
                     <AcquisitionFee/>
                     <BaseLeasePayment/>
                     <LeasePaymentAndTax/>
                     <LeaseSalesTax/>
                     <MonthlyLeaseCharge/>
                     <CapReductionTax/>
                     <SecurityDeposit/>
                     <DepositReceived/>
                     <CashReceived/>
                     <LeaseFactorBuyRate/>
                     <AmountDueAtLeaseSigning/>
                     <CapLeaseSalesTax/>
                     <SecurityDepositOverride/>
                     <AcquisitionFeeOverride/>
                     <FETOptions/>
                     <CapitalizeSalesTax/>
                     <AdvPaymentLease/>
                     <OverrideTaxRate1/>
                     <OverrideTaxRate2/>
                     <OverrideTaxRate3/>
                     <OverrideTaxRate4/>
                     <OverrideTaxRate6/>
                     <OverrideExcTrade1/>
                     <OverrideExcTrade2/>
                     <OverrideExcTrade3/>
                     <OverrideExcTrade4/>
                     <FinReserveOverride/>
                     <CostOverride/>
                     <HoldbackOverride/>
                     <TaxOverride/>
                     <RebateDownPay/>
                     <ContractSelected/>
                     <ChgInterestOn1Payment>N</ChgInterestOn1Payment>
                     <SaleAccount/>
                     <UnwindFlag/>
                     <DocumentNumber/>
                     <BuyerAge/>
                     <CoBuyerAge/>
                     <LifeCoverage/>
                     <AandHCoverage/>
                     <InsuranceTermDate/>
                     <LeaseTaxGroup/>
                     <CoBuyerLifePremium/>
                     <DateSaved/>
                     <DateTradePayoff/>
                     <CapitalizeCRTax/>
                     <RebateAsDown/>
                     <TotalDown/>
                     <TotalCapReduction/>
                     <GrossCapCost/>
                     <DealerIncentive/>
                     <NewVehicleDeliveryReport/>
                     <ExcessMileageChargeBalloon/>
                     <PenaltyExcessMileageChargeBalloon/>
                     <PrepaidExcessMileageChargeBalloon/>
                     <MilesPerYearBalloon/>
                     <MilesPerYearAllowedBalloon/>
                     <NetResidualBalloon/>
                     <ResidualAmountBalloon/>
                     <ResidualPercentBalloon/>
                     <AfterMarketTax/>
                     <TaxExemptPayments/>
                     <FullPayments/>
                     <FordPlanCode/>
                     <AandHTerm/>
                     <LeasePaymentTax/>
                     <TradeFromLease/>
                     <OriginalNetTrade/>
                     <NonTaxableTradeEquity/>
                     <P9PolicyNumber/>
                     <PartiallyExemptPayment/>
                     <PartiallyExemptTax/>
                     <ServiceContractTax/>
                     <TotalAandHCoverage/>
                     <TaxBaseAmount/>
                     <WorkInProcess/>';

    $end='</Deal>
               </DealAdd>
            </tran:content>
         </tran:payload>
      </tran:ProcessMessage>
   </soap:Body>
</soap:Envelope>';


    $tradeinfo='';
       if($dealinfo['Deal']['make_trade']!='' and $dealinfo['Deal']['model_trade']!='' and $dealinfo['Deal']['year_trade']!='' and $dealinfo['Deal']['vin_trade']!='' and $dealinfo['Deal']['stock_num_trade']!=''){

           $tradeallow='';
           if($dealinfo['Deal']['trade_allowance']!=''){
           $tradeallow='<TradeAllowance>'.$dealinfo['Deal']['trade_allowance'].'</TradeAllowance>';
           }
    $tradeinfo='<TradeIns>
                    <TradeIn>
                    <VIN>'.$dealinfo['Deal']['vin_trade'].'</VIN>
                    <StockNumber>'.$dealinfo['Deal']['stock_num_trade'].'</StockNumber>'.$tradeallow.'
                    <TradeYear>'.$dealinfo['Deal']['year_trade'].'</TradeYear>
                    <TradeMake>'.$dealinfo['Deal']['make_trade'].'</TradeMake>
                    <TradeModel>'.$dealinfo['Deal']['model_trade'].'</TradeModel>
                    <TradeSaleGroup>GM</TradeSaleGroup>
                    </TradeIn>
                    </TradeIns>';
       }


         if($dealinfo['Deal']['prep_desc']!='' AND $dealinfo['Deal']['prep_fee']!=''){
       $prep_desc= explode('_',$dealinfo['Deal']['prep_desc'],3);
       $prep='<DealFee>
            <RecordType>'.$prep_desc[0].'</RecordType>
            <SequenceNumber>'.$prep_desc[1].'</SequenceNumber>
            <Description>'.$prep_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['prep_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }


        if($dealinfo['Deal']['parts_desc']!='' AND $dealinfo['Deal']['parts_fee']!=''){
       $parts_desc= explode('_',$dealinfo['Deal']['parts_desc'],3);
       $parts='<DealFee>
            <RecordType>'.$parts_desc[0].'</RecordType>
            <SequenceNumber>'.$parts_desc[1].'</SequenceNumber>
            <Description>'.$parts_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['parts_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }



        if($dealinfo['Deal']['sales_desc']!='' AND $dealinfo['Deal']['tax_fee']!=''){
       $sales_desc= explode('_',$dealinfo['Deal']['sales_desc'],3);
       $sales='<DealFee>
            <RecordType>'.$sales_desc[0].'</RecordType>
            <SequenceNumber>'.$sales_desc[1].'</SequenceNumber>
            <Description>'.$sales_desc[2].'</Description>
            <AMOFeeAmount>'.$dealinfo['Deal']['tax_fee'].'</AMOFeeAmount>
            <Cost>0.00</Cost>
            <AddToCapCost/>
            <AddToPrice/>
            <AddToCostSequenceNumber>0</AddToCostSequenceNumber>
            <TableFeeOverride/>
            <SalesTaxAmount>0.00</SalesTaxAmount>
        </DealFee>';
       }

       $allfee='';
       if($prep!='' || $parts!='' || $sales!=''){
       $allfee='<Fees>'.$prep.$parts.$sales.'</Fees>';
       }

       if($allfee!=''){
        $tradeinfo=$tradeinfo.$allfee;
       }

       if($tradeinfo!=''){
          $xml_post_string=$vehicleinfo.$tradeinfo.$end;
       }else{
          $xml_post_string=$vehicleinfo.$end;

       }
        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: http://www.starstandards.org/webservices/2005/10/transport/operations/ProcessMessage",
            "Content-length: " . strlen($xml_post_string),
        );

        $url = $soapUrl;
        // PHP cURL  for https connection with auth
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // converting
        $response = curl_exec($ch);
        curl_close($ch);

        // converting
        $response1 = str_replace("<soap:Body>", "", $response);
        $response2 = str_replace("</soap:Body>", "", $response1);

        // convertingc to XML
        $parser = simplexml_load_string($response2);
        $json = json_encode($parser);
        $data_array = json_decode($json, TRUE);
        //debug($data_array);
        echo '<pre>';
        print_r($data_array['ProcessMessageResponse']['payload']['content']['DealAddResponse']);

        exit('------');

      }


      //worksheet
	public function worksheet($id) {

		$this->layout='default_worksheet2';
		$dealer_id = $this->Auth->user('dealer_id');
		$rv_dealer = array(3201,3202);
		$wheels_dealer = array(576,5000);
		$river_valley_power_worksheet = array(61000,62000,1606);
        $echo_worksheet = array(3154);
        $lone_star_yamaha_worksheet = array(2176);
        $worksheet_v2 = array(4060);
        $generic_worksheet = array(896);
        $frv_worksheet = array(8217);
        $dylans_worksheet = array(3952);
        $jerrys_trailer_worksheet = array(1045);
        $motorsports_worksheet = array(87524);

		if(in_array($dealer_id,$wheels_dealer))
		$this->view = 'wheels_worksheet';
		else if(in_array($dealer_id,$river_valley_power_worksheet))
		$this->view = 'river_valley_power_worksheet';
        else if(in_array($dealer_id,$rv_dealer))
		$this->view = 'rv_worksheet';
        else if(in_array($dealer_id,$echo_worksheet))
        $this->view = 'ecko_worksheet';
        else if(in_array($dealer_id,$lone_star_yamaha_worksheet))
        $this->view = 'lone_star_yamaha_worksheet';
        else if(in_array($dealer_id,$worksheet_v2))
        $this->view = 'worksheet_v2';
        else if(in_array($dealer_id,$generic_worksheet))
        $this->view = 'generic_worksheet';
        else if(in_array($dealer_id,$frv_worksheet))
        $this->view = 'frv_worksheet';
        else if(in_array($dealer_id,$dylans_worksheet))
        $this->view = 'dylans_worksheet';
        else if(in_array($dealer_id,$jerrys_trailer_worksheet))
        $this->view = 'jerrys_trailer_worksheet';
        else if(in_array($dealer_id,$motorsports_worksheet))
        $this->view = 'motorsports_worksheet';


		//$this->view = 'worksheet_rv';
		$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
		//debug($contact);

		$zone = $this->Auth->user('zone');
		date_default_timezone_set($zone);

		$deal_statuses = $this->Deal->DealStatus->find('list');
        $this->set(compact('deal_statuses'));

		$this->set('contact',$contact);
		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			$deal_data['Deal'] = $this->request->data;
			$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				//Send Notification
				$this->worksheet_notification($this->Deal->id);

				$this->requestAction('manage_cache/clear_contact_cache/'.$id);
				$this->redirect(array('action' => 'deals_main'));

			}
		}

		$dealer_id = $this->Auth->User('dealer_id');


		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
		$this->set('all_fees',$this->call_fees());




	}


         public function call_fees() {
        //Configure::write('debug', 2);
        //Data, connection, auth
        $soapUrl = "https://otcert.arkona.com/opentrack/webservice.asmx"; // asmx URL of WSDL
        $soapUser = "DealerPCRM";  //  username
        $soapPassword = "DP36025$!1"; // password
         // xml post structur
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
                           <soap:Envelope xmlns:tran="http://www.starstandards.org/webservices/2005/10/transport" xmlns:soap="http://www.w3.org/2003/05/soap-envelope">
   <soap:Header>
      <wsse:Security mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
         <wsse:UsernameToken>
            <wsse:Username>DealerPCRM</wsse:Username>
            <wsse:Password>DP36025$!1</wsse:Password>
            <wsse:Created>2013-11-20T20:11:30E</wsse:Created>
         </wsse:UsernameToken>
      </wsse:Security>
      <tran:PayloadManifest>
         <tran:manifest contentID="1"/>
      </tran:PayloadManifest>
   </soap:Header>
   <soap:Body>
      <tran:ProcessMessage>
         <tran:payload>
<tran:content id="Content0">
        <DealAddsToCostTableRequest>
        <Dealer>
        <EnterpriseCode>ZE</EnterpriseCode>
        <CompanyNumber>ZE7</CompanyNumber>
        <ServerName>ARKONAP.ARKONA.COM</ServerName>
        </Dealer>
        </DealAddsToCostTableRequest>
            </tran:content>
         </tran:payload>
      </tran:ProcessMessage>
   </soap:Body>
</soap:Envelope>';   // data from the form, e.g. some ID number
        ///<CreatedDateTimeStart>2016-10-19T00:00:00Z</CreatedDateTimeStart>
        //<CreatedDateTimeEnd>2016-10-19T23:59:59Z</CreatedDateTimeEnd>
        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: http://www.starstandards.org/webservices/2005/10/transport/operations/ProcessMessage",
            "Content-length: " . strlen($xml_post_string),
        );

        $url = $soapUrl;
        // PHP cURL  for https connection with auth
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // converting
        $response = curl_exec($ch);
        curl_close($ch);

        // converting
        $response1 = str_replace("<soap:Body>", "", $response);
        $response2 = str_replace("</soap:Body>", "", $response1);
        // convertingc to XML
        $parser = simplexml_load_string($response2);
        $json = json_encode($parser);
        $data_array = json_decode($json, TRUE);
//        debug($data_array);
//        exit('test');
        return $data_array['ProcessMessageResponse']['payload']['content']['DealAddsToCostTable']['DealAddsToCostRecord'];
    }


	public function work_sheet2($id) {

		//$this->layout='default_worksheet2';
		//$this->view ='worksheet_hd';
		$dealer_id = $this->Auth->user('dealer_id');


		$wheels_dealer = array(576,5000);

		$zone = $this->Auth->user('zone');
		date_default_timezone_set($zone);
		if(in_array($dealer_id,$wheels_dealer))
		$this->view = 'wheels_work_sheet2';

		if ($this->request->is('post')) {
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			$deal_data['Deal'] = $this->request->data;
			if ($this->Deal->save($deal_data)) {


				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->requestAction('manage_cache/clear_contact_cache/'.$deal['Deal']['contact_id']);


				//Send Notification
				$this->worksheet_notification($this->Deal->id);

				$this->redirect(array('action' => 'deals_main'));
			}
		}else{
			$deal = $this->Deal->find('first', array('conditions'=>array('Deal.id'=>$id)));

			$deal_statuses = $this->Deal->DealStatus->find('list');
       		$this->set(compact('deal_statuses'));
			if(is_array(unserialize($deal['Deal']['additional_info'])))
			$deal['Deal']=array_merge($deal['Deal'],unserialize($deal['Deal']['additional_info']));
			$this->set('deal',$deal);

		}


		$dealer_id = $this->Auth->User('dealer_id');

		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
                $this->set('all_fees',$this->call_fees());

	}


	public function deals_input_edit($id) {
		$this->layout='deals_edit';

		 $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }
		$old_data = $this->Deal->find('first', array('conditions'=>array('Deal.id'=>$id)));
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {

				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$old_data['Deal']['id'];
				$history_data['contact_id'] = 			$old_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$old_data['Deal']['first_name']." ".$old_data['Deal']['middle_name']." ".$old_data['Deal']['last_name'];
				$history_data['amount'] = 		$old_data['Deal']['amount'];
				$history_data['condition'] = 		$old_data['Deal']['condition'];
				$history_data['year'] = 			$old_data['Deal']['year'];
				$history_data['make'] = 		$old_data['Deal']['make'];
				$history_data['model'] = 		$old_data['Deal']['model'];
				$history_data['type'] = 		$old_data['Deal']['type'];
				$history_data['status'] = 		$old_data['DealStatus']['name'];
				$history_data['sperson'] = 		$old_data['Deal']['sperson'];
				$history_data['notes'] = 		$old_data['Deal']['notes'];
				$history_data['modified'] = 	$old_data['Deal']['modified_long'];
				$history_data['created'] = 		$this->request->data['Deal']['modified'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$old_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->requestAction('manage_cache/clear_contact_cache/'.$old_data['Deal']['contact_id']);

                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'deals_main'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $old_data;
        }

		// fixed fee options
		$this->loadModel('DealFixedfee');
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('User.dealer_id'=>$this->Auth->User('dealer_id')), 'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);

		$params = array(
            'conditions' => array('History.deal_id' => $id),
            'fields' => array('History.*'),
			'order' => array('History.id DESC')
        );
        $history = $this->History->find('all', $params);
        $this->set('history', $history);

		//debug($selected_type_condition);
		$options_1_20 = array();
		for($i=1;$i<=20;$i++){
			$options_1_20[$i] = $i;
		}
		$this->set('options_1_20', $options_1_20);




		//Inventory Tools
		$contact_info = $old_data;
		if (!empty($contact_info)) {

			//Inventory Center
			$this->loadModel("Category");
			$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
			$d_type_options = array();
			foreach($d_types as $d_type){
				$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
			}
			$this->set('d_type_options', $d_type_options);
			//debug($d_type_options);

			//Get selected option
			$this->loadModel('Category');

			$d_type = $contact_info['Contact']['category'];
			if($d_type == ''){
				$d_type = 'Powersports';
			}
			$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
			$body_type = array();
			foreach($d_types as $d_t){
				$body_type[$d_t['Category']['body_type']] = $d_t['Category']['body_type'];
			}
			$this->set('body_type', $body_type);


			$body_type = $contact_info['Contact']['type'];
			$d_type = $contact_info['Contact']['category'];
			$body_sub_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type,'Category.body_type'=>$body_type),'orders'=>array('Category.body_sub_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')));
			$body_sub_type_options = array();
			foreach($body_sub_types as $body_sub_type){
				$body_sub_type_options[$body_sub_type['Category']['id']] = $body_sub_type['Category']['body_sub_type'];
			}
			$this->set('body_sub_type_options', $body_sub_type_options);

			$class = $contact_info['Contact']['class'];
			$this->loadModel('Trim');
			$this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
				'foreignKey'=>false,
				'conditions'=>array('Model.make_id = Make.id'),
			))));
			$trims = $this->Trim->find('all',array('order'=>array('Model.year'=>'DESC'),'fields'=>array('DISTINCT Model.year'),'conditions'=>array('Make.short_name <>'=>null,'Model.year <>' => null, 'Trim.category_type_id'=>$class)));
			$year_opt = array();
			foreach($trims as $trim){
				$year_opt[$trim['Model']['year']] = $trim['Model']['year'];
			}
			$this->set('year_opt', $year_opt);


			//Get make Option
			$year = $contact_info['Contact']['year'];
			$class = $contact_info['Contact']['class'];
			$this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
				'foreignKey'=>false,
				'conditions'=>array('Model.make_id = Make.id'),
			))));
			$trims = $this->Trim->find('all',array('order'=>array('Make.short_name'=>'ASC'),'fields'=>array('Make.id','Make.short_name'),'conditions'=>array('Make.id <>'=>null, 'Model.year' => $year, 'Trim.category_type_id'=>$class)));
			//debug($trims);
			$make_opt = array();
			foreach($trims as $trim){
				$make_opt[] = $trim['Make']['short_name'];
			}
			$make_opt = array_unique($make_opt);

			$mk_options = array();
			foreach($make_opt as $val){
				$mk_options[$val] = $val;
			}
			$this->set('mk_options', $mk_options);


			//get model options
			$year =  $contact_info['Contact']['year'];
			$class = $contact_info['Contact']['class'];
			$make = $contact_info['Contact']['make'];

			$this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
				'foreignKey'=>false,
				'conditions'=>array('Model.make_id = Make.id'),
			))));
			$trims = $this->Trim->find('all',array('order'=>array('Model.short_name'=>'ASC'),'fields'=>array('Model.id','Model.short_name','Model.year'),'conditions'=>array('Make.short_name'=>$make, 'Model.year' => $year, 'Trim.category_type_id'=>$class)));
			$model_opt = array();
			foreach($trims as $trim){
				$model_opt[$trim['Model']['id']] = $trim['Model']['short_name'];
			}
			$this->set('model_opt', $model_opt);



			//Inventory Center Trade Values


			$d_type = $contact_info['Contact']['category_trade'];
			$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
			$body_type_trade = array();
			foreach($d_types as $d_t){
				$body_type_trade[$d_t['Category']['body_type']] = $d_t['Category']['body_type'];
			}
			$this->set('body_type_trade', $body_type_trade);

			//get make options
			$category_trade = $contact_info['Contact']['type_trade'];
			$mk_options_trade = array();
			if($category_trade != ''){
				$mk_options_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return','?'=>array('type'=>$d_type,'category'=>$category_trade)));
			}
			$this->set('mk_options_trade', $mk_options_trade);

			//year selection
			$make_trade = $contact_info['Contact']['make_trade'];
			$year_opt_trade = array();
			if($make_trade != '' && $category_trade != ''){
				$year_opt_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return','?'=>array('make'=>$make_trade,'type'=>$d_type,'category'=>$category_trade)));
			}
			$this->set('year_opt_trade', $year_opt_trade);

			//Get Model Selection
			$year_trade = $contact_info['Contact']['year_trade'];
			$model_opt_trade = array();
			if($make_trade != '' && $category_trade != '' && $year_trade != ''){
				$type = $this->request->query['type'];
				$category = $this->request->query['category'];
				$year = $this->request->query['year'];
				$make = $this->request->query['make'];
				$model_opt_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return','?'=>array('year'=>$year_trade,'make'=>$make_trade,'type'=>$d_type,'category'=>$category_trade)));
			}
			$this->set('model_opt_trade', $model_opt_trade);


			//Class Selection
			$model_id_trade  = $contact_info['Contact']['model_id_trade'];
			$body_sub_type_options_trade = array();
			if($model_id_trade != ''){
				$trim = $this->Trim->find('first',array('conditions'=>array('Trim.model_id'=>$model_id_trade),'fields'=>array('Trim.id','Trim.model_id','Trim.category_type_id','Trim.model_prefix','Trim.msrp','Trim.short_name')));
				$category = $this->Category->find('first',array('conditions'=>array('Category.id'=>$trim['Trim']['category_type_id'])));
				$body_sub_type_options_trade[$category['Category']['id']] = $category['Category']['body_sub_type'];
			}else{

				//Load all classes for empty trade form
				$body_type_val_trade = $this->request->data['Contact']['type_trade'];
				if($body_type_val_trade == ''){
					$body_type_val_trade = array_keys($body_type_trade);
				}
				$body_sub_types_trade = $this->Category->find("all", array('conditions'=>array('Category.body_type'=>$body_type_val_trade, 'Category.d_type'=>$d_type),'orders'=>array('Category.body_sub_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')));
				$body_sub_type_options_trade = array();
				foreach($body_sub_types_trade as $body_sub_type_trade){
					$body_sub_type_options_trade[$body_sub_type_trade['Category']['id']] = $body_sub_type_trade['Category']['body_sub_type'];
				}

			}
			$this->set('body_sub_type_options_trade', $body_sub_type_options_trade);

		}

	}

	public function deal_details($id = null){
		$this->layout = 'ajax';
		$deal = $this->Deal->find('first',array('fields' => array('Deal.first_name','Deal.contact_id','Deal.last_name','Deal.id','DealStatus.*','Contact.id','Contact.company','Contact.year','Contact.type','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson','Contact.created','Contact.modified','Contact.owner','Contact.status','Contact.sales_step','Contact.buying_time','Contact.best_time','Contact.lead_status','Contact.gender','Contact.source','Contact.company_work','Contact.dnc_status'),'conditions' => array('Deal.id' => $id)));
		
		$dealer_id=$this->Auth->user('dealer_id');
		$this->set('deal', $deal);

		$params = array(
            'conditions' => array('History.contact_id' =>  $deal['Deal']['contact_id'] ),
            'fields' => array('History.*'),
			'order' => array('History.id DESC'),
        );
        $history = $this->History->find('all', $params);
        $this->set('history', $history);
		/*$cooper_dealers = array(1225,1226);
		if(in_array($dealer_id,$cooper_dealers) )
		{
			$other_form_ids =array(16);
		}else
		{
			$other_form_ids =array(9,10,15);
		}
		$custom_form_dealer_ids=array(1224, 829, 830,5000);
		if(in_array($dealer_id,$custom_form_dealer_ids)){
		$this->loadModel('DealerForm');
		$this->DealerForm->bindModel(array('belongsTo'=>array('CustomForm')));
		$dealer_forms=$this->DealerForm->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'custom_form_id !='=>6,'print'=>0)));
		}else{
			$this->loadModel('CustomForm');
			$dealer_forms=$this->CustomForm->find('all',array('conditions'=>array('id'=>$other_form_ids)));
		}*/
		$this->loadModel('DealerForm');
		$this->DealerForm->bindModel(array('belongsTo'=>array('CustomForm')));
		$dealer_forms=$this->DealerForm->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'custom_form_id !='=>6,'print'=>0)));
		$this->set(compact('dealer_forms'));
		//History tab
        $history_types = array(
        	'Lead'=>'user',
        	'Event'=>'alarm',
        	'Lead Arrived'=>'cloud',
        	'New CRM Move'=>'list',
        	'BDC REP Web Lead'=>'cogwheel',
        	'BDC Survey'=>'list',
        	'BDC Survey Call Back'=>'list',
        	'Deal'=>'list',
        	'DNC Status '=>'list',
        	'Email'=>'envelope',
        	'Lead Score'=>'list',
        	'Lead_duplicate'=>'list',
        	'Location Transfer'=>'list',
        	'MMS'=>'list',
        	'Note Update'=>'list',
        	'Source Changed'=>'list',
        	'Staff Transfer'=>'list',
        	'Merge'=>'list',
        	'Merge - Web'=>'list',
        	'Appt Show'=>'alarm',
        	'Marketing'=>'envelope',
        	'DNC'=>'list',
        	'MGR Check'=>'check',
        );


        $history_ar = array();
       // debug($history);
        foreach ($history as $his) {

        	$duplicate_key = $this->check_duplicate_status($history_ar[ trim($his['History']['h_type']) ],  $his  );
        	if( $duplicate_key === false  ){
        		$history_ar[ trim($his['History']['h_type']) ][] = $his;
        	}
        }
		//debug($history_ar);

		$this->set('history_ar', $history_ar);
		$this->set('history_types', $history_types);
		$this->set('sales_step_options',  $this->get_dealer_steps() );
		$this->LoadModel('ContactStatus');
		$this->set('DncStatusOptions', $this->ContactStatus->DncStatusOptions);
		$appointment = $this->_appointment_date($id, $timezone);
		$this->set('appointment', $appointment);

			//Add on vehicle start
			$this->loadModel('AddonVehicle');
			$this->AddonVehicle->bindModel(array(
				'belongsTo'=>array('Category'=>array(
					'foreignKey'=>false,
					'conditions'=> array("AddonVehicle.class = Category.id")
				)),
			));
			$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$deal['Deal']['contact_id']) ));
			$this->set('addonVehicles',$addonVehicles);

	}

	private function _appointment_date($contact_id, $timezone){
		date_default_timezone_set($timezone);
		$event = $this->Event->find('first', array('recursive'=>-1,'order' => array('Event.modified DESC'),'fields'=>array('Event.id','Event.start'),'conditions'=>array(
		'Event.contact_id'=>$contact_id,
		//'Event.user_id'=>$current_user_id,
		'Event.status <>' => array('Completed','Canceled'))));
		return $event;
	}

	public function search_result() {

        $group_id = $this->Auth->user('group_id');
        $dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->user('zone');
		date_default_timezone_set($zone);
		$custom_form_dealer_ids=array(5000,1224, 829, 830);
        if ($group_id == 2) {
           // $this->redirect(array('controller' => 'dashboards', 'action' => 'main'));
        }

		if(!empty($this->request->query)){
			$this->passedArgs = $this->request->query;
		}

        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);

        /*
        if ($group_id == 1) {
            $conditions = $this->Deal->parseCriteria($this->passedArgs);
        } else {
            $conditions = array($this->Deal->parseCriteria($this->passedArgs),
                'Deal.user_id' => $this->Auth->user('id')
            );
        }
        */

        $conditions = $this->Deal->parseCriteria($this->passedArgs);
        $old_date = date('Y-m-d',strtotime('-45 days'));
		$conditions['DATE(Deal.modified) >='] = $old_date;
		$conditions['Deal.company_id'] = $dealer_id;



        $this->Prg->commonProcess();
        //$this->Deal->recursive = 0;

		/*
		$this->paginate = array(
            'conditions' => $conditions,
            'limit' => 50,
            'order' => array(
                'Deal.id' => 'asc'
            )
        );
		*/

		$deal_count = $this->Deal->find('count', array(
            'conditions' => $conditions,
            'order' => array(
                'Deal.id' => 'asc'
            )
        ));

        $deals = $this->Deal->find('all', array(
            'conditions' => $conditions,
            'order' => array(
                'Deal.id' => 'asc'
            )
        ));


       	$separate_deals=array('in_progress'=>array(),'rejected'=>array(),'accepted'=>array());
        foreach ($deals as $key => $values) {

            $deals[$key]['children'] = $this->User->find('first', array(
                'fields' => array('User.full_name'),
                'conditions' => array('User.id' => $deals[$key]['Contact']['user_id']),
                'contain' => false));
			if($values['Deal']['deal_status_id']==5)
			{
				$separate_deals['accepted'][]=$deals[$key];
			}elseif($values['Deal']['deal_status_id']==6)
			{
				$separate_deals['rejected'][]=$deals[$key];
			}else{
				$separate_deals['in_progress'][]=$deals[$key];
			}
        }
		if(in_array($dealer_id,$custom_form_dealer_ids))
		{
       	 $this->set('deals', $separate_deals);
		}else
		{
			$this->set('deals', $deals);
		}

		$this->set('deal_count', $deal_count);
    }

    public function index() {
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 2) {
            $this->redirect(array('controller' => 'dashboards', 'action' => 'main'));
        }
        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        if ($group_id == 1) {
            $conditions = $this->Deal->parseCriteria($this->passedArgs);
        } else {
            $conditions = array($this->Deal->parseCriteria($this->passedArgs),
                'Deal.user_id' => $this->Auth->user('id')
            );
        }
        $this->Prg->commonProcess();
        //$this->Deal->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 6,
            'order' => array(
                'Deal.id' => 'asc'
            )
        );
        $deals = $this->Paginate();
        foreach ($deals as $key => $values) {

            $deals[$key]['children'] = $this->User->find('first', array(
                'fields' => array('User.full_name'),
                'conditions' => array('User.id' => $deals[$key]['Contact']['user_id']),
                'contain' => false));
        }
        $this->set('deals', $deals);
    }

    public function add() {

            $contacts = $this->Contact->find('list', array(
            'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
        $this->set(compact('contacts'));
        if (empty($contacts)) {
            $add_contact_url = Router::url(array('controller' => 'contacts', 'action' => 'add'), true);
            $add_contact_link = '<a href="' . $add_contact_url . '" >Click here</a>';
            $this->Session->setFlash('Please add contacts first. To add contact ' . $add_contact_link, 'alert', array('class' => 'alert-info'));
        }
        $deal_statuses = $this->Deal->DealStatus->find('list');
        $this->set(compact('deal_statuses'));
        if ($this->request->is('post')) {
            $this->request->data['Deal']['user_id'] = $this->Auth->user('id');
            $this->Deal->create();
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('New deal added', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add', 'alert', array('class' => 'alert-error'));
            }
        }

		// fixed fee options
		$this->loadModel('DealFixedfee');
		$DealFixedfees = $this->DealFixedfee->find('all', array('order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
		//debug($selected_type_condition);

    }
	public function deals_input($contact_id) {
       $this->layout='deals_edit';

		$contacts = $this->Contact->find('list', array('conditions' => array('Contact.id' =>  $contact_id )));
        $this->set(compact('contacts'));

        if (empty($contacts)) {
            $add_contact_url = Router::url(array('controller' => 'contacts', 'action' => 'add'), true);
            $add_contact_link = '<a href="' . $add_contact_url . '" >Click here</a>';
            $this->Session->setFlash('Please add contacts first. To add contact ' . $add_contact_link, 'alert', array('class' => 'alert-info'));
        }

        $deal_statuses = $this->Deal->DealStatus->find('list');
        $this->set(compact('deal_statuses'));

        if ($this->request->is('post')) {
            $this->request->data['Deal']['user_id'] = $this->Auth->user('id');
            $this->Deal->create();
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('New deal added', 'alert');

                $this->requestAction('manage_cache/clear_contact_cache/'.$contact_id  );

                $this->redirect(array('action' => 'deals_main'));
            } else {
                $this->Session->setFlash('Unable to add', 'alert', array('class' => 'alert-error'));
            }
        }

		// fixed fee options
		$this->loadModel('DealFixedfee');
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('User.dealer_id'=>$this->Auth->User('dealer_id')), 'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));

		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
		//debug($selected_type_condition);

		$contact_info = $this->Contact->find('first', array('recursive'=>-1,'conditions' => array('Contact.id' => $contact_id)));
		$this->set('contact_info',$contact_info);
		//debug($contact_info);


		//Inventory Tools
		if (!empty($contact_info)) {


			//Inventory Center
			$this->loadModel("Category");
			$d_types = $this->Category->find("all", array('orders'=>array('Category.d_type'=>'ASC'),'fields'=>'DISTINCT Category.d_type'));
			$d_type_options = array();
			foreach($d_types as $d_type){
				$d_type_options[$d_type['Category']['d_type']] = $d_type['Category']['d_type'];
			}
			$this->set('d_type_options', $d_type_options);
			//debug($d_type_options);

			//Get selected option
			$this->loadModel('Category');

			$d_type = $contact_info['Contact']['category'];
			$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
			$body_type = array();
			foreach($d_types as $d_type){
				$body_type[$d_type['Category']['body_type']] = $d_type['Category']['body_type'];
			}
			$this->set('body_type', $body_type);


			$body_type = $contact_info['Contact']['type'];
			$d_type = $contact_info['Contact']['category'];
			$body_sub_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type,'Category.body_type'=>$body_type),'orders'=>array('Category.body_sub_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')));
			$body_sub_type_options = array();
			foreach($body_sub_types as $body_sub_type){
				$body_sub_type_options[$body_sub_type['Category']['id']] = $body_sub_type['Category']['body_sub_type'];
			}
			$this->set('body_sub_type_options', $body_sub_type_options);

			$class = $contact_info['Contact']['class'];
			$this->loadModel('Trim');
			$this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
				'foreignKey'=>false,
				'conditions'=>array('Model.make_id = Make.id'),
			))));
			$trims = $this->Trim->find('all',array('order'=>array('Model.year'=>'DESC'),'fields'=>array('DISTINCT Model.year'),'conditions'=>array('Make.short_name <>'=>null,'Model.year <>' => null, 'Trim.category_type_id'=>$class)));
			$year_opt = array();
			foreach($trims as $trim){
				$year_opt[$trim['Model']['year']] = $trim['Model']['year'];
			}
			$this->set('year_opt', $year_opt);


			//Get make Option
			$year = $contact_info['Contact']['year'];
			$class = $contact_info['Contact']['class'];
			$this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
				'foreignKey'=>false,
				'conditions'=>array('Model.make_id = Make.id'),
			))));
			$trims = $this->Trim->find('all',array('order'=>array('Make.short_name'=>'ASC'),'fields'=>array('Make.id','Make.short_name'),'conditions'=>array('Make.id <>'=>null, 'Model.year' => $year, 'Trim.category_type_id'=>$class)));
			//debug($trims);
			$make_opt = array();
			foreach($trims as $trim){
				$make_opt[] = $trim['Make']['short_name'];
			}
			$make_opt = array_unique($make_opt);

			$mk_options = array();
			foreach($make_opt as $val){
				$mk_options[$val] = $val;
			}
			$this->set('mk_options', $mk_options);


			//get model options
			$year =  $contact_info['Contact']['year'];
			$class = $contact_info['Contact']['class'];
			$make = $contact_info['Contact']['make'];

			$this->Trim->bindModel(array('belongsTo'=>array('Model','Make'=>array(
				'foreignKey'=>false,
				'conditions'=>array('Model.make_id = Make.id'),
			))));
			$trims = $this->Trim->find('all',array('order'=>array('Model.short_name'=>'ASC'),'fields'=>array('Model.id','Model.short_name','Model.year'),'conditions'=>array('Make.short_name'=>$make, 'Model.year' => $year, 'Trim.category_type_id'=>$class)));
			$model_opt = array();
			foreach($trims as $trim){
				$model_opt[$trim['Model']['id']] = $trim['Model']['short_name'];
			}
			$this->set('model_opt', $model_opt);



			//Inventory Center Trade Values

			//Get selected option

			$d_type = $contact_info['Contact']['category_trade'];
			$d_types = $this->Category->find("all", array('conditions'=>array('Category.d_type'=>$d_type),'orders'=>array('Category.body_type'=>'ASC'),'fields'=>array('DISTINCT Category.body_type')));
			$body_type_trade = array();
			foreach($d_types as $d_t){
				$body_type_trade[$d_t['Category']['body_type']] = $d_t['Category']['body_type'];
			}
			$this->set('body_type_trade', $body_type_trade);

			//get make options
			$category_trade = $contact_info['Contact']['type_trade'];
			$mk_options_trade = array();
			if($category_trade != ''){
				$mk_options_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_make_n','return','?'=>array('type'=>$d_type,'category'=>$category_trade)));
			}
			$this->set('mk_options_trade', $mk_options_trade);

			//year selection
			$make_trade = $contact_info['Contact']['make_trade'];
			$year_opt_trade = array();
			if($make_trade != '' && $category_trade != ''){
				$year_opt_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_year_n','return','?'=>array('make'=>$make_trade,'type'=>$d_type,'category'=>$category_trade)));
			}
			$this->set('year_opt_trade', $year_opt_trade);

			//Get Model Selection
			$year_trade = $contact_info['Contact']['year_trade'];
			$model_opt_trade = array();
			if($make_trade != '' && $category_trade != '' && $year_trade != ''){
				$type = $this->request->query['type'];
				$category = $this->request->query['category'];
				$year = $this->request->query['year'];
				$make = $this->request->query['make'];
				$model_opt_trade = $this->requestAction(array('controller'=>'categories','action'=>'get_model_n','return','?'=>array('year'=>$year_trade,'make'=>$make_trade,'type'=>$d_type,'category'=>$category_trade)));
			}
			$this->set('model_opt_trade', $model_opt_trade);


			//Class Selection
			$model_id_trade  = $contact_info['Contact']['model_id_trade'];
			$body_sub_type_options_trade = array();
			if($model_id_trade != ''){
				$trim = $this->Trim->find('first',array('conditions'=>array('Trim.model_id'=>$model_id_trade),'fields'=>array('Trim.id','Trim.model_id','Trim.category_type_id','Trim.model_prefix','Trim.msrp','Trim.short_name')));
				$category = $this->Category->find('first',array('conditions'=>array('Category.id'=>$trim['Trim']['category_type_id'])));
				$body_sub_type_options_trade[$category['Category']['id']] = $category['Category']['body_sub_type'];
			}else{

				//Load all classes for empty trade form
				$body_type_val_trade = $this->request->data['Contact']['type_trade'];
				if($body_type_val_trade == ''){
					$body_type_val_trade = array_keys($body_type_trade);
				}
				$body_sub_types_trade = $this->Category->find("all", array('conditions'=>array('Category.body_type'=>$body_type_val_trade, 'Category.d_type'=>$d_type),'orders'=>array('Category.body_sub_type'=>'ASC'),'fields'=>array('Category.id','Category.body_sub_type')));
				$body_sub_type_options_trade = array();
				foreach($body_sub_types_trade as $body_sub_type_trade){
					$body_sub_type_options_trade[$body_sub_type_trade['Category']['id']] = $body_sub_type_trade['Category']['body_sub_type'];
				}

			}
			$this->set('body_sub_type_options_trade', $body_sub_type_options_trade);


		}





    }

    public function deals_main() {
        $this->layout='default_new';

        $group_id = $this->Auth->user('group_id');
       /*
	    if ($group_id == 3) {
            $this->redirect(array('controller' => 'dashboards', 'action' => 'main'));
        }
		*/

        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        if ($group_id == 1) {
            $conditions = $this->Deal->parseCriteria($this->passedArgs);
        } else {
            $conditions = array($this->Deal->parseCriteria($this->passedArgs),
                'Deal.user_id' => $this->Auth->user('id')
            );
        }
        $this->Prg->commonProcess();
        //$this->Deal->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 6,
            'order' => array(
                'Deal.id' => 'asc'
            )
        );
        $deals = $this->Paginate();
        foreach ($deals as $key => $values) {

            $deals[$key]['children'] = $this->User->find('first', array(
                'fields' => array('User.full_name'),
                'conditions' => array('User.id' => $deals[$key]['Contact']['user_id']),
                'contain' => false));
        }
        $this->set('deals', $deals);
    }


public function fee() {
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 2) {
            $this->redirect(array('controller' => 'dashboards', 'action' => 'index'));
        }
        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        if ($group_id == 1) {
            $conditions = $this->Deal->parseCriteria($this->passedArgs);
        } else {
            $conditions = array($this->Deal->parseCriteria($this->passedArgs),
                'Deal.user_id' => $this->Auth->user('id')
            );
        }
        $this->Prg->commonProcess();
        //$this->Deal->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 6,
            'order' => array(
                'Deal.id' => 'asc'
            )
        );
        $deals = $this->Paginate();
        foreach ($deals as $key => $values) {

            $deals[$key]['children'] = $this->User->find('first', array(
                'fields' => array('User.full_name'),
                'conditions' => array('User.id' => $deals[$key]['Contact']['user_id']),
                'contain' => false));
        }
        $this->set('deals', $deals);
    }

     public function editfee() {
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 2) {
            $this->redirect(array('controller' => 'dashboards', 'action' => 'index'));
        }
        $searched = false;
        if ($this->passedArgs) {
            $args = $this->passedArgs;
            if (isset($args['search_name'])) {
                $searched = true;
            }
        }
        $this->set('searched', $searched);
        if ($group_id == 1) {
            $conditions = $this->Deal->parseCriteria($this->passedArgs);
        } else {
            $conditions = array($this->Deal->parseCriteria($this->passedArgs),
                'Deal.user_id' => $this->Auth->user('id')
            );
        }
        $this->Prg->commonProcess();
        //$this->Deal->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'limit' => 6,
            'order' => array(
                'Deal.id' => 'asc'
            )
        );
        $deals = $this->Paginate();
        foreach ($deals as $key => $values) {

            $deals[$key]['children'] = $this->User->find('first', array(
                'fields' => array('User.full_name'),
                'conditions' => array('User.id' => $deals[$key]['Contact']['user_id']),
                'contain' => false));
        }
        $this->set('deals', $deals);
    }

    public function creditmetric($id = null) {
        $this->layout='default_credit';
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function metricworksheet($id = null) {
        $this->layout='default_forms';
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function hdworksheet($id = null) {
        $this->layout='default_forms';
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');


                $this->worksheet_notification($this->Deal->id);

                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function hdcredit($id = null) {
        $this->layout='default_forms';
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }


        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function billofsale($id = null) {
        $this->layout='default_forms';
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function payoff($id = null) {
        $this->layout='default_forms';
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function poa($id = null) {
        $this->layout='default_credit';
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function view($id = null) {

        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }
    }
    public function edit($id = null) {
        $this->Deal->id = $id;
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }

        $user_id = $this->Deal->read('Deal.user_id', $id);
//        if ($user_id['Deal']['user_id'] != $this->Auth->user('id')) {
//            $this->Session->setFlash('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can edit it.', 'alert', //array('class' => 'alert-error'));
//            $this->redirect(array('action' => 'index'));
//       }
        if ($this->request->is('post')) {
            if ($this->Deal->save($this->request->data)) {
                $this->Session->setFlash('Deal saved', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to save changes', 'alert', array('class' => 'alert-error'));
            }
        } else {
            $contacts = $this->Deal->Contact->find('list', array(
                'conditions' => array('Contact.user_id' => $this->Auth->user('id'))));
            $this->set(compact('contacts'));
            $deal_statuses = $this->Deal->DealStatus->find('list');
            $this->set(compact('deal_statuses'));
            $this->request->data = $this->Deal->read();
        }

		// fixed fee options
		$this->loadModel('DealFixedfee');
		$DealFixedfees = $this->DealFixedfee->find('all', array('order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
		//debug($selected_type_condition);
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Deal->id = $this->request->data['id']; //--
        if (!$this->Deal->exists()) {
            throw new NotFoundException('Record not found');
        }
        $user_id = $this->Deal->read('Deal.user_id', $id);
        if ($user_id['Deal']['user_id'] == $this->Auth->user('id')) {
            if ($this->Deal->delete($id)) {
                $this->Session->setFlash('Deal deleted', 'alert');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to delete', 'alert', array('class' => 'alert-error'));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('Oops! Looks like you are not the owner of Deal. Only the user corresponding to the deal can delete it.'), 'alert', array('class' => 'alert-error'));
            $this->redirect(array('acion' => 'index'));
        }
    }
	public function excel_worksheet($id=null)
	{
		$this->layout='default_worksheet2';
		$dealer_id = $this->Auth->user('dealer_id');
		$shoals_group =array(182,2501,5000,2138);
		$palmer_group = array(2663,266900,266800,266700,266600,266500,266400);
		$ridenow_group = array(263);
		$pbc_group = array(2678);
        $ecko_multi_worksheet = array(3154);
        $habra_multi_worksheet = array(3682);

		if(in_array($dealer_id ,$ridenow_group))
		$this->view = 'ridenow_worksheet';
		elseif(in_array($dealer_id ,$shoals_group))
		$this->view = 'shoals_multi_worksheet';
		elseif(in_array($dealer_id ,$palmer_group))
		$this->view = 'palmer_worksheet';
		elseif(in_array($dealer_id ,$pbc_group))
		$this->view = 'pbc_boat_worksheet';
        elseif(in_array($dealer_id ,$ecko_multi_worksheet))
        $this->view = 'ecko_multi_worksheet';
        elseif(in_array($dealer_id ,$habra_multi_worksheet))
        $this->view = 'habra_multi_worksheet';

		$zone = $this->Auth->user('zone');
		date_default_timezone_set($zone);



		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			$deal_data['Deal'] = $this->request->data;
			//$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);


				$this->worksheet_notification($this->Deal->id);
				$this->redirect(array('action' => 'deals_main'));
			}
		}
		$unit_fields = array('id','year','make','model','vin','condition');
		 $field_list = array('Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson','Contact.trade_value','Contact.odometer');
		$dealer_id = $this->Auth->User('dealer_id');
		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($id);
		if(!empty($exist_deal)){
			$edit=true;

			$contact=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
			unset($contact_unit_info['Contact']['id']);
			/*$contact['vin'] = $contact_unit_info['Contact']['vin'];
			$contact['year'] = $contact_unit_info['Contact']['year'];
			$contact['make'] = $contact_unit_info['Contact']['make'];
			$contact['model'] = $contact_unit_info['Contact']['model'];
			$contact['condition'] =$contact_unit_info['Contact']['condition'];*/
			if(is_array(unserialize($contact['additional_info'])))
			$contact=array_merge($contact,unserialize($contact['additional_info']));
			$contact = array_merge($contact,$contact_unit_info['Contact']);
		}else
		{
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
		$contact=$contact['Contact'];
		$contact['contact_id']=$contact['id'];
		unset($contact['id']);
		}
		$deal_statuses = $this->Deal->DealStatus->find('list');
        $this->set(compact('deal_statuses','edit'));

		$this->set('info',$contact);
		$this->loadModel('AddonVehicle');

			$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$id) ));
			$this->set('addonVehicles',$addonVehicles);

		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
    //Need to grab current user id
    $user_id = $this->Auth->User('id');

    $this->loadModel('User');
     $sales_person_info=$this->User->find('first',array('fields' => array('first_name','last_name'),'conditions' => array('User.id' => $info['user_id'])));
     $sales_person_name = ucfirst($sales_person_info['User']['first_name']. ' '.$sales_person_info['User']['last_name']);
     $this->set(compact('sales_person_name'));

     //Set Dealer Address Location
     $dealer_address_info = $this->User->find('first',array('fields' => array('dealer','d_address','d_city','d_state','d_zip','d_phone','d_fax','d_email','d_website'), 'conditions' => array('User.id' => $user_id)));
     $this->set('dealer_address_info',$dealer_address_info);
	}
	public function credit_form($contact_id=null)
	{

		$this->layout='default_worksheet2';
		$dealer_id = $this->Auth->user('dealer_id');
		$zone = $this->Auth->user('zone');
		date_default_timezone_set($zone);


		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$deal_data['Deal'] = $this->request->data;

			$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->redirect(array('action' => 'deals_main'));
			}
		}

		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($contact_id);
		 $field_list = array('Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson','Contact.trade_value');
		if(!empty($exist_deal)){
			$edit=true;
			$info=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
			unset($contact_unit_info['Contact']['id']);
			if(is_array(unserialize($info['additional_info'])))
			$info=array_merge($info,unserialize($info['additional_info']));
			$info=array_merge($info,$contact_unit_info['Contact']);
		}else
		{
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		$info=$contact['Contact'];
		$info['contact_id']=$info['id'];
		unset($info['id']);
		}
		$this->set(compact('info','edit'));
		$this->loadModel('User');
		 $sales_person_info=$this->User->find('first',array('fields' => array('first_name','last_name'),'conditions' => array('User.id' => $info['user_id'])));
		 $sales_person_name = ucfirst($sales_person_info['User']['first_name']. ' '.$sales_person_info['User']['last_name']);
		 $this->set(compact('sales_person_name'));
	}


	 public function custom_forms($contact_id=null,$form_id=null)
	 {
		 //Configure::write('debug',2);
		 $this->layout='default_worksheet2';
		 $edit=false;

		 $zone = $this->Auth->user('zone');
		 date_default_timezone_set($zone);
		 $dealer_id = $this->Auth->user('dealer_id');

		 $this->loadModel('Contact');
		 $this->loadModel('CustomForm');
		 $this->loadModel('CustomFormSave');
		 $this->Contact->unbindModel(array('belongsTo' => array('User')));
		 $this->Contact->recursive = 0;
		 $contact_info=$this->Contact->findById($contact_id);
		 $info= $contact_info['Contact'];
		 $this->loadModel('User');
		 $sales_person_info=$this->User->find('first',array('conditions' => array('User.id' => $info['user_id'])));
		 $sales_person_name = ucfirst($sales_person_info['User']['first_name']. ' '.$sales_person_info['User']['last_name']);
		 $this->set(compact('sales_person_name'));
		 $info['contact_id']=$info['id'];
		 unset($info['id']);
		 $info['name']=$info['first_name'].' '.$info['last_name'];
		 $form_data=$this->CustomFormSave->find('first',array('conditions'=>array('contact_id'=>$contact_id,'form_id'=>$form_id)));
		 if(!empty($form_data)){
			 $edit=true;
			 $infoData=$form_data['CustomFormSave'];
			 unset($contact_info['Contact']['id']);
             unset($infoData['form_data']);

			 $cust_data=unserialize($form_data['CustomFormSave']['form_data']);
			 //$vehicle_fields = array('vin','make','year');
            $info = array_merge($cust_data,$infoData,$contact_info['Contact']);

		 }

		// code written by Badal
		$exist_deal=$this->Deal->findByContact_id($contact_id);
		if(!empty($exist_deal)){
			$contact=$exist_deal['Deal'];
			/*$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
			unset($contact_unit_info['Contact']['id']);
			$contact['vin'] = $contact_unit_info['Contact']['vin'];
			$contact['year'] = $contact_unit_info['Contact']['year'];
			$contact['make'] = $contact_unit_info['Contact']['make'];
			$contact['model'] = $contact_unit_info['Contact']['model'];
			$contact['condition'] =$contact_unit_info['Contact']['condition'];*/
			if(is_array(unserialize($contact['additional_info'])))
			$info = array_merge($info,unserialize($contact['additional_info']));
		}
		// end

		$this->loadModel('AddonVehicle');

		$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$contact_id) ));
		$this->set('addonVehicles',$addonVehicles);


		 if($this->request->is('post')){
			 //$this->loadModel('CustomFormSave');
			 $deal_form_ids=array(1,2,4,5,7,8);
			 $this->request->data['CustomFormSave']=$this->request->data;
			 $this->request->data['CustomFormSave']['form_data']=serialize($this->request->data);
			 //$this->CustomFormSave->create();
			 $contact_id=$this->request->data['CustomFormSave']['contact_id'];
			 $form_id=$this->request->data['CustomFormSave']['form_id'];
			 if($this->CustomFormSave->save($this->request->data)){
				 $deal_exist=$this->Deal->findByContactId($contact_id);
				 if(empty($deal_exist) && in_array($form_id,$deal_form_ids))
				 {
					 $contact_info=$this->Contact->findById($contact_id);
		 			 $deal_info['Deal']= $contact_info['Contact'];
					 unset($deal_info['Deal']['id']);
					 unset($deal_info['Deal']['created']);
					 unset($deal_info['Deal']['modified']);
					 $deal_info['Deal']['contact_id']=$contact_info['Contact']['id'];
					 $deal_info['Deal']['deal_status_id']=4;
					 $this->Deal->save($deal_info);

					 $this->requestAction('manage_cache/clear_contact_cache/'.$contact_id  );

					 $this->Session->setFlash('Form Saved', 'alert', array('class' => 'alert-success'));
               		 $this->redirect(array('controller'=>'deals','action' => 'deals_main','view'));
				 }

				 $this->requestAction('manage_cache/clear_contact_cache/'.$contact_id  );

				 $this->Session->setFlash('Form Saved', 'alert', array('class' => 'alert-success'));
                $this->redirect(array('controller'=>'contacts','action' => 'leads_main','view', $this->request->data['CustomFormSave']['contact_id']));
			 }

		 }
		 $form_info=$this->CustomForm->findById($form_id);
		 $view_name=$form_info['CustomForm']['view_name'];
		 if($form_info['CustomForm']['id'] == 3 && $dealer_id == 1224){
			 $this->view='demo_ride_waiver_orange_county';
		 }else{
		 	$this->view=$view_name;
		 }

		 $this->loadModel('AddonVehicle');
		$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$contact_id) ));
		//echo "<pre>";
		//print_r($addonVehicles);
		//die;
		$this->set('addonVehicles',$addonVehicles);
		 $this->set(compact('info','form_info','edit','sales_person_info'));

	 }

	 public function credit_form2($contact_id=null)
	 {
		$this->layout='default_worksheet2';
		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			$deal_data['Deal'] = $this->request->data;

			$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->requestAction('manage_cache/clear_contact_cache/'.$contact_id  );

				$this->redirect(array('action' => 'deals_main'));
			}
		}
		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($contact_id);
		 $field_list = array('Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson');
		if(!empty($exist_deal)){
			$edit=true;
			$info=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
			unset($contact_unit_info['Contact']['id']);
			if(is_array(unserialize($info['additional_info'])))
			$info=array_merge($info,unserialize($info['additional_info']));
			$info=array_merge($info,$contact_unit_info['Contact']);
		}else
		{
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		$info=$contact['Contact'];
		$info['contact_id']=$info['id'];
		unset($info['id']);
		}
		$this->set(compact('info','edit'));

		$dealer_id = $this->Auth->User('dealer_id');


		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);

	 }


	 public function credit_app($contact_id=null)
	 {
		$this->layout='default_worksheet2';

		$dealer_id = $this->Auth->user('dealer_id');

		$mccoy_dealer = array(41000);
		$berglund_dealer_new = array(48000);
		$credit_app_form = array(758);
		$goaz_dealers = array(111236,111235);
		$gainesville_dealers = array(619);
		$timms_dealers = array(980,2844,174,2600,2601);

        //Following Credit App Author: Abha Sood Negi
        $gateway_credit_app = array(2655);
        $lmgcreditapplication = array(3154);
        $bluff_credit_app = array(2227);
        $credit_app_questions = array(1013);
        $brothers_powersports_credit_app = array(807);
        $eaglemark_bank_credit_app = array(360);
        $holiday_hour_credit_app = array(58000);
        $east_harbor_credit_app = array(8753);
        $sherman_credit_app = array(1275);
        $freedom_powersports_credit_app = array(1627,1640);
        $rv_value_credit_app = array(2765);
        $ws_credit_app = array(3027);
        $rv_credit_app = array(896);
        $rv_auto_credit_app = array(8262);
        $canopy_credit_app = array(1037);
        $motorsports_credit_app = array(87524);
        $esb_credit_app = array(3648);
        //End

		if(in_array($dealer_id,$mccoy_dealer))
		{
			$this->view = 'mccoy_credit_app';
		}
		elseif(in_array($dealer_id,$berglund_dealer_new)){
			$this->view = 'new_credit_app';
		}
		elseif(in_array($dealer_id,$credit_app_form)){
			$this->view = 'credit_app_form';
		}elseif(in_array($dealer_id,$goaz_dealers)){
			$this->view = 'goaz_credit_app';
		}elseif(in_array($dealer_id,$gainesville_dealers)){
			$this->view = 'gainesville_credit_form';
		}
		elseif(in_array($dealer_id,$timms_dealers)){
			$this->view = 'timms_credit_form';
		}

        //Following Credit App Author: Abha Sood Negi
        elseif(in_array($dealer_id,$gateway_credit_app)){
            $this->view = 'gateway_credit_app';
        }

        elseif(in_array($dealer_id,$lmgcreditapplication)) {
            $this->view = 'lmgcreditapplication';
        }
        elseif(in_array($dealer_id,$bluff_credit_app)) {
            $this->view = 'bluff_credit_app';
        }

        elseif(in_array($dealer_id,$credit_app_questions)) {
            $this->view = 'credit_app_questions';
        }
        elseif(in_array($dealer_id,$brothers_powersports_credit_app)) {
            $this->view = 'brothers_powersports_credit_app';
        }
        elseif(in_array($dealer_id,$eaglemark_bank_credit_app)) {
            $this->view = 'eaglemark_bank_credit_app';
        }
        elseif(in_array($dealer_id,$holiday_hour_credit_app)) {
            $this->view = 'holiday_hour_credit_app';
        }
        elseif(in_array($dealer_id,$east_harbor_credit_app)) {
            $this->view = 'east_harbor_credit_app';
        }
        elseif(in_array($dealer_id,$sherman_credit_app)) {
            $this->view = 'sherman_credit_app';
        }
        elseif(in_array($dealer_id,$freedom_powersports_credit_app)) {
            $this->view = 'freedom_powersports_credit_app';
        }
        elseif(in_array($dealer_id,$rv_value_credit_app)) {
            $this->view = 'rv_value_credit_app';
        }
        elseif(in_array($dealer_id,$ws_credit_app)) {
            $this->view = 'ws_credit_app';
        }
        elseif(in_array($dealer_id,$rv_credit_app)) {
            $this->view = 'rv_credit_app';
        }
        elseif(in_array($dealer_id,$rv_auto_credit_app)) {
            $this->view = 'rv_auto_credit_app';
        }
        elseif(in_array($dealer_id,$canopy_credit_app)) {
            $this->view = 'canopy_credit_app';
        }
        elseif(in_array($dealer_id,$motorsports_credit_app)) {
            $this->view = 'motorsports_credit_app';
        }
        elseif(in_array($dealer_id,$esb_credit_app)) {
            $this->view = 'esb_credit_app';
        }
        //End

		//$this->view = 'credit_app_form';

		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$deal_data['Deal'] = $this->request->data;

			$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->redirect(array('action' => 'deals_main'));
			}
		}

		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($contact_id);
		 $field_list = array('Contact.dob','Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson');
		if(!empty($exist_deal)){
			$edit=true;
			$info=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
			unset($contact_unit_info['Contact']['id']);
			if(is_array(unserialize($info['additional_info'])))
			$info=array_merge($info,unserialize($info['additional_info']));
			$info=array_merge($info,$contact_unit_info['Contact']);
		}else
		{
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		$info=$contact['Contact'];
		$info['contact_id']=$info['id'];
		unset($info['id']);
		}
		$this->loadModel('AddonVehicle');
		$addonVehicles = $this->AddonVehicle->find('all', array('order' => 'AddonVehicle.id asc','conditions' => array('AddonVehicle.contact_id'=>$contact_id) ));
		$this->set(compact('info','edit','addonVehicles'));
	}


	 public function shoals_credit_form($contact_id=null)
	 {

		$this->layout='default_worksheet2';
		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$deal_data['Deal'] = $this->request->data;

			$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->redirect(array('action' => 'deals_main'));
			}
		}

		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($contact_id);
		 $field_list = array('Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson');
		if(!empty($exist_deal)){
			$edit=true;
			$info=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
			unset($contact_unit_info['Contact']['id']);
			if(is_array(unserialize($info['additional_info'])))
			$info=array_merge($info,unserialize($info['additional_info']));
			$info=array_merge($info,$contact_unit_info['Contact']);
		}else
		{
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		$info=$contact['Contact'];
		$info['contact_id']=$info['id'];
		unset($info['id']);
		}
		$this->loadModel('AddonVehicle');
		$addonVehicles = $this->AddonVehicle->find('all', array('order' => 'AddonVehicle.id asc','conditions' => array('AddonVehicle.contact_id'=>$contact_id) ));
		$this->set(compact('info','edit','addonVehicles'));
	}



	 public function multi_forms($contact_id='',$print_form_ids=''){

		 $this->layout='default_worksheet2';
		 $dealer_id=$this->Auth->user('dealer_id');
		 $this->loadModel('Contact');
		 $this->loadModel('CustomForm');
		 $exist_deal=$this->Deal->findByContact_id($contact_id);
		 $field_list = array('Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson');

		 if(!empty($exist_deal)){
			$edit=true;
			$info=$exist_deal['Deal'];
			$this->Contact->recursive = 0;
			$lead_info=$this->Contact->findById($contact_id,$field_list);
			unset($lead_info['Contact']['id']);

			if(is_array(unserialize($info['additional_info'])))
			$info=array_merge($info,unserialize($info['additional_info']));

			$info = array_merge($info,$lead_info['Contact']);


		   }else
		   {
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
		    $info=$contact['Contact'];
		    $info['contact_id']=$info['id'];
		    unset($info['id']);
		   }
		 $this->set('info',$info);
		 $this->loadModel('User');
		 $sales_person_info=$this->User->find('first',array('fields' => array('first_name','last_name'),'conditions' => array('User.id' => $info['user_id'])));
		 $sales_person_name = ucfirst($sales_person_info['User']['first_name']. ' '.$sales_person_info['User']['last_name']);
		 $this->set(compact('sales_person_name'));

		 if($print_form_ids!=''){
			 $print_form_ids=substr($print_form_ids,0,-1);
			 $print_form_ids=explode(',',$print_form_ids);
			 $this->loadModel('CustomForm');
			 $dealer_forms=$this->CustomForm->find('all',array('conditions'=>array('CustomForm.id'=>$print_form_ids)));

		 }else{
		 	/*$this->loadModel('DealerForm');
			$this->DealerForm->bindModel(array('belongsTo'=>array('CustomForm')));
			$dealer_forms=$this->DealerForm->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'custom_form_id !='=>6,'print'=>1)));*/
			 $this->loadModel('CustomForm');
		$custom_form_dealer_ids=array(1224, 829, 830,5000,182);
		if(in_array($dealer_id,$custom_form_dealer_ids)){
		$this->loadModel('DealerForm');
		$this->DealerForm->bindModel(array('belongsTo'=>array('CustomForm')));
		$dealer_forms=$this->DealerForm->find('all',array('conditions'=>array('dealer_id'=>$dealer_id,'custom_form_id !='=>6,'print'=>0)));
		}else{
			$this->loadModel('CustomForm');
			$dealer_forms=$this->CustomForm->find('all',array('conditions'=>array('id'=>array(9,10,15))));
		}
		}
		$this->loadModel('CustomFormSave');

		$saved_form_data = $this->CustomFormSave->find('list',array('fields' => 'form_id,form_data','conditions'=>array('CustomFormSave.contact_id' => $contact_id)));
		$this->set(compact('saved_form_data'));
		 $this->loadModel('DealerName');
		 $dealer_info=$this->DealerName->findByDealerId($dealer_id);
		 if($deal_info['DealerName']['move_lead'])
		 {
		 $deal_exist=$this->Deal->findByContactId($contact_id);
		 if(empty($deal_exist))
			{
			 $contact_info=$this->Contact->findById($contact_id);
		 	 $deal_info['Deal']= $contact_info['Contact'];
			 unset($deal_info['Deal']['id']);
			 unset($deal_info['Deal']['created']);
			 unset($deal_info['Deal']['modified']);
			 $deal_info['Deal']['contact_id']=$contact_info['Contact']['id'];
			 $deal_info['Deal']['deal_status_id']=4;
			 $this->Deal->save($deal_info);

			 $this->requestAction('manage_cache/clear_contact_cache/'.$contact_id  );


			}
		 }
		$this->set(compact('dealer_forms'));
		$this->loadModel('AddonVehicle');

			$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$contact_id) ));
			$this->set('addonVehicles',$addonVehicles);


	 }

	 public function check_duplicate_status($histories, $new_history){
    	$duplicate = false;
    	if(!empty($histories)){
	    	foreach($histories as $key => $his){
	    		if(
	    			($his['History']['sperson'] == $new_history['History']['sperson']  &&
	    			$his['History']['sales_step'] == $new_history['History']['sales_step']  &&
	    			$his['History']['status'] == $new_history['History']['status']  &&
	    			$his['History']['cond'] == $new_history['History']['cond']  &&
	    			$his['History']['comment'] == $new_history['History']['comment']) ||

	    			($his['History']['created'] == $new_history['History']['created'])
	    		){
	    			return $key;
	    		}
	    	}
    	}
    	return $duplicate;
    }

	public function get_dealer_steps(){

		$this->loadModel('ContactStatus');
		$sales_step_options_popup	= $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
		return  $sales_step_options_popup;
	}

	public function cooper_worksheet($id=null)
	{
		$this->layout='default_worksheet2';
		$this->view = 'worksheet_hd';
		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			$deal_data['Deal'] = $this->request->data;
			//$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->worksheet_notification($this->Deal->id);

				$this->redirect(array('action' => 'deals_main'));
			}
		}
		$unit_fields = array('id','year','make','model','vin','condition');
		 $field_list = array('Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson','Contact.trade_value');
		$dealer_id = $this->Auth->User('dealer_id');
		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($id);
		if(!empty($exist_deal)){
			$edit=true;

			$contact=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
			unset($contact_unit_info['Contact']['id']);
			/*$contact['vin'] = $contact_unit_info['Contact']['vin'];
			$contact['year'] = $contact_unit_info['Contact']['year'];
			$contact['make'] = $contact_unit_info['Contact']['make'];
			$contact['model'] = $contact_unit_info['Contact']['model'];
			$contact['condition'] =$contact_unit_info['Contact']['condition'];*/
			if(is_array(unserialize($contact['additional_info'])))
			$contact=array_merge($contact,unserialize($contact['additional_info']));
			$contact = array_merge($contact,$contact_unit_info['Contact']);
		}else
		{
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
		$contact=$contact['Contact'];
		$contact['contact_id']=$contact['id'];
		unset($contact['id']);
		}
		$deal_statuses = $this->Deal->DealStatus->find('list');
        $this->set(compact('deal_statuses','edit'));

		$this->set('info',$contact);

		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
	}


	public function worksheet_rv($id=null)
	{
		$this->layout='default_worksheet2';
		$dealer_id = $this->Auth->user('dealer_id');
		$worksheet_view = array(1178 => 'day_bros_worksheet',
								5000 => 'day_bros_worksheet'
		);
		if(isset($worksheet_view[$dealer_id]))
		{
			$this->view = $worksheet_view[$dealer_id];
		}

		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
				$this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			$deal_data['Deal'] = $this->request->data;
			//$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);

				$this->worksheet_notification($this->Deal->id);

				$this->redirect(array('action' => 'deals_main'));
			}
		}
		$unit_fields = array('id','year','make','model','vin','condition');
		$dealer_id = $this->Auth->User('dealer_id');
		 $field_list = array('Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson','Contact.trade_value');
		$dealer_id = $this->Auth->User('dealer_id');
		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($id);
		if(!empty($exist_deal)){
			$edit=true;

			$contact=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
			unset($contact_unit_info['Contact']['id']);
			/*$contact['vin'] = $contact_unit_info['Contact']['vin'];
			$contact['year'] = $contact_unit_info['Contact']['year'];
			$contact['make'] = $contact_unit_info['Contact']['make'];
			$contact['model'] = $contact_unit_info['Contact']['model'];
			$contact['condition'] =$contact_unit_info['Contact']['condition'];*/
			if($dealer_id == 1178)
			{
				unset($contact_unit_info['Contact']['unit_value']);
			}
			if(is_array(unserialize($contact['additional_info'])))
			$contact=array_merge($contact,unserialize($contact['additional_info']));
			$contact = array_merge($contact,$contact_unit_info['Contact']);
		}else
		{
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
		$contact=$contact['Contact'];
		$contact['contact_id']=$contact['id'];
		unset($contact['id']);
		}
		$deal_statuses = $this->Deal->DealStatus->find('list');
        $this->set(compact('deal_statuses','edit'));

		$this->set('info',$contact);

		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));
		//debug($DealFixedfees);
		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);
                $this->set('all_fees',$this->call_fees());
	}

	// updated
	public function custom_worksheet($id = null)
	{
		$this->layout='default_worksheet2';
		$this->view = 'worksheet';
		$dealer_id = $this->Auth->user('dealer_id');
		$this->set('dealer_id',$dealer_id);
		$shoals_group =array(182,2138);
		$palmer_group = array(2663,266900,266800,266500,266400);
		$ridenow_group = array(263);
		$pbc_group = array(2678);
		$mission_city = array(1848);
		$petes_rv_group = array(2051,2335,2337);

		$davidson_worksheet = array(71);
		$berglund_group = array(48000);

		$lander_harley_davidson = array(1320);
		//5000, 2501, 1370 , 762
		$deal_check_list =  array(266600);
		$folsom_lake_rv_form1 = array(114);

		$elk_grove_powersports_worksheet = array(45000);
		$square_form = array(84);

		$river_valley_power_worksheet = array(62000,1606);
        $river_valley_power_worksheet1 = array(61000);
		$croix_harley_davidson_checklist = array(112);
		$haylett_auto_rv = array(70000,112);
		$goaz_dealers = array(111236);
		$goaz_scott_dealers = array(111235);
		$luxury_auto_dealers = array(3777,1370);
        $timms_hd_dealers = array(980,2844);
        $diamond_custom_worksheet = array(8675309);
        $gateway_sales_contract = array(2655);
        $harley_davison_shop_at_beach = array(174);
        $black_bear_harley_davidson = array(2617, 2600,2601);
        $gibs_custom_worksheet = array(739);
        $harley_davidson_4_square = array(762);
        $harley_davidson_6_square = array(760);
        $pre_deal_worksheet = array(3226);
        $honda_russellville_buyers_order = array(3644);
        $kegel_hd_worksheet = array(3251);
        $trailer_east_cost = array(2777);
        $piqua_harley_davidson = array(712);
        $paradise_custom_worksheet = array(3118);
        $sales_sheet = array(2765);
		if(in_array($dealer_id ,$ridenow_group))
		$this->view = 'ridenow_worksheet';
		elseif(in_array($dealer_id ,$haylett_auto_rv))
		$this->view = 'haylett_auto_rv_worksheet';
		elseif(in_array($dealer_id ,$croix_harley_davidson_checklist))
		$this->view = 'croix_harley_davidson_checklist';
		elseif(in_array($dealer_id ,$shoals_group))
		$this->view = 'shoals_multi_worksheet';
		elseif(in_array($dealer_id ,$palmer_group))
		$this->view = 'palmer_worksheet';
		elseif(in_array($dealer_id ,$pbc_group))
		$this->view = 'pbc_boat_worksheet';
		elseif(in_array($dealer_id ,$mission_city))
		$this->view = 'mission_worksheet';
		elseif($dealer_id == '1135')
		$this->view = 'gibbons_worksheet';
		elseif($dealer_id == '1389')
		$this->view = 'faribault_hd_worksheet';
		elseif(in_array($dealer_id ,$petes_rv_group))
		$this->view = 'petes_rv_worksheet';
		elseif(in_array($dealer_id ,$berglund_group))
		$this->view = 'customnew_worksheet';
		elseif(in_array($dealer_id ,$davidson_worksheet))
		$this->view = 'davidson_worksheet';
		elseif(in_array($dealer_id ,$lander_harley_davidson))
		$this->view = 'lander_harley_davidson';
		elseif(in_array($dealer_id ,$folsom_lake_rv_form1))
		$this->view = 'folsom_lake_rv_form1';
		else if(in_array($dealer_id,$river_valley_power_worksheet))
		$this->view = 'river_valley_power_worksheet';
        else if(in_array($dealer_id,$river_valley_power_worksheet1))
        $this->view = 'river_valley_power_worksheet1';
		else if(in_array($dealer_id,$square_form))
		$this->view = 'square_form';
		else if(in_array($dealer_id,$goaz_dealers))
		$this->view = 'goaz_worksheet';
		else if(in_array($dealer_id,$goaz_scott_dealers))
		$this->view = 'goaz_scottsdale_worksheet';
		else if(in_array($dealer_id,$luxury_auto_dealers))
		$this->view = 'luxury_worksheet';
		else if(in_array($dealer_id,$timms_hd_dealers))
		$this->view = 'timms_custom_worksheet';
		/*
		else if(in_array($dealer_id,$del_amo_miles_worksheet))
		$this->view = 'del_amo_miles_worksheet';
		elseif(in_array($dealer_id ,$whole_goods_worksheet))
		$this->view = 'whole_goods_worksheet';
		elseif(in_array($dealer_id ,$trade_evaul_worksheet))
		$this->view = 'trade_evaul_worksheet';
		elseif(in_array($dealer_id ,$one_page_evalution_worksheet))
		$this->view = 'one_page_evalution_worksheet';
		elseif(in_array($dealer_id ,$river_valley_power_worksheet))
		$this->view = 'river_valley_power_worksheet';
		*/
		elseif(in_array($dealer_id ,$elk_grove_powersports_worksheet))
		$this->view = 'elk_grove_powersports_worksheet';
		//elseif(in_array($dealer_id ,$authorization_worksheet))
		//$this->view = 'authorization_worksheet';
		//$this->view = 'river_valley_power_worksheet';

        //Following Custom worksheets view Author: Abha Sood Negi
        else if(in_array($dealer_id,$diamond_custom_worksheet))
        $this->view = 'diamond_custom_worksheet';
        else if(in_array($dealer_id,$gateway_sales_contract))
        $this->view = 'gateway_sales_contract';
        elseif(in_array($dealer_id ,$harley_davison_shop_at_beach))
        $this->view = 'harley_davison_shop_at_beach';
        elseif(in_array($dealer_id ,$black_bear_harley_davidson))
        $this->view = 'black_bear_harley_davidson';
        elseif(in_array($dealer_id ,$gibs_custom_worksheet))
        $this->view = 'gibs_custom_worksheet';
        elseif(in_array($dealer_id ,$harley_davidson_4_square))
        $this->view = 'harley_davidson_4_square';
        elseif(in_array($dealer_id ,$harley_davidson_6_square))
        $this->view = 'harley_davidson_6_square';
        elseif(in_array($dealer_id ,$pre_deal_worksheet))
        $this->view = 'pre_deal_worksheet';
        elseif(in_array($dealer_id ,$honda_russellville_buyers_order))
        $this->view = 'honda_russellville_buyers_order';
        elseif(in_array($dealer_id ,$kegel_hd_worksheet))
        $this->view = 'kegel_hd_worksheet';
        elseif(in_array($dealer_id ,$trailer_east_cost))
        $this->view = 'trailer_east_cost';
        elseif(in_array($dealer_id ,$piqua_harley_davidson))
        $this->view = 'piqua_harley_davidson';
        elseif(in_array($dealer_id ,$paradise_custom_worksheet))
        $this->view = 'paradise_custom_worksheet';
        elseif(in_array($dealer_id ,$sales_sheet))
        $this->view = 'sales_sheet';
        //End

		$DealFixedfee_titlefees = $this->DealFixedfee->find('first', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id,'DealFixedfee.condition'=>'Title Fee')));
		$DealFixedfee_docfees = $this->DealFixedfee->find('first', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id,'DealFixedfee.condition'=>'Doc Fee')));

		$this->set('title_fee',$DealFixedfee_titlefees['DealFixedfee']['title_fee']);
		$this->set('doc_fee',$DealFixedfee_docfees['DealFixedfee']['doc_fee']);

		if ($this->request->is('post')) {
			$is_exist=$this->Deal->findByContact_id($this->request->data['contact_id'],array('fields'=>'Deal.id'));
			if(!empty($is_exist))
			{
                $this->request->data['id']=$is_exist['Deal']['id'];
			}
			$table_fields=array_keys($this->Deal->getColumnTypes());

			foreach($this->request->data as $field=>$value)
			{
				if(!in_array($field,$table_fields))
				{
					$this->request->data['additional_info'][$field]=$value;
					unset($this->request->data[$field]);
				}

			}
			if(!isset($this->request->data['deal_status_id'])||empty($this->request->data['deal_status_id']))
			{
				$this->request->data['deal_status_id']=4;

			}
			$this->request->data['additional_info']=serialize($this->request->data['additional_info']);
			$deal_data['Deal'] = $this->request->data;
			//$this->Deal->create();
			if ($this->Deal->save($deal_data)) {



				//Save history
				$history_data = array();
				$history_data['deal_id'] = 			$deal_data['Deal']['id'];
				$history_data['contact_id'] = 			$deal_data['Deal']['contact_id'];
				$history_data['customer_name'] = 	$deal_data['Deal']['first_name']." ".$deal_data['Deal']['middle_name']." ".$deal_data['Deal']['last_name'];
				$history_data['amount'] = 		$deal_data['Deal']['amount'];
				$history_data['condition'] = 		$deal_data['Deal']['condition'];
				$history_data['year'] = 			$deal_data['Deal']['year'];
				$history_data['make'] = 		$deal_data['Deal']['make'];
				$history_data['model'] = 		$deal_data['Deal']['model'];
				$history_data['type'] = 		$deal_data['Deal']['type'];
				$history_data['status'] = 		$deal_statuses[ $deal_data['Deal']['deal_status_id'] ]; //$deal_data['DealStatus']['name'];
				$history_data['sperson'] = 		$deal_data['Deal']['sperson'];
				$history_data['notes'] = 		$deal_data['Deal']['notes'];
				$history_data['modified'] = 	$deal_data['Deal']['modified_long'];
				$history_data['h_type'] = 		"Deal";
				$history_data['sales_step'] = 		"Deal";
				$history_data['comment'] = 		$deal_data['Deal']['notes'];

				$history = array(
					'History' => $history_data
				);
				$this->History->save($history);


				$this->worksheet_notification($this->Deal->id);
				$this->redirect(array('action' => 'deals_main'));
			}
		}

		$unit_fields = array('id','year','make','model','vin','condition');
		$field_list = array('Contact.address','Contact.dob','Contact.zip','Contact.city','Contact.state','Contact.spouse_first_name','Contact.spouse_last_name','Contact.year','Contact.make','Contact.model','Contact.vin','Contact.unit_color','Contact.stock_num','Contact.engine','Contact.condition','Contact.unit_value','Contact.usedunit_color','Contact.year_trade','Contact.make_trade','Contact.model_trade','Contact.vin_trade','Contact.engine_trade','Contact.first_name','Contact.last_name','Contact.phone','Contact.mobile','Contact.company_id','Contact.work_number','Contact.email','Contact.sperson','Contact.trade_value', 'contact_status_id');
		$dealer_id = $this->Auth->User('dealer_id');
		$edit=false;
		$exist_deal=$this->Deal->findByContact_id($id);
		if(!empty($exist_deal)){
			$edit=true;

			$contact=$exist_deal['Deal'];
			$contact_unit_info = $this->Contact->find('first', array('fields'=> $field_list,'recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
			unset($contact_unit_info['Contact']['id']);
			/*$contact['vin'] = $contact_unit_info['Contact']['vin'];
			$contact['year'] = $contact_unit_info['Contact']['year'];
			$contact['make'] = $contact_unit_info['Contact']['make'];
			$contact['model'] = $contact_unit_info['Contact']['model'];
			$contact['condition'] =$contact_unit_info['Contact']['condition'];*/
			if(is_array(unserialize($contact['additional_info'])))
			$contact=array_merge($contact,unserialize($contact['additional_info']));

            foreach ($field_list as $key => $value) {
                $explode_value = explode(".",$value);
                $real_value = $explode_value[1];
                if(empty($contact_unit_info['Contact'][$real_value])) {
                    unset($contact_unit_info['Contact'][$real_value]);
                }
            }

			$contact = array_merge($contact,$contact_unit_info['Contact']);
		} else {
			$contact = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$id)));
    		$contact=$contact['Contact'];
    		$contact['contact_id']=$contact['id'];
    		unset($contact['id']);
		}
		$deal_statuses = $this->Deal->DealStatus->find('list');
        $this->set(compact('deal_statuses','edit'));

        $this->loadModel('ContactStatuses');
        $contact_status_name = $this->ContactStatuses->findById($contact['contact_status_id']);
        $contact['contact_status_name'] = $contact_status_name['ContactStatuses']['name'];

		$this->set('info',$contact);
		$this->loadModel('AddonVehicle');

		$addonVehicles = $this->AddonVehicle->find('all', array('conditions' => array('AddonVehicle.contact_id'=>$id) ));
		$this->set('addonVehicles',$addonVehicles);

		$this->loadModel('AddonTradeVehicle');

		$AddonTradeVehicle = $this->AddonTradeVehicle->find('first', array('conditions' => array('AddonTradeVehicle.contact_id'=>$id) ));
		$this->set('addontrade_vehicle',$AddonTradeVehicle);
			//echo "<pre>";
		//print_r($AddonTradeVehicle);
		//die;
		//options type conditoin
		$DealFixedfees = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.type ASC ",'fields'=>array('DealFixedfee.id','DealFixedfee.condition','DealFixedfee.type')));

		$selected_type_condition = array();
		foreach($DealFixedfees as $DealFixedfee){
			$selected_type_condition[$DealFixedfee['DealFixedfee']['id']] = $DealFixedfee['DealFixedfee']['condition']." ".$DealFixedfee['DealFixedfee']['type'];
		}
		$this->set('selected_type_condition',$selected_type_condition);

		$DealFixedfeeslist = $this->DealFixedfee->find('all', array('conditions'=>array('DealFixedfee.dealer_id'=>$dealer_id),'order'=>"DealFixedfee.id ASC "));

		//print_r($DealFixedfeeslist); die;
		$this->set('DealFixedfeeslist',$DealFixedfeeslist);

    //Need to grab current user id
    $user_id = $this->Auth->User('id');

    $this->loadModel('User');
     $sales_person_info=$this->User->find('first',array('fields' => array('first_name','last_name'),'conditions' => array('User.id' => $info['user_id'])));
     $sales_person_name = ucfirst($sales_person_info['User']['first_name']. ' '.$sales_person_info['User']['last_name']);
     $this->set(compact('sales_person_name'));

     //Set Dealer Address Location
     $dealer_address_info = $this->User->find('first',array('fields' => array('dealer','d_address','d_city','d_state','d_zip','d_phone','d_fax','d_email','d_website'), 'conditions' => array('User.id' => $user_id)));
     $this->set('dealer_address_info',$dealer_address_info);

	}
}