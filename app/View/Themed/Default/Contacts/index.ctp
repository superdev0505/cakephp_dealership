<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
?>

<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>

<?php
if ($step_procces === "lemco_steps") {
    $options = array('Meet' => 'Meet-Step 1', 'Greet' => 'Greet-Step 2', 'Probe' => 'Probe-Step 3', 'Sit On' => 'Sit On-Step 4', 'Sit Down' => 'Sit Down-Step 5', 'Write Up' => 'Write Up-Step 6', 'Close' => 'Close-Step 7', 'F/I' => 'F/I-Step 8', 'Sold' => 'Sold-Step 9');
} else {
    $options = array('Connect' => 'Connect', 'Understand' => 'Understand', 'Satisfy' => 'Satisfy', 'Trial Close' => 'Trial Close', 'Obtain Commitment' => 'Obtain Commitment', 'Maintain Realationship' => 'Maintain Realationship');
}
?>

<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-30 day', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<div>
<div>
<h4>Add Contact
    <a class="btn btn-success btn-mini" href="<?php
    echo $this->Html->url(array(
        'controller' => 'contacts',
        'action' => 'add'
    ));
    ?>"><i class="icon-plus"></i></a>
    <script>
        jQuery(function ($) {
            $("#more").click(function () {
                $(".filter-box").toggle('fold');
            });
            $(".date").datepicker();
        });
    </script>
    <!-- // Export Import REMOVED FOR NOW -->
    <!--
<a class="btn btn-info btn-mini btn-left-margin" href="<?php
echo $this->Html->url(array_merge(array(
    'controller' => 'contacts',
    'action' => 'index'
), $this->params['named'], array(
    ''
))) . '/contacts-' . date('m-d-Y-His-A') . '.csv';
?>"><i class="icon-file-text"></i> 
<?php
echo __('Download Excel/CSV');
?></a>
<a class="btn btn-info btn-mini btn-left-margin" href="<?php
echo $this->Html->url(array(
    'controller' => 'contacts',
    'action' => 'import'
));
?>"><i class="icon-file-text"></i> <?php
echo __('CSV Import');
?></a> 
-->

    <?php
    echo $this->Form->create('Contact', array(
        'url' => array_merge(array(
            'action' => 'index'
        ), $this->params['pass']),
        'class' => 'navbar-search pull-right'
    ));
    ?>
    <div class="input-append">
        <?php

        echo $this->Form->input('search_all2', array(
            'div' => false,
            'class' => 'input-medium',
            'label' => '',
            'placeholder' => 'Other Search'), array('div' => false, 'id' => 'ContactSearchAll2'));

        echo $this->Form->select('search_all', array(
            'Open' => 'Open',
            'Closed' => 'Closed',
            $datetimeshort => 'Today',
            $yesterday => 'Yesterday',
            $month => 'This Month',
            $lastmonth => 'Last Month',
            'Web Lead' => 'Web Lead',
            'Phone Lead' => 'Phone Lead',
            'Showroom' => 'Showroom',
            $options
        ), array('div' => false, 'selected'=>$selected_type,  'class' => 'span2', 'empty' => 'Quick Search', 'id' => 'ContactSearchAll'));
        //keep the state of Quick Search
        echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
        ?>

        <button type="submit" class="btn btn-success btn"><i class="icon-search"></i></button>
        <a class="btn btn-primary btn" id="more"><i class="icon-caret-down"></i> More</a>
    </div>
    <?php echo $this->Form->end();
    ?>
</h4>

