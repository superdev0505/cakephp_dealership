<?php
    $c_query =  $this->request->query;
    unset($c_query['_']);
    $curl = array('controller'=>$this->request->params['controller'], 'action'=>$this->request->params['action'],'?'=>$c_query);
    $curl = array_merge($curl, $this->request->params['pass'],$this->request->params['named']);
    $current_url =  $this->Html->url($curl);
?>

<br />
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
    <thead class="success paging">
        <?php echo $this->Html->tableHeaders(
                        array(
                            $this->Paginator->sort('id','#',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('first_name','Name',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('dealer','dealer',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('dealer_id','ID',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('username','username',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('group_id','group',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('email','Email',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            'E.Setting',
                            $this->Paginator->sort('dealer_type','Type',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('step_procces','Step Process',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('zone','Zone',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('active','Active',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),
                            $this->Paginator->sort('last_login','Last Login',array('class'=>'no-ajaxify','style'=>'color:#FFF;')),


                            'PassCode',
                            'Operation')); ?>
    </thead>
    <tbody>
        <?php if(empty($users)): ?>
        <tr>
            <td colspan="6" class="striped-info">No record found.</td>
        </tr>
        <?php endif; ?>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td><a class="lnk_edit_user no-ajaxify" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_user', $user['User']['id'],'?' => array('dealer_id' => $user['User']['dealer_id']))); ?>">
                <?php echo $user['User']['full_name']; ?>
            </a>
            </td>
            <td><?php echo $user['User']['dealer']; ?>
                <?php if($user['User']['other_locations'] != ''){ ?>
                    <span class="label label-warning label-stroke">Multiple</span>
                <?php } ?>
            </td>
            <td><?php echo $user['User']['dealer_id']; ?></td>
            <td><?php echo $user['User']['username']; ?></td>
            <td><?php echo $user['Group']['name']; ?></td>
            <td><?php echo $user['User']['email']; ?></td>
            <td><?php echo (array_key_exists($user['User']['id'],$email_setting_user))?'Yes':'No'; ?></td>
            <td><?php echo $user['User']['dealer_type']; ?></td>
            <td><?php echo $user['User']['step_procces']; ?></td>
            <td><?php echo $user['User']['zone']; ?></td>
            <td><?php if ($user['User']['active']) echo 'Yes'; else echo 'No'; ?></td>
            <td><?php if ($user['User']['last_login']) echo $user['User']['last_login']; else echo 'Never'; ?></td>
            <td><?php echo $user['User']['pwd']; ?></td>
            <td width='100'>
                <a class="lnk_edit_user no-ajaxify" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_user', $user['User']['id'],'?' => array('dealer_id' => $user['User']['dealer_id']))); ?>"> <i class="icon-edit"></i> Edit</a>
                &nbsp;
                <a class="no-ajaxify" target="_blank" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_login', $user['User']['id'],'?' => array('dealer_id' => $user['User']['dealer_id']))); ?>"> <i class="icon-edit"></i> Login</a>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- // Table END -->
<br />
<div class="paging">
    <ul class="pagination margin-none">
        <?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?> <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?> <?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
    </ul>
</div>
<?php //debug($trims); ?>
<?php //echo $this->element('sql_dump'); ?>
<script>
$(function(){

    $(".lnk_edit_user" ).click(function(event){
        event.preventDefault();

        $.ajax({
            type: "GET",
            cache: false,
            url: $(this).attr('href'),
            success: function(data){
                bootbox.dialog({
                    message: data,
                    title: "Edit User",
                });
            }
        });

    });


    $(".paging a" ).click(function(event){
        event.preventDefault();
        $("#ajaxOverlayLoader").show();
        $.ajax({
            url: $(this).attr('href'),
            type: "get",
            cache: false,
            success: function(results){
                $('#trim_search_result').html(results);
            }
        });
    });



});

</script>
