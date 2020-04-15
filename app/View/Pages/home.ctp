<?php 
	$this->start('banner');
		echo $this->element('home/banner');
	$this->end(); 
	$this->assign('Home', 'active');
		
	$this->Html->script('bootstrap-carousel', array('inline' => false));
 ?>

<script type="text/javascript">
$(document).ready(function() {
		$('#myCarousel').carousel({
		interval: 4500
    })
});
 </script>
     <!-- Carousel
    ================================================== -->
    <section id="carousel">
  		<?php echo $help_infos['home_content']['content']; ?>        
    </section>




