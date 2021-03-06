<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<h1 class="page-header">Dashboard</h1>

  <div>
    <div class="col-xs-6 col-sm-4">
      
      <h2><img alt="" src="/img/comments.ico" style="width: 35px;">&nbsp; 
        <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> <a href="#" class="btn-zangu"> User Feedback</a>  -->
        <?php
            echo $this->Html->link('User Feedback', ['controller' => 'Feedbacks', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu'));             
          ?>
          </h2>
          <div style="margin-left: 15px">
            <dl>
              <?php $i=1; foreach ($feedbacks as $feedback): ?>
              <dt><?= $i++.' '.$feedback->subject ?> <small class="muted"><?= $feedback->created ?></small></dt>
              <dd><?= $feedback->feedback ?> </dd>
              <?php endforeach; ?>
            </dl>          
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    <?= $this->Paginator->first('<< ', ['model' => 'Feedbacks']) ?>
                    <?= $this->Paginator->prev('< ' , ['model' => 'Feedbacks']) ?>
                    <?= $this->Paginator->next(' >', ['model' => 'Feedbacks']) ?>
                    <?= $this->Paginator->last(' >>', ['model' => 'Feedbacks']) ?>
                </ul>
            </nav>  
          </div>
    </div>
    <div class="col-xs-6 col-sm-4 placeholder">
      <h2><img alt="" src="/img/user_group.ico" style="width: 35px;">&nbsp; 
        <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> --> <a href="#" class="btn-zangu"> Users</a></h2>
      <p>Manage users</p>
      <ul class="list-group">
        <li class="list-group-item">
          <?php
            echo $this->Html->link('<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Users', ['controller' => 'Users', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item">
          <?php
            echo $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> &nbsp; Groups', ['controller' => 'Groups', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item">
          <?php
            echo $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; Notifications', ['controller' => 'Notifications', 'action' => 'index'], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
      </ul>
      <h2><img alt="logs" src="/img/logs2.png" style="width: 35px;">&nbsp; 
        <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> --> <a href="#" class="btn-zangu"> Logs</a></h2>
      <p>Manage logs</p>
      <ul class="list-group">
        <li class="list-group-item">
          <?php
            echo $this->Html->link('<i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; System Logs', ['controller' => 'Logs', 'action' => 'index', 'prefix' => $prefix, 'plugin' => 'DatabaseLog'], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
      </ul>      
    </div>
    <div class="col-xs-6 col-sm-4 placeholder">
      <h2><img alt="" src="/img/box_content.ico" style="width: 35px;">&nbsp;<!-- <i class="fa fa-briefcase" aria-hidden="true"></i>  -->
        <a href="#" class="btn-zangu"> Content</a></h2>
      <p>Change frontend text and content.</p>
      <ul class="list-group">
        <li class="list-group-item">
          <?php
            echo $this->Html->link('<i class="fa fa-code" aria-hidden="true"></i> &nbsp; Front end Pages', ['controller' => 'Sites', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item">
          <?php
            echo $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> &nbsp; Message Templates', ['controller' => 'Messages', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item">
          <?php
            echo $this->Html->link('<i class="fa fa-hospital-o" aria-hidden="true"></i> &nbsp; Facilities', ['controller' => 'Facilities', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item list-group-item-warning">
          <?php
            echo $this->Html->link('<i class="fa fa-stethoscope" aria-hidden="true"></i> &nbsp; WHO Drugs', ['controller' => 'WhoDrugs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item list-group-item-warning">
          <?php
            echo $this->Html->link('<i class="fa fa-upload" aria-hidden="true"></i> &nbsp; Upload WHO Drugs', ['controller' => 'WhoDrugs', 'action' => 'import', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item list-group-item-info">
          <?php
            echo $this->Html->link('<i class="fa fa-medkit" aria-hidden="true"></i> &nbsp; MedDRA Low Level Terms <small class="muted">(LLTs)</small>', ['controller' => 'Meddras', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
        <li class="list-group-item list-group-item-info">
          <?php
            echo $this->Html->link('<i class="fa fa-upload" aria-hidden="true"></i> &nbsp; Upload MedDRA Low Level Terms <small class="muted">(LLTs)</small>', ['controller' => 'Meddras', 'action' => 'import', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); 
          ?>
        </li>
      </ul>
    </div>
  </div>
