<?php
$this->assign('CMS', 'active');
?>

<!-- CMS
    ================================================== -->
<h3>Content Management System <small>(AUTO DRUGS)</small></h3>
<p>Search for the content that you wish to modify and change accordingly.</p>
<hr>
<div class="row-fluid" style="margin-bottom: 9px;">
    <div class="span2 columns">
        <div class="row-fluid">
            <div class="span12">
                <?php echo $this->element('admin/contentmenu') ?>

            </div>
            <!--/span-->
        </div>
        <!--/row-->
    </div> <!-- /span5 -->

    <div class="span10 columns">
        <?php
        echo $this->Form->create('AutoDrug', array(
            'url' => array_merge(array('action' => 'admin_index', 'admin' => true), $this->params['pass']),
            'class' => 'well',
        ));
        ?>
        <div class="row-fluid">
            <div class="span2 columns">
                <?php
                echo $this->Html->link('Sync Drugs', array('controller' => 'auto_drugs', 'action' => 'add', 'admin' => true), array('class' => 'btn btn-info'));
                ?>
            </div>
            <div class="span3 columns">
                <?php
                echo $this->Form->input('id', array('div' => false, 'class' => 'span10', 'type' => 'text', 'label' => array('class' => 'required', 'text' => 'WHO Med Product Id')));
                ?>
            </div>
            <div class="span3 columns">
                <?php
                echo $this->Form->input('drug_name', array('div' => false, 'class' => 'span10', 'label' => array('class' => 'required', 'text' => 'Drug Name')));
                ?>
            </div>
            <div class="span4 columns">
                <p class="muted">Search on any field.</p>
                <?php
                // echo $this->Form->submit(__('Search', true), array('div' => 'control-group', 'class' => 'btn btn-inverse'));
                echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                    'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
                ));
                echo $this->Form->end();
                ?>
            </div>
        </div>

        <div class="row-fluid">

            <?php
            if (count($autoDrugs) >  0) { ?>
                <p>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>, 
										showing <span class="badge">{:current}</span> drugs out of 
										<span class="badge badge-inverse">{:count}</span> total, starting on record <span class="badge">{:start}</span>, 
										ending on <span class="badge">{:end}</span>')
                    ));
                    ?>
                </p>
                <div class="pagination">
                    <ul>
                        <?php
                        echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));
                        echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
                        ?>
                    </ul>
                </div>
                <hr>
                <table class="table table-striped">
                    <thead>

                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('drugName'); ?></th>
                        <th><?php echo $this->Paginator->sort('drugCode'); ?></th>
                        <th><?php echo $this->Paginator->sort('isGeneric'); ?></th>
                        <th><?php echo $this->Paginator->sort('isPreferred'); ?></th>
                        <th><?php echo $this->Paginator->sort('countryOfSales'); ?></th>
                        <th><?php echo $this->Paginator->sort('activeIngredients'); ?></th>
                        <th><?php echo $this->Paginator->sort('atcs'); ?></th> 
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </thead>
                    <tbody>
                        <?php
                        $counder = ($this->request->paging['AutoDrug']['page'] - 1) * $this->request->paging['AutoDrug']['limit'];
                        foreach ($autoDrugs as $autoDrug) : ?>
                            <tr>
                            <td><p class="tablenums"><?php $counder++; echo $counder;?>.</p></td>
                                <td><?php echo h($autoDrug['AutoDrug']['drugName']); ?>&nbsp;</td>
                                <td><?php echo h($autoDrug['AutoDrug']['drugCode']); ?>&nbsp;</td>
                                <td><?php echo h($autoDrug['AutoDrug']['isGeneric'])?'Y':'N'; ?>&nbsp;</td>
                                <td><?php echo h($autoDrug['AutoDrug']['isPreferred'])?'Y':'N'; ?>&nbsp;</td>
                                <td><?php echo h($autoDrug['AutoDrug']['countryOfSales']); ?>&nbsp;</td>
                                <td><?php echo h($autoDrug['AutoDrug']['activeIngredients']); ?>&nbsp;</td>
                                <td><?php echo h($autoDrug['AutoDrug']['atcs']); ?>&nbsp;</td> 
                                <td>
									<?php echo $this->Html->link('<span class="label label-info"><i class="icon-pencil icon-white"></i> Edit</span>' , 
											array('controller' => 'auto_drugs', 'action' => 'edit', $autoDrug['AutoDrug']['id']), array('escape' => false)); ?>&nbsp;
									<?php echo $this->Form->postLink(__('<span class="label label-important"><i class="icon-trash icon-white"></i> Delete</span>'), 
											array('action' => 'delete', $autoDrug['AutoDrug']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $autoDrug['AutoDrug']['id'])); ?>&nbsp;
								</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>There were no reports that met your search criteria.</p>
            <?php } ?>
        </div> <!-- /row-fluid -->
    </div> <!-- /span6 -->

</div> <!-- /row-fluid -->