<?php
  $this->Html->script('comments/meeting_dates', ['block' => 'scriptBottom']);
?>

<table id="committee-dates" class="table table-condensed table-bordered">
    <thead>
        <tr>
            <th width="30%">Meeting Date</th>
            <th>Day</th>
            <th width="20%">From</th>
            <th width="20%">To</th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>
      <?php if($prefix == 'manager' || $prefix == 'evaluator' || $prefix == 'admin') { ?>
        <tr>
            <form id="meeting-form" class="form-inline" enctype="multipart/form-data" method="post" action="/committee-dates/add">
                <td>
                    <div class="form-group">
                        <input type="text" class="datepickers" id="meeting-date" name="meeting_date" placeholder="DD-MM-YYYY">
                    </div>
                </td>
                <td></td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="start-time" name="start_time" placeholder="9:00 AM">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" id="end-time" name="end_time" placeholder="3:30 PM">
                    </div>
                </td>
                <td>
                    <button id="saveDate" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save</button>
                </td>
            </form>
        </tr>
        <?php } ?>
        <?php foreach($committee_dates as $committee_date) { ?>
            <tr>
                <td><?= $committee_date->meeting_date ?></td>
                <td><?= $committee_date->meeting_date->i18nFormat('eeee') ?></td>
                <td><?= $committee_date->start_time ?></td>
                <td><?= $committee_date->end_time ?></td>
                <td>
                    <?php                                        
                     if($prefix != 'applicant')   echo  $this->Form->postLink('<span class="label label-danger"> <i class="fa fa-minus"></i></span>', ['controller' => 'CommitteeDates', 'action' => 'delete', $committee_date->id, 'prefix' => false], ['escape' => false, 'class' => 'label-link', 'confirm' => __('Are you sure you want to delete date {0}?', $committee_date->meeting_date)]); 
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

  <nav aria-label="Page navigation">
      <ul class="pagination pagination-sm">
          <?= $this->Paginator->first('<< ' . __('first'), ['model' => 'CommitteeDates']) ?>
          <?= $this->Paginator->prev('< ' . __('previous'), ['model' => 'CommitteeDates']) ?>
          <?= $this->Paginator->numbers(['model' => 'CommitteeDates']) ?>
          <?= $this->Paginator->next(__('next') . ' >', ['model' => 'CommitteeDates']) ?>
          <?= $this->Paginator->last(__('last') . ' >>', ['model' => 'CommitteeDates']) ?>
      </ul>
      <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'CommitteeDates']) ?></small></h6>
  </nav>

<?= $this->fetch('scriptBottom') ?>