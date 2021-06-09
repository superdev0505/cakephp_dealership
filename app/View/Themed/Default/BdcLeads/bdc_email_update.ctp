<?php $user_names=array(); ?>
<!-- Table -->
<div class="widget">
		<div class="widget-head">
			<h4 class="heading">BDC Email Update Report for period <?php echo date('m/d/Y',strtotime($first_day_this_month)) .' - '.date('m/d/Y',strtotime($last_day_this_month)); ?></h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th style="text-align:center">Total Email Updated by BDC</th>
					
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <tr class="gradeA" >
						<td align="center"><?php echo $month_count; ?></td>
                        </tr>					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
    
  <div class="widget">
		<div class="widget-head">
			<h4 class="heading">BDC Email Updated for day <?php echo date('m/d/Y',strtotime($today_start_date)) ?></h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th style="text-align:center">Total Email Updated by BDC</th>
					
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <tr class="gradeA" >
						<td align="center"><?php echo $today_count; ?></td>
                        </tr>					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
      
     
   