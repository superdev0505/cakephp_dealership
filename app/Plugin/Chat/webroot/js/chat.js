
	var opts = {
		update: '/chat/chats/update',
		interval: 5000
	};

	function chat($chat_id) {
		

		var $this = $($chat_id);
		update($this);
		$Ref_interval_Id=setInterval(function() {
				update($this);
			},
			opts.interval);
		$this.attr('data-interval', $Ref_interval_Id);	
		$this.find("form").bind('submit',function() {
				post($(this));
				return false
			});
		
	};

	function update($obj) {
		$.ajax({
			cache: false,
			url: opts.update + "/" + $obj.attr("name"),
			success: function(ret) {
				$obj.find(".chat_window").html(ret);
			}
		});
	};

	function post($obj) {
		var $name = $obj.find("input[name='data[Chat][name]']");
		var $message = $obj.find("input[name='data[Chat][message]']");
		var $submit = $obj.find("button[type='submit']");

		if (($.trim($name.val()) == "") || ($.trim($message.val()) == "")) {
			return;
		}

		var form = $obj.serialize();
		$message.attr('disabled', true);
		$submit.attr('disabled', true);

		$.ajax({
			type: "POST",
			url: $obj.attr("action"),
			data: form,
			success: function() {
				$message.val("");
			},
			complete: function() {
				$message.attr('disabled', false);
				$submit.attr('disabled', false);
			}
		});
	};

	function new_chat_screen(){
		var $array_keys= '';
		$(".user_chat_key").each(function(){
				$array_keys += ','+$(this).attr('data-key');
			});		
		$.ajax({
			type: "POST",
			url: '/chat/chats/new_chat',
			data: {chat_keys : $array_keys},
			success: function(data) {
				
				data = $.parseJSON(data);
				if(data.html != ''){
				$("#chat_user_list").append(data.html);
				$chat_key = $("#chat_user_list").last().find("li a.user_chat_key").attr('data-key');
				$chat_name = $("#chat_user_list").last().find("li a.user_chat_key").attr('data-name');
				var audioElement =document.getElementById("my_chat_sound");
				audioElement.play();
				bootbox.alert('Chat has been initaited from user '+$chat_name + ' Please respond to the chat request',function(result){
					$('a.user_chat_key[data-key="'+$chat_key+'"]').trigger('click');
					audioElement.pause();
					/*setTimeout(function(){
						
						alert(audioElement );
						audioElement.play();},200);*/
			
					});
				}
				if(data.deleted_keys != '')
				{
					delete_chat_session(data.deleted_keys);
				}
			},
			
		});		
	}
	
	function delete_chat_session(deleted_keys)
	{
		deleted_keys = deleted_keys.split(',');
		
		for(i=0 ; i<deleted_keys.length; i++)
		{
			$chat_key = deleted_keys[i];
			$interval =$("#"+$chat_key).attr('data-interval');
			clearInterval($interval);
			$("#ChatSystemWindow"+$chat_key).remove();
			$('a.user_chat_key[data-key="'+$chat_key+'"]').parent().remove();
		}
	}
	

	/*function append_new_chat(data)
	{
		if(data != '')
		{
			$data = $.parseJSON(datta);
			$.each($data, function(key) {
				$html = '';
				$html += '<li class="list-group-item border-top-none">';
				$html += '<a href="javascript:void(0)" class="user_chat_key" data-key="'+$chat_key+'" data-name="'+$name+'" data-id="'+$to_id+'"><span class="badge pull-right bg-primary " style="display:none">30</span><i class="fa fa-circle" style="color:#8bbf61;" ></i>'.$name.'</a>';
				 
			 });
		}
	}*/
	
	//
	// plugin defaults
	//
