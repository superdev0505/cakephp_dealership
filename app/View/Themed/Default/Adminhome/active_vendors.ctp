<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<!-- Search result-->
			<div id="trim_search_result">
<br>
<div id="report_data_container">
    <h4>Active Vendors list:</h4>
</div>
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
    <thead class="success">
        <tr>
            <th>Dealer ID#</th>
            <th>Dealer Name</th>
            <th>Vendor's Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($allweblead as $value) {
      $ind_dids=  array_keys($singlearray, $value['DealerName']['dealer_id']);
          if (!empty($ind_dids)) {
//              echo '<pre>';
//              print_r($activeVendors[$value['DealerName']['dealer_id']]);


        ?>
        <tr>
            <td><?php

            echo $value['DealerName']['dealer_id'];
            ?></td>
            <td><?php

            echo $value['DealerName']['name'];
            ?></td>
            <td><?php

                foreach ($ind_dids as $data) {
                    if ($activeVendors[$data]['Contact']['ref_num'] == 'DSpike') {
                        echo 'Dealer Spike web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'ebizautos') {
                        echo 'Ebizautos Web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Costco') {
                        echo 'Costco Auto Program web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'TraderMedia') {
                        echo 'Trader Media web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'boatsCycles') {
                        echo 'Boats and Cycles Web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'chopperExchange') {
                          if (strpos($activeVendors[$data]['Contact']['source'], 'CycleCrunch') === false) {
                        echo 'ChopperExchange web leads <br/>';
                                } else {
                        echo 'CycleCrunch web leads <br/>';
                                }
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'ContactAtOnce') {
                        echo 'Contact At Once-Web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'EnToSell') {
                        echo 'Engage to Sell web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'RVUSA.COM') {
                        echo 'RVUSA Web leads <br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Gdcauto') {
                        echo 'GDC Auto Web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'yacht_world') {
                        echo 'yachtworld web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Navyfederal') {
                        echo 'Navy Federal Auto Buying Program <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'RVT.com') {
                        echo 'RVT.com web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'marinconnection') {
                        echo 'Marine Connection web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'RedziaRV') {
                        echo 'Redzia RV Web Leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'powersports') {
                        echo 'Powersports Marketing Web Leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'BoTrader') {
                        echo 'Trader Media web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'digitalpowersports') {
                        echo 'Digitalpowersports web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Moto_lease') {
                        echo 'Motolease.net web leads  <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Endeavor') {
                        echo 'Endeavor web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Kijiji') {
                        echo 'Kijijileads.com web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Boats') {
                        echo 'Boats.com web leads <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'nglobalgroup') {
                        echo 'Nautic Global Group web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'footsteps') {
                       echo 'Footsteps web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Edgewater') {
                       echo 'Edgewater Boats Web Lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'iboats') {
                       echo 'Iboats web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Hattiesburg') {
                       echo 'Hattiesburg Cycles web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'dealercentric') {
                       echo 'DealerCentric web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Tracker') {
                       echo 'Tracker Marine Group web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Bruns') {
                       echo 'Brunswickboatgroup.com web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Kingfisher') {
                       echo 'kingfisherboats.com web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Pbhmarine') {
                       echo 'pbhmarinegroup.com web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'InteractRV') {
                       echo 'Interactrv.com web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'godfreymarine') {
                       echo 'Godfrey Marine web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'avala_marketing') {
                       echo 'Grady White web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'next_truck') {
                       echo 'Next Truck Online web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'see_dealercost') {
                       echo 'See Dealer Cost web lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'duck_worth') {
                       echo 'duckworthboats.com web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'Autotrader') {
                       echo 'AutoTrader.ca web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'ecarlist') {
                       echo 'ecarlist.com web leads<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'autojini') {
                       echo 'autojini.com web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'CarGurus') {
                       echo 'cargurus.com web lead <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'calltrcking_api') {
                       echo 'Call Tracking Metrics - Website <br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'call_rail') {
                       echo 'Call Rail Website API<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'get_emin') {
                       echo 'Get Em In Web Lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'comm_truck') {
                       echo 'CommercialTruckTrader.com Web Lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'cars_sale') {
                       echo 'Carsforsale.com  Web Lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'craigslist') {
                       echo 'Craigslist  Web Lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'reachlocallivechat') {
                       echo 'Reachlocallivechat.com  Web Lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'cisco') {
                       echo 'Cisco.com  Web Lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'mailchimp') {
                       echo 'Mail Chimp - New Signup Web Lead<br/>';
                    }elseif ($activeVendors[$data]['Contact']['ref_num'] == 'kbb') {
                       echo 'Kbb.com  Web Lead<br/>';
                    } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'iseecars') {
                echo 'Iseecars.com Web Lead<br/>';
            } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'autosoftwareleads') {
                echo 'Autosoftwareleads Web Lead<br/>';
            } elseif ($activeVendors[$data]['Contact']['ref_num'] == 'psndealer') {
                echo 'Psndealer.com Web Lead<br/>';
            }
                    /*else{
                        echo $activeVendors[$data]['Contact']['ref_num'] . '<br/>';
                    }*/
                }


            ?></td>
        </tr>
    <?php
    }
    }
    ?>

    </tbody>
</table>

<!-- // Table END -->
<br>
</div>
			<!-- //Search result End-->
		</div>
	</div>
