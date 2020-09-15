<?php
  use Cake\Utility\Hash;
  use Cake\Utility\Xml;
  $this->Html->css('bootstrap/bootstrap.vertical-tabs', ['block' => true]);
  $this->Html->script('ce2b_view', ['block' => true]);
?>

<div class="row">
  <div class="col-xs-2"> <!-- required for floating -->
    <ul class="nav nav-tabs tabs-left" data-offset-top="60"  role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
          <b><?= $ce2b->reference_number ?></b></a></li>
        <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee Review(s)</b></a></li>     
        <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab">STAGES</a></li>
    </ul>
  </div>
  <div class="col-xs-10">  

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="report">
      <?php echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Ce2bs', 'action' => 'view', '_ext' => 'pdf', $ce2b->id], ['escape' => false]); ?>

          <?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Add', ['controller' => 'Ce2bs', 'action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;
          <?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> List', ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-info')); ?>

          <hr>
          <h1 class="page-header">E2B FILE</h1>

        <div class="ce2b_formd">
          <div class="row">
            <div class="col-md-6">
              <dl class="dl-horizontal">
                <dt>Company Name</dt>
                <dd><?= h($ce2b->company_name) ?></dd>
               <dt scope="row"><?= __('Reference Number') ?></dt>
                  <dd><?= h($ce2b->reference_number) ?></dd>
               <dt scope="row"><?= __('e2b_file') ?></dt>
                  <dd><?= h($ce2b->e2b_file) ?></dd>
              </dl>
            </div>
            <div class="col-md-6">
              <dl class="dl-horizontal">
                <dt>Comment</dt>
                <dd><?= $ce2b->comment ?></dd>
              </dl>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">
              <h1>E2B Content</h1>
              
              <div id="mydiv"><?php
                $xml = (Xml::toArray(Xml::build($ce2b->e2b_content)));
                $arr = Hash::flatten($xml);
              ?>
                <table class="table table-striped">
                  <thead>
                    <th>Label</th>
                    <th>Value</th>
                    <th>Help</th>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($arr as $key => $value) {
                        if(!empty($value)) {
                          // Load an application cell
                          $cell = $this->cell('E2b', [$key, $value]);
                          echo $cell;
                        } 
                      } 
                    ?>
                  </tbody>
                </table>

              </div>
            </div>
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


          /*xml_raw = $('#mydiv').text();

          xml_formatted = formatXml(xml_raw);

          xml_escaped = xml_formatted.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/ /g, '&nbsp;').replace(/\n/g,'<br />');

          var mydiv = document.createElement('div');

          mydiv.innerHTML = xml_escaped;

          // document.body.appendChild(mydiv);
          $('#mydiv').replaceWith(mydiv);*/
          </script>          

      </div> <!-- Firstly, close the first tab!! IMPORTANT -->

    <div role="tabpanel" class="tab-pane" id="committee">      
        <?= $this->element('ce2bs/applicant_committee') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="stages">
        <?= $this->element('ce2bs/stages') ?>
    </div>
    </div>
  </div>
</div>