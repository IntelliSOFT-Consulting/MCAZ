  
  <ul class="nav nav-sidebar">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>      
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Sadrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Aefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('AEFIS', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Saefis') ? 'active' : ''; ?>">
      <?= $this->Html->link('SAEFIS', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Adrs') ? 'active' : ''; ?>">
      <?= $this->Html->link('SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>