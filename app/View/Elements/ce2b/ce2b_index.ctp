<?php
$this->assign('CE2B', 'active');
?>


<?php
echo $this->Session->flash();
// debug($this->request->query);
?>
<div class="row-fluid">
    <div class="span12">
        <?php
        if ($redir == 'reporter') {
            echo $this->Html->link(
                '<i class="fa fa-file-o" aria-hidden="true"></i> New Ce2b',
                array('controller' => 'ce2bs', 'action' => 'add'),
                array('escape' => false, 'class' => 'btn btn-success')
            );
        }
        ?>
        <h3>Ce2b Reports:<small> <i class="icon-glass"></i> Filter, <i class="icon-search"></i> Search, and <i class="icon-eye-open"></i> view reports</small>
           
        </h3>
        <hr class="soften" style="margin: 7px 0px;">
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <?php
        echo $this->Form->create('Ce2b', array(
            'url' => array_merge(array('action' => 'index'), $this->params['pass']),
            'class' => 'ctr-groups', 'style' => array('padding:9px;', 'background-color: #F5F5F5'),
        ));
        ?>
        <table class="table table-condensed" style="margin-bottom: 2px;">
            <tbody>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->input(
                            'reference_no',
                            array(
                                'div' => false,
                                'placeholder' => 'e2b/2023',
                                'class' => 'span12', 'label' => array('class' => 'required', 'text' => 'Reference No.')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input(
                            'company_name',
                            array(
                                'div' => false, 'placeholder' => '',
                                'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Company Name ')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input(
                            'reporter_email',
                            array(
                                'div' => false, 'placeholder' => '',
                                'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Reporter Email ')
                            )
                        );
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input(
                            'start_date',
                            array(
                                'div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index', 'after' => '-to-',
                                'label' => array('class' => 'required', 'text' => 'Report Dates'), 'placeHolder' => 'Start Date'
                            )
                        );
                        echo $this->Form->input(
                            'end_date',
                            array(
                                'div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index',
                                'after' => '<a style="font-weight:normal" onclick="$(\'.unauthorized_index\').val(\'\');" >
                              <em class="accordion-toggle">clear!</em></a>',
                                'label' => false, 'placeHolder' => 'End Date'
                            )
                        );
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="PadrPages" class="required">Pages</label></td>
                    <td>
                        <?php
                        echo $this->Form->input('pages', array(
                            'type' => 'select', 'div' => false, 'class' => 'input-small', 'selected' => $this->request->params['paging']['Ce2b']['limit'],
                            'empty' => true,
                            'options' => $page_options,
                            'label' => false,
                        ));
                        ?>
                    </td>
                    <td>
                        <?php

                        ?>
                    </td>
                    <td></td>
                    <td>
                        <?php
                        echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                            'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
                            'formnovalidate' => 'formnovalidate',
                            'style' => array('margin-bottom: 5px')
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'index'), array('class' => 'btn', 'escape' => false, 'style' => array('margin-bottom: 5px')));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel', array('action' => 'index', 'ext' => 'csv', '?' => $this->request->query), array('class' => 'btn btn-success', 'escape' => false));
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
                showing <span class="badge">{:current}</span> Ce2bs out of
                <span class="badge badge-inverse">{:count}</span> total, starting on record <span class="badge">{:start}</span>,
                ending on <span class="badge">{:end}</span>')
            ));
            ?>
        </p>
        <?php echo $this->Form->end(); ?>

        <div class="pagination">
            <ul>
                <?php
                echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'currentTag' => 'a', 'escape' => false));
                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'disabledTag' => 'a', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
                ?>
            </ul>
        </div>

        <table class="table  table-bordered table-striped">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('reference_no'); ?></th>
                    <th><?php echo $this->Paginator->sort('company_name'); ?></th>
                    <th><?php echo $this->Paginator->sort('reporter_email'); ?></th>
                    <th><?php echo $this->Paginator->sort('e2b_file'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ce2bs as $ce2b) : ?>
                    <tr class="">
                        <td><?php echo h($ce2b['Ce2b']['id']); ?>&nbsp;</td>
                        <td>
                            <?php
                            echo $this->Html->link($ce2b['Ce2b']['reference_no'], array('action' => 'view', $ce2b['Ce2b']['id']), array('escape' => false));
                            ?>&nbsp;</td>
                        <td><?php echo h($ce2b['Ce2b']['company_name']); ?>&nbsp;</td>
                        <td><?php echo h($ce2b['Ce2b']['reporter_email']); ?>&nbsp;</td>
                        <td></td>
                        <td><?php echo h($ce2b['Ce2b']['created']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php
                            if ($ce2b['Ce2b']['submitted'] > 1) {
                                echo $this->Html->link(
                                    '<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                                    array('controller' => 'ce2bs', 'action' => 'view', $ce2b['Ce2b']['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                               
                                if ($redir == 'manager') echo $this->Html->link(
                                    '<span class="label label-warning tooltipper" title="Send to vigiflow"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Vigiflow </span>',
                                    array('controller' => 'ce2bs', 'action' => 'vigiflow', $ce2b['Ce2b']['id'], 'manager' => false),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (($redir == 'manager' || $redir == 'reviewer') && $ce2b['Ce2b']['copied'] == 2) echo $this->Html->link(
                                    '<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                    array('controller' => 'ce2bs', 'action' => 'edit', $ce2b['Ce2b']['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if (($redir == 'manager' || $redir == 'reviewer') && $ce2b['Ce2b']['copied'] == 0) echo $this->Form->postLink('<span class="badge badge-success tooltipper" data-toggle="tooltip" title="Copy & Edit"> <i class="fa fa-copy" aria-hidden="true"></i> Copy </span>', array('controller' => 'ce2bs', 'action' => 'copy', $ce2b['Ce2b']['id']), array('escape' => false), __('Create a clean copy to edit?'));
                            } else {
                                if ($redir == 'reporter') echo $this->Html->link(
                                    '<span class="label label-success tooltipper" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </span>',
                                    array('controller' => 'ce2bs', 'action' => 'edit', $ce2b['Ce2b']['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if ($redir == 'reporter') echo $this->Html->link(
                                    '<span class="label label-warning tooltipper" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </span>',
                                    array('controller' => 'ce2bs', 'action' => 'delete', $ce2b['Ce2b']['id']),
                                    array('escape' => false)
                                );
                                echo "&nbsp;";
                                if ($redir == 'manager' || $redir == 'reviewer') echo $this->Html->link(
                                    '<span class="label label-info tooltipper" title="View"><i class="fa fa-eye" aria-hidden="true"></i> View </span>',
                                    array('controller' => 'ce2bs', 'action' => 'view', $ce2b['Ce2b']['id']),
                                    array('escape' => false)
                                );
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">
    $(function() {
        var adates = $('#Ce2bStartDate, #Ce2bEndDate').datepicker({
            minDate: "-100Y",
            maxDate: "-0D",
            dateFormat: 'dd-mm-yy',
            format: 'dd-mm-yy',
            endDate: '-0d',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            showAnim: 'show',
            onSelect: function(selectedDate) {
                var option = this.id == "PadrStartDate" ? "minDate" : "maxDate",
                    instance = $(this).data("datepicker"),
                    date = $.datepicker.parseDate(
                        instance.settings.dateFormat ||
                        $.datepicker._defaults.dateFormat,
                        selectedDate, instance.settings);
                adates.not(this).datepicker("option", option, date);
            }
        });

    });
</script>