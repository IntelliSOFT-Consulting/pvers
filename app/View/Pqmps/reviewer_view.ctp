<?php
$this->assign('PQHPT', 'active');
?>

<!-- PQHPT
    ================================================== -->
<section id="pqmpsview">
    <ul class="nav nav-tabs">
        <?php if (isset($pqmp['PqmpOriginal']['id']) && !empty($pqmp['PqmpOriginal']['id'])) { ?> <li><a href="#formoriginal" data-toggle="tab">Original</a></li> <?php } ?>
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo (!empty($pqmp['Pqmp']['reference_no'])) ? $pqmp['Pqmp']['reference_no'] : $pqmp['Pqmp']['id']; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count((isset($pqmp['PqmpOriginal']['id']) && !empty($pqmp['PqmpOriginal']['id'])) ? $pqmp['PqmpOriginal']['ExternalComment'] : $pqmp['ExternalComment']); ?>)</a></li>

    </ul>

    <div class="tab-content">
        <?php if (isset($pqmp['PqmpOriginal']['id']) && !empty($pqmp['PqmpOriginal']['id'])) { ?>
            <div class="tab-pane" id="formoriginal">
                <div class="row-fluid">
                    <div class="span10">
                        <?php
                        $opqmp = [];
                        foreach ($pqmp['PqmpOriginal'] as $key => $value) {
                            if (is_array($value)) {
                                $opqmp[$key] = $value;
                            } else {
                                $opqmp['Pqmp'][$key] = $value;
                            }
                        }
                        echo $this->element('pqmp/pqmp_view', ['pqmp' => $opqmp]);
                        ?>
                    </div>
                    <div class="span2">
                        <?php
                        echo $this->Html->link(
                            'Download PDF',
                            array('controller' => 'pqmps', 'action' => 'view', 'ext' => 'pdf', $pqmp['PqmpOriginal']['id']),
                            array(
                                'class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',
                                'data-content' => 'Download the pdf version of the report',
                            )
                        );
                        ?>
                        <hr>

                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="tab-pane active" id="formview">
            <div class="row-fluid">
                <div class="span10">
                    <?php echo $this->element('pqmp/pqmp_view'); ?>
                </div>
                <div class="span2">
                    <?php
                    echo $this->Html->link(
                        'Download PDF',
                        array('controller' => 'pqmps', 'action' => 'view', 'ext' => 'pdf', $pqmp['Pqmp']['id']),
                        array(
                            'class' => 'btn btn-primary btn-block mapop', 'title' => 'Download PDF',
                            'data-content' => 'Download the pdf version of the report',
                        )
                    );
                    ?>
                    <hr>

                </div>
            </div>
        </div>
        <div class="tab-pane" id="external_report_comments">
            <!-- 12600 Letters debat -->
            <div class="amend-form">
                <h5 class="text-info"><u>FEEDBACK</u></h5>
                <div class="row-fluid">
                    <div class="span8">
                        <?php
                        echo $this->element('comments/list', ['comments' => ((isset($pqmp['PqmpOriginal']['id']) && !empty($pqmp['PqmpOriginal']['id'])) ? $pqmp['PqmpOriginal']['ExternalComment'] : $pqmp['ExternalComment'])]);
                        ?>
                    </div>
                    <div class="span4 lefty">
                        <?php
                        $oid = ((isset($pqmp['PqmpOriginal']['id']) && !empty($pqmp['PqmpOriginal']['id'])) ? $pqmp['PqmpOriginal']['id'] : $pqmp['Pqmp']['id']);
                        echo $this->element('comments/add', [
                            'model' => [
                                'model_id' => $oid, 'foreign_key' => $oid,
                                'model' => 'Pqmp', 'category' => 'external', 'url' => 'report_feedback'
                            ]
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>