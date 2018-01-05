<?php 
    $arr1 = explode('?', $this->request->getRequestTarget());
    if(count($arr1) > 1) {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget()));
    } else {
        $url = implode('.csv?', explode('?', $this->request->getRequestTarget())).'.csv';
    }
?>
<?= $this->Form->create(null, ['valueSources' => 'query']) ?>
<div class="well">
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <?php
                        echo $this->Form->control('status', ['type' => 'hidden']);
                        echo $this->Form->control('reference_number', 
                            ['label' => false, 'templates' => 'table_form', 'placeholder' => 'Reference No.']);
                    ?>
                </td>
                <td>
                    <?php
                        echo $this->Form->control('name_of_institution', 
                            ['label' => false, 'templates' => 'table_form', 'placeholder' => 'Institution']);
                    ?>
                </td>
                <td rowspan="2" width="10%">
                    <button type="submit" class="btn btn-primary btn-sm" id="search" 
                            style="margin-bottom: 4px;" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    <?php
                        echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm', 'escape' => false]);
                    ?>
                    <!-- <button type="submit" class="btn btn-success btn-sm" id="search" style="margin-top: 4px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv</button> -->
                    <a class="btn btn-success" href="<?= $url ?>" style="margin-top: 4px;">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i> Csv
                    </a>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
<?= $this->Form->end() ?>