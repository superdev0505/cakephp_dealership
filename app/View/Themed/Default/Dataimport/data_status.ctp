<br />
<br />
<br />

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
    .largeWidth {
        margin: 0 auto;
        width: 800px;
    }
    .error-message{
        color: #FF0000;
    }
</style>

<div class="innerAll">
    <div class="widget widget-body-white widget-heading-simple">
        <div class="widget-body">
            <!-- Search result-->
            <div id="trim_search_result">
                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                    <thead class="success paging">
                        <?php
                        
                        ?>
                    </thead>
                    <tbody>
                        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="6" class="striped-info">No record found.</td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['User']['id']; ?></td>
                                <td><a class="lnk_edit_user no-ajaxify" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_user', $user['User']['id'])); ?>"> 
                                        <?php echo $user['User']['full_name']; ?>
                                    </a>
                                </td>
                                <td><?php echo $user['User']['dealer']; ?>
                                    <?php if ($user['User']['other_locations'] != '') { ?>
                                        <span class="label label-warning label-stroke">Multiple</span>
                                    <?php } ?>
                                </td>
                                <td><?php echo $user['User']['dealer_id']; ?></td>
                                <td><?php echo $user['User']['username']; ?></td>
                                <td><?php echo $user['Group']['name']; ?></td>
                                <td><?php echo $user['User']['email']; ?></td>
                                <td><?php echo (array_key_exists($user['User']['id'], $email_setting_user)) ? 'Yes' : 'No'; ?></td>
                                <td><?php echo $user['User']['dealer_type']; ?></td>
                                <td><?php echo $user['User']['step_procces']; ?></td>
                                <td><?php echo $user['User']['zone']; ?></td>
                                <td><?php if ($user['User']['active']) echo 'Yes'; else echo 'No'; ?></td>
                                <td><?php echo $user['User']['pwd']; ?></td>
                                <td width='100'>
                                    <a class="lnk_edit_user no-ajaxify" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_user', $user['User']['id'])); ?>"> <i class="icon-edit"></i> Edit</a>
                                    &nbsp;
                                    <a class="no-ajaxify" target="_blank" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'admin_login', $user['User']['id'])); ?>"> <i class="icon-edit"></i> Login</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- // Table END -->
                <br />
                <div class="paging">
                    <ul class="pagination margin-none">
                        <?php echo $this->Paginator->prev('<<', array('class' => 'no-ajaxify')); ?> <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2, 'class' => 'no-ajaxify')); ?> <?php echo $this->Paginator->next('>>', array('class' => 'no-ajaxify')); ?>
                    </ul>
                </div>
            </div>
            <!-- //Search result End-->
        </div>
    </div>
</div>