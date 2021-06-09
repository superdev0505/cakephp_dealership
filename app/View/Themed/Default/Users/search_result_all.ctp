<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
</style>
<span class="results"><?php echo $user_count; ?> Users Found <i class="icon-circle-arrow-down"></i></span>
<div class="paging innerAll">
            <ul class="pagination margin-none">
                <?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
                <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
                <?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
            </ul>
    </div>                         
<ul class="list unstyled" id="list_user_search_result" style="top:80px;" >
<ul class="list unstyled" id="list_user_search_result" style="top: 20px;">

<?php $count = 0; foreach ($users as $user): 	?>
<li <?php echo ($count%2)? 'class="active"' : ""  ?> user_row_id = "<?php echo $user['User']['id'];  ?>" >
<div class="media innerAll">
<div class="media-object pull-left thumb">
<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 51px" alt="Image" />
</div>
<div class="media-body">
<span class="strong muted">
<font color="blue"><u><?php echo $user['User']['first_name'] . "&nbsp;" . $user['User']['last_name'];  ?></u></font>

<?php
$dump = $user['User']['active'];

if ($dump == 1) {
echo '<span class="label label-success  label-stroke">Active</span>';
} else if ($dump == 0) {
echo '<span class="label label-danger label-stroke">Not Active</span>';
}
?>
</span>
</div>
<span class="muted">
			&nbsp;<i class="fa fa-group"></i>&nbsp;<?php echo $user['User']['dealer']; ?>&nbsp;#<?php echo $user['User']['dealer_id']; ?>

<span class="muted">
<?php $group = $user['User']['group_id'];?>Type:
<?php
if ($group == 2) {
    echo '<span class="label label-info  label-stroke">'.$groups[$group].'</span>';
} elseif ($group == 3) {
    echo '<span class="label label-info  label-stroke">'.$groups[$group].'</span>';
} elseif ($group == 1) {
    echo '<span class="label label-warning  label-stroke">'.$groups[$group].'</span>';
} else {
    echo '<span class="label label-info  label-stroke">'.$groups[$group].'</span>';
}
?>&nbsp;|&nbsp;User Id:&nbsp;#<?php echo $user['User']['id']; ?>
</span>
			
			</span>
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $this->Time->format('n/j/Y g:i A', $user['User']['created']); ?></a>&nbsp;|&nbsp;<?php 
				$startTimeStamp = strtotime($user['User']['created']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				echo $numberDays
				?> Day(s)&nbsp;</span>
						
		</div>
	</li>
</span>


</div>
</li>
<?php $count++; endforeach; ?>
</ul>


<script>

$(function() {
	
	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		//$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				$('#search-result-content').html(results);
			}
		});
	});
	
    <?php 
	//Load First Lead
	if(isset($this->request->params['pass']['2']) && $this->request->params['pass']['2'] == 'load_first' && !empty($users)){
	?>
	$("#user_details_content").prev('.ajax-loading').removeClass('hide');
	$.ajax({
		type: "GET",
		cache: false,
		url:  "<?php echo $this->Html->url(array('action' => 'user_details',$users[0]['User']['id'])); ?>",
		success: function(data){
			$("#user_details_content").html(data);
			$("#user_details_content").prev('.ajax-loading').addClass('hide');
		}
	});
	<?php } ?>
        
	<?php 
	//Load First Lead
	if(isset($this->request->params['pass']['1']) && $this->request->params['pass']['1'] == 'load_first' && !empty($users)){
	?>
	$("#user_details_content").prev('.ajax-loading').removeClass('hide');
	$.ajax({
		type: "GET",
		cache: false,
		url:  "<?php echo $this->Html->url(array('action' => 'user_details',$users[0]['User']['id'])); ?>",
		success: function(data){
			$("#user_details_content").html(data);
			$("#user_details_content").prev('.ajax-loading').addClass('hide');
		}
	});
	<?php } ?>

    $("ul#list_user_search_result").on('click', 'li', function() {
		$("#user_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'user_details')); ?>/"+$(this).attr('user_row_id'),
			success: function(data){
				$("#user_details_content").html(data);
				$("#user_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		
		
    });
});


</script>
	