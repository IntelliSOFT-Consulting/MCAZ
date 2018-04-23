<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>
<?php 
    $arr1 = explode('?', $this->request->getRequestTarget());
    if(count($arr1) > 1) {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
    } else {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget())).'.csv';
    }
    // pr($adrs);
?>

<?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> WhoDrugs', ['controller' => 'WhoDrugs', 'action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;


<hr>
<h1 class="page-header">WHO-DRUGS</h1>

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
      <div class="col-xs-12">
        <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk" aria-hidden="true"></span> to match any character e.g. *ou* to match Cough, Ouch etc.</em></small></h5>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('status', ['type' => 'hidden', 'templates' => 'table_form']);
                            echo $this->Form->control('name', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*drug name*']);
                        ?>
                    </td>
                    <td>                        
                        <button type="submit" class="btn btn-primary btn-sm" id="search" 
                                style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
                    </td>
                    <td>
                        <?php
                            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm', 'escape' => false]);
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" href="<?= $url ?>">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
                        </a>
                    </td>
                    <td>                        
                        <div class="dropdown">
                          <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Sort by
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><?= $this->Paginator->sort('id') ?></li>
                            <li><?= $this->Paginator->sort('drug_name') ?></li>
                          </ul>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
</div>
<?= $this->Form->end() ?>

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
                <th scope="col"><?= $this->Paginator->sort('drug_name') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($whoDrugs as $whoDrug): ?>
            <tr>
                <td><?= $whoDrug->id ?></td>
                <td><?= h($whoDrug->drug_name) ?></td>
                <td>
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['controller' => 'WhoDrugs', 'action' => 'view', $whoDrug->id, 'prefix' => $prefix], array('escape' => false));  ?>
                    <?= $this->Html->link('<span class="label label-success">Edit</span>', ['controller' => 'WhoDrugs', 'action' => 'edit', $whoDrug->id, 'prefix' => $prefix], array('escape' => false));  ?>          

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
