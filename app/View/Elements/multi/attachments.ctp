	<div class="row-fluid">
		<div class="span12">
			<?php 
				// pr($this->request->data);
				// pr($this->validationErrors);
			?>
			<h4>Do you have files that you would like to attach? click on the button to add them: 
				<button type="button" class="btn-mini" id="addAttachment" title="click to add row"><i class="icon-plus"></i></button>
			</h4>
			<p class="muted">Files may include pictures, scanned documents, pdf, word documents<p>
		    <table id="buildattachmentsform"  class="table table-bordered  table-condensed table-pvborder">
				<thead>
				  <tr id="attachmentsTableHeader">
					<th>#</th>
					<th style="width : 30%;" class="required"><label class="required">FILE</label></th>
					<th class="required"><label class="required">A DESCRIPTION OF THE CONTENTS</label></th>
					<th>
												
					</th>
				  </tr>
				</thead>
				<tbody>
				  
				<?php 
					if (!empty($this->request->data['Attachment'])) {
						for ($i = 0; $i <= count($this->request->data['Attachment'])-1; $i++) {
				?>
				  <tr>
					<td><?php echo $i+1; ?></td>
					<td><?php 
							echo $this->Form->input('Attachment.'.$i.'.id');  
							if (!empty($this->request->data['Attachment'][$i]['id'])) {
								echo $this->Html->link(__($this->request->data['Attachment'][$i]['basename']), 
									array('controller' => 'attachments', 'action' => 'download', $this->request->data['Attachment'][$i]['id']),
									array('class' => 'btn btn-info')
									);
								// echo $this->Form->input('Attachment.'.$i.'.filename', array('type' => 'hidden'));
							} else {
								echo $this->Form->input('Attachment.'.$i.'.file', array(
									'label' => false, 'between' => false, 'after' => false, 'class' => 'span12 autosave-ignore input-file',
									'error' => array('escape' => false, 'attributes' => array( 'class' => 'help-block')),
									'type' => 'file',
								));
							}
						?>
					</td>
					<td>
						<?php 
							if (!empty($this->request->data['Attachment'][$i]['id'])) {
								echo $this->request->data['Attachment'][$i]['description'];
								echo $this->Form->input('Attachment.'.$i.'.description', array('type' => 'hidden'));
							} else {
								echo $this->Form->input('Attachment.'.$i.'.description', array(
									'label' => false, 'between' => false, 'rows' => '1', 'after' => false, 'class' => 'span11 autosave-ignore',));
							}
						?>
					</td>					
					<td>
						<?php
							echo $this->Form->input('Attachment.'.$i.'.filesize', array('type' => 'hidden'));
							echo $this->Form->input('Attachment.'.$i.'.basename', array('type' => 'hidden'));
							echo $this->Form->input('Attachment.'.$i.'.checksum', array('type' => 'hidden'));
						?>
						<button  type="button" class="btn-mini removeATr" title="click here to delete row" 
									id="<?php if (isset($this->request->data['Attachment'][$i]['id'])) { echo $this->request->data['Attachment'][$i]['id']; } ?>" >
							<i class="icon-minus"></i>
						</button>
					</td>
				  </tr>
				  <?php } } ; ?>

				</tbody>
		  </table>
		</div><!--/span-->
	</div><!--/row-->
	<hr>