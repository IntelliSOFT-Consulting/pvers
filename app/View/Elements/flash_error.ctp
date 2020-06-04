<div class="alert alert-error">
        <button data-dismiss="alert" class="close">&times;</button>
        <?php 
			echo $message;
			
		?>
		<ul class="unstyled">
			<?php 
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
			
			// pr(array_flatten($this->validationErrors));
			$myarr = array_flatten($this->validationErrors);
			
			for ($i = 0; $i < count($myarr); $i++) {
				if($i <= 3) { echo "<li><i class='icon-warning-sign'></i> $myarr[$i]</li>"; }
			}
			?>
			...
		</ul>
      </div>
