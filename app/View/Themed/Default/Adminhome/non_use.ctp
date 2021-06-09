<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<!-- Search result-->
			<div id="trim_search_result">
<br>
<div id="report_data_container">
    <h4>Non-Use Report:</h4>
</div>
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
    <thead class="success">
        <tr>
            <th>Dealer ID#</th>
            <th>Dealer Name</th>
        </tr>	
    </thead>
    <tbody>
        <?php
        if(!empty($allNonUse)){
        foreach ($allNonUse as $value) {
              
        ?>
        <tr>
            <td><?php
            
            echo $value['User']['dealer_id'];
            ?></td>
            <td><?php
            
            echo $value['User']['dealer'];
            ?></td>
        </tr>
    <?php
    
    }
        }else{
        ?>
        <tr>
            <td colspan="2">
                No data Found
            </td>
            
        </tr>
        <?php
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