<?php
if ($searched):
    $search_args = $this->passedArgs;
    ?>
    <div class="filter-result-box alert alert-info">
    <?php
    if (!empty($search_args['contact_id'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['contact_id'];
        ?></span>
    <?php
    endif;
    ?>

    <?php
    if (!empty($search_args['lead_status'])):
        ?>
        <strong>Lead Status: </strong><span><?php
        echo $search_args['lead_status'];
        ?></span>
    <?php
    endif;
    ?>

    <?php
    if (!empty($search_args['sales_step'])):
        ?>
        <strong>Lead Step: </strong><span><?php
        echo $search_args['sales_step'];
        ?></span>
    <?php
    endif;
    ?>


    <?php
    if (!empty($search_args['first_name'])):
        ?>
        <strong>FName: </strong><span><?php
        echo $search_args['first_name'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['last_name'])):
        ?>
        <strong>LName: </strong><span><?php
        echo $search_args['last_name'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['phone'])):
        ?>
        <strong>Phone: </strong><span><?php
        echo $search_args['phone'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['mobile'])):
        ?>
        <strong>Mobile: </strong><span><?php
        echo $search_args['mobile'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['email'])):
        ?>
        <strong>Email: </strong><span><?php
        echo $search_args['email'];
        ?></span>
    <?php
    endif;
    ?>
    </br>
    <?php
    if (!empty($search_args['condition'])):
        ?>
        <strong>Unit Condition: </strong><span><?php
        echo $search_args['condition'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['year'])):
        ?>
        <strong>Unit Year: </strong><span><?php
        echo $search_args['year'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['make'])):
        ?>
        <strong>Unit Make: </strong><span><?php
        echo $search_args['make'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['model'])):
        ?>
        <strong>Unit Model </strong><span><?php
        echo $search_args['model'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['type'])):
        ?>
        <strong>Unit Type: </strong><span><?php
        echo $search_args['type'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['condition_trade'])):
        ?>
        <strong>Trade Condition: </strong><span><?php
        echo $search_args['condition_trade'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['year_trade'])):
        ?>
        <strong>Trade Year: </strong><span><?php
        echo $search_args['year_trade'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['make_trade'])):
        ?>
        <strong>Trade Make: </strong><span><?php
        echo $search_args['make_trade'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['model_trade'])):
        ?>
        <strong>Trade Model </strong><span><?php
        echo $search_args['model_trade'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['type_trade'])):
        ?>
        <strong>Trade Type: </strong><span><?php
        echo $search_args['type_trade'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['status'])):
        ?>
        <strong>Status: </strong><span><?php
        echo $search_args['status'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['gender'])):
        ?>
        <strong>Gender: </strong><span><?php
        echo $search_args['gender'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['best_time'])):
        ?>
        <strong>Best Time: </strong><span><?php
        echo $search_args['best_time'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['buying_time'])):
        ?>
        <strong>Buying Time: </strong><span><?php
        echo $search_args['buying_time'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['source'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['source'];
        ?></span>
    <?php
    endif;
    ?>

    <?php
    if (!empty($search_args['stock_num'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['stock_num'];
        ?></span>
    <?php
    endif;
    ?>

    <?php
    if (!empty($search_args['stock_num_trade'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['stock_num_trade'];
        ?></span>
    <?php
    endif;
    ?>


    <?php
    if (!empty($search_args['contact_status_id'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['contact_status_id'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['created'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['created'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['modified'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['modified'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['unit_color'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['unit_color'];
        ?></span>
    <?php
    endif;
    ?>
    <?php
    if (!empty($search_args['usedunit_color'])):
        ?>
        <strong>Source: </strong><span><?php
        echo $search_args['usedunit_color'];
        ?></span>
    <?php
    endif;
    ?>
    </div>
<?php
endif;
?>

<div align="center" class="filter-box" style="display:none">
<?php
echo $this->Form->create('Contact', array(
    'url' => array_merge(array(
        'action' => 'index'
    ), $this->params['pass']),
    'class' => 'form-inline'
));
?>
<fieldset>
</br>

&nbsp;Open/Close:&nbsp; <?php
echo $this->Form->input('search_lead_status', array('type' => 'select', 'options' => array('Open' => 'Open', 'Closed' => 'Closed'),
    'empty' => 'Select',
    'class' => 'input-small'
));
?>

<!--&nbsp;Open/Close:&nbsp; --><?php
//echo $this->Form->select('lead_status', array('Open' => 'Open',
//    'Closed' => 'Closed',), array(
//    'selected' => 'Open',
//    'class' => 'input-small'
//));
//?>

&nbsp;Lead Type:&nbsp; <?php
echo $this->Form->input('search_contact_status_id', array(
    'type' => 'select',
    'options' => array(
        '5' => 'Web Lead',
        '6' => 'Phone Lead',
        '7' => 'Showroom',
        '8' => 'Parts',
        '9' => 'Service',
        '10' => 'Call Center',
        '11' => 'Rental'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>

&nbsp;Step:&nbsp; <?php
echo $this->Form->select('search_sales_step', $options, array(
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>

<?php
$options = array(
    'Open Deals' => array(
        'Web Lead Arrived' => 'Web Lead Arrived',
        'MGR Move Web Lead' => 'MGR Move Web Lead',
        'Call Web Lead' => 'Call Web Lead',
        'Meeting Web Lead' => 'Meeting Web Lead',
        'Web Lead Sold' => 'Web Lead Sold',
        'Web Lead Follow Up' => 'Web Lead Follow Up',
        'Call In' => 'Call In',
        'Call Out' => 'Call Out',
        'Reminder Call' => 'Reminder Call',
        'Thank you Call' => 'Thank you Call',
        'Special Events Call' => 'Special Events Call',
        'F/I Reminder Call' => 'F/I Reminder Call',
        'Meeting Phone Lead' => 'Meeting Phone Lead',
        'Phone Lead Sold' => 'Phone Lead Sold',
        'Phone Lead Follow Up' => 'Phone Lead Follow Up',
        'Showroom Visit' => 'Showroom Visit',
        'Showroom Return' => 'Showroom Return',
        'Showroom Meeting' => 'Showroom Meeting',
        'Showroom Sold' => 'Showroom Sold',
        'Showroom Follow Up' => 'Showroom Follow Up',
        'Events Meeting' => 'Events Meeting',
        'Events Sold' => 'Events Sold',
        'Events Follow Up' => 'Events Follow Up',

    ),
    'Closed Deals' => array(
        'Dead Lead' => 'Dead Lead',
        'Not in Stock' => 'Not in Stock',
        'Price To High' => 'Price To High',
        'Dealer not trade' => 'Dealer not trade',
        'Bad Credit' => 'Bad Credit',
        'Needs Cosign' => 'Needs Cosign',
        'Down Payment' => 'Down Payment',
        'Bought Elsewhere' => 'Bought Elsewhere',
        'Credit Turndown' => 'Credit Turndown'
    ),
    'Call Center' => array(
        'Refferal Call 1m' => 'Refferal Call 1m',
        'Refferal Call 3m' => 'Refferal Call 3m',
        'Refferal Call 6m' => 'Refferal Call 6m',
        'Refferal Call 12m' => 'Refferal Call 12m',
        'Refferal Call 18m' => 'Refferal Call 18m',
        'Trade Call 24m' => 'Trade Call 24m',
        'Trade Call 30m' => 'Trade Call 30m',
        'Trade Call 36m' => 'Trade Call 36m'
    ),
    'Rental' => array(
        'Rental Showroom' => 'Rental Shoowroom',
        'Rental Call In' => 'Rental Call In',
        'Rental Call Out' => 'Rental Call Out',
        'Rental Meeting' => 'Rental Meeting',
        'Rental Trade' => 'Rental Trade',
        'Rental Follow Up' => 'Rental Follow Up'
    )
);
?>
&nbsp;Status:</font>&nbsp; <?php
echo $this->Form->select('search_status', $options, array(
    'empty' => 'Select',
    'class' => 'input-medium'
));
?>
&nbsp;Gender:&nbsp; <?php
echo $this->Form->input('search_gender', array(
    'type' => 'select',
    'options' => array(
        'Male' => 'Male',
        'Female' => 'Female'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
</br></br>
&nbsp; Best Time:&nbsp; <?php
echo $this->Form->input('search_best_time', array(
    'type' => 'select',
    'options' => array(
        'Anytime' => 'Anytime',
        'Morning' => 'Morning',
        'Mid Day' => 'Mid Day',
        'Afternoon' => 'Afternoon',
        'Evening' => 'Evening'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp;Buying Time:</font>&nbsp;<?php
echo $this->Form->input('search_buying_time', array(
    'type' => 'select',
    'options' => array(
        'now' => 'now',
        '5days' => '5days',
        '10days' => '10days',
        '15days' => '15days',
        '20days' => '20days',
        '30days' => '30days',
        '40days' => '40days',
        '50days' => '50days',
        '60days' => '60days',
        '70days' => '70days',
        '80days' => '80days',
        '90days' => '90days',
        '120days' => '120days',
        '180days' => '180days',
        '6Months' => '6Months',
        '9Months' => '9Months',
        '1year' => '1year',
        '2year' => '2year'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp;Source:</font>&nbsp; <?php
echo $this->Form->input('search_source', array(
    'type' => 'select',
    'options' => array(
        'Walk in' => 'Walk in',
        'Sign' => 'Sign',
        'Website' => 'Website',
        'Mobile Lead' => 'Mobile Lead',
        'Refferal' => 'Refferal',
        'Did Not Ask' => 'Did Not Ask',
        'Buliding' => 'Buliding',
        'Previous Customer' => 'Previous Customer',
        'Event' => 'Event',
        'Bike Night' => 'Bike Night',
        'Craigslist' => 'Craigslist',
        'Ebay' => 'Ebay',
        'Moto lease Flyer' => 'Moto lease Flyer',
        'Parts Customer' => 'Parts Customer',
        'Service Customer' => 'Service Customer',
        'Emailer' => 'Emailer'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>
&nbsp;Stock#:</font>&nbsp; <?php
echo $this->Form->input('stock_num', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp;Stock#/T:</font>&nbsp; <?php
echo $this->Form->input('stock_num_trade', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
<br/></br>
&nbsp;Ref#:</font>&nbsp; <?php
echo $this->Form->input('search_id', array(
    'type' => 'text',
    'class' => 'input-mini'
));
?>
&nbsp;First:&nbsp;<?php
echo $this->Form->input('search_first_name', array(
    'div' => false,
    'class' => 'input-small',
    'label' => '',
    'placeholder' => 'FName'
));
?>
&nbsp;Last:&nbsp;<?php
echo $this->Form->input('search_last_name', array(
    'div' => false,
    'class' => 'input-small',
    'label' => '',
    'placeholder' => 'LName'
));
?>&nbsp;&nbsp;&nbsp;
&nbsp;Phone:&nbsp;<?php
echo $this->Form->input('search_phone', array(
    'div' => false,
    'class' => 'input-small',
    'label' => '',
    'placeholder' => 'Phone'
));
?>&nbsp;&nbsp;&nbsp;
&nbsp;Mobile:&nbsp;<?php
echo $this->Form->input('search_mobile', array(
    'div' => false,
    'class' => 'input-small',
    'label' => '',
    'placeholder' => 'Mobile'
));
?>&nbsp;&nbsp;&nbsp;
&nbsp;Email:&nbsp;<?php
echo $this->Form->input('search_email', array(
    'div' => false,
    'class' => 'input-medium',
    'label' => '',
    'placeholder' => 'Email'
));
?>&nbsp;&nbsp;&nbsp;
</br></br>
&nbsp;Unit Condtion</font>:&nbsp; <?php
echo $this->Form->input('search_condition', array(
    'type' => 'select',
    'options' => array(
        'New' => 'New',
        'Used' => 'Used',
        'Rental' => 'Rental',
        'Demo' => 'Demo'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'span1'
));
?>
&nbsp;Year</font>:&nbsp; <?php
echo $this->Form->input('search_year', array(
    'type' => 'select',
    'options' => array(
        '2014' => '2014',
        '2013' => '2013',
        '2012' => '2012',
        '2011' => '2011',
        '2010' => '2010',
        '2009' => '2009',
        '2008' => '2008',
        '2007' => '2007',
        '2006' => '2006',
        '2005' => '2005',
        '2004' => '2004',
        '2003' => '2003',
        '2002' => '2002',
        '2001' => '2001',
        '2000' => '2000'
    ),
    'empty' => 'selected',
    'selected' => '',
    'class' => 'span1'
));
?>
&nbsp;Make</font>:&nbsp; <?php
echo $this->Form->input('search_make', array(
    'type' => 'select',
    'options' => array(
        'American Ironhorse' => 'American Ironhorse',
        'Anderson MA' => 'Anderson MA',
        'Aprilia' => 'Aprilia',
        'Arctic Cat' => 'Arctic Cat',
        'Argo' => 'Argo',
        'ATK' => 'ATK',
        'ASPT' => 'ASPT',
        'Benelli' => 'Benelli',
        'Big Bear Choppers' => 'Big Bear Choppers',
        'Big Dog' => 'Big Dog',
        'Bimota' => 'Bimota',
        'BMW' => 'BMW',
        'Bombardier' => 'Bombardier',
        'Boss Hoss' => 'Boss Hoss',
        'Buell' => 'Buell',
        'Bultaco' => 'Bultaco',
        'Bush Hog' => 'Bush Hog',
        'Bushtec' => 'Bushtec',
        'Can-Am' => 'Can-Am',
        'Cannondale' => 'Cannondale',
        'Continental' => 'Continental',
        'Cobra' => 'Cobra',
        'Dinli' => 'Dinli',
        'Ducati' => 'Ducati',
        'Down to Ear' => 'Down to Ear',
        'E-TON' => 'E-TON',
        'Excelsior-Henderson' => 'Excelsior-Henderson',
        'Gas Gas' => 'Gas Gas',
        'Genuine Sccoter Co.' => 'Genuine Sccoter Co.',
        'Harley-Davidson' => 'Harley-Davidson',
        'Hannigan' => 'Hannigan',
        'Honda' => 'Honda',
        'Husaberg' => 'Husaberg',
        'Husqvarna' => 'Husqvarna',
        'Hyosung' => 'Hyosung',
        'Indian' => 'Indian',
        'John Deere' => 'John Deere',
        'Kasea' => 'Kasea',
        'Karavan' => 'Karavan',
        'Kawasaki' => 'Kawasaki',
        'KTM' => 'KTM',
        'Kubota' => 'Kubota',
        'KYMCO' => 'KYMCO',
        'LEM' => 'LEM',
        'Lehman Trikes' => 'Lehman Trikes',
        'Maico' => 'Maico',
        'Magic Tilt' => 'Magic Tilt',
        'Moto Guzzi' => 'Moto Guzzi',
        'Motor-Trike' => 'Motor-Trike',
        'Moto-Ski' => 'Moto-Ski',
        'Motovation' => 'Motovation',
        'MV Agusta' => 'MV Agusta',
        'Neosho' => 'Neosho',
        'Nuko' => 'Nuko',
        'Piaggio' => 'Piaggio',
        'Polaris' => 'Polaris',
        'Performance' => 'Perfromance',
        'Rupp' => 'Rupp',
        'Roadsmith' => 'Roadsmith',
        'Royal Enfield' => 'Royal Enfield',
        'Schwinn' => 'Schwinn',
        'SDG' => 'SDG',
        'Sea-Doo' => 'Sea-Doo',
        'Shuttle Craf' => 'Shutle Craf',
        'Shorelandr' => 'Shorelandr',
        'Ski-Doo' => 'Ski-Doo',
        'Snow Hawk' => 'Snow Hawk',
        'Suzuki' => 'Suzuki',
        'SYM' => 'SYM',
        'Swift' => 'Swift',
        'Squire' => 'Squire',
        'TM' => 'TM',
        'Thunder Mountain' => 'Thunder Mountain',
        'Tomberlin' => 'Tomberlin',
        'Triumph' => 'Triumph',
        'Qlink' => 'Qlink',
        'United Motors' => 'United Motors',
        'Ural' => 'Ural',
        'Vespa' => 'Vespa',
        'Victory' => 'Victory',
        'VOR' => 'VOR',
        'Yamaha' => 'Yamaha',
        'Wells fargo' => 'Wells Fargo',
        'Watsonian' => 'Watsonian',
        'Zero' => 'Zero'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>
&nbsp;Model:</font>&nbsp; <?php
echo $this->Form->input('search_model', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp;Unit Type</font>:&nbsp; <?php
echo $this->Form->input('search_type', array(
    'type' => 'select',
    'options' => array(
        'ATV' => 'ATV',
        'Boat' => 'Boat',
        'Car' => 'Car',
        'Cruiser/Vtwin' => 'Cruiser/Vtwin',
        'Dirt Bike' => 'Dirt Bike',
        'Go Kart' => 'Go Kart',
        'PWC' => 'PWC',
        'RV' => 'RV',
        'Scooter' => 'Scooter',
        'Side x Side' => 'Side x Side',
        'Side Car' => 'Side Car',
        'Trailer' => 'Trailer',
        'Trike' => 'Trike',
        'Snowmobile' => 'Snowmobile',
        'Street Bikes' => 'Street Bikes',
        'Utility Vehicle' => 'Utility Vehicle',
        'UTV' => 'UTV'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>
</br></br>
&nbsp; Trade Condition:&nbsp; <?php
echo $this->Form->input('search_condition_trade', array(
    'type' => 'select',
    'options' => array(
        'Used' => 'Used',
        'Rental' => 'Rental',
        'Demo' => 'Demo'
    ),
    'empty' => 'Select',
    'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp; Trade Year:&nbsp; <?php
echo $this->Form->input('search_year_trade', array(
    'type' => 'select',
    'options' => array(
        '2014' => '2014',
        '2013' => '2013',
        '2012' => '2012',
        '2011' => '2011',
        '2010' => '2010',
        '2009' => '2009',
        '2008' => '2008',
        '2007' => '2007',
        '2006' => '2006',
        '2005' => '2005',
        '2004' => '2004',
        '2003' => '2003',
        '2002' => '2002',
        '2001' => '2001',
        '2000' => '2000'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-small'
));
?>
&nbsp; Trade Make:&nbsp; <?php
echo $this->Form->input('search_make_trade', array(
    'type' => 'select',
    'options' => array(
        'American Ironhorse' => 'American Ironhorse',
        'American Ironhorse' => 'American Ironhorse',
        'Anderson MA' => 'Anderson MA',
        'Aprilia' => 'Aprilia',
        'Arctic Cat' => 'Arctic Cat',
        'Argo' => 'Argo',
        'ATK' => 'ATK',
        'ASPT' => 'ASPT',
        'Benelli' => 'Benelli',
        'Big Bear Choppers' => 'Big Bear Choppers',
        'Big Dog' => 'Big Dog',
        'Bimota' => 'Bimota',
        'BMW' => 'BMW',
        'Bombardier' => 'Bombardier',
        'Boss Hoss' => 'Boss Hoss',
        'Buell' => 'Buell',
        'Bultaco' => 'Bultaco',
        'Bush Hog' => 'Bush Hog',
        'Bushtec' => 'Bushtec',
        'Can-Am' => 'Can-Am',
        'Cannondale' => 'Cannondale',
        'Continental' => 'Continental',
        'Cobra' => 'Cobra',
        'Dinli' => 'Dinli',
        'Ducati' => 'Ducati',
        'Down to Ear' => 'Down to Ear',
        'E-TON' => 'E-TON',
        'Excelsior-Henderson' => 'Excelsior-Henderson',
        'Gas Gas' => 'Gas Gas',
        'Genuine Sccoter Co.' => 'Genuine Sccoter Co.',
        'Harley-Davidson' => 'Harley-Davidson',
        'Hannigan' => 'Hannigan',
        'Honda' => 'Honda',
        'Husaberg' => 'Husaberg',
        'Husqvarna' => 'Husqvarna',
        'Hyosung' => 'Hyosung',
        'Indian' => 'Indian',
        'John Deere' => 'John Deere',
        'Kasea' => 'Kasea',
        'Karavan' => 'Karavan',
        'Kawasaki' => 'Kawasaki',
        'KTM' => 'KTM',
        'Kubota' => 'Kubota',
        'KYMCO' => 'KYMCO',
        'LEM' => 'LEM',
        'Lehman Trikes' => 'Lehman Trikes',
        'Maico' => 'Maico',
        'Magic Tilt' => 'Magic Tilt',
        'Moto Guzzi' => 'Moto Guzzi',
        'Motor-Trike' => 'Motor-Trike',
        'Moto-Ski' => 'Moto-Ski',
        'Motovation' => 'Motovation',
        'MV Agusta' => 'MV Agusta',
        'Neosho' => 'Neosho',
        'Nuko' => 'Nuko',
        'Piaggio' => 'Piaggio',
        'Polaris' => 'Polaris',
        'Performance' => 'Perfromance',
        'Rupp' => 'Rupp',
        'Roadsmith' => 'Roadsmith',
        'Royal Enfield' => 'Royal Enfield',
        'Schwinn' => 'Schwinn',
        'SDG' => 'SDG',
        'Sea-Doo' => 'Sea-Doo',
        'Shuttle Craf' => 'Shutle Craf',
        'Shorelandr' => 'Shorelandr',
        'Ski-Doo' => 'Ski-Doo',
        'Snow Hawk' => 'Snow Hawk',
        'Suzuki' => 'Suzuki',
        'SYM' => 'SYM',
        'Swift' => 'Swift',
        'Squire' => 'Squire',
        'TM' => 'TM',
        'Thunder Mountain' => 'Thunder Mountain',
        'Tomberlin' => 'Tomberlin',
        'Triumph' => 'Triumph',
        'Qlink' => 'Qlink',
        'United Motors' => 'United Motors',
        'Ural' => 'Ural',
        'Vespa' => 'Vespa',
        'Victory' => 'Victory',
        'VOR' => 'VOR',
        'Yamaha' => 'Yamaha',
        'Wells fargo' => 'Wells Fargo',
        'Watsonian' => 'Watsonian',
        'Zero' => 'Zero'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>
&nbsp; Trade Model:&nbsp; <?php
echo $this->Form->input('search_model_trade', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp; Trade Type:&nbsp; <?php
echo $this->Form->input('search_trade_type', array(
    'type' => 'select',
    'options' => array(
        'ATV' => 'ATV',
        'Boat' => 'Boat',
        'Car' => 'Car',
        'Cruiser/Vtwin' => 'Cruiser/Vtwin',
        'Dirt Bike' => 'Dirt Bike',
        'Go Kart' => 'Go Kart',
        'PWC' => 'PWC',
        'RV' => 'RV',
        'Scooter' => 'Scooter',
        'Side x Side' => 'Side x Side',
        'Side Car' => 'Side Car',
        'Trailer' => 'Trailer',
        'Trike' => 'Trike',
        'Snowmobile' => 'Snowmobile',
        'Street Bikes' => 'Street Bikes',
        'Utility Vehicle' => 'Utility Vehicle',
        'UTV' => 'UTV'
    ),
    'empty' => 'Select',
    'selected' => '',
    'class' => 'input-medium'
));
?>
</br>
</br>
&nbsp; Unit Color:&nbsp; <?php
echo $this->Form->input('search_unit_color', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp; Trade Color:&nbsp; <?php
echo $this->Form->input('search_usedunit_color', array(
    'type' => 'text',
    'class' => 'input-small'
));
?>
<script>
    $(function () {
        $("#search_created").datepicker({
            changeMonth: true,
            numberOfMonths: 3,
            dateFormat: 'yy-mm-dd',
            onClose: function (selectedDate) {
                $("#search_modified").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#search_modified").datepicker({
            changeMonth: true,
            numberOfMonths: 3,
            dateFormat: 'yy-mm-dd',
            onClose: function (selectedDate) {
                $("#search_created").datepicker("option", "maxDate", selectedDate);
            }
        });
    });
</script>
&nbsp; Search Start Date:&nbsp; <?php
echo $this->Form->input('search_created', array(
    'id' => 'search_created',
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp; Search End Date:&nbsp; <?php
echo $this->Form->input('search_modified', array(
    'id' => 'search_modified',
    'type' => 'text',
    'class' => 'input-small'
));
?>
&nbsp;&nbsp;&nbsp;<?php
echo $this->Form->submit('Filter', array(
    'div' => false,
    'class' => 'btn btn-info'
));
?>
</fieldset>
<?php
echo $this->Form->end();
?>
</div>
</div>
</div>
<table class="table table-bordered table-hover table-striped table-striped-info">
<thead>
	<tr>
		<th class="info">Ref#</th> 
		<th class="info">Name</th> 
		<th class="info">Last Touched</th> 
		<th class="info">Lead Type</th> 
		<th class="info">Step</th> 
		<th class="info">Status</th> 
		<th class="info"><i class="icon-mobile-phone"></i> Cell#</th> 
		<th class="info">Email</th> 
		<th class="info">N/U</th> 
		<th class="info">Year</th> 
		<th class="info">Make</th> 
		<th class="info">Model</th> 
		<th class="info">Unit Type</th> 
		<th class="info">Operation</th> 
	</tr>
</thead>
<tbody>
<?php
if (empty($contacts)):
    ?>
    <tr>
        <td class="striped-warning" colspan="17">No Record Found.</td>
    </tr>
<?php
endif;
?>
<?php
foreach ($contacts as $contact):
?>
<tr>
    <?php
    $lead_status = $contact['Contact']['lead_status'];
    $cid = $contact['Contact']['id'];

    //echo $lead_status;
    //echo $cid;

    if ($lead_status === "Closed") {
        echo "<td class='striped-info'>Closed</td>";
    } else {
        echo "<td class='striped-info'>$cid</td>";
    }
    ?>
    <td>&nbsp;<?php
        echo "<strong>" . $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'] . "</strong>";
        ?></a></td>
    <td><?php

        echo $this->Time->format('l F jS, Y g:i A', $contact['Contact']['modified']);

        ?></td>
    <td>
        <?php
        if ($contact['ContactStatus']['name'] == 'Web Lead') {
            echo '<span class="label label-important">' . $contact['ContactStatus']['name'] . '</span>';
        } else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
            echo '<span class="label label-warning">' . $contact['ContactStatus']['name'] . '</span>';
        } else if ($contact['ContactStatus']['name'] == 'Showroom') {
            echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
        } else if ($contact['ContactStatus']['name'] == 'Parts') {
            echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
        } else if ($contact['ContactStatus']['name'] == 'Service') {
            echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
        } else if ($contact['ContactStatus']['name'] == 'Call Center') {
            echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
        } else if ($contact['ContactStatus']['name'] == 'Rental') {
            echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
        }
        ?>
    </td>
    <td><?php
        echo $contact['Contact']['sales_step'];
        ?></td>
    <td><?php
        echo $contact['Contact']['status'];
        ?></td>

    <!--
<td><?php
    echo $contact['Contact']['city'];
?></td>
<td><?php
    echo $contact['Contact']['state'];
?></td>
<td><?php
    echo $contact['Contact']['zip'];
?></td>
-->

    <?php
    $phone = $contact['Contact']['mobile'];
    //echo $phone;
    ?>
    <?php


    $phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
    $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number) //Re Format it
    ?>

    <td><?php
        echo $cleaned;
        ?></td>

    <?php
    $a = $contact['Contact']['email'];
    //echo $a;

    ?>
    <td><?php
        if ($a == "") {
            echo "No";
        } else {
            echo "<a href='mailto:$a?Subject=Hello%20again%20from%20$uname%20with%20$dealer'><font color='black'><u>YES</u></font></a>";
        }
        ?></td>

    <td><?php
        echo $contact['Contact']['condition'];
        ?></td>
    <td><?php
        echo $contact['Contact']['year'];
        ?></td>
    <td><?php
        echo $contact['Contact']['make'];
        ?></td>
    <td><?php
        echo $contact['Contact']['model'];
        ?></td>
    <td><?php
        echo $contact['Contact']['type'];
        ?></td>
    <td>
    	<div class="btn-group">
		  	<a class="btn btn-primary btn-small dropdown-toggle" data-toggle="dropdown" href="#">
		    	Action<span class="caret"></span>
		  	</a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
					<li>
					<a href="<?php echo $this->Html->url(array('controller' => 'contacts','action' => 'edit',$contact['Contact']['id']));?>">
						<i class="icon-edit"></i> Edit</a>
				</li>
<li>
					<a href="/full_calendar/events/add?id=<?php echo $contact['Contact']['id']; ?>&fname=<?php echo $contact['Contact']['first_name']; ?>&lname=<?php echo $contact['Contact']['last_name']; ?>&email=<?php echo $contact['Contact']['email']; ?>&phone=<?php echo $contact['Contact']['phone']; ?>&mobile=<?php echo $contact['Contact']['mobile']; ?>">
						<i class="icon-calendar"></i> Event</a>
				</li>
			
				<li>
					<a href="<?php
			        echo $this->Html->url(array(
			            'controller' => 'contacts',
			            'action' => 'view',
			            $contact['Contact']['id'],
			            '?&disabled'
			        ));
			        ?>">
						<i class="icon-zoom-in"></i> View</a>
				</li>
				<li>
					<a class="btn-mini-success fancybox fancybox.iframe"
			           href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'history', $contact['Contact']['id'])); ?>"
			           id="history_btn"><font color='black'>
						<i class="icon-time"></i> History</a>
				</li>
<li>
<a href="/deals/add?&id=<?php echo $contact['Contact']['id'] ?>&fname=<?php echo $contact['Contact']['first_name'] ?>&lname=<?php echo $contact['Contact']['last_name'] ?>&email=<?php echo $contact['Contact']['email'] ?>&gender=<?php echo $contact['Contact']['gender'] ?>&phone=<?php echo $contact['Contact']['phone'] ?>&mobile=<?php echo $contact['Contact']['mobile'] ?>&address=<?php echo $contact['Contact']['address'] ?>&city=<?php echo $contact['Contact']['city'] ?>&state=<?php echo $contact['Contact']['state'] ?>&zip=<?php echo $contact['Contact']['zip'] ?>&condition=<?php echo $contact['Contact']['condition'] ?>&year=<?php echo $contact['Contact']['year'] ?>&make=<?php echo $contact['Contact']['make'] ?>&model=<?php echo $contact['Contact']['model'] ?>&type=<?php echo $contact['Contact']['type'] ?>&vin=<?php echo $contact['Contact']['vin'] ?>&miles=<?php echo $contact['Contact']['odometer'] ?>&stocknum=<?php echo $contact['Contact']['stock_num'] ?>&unitvalue=<?php echo $contact['Contact']['unit_value'] ?>&color=<?php echo $contact['Contact']['unit_color'] ?>&tradevalue=<?php echo $contact['Contact']['trade_value'] ?>&conditiont=<?php echo $contact['Contact']['condition_trade'] ?>&yeart=<?php echo $contact['Contact']['year_trade'] ?>&maket=<?php echo $contact['Contact']['make_trade'] ?>&modelt=<?php echo $contact['Contact']['model_trade'] ?>&typet=<?php echo $contact['Contact']['type_trade'] ?>&vint=<?php echo $contact['Contact']['vin_trade'] ?>&milest=<?php echo $contact['Contact']['odometer_trade'] ?>&colort=<?php echo $contact['Contact']['usedunit_color'] ?>&stocknumt=<?php echo $contact['Contact']['stock_num_trade'] ?>&cid=<?php echo $contact['Contact']['company_id'] ?>&dealer=<?php echo $contact['Contact']['company'] ?>&status=<?php echo $contact['Contact']['status'] ?>&source=<?php echo $contact['Contact']['source'] ?>"><i class="icon-thumbs-up"></i>&nbsp;New Deal</a>
</li>
			</ul>
		</div>
        <script>
            $('document').ready(function () {
                $('#history_btn').fancybox({
                    autoDimensions: false,
                    height: 450,
                    width: 1000
                });
                //reset the value
                $("#ContactSearchAll").val($("#ContactSearchAllValue").val());
            });
        </script>
    </td>
</tr>
<?php
endforeach;
?></td>
</tbody>
</table>
<div class="pagination pagination-centered pagination-mini">
    <ul>
        <?php echo $this->Paginator->prev(''); ?>
        <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
        <?php echo $this->Paginator->next(''); ?>
    </ul>
</div>


