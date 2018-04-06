<?php
$this->Html->script('adr_edit', ['block' => true]);
$this->Html->css('combo-box', ['block' => true]);
?>

<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
    <?= $ce2b->reference_number ?></a></li>
  <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab">
      <?php 
          if(empty($ce2b->assigned_to)) {
              echo 'Assign Evaluator';
          } else {
              echo "Assigned to:".$evaluators->toArray()[$ce2b->assigned_to];
          }
       ?>
  </a></li>
  <li role="presentation"><a href="#causality" aria-controls="causality" role="tab" data-toggle="tab">Causality Assessment</a></li>
  <li role="presentation"><a href="#committee_review" aria-controls="committee_review" role="tab" data-toggle="tab">Committee Review</a></li>
  <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab">STAGES</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="report">
    <br>
    <?php 
      echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['action' => 'view', '_ext' => 'pdf', 'prefix' => $prefix, $ce2b->id], ['escape' => false]); 
      echo "&nbsp;";
    ?>
    <?php if(empty($ce2b->assigned_to)) { ?>
        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#assignModal"><i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Evaluator</button> -->
    <?php } else { ?>
        <small><?= '<b>Assigned To</b>:'.$evaluators->toArray()[$ce2b->assigned_to]?></small>
    <?php }  ?>


  <?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Add', ['controller' => 'Ce2bs', 'action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;
  <?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> List', ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-info')); ?>

  <hr>
  <h1 class="page-header">E2B FILE</h1>

  <div class="ce2b_form">
    <div class="row">
      <div class="col-xs-6">
        <dl class="dl-horizontal">
          <dt>Company Name</dt>
          <dd><?= h($ce2b->company_name) ?></dd>
         <dt scope="row"><?= __('Reference Number') ?></dt>
            <dd><?= h($ce2b->reference_number) ?></dd>
         <dt scope="row"><?= __('e2b_file') ?></dt>
            <dd><?= h($ce2b->e2b_file) ?></dd>
        </dl>
      </div>
      <div class="col-xs-6">
        <dl class="dl-horizontal">
          <dt>Comment</dt>
          <dd><?= $ce2b->comment ?></dd>
        </dl>
      </div>
    </div>
  

    <div class="row">
      <div class="col-xs-12">
        <h1>E2B Content</h1>
        
        <div id="mydiv"><?= h($ce2b->e2b_content) ?></div>
      </div>
    </div>

    <script type="text/javascript">
      function formatXml(xml) {
        var formatted = '';
        var reg = /(>)(<)(\/*)/g;
        xml = xml.replace(reg, '$1\r\n$2$3');
        var pad = 0;
        jQuery.each(xml.split('\r\n'), function(index, node) {
            var indent = 0;
            if (node.match( /.+<\/\w[^>]*>$/ )) {
                indent = 0;
            } else if (node.match( /^<\/\w/ )) {
                if (pad != 0) {
                    pad -= 1;
                }
            } else if (node.match( /^<\w[^>]*[^\/]>.*$/ )) {
                indent = 1;
            } else {
                indent = 0;
            }

            var padding = '';
            for (var i = 0; i < pad; i++) {
                padding += '  ';
            }

            formatted += padding + node + '\r\n';
            pad += indent;
        });

        return formatted;
    }


    xml_raw = $('#mydiv').text();

    xml_formatted = formatXml(xml_raw);

    xml_escaped = xml_formatted.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/ /g, '&nbsp;').replace(/\n/g,'<br />');

    var mydiv = document.createElement('div');

    mydiv.innerHTML = xml_escaped;

    // document.body.appendChild(mydiv);
    $('#mydiv').replaceWith(mydiv);
    </script>
  </div>

   </div> <!-- Firstly, close the first tab!! IMPORTANT -->
<!-- </div> -->
    <div role="tabpanel" class="tab-pane" id="assign">
        <?php echo $this->element('ce2bs/assign_evaluator') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="causality">
        <?php echo $this->element('ce2bs/causality') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee_review">
        <?php  echo $this->element('ce2bs/committee_review') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="stages">
        <?php echo $this->element('ce2bs/stages') ?>
    </div>
  </div>