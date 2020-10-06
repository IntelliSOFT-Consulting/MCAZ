
<?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> Home', ['controller' => 'Users', 'action' => 'home', 'prefix' => false], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;


<?=     $this->Html->script('jquery/admin_users', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>

<hr>
<h1 class="page-header">USERS</h1>

<div class="paginator">
    <ul class="pagination pagination-sm">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
</div>
<p><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of <b>{{count}}</b> total')]) ?></small></p>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->phone_no) ?></td>
                <td><?= $user->has('group') ? $user->group->name : '' ?></td>
                <td><?= h($user->created) ?></td>
                <td>
                   <?php
                    if(!$user->is_confirmed) {
                        echo $this->Html->link('<span class="label label-info">Confirm</span>', ['controller' => 'Users', 'action' => 'activate', $user->id, 'prefix' => $prefix, '_ext' => 'json'], array('escape' => false, 'class' => 'activate', 'id' => $user->id)); 
                    } else {
                        echo $this->Html->link('<span class="label label-default">Remove</span>', ['controller' => 'Users', 'action' => 'deactivate', $user->id, 'prefix' => $prefix, '_ext' => 'json'], array('escape' => false, 'class' => 'deactivate', 'id' => $user->id));  
                    }
                    ?>            

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
