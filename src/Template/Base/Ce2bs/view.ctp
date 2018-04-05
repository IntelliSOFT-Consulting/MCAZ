<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Add', ['controller' => 'Ce2bs', 'action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;
<?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> List', ['controller' => 'Ce2bs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-info')); ?>

<hr>
<h1 class="page-header">E2B FILE</h1>


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