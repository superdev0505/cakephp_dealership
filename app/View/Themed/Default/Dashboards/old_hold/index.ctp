<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>

<meta http-equiv="refresh" content="180">
<div align="center"><p><sub>Refreshes every 3 min.</sub></p></div>
<div>
<div>
<h4>Mobile & Web Leads&nbsp;/&nbsp;Add New&nbsp;<a class="btn btn-success btn-mini" href="<?php
    echo $this->Html->url(array(
        'controller' => 'contacts',
        'action' => 'add'
    ));
    ?>"><i class="icon-plus"></i></a>
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
        echo $this->Form->input('search_all', array(
            'div' => false,
            'class' => 'span2',
            'placeholder' => 'Search',
            'label' => false
        ));
        ?>
        <button type="submit" class="btn btn-success"><i class="icon-search"></i></button>
    </div>
    <?php
    echo $this->Form->end();
    ?>
</h4>
<div class="filter-box" style="display:none">
    <?php
    echo $this->Form->create('Contact', array(
        'url' => array_merge(array(
            'action' => 'index'
        ), $this->params['pass']),
        'class' => 'form-inline'
    ));
    ?>
    <fieldset>
        <?php
        echo $this->Form->end();
        ?>
</div>
<div>
<table class="table table-bordered table-striped table-striped-warning">
<thead class="warning">
	<tr>
		<th class="warning">Ref#</th> 
		<th class="info">Name</th> 
		<th class="info">Created</th> 
		<th class="warning">Lead Type</th> 
		<th class="warning">Step</th> 
		<th class="warning">Status</th> 
		<th class="warning"><i class="icon-mobile-phone"></i> Cell #</th> 
		<th class="warning"><i class="icon-envelope"></i> E-mail</th> 
		<th class="warning">N / U</th> 
		<th class="warning">Year</th> 
		<th class="warning">Make</th> 
		<th class="warning">Model</th> 
		<th class="warning">Unit Type</th> 
		<th class="warning">Operation</th>
	</tr>
</thead>
<tbody>
<?php
if (empty($contacts)):
    ?>
    <tr>
        <td class="striped-warning">No Record Found.</td>
    </tr>
<?php
endif;
?>
<?php
foreach ($contacts as $contact):
    ?>
    <tr>
        <td><?php
            echo $contact['Contact']['id'];
            ?></td>
        <td class="striped-info"><?php
            echo $contact['Contact']['first_name'];
            ?>&nbsp;<?php
            echo $contact['Contact']['last_name'];
            ?></td>
        <td><?php
            echo $contact['Contact']['created_full_date'];
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
						<a href="<?php
			            echo $this->Html->url(array(
			                'controller' => 'contacts',
			                'action' => 'edit',
			                $contact['Contact']['id']
			            ));
			            ?>">
							<i class="icon-edit"></i> Edit</a>
					</li>
					<li>
						<a href="<?php
			            echo $this->Html->url(array(
			                'controller' => 'contacts',
			                'action' => 'view',
			                $contact['Contact']['id'], "?&disabled=disabled"));
			            ?>">
							<i class="icon-zoom-in"></i> View</a>
					</li>
				</ul>
			</div>
		</td>
    </tr>
<?php
endforeach;
?>
</tbody>
</table>

<div class="pagination pagination-centered pagination-mini">
    <ul>
        <?php echo $this->Paginator->prev(''); ?>
        <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
        <?php echo $this->Paginator->next(''); ?>
    </ul>
</div>

</div>
<div class="span11">
    <h4>My Events
        <!-- <a class="btn btn-success btn-mini" href="<?php
echo $this->Html->url(array(
    'plugin' => 'full_calendar',
    'controller' => 'events',
    'action' => 'add'
));
?>"><i class="icon-plus"></i></a> -->
    </h4>
    <?php
    $timezone = AuthComponent::user('zone');
    //echo $timezone;
    ?>
    <div>
        <table id="mytable" class="table table-bordered table-striped table-striped-warning">
            <thead class="info">
            <?php
            echo $this->Html->tableHeaders(array(
                'ID',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Name',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Status',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Type',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Title',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Details',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Staff',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Event Start D/T',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Event End D/T',
                '<i class="icon-calendar"></i>&nbsp;&nbsp;Due',
                'Operation'
            ));
            ?>
            </thead>
            <tbody>
            <?php
            if (empty($events)):
                ?>
                <tr>
                    <td class="striped-warning">No Record Found.</td>
                </tr>
            <?php
            endif;
            ?>
            <?php
            foreach ($events as $event):
                ?>
                <tr>
                    <?php
                    $date = new DateTime();
                    date_default_timezone_set($timezone);
                    $todaysdate = date('Y-m-d');
                    $setdate = $event['Event']['end'];
                    $date_string = $setdate;
                    $date = explode(" ", $date_string);
                    $date1 = $todaysdate;
                    $date2 = $date[0];
                    ?>
                    <td><?php
                        echo $event['Event']['id'];
                        ?></td>
                    <td class="striped-info"><?php
                        echo $event['Event']['first_name'];
                        ?>&nbsp;<?php
                        echo $event['Event']['last_name'];
                        ?></td>
                    <td><?php
                        echo $event['Event']['status'];
                        ?></td>
                    <td><?php
                        echo $event['EventTypes']['name'];
                        ?></td>
                    <td><?php
                        echo $event['Event']['title'];
                        ?></td>
                    <td><?php
                        echo $event['Event']['details'];
                        ?></td>
                    <td><?php
                        echo $event['Event']['sperson'];
                        ?></td>
                    <td><?php
                        echo $this->Time->format('l F jS, Y g:i A', $event['Event']['start']);

                        ?></td>
                    <td><?php
                        echo $this->Time->format('l F jS, Y g:i A', $event['Event']['end']);
                        ?></td>
                    <?php
                    if ($date1 > $date2) {
                        echo "<td style='border:3px dotted red' ><strong>PAST</strong></td>";
                    } else if ($date1 < $date2) {
                        echo "<td><strong>FUTURE</strong></td>";
                    } else if ($date1 == $date2) {
                        echo "<td style='border:3px dotted green' ><strong>TODAY</strong></td>";
                    }
                    ?>
                    <td>
                    	<div class="btn-group">
						  	<a class="btn btn-primary btn-small dropdown-toggle" data-toggle="dropdown" href="#">
						    	Action<span class="caret"></span>
						  	</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li>
									<a href="/full_calendar/events/edit/<?php
			                        echo $event['Event']['id'];
			                        ?>">
										<i class="icon-edit"></i> Edit</a>
								</li>
								<li>
									<a href="<?php
			                        echo $this->Html->url(array(
			                            'plugin' => 'full_calendar',
			                            'controller' => 'events',
			                            'action' => 'view',
			                            $event['Event']['id']
			                        ));
			                        ?>">
										<i class="icon-zoom-in"></i> View</a>
								</li>
							</ul>
						</div>
					</td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
        </table>

        <div class="pagination pagination-centered pagination-mini">
            <ul>
                <?php echo $this->Paginator->prev(''); ?>
                <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
                <?php echo $this->Paginator->next(''); ?>
            </ul>
        </div>
    </div>
</div>
</div>
</div>