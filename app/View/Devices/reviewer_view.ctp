<?php
$this->assign('DEV', 'active');
?>

<!-- DEVICE
    ================================================== -->
<section id="devicesview">
    <ul class="nav nav-tabs">
        <?php if (isset($device['DeviceOriginal']['id']) && !empty($device['DeviceOriginal']['id'])) { ?> <li><a href="#formoriginal" data-toggle="tab">Original</a></li> <?php } ?>
        <li class="active"><a href="#formview" data-toggle="tab"><?php echo (!empty($device['Device']['reference_no'])) ? $device['Device']['reference_no'] : $device['Device']['id']; ?></a></li>
        <li><a href="#external_report_comments" data-toggle="tab">Feedback (<?php echo count((isset($device['DeviceOriginal']['id']) && !empty($device['DeviceOriginal']['id'])) ? $device['DeviceOriginal']['ExternalComment'] : $device['ExternalComment']); ?>)</a></li>

    </ul>

    <div class="tab-content">
        <?php if (isset($device['DeviceOriginal']['id']) && !empty($device['DeviceOriginal']['id'])) { ?>
            <div class="tab-pane" id="formoriginal">
                <div class="row-fluid">
                    <div class="span10">
                        <?php
                        $odevice = [];
                        foreach ($device['DeviceOriginal'] as $key => $value) {
                            if (is_array($value)) {
                                $odevice[$key] = $value;
                            } else {
                                $odevice['Device'][$key] = $value;
                            }
                        }
                        echo $this->element('device/device_view', ['device' => $odevice]);
                        ?>
                    </div>
                    <div class="span2">
                        <?php
                        echo $this->Html->link(
                            'Download PDF',
                            array('controller' => 'devices', 'action' => 'view', 'ext' => 'pdf', $device['DeviceOriginal']['id']),
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
                    <?php echo $this->element('device/device_view'); ?>
                </div>
                <div class="span2">
                    <?php
                    echo $this->Html->link(
                        'Download PDF',
                        array('controller' => 'devices', 'action' => 'view', 'ext' => 'pdf', $device['Device']['id']),
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
                        echo $this->element('comments/list', ['comments' => ((isset($device['DeviceOriginal']['id']) && !empty($device['DeviceOriginal']['id'])) ? $device['DeviceOriginal']['ExternalComment'] : $device['ExternalComment'])]);
                        ?>
                    </div>
                    <div class="span4 lefty">
                        <?php
                        $oid = ((isset($device['DeviceOriginal']['id']) && !empty($device['DeviceOriginal']['id'])) ? $device['DeviceOriginal']['id'] : $device['Device']['id']);
                        echo $this->element('comments/add', [
                            'model' => [
                                'model_id' => $oid, 'foreign_key' => $oid,
                                'model' => 'Device', 'category' => 'external', 'url' => 'report_feedback'
                            ]
                        ])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>