<?php
$this->assign('Summaries', 'active');
$this->Html->script('bootstrap/bootstrap-carousel', array('inline' => false));
$this->Html->script('home', array('inline' => false));
$this->Html->script('holder/holder', array('inline' => false));
$this->Html->css('landing', false, array('inline' => false));
$this->Html->css('upgrade', false, array('inline' => false));
?>
<hr>

<div class="container marketing">
    <hr>
    <h4 style="text-align: left;">Data Privacy</h4><br>
    <hr>
    <div class="row-fluid">
        <div class="span10">
            <p>
                Due to strict data protection laws and agreements between WHO
                PIDM members and the WHO, individual case safety reports cannot
                be viewed in PvERS. For those same reasons, PvERS
                groups the search results both by active ingredient and
                geographically by county region, so you will not be able to
                retrieve data for specific brand names nor for individual WHO
                PIDM members. For more detailed questions about the data, please
                contact your national regulatory authority.</p>
        </div>
    </div>

    <h4 style="text-align: left;">Important points to consider</h4><br>
    <hr>
    <div class="row-fluid">
        <div class="span10">
            <p> PVers is intended as a useful starting point for people who
                wish to understand more about the types of potential side effects
                that have been reported following the use of medicinal
                products. However, PVers cannot be used to infer any
                confirmed link between a suspected side effect and any specific
                medicine. See the </p>

            <ol>
                <li> The information on this website relates to side effects;
                    that is, symptoms and other circumstances that have been observed
                    following the use of a medicinal product, but which may or may not be
                    related to or caused by that product.
                </li>
                <li>
                    Information in PvERS on potential side effects should not be
                    interpreted as meaning that the medicinal product or its active
                    substance either caused the observed effect or is unsafe to
                    use. Confirming a causal link is a complex process that requires a
                    thorough scientific assessment and detailed evaluation of all
                    available data. The information on this website, therefore, does not
                    reflect any confirmed link between a medicinal product and a side
                    effect.
                </li>
            </ol>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span10">
            <!-- Add a horizontal form with checkbox and button -->

            <p> To access the search function, you must confirm that you have read and
                understood the above statements.</p>
            <?php
            echo $this->Form->create('Report', array('url' => array('controller' => 'reports', 'action' => 'index')));
            echo $this->Form->input('agree', array(
                'type' => 'checkbox',  'class' => false, 'hiddenField' => false,
                'label' => array('class' => 'control-label', 'text' => 'I confirm that I have read and understood the above statements'),
                'between' => '<div class="controls">',
                'after' => '.</label> </div>',
                // add name and id to the input
                'name' => 'agree', 'id' => 'agree',

            ));
            ?>

            <?php echo $this->Form->end(array(
                'label' => 'Search Database',
                'value' => 'Save',
                'class' => 'btn btn-primary',
                'id' => 'submit',
                'div' => array(
                    'class' => 'form-actions',
                ),
                // disable the submit button
                'disabled' => true


            )); ?>
            <hr>
          

        </div>
    </div>
</div>

<!-- create a script to enabled the button id the checkbox is checked -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#agree').click(function() {
            if ($(this).is(':checked')) {
                $('#submit').removeAttr('disabled');
                // change button color to green
                $('#submit').removeClass('btn-primary');
                $('#submit').addClass('btn-success');
            } else {
                $('#submit').attr('disabled', 'disabled');
                // change button color to gray
                $('#submit').removeClass('btn-success');
                $('#submit').addClass('btn-primary');

            }
        });
    });
</script>