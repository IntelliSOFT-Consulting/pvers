<?php 
	$aC = $bC = $cC = $dC = $eC = $fC =  $gC =  $hC =  $iC =  $jC = $kC = $lC = $mC = $nC = '';
	if ($this->request->params['controller'] == 'help_infos') {
		if(isset($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'sadr')  $aC = 'active';
		else if(isset($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'pqmp')  $bC = 'active';
		else if(isset($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'home')  $lC = 'active';
		else if(isset($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'sadr_add')  $mC = 'active';
		else if(isset($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'pqmp_add')  $nC = 'active';
		else $cC = 'active';
	} else if($this->request->params['controller'] == 'counties'){
		$dC = 'active';
	} else if($this->request->params['controller'] == 'countries'){
		$eC = 'active';
	} else if($this->request->params['controller'] == 'facility_codes'){
		$fC = 'active';
	} else if($this->request->params['controller'] == 'doses'){
		$gC = 'active';
	} else if($this->request->params['controller'] == 'frequencies'){
		$hC = 'active';
	} else if($this->request->params['controller'] == 'routes'){
		$iC = 'active';
	} else if($this->request->params['controller'] == 'drug_dictionaries'){
		$jC = 'active';
	} else if($this->request->params['controller'] == 'who_drugs'){
		$kC = 'active';
	}
?> 
<div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
						  <li class="nav-header"><i class="icon-glass"></i>  Filter Options </li>
						  <li class="divider"></li>
						  <li class="nav-header"><i class="icon-book"></i> FRONT PAGES </li>
						  <li class="<?php echo $lC; ?>">
							<?php 
								echo $this->Html->link('<i class="icon-bookmark"></i> HOME', 
										array('controller' => 'help_infos', 'action' => 'index',  'type'=>'home', 'admin' => true), 
										array('escape' => false)); 
									?>
						  </li>					  								  
						  <li class="<?php echo $mC; ?>">
							<?php 
								echo $this->Html->link('<i class="icon-bookmark"></i> SADR ADD', 
										array('controller' => 'help_infos', 'action' => 'index', 'type'=>'sadr_add', 'admin' => true), 
										array('escape' => false)); 
							?>
						  </li>					  								  
						  <li class="<?php echo $nC; ?>">
							<?php 
								echo $this->Html->link('<i class="icon-bookmark"></i> PQMP ADD', 
										array('controller' => 'help_infos', 'action' => 'index', 'type'=>'pqmp_add', 'admin' => true), 
										array('escape' => false)); 
							?>
						  </li>
						  <li class="divider"></li>
						  <li class="nav-header"><i class="icon-book"></i> FORMS </li>
						  <li class="<?php echo $cC; ?>">
							<?php echo $this->Html->link('<i class="icon-tag"></i> ALL FORMS', 
									array('controller' => 'help_infos', 'type'=>'', 'action' => 'index', 'admin' => true), array('escape' => false)); ?>
						  </li>
						  <li class="<?php echo $aC; ?>">
							<?php 
								echo $this->Html->link('<i class="icon-tag"></i> SADR', 
										array('controller' => 'help_infos', 'action' => 'index',  'type'=>'sadr', 'admin' => true), 
										array('escape' => false)); 
									?>
						  </li>					  								  
						  <li class="<?php echo $bC; ?>">
							<?php 
								echo $this->Html->link('<i class="icon-tag"></i> PQMP', 
										array('controller' => 'help_infos', 'action' => 'index', 'type'=>'pqmp', 'admin' => true), 
										array('escape' => false)); 
							?>
						  </li>
						  <li class="divider"></li>						  
						  <li class="nav-header"><i class="icon-book"></i> Drug Dictionaries </li>
							<li class="<?php echo $jC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> PPB DRUGS', 
								array('controller' => 'drug_dictionaries', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>					  
							<li class="<?php echo $kC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> WHO DRUGS', 
								array('controller' => 'who_drugs', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>
						  <li class="divider"></li>
						  <li class="nav-header"><i class="icon-book"></i> OTHER CONTENT </li>
							<li class="<?php echo $dC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> COUNTIES', 
								array('controller' => 'counties', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>					  
							<li class="<?php echo $eC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> COUNTRIES', 
								array('controller' => 'countries', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>					  
							<li class="<?php echo $fC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> FACILITIES', 
								array('controller' => 'facility_codes', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>					  
							<li class="<?php echo $gC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> DOSES', 
								array('controller' => 'doses', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>					  
							<li class="<?php echo $hC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> FREQUENCIES', 
								array('controller' => 'frequencies', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>					  
							<li class="<?php echo $iC; ?>">
							<?php 
							echo $this->Html->link('<i class="icon-tag"></i> ROUTES', 
								array('controller' => 'routes', 'action' => 'index', 'admin' => true), array('escape' => false)); 
							?>
							</li>				  
						  <li class="divider"></li>						  
						</ul>
					  </div> <!-- /well -->