<?php
    $this->assign('AEFI', 'active');
    // $this->Html->script('jquery.ui.core', array('inline' => false));
    // $this->Html->script('jquery.ui.widget', array('inline' => false));
    // $this->Html->script('jquery.ui.mouse', array('inline' => false));
    // $this->Html->script('jquery.ui.draggable', array('inline' => false));
    // $this->Html->script('jquery.ui.button', array('inline' => false));
    // $this->Html->script('jquery.ui.position', array('inline' => false));
    // $this->Html->script('jquery.ui.autocomplete', array('inline' => false));
    // $this->Html->script('jquery.ui.dialog', array('inline' => false));
    // $this->Html->script('widgets', array('inline' => false));
    $this->Html->script('aefi', array('inline' => false));
    $this->Html->css('jquery.datetimepicker', null, array('inline' => false));
    $this->Html->script('jquery/jquery.datetimepicker.full', array('inline' => false));
    // $this->AssetCompress->addScript(array(
    //      'jquery.ui.core.js', 'jquery.ui.widget.js', 'jquery.ui.mouse.js', 'jquery.ui.draggable.js', 'jquery.ui.button.js',
    //      'jquery.ui.position.js', 'jquery.ui.autocomplete.js', 'jquery.ui.dialog.js', 'widgets.js', 'aefi.js'), 'aefi-edit.js'
    // );
 ?>

      <!-- AEFI
    ================================================== -->
    <section id="aefisadd">
    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#" id="aefi_edit_tab1"><?php    echo 'Initial Report ID: '.$this->data['Aefi']['reference_no']; ?></a></li>
            <!-- <li id="aefi_edit_tab2">Follow up Reports()</li> -->
        </ul>

            <?php echo $this->element('aefi/aefi_edit');?>

        </div> <!-- /span -->
    </div> <!-- /row -->
</section> <!-- /row -->

<script type="text/javascript">
            var myarray = <?php echo json_encode($this->validationErrors); ?>;
            /*$(function() {
                if($(".alert-info:contains('saved')").length > 0) {
                    $('<div></div>').appendTo('body')
                      .html('<div> <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Report successfully saved. Please submit the report to PPB if you have completed it.</p></div>')
                      .dialog({
                          modal: true, title: 'message', zIndex: 10000, autoOpen: true,
                          width: 'auto', resizable: false,
                          buttons: {
                              "Submit to PPB": function () {
                                  // doFunctionForYes();
                                  $('#AefiEditForm').append($('<input type="text" id="submitReport" value="1" name="submitReport">'));
                                  $('#AefiEditForm').submit();
                                  // $('#AefiSaveChanges').trigger('click');
                                  $(this).dialog("close");
                              },
                              "Continue Editing": function () {
                                  // doFunctionForNo();
                                  $(".alert-info:contains('saved')").slideUp();
                                  $(this).dialog("close");
                              }
                          },
                          close: function (event, ui) {
                              $(this).remove();
                          }
                      });
                }
            });*/
        </script>
