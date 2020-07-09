<div class="alert alert-block alert-error fade in">
	<button data-dismiss="alert" class="close" type="button">&times;</button>
        <h5 class="alert-heading">
		<?php
			echo $message;
		?>
		</h5>
		<p>
		<?php
			if(!function_exists('array_flatten')) {
				function array_flatten($array) {
				  if (!is_array($array)) {
					return FALSE;
				  }
				  $result = array();
				  foreach ($array as $key => $value) {
					if (is_array($value)) {
					  $result = array_merge($result, array_flatten($value));
					}
					else {
					  $result[$key] = $value;
					}
				  }
				  return $result;
				}
			}
			

			// pr(array_flatten($this->validationErrors));
			$myarr = array_flatten($this->validationErrors);

			if(isset($myarr[0])) echo '<i class="icon-warning-sign"></i> '.$myarr[0].'<br/>';
			if(isset($myarr[1])) echo '<i class="icon-warning-sign"></i> '.$myarr[1].'<br/>';
			if(isset($myarr[2])) echo '<i class="icon-warning-sign"></i> '.$myarr[2].'<br/>';
			if(count($myarr) > 2) {
		?>
			<small class="accordion-toggle" data-toggle="collapse" data-target="#demo">
				more...
			</small>
			<div id="demo" class="collapse">
			<?php
				for ($i = 3; $i < count($myarr); $i++) {
					if($i <= 12) { echo '<i class="icon-warning-sign"></i> '.$myarr[$i].'<br/>'; }
				}
			?>
			</div>
		<?php
			}
		?>
		</p>
</div>
