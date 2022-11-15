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
  <?php
  echo $this->Form->create('Report', array('url' => array('controller' => 'reports', 'action' => 'landing')));
  ?>
  <table class="table table-condensed" style="margin-bottom: 2px;">
    <tbody>
      <tr>
        <td style="width: 70%;">
          <?php
          echo $this->Form->input(
            'vaccine_name',
            array(
              'div' => false, 'type' => 'text', 'class' => 'input-large vaccine_name', 'after' => '',
              'label' => array('class' => 'required', 'text' => ''), 'placeHolder' => 'Enter the name of the drug'
              // add a clear button

              ,'after' => '<a style="font-weight:normal" onclick="$(\'.vaccine_name\').val(\'\');" >
              <em class="accordion-toggle">clear!</em></a>',

            )
          );
          ?>
        </td>

        <td>
          <?php
          echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
            'class' => 'btn btn-primary', 'div' => 'control-group', 'div' => false,
            'style' => array('margin-bottom: 5px')
          ));
          ?>
        </td>
      </tr>
    </tbody>
  </table>


  <!-- check id session has results -->
  <?php if ($this->Session->check('results')) : ?>
    <?php
    $results = $this->Session->read('results');
    if ($results) { ?>
      <table class="table table-condensed" style="margin-bottom: 2px;">
        <tbody>
          <tr>
            <td style="width: 70%;">
              <?php echo  'There are ' . $count . ' reports with this active ingedient <b>' . $vaccine . ' </b>' ?>

            </td>
          </tr>
          <tr>
            <td>
              <h3>Reported Potential side effects</h3>
            </td>
          </tr>
          <!-- check if data is not empty  -->
          <?php if (!empty($data)) : ?>

            <?php foreach ($data as $key => $dt) : ?>
              <tr>
                <td>

                  <p style="text-align: left;"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><?php echo $key . '(' . $dt . ')' ?> </p>
                </td>

              </tr>
            <?php endforeach; ?>
            <!-- add esle statemet -->
          <?php else : ?>
            <tr>
              <td>
                <p style="text-align: left;">No data found</p>
              </td>
            </tr>

          <?php endif; ?>
        </tbody>
      </table>
    <?php } ?>

  <?php endif; ?>
  <hr>
</div>

<!-- add script to autocomplete the vaccine name -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".vaccine_name").autocomplete({
      source: "<?php echo $this->webroot; ?>drug_dictionaries/autocomplete",
      minLength: 2,
      select: function(event, ui) {
        //show a spinner or something via css
        $(this).addClass('loading');

        // set the value of the input to the selected value
        $(this).val(ui.item.value);

      }
    }); 

  });
</script>