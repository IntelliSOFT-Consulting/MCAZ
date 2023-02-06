<?php
$this->Html->script('multi/saefi_reactions', ['block' => true]);
?>
<div class="reaction-groups">
    <div id="reaction_primary_detail">

    </div>
    <div id="saefi_reactions">
        <?php
        if (!empty($saefi['saefi_reactions'])) {
            for ($i = 0; $i <= count($saefi['saefi_reactions']) - 1; $i++) {
        ?>
                <div class="reaction-group">
                    <?php
                    echo $this->Form->input('saefi_reactions.' . $i . '.id', ['templates' => 'table_form']);
                    echo $this->Form->input('saefi_reactions.' . $i . '.reaction_name', array(
                        'label' => ($i + 1) . '. ',  'escape' => false, 'class' => 'other_reactions'
                    ));
                    echo $this->Html->tag('div', '<button id="reactionsButton' . $i . '" class="btn btn-xs btn-danger removereactions" type="button"><i class="fa fa-trash-o"></i></button>', array(
                        'style' => 'padding-left: 35%;',
                        'class' => 'controls', 'escape' => false
                    ));
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>