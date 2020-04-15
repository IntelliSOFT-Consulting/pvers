<?php
	$this->assign('Dashboard', 'active');
?>
<!-- Using Javascript w/ Bootstrap
      ================================================== -->
        <div class="page-header">
          <h1>Dashboard <small>Administrative utilities</small></h1>
        </div>
      <div class="row-fluid">
		<div class="span4">
			<h3> <?php // echo $this->Html->link('Reports', array('controller' => 'pages', 'action' => 'reports', 'admin' => true )); ?> </h3>
			<h3><a href="#"><i class="icon-book"></i> Reports</a></h3>
			<p>View submitted reports, Export report data to E2B format, </p>
			<ul class="nav nav-tabs nav-stacked">
				<li>
				<?php
					echo $this->Html->link('<i class="icon-hand-right"></i> SADR Reports <span class="badge badge-success">'.$count_sadrs.'</span><small class="muted"> - unprocessed</small>',
						array('controller' => 'sadrs', 'action' => 'index', 'submitted'=>'2', 'admin' => true),
						array('escape' => false));
				?>
				</li>
				<li>
				<?php
					echo $this->Html->link('<i class="icon-hand-right"></i> SADR Follow UP Reports',
						array('controller' => 'sadr_followups', 'action' => 'index', 'submitted'=>'2', 'admin' => true),
						array('escape' => false));
				?>
				</li>
				<li>
				<?php
					echo $this->Html->link('<i class="icon-hand-right"></i> PQMP Reports <span class="badge badge-success">'.$count_pqmps.'</span><small class="muted"> - last 3 days</small>',
						array('controller' => 'pqmps', 'action' => 'index', 'admin' => true),
						array('escape' => false));
				?>
				</li>
				<li>
				<?php
					echo $this->Html->link('<i class="icon-hand-right"></i> FILE ATTACHMENTS',
						array('controller' => 'attachments', 'action' => 'index', 'admin' => true),
						array('escape' => false));
				?>
				</li>
			</ul> <hr>
			<h3><i class="icon-comment"></i> <a href="/admin/feedbacks">Latest Feedback <?php echo '<span class="badge badge-success">'.$count_feedbacks.'</span><small class="muted"> - last 3 days</small>';?></a></h3>
			<ol><?php
				 foreach($feedbacks as $feedback) {
					echo '<li>'.$feedback.'</li>';
				 } ?>
			</ol>
			<h4>&nbsp;&nbsp;<?php echo $this->Html->link('<i class="icon-forward"></i> View Entire Feedback', array('controller'=>'feedbacks', 'action'=>'index', 'admin' => true, 'plugin'=>false),
						array('escape' => false)); ?></h4> <br>
			<hr>
			<h3><a href="http://www.google.com/analytics/" target="_blank"><i class="icon-globe"></i> Google Analytics</a></h3>

		</div>
       <div class="span4">
			<h3><a href="#"><i class="icon-user"></i> User Management</a></h3>
            <p>Manage administrative as well as registered users.</p>
			<ul class="nav nav-tabs nav-stacked">
			  <li>
				<?php echo $this->Html->link('<i class="icon-user"></i> Users',
							array('controller' => 'users', 'action' => 'index', 'admin' => true),
							array('escape' => false)); ?>
			  </li>
			  <li>
				<?php echo $this->Html->link('<i class="icon-hand-right"></i> Groups',
							array('controller' => 'groups', 'action' => 'index', 'admin' => true),
							array('escape' => false)); ?>
			  </li>
			  <li>
				<?php echo $this->Html->link('<i class="icon-hand-right"></i> User Roles', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'users', 'admin' => true ),
					array('escape' => false)); ?>
			  </li>
			  <li>
				<?php echo $this->Html->link('<i class="icon-hand-right"></i> Roles Permissions', array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'ajax_role_permissions', 'admin' => true ),
					array('escape' => false)); ?>
			  </li>
			  <li>
				<?php echo $this->Html->link('<i class="icon-hand-right"></i> User Permissions',
					array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'user_permissions', 'admin' => true ),
					array('escape' => false)); ?>
			  </li>
			</ul><hr>
			<h3><a href="#">Import Reports</a></h3>
			<p>Import reports submitted from the desktop app.</p>
			<?php
				echo $this->Form->create('Page', array(
					'type' => 'file', 'class' => 'well form-inline',
					'inputDefaults' => array(
						'div' => false, 'label' => false,
						'format' => array('before', 'label', 'between', 'input', 'after','error'),
						'error' => array('attributes' => array( 'class' => 'controls help-block')),
					 ),
				));

				echo $this->Form->input('file', array('type' => 'file', 'after' => '&nbsp;' ));
				echo $this->Form->button('Upload', array(
						'class' => 'btn btn-primary mapop', 'title'=>'Upload File',
						'data-content' => 'Upload XML file sent by reporters.',
						'div' => false,
					));

				echo $this->Form->end();
			?>
			<ul class="nav nav-tabs nav-stacked">
			    <li>
				<?php
					echo $this->Html->link('<i class="icon-download"></i> Imported SADR Reports',
						array('controller' => 'sadrs', 'action' => 'index', 'submitted'=>'5', 'admin' => true),
						array('escape' => false));
				?>
				</li>
				<li>
				<?php
					echo $this->Html->link('<i class="icon-download"></i> Imported SADR Follow UP Reports',
						array('controller' => 'sadr_followups', 'action' => 'index', 'submitted'=>'5', 'admin' => true),
						array('escape' => false));
				?>
				</li>
				<li>
				<?php
					echo $this->Html->link('<i class="icon-download"></i> Imported PQMP Reports',
						array('controller' => 'pqmps', 'action' => 'index', 'submitted' => '5', 'admin' => true),
						array('escape' => false));
				?>
				</li>
			</ul>
		</div>
       <div class="span4">
			<h3>
				<i class="icon-briefcase"></i> <?php echo $this->Html->link('Content Management', array('controller' => 'help_infos', 'action' => 'index', 'admin' => true )); ?>
			</h3>
			<p>Change the frontend's text, form labels and help tips</p>
			<ul class="nav nav-tabs nav-stacked">
				<li>
				<?php echo $this->Html->link('<i class="icon-book"></i> ALL FORMS Content',
						array('controller' => 'help_infos', 'action' => 'index', 'type'=>'', 'admin' => true), array('escape' => false)); ?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> SADR Content',
					array('controller' => 'help_infos', 'action' => 'index',  'type'=>'sadr', 'admin' => true),
					array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> PQMP Content',
					array('controller' => 'help_infos', 'action' => 'index', 'type'=>'pqmp', 'admin' => true),
					array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> PPB DRUG DICTIONARY',
					array('controller' => 'drug_dictionaries', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> WHO DRUG DICTIONARY',
					array('controller' => 'who_drugs', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> COUNTIES',
					array('controller' => 'counties', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> COUNTRIES',
					array('controller' => 'countries', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> FACILITY CODES',
					array('controller' => 'facility_codes', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> DRUG DOSES',
					array('controller' => 'doses', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> DRUG FREQUENCIES',
					array('controller' => 'frequencies', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
				<li>
				<?php
				echo $this->Html->link('<i class="icon-hand-right"></i> DRUG ADMINISTRATION ROUTES',
					array('controller' => 'routes', 'action' => 'index', 'admin' => true), array('escape' => false));
				?>
				</li>
			</ul>
		</div>
      </div> <!-- /row -->
      <hr>
      <div class="row-fluid" style="margin-bottom: 9px;">
        <div class="span4">
			<!-- SOME CONDEND HERE -->
		</div>
        <div class="span4">
 			<!-- SOME OTHER CONDEND HERE -->
        </div>
        <div class="span4">
        </div>
      </div> <!-- /row -->
    </section>
