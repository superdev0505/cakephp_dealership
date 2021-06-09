<?php 

	//echo $this->Html->css(array('Chat.chat.css','Chat.jquery-ui.min.css')); 
	//echo $this->Html->script(array('Chat.chat.js','Chat.jquery-ui.min.js')); 
	
?>
<style>

.sidebar.sidebar-discover #menu>div>ul>li>a>span {
	position: absolute;
	left: 50px;
	top: 0;
}


</style>

<div class="navbar hidden-print main" role="navigation">
	<span id="default_d_type" d_type = "<?php echo (AuthComponent::user('d_type')!='')? AuthComponent::user('d_type') : "Powersports"; ?>" ></span>
	
	<div class="pull-left">
		<a href="/adminhome/"><img src="https://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" width="" height="" title="Dealership Performance CRM" alt="Dealership Performance CRM" /></a>
		<span id="refresh_stat">.</span>
	</div>
	
	
	
	<ul class="main pull-right">
	
    <?php /*?> <li class="dropdown hidden-xs">
    <a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/1423012961_Messages-32.png'); ?> </a>
    
    <ul id="chat_user_list" class="dropdown-menu list-group list-group-1 margin-none borders-none" style="width:200px;">
                                   
                                
                                    <?php //echo $this->AjaxChat->get_chat_keys(); ?>
                                  
                                </ul>
    </li> <?php */?>
			
		<li>
		
                    <a href="<?php echo $this->Html->url(array('controller'=>'adminhome','action'=>'state_dealership')); ?>">
                                       <i class="fa fa-group"></i> Stats Dealership
                                    </a>
		</li>
		
		
		
		<li>
			<div class="user-action user-action-btn-navbar">
				<button class="btn btn-sm btn-navbar btn-default" style="font-weight: bold;" ><i class="fa fa-bars fa-2x"></i> <u style="font-size: 15px;" >Menu Fold</u></button>
			</div>
		</li>
		<li class="dropdown username">
			<a href="" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo AuthComponent::user('full_name'); ?>
			<span class="caret"></span></a>
			<ul class="dropdown-menu pull-right" style = 'top: 90%;'>
				
				<?php if ($_SESSION['Auth']['User']['Group']['id'] == 1  ) { ?>
					<li><a href="/adminhome/" class="glyphicons user"><i></i> Admin Home</a></li>
				<?php } ?>
			
				<li><a href="/users/edit_new/<?php echo AuthComponent::user('id'); ?>" class="glyphicons user"><i></i> Account</a></li>
				<li><a href="/user_emails/inbox" class="glyphicons envelope"><i></i>Messages</a></li>
				<li><a href="/supports/add" class="glyphicons envelope"><i></i>Support</a></li>							
				<li><a href="/adminhome/logout" class="glyphicons lock no-ajaxify"><i></i>Logout</a></li>
			</ul>
			
		</li>
		<li><a href="/adminhome/logout" class='no-ajaxify'>Logout</a></li>
	</ul>
</div>





<script>

function dateformat(datestr){
	var t = datestr.split(/[- :]/);
	var date = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
	d = date.toLocaleTimeString().replace(/:\d+ /, ' ');
	return (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear() + " "+d;
}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	stat_options = "";
	<?php 
	$user_zone = "?zone=".AuthComponent::user('zone');
	if($this->request->params['controller'] == 'dashboards' && $this->request->params['action'] == 'main'){
		$user_zone = "?stats_month=".$stats_month."&zone=".AuthComponent::user('zone');
	?>
	
	stat_options = $("#stat_options").val();
	
	<?php	
	}
	?>
	

	
	function hide_footer(){
		$("#footer").fadeOut('slow');
	}
	
	
	
	setTimeout(hide_footer, 3000);
	
	
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>

<?php /*?><?php $audio_url = FULL_BASE_URL.'/app/webroot/files/chat_sound/railroad_crossing.mp3'; ?>
<audio id="my_chat_sound" type="audio/mpeg" src="<?php echo $audio_url; ?>"></audio>
<?php $SupportStaffChatId=Configure::read('SupportStaffChatId'); ?>
<script type="text/javascript">

function end_chat_session($this)
{
	$chat_key = $this.attr('data-id');
	$interval =$("#"+$chat_key).attr('data-interval');
	$message= "This chat Session will be ended. Are you sure you want to end chat";
	bootbox.confirm($message,function($result){
	if($result){
		clearInterval($interval);
		$("#ChatSystemWindow"+$chat_key).remove();
		$.ajax(
		{
			url : '/chat/chats/end_chat_session/'+$chat_key,
			success: function(data){}
		});
	}
	});
		
}


$(document).ready(function(){
//$(".user_chat_key").on('click',function(e){
	
  $("ul#chat_user_list").on('click' , 'a.user_chat_key',function(e){		
	e.preventDefault();
	$chat_key = $(this).attr('data-key');
	$to_id = $(this).attr('data-id');
	$to_name = $(this).attr('data-name');
	if($("#ChatSystemWindow"+$chat_key).length == 0)
	{
		if($(".user_chat_window").length == 1)
		{
			$left_css = '64%';
		}else
		{
			$left_css = '50%';
		}
		$chat_panel = $("#chat_panel_html").html();
		$chat_html = $chat_panel.replace(/#####/g , $chat_key);
		$("#chat_panels").append($chat_html); 
		$("#"+$chat_key+"ChatToId").val($to_id);
		$("#"+$chat_key+"ChatToName").val($to_name);
		$("#chat_userName"+$chat_key).text($to_name);
		chat("#"+$chat_key);
		$("#ChatSystemWindow"+$chat_key).draggable();	
		$("#ChatSystemWindow"+$chat_key).resizable();
		$("#ChatSystemWindow"+$chat_key).find("#ChatClose"+$chat_key).bind('click',function(event){
			$(this).parent().parent().parent().hide();
			return false;
			});
		$("#ChatSystemWindow"+$chat_key).find("#EndChatSession"+$chat_key).bind('click',function(event){
			end_chat_session($(this));
			return false;
			});	
		$("#ChatSystemWindow"+$chat_key).css("left", $left_css);	
		
	}
	
	
	$("#ChatSystemWindow"+$chat_key).show();
	
	});
	

	


// setInterval(function() {
// 				new_chat_screen();
// 			},
// 			10000);	

});	
</script>
<div id="chat_panel_html">
<div id="ChatSystemWindow#####" class="user_chat_window" style="width:36%;position:fixed;top:48%;left:64%;z-index:99999;display:none;">
<div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> <span id="chat_userName#####">Chat</span>
                  
                    <a href="javascript:void(0)" id="ChatClose#####" data-chatid="#####" class="pull-right text-white">X</a> 
                    <a href="javascript:void(0)" id="EndChatSession#####" style="margin-right:5px;" data-id="#####" class="pull-right"><span class="badge badge-danger">End Chat</span></a>
                   
                </div>
                <?php echo $this->element('chat_form_div',array('from_id' => $SupportStaffChatId ,'from_name' => 'DP 360 Support')); ?>
                
            </div>
</div>
</div>
<div id="chat_panels">
</div>
<?php */?>





























