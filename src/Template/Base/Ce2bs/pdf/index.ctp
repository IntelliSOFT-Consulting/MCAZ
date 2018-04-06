<?php
  use Cake\Utility\Hash;
?>

<div class="row">
    <div class="col-xs-12">
      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      PHARMACOVIGILANCE AND CLINICAL TRIALS DIVISION</h3> 
      <div class="row">
        <div class="col-xs-12"><h5 class="text-center">COMPANY E2B SUMMARY REPORT</h5></div>
      </div>
    </div>
  </div>

 
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Reference Number</th>
                <th scope="col">Company Name</th>
                <th scope="col">E2B File</th> 
                <th scope="col">Comment</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $ce2b): ?>
            <tr>
                <td><?=  $ce2b->reference_number ?></td>
                <td><?=  $ce2b->company_name ?></td>
                <td><?= $ce2b->e2b_file ?></td>                
                <td><?= $ce2b->comment ?></td>                
            </tr>
              <?php foreach ($ce2b->reviews as $review): ?>
                <?php if($review->chosen == 1) { ?> 
                <tr>
                  <td colspan="2">
                    <p><b>Literature Review</b></p>
                    <?= $review->literature_review ?>
                  </td>
                  <td colspan="2">
                    <p><b>Comments</b></p>
                    <?= $review->comments ?>
                  </td>
                  <td colspan="2">
                    <p><b>References</b></p>
                    <?= $review->references_text ?>
                  </td>
                  <td colspan="2">
                    <p><b>Signatures</b></p>
                    <p><?php          
                        echo ($review->signature) ? "<img src='".$this->Url->build(substr($review->user->dir, 8) . '/' . $review->user->file, true)."' style='width: 30%;' alt=''>" : '';
                        ?>
                    </p>
                    <p>
                      <?php          
                        echo "<img src='".$this->Url->build(substr(Hash::combine($users->toArray(), '{n}.id', '{n}.dir')[$ce2b->assigned_by], 8) . '/' . Hash::combine($users->toArray(), '{n}.id', '{n}.file')[$ce2b->assigned_by], true)."' style='width: 30%;' alt=''>";
                      ?>                        
                    </p>
                  </td>
                </tr>
                <?php } ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
