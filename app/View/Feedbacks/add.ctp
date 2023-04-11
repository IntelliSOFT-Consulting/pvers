<?php
	$this->assign('ContactUs', 'active');
?>

<div class="row-fluid">
	<div class="span12">
		<h3>Contact us <small>:PPB will get back to you using the provided email address.</small> </h3>
		<hr>
	<?php
		echo $this->Session->flash();

		echo $this->Form->create('Feedback', array(
			'class' => 'form-horizontal',
			 'inputDefaults' => array(
				'div' => array('class' => 'control-group'),
				'label' => array('class' => 'control-label'),
				'between' => '<div class="controls">',
				'after' => '</div>',
				'class' => '',
				'format' => array('before', 'label', 'between', 'input', 'after','error'),
				'error' => array('attributes' => array('class' => 'controls help-block')),
			 ),
		));
	?>



	<div class="row-fluid">
		<div class="span6">
		<?php
			// echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $this->Session->Auth('')));
			echo $this->Form->input('email',
				array('label' => array('class' => 'control-label required', 'text' => 'Email <span class="sterix">*</span>'),
					'type' => 'email', 'value' => $this->Session->read('Auth.User.email')));
			echo $this->Form->input('subject',
				array('label' => array('class' => 'control-label required', 'text' => 'Subject <span class="sterix">*</span>'),));
			echo $this->Form->input('feedback',
				array('label' => array('class' => 'control-label required', 'text' => 'Feedback <span class="sterix">*</span>'),
					'class' => 'input-large',));
			// echo $this->Form->input('feedback');

		?>

		<?php
			echo $this->Form->input('bot_stop', array(
									'div' => array('style' => 'display:none')
								));
			echo $this->Captcha->input('Feedback', array('label' => false, 'type' => 'number'));
			echo $this->Form->end(array(
				'label' => 'Submit',
				'value' => 'Save',
				'class' => 'btn btn-primary',
				'id' => 'ApplicationSaveChanges',
				'div' => array(
					'class' => 'form-actions',
				)
			));
		?>
		</div><!--/span-->
		<div class="span6">
			<div style="margin-left: 20px;">
			   <?php  if(count($previous_messages) > 0) { ?>
			   	<h4 style="text-decoration: underline;">My Previous Comments</h4>
			   	   <dl>
			   		<?php
			   			$count = 1;
			   			foreach ($previous_messages as $previous_message) {
			   				echo "<dt>".$count.". ".$previous_message['Feedback']['subject']." <small class='muted'> created on ".date('d-m-Y H:i:s', strtotime($previous_message['Feedback']['created']))."</small></dt>";
			   				echo "<dd class='morecontent'>".$previous_message['Feedback']['feedback']."</dd>";
			   				$count++;
			   			}
			   		?>
			   	   </dl>
			          <div class="pagination pull-right">
			            <ul>
			            <?php
			              echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
			              echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));
			              echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
			            ?>
			            </ul>
			          </div>
			   <?php } ?>
			 </div>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>

	</div>
</div>
<div class="row-fluid">
	<div class="blank_contact"></div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
jQuery('.creload').on('click', function() {
    var mySrc = $(this).prev().attr('src');
    var glue = '?';
    if(mySrc.indexOf('?')!=-1)  {
        glue = '&';
    }
    $(this).prev().attr('src', mySrc + glue + new Date().getTime());
    return false;
});
</script>
