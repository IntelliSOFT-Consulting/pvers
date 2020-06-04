<?php
  $this->assign('Content', 'active');
  $this->Html->script('ckeditor/ckeditor', array('inline' => false));
  $this->Html->script('ckeditor/adapters/jquery', array('inline' => false));
?>
<div class="row-fluid">
<?php echo $this->Form->create('Message', array(
          'type' => 'file',
          'class' => 'form-horizontal',
          'inputDefaults' => array(
            'div' => array('class' => 'control-group'),
            'label' => array('class' => 'control-label'),
            'between' => '<div class="controls">',
            'after' => '</div>',
            'class' => '',
            'format' => array('before', 'label', 'between', 'input', 'after','error'),
            'error' => array('attributes' => array( 'class' => 'controls help-block')),
           ),
        ));
    echo $this->Form->input('id'); ?>
	<fieldset>
		<legend>Edit <strong><?php echo $this->Form->value('Message.name');?></strong></legend>
	<?php
		echo $this->Form->input('id');
		// echo $this->Form->input('content');
		echo $this->Form->input('subject');
      	echo $this->Form->input('style',
            array('type' => 'select', 'empty' => true,
              'options' =>  array('info' => 'Blue', 'success' => 'Green', 'error' => 'Red', 'warning' => 'Orange'), 
              'label' => array('class' => 'control-label', 'text' => 'Notification Style')));
		echo $this->Form->input('content', array(
              'label' => array('class' => 'control-label required', 'text' => 'Content <span class="sterix">*</span>'),
              'between'=>'<div class="controls">', 'placeholder' => 'study title' , 'class' => 'input-large',
            ));
		echo $this->Form->input('type');
		echo $this->Form->input('description', array('class' => 'input-xlarge'));
	?>
	</fieldset>
<?php echo  $this->Form->end(array(
			'label' => 'Save',
			'value' => 'Save',
			'class' => 'btn btn-primary',
			'div' => array(
				'class' => 'form-actions',
			)
		));
		?>

<script type="text/javascript">
	CKEDITOR.replace( 'data[Message][content]');
</script>
</div>
