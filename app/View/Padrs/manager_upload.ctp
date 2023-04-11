<?php
$this->assign('PADR', 'active');
echo $this->Session->flash();
?>

<div class="row-fluid">
    <div class="span6">
        <table class="table table-condensed" style="margin-bottom: 2px;">
            <tbody>
                <tr>
                    <td>
                        <?php
                        echo $this->Form->create('Padrs', array('type' => 'file'));
                        echo $this->Form->input('excel_file', array('type' => 'file')); 
                        echo $this->Form->button('<i class="fa fa-upload" aria-hidden="true"></i> Upload', array(
                            'name' => 'saveChanges',
                            'class' => 'btn btn-primary mapop',
                            'id' => 'PadrSaveChanges',
                            'onclick' => "return confirm('Are you sure you wish to upload the reports files?');",
                            'div' => false,
                        ));
                        echo $this->Form->end();
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>