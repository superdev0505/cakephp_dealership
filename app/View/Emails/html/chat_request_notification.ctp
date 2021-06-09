<p> This email is to notify you that a chat request has been intiated by the user.</p>
<p>User infromation is as follow</p>
<table cellpadding="6">
<tr>
<td>Name :</td>
<td><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></td>
</tr>
<tr>
<td>ID :</td>
<td><?php echo $user_data['id']; ?></td>
</tr>
<tr>
<td>Dealer :</td>
<td><?php echo "#".$user_data['dealer_id'].' '.$user_data['dealer']; ?></td>
</tr>
</table>

<p><a href="<?php echo FULL_BASE_URL.'/adminhome/login'; ?>"> Click here to start the chat</a></p>