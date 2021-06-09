<div id="#####" class ="chat_main_div" name="#####"><div class="panel-body"><ul class="chat chat_window" id="chat_window_#####"></ul></div><?php
					echo $this->Form->create('Chat',array('id' =>'#####ChatForm',
                                                'url' => '/chat/chats/post'));
					echo $this->Form->hidden('key',array('value' => '#####' ));							
					echo $this->Form->hidden('to_id', array('id' => '#####ChatToId'));
					echo $this->Form->hidden('from_id', array('id' => '#####ChatFromId','value' =>$from_id));
					echo $this->Form->hidden('name', array('id' => '#####ChatName','value' =>$from_name));
					echo $this->Form->hidden('to_name',array('id' => '#####ChatToName'));
					//echo $this->Form->input('message',array('label'=>false,'div'=>false,'class' => 'form-control input-sm','id' => $key . 'ChatMessage','placeholder' => 'Type your message here...')); 
					 ?><div class="panel-footer"><div class="input-group"><?php echo $this->Form->input('message',array('id' => '#####ChatMessage','div' => false ,'label' => false , 'class' =>'form-control input-sm' , 'placeholder' =>'Type your message here...')); ?><span class="input-group-btn"><button type="submit" class="btn btn-warning btn-sm">Send</button></span></div></div><?php echo $this->Form->end(); ?></div>