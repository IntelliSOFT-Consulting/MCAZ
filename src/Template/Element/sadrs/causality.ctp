  <div class="row">
    <div class="col-xs-12">
      <!-- <p>insert causality assessment table here... collapsible. Collapsed by default</p> -->
      <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
         Causality Assessment Rules
      </a>
      <div class="collapse" id="collapseExample">
        <div class="well">
          <h3>WHO Causality classification of Adverse Events<br>
              (AE) definitions categories used by MCAZ and PVCT Committee
              </h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Causality Classification</th>
                <th>WHO Causality classification of Adverse Events <br>
                   (AE) definitions categories used by MCAZ and PVCT Committee
                </th>
                <th>DAIDS Investigator causality classification of <br>
                    (AE) definition categories commonly used for clinical trials
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Certain </td>
                <td>Event or laboratory test abnormality, with plausible time
relationship to drug intake
• Cannot be explained by disease or other drugs
• Response to withdrawal plausible (pharmacologically,
pathologically)
• Event definitive pharmacologically or phenomenologically (i.e. an
objective and specific medical disorder or a recognised
pharmacological phenomenon)
• Rechallenge satisfactory, if necessary</td>
                <td>Definitely Related: the exposure to the study 
agent and adverse event are related in time, and a 
direct association can be demonstrated (e.g. the 
adverse experience has been identified as a 
known toxicity of the study agent product, and 
the study agent is clearly responsible for the 
event.          </td>
</tr>
<tr><td>
Probable/
Likely</td><td>
Event or laboratory test abnormality, with reasonable time
relationship to drug intake
• Unlikely to be attributed to disease or other drugs
• Response to withdrawal clinically reasonable
• Rechallenge not required</td><td>
Probably related: The administration the study 
agent/procedures & adverse event are considered 
reasonably related in time and the event is more 
likely explained by the study agent than other 
causes.</td>
</tr>
<tr><td>
Possible</td><td>
Event or laboratory test abnormality, with reasonable time
relationship to drug intake
• Could also be explained by disease or other drugs
• Information on drug withdrawal may be lacking or unclear</td><td>
Possibly related: The adverse event and the administration of the study agent/procedures are reasonably related in time, and the adverse event can be explained equally well by causes other than the study agent/procedures.
</td>
</tr>
<tr><td>
Unlikely</td><td>
Event or laboratory test abnormality, with a time to drug intake
that makes a relationship improbable (but not impossible)
• Disease or other drugs provide plausible explanations</td><td>
Probably not related: A potential relationship between the study agent/procedures and the adverse event could exist (i.e. the possibility cannot be excluded) but the adverse event is most likely explained by causes other than the study agent/procedures.
</td>
</tr>
<tr><td>
Conditional/
Unclassified</td><td>
Event or laboratory test abnormality
• More data for proper assessment needed, or
• Additional data under examination</td><td>
Not related: The adverse event is clearly explained by another cause not related to the study agent/procedures.
</td></tr>
<tr><td>
Unassessable/
Unclassifiable</td><td>
Report suggesting an adverse reaction
• Cannot be judged because information is insufficient or
contradictory
• Data cannot be supplemented or verified</td><td>
Pending:
*May be used as a temporary assessment only for death
*Used only if data necessary to determine the relationship to study agent/procedures is being collected
*A final assessment of relationship should be 
within 3 business days after reporting the death
*If no final assessment is made within 3 business days by site, event will be assesses as possibly related to study agent/procedures
*Any additional information received at a later 
time including an autopsy (post-mortem) report
should be submitted as follow up report</td></tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <div class="col-xs-12">
      <?php
      if(!empty($sadr['reviews'])) {
        foreach ($sadr['reviews'] as $review) {
          echo "<p class='text-center'><u> Reviewed by : ".$users->toArray()[$review['user_id']]." on ".$review['created']."</u></p>";
          echo "<h4 class='text-center'>Literature Review</h4><p class='text-center'>".$review['literature_review']."</p>";
          echo "<h4 class='text-center'>Comments</h4><p class='text-center'>".$review['comments']."</p>";
          echo "<h4 class='text-center'>Reference Text</h4><p class='text-center'>".$review['references_text']."</p>";
        }
      }
      ?>
    </div>

    <div class="col-xs-12">
      <hr>
          <?php echo $this->Form->create($sadr, ['url' => ['action' => 'causality']]);
                // $i = count($sadr['reviews']);
           ?>
            <div class="row">
              <div class="col-xs-12"><h5 class="text-center">Causality Assessment</h5></div>
              <div class="col-xs-12">
	          	<?php
                    echo $this->Form->control('sadr_pr_id', ['type' => 'hidden', 'value' => $sadr->id, 'escape' => false, 'templates' => 'table_form']);
	                  echo $this->Form->control('reviews.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                    echo $this->Form->control('reviews.100.literature_review', ['escape' => false, 'templates' => 'app_form']);
                    echo $this->Form->control('reviews.100.comments', ['escape' => false, 'templates' => 'app_form']);
                    echo $this->Form->control('reviews.100.references_text', ['escape' => false, 'templates' => 'app_form']);
	            ?>
         	    </div>          
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8"> 
                  <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-plus" aria-hidden="true"></i> Review</button>
                </div> 
              </div>
         <?php echo $this->Form->end() ?>
    </div>
  </div